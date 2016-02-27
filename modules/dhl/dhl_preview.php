<?php

include_once(dirname(__FILE__) . '/../../config/config.inc.php');
include_once(dirname(__FILE__) . '/../../init.php');
include_once(dirname(__FILE__) . '/classes/RateAvailableServices.php');
include_once(dirname(__FILE__) . '/JSON.php');

$log = false;
$sti = microtime();
$ps_version  = floatval(substr(_PS_VERSION_,0,3));
$dhl = new DHL();
$context = $dhl->getContext();
$is_cart = Tools::getValue('dhl_is_cart');
$qty = Tools::getValue('qty');

$dhl->saveLog('dhl_log1.txt', "Starting $sti ".print_r($_POST,true), $log);

// Get Address and zone
$address = $dhl->getPreviewAddress($log);

$product = new Product(Tools::getValue('id_product', 0));
$id_product_attribute = Tools::getValue('id_product_attribute', 0);
$product_weight = $product->weight;

$id_dest_country = Country::getByIso($address['dest_country']);

$id_address_delivery = Db::getInstance()->getValue('SELECT `id_address` FROM '._DB_PREFIX_.'address WHERE `id_country` = '.$id_dest_country.($address['dest_state'] ? ' AND `id_state` = '.$address['dest_state'] : ''));
if(!$id_address_delivery)
{
	$addressObj = new Address();
	$addressObj->id_customer = 0;
	$addressObj->id_country = $id_dest_country;
	$addressObj->id_state = $address['dest_state'];
	$addressObj->alias = 'PREVIEW '.time();
	$addressObj->firstname = 'SHIPPING';
	$addressObj->lastname = 'PREVIEW';
	$addressObj->address1 = 'PREVIEW '.time();
	$addressObj->city = 'Somewhere';
	$addressObj->phone = '555555555';
	$addressObj->deleted = true;
	$addressObj->add();

	$id_address_delivery = $addressObj->id;	
}  

$dhl->updateCartWithNewCarrier($id_address_delivery); 
	
$cart_products = $context->cart->getProducts();
if(is_array($cart_products) && count($cart_products))
{
	foreach($cart_products as $cart_product)
	{
		setProductAddressDelivery($context->cart->id, $cart_product['id_product'], $cart_product['id_product_attribute'], $cart_product['id_address_delivery'], $id_address_delivery);
	}
	
	$context->cart->save();
}  

/** GET WAREHOUSE IF ADVANCED STOCK MANAGEMENT IS ENABLED */
$package_list = array();
if(Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT'))                                          
	$package_list = getWarehouseList($context, $product, $id_product_attribute, $id_address_delivery, $is_cart);
/***/

// Add combination weight impact
if ($id_product_attribute)
	$product_weight += Db::getInstance()->getValue('SELECT `weight`	FROM `'._DB_PREFIX_.'product_attribute`	WHERE `id_product_attribute` = '.$id_product_attribute);
	
$is_downloadable = ProductDownload::getIdFromIdProduct($product->id);
if (!$is_downloadable)
{
	$currency = new Currency($context->currency->id);
	$rates = $dhl->getAllRates($address['id_zone'], $is_cart, $context->cart, $product_weight, $address['dest_zip'], $address['dest_state'], $address['dest_country'], $currency, $product, $id_product_attribute, $qty, $address['dest_city'], $package_list);

	if(is_array($rates) && count($rates))
		uasort($rates, 'sortDeliveryOptionList');
	
	$json = array("dhl_rate_tpl"=> $dhl->hookAjaxPreview($rates, $address['dest_zip'], $address['dest_state'], $address['dest_country'], false, $is_cart, $address['dest_city']));
}
else
	$json = array("dhl_rate_tpl"=> $dhl->hookAjaxPreview($rates, $address['dest_zip'], $address['dest_state'], $address['dest_country'], true, $is_cart));
	
if (!function_exists('json_decode') )
{
	$j = new JSON();
	print $j->serialize($dhl->array2object($json));
}
else
	print json_encode($json);

$dhl->saveLog('dhl_log1.txt', "5) = ".(microtime() - $sti), $log);

function getWarehouseList($context, $productObj, $id_product_attribute, $id_address_delivery = 0, $is_cart = '')
{
	if($is_cart != '_cart')
	{
		$product = objectToArray($productObj);
		$product['id_product'] = $productObj->id;
		$product['id_product_attribute'] = $id_product_attribute;
		$product['carrier_list'] = $productObj->getCarriers();
		$product['id_address_delivery'] = $id_address_delivery;

		$product_list = array($product);
	}
	else
		$product_list = $context->cart->getProducts();
	
	// Step 1 : Get product informations (warehouse_list and carrier_list), count warehouse
	// Determine the best warehouse to determine the packages
	// For that we count the number of time we can use a warehouse for a specific delivery address
	$warehouse_count_by_address = array();
	$warehouse_carrier_list = array();

	$stock_management_active = Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT');

	foreach ($product_list as &$product)
	{
		if (!isset($warehouse_count_by_address[$product['id_address_delivery']]))
			$warehouse_count_by_address[$product['id_address_delivery']] = array();

		$product['warehouse_list'] = array();

		if ($stock_management_active &&
			((int)$product['advanced_stock_management'] == 1 || Pack::usesAdvancedStockManagement((int)$product['id_product'])))
		{
			$warehouse_list = Warehouse::getProductWarehouseList($product['id_product'], $product['id_product_attribute'], $context->shop->id);
			if (count($warehouse_list) == 0)
				$warehouse_list = Warehouse::getProductWarehouseList($product['id_product'], $product['id_product_attribute']);
			// Does the product is in stock ?
			// If yes, get only warehouse where the product is in stock

			$warehouse_in_stock = array();
			$manager = StockManagerFactory::getManager();

			foreach ($warehouse_list as $key => $warehouse)
			{
				$product_real_quantities = $manager->getProductRealQuantities(
					$product['id_product'],
					$product['id_product_attribute'],
					array($warehouse['id_warehouse']),
					true
				);

				if ($product_real_quantities > 0 || Pack::isPack((int)$product['id_product']))
					$warehouse_in_stock[] = $warehouse;
			}

			if (!empty($warehouse_in_stock))
			{
				$warehouse_list = $warehouse_in_stock;
				$product['in_stock'] = true;
			}
			else
				$product['in_stock'] = false;
		}
		else
		{
			//simulate default warehouse
			$warehouse_list = array(0);
			$product['in_stock'] = StockAvailable::getQuantityAvailableByProduct($product['id_product'], $product['id_product_attribute']) > 0;
		}

		foreach ($warehouse_list as $warehouse)
		{
			if (!isset($warehouse_carrier_list[$warehouse['id_warehouse']]))
			{
				$warehouse_object = new Warehouse($warehouse['id_warehouse']);
				$warehouse_carrier_list[$warehouse['id_warehouse']] = $warehouse_object->getCarriers();
			}

			$product['warehouse_list'][] = $warehouse['id_warehouse'];
			if (!isset($warehouse_count_by_address[$product['id_address_delivery']][$warehouse['id_warehouse']]))
				$warehouse_count_by_address[$product['id_address_delivery']][$warehouse['id_warehouse']] = 0;

			$warehouse_count_by_address[$product['id_address_delivery']][$warehouse['id_warehouse']]++;
		}
	}
	unset($product);

	arsort($warehouse_count_by_address);
	
	// Step 2 : Group product by warehouse
	$grouped_by_warehouse = array();
	foreach ($product_list as &$product)
	{
		if (!isset($grouped_by_warehouse[$product['id_address_delivery']]))
			$grouped_by_warehouse[$product['id_address_delivery']] = array(
				'in_stock' => array(),
				'out_of_stock' => array(),
			);
		
		$product['carrier_list'] = array();
		$id_warehouse = 0;
		foreach ($warehouse_count_by_address[$product['id_address_delivery']] as $id_war => $val)
		{
			if (in_array((int)$id_war, $product['warehouse_list']))
			{
				$product['carrier_list'] = array_merge($product['carrier_list'], Carrier::getAvailableCarrierList(new Product($product['id_product']), $id_war, $product['id_address_delivery'], null, new Cart()));
				if (!$id_warehouse)
					$id_warehouse = (int)$id_war;
			}
		}

		if (!isset($grouped_by_warehouse[$product['id_address_delivery']]['in_stock'][$id_warehouse]))
		{
			$grouped_by_warehouse[$product['id_address_delivery']]['in_stock'][$id_warehouse] = array();
			$grouped_by_warehouse[$product['id_address_delivery']]['out_of_stock'][$id_warehouse] = array();
		}

		$key = $product['in_stock'] ? 'in_stock' : 'out_of_stock';

		if (empty($product['carrier_list']))
			$product['carrier_list'] = array(0);

		$grouped_by_warehouse[$product['id_address_delivery']][$key][$id_warehouse][] = $product;
	}
	unset($product);

	// Step 3 : grouped product from grouped_by_warehouse by available carriers
	$grouped_by_carriers = array();
	foreach ($grouped_by_warehouse as $id_address_delivery => $products_in_stock_list)
	{
		if (!isset($grouped_by_carriers[$id_address_delivery]))
			$grouped_by_carriers[$id_address_delivery] = array(
				'in_stock' => array(),
				'out_of_stock' => array(),
			);
		foreach ($products_in_stock_list as $key => $warehouse_list)
		{
			if (!isset($grouped_by_carriers[$id_address_delivery][$key]))
				$grouped_by_carriers[$id_address_delivery][$key] = array();
			foreach ($warehouse_list as $id_warehouse => $product_list)
			{
				if (!isset($grouped_by_carriers[$id_address_delivery][$key][$id_warehouse]))
					$grouped_by_carriers[$id_address_delivery][$key][$id_warehouse] = array();
				foreach ($product_list as $product)
				{
					$package_carriers_key = implode(',', $product['carrier_list']);

					if (!isset($grouped_by_carriers[$id_address_delivery][$key][$id_warehouse][$package_carriers_key]))
						$grouped_by_carriers[$id_address_delivery][$key][$id_warehouse][$package_carriers_key] = array(
							'product_list' => array(),
							'carrier_list' => $product['carrier_list'],
							'warehouse_list' => $product['warehouse_list']
						);

					$grouped_by_carriers[$id_address_delivery][$key][$id_warehouse][$package_carriers_key]['product_list'][] = $product;
				}
			}
		}
	}

	$package_list = array();
	// Step 4 : merge product from grouped_by_carriers into $package to minimize the number of package
	foreach ($grouped_by_carriers as $id_address_delivery => $products_in_stock_list)
	{
		if (!isset($package_list[$id_address_delivery]))
			$package_list[$id_address_delivery] = array(
				'in_stock' => array(),
				'out_of_stock' => array(),
			);

		foreach ($products_in_stock_list as $key => $warehouse_list)
		{
			if (!isset($package_list[$id_address_delivery][$key]))
				$package_list[$id_address_delivery][$key] = array();
			// Count occurance of each carriers to minimize the number of packages
			$carrier_count = array();
			foreach ($warehouse_list as $id_warehouse => $products_grouped_by_carriers)
			{
				foreach ($products_grouped_by_carriers as $data)
				{
					foreach ($data['carrier_list'] as $id_carrier)
					{
						if (!isset($carrier_count[$id_carrier]))
							$carrier_count[$id_carrier] = 0;
						$carrier_count[$id_carrier]++;
					}
				}
			}
			arsort($carrier_count);
			foreach ($warehouse_list as $id_warehouse => $products_grouped_by_carriers)
			{
				if (!isset($package_list[$id_address_delivery][$key][$id_warehouse]))
					$package_list[$id_address_delivery][$key][$id_warehouse] = array();
				foreach ($products_grouped_by_carriers as $data)
				{
					foreach ($carrier_count as $id_carrier => $rate)
					{
						if (in_array($id_carrier, $data['carrier_list']))
						{
							if (!isset($package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]))
								$package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier] = array(
									'carrier_list' => $data['carrier_list'],
									'warehouse_list' => $data['warehouse_list'],
									'product_list' => array(),
								);
							$package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['carrier_list'] =
								array_intersect($package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['carrier_list'], $data['carrier_list']);
							$package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['product_list'] =
								array_merge($package_list[$id_address_delivery][$key][$id_warehouse][$id_carrier]['product_list'], $data['product_list']);

							break;
						}
					}
				}
			}
		}
	}

	// Step 5 : Reduce depth of $package_list
	$final_package_list = array();
	foreach ($package_list as $id_address_delivery => $products_in_stock_list)
	{
		if (!isset($final_package_list[$id_address_delivery]))
			$final_package_list[$id_address_delivery] = array();

		foreach ($products_in_stock_list as $key => $warehouse_list)
			foreach ($warehouse_list as $id_warehouse => $products_grouped_by_carriers)
				foreach ($products_grouped_by_carriers as $data)
				{
					$final_package_list[$id_address_delivery][] = array(
						'product_list' => $data['product_list'],
						'carrier_list' => $data['carrier_list'],
						'warehouse_list' => $data['warehouse_list'],
						'id_warehouse' => $id_warehouse,
					);
				}
	}

	return $final_package_list;
}

function objectToArray ($object) 
{
	if(!is_object($object) && !is_array($object))
		return $object;

	return array_map('objectToArray', (array) $object);
}

function sortDeliveryOptionList($option1, $option2)
{
	static $order_by_price = null;
	static $order_way = null;
	if (is_null($order_by_price))
		$order_by_price = !Configuration::get('PS_CARRIER_DEFAULT_SORT');
	if (is_null($order_way))
		$order_way = Configuration::get('PS_CARRIER_DEFAULT_ORDER');
		
	$option1[0] = (float) str_replace('$', '', $option1[0]);
	$option2[0] = (float) str_replace('$', '', $option2[0]);
		
	$option1_carrier = new Carrier((int)$option1[1]);
	$option2_carrier = new Carrier((int)$option2[1]);
		
	if ($order_by_price)
		if ($order_way)
			return ($option1[0] < $option2[0]) * 2 - 1; // return -1 or 1
		else
			return ($option1[0] >= $option2[0]) * 2 - 1; // return -1 or 1
	elseif(Validate::isLoadedObject($option1_carrier) && Validate::isLoadedObject($option2_carrier))
		if ($order_way)
			return ($option1_carrier->position < $option2_carrier->position) * 2 - 1; // return -1 or 1
		else
			return ($option1_carrier->position >= $option2_carrier->position) * 2 - 1; // return -1 or 1
	else
		return 1;
}

function setProductAddressDelivery($id_cart, $id_product, $id_product_attribute, $old_id_address_delivery, $new_id_address_delivery)
{
	if($old_id_address_delivery == $new_id_address_delivery)
		return false;

	// Checking if the product with the old address delivery exists
	$sql = new DbQuery();
	$sql->select('count(*)');
	$sql->from('cart_product', 'cp');
	$sql->where('id_product = '.(int)$id_product);
	$sql->where('id_product_attribute = '.(int)$id_product_attribute);
	$sql->where('id_address_delivery = '.(int)$old_id_address_delivery);
	$sql->where('id_cart = '.(int)$id_cart);
	$result = Db::getInstance()->getValue($sql);       

	if ($result == 0)
		return false;

	// Checking if there is no others similar products with this new address delivery
	$sql = new DbQuery();
	$sql->select('sum(quantity) as qty');
	$sql->from('cart_product', 'cp');
	$sql->where('id_product = '.(int)$id_product);
	$sql->where('id_product_attribute = '.(int)$id_product_attribute);
	$sql->where('id_address_delivery = '.(int)$new_id_address_delivery);
	$sql->where('id_cart = '.(int)$id_cart);
	$result = Db::getInstance()->getValue($sql);

	// Removing similar products with this new address delivery
	$sql = 'DELETE FROM '._DB_PREFIX_.'cart_product
		WHERE id_product = '.(int)$id_product.'
		AND id_product_attribute = '.(int)$id_product_attribute.'
		AND id_address_delivery = '.(int)$new_id_address_delivery.'
		AND id_cart = '.(int)$id_cart.'
		LIMIT 1';
	Db::getInstance()->execute($sql);

	// Changing the address
	$sql = 'UPDATE '._DB_PREFIX_.'cart_product
		SET `id_address_delivery` = '.(int)$new_id_address_delivery.',
		`quantity` = `quantity` + '.(int)$result.'
		WHERE id_product = '.(int)$id_product.'
		AND id_product_attribute = '.(int)$id_product_attribute.'
		AND id_address_delivery = '.(int)$old_id_address_delivery.'
		AND id_cart = '.(int)$id_cart.'
		LIMIT 1';
	Db::getInstance()->execute($sql);

	// Changing the address of the customizations
	$sql = 'UPDATE '._DB_PREFIX_.'customization
		SET `id_address_delivery` = '.(int)$new_id_address_delivery.'
		WHERE id_product = '.(int)$id_product.'
		AND id_product_attribute = '.(int)$id_product_attribute.'
		AND id_address_delivery = '.(int)$old_id_address_delivery.'
		AND id_cart = '.(int)$id_cart;
	Db::getInstance()->execute($sql);

	return true;
}