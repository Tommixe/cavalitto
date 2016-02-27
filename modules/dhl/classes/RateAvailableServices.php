<?php

require_once(dirname(__FILE__) . '/../dhl.php');

class DHLRate extends DHL
{
	public $id_warehouse;
	public $warehouse_carrier_list;
	public $products_id_list;
	public $package_list;
	
	function __construct()
	{
		parent::__construct();
		$this->constructConstants();	
	}
	
	public function constructConstants()
	{
		$this->id_warehouse = 0;
		$this->warehouse_carrier_list = array();
		$this->products_id_list = array();
	}

	public function getRate($id_carrier, $id_zone, $totalWeight, $dest_zip = "", $dest_state = "", $dest_country = "", $dest_city = "", $product_price = 0, $id_product = 0, $id_product_attribute = 0, $qty = 1, $cart = "", $products = NULL)
	{            			
		$log = false;
				
		if(!Validate::isLoadedObject($cart))    
			$cart = $this->context->cart;            
		/** GET WAREHOUSE BASED IN THE PRODUCTS THAT PRESTASHOP WANTS OUR MODULE TO QUOTE */
		/** SHIPPING PREVIEW WILL SET THE WAREHOUSE BEFORE CALLING getRate(), WHICH MEANS THAT THIS WILL NOT BE NECESSARY IF WAREHOUSE IS ALREADY SET */
		$not_fake_request = true;
		if(!$this->id_warehouse)
			$not_fake_request = $this->getWarehouseByProductsList($products);  
			
		/** AVOID "FAKE" WAREHOUSES REQUESTS */
		if(Configuration::get('PS_ADVANCED_STOCK_MANAGEMENT') && !$id_product && !$not_fake_request) 
			return 0;  
			
		if($this->getPSV() >= 1.5 && $this->id_warehouse)
		{
			if(is_array($products) && count($products))
			{
				foreach($products as $product)
				{
					$this->products_id_list[] = 'ID #'.$product['id_product'].' Attribute ID #'.$product['id_product_attribute'];
				}
			}
			else
				$this->products_id_list[] = 'ID #'.$id_product.' - Attr ID #'.$id_product_attribute;
					
			$this->products_id_list = implode('; ', $this->products_id_list);
			$warehouse = new Warehouse($this->id_warehouse);
		}              
			
		$carrier = $this->getCarrier($id_carrier, $id_zone);

		$this->saveLog('call_log.txt', "getDHLRate\n\r", $log);

		$fs_arr = Db::getInstance()->getRow('SELECT free_shipping_product, free_shipping_category, free_shipping_manufacturer, free_shipping_supplier FROM '._DB_PREFIX_.'fe_dhl_method WHERE id_carrier = "'.(int)$id_carrier.'"');
		
		// Get customer info //
		$customerInfo = $this->getCustomerInfo($id_zone, $dest_zip, $dest_country, $dest_city, $cart);
		if(!$customerInfo)
			return false;
		$dest_zip = $customerInfo['dest_zip'];
		$dest_country = $customerInfo['dest_country'];
		$dest_city = $customerInfo['dest_city'];
		$id_zone = $customerInfo['id_zone'];

		$country_id = (int)Country::getByIso($dest_country);
		
		$countryObj = new Country();
		if($dest_country && $country_id)
			$countryObj = new Country($country_id);
		
		if(Validate::isLoadedObject($countryObj))
		{
			if($dest_zip == '' && $countryObj->need_zip_code == 0)
				$dest_zip = 0;
		}		
		
		if (($dest_zip == "" && $this->_dhl_address_display['zip'] == 1) OR (int)$id_zone == 0)
			return false;

		$st = time();

		$this->saveLog('dhl_rate_log.txt',"1) $id_carrier, $id_zone, $totalWeight, $id_product (p $product_price) (qty $qty) , $dest_zip, $dest_country, $dest_city\n\r\n", $log);

		$hash_rate = $this->getHash($id_carrier, $products, $id_product, $id_product_attribute, $qty, $dest_country, "", $dest_zip, true, $this->id_warehouse);
							
		if ($hash_rate !== false)
		{
			$this->saveLog('dhl_rate_log.txt',"7) Cache\n\r"."hashcahsh = $hash_rate\n\r",$log);
			return $hash_rate <= -1 ? false : $hash_rate;
		} 
		
		// Check Invalid Destination cache
		$invalid_dest = $this->checkInvalidDestination($carrier, $dest_zip, $dest_country, $log);
		$this->saveLog('dhl_rate_log.txt', "9.5) \n\r invalid_dest".print_r($invalid_dest,true), $log);

		if (is_array($invalid_dest) && sizeof($invalid_dest) >= 1)
		{
			$this->saveLog('dhl_rate_log.txt', "10) \n\r result".print_r($invalid_dest,true), $log);
			return false;
		}
		
		// Check for invalid US zipcode
		if ($dest_country == 'US' && !$this->validateUSZip($dest_zip, $this))
		{
			$this->saveInvalidDestination($carrier, $dest_zip, $dest_country);
			return false;
		}
		
		if(is_array($this->warehouse_carrier_list) && count($this->warehouse_carrier_list) && in_array($carrier['id_carrier'], $this->warehouse_carrier_list) !== true)
		{
			$this->saveInvalidDestination($carrier, $dest_zip, $dest_country);
			return false;
		}
	
		if($this->id_warehouse)
		{
			if(is_array($products) && count($products))
			{
				$totalWeight = 0;
				$orderTotal = 0;
				foreach($products as $product)
				{
					if($product['quantity'] <= 0)
						$product['quantity'] = $qty;
					
					$totalWeight += round($product['weight'] * $product['quantity'], 3);
					$orderTotal += round($product['price'] * $product['quantity'], 3);
				}
			}
			else
			{
				$totalWeight *= $qty;
				$orderTotal += $product_price * $qty;
			}
			
			// Convert Weight to lbs or kgs based on dhl default
			if ($this->_dhl_unit == 'LBS')
				$totalWeight = $this->getWeightInLb($totalWeight);
			else
				$totalWeight = $this->getWeightInKg($totalWeight);
		}
		else
		{
			$totalWeight = $this->getOrderTotalWeight($cart->id, $id_product, $qty, $totalWeight);
			$orderTotal = $this->getTotal($product_price, $qty, $cart);
		}

		if(!$this->checkShippingRanges($id_carrier, $totalWeight, $orderTotal))
			return false;
			
		if(!$this->checkShippingCustomerGroups($id_carrier, ($this->context->customer->logged ? $this->context->customer->id : 0)))
			return false;
			
		// Check to see if it's dhl shipping 
		if (!$carrier)
			return false;
			
		/** CONVERT VALUES IF CURRENT_CURRENCY != DEFAULT_CURRENCY */
		if($this->context->cookie->id_currency != Configuration::get('PS_CURRENCY_DEFAULT'))
		{
			$currency = new Currency((int) $this->context->cookie->id_currency);
			$carrier['free_shipping'] = Tools::convertPrice($carrier['free_shipping'], $currency); 
		}
		
		$this->saveLog('dhl_rate_log.txt', "3) 2 ($orderTotal) $id_carrier, $id_zone, $totalWeight, $dest_zip , $dest_country, $dest_city\n\r ", $log);

		$this->saveLog('dhl_rate_log.txt', "6) Hashcache check: $dest_country, $dest_zip\n\r", $log);
		$this->saveLog('dhl_rate_log.txt', "Carrier::  ".print_r($carrier, true)."\n\r", $log);
		
		// Calculate insurance (if needed)
		$iamount = $this->calculateInsurance($carrier, $orderTotal, $id_product, $products, $qty, $cart);

		$this->saveLog('dhl_rate_log.txt', "\n\r11) TIME1: ".(time() - $st)."\nChecking cache $totalWeight,  $id_product, $qty", $log);
		
		/** IF MODULE WILL NEED TO RETRIEVE SHIPPING RATES FOR MORE THAN ONE WAREHOUSE */
		if(is_array($this->package_list) && count($this->package_list) && !$id_product)
		{
			foreach($this->package_list as $warehouses)
			{
				if(is_array($warehouses) && count($warehouses) > 1)
				{
					$products_id_list = array();
					$pack_dim = array();
					$product_list = array();
					foreach($warehouses as $warehouse)
					{
						if(!is_array($warehouse['product_list']) || !count($warehouse['product_list']))
							return false;
					
						$warehouse_products_weight = 0;
						foreach($warehouse['product_list'] as $product)
						{
							$warehouse_products_weight += round($product['weight'] * $product['quantity'], 3);
							$products_id_list[$warehouse['id_warehouse']][] = 'ID #'.$product['id_product'].' Attribute ID #'.$product['id_product_attribute'];
							$product_list[$warehouse['id_warehouse']][] = $product;
						}
						
						$products_id_list[$warehouse['id_warehouse']] = implode('; ', $products_id_list[$warehouse['id_warehouse']]);
						
						$boxes = $this->getBoxes($id_carrier, $warehouse_products_weight, $warehouse['product_list'], $id_product, $id_product_attribute, $qty, "CP");
						if (is_array($boxes) && sizeof($boxes) == 0)
						{
							$this->saveLog('dhl_rate_log.txt', "\n\r12) Package Dim problem, ".print_r($boxes, true), $log);
							return false;
						}
						
						// Free Shipping per product;
						if ($boxes == false)
							return 0;
							
						// More than maximum rate, return and don't cache //
						if ((sizeof($boxes) * 150 < $totalWeight && !$this->is_free_ship_cart($warehouse['product_list'], $fs_arr)) || sizeof($boxes) > 50)
						{
							$this->saveLog('dhl_rate_log.txt', "\n\r14)  Weight / Package Dim problem", $log);
							return false;
						}
		
						$pack_dim[$warehouse['id_warehouse']] = $boxes;					
					}
				}			
			}
		}
		
		if(!isset($pack_dim) || !is_array($pack_dim) || !count($pack_dim))
		{
			$pack_dim = $this->getBoxes($id_carrier, $totalWeight, $products, $id_product, $id_product_attribute, $qty, "CP");
			
			if (is_array($pack_dim) && sizeof($pack_dim) == 0)
			{
				$this->saveLog('dhl_rate_log.txt', "\n\r12) Package Dim problem, ".print_r($pack_dim, true), $log);
				return false;
			}
			
			// Free Shipping per product;
			if ($pack_dim == false)
				return 0;
				
			// More than maximum rate, return and don't cache //
			if ((sizeof($pack_dim) * 150 < $totalWeight && !$this->is_free_ship_cart($products, $fs_arr)) || sizeof($pack_dim) > 50)
			{
				$this->saveLog('dhl_rate_log.txt', "\n\r14)  Weight / Package Dim problem", $log);
				return false;
			}
		}
			
		$this->saveLog('dhl_rate_log.txt', "13) TIME2: ".(time() - $st)."\n", $log);
		
		$warehouse_address = new Address();
		if($this->id_warehouse)                     
		{                                                                     
			$warehouse = new Warehouse($this->id_warehouse);
			if(Validate::isLoadedObject($warehouse))
				$warehouse_address = new Address($warehouse->id_address);
		}
		
		if(Validate::isLoadedObject($warehouse_address))
		{
			$warehouse_country = new Country($warehouse_address->id_country);
			$origin_country = $warehouse_country->iso_code; 
			$origin_zip = $warehouse_address->postcode; 
			$origin_city = $warehouse_address->city; 
		}

		if(!isset($origin_country) || !isset($origin_zip) || !isset($origin_city))
		{
			$origin_country = $this->_dhl_origin_country;  
			$origin_zip = $this->_dhl_origin_zip;  
			$origin_city = $this->_dhl_origin_city;  
		}
		
		$duatiablePacks = $this->dutiablePacks();
		$EUCountries = $this->EUCountries();
		
		if(!strlen($dest_country))
			$isDutiable = 'N';
		elseif($dest_country != $origin_country && in_array($this->_dhl_pack, $duatiablePacks) === true)
		{
			if(in_array($origin_country, $EUCountries) === true)
			{
				if(in_array($dest_country, $EUCountries) === true)
					$isDutiable = 'N';
				else
					$isDutiable = 'Y';						
			}
			else
				$isDutiable = 'Y';
		}
		else
			$isDutiable = 'N';
				 
		$dhl_carriers = $this->getCarriers($id_zone, $cart, Tools::getValue($this->name.'_is_cart', false), $id_product);
		$eachCarrierRequest = array();
		if(is_array($dhl_carriers) && count($dhl_carriers))
		{
			foreach($dhl_carriers as $newCarrier)
			{
				$iamount = $this->calculateInsurance($newCarrier, $orderTotal, $id_product, $products, $qty, $cart);
				if($iamount > 0 && $newCarrier['insurance_type'])
					$eachCarrierRequest[$iamount][$newCarrier['id_carrier']] = $newCarrier['method'];
				else
					$eachCarrierRequest['STANDARD'][$newCarrier['id_carrier']] = $newCarrier['method'];
			}
		}           
		
		/** IF $pack_dim DOES NOT CONTAIN KEY 0, IT MEANS THAT IT IS WAREHOUSES CALCULATION */
		$warehouse_responses = array();
		if(is_array($pack_dim) && count($pack_dim) && !isset($pack_dim[0]))
		{                      
			$warehouse_requests = array();
			foreach($pack_dim as $id_warehouse => $boxes)
			{        
				foreach($eachCarrierRequest as $group => $eachCarrier)
				{                          
					$warehouse_requests[$id_warehouse.'%%'.$group] = $this->requestRate($boxes, ($group == 'STANDARD' ? 0 : $group), $dest_country, $dest_zip, $dest_city, $log, false, true, $id_warehouse);  
				}
			}	
			
			if(is_array($warehouse_requests) && count($warehouse_requests))
			{
				$warehouse_requestResponses = $this->multiRequest($warehouse_requests, $this->getServerURL());
				if(is_array($warehouse_requestResponses) && count($warehouse_requestResponses))
				{
					foreach($warehouse_requestResponses as $warehouse_group => $response)
					{
						$warehouse_group = explode('%%', $warehouse_group);
						/** $requestResponses[$id_warehouse][$group] */
						$warehouse_responses[$warehouse_group[0]][$warehouse_group[1]] = $response;
					}
				}
			}	
		}
		/** IF SEPARATELY REQUEST IS NECESSARY */      
		elseif(is_array($eachCarrierRequest) && count($eachCarrierRequest))
		{			
			foreach($eachCarrierRequest as $group => $eachCarrier)
			{                          
				$requests[$group] = $this->requestRate($pack_dim, ($group == 'STANDARD' ? 0 : $group), $dest_country, $dest_zip, $dest_city, $log, false, true);  
			}
			
			if(is_array($requests) && count($requests))
				$requestResponses = $this->multiRequest($requests, $this->getServerURL());
		}
		
		$warehouse_xml = array();
		if(is_array($warehouse_responses) && count($warehouse_responses))
		{			
			foreach($warehouse_responses as $id_warehouse => $requestResponses)
			{           
				if(is_array($requestResponses) && count($requestResponses))
				{
					$selected_warehouse = new Warehouse($id_warehouse);
					$xml = new stdClass();
					$xml->GetQuoteResponse = new stdClass();
					$xml->GetQuoteResponse->BkgDetails = new stdClass();
					$xml->GetQuoteResponse->BkgDetails->QtdShp = array();
					
					foreach($requestResponses as $group => $post_response)
					{                         
						$requestResponse = @simplexml_load_string($post_response);
						
						if($requestResponse !== false)
						{
							$this->saveLog(
								$this->_dhl_log_filename,
								'// ------- Request: '.
								($this->id_warehouse ? 
									'(Products: '.$products_id_list[$id_warehouse].', coming from Warehouse: [#'.$selected_warehouse->id.' - ref:'.$selected_warehouse->reference.'] '.$selected_warehouse->name.')'
								: '')."\n\r".
								$warehouse_requests[$id_warehouse.'%%'.$group]."\n\r".
								'// ------- Response: '."\n\r".print_r($requestResponse, true)."\n\r
								\n\r", 
								$this->_dhl_xml_log
							);
						}
						else
						{
							$this->saveLog($this->_dhl_log_filename, 
								'// ------- Server Error: '.$post_response.' - Please contact your hosting provider for more details'."\n\r",
							$this->_dhl_xml_log);
						}
							
						foreach($dhl_carriers as $newCarrier)
						{
							if(in_array($newCarrier['method'], $eachCarrierRequest[$group]))
							{					
								$newCarrierID = array_search($newCarrier['method'], $eachCarrierRequest[$group]);
								
								if($isDutiable == 'Y')
									$newCarrier['method'] = $this->dutiableCarrierMethods($newCarrier['method']); 
									
								if (@$requestResponse->GetQuoteResponse->BkgDetails->QtdShp)
								{
									foreach ($requestResponse->GetQuoteResponse->BkgDetails->QtdShp as $rateReply)
									{                               							
										if ($newCarrier['method'] == $rateReply->GlobalProductCode)
										{
											$rateReply->id_carrier = $newCarrierID;
											$xml->GetQuoteResponse->BkgDetails->QtdShp[] = $rateReply;	
										}										
									}
								}
							}
						} 	
					}
					
					$warehouse_xml[$id_warehouse] = $xml;
				}
			}
			
			if(!is_array($warehouse_xml) || !count($warehouse_xml))
				return false;
		}
		elseif(is_array($requestResponses) && count($requestResponses))
		{
			$xml = new stdClass();
			$xml->GetQuoteResponse = new stdClass();
			$xml->GetQuoteResponse->BkgDetails = new stdClass();
			$xml->GetQuoteResponse->BkgDetails->QtdShp = array();
			
			foreach($requestResponses as $group => $post_response)
			{                      
				$requestResponse = @simplexml_load_string($post_response);
				
				if($requestResponse !== false)
				{
					$this->saveLog(
						$this->_dhl_log_filename,
						'// ------- Request: '.
						($this->id_warehouse ? 
							'(Products: '.$this->products_id_list.', coming from Warehouse: [#'.$warehouse->id.' - ref:'.$warehouse->reference.'] '.$warehouse->name.')'
						: '')."\n\r".
						$requests[$group]."\n\r".
						'// ------- Response: '."\n\r".print_r($requestResponse, true)."\n\r
						\n\r", 
						$this->_dhl_xml_log
					);
				}
				else
				{
					$this->saveLog($this->_dhl_log_filename, 
						'// ------- Server Error: '.$post_response.' - Please contact your hosting provider for more details'."\n\r",
					$this->_dhl_xml_log);
				}
					
				foreach($dhl_carriers as $newCarrier)
				{
					if(in_array($newCarrier['method'], $eachCarrierRequest[$group]))
					{					
						$newCarrierID = array_search($newCarrier['method'], $eachCarrierRequest[$group]);
						
						if($isDutiable == 'Y')
							$newCarrier['method'] = $this->dutiableCarrierMethods($newCarrier['method']); 
							
						if (@$requestResponse->GetQuoteResponse->BkgDetails->QtdShp)
						{
							foreach ($requestResponse->GetQuoteResponse->BkgDetails->QtdShp as $rateReply)
							{                               							
								if ($newCarrier['method'] == $rateReply->GlobalProductCode)
								{
									$rateReply->id_carrier = $newCarrierID;
									$xml->GetQuoteResponse->BkgDetails->QtdShp[] = $rateReply;	
								}										
							}
						}
					}
				} 	
			}
			
			if(!$xml) //timeout
				return false;
		}		
		
		if(is_array($warehouse_xml) && count($warehouse_xml))
		{                               
			foreach($warehouse_xml as $id_warehouse => $xml)
			{                                                                      
				if (@$xml->GetQuoteResponse->BkgDetails->QtdShp)
				{
					$ret_amount = false;
					$this_carriers = $this->getCarriers($id_zone, $cart, Tools::getValue($this->name.'_is_cart', false), $id_product);
					
					$duatiablePacks = $this->dutiablePacks();
					$EUCountries = $this->EUCountries();
					
					if(!strlen($dest_country))
						$isDutiable = 'N';
					elseif($dest_country != $origin_country && in_array($this->_dhl_pack, $duatiablePacks) === true)
					{
						if(in_array($origin_country, $EUCountries) === true)
						{
							if(in_array($dest_country, $EUCountries) === true)
								$isDutiable = 'N';
							else
								$isDutiable = 'Y';                        
						}
						else
							$isDutiable = 'Y';
					}
					else
						$isDutiable = 'N';
						
					foreach ($this_carriers as $this_carrier)
					{             
						$this->saveLog('dhl_rate_log.txt', "23) TIME4: ".(time() - $st)."\nGot rates, comparing to (".print_r($this_carrier, true).")\n\r", $log); 
						$method_found = false;
						$method_valid = false;
						foreach ($xml->GetQuoteResponse->BkgDetails->QtdShp as $rateReply)
						{                     
							$serviceType = $rateReply->GlobalProductCode;
							$this->saveLog('dhl_rate_log.txt', "!!!!!". $this_carrier['method']." == $serviceType ---  (".print_r($rateReply, true).")\n\r", $log);

							$amount_currency = $this->calculateAmount($rateReply, $this_carrier['exclude_taxes']);
							$amount = $amount_currency[0];
							if ($this->_dhl_enable_discount && (float)$this->_dhl_discount_rate > 0)
								$amount *= (float)$this->_dhl_discount_rate/100;
							$currency = $amount_currency[1];
							if (!$amount)
							{
								$this->saveLog('dhl_rate_log.txt', "23.5) NO AMOUNT BACK)\n\r", $log);
								continue;
							}
							
							$this_carrier['methodDutiable'] = $this_carrier['method'];
							if($isDutiable == 'Y')
								$this_carrier['methodDutiable'] = $this->dutiableCarrierMethods($this_carrier['method']);  

							// Check it there are no free shipping exceptions
							if ($this_carrier['methodDutiable'] == $serviceType)
							{
								if(isset($rateReply->id_carrier) && $rateReply->id_carrier != $this_carrier['id_carrier'])
									continue;
								
								$method_valid = true;
								if ($this_carrier['id_carrier'] == $id_carrier || ($fs_arr['free_shipping_product'] == '' && $fs_arr['free_shipping_category'] == '' &&
									$fs_arr['free_shipping_manufacturer'] == '' && $fs_arr['free_shipping_supplier'] == '' &&
									$this_carrier['free_shipping_product'] == '' && $this_carrier['free_shipping_category'] == '' &&
									$this_carrier['free_shipping_manufacturer'] == '' && $this_carrier['free_shipping_supplier'] == ''))
								{
									if ($this_carrier['id_carrier'] == $id_carrier)
										$method_found = true;
								}
								else
									continue;
							}
							else
								continue;    
								
							$rate_currency = Currency::getIdByIsoCode($currency);
							$this->saveLog('dhl_rate_log.txt', "return currency id = $rate_currency\n\r", $log);
							/** IF RATE CURRENCY IS NOT THE DEFAULT STORE'S CURRENCY */
							if($rate_currency && $rate_currency != Configuration::get('PS_CURRENCY_DEFAULT'))
							{
								$return_currency = new Currency($rate_currency);
								$amount = $amount / $return_currency->conversion_rate;
								
								$currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
								$currency = $currency->iso_code;
							}
							$this->saveLog('dhl_rate_log.txt', "amount in default currency = $amount\n\r", $log);

							$this->saveLog('dhl_rate_log.txt', "Writing to cache ".$this_carrier['id_carrier']."\n\r", $log);

							// Write to cache //
							$query = '
								INSERT INTO `'._DB_PREFIX_.'fe_dhl_rate_cache` 
								(
									`id_carrier`, 
									`origin_zip`, 
									`origin_country`, 
									`dest_zip`, 
									`dest_country`, 
									`method`, 
									`insurance`, 
									`dropoff`, 
									`packing`, 
									`packages`, 
									`weight`, 
									`rate`, 
									`currency`, 
									`quote_date`
								) VALUES (
									"'.$this_carrier['id_carrier'].'",
									"'.$this->_dhl_origin_zip.'",
									"'.$this->_dhl_origin_country.'",
									"'.$dest_zip.'","'.$dest_country.'",
									"'.$serviceType.'","'.$iamount.'",
									"'.$this->_dhl_dropoff.'",
									"'.$this->_dhl_pack.'",
									"'.sizeof($pack_dim).'",
									"'.$totalWeight.'",
									"'.$amount.'", 
									"'.$currency.'", 
									"'.time().'"
								)
							';
							Db::getInstance()->execute($query);
							$id_rate = Db::getInstance()->Insert_ID();

							// New hash cache
							$query = '
							INSERT INTO `'._DB_PREFIX_.'fe_dhl_hash_cache` 
							(
								`id_dhl_rate`, 
								`hash`, 
								`hash_date`
							) VALUES (
								"'.$id_rate.'",
								"'.$this->getHash($this_carrier['id_carrier'], $product_list[$id_warehouse], $id_product, $id_product_attribute, $qty, $dest_country, "", $dest_zip, false, $id_warehouse).'",
								"'.time().'"
							)';
							Db::getInstance()->execute($query);

							foreach ($pack_dim[$id_warehouse] as $package)
							{
								$query = '
									INSERT INTO `'._DB_PREFIX_.'fe_dhl_package_rate_cache` 
									(
										`id_dhl_rate`, 
										`weight`, 
										`width`, 
										`height`, 
										`depth`
									) VALUES (
										"'.$id_rate.'",
										"'.$package['weight'].'",
										"'.$package['w'].'",
										"'.$package['h'].'",
										"'.$package['d'].'"
									)
								';
								Db::getInstance()->execute($query);
							}

							$this->saveLog('dhl_rate_log.txt', "24) $query\n\r", $log);
							$this->saveLog('dhl_rate_log.txt', "24.1) if (".$carrier['method']." == $serviceType && ".$this_carrier['id_carrier']." == $id_carrier)\n\r", $log);					
							// Only calculate ret_amount for the selected carrier, for all other matches, we're only caching
							if (
								($isDutiable == 'Y' ? $this->dutiableCarrierMethods($carrier['method']) : $carrier['method']) == $serviceType 
							&&	$this_carrier['id_carrier'] == $id_carrier
							&&	$id_warehouse == $this->id_warehouse
							){							
								if ($carrier['extra_shipping_type'] == 2)
									$amount += $carrier['extra_shipping_amount'];
								elseif ($carrier['extra_shipping_type'] == 1)
									$amount += $carrier['extra_shipping_amount'] * $orderTotal / 100;
								elseif ($carrier['extra_shipping_type'] == 3)
									$amount += $carrier['extra_shipping_amount'] * $amount / 100;
									
								$this->saveLog('dhl_rate_log.txt', "ret_amount === $ret_amount\n\r", $log);
								$ret_amount =  number_format($amount,2,".","");
							}
						}              
						if (!$method_found && !$method_valid)
						{
							$this->saveLog('dhl_rate_log.txt', "\n 24.5) no method found ".print_r($this_carrier, true).", $dest_zip, $dest_country \n\r", $log);
							$this->saveInvalidDestination($this_carrier, $dest_zip, $dest_country);
						}
					}
					// Check free shipping
					if ($carrier['free_shipping'] > 0 && $carrier['free_shipping'] <= $orderTotal)
						return 0;

					$this->saveLog('dhl_rate_log.txt', "\n 25) (== $id_carrier) ret_amount $ret_amount TOTAL TIME: ".(time() - $st)."\n\r", $log);
				}
			}
			
			return (isset($ret_amount) ? $ret_amount : false);
		}
		elseif($xml)
		{				
			if (@$xml->GetQuoteResponse->BkgDetails->QtdShp)
			{         
				$ret_amount = false;
				$this_carriers = $this->getCarriers($id_zone, $cart, Tools::getValue($this->name.'_is_cart', false), $id_product);
				
				$duatiablePacks = $this->dutiablePacks();
				$EUCountries = $this->EUCountries();
				
				if(!strlen($dest_country))
					$isDutiable = 'N';
				elseif($dest_country != $origin_country && in_array($this->_dhl_pack, $duatiablePacks) === true)
				{
					if(in_array($origin_country, $EUCountries) === true)
					{
						if(in_array($dest_country, $EUCountries) === true)
							$isDutiable = 'N';
						else
							$isDutiable = 'Y';                        
					}
					else
						$isDutiable = 'Y';
				}
				else
					$isDutiable = 'N';
					
				foreach ($this_carriers as $this_carrier)
				{               
					$this->saveLog('dhl_rate_log.txt', "23) TIME4: ".(time() - $st)."\nGot rates, comparing to (".print_r($this_carrier, true).")\n\r", $log); 
					$method_found = false;
					$method_valid = false;
					foreach ($xml->GetQuoteResponse->BkgDetails->QtdShp as $rateReply)
					{                     
						$serviceType = $rateReply->GlobalProductCode;
						$this->saveLog('dhl_rate_log.txt', "!!!!!". $this_carrier['method']." == $serviceType ---  (".print_r($rateReply, true).")\n\r", $log);

						$amount_currency = $this->calculateAmount($rateReply, $this_carrier['exclude_taxes']);
						$amount = $amount_currency[0];
						if ($this->_dhl_enable_discount && (float)$this->_dhl_discount_rate > 0)
							$amount *= (float)$this->_dhl_discount_rate/100;
						$currency = $amount_currency[1];
						if (!$amount)
						{
							$this->saveLog('dhl_rate_log.txt', "23.5) NO AMOUNT BACK)\n\r", $log);
							continue;
						}
						
						$this_carrier['methodDutiable'] = $this_carrier['method'];
						if($isDutiable == 'Y')
							$this_carrier['methodDutiable'] = $this->dutiableCarrierMethods($this_carrier['method']);  

						// Check it there are no free shipping exceptions
						if ($this_carrier['methodDutiable'] == $serviceType)
						{
							if(isset($rateReply->id_carrier) && $rateReply->id_carrier != $this_carrier['id_carrier'])
								continue;
							
							$method_valid = true;
							if ($this_carrier['id_carrier'] == $id_carrier || ($fs_arr['free_shipping_product'] == '' && $fs_arr['free_shipping_category'] == '' &&
								$fs_arr['free_shipping_manufacturer'] == '' && $fs_arr['free_shipping_supplier'] == '' &&
								$this_carrier['free_shipping_product'] == '' && $this_carrier['free_shipping_category'] == '' &&
								$this_carrier['free_shipping_manufacturer'] == '' && $this_carrier['free_shipping_supplier'] == ''))
							{
								if ($this_carrier['id_carrier'] == $id_carrier)
									$method_found = true;
							}
							else
								continue;
						}
						else
							continue;    
							
						$rate_currency = Currency::getIdByIsoCode($currency);
						$this->saveLog('dhl_rate_log.txt', "return currency id = $rate_currency\n\r", $log);
						/** IF RATE CURRENCY IS NOT THE DEFAULT STORE'S CURRENCY */
						if($rate_currency && $rate_currency != Configuration::get('PS_CURRENCY_DEFAULT'))
						{
							$return_currency = new Currency($rate_currency);
							$amount = $amount / $return_currency->conversion_rate;
							
							$currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
							$currency = $currency->iso_code;
						}
						$this->saveLog('dhl_rate_log.txt', "amount in default currency = $amount\n\r", $log);

						$this->saveLog('dhl_rate_log.txt', "Writing to cache ".$this_carrier['id_carrier']."\n\r", $log);

						// Write to cache //
						$query = '
							INSERT INTO `'._DB_PREFIX_.'fe_dhl_rate_cache` 
							(
								`id_carrier`, 
								`origin_zip`, 
								`origin_country`, 
								`dest_zip`, 
								`dest_country`, 
								`method`, 
								`insurance`, 
								`dropoff`, 
								`packing`, 
								`packages`, 
								`weight`, 
								`rate`, 
								`currency`, 
								`quote_date`
							) VALUES (
								"'.$this_carrier['id_carrier'].'",
								"'.$this->_dhl_origin_zip.'",
								"'.$this->_dhl_origin_country.'",
								"'.$dest_zip.'","'.$dest_country.'",
								"'.$serviceType.'","'.$iamount.'",
								"'.$this->_dhl_dropoff.'",
								"'.$this->_dhl_pack.'",
								"'.sizeof($pack_dim).'",
								"'.$totalWeight.'",
								"'.$amount.'", 
								"'.$currency.'", 
								"'.time().'"
							)
						';
						Db::getInstance()->execute($query);
						$id_rate = Db::getInstance()->Insert_ID();

						// New hash cache
						$query = '
						INSERT INTO `'._DB_PREFIX_.'fe_dhl_hash_cache` 
						(
							`id_dhl_rate`, 
							`hash`, 
							`hash_date`
						) VALUES (
							"'.$id_rate.'",
							"'.$this->getHash($this_carrier['id_carrier'], $products, $id_product, $id_product_attribute, $qty, $dest_country, "", $dest_zip, false, $this->id_warehouse).'",
							"'.time().'"
						)';
						Db::getInstance()->execute($query);

						foreach ($pack_dim as $package)
						{
							$query = '
								INSERT INTO `'._DB_PREFIX_.'fe_dhl_package_rate_cache` 
								(
									`id_dhl_rate`, 
									`weight`, 
									`width`, 
									`height`, 
									`depth`
								) VALUES (
									"'.$id_rate.'",
									"'.$package['weight'].'",
									"'.$package['w'].'",
									"'.$package['h'].'",
									"'.$package['d'].'"
								)
							';
							Db::getInstance()->execute($query);
						}

						$this->saveLog('dhl_rate_log.txt', "24) $query\n\r", $log);
						$this->saveLog('dhl_rate_log.txt', "24.1) if (".$carrier['method']." == $serviceType && ".$this_carrier['id_carrier']." == $id_carrier)\n\r", $log);					
						// Only calculate ret_amount for the selected carrier, for all other matches, we're only caching
						if (
							($isDutiable == 'Y' ? $this->dutiableCarrierMethods($carrier['method']) : $carrier['method']) == $serviceType 
						&&	$this_carrier['id_carrier'] == $id_carrier
						){							
							if ($carrier['extra_shipping_type'] == 2)
								$amount += $carrier['extra_shipping_amount'];
							elseif ($carrier['extra_shipping_type'] == 1)
								$amount += $carrier['extra_shipping_amount'] * $orderTotal / 100;
							elseif ($carrier['extra_shipping_type'] == 3)
								$amount += $carrier['extra_shipping_amount'] * $amount / 100;
								
							$this->saveLog('dhl_rate_log.txt', "ret_amount === $ret_amount\n\r", $log);
							$ret_amount =  number_format($amount,2,".","");
						}
					}              
					if (!$method_found && !$method_valid)
					{
						$this->saveLog('dhl_rate_log.txt', "\n 24.5) no method found ".print_r($this_carrier, true).", $dest_zip, $dest_country \n\r", $log);
						$this->saveInvalidDestination($this_carrier, $dest_zip, $dest_country);
					}
				}
				// Check free shipping
				if ($carrier['free_shipping'] > 0 && $carrier['free_shipping'] <= $orderTotal)
					return 0;

				$this->saveLog('dhl_rate_log.txt', "\n 25) (== $id_carrier) ret_amount $ret_amount TOTAL TIME: ".(time() - $st)."\n\r", $log);

				return $ret_amount;
			}
			else
			{
				$this->saveInvalidDestination($carrier, $dest_zip, $dest_country);
				return false;
			}
		}
	}

	protected function validateUSZip($zip)
	{
		$log = false;
		$date = date('Y-m-d');

		$error_code = null;
		do
		{
			$post_string =
		'<?xml version="1.0" encoding="UTF-8"?>
		<p:DCTRequest xmlns:p="http://www.dhl.com" xmlns:p1="http://www.dhl.com/datatypes" xmlns:p2="http://www.dhl.com/DCTRequestdatatypes" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com DCT-req.xsd ">
			<GetCapability>
				<Request>
					<ServiceHeader>
						<MessageTime>'.date('c').'</MessageTime>
						<MessageReference>'.$this->generateMessageReference().'</MessageReference>
						<SiteID>'.$this->_dhl_site_id.'</SiteID>
						<Password>'.$this->_dhl_pass.'</Password>
					</ServiceHeader>
				</Request>
				<From>
					<CountryCode>US</CountryCode>
					<Postalcode>20500</Postalcode>
				</From>
				<BkgDetails>
					<PaymentCountryCode>US</PaymentCountryCode>
					<Date>'.$date.'</Date>
					<ReadyTime>PT10H21M</ReadyTime>
					<ReadyTimeGMTOffset>+01:00</ReadyTimeGMTOffset>
					<DimensionUnit>CM</DimensionUnit>
					<WeightUnit>KG</WeightUnit>
					<Pieces>
						<Piece>
							<PieceID>1</PieceID>
							<Height>30</Height>
							<Depth>20</Depth>
							<Width>10</Width>
							<Weight>10.0</Weight>
						</Piece>
					</Pieces>
					<IsDutiable>N</IsDutiable>
					<NetworkTypeCode>AL</NetworkTypeCode>
				</BkgDetails>
				<To>
					<CountryCode>US</CountryCode>
					<Postalcode>'.$zip.'</Postalcode>
				</To>
			</GetCapability>
		</p:DCTRequest>
		';

			$post_response = $this->curl_post($this->getServerURL(), $post_string);
			$xml = simplexml_load_string($post_response);

			$error_code = @$xml->GetCapabilityResponse->Note->Condition->ConditionCode;
			$date = date('Y-m-d', strtotime('+1 day', strtotime($date)));

		} while($error_code == '1003');

//		$this->saveLog(
//			'dhl_xml_log.txt',
//			date("D M j G:i:s").") Validate US Zip Request:\n$post_string\n------------------------------------------------------------------------------------------------\n\nResponse:\n ".print_r($xml,true).'\n\n\n',
//			$this->_dhl_xml_log
//		);
		$this->saveLog('dhl_validate_zip.txt', "\n 1) $post_response", $log);

		if (isset($xml->GetCapabilityResponse->Note->Condition->ConditionCode))
			return false;
		else
			return true;
	}

	protected function getOrderTotalWeight($id_cart, $id_product, $qty, $totalWeight)
	{
		if ($id_product == 0)
		{
			$result = Db::getInstance()->getRow('
				SELECT SUM((p.`weight` + pa.`weight`) * cp.`quantity`) as nb
				FROM `'._DB_PREFIX_.'cart_product` cp
				LEFT JOIN `'._DB_PREFIX_.'product` p ON cp.`id_product` = p.`id_product`
				LEFT JOIN `'._DB_PREFIX_.'product_attribute` pa ON cp.`id_product_attribute` = pa.`id_product_attribute`
				WHERE (cp.`id_product_attribute` IS NOT NULL AND cp.`id_product_attribute` != 0)
				AND cp.`id_cart` = '.(int)($id_cart));
			$result2 = Db::getInstance()->getRow('
				SELECT SUM(p.`weight` * cp.`quantity`) as nb
				FROM `'._DB_PREFIX_.'cart_product` cp
				LEFT JOIN `'._DB_PREFIX_.'product` p ON cp.`id_product` = p.`id_product`
				WHERE (cp.`id_product_attribute` IS NULL OR cp.`id_product_attribute` = 0)
				AND cp.`id_cart` = '.(int)($id_cart));
			$totalWeight = round((float)($result['nb']) + (float)($result2['nb']), 3);
		}
		else
			$totalWeight *= $qty;
		// Convert Weight to lbs or kgs based on dhl default
		if ($this->_dhl_unit == 'LBS')
			$totalWeight = $this->getWeightInLb($totalWeight);
		else
			$totalWeight = $this->getWeightInKg($totalWeight);

		return $totalWeight;
	}

	protected function getTotal($product_price, $qty, $cart)
	{
		if ($product_price > 0)
			$orderTotal = $product_price * $qty;
		else
			$orderTotal = $cart->getOrderTotal(true, 7);

		return $orderTotal;
	}

	protected function getCustomerInfo($id_zone, $dest_zip, $dest_country, $dest_city, $cart)
	{
		$cookie_zip = $this->context->cookie->postcode ? $this->context->cookie->postcode :$this->context->cookie->pc_dest_zip;
		$cookie_country = $this->context->cookie->id_country ? $this->context->cookie->id_country :$this->context->cookie->pc_dest_country;
		
		// Check if customer is logged in, and cart has an address selected.
		if ($cart->id_address_delivery > 0 && $this->context->customer->logged)
		{
			$address = new Address(intval($cart->id_address_delivery));
			if (!Validate::isLoadedObject($address))
			{
				$id_address = Address::getFirstCustomerAddressId($cart->id_customer, true);
				if ($id_address > 0)
					$address = new Address(intval($id_address));
				if (!Validate::isLoadedObject($address))
					return false;
			}

			if ($dest_zip == "")
				$dest_zip = $address->postcode;

			$country = new Country($address->id_country);
			if ($dest_country == "")
				$dest_country = $country->iso_code;

			if($dest_city == "")
				$dest_city = $address->city;
		}
		else
		{
			if ($dest_zip == "" && $cookie_zip)
			{
				$dest_zip = $cookie_zip;
				$dest_city = $this->context->cookie->pc_dest_city;
			}
			else if ($dest_zip == "" && $this->_dhl_address_display['zip'] == 1)
				return false;

			if($dest_country == "" && $cookie_country)
			{
				$dest_country = $cookie_country;
				$country = new Country($dest_country);
				$dest_country = $country->iso_code;
			}
		}

		if((int)$id_zone == 0)
		{
			$id_country = $cookie_country;
			if((int)$id_country > 0)
				$id_zone = Country::getIdZone($id_country);
			if((int)$id_country == 0 OR (int)$id_zone == 0)
				return false;
		}

		return array(
			'dest_zip' => $dest_zip,
			'dest_country' => $dest_country,
			'dest_city' => $dest_city,
			'id_zone' => $id_zone,
		);
	}

	protected function checkInvalidDestination($carrier, $dest_zip, $dest_country, $log)
	{
		$cache_timeout = 180; // Seconds.
		$query = '
			SELECT *
			FROM `'._DB_PREFIX_.'fe_dhl_invalid_dest`
			WHERE method = "'.$carrier['method'].'" AND zip = "'.$dest_zip.'" AND country = "'.$dest_country.'" AND ondate > '.(time()-$cache_timeout);

		$this->saveLog('dhl_rate_log.txt', "\n\r9) Invalid query $query\n\r", $log);

		$invalid_dest = Db::getInstance()->executeS($query);

		return $invalid_dest;
	}

	protected function calculateInsurance($carrier, $orderTotal, $id_product, $products, $qty, $cart)
	{
		$iamount = 0;
		if ($carrier['insurance_type'] != 0)
		{
			if ($orderTotal >= $carrier['insurance_minimum'])
			{
				if ($id_product == 0)
				{
					if ($carrier['insurance_type'] == 1)
					{
						$order_total = 0;
						foreach ($products AS $product)
						{
							$pro = new Product($product['id_product']);
							$price = floatval($pro->wholesale_price);
							$total_price = $price * intval($product['cart_quantity']);
							$order_total += $total_price;
						}
						$iamount = $order_total;
					}
					else if ($carrier['insurance_type'] == 2)
						$iamount = floatval($carrier['insurance_amount']) * $orderTotal / 100;
				}
				else
				{
					$pro = new Product($id_product);
					if ($carrier['insurance_type'] == 1)
						$iamount = floatval($pro->wholesale_price) * $qty;
					else if ($carrier['insurance_type'] == 2)
						$iamount = floatval($carrier['insurance_amount']) * (floatval($pro->price) * $qty) / 100;
				}
				$iamount = number_format($iamount, 2, '.', '');
				if ($cart->id_currency != Configuration::get('PS_CURRENCY_DEFAULT'))
				{
					$currency = new Currency($cart->id_currency);
					$iamount = Tools::convertPrice($iamount, $currency);
				}
				if ($carrier['insurance_minimum'] > $orderTotal)
					$iamount = 0;
			}
		}

		return $iamount;
	}

	protected function saveInvalidDestination($carrier, $dest_zip, $dest_country)
	{
		// Delete any old records in cache.
		$query = '
			DELETE
			FROM `'._DB_PREFIX_.'fe_dhl_invalid_dest`
			WHERE method = "'.$carrier['method'].'" AND zip = "'.$dest_zip.'" AND country = "'.$dest_country.'"';
		Db::getInstance()->execute($query);
		// Add invalid zip / carrier to cache.
		$query = '
			INSERT INTO `'._DB_PREFIX_.'fe_dhl_invalid_dest`
			(method, zip, country, ondate)
			VALUES ("'.$carrier['method'].'","'.$dest_zip.'","'.$dest_country.'","'.time().'")
		';
		Db::getInstance()->execute($query);
	}

	protected function requestRate($pack_dim, $iamount, $dest_country, $dest_zip, $dest_city, $log, $carrier_method = false, $noRequest = false, $id_warehouse = false)
	{
		$message_reference = $this->generateMessageReference();
		$dimension_unit = $this->_dhl_unit == 'LBS' ? 'IN' : 'CM';
		$weight_unit = $this->_dhl_unit == 'LBS' ? 'LB' : 'KG';
		$currency = new Currency(Configuration::get('PS_CURRENCY_DEFAULT'));
		$date = date('Y-m-d');
		
		$duatiablePacks = $this->dutiablePacks();
		$EUCountries = $this->EUCountries();
		
		if(!$id_warehouse)
			$id_warehouse = $this->id_warehouse;
		
		$warehouse_address = new Address();
		if($id_warehouse)                     
		{                                                                     
			$warehouse = new Warehouse($id_warehouse);
			if(Validate::isLoadedObject($warehouse))
				$warehouse_address = new Address($warehouse->id_address);
		}
		
		$payment_country = $this->_dhl_payment_country;
		if(Validate::isLoadedObject($warehouse_address))
		{
			$warehouse_country = new Country($warehouse_address->id_country);
			$origin_country = $warehouse_country->iso_code; 
			$origin_zip = $warehouse_address->postcode; 
			$origin_city = $warehouse_address->city; 
			
			$warehouses_payment_country = Configuration::get('DHL_WAREHOUSES_PAYMENT_COUNTRY');
			$warehouses_payment_country = unserialize($warehouses_payment_country);
			
			$payment_country = (isset($warehouses_payment_country[$id_warehouse]) ? $warehouses_payment_country[$id_warehouse] : $this->_dhl_payment_country); 
		}

		if(!isset($origin_country) || !isset($origin_zip) || !isset($origin_city))
		{
			$origin_country = $this->_dhl_origin_country;  
			$origin_zip = $this->_dhl_origin_zip;  
			$origin_city = $this->_dhl_origin_city;  
			$payment_country = $this->_dhl_payment_country;
		}
		
		if(!strlen($dest_country))
			$isDutiable = 'N';
		elseif($dest_country != $origin_country && in_array($this->_dhl_pack, $duatiablePacks) === true)
		{
			if(in_array($origin_country, $EUCountries) === true)
			{
				if(in_array($dest_country, $EUCountries) === true)
					$isDutiable = 'N';
				else
					$isDutiable = 'Y';                        
			}
			else
				$isDutiable = 'Y';
		}
		else
			$isDutiable = 'N';
			
		if($isDutiable == 'Y')
		{
			$cart = $this->context->cart;      
			
			$declaredValue = $cart->getOrderTotal(true, Cart::ONLY_PRODUCTS);
			if(!$declaredValue && Tools::getValue('id_product'))
			{
				$product = new Product(Tools::getValue('id_product'));
				$declaredValue = $product->price;				
			}
			
			$declaredCurrency = new Currency($cart->id_currency);
			$declaredCurrency = $declaredCurrency->iso_code;  
		}

		$error_code = null;
		do
		{
			$post_string = '
			<?xml version="1.0" encoding="UTF-8"?>
			<p:DCTRequest xmlns:p="http://www.dhl.com" xmlns:p1="http://www.dhl.com/datatypes" xmlns:p2="http://www.dhl.com/DCTRequestdatatypes" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.dhl.com DCT-req.xsd ">
				<GetQuote>
					<Request>
						<ServiceHeader>
							<MessageTime>'.date('c').'</MessageTime>
							<MessageReference>'.$message_reference.'</MessageReference>
							<SiteID>'.$this->_dhl_site_id.'</SiteID>
							<Password>'.$this->_dhl_pass.'</Password>
						</ServiceHeader>
					</Request>
					<From>
						<CountryCode>'.$origin_country.'</CountryCode>
						<Postalcode>'.$origin_zip.'</Postalcode>
						<City>'.$origin_city.'</City>
					</From>
					<BkgDetails>
						<PaymentCountryCode>IT</PaymentCountryCode>
                                                <Date>'.$date.'</Date>
						<ReadyTime>PT10H21M</ReadyTime>
						<DimensionUnit>'.$dimension_unit.'</DimensionUnit>
						<WeightUnit>'.$weight_unit.'</WeightUnit>';
						
						if($carrier_method)
							$post_string .= '<ProductCode>'.$carrier_method.'</ProductCode>';	

						$post_string .= '
						<Pieces>';
						$counter = 1;
						foreach ($pack_dim as $pack) 
						{
							if($this->_dhl_pack == 'EE') //if express letter
							{
								$post_string .= '
								<Piece>
									<PieceID>'.$counter.'</PieceID>
									<Weight>'.$pack['weight'].'</Weight>
								</Piece>';
							}
							else {
								$post_string .= '
								<Piece>
									<PieceID>'.$counter.'</PieceID>
									<Height>'.$pack['h'].'</Height>
									<Depth>'.$pack['d'].'</Depth>
									<Width>'.$pack['w'].'</Width>
									<Weight>'.$pack['weight'].'</Weight>
								</Piece>';
							}
							$counter++;
						}
						$post_string .= '
						</Pieces>';

						if($this->_dhl_account_number AND strlen($this->_dhl_account_number))
						{
							$post_string .= '
								<PaymentAccountNumber>'.$this->_dhl_account_number.'</PaymentAccountNumber>
							';
						}

						$post_string .=
						'<IsDutiable>'.$isDutiable.'</IsDutiable>
						<NetworkTypeCode>AL</NetworkTypeCode>   
						<QtdShp>
						';                 
						if(strlen($this->_dhl_dropoff))
						{
							$post_string .= '
							<QtdShpExChrg>
								<SpecialServiceType>'.$this->_dhl_dropoff.'</SpecialServiceType>
							</QtdShpExChrg>
							';
						}
						$post_string .= '
						</QtdShp>';
						if($iamount > 0)
						{
							$post_string .= '  
							<InsuredValue>'.$iamount.'</InsuredValue>
							<InsuredCurrency>'.$currency->iso_code.'</InsuredCurrency>';
						}
						$post_string .= '
					</BkgDetails>
					<To>
						<CountryCode>'.$dest_country.'</CountryCode>
						<Postalcode>'.$dest_zip.'</Postalcode>
						'.($dest_city ? '<City>'.$dest_city.'</City>' : '').'
					</To>';
					
					if($isDutiable == 'Y')
					{
						$post_string .= '
							<Dutiable>
								<DeclaredCurrency>'.$declaredCurrency.'</DeclaredCurrency>
								<DeclaredValue>'.number_format($declaredValue, 3, '.', '').'</DeclaredValue>
							</Dutiable>
						';
					}
					
				$post_string .= '
				</GetQuote>
			</p:DCTRequest>';

			if($noRequest)
				return $post_string;
			
			$post_response = $this->curl_post($this->getServerURL(), $post_string);
			$this->saveLog('dhl_rate_log.txt', "23) ".$this->getServerURL()." = ".print_r($post_string,true)."\n", $log);
			$this->saveLog('dhl_rate_log.txt', "23) ".print_r($post_response,true)."\n", $log);
			if($post_response == 28) //timeout
			{
				$this->saveLog('dhl_rate_log.txt', "23) ".$this->getServerURL()." = ".print_r($post_string,true)."\n", $log);
				Configuration::updateValue('DHL_DOWN_TIME', time());
				return false;
			}

			$xml = simplexml_load_string($post_response);
			if (isset($xml->GetQuoteResponse))
				$error_code = @$xml->GetQuoteResponse->Note->Condition->ConditionCode;			
			$date = date('Y-m-d', strtotime('+1 day', strtotime($date)));

		} while($error_code == '1003'); //do while error will be non "Pick-up service is not provided on this day."

		if($xml !== false)
		{
			$this->saveLog(
				$this->_dhl_log_filename,
				'// ------- Request: '.
				($this->id_warehouse ? 
					'(Products: '.$this->products_id_list.', coming from Warehouse: [#'.$warehouse->id.' - ref:'.$warehouse->reference.'] '.$warehouse->name.')'
				: '')."\n\r".
				$post_string."\n\r".
				'// ------- Response: '."\n\r".print_r($xml, true)."\n\r
				\n\r", 
				$this->_dhl_xml_log
			);
		}
		else
		{
			$this->saveLog($this->_dhl_log_filename, 
				'// ------- Server Error: '.$post_response.' - Please contact your hosting provider for more details'."\n\r",
			$this->_dhl_xml_log);
		}

		return $xml;
	}

	protected function calculateAmount($rateReply, $without_taxes = false)
	{
		if(!$rateReply->ShippingCharge)
			return false;

		if($this->_dhl_currency_used == 'PULCL')
		{
			if( $without_taxes
			&&	isset($rateReply->QtdSInAdCur[1]->WeightChargeTaxDet) 
			&&	isset($rateReply->QtdSInAdCur[1]->WeightChargeTaxDet->BaseAmt) 
			&&	floatval($rateReply->QtdSInAdCur[1]->WeightChargeTaxDet->BaseAmt) > 0
			&&	isset($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[1])
			&&	isset($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[1]->ChargeValue)
			&&	floatval($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[1]->ChargeValue) > 0
			)
				$amount = floatval($rateReply->QtdSInAdCur[1]->WeightChargeTaxDet->BaseAmt) + floatval($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[1]->ChargeValue);
			else
				$amount = floatval($rateReply->QtdSInAdCur[1]->TotalAmount);
				
			$currency = $rateReply->QtdSInAdCur[1]->CurrencyCode;
		}
		elseif($this->_dhl_currency_used == 'BASEC')
		{
			if( $without_taxes
			&&	isset($rateReply->QtdSInAdCur[2]->WeightChargeTaxDet) 
			&&	isset($rateReply->QtdSInAdCur[2]->WeightChargeTaxDet->BaseAmt) 
			&&	floatval($rateReply->QtdSInAdCur[2]->WeightChargeTaxDet->BaseAmt) > 0
			&&	isset($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[2])
			&&	isset($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[2]->ChargeValue)
			&&	floatval($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[2]->ChargeValue) > 0
			)
				$amount = floatval($rateReply->QtdSInAdCur[2]->WeightChargeTaxDet->BaseAmt) + floatval($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[2]->ChargeValue);
			else
				$amount = floatval($rateReply->QtdSInAdCur[2]->TotalAmount);
				
			$currency = $rateReply->QtdSInAdCur[2]->CurrencyCode;
		}
		else
		{
			if( $without_taxes
			&&	isset($rateReply->QtdSInAdCur[0]->WeightChargeTaxDet) 
			&&	isset($rateReply->QtdSInAdCur[0]->WeightChargeTaxDet->BaseAmt) 
			&&	floatval($rateReply->QtdSInAdCur[0]->WeightChargeTaxDet->BaseAmt) > 0
			&&	isset($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[0])
			&&	isset($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[0]->ChargeValue)
			&&	floatval($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[0]->ChargeValue) > 0
			)
				$amount = floatval($rateReply->QtdSInAdCur[0]->WeightChargeTaxDet->BaseAmt) + floatval($rateReply->QtdShpExChrg->QtdSExtrChrgInAdCur[0]->ChargeValue);
			else
				$amount = floatval($rateReply->QtdSInAdCur[0]->TotalAmount);
				
			$currency = $rateReply->QtdSInAdCur[0]->CurrencyCode;
		}

		return array($amount, $currency);
	}
	
	public function getWarehouseByProductsList($products)
	{           
		$this->package_list = $this->context->cart->getPackageList();     
		$notFake = false;                                                                                           
		if(is_array($this->package_list) && count($this->package_list))
		{
			foreach($this->package_list as $warehouses)
			{
				if(is_array($warehouses) && count($warehouses))
				{
					foreach($warehouses as $warehouse)
					{                       
						$found = 0;                
						if(is_array($warehouse['product_list']) && count($warehouse['product_list']))
						{
							foreach($warehouse['product_list'] as $product_list)
							{
								if(is_array($products) && count($products))
								{
									foreach($products as $product)
									{
										if(
											$product['id_product'] == $product_list['id_product']
										&&	$product['id_product_attribute'] == $product_list['id_product_attribute']
										){
											$found += 1;
										}
										else
											$found -= 1;
									}
								}
							}
							
							if($found == count($warehouse['product_list']))
							{
								$notFake = true;	
								$this->id_warehouse = $warehouse['id_warehouse'];
								$this->warehouse_carrier_list = $warehouse['carrier_list'];
							}
						}					
					}
				}
			}
		}
		
		return $notFake;
	}
}