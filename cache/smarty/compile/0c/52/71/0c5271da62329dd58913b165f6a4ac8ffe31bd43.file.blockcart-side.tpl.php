<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:35
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blockcart_mod\views\templates\hook\blockcart-side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2038256d9d667c852c1-74913405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c5271da62329dd58913b165f6a4ac8ffe31bd43' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blockcart_mod\\views\\templates\\hook\\blockcart-side.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2038256d9d667c852c1-74913405',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'PS_CATALOG_MODE' => 0,
    'blockcart_top' => 0,
    'colapseExpandStatus' => 0,
    'ajax_allowed' => 0,
    'products' => 0,
    'product' => 0,
    'link' => 0,
    'cartSize' => 0,
    'productId' => 0,
    'productAttributeId' => 0,
    'customizedDatas' => 0,
    'static_token' => 0,
    'priceDisplay' => 0,
    'id_customization' => 0,
    'CUSTOMIZE_TEXTFIELD' => 0,
    'customization' => 0,
    'discounts' => 0,
    'discount' => 0,
    'cart' => 0,
    'page_name' => 0,
    'shipping_cost_float' => 0,
    'cart_qties' => 0,
    'free_ship' => 0,
    'shipping_cost' => 0,
    'show_wrapping' => 0,
    'cart_flag' => 0,
    'show_tax' => 0,
    'tax_cost' => 0,
    'total' => 0,
    'use_taxes' => 0,
    'display_tax_label' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d668de1132_91662070',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d668de1132_91662070')) {function content_56d9d668de1132_91662070($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\tools\\smarty\\plugins\\modifier.replace.php';
?>
<!-- /MODULE Rightbar cart -->
<nav class="st-menu" id="side_products_cart">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Shopping cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</h3>
		    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'blockcart_mod'),$_smarty_tpl);?>
"><i class="icon-angle-double-right icon-0x"></i></a>
			</div>
			<div id="side_cart_block" class="cart_block exclusive">
				<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
				<div class="block_content">
					<div class="cart_block_list<?php if (isset($_smarty_tpl->tpl_vars['blockcart_top']->value)&&!$_smarty_tpl->tpl_vars['blockcart_top']->value) {?><?php if (isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)&&$_smarty_tpl->tpl_vars['colapseExpandStatus']->value=='expanded'||!$_smarty_tpl->tpl_vars['ajax_allowed']->value||!isset($_smarty_tpl->tpl_vars['colapseExpandStatus']->value)) {?> expanded<?php } else { ?> collapsed unvisible<?php }?><?php }?>">
						<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
							<dl class="products">
								<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['product']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['product']->last;
?>
									<?php $_smarty_tpl->tpl_vars['productId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['productAttributeId'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value['id_product_attribute'], null, 0);?>
									<dt data-id="cart_block_product_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) {?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php } else { ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']) {?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php } else { ?>0<?php }?>" class="clearfix <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?>">
										<a class="cart-images" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'cart_default');?>
" width="<?php echo $_smarty_tpl->tpl_vars['cartSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['cartSize']->value['height'];?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="replace-2x" /></a>

										<span class="quantity-formated"><span class="quantity"><?php echo $_smarty_tpl->tpl_vars['product']->value['cart_quantity'];?>
</span>x</span><a class="cart_block_product_name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],25,'...'), ENT_QUOTES, 'UTF-8', true);?>
</a>
										<span class="remove_link">
											<?php if (!isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value])&&(!isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])||!$_smarty_tpl->tpl_vars['product']->value['is_gift'])) {?>
												<a class="ajax_cart_block_remove_link" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp7=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp8=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php $_tmp9=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"delete=1&id_product=".$_tmp7."&ipa=".$_tmp8."&id_address_delivery=".$_tmp9."&token=".((string)$_smarty_tpl->tpl_vars['static_token']->value)), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'remove this product from my cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
"><i class="icon-cancel"></i></a>
											<?php }?>
										</span>
										<span class="price">
											<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['is_gift'])||!$_smarty_tpl->tpl_vars['product']->value['is_gift']) {?>
												<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==@constant('PS_TAX_EXC')) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>((string)$_smarty_tpl->tpl_vars['product']->value['total'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>((string)$_smarty_tpl->tpl_vars['product']->value['total_wt'])),$_smarty_tpl);?>
<?php }?>
												<div class="hookDisplayProductPriceBlock-price">
                                                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price",'from'=>"blockcart"),$_smarty_tpl);?>

                                                </div>
											<?php } else { ?>
												<?php echo smartyTranslate(array('s'=>'Free!','mod'=>'blockcart_mod'),$_smarty_tpl);?>

											<?php }?>
										</span>
										<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?>
											<div class="product-atributes">
												<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],null,null,$_smarty_tpl->tpl_vars['product']->value['id_shop'],$_smarty_tpl->tpl_vars['product']->value['id_product_attribute']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Product detail','mod'=>'blockcart_mod'),$_smarty_tpl);?>
"><?php echo $_smarty_tpl->tpl_vars['product']->value['attributes_small'];?>
</a>
											</div>
										<?php }?>
									</dt>
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?>
										<dd data-id="cart_block_combination_of_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) {?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php }?>_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?>">
									<?php }?>
									<!-- Customizable datas -->
									<?php if (isset($_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']])) {?>
										<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?>
											<dd data-id="cart_block_combination_of_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']) {?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php } else { ?>0<?php }?>_<?php if ($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']) {?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
<?php } else { ?>0<?php }?>" class="<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } else { ?>item<?php }?>">
										<?php }?>
										<ul class="cart_block_customizations" data-id="customization_<?php echo $_smarty_tpl->tpl_vars['productId']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['productAttributeId']->value;?>
">
											<?php  $_smarty_tpl->tpl_vars['customization'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['customization']->_loop = false;
 $_smarty_tpl->tpl_vars['id_customization'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['customizedDatas']->value[$_smarty_tpl->tpl_vars['productId']->value][$_smarty_tpl->tpl_vars['productAttributeId']->value][$_smarty_tpl->tpl_vars['product']->value['id_address_delivery']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['customization']->key => $_smarty_tpl->tpl_vars['customization']->value) {
$_smarty_tpl->tpl_vars['customization']->_loop = true;
 $_smarty_tpl->tpl_vars['id_customization']->value = $_smarty_tpl->tpl_vars['customization']->key;
?>
												<li name="customization">
													<div data-id="deleteCustomizableProduct_<?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
_<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_address_delivery']);?>
" class="deleteCustomizableProduct">
														<a class="ajax_cart_block_remove_link" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp10=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']);?>
<?php $_tmp11=ob_get_clean();?><?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['id_customization']->value);?>
<?php $_tmp12=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink("cart",true,null,"delete=1&id_product=".$_tmp10."&ipa=".$_tmp11."&id_customization=".$_tmp12."&token=".((string)$_smarty_tpl->tpl_vars['static_token']->value)), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow">&nbsp;</a>
													</div>
													<?php if (isset($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0])) {?>
														<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(smarty_modifier_replace($_smarty_tpl->tpl_vars['customization']->value['datas'][$_smarty_tpl->tpl_vars['CUSTOMIZE_TEXTFIELD']->value][0]['value'],"<br />"," "),28,'...'), ENT_QUOTES, 'UTF-8', true);?>

													<?php } else { ?>
														<?php echo smartyTranslate(array('s'=>'Customization #%d:','sprintf'=>intval($_smarty_tpl->tpl_vars['id_customization']->value),'mod'=>'blockcart_mod'),$_smarty_tpl);?>

													<?php }?>
												</li>
											<?php } ?>
										</ul>
										<?php if (!isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?></dd><?php }?>
									<?php }?>
									<?php if (isset($_smarty_tpl->tpl_vars['product']->value['attributes_small'])) {?></dd><?php }?>
								<?php } ?>
							</dl>
						<?php }?>
						<p class="cart_block_no_products<?php if ($_smarty_tpl->tpl_vars['products']->value) {?> unvisible<?php }?> alert alert-warning">
							<?php echo smartyTranslate(array('s'=>'No products','mod'=>'blockcart_mod'),$_smarty_tpl);?>

						</p>
						<?php if (count($_smarty_tpl->tpl_vars['discounts']->value)>0) {?>
							<table class="vouchers<?php if (count($_smarty_tpl->tpl_vars['discounts']->value)==0) {?> unvisible<?php }?>">
								<?php  $_smarty_tpl->tpl_vars['discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['discount']->key => $_smarty_tpl->tpl_vars['discount']->value) {
$_smarty_tpl->tpl_vars['discount']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['discount']->value['value_real']>0) {?>
										<tr class="bloc_cart_voucher" data-id="bloc_cart_voucher_<?php echo intval($_smarty_tpl->tpl_vars['discount']->value['id_discount']);?>
">
											<td class="quantity" width="10%">1x</td>
											<td class="name" title="<?php echo $_smarty_tpl->tpl_vars['discount']->value['description'];?>
" width="60%">
												<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['discount']->value['name'],18,'...'), ENT_QUOTES, 'UTF-8', true);?>

											</td>
											<td class="price">
												-<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_tax_exc']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['discount']->value['value_real']),$_smarty_tpl);?>
<?php }?>
											</td>
											<td class="delete">
												<?php if (strlen($_smarty_tpl->tpl_vars['discount']->value['code'])) {?>
													<a class="delete_voucher hidden" href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true);?>
?deleteDiscount=<?php echo intval($_smarty_tpl->tpl_vars['discount']->value['id_discount']);?>
" title="<?php echo smartyTranslate(array('s'=>'Delete','mod'=>'blockcart_mod'),$_smarty_tpl);?>
" rel="nofollow">
														<i class="icon-cancel"></i>
													</a>
												<?php }?>
											</td>
										</tr>
									<?php }?>
								<?php } ?>
							</table>
						<?php }?>
						<?php $_smarty_tpl->tpl_vars['free_ship'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['cart']->value->getDeliveryAddressesWithoutCarriers(true)), null, 0);?>
						<div class="cart-prices <?php if (!$_smarty_tpl->tpl_vars['products']->value) {?> unvisible<?php }?>">
							<div class="cart-prices-line first-line">
								<span class="price cart_block_shipping_cost ajax_cart_shipping_cost<?php if (!($_smarty_tpl->tpl_vars['page_name']->value=='order-opc')&&$_smarty_tpl->tpl_vars['shipping_cost_float']->value==0&&(!$_smarty_tpl->tpl_vars['cart_qties']->value||$_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()||!isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)||!$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery||$_smarty_tpl->tpl_vars['free_ship']->value)) {?> unvisible<?php }?>">
									<?php if ($_smarty_tpl->tpl_vars['shipping_cost_float']->value==0) {?>
										<?php if (!($_smarty_tpl->tpl_vars['page_name']->value=='order-opc')&&(!isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)||!$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)) {?><?php echo smartyTranslate(array('s'=>'To be determined','mod'=>'blockcart_mod'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Free shipping!','mod'=>'blockcart_mod'),$_smarty_tpl);?>
<?php }?>
									<?php } else { ?>
										<?php echo $_smarty_tpl->tpl_vars['shipping_cost']->value;?>

									<?php }?>
								</span>
								<span<?php if (!($_smarty_tpl->tpl_vars['page_name']->value=='order-opc')&&$_smarty_tpl->tpl_vars['shipping_cost_float']->value==0&&(!$_smarty_tpl->tpl_vars['cart_qties']->value||$_smarty_tpl->tpl_vars['cart']->value->isVirtualCart()||!isset($_smarty_tpl->tpl_vars['cart']->value->id_address_delivery)||!$_smarty_tpl->tpl_vars['cart']->value->id_address_delivery||$_smarty_tpl->tpl_vars['free_ship']->value)) {?> class="unvisible"<?php }?>>
									<?php echo smartyTranslate(array('s'=>'Shipping','mod'=>'blockcart_mod'),$_smarty_tpl);?>

								</span>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['show_wrapping']->value) {?>
								<div class="cart-prices-line">
									<?php $_smarty_tpl->tpl_vars['cart_flag'] = new Smarty_variable(constant('Cart::ONLY_WRAPPING'), null, 0);?>
									<span class="price cart_block_wrapping_cost">
										<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(false,$_smarty_tpl->tpl_vars['cart_flag']->value)),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['cart']->value->getOrderTotal(true,$_smarty_tpl->tpl_vars['cart_flag']->value)),$_smarty_tpl);?>

										<?php }?>
									</span>
									<span>
										<?php echo smartyTranslate(array('s'=>'Wrapping','mod'=>'blockcart_mod'),$_smarty_tpl);?>

									</span>
							   </div>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['show_tax']->value&&isset($_smarty_tpl->tpl_vars['tax_cost']->value)) {?>
								<div class="cart-prices-line">
									<span class="price cart_block_tax_cost ajax_cart_tax_cost"><?php echo $_smarty_tpl->tpl_vars['tax_cost']->value;?>
</span>
									<span><?php echo smartyTranslate(array('s'=>'Tax','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</span>
								</div>
							<?php }?>
							<div class="cart-prices-line last-line">
								<span class="price cart_block_total ajax_block_cart_total"><?php echo $_smarty_tpl->tpl_vars['total']->value;?>
</span>
								<span><?php echo smartyTranslate(array('s'=>'Total','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</span>
							</div>
							<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&$_smarty_tpl->tpl_vars['display_tax_label']->value&&$_smarty_tpl->tpl_vars['show_tax']->value) {?>
								<p>
								<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==0) {?>
									<?php echo smartyTranslate(array('s'=>'Prices are tax included','mod'=>'blockcart_mod'),$_smarty_tpl);?>

								<?php } elseif ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
									<?php echo smartyTranslate(array('s'=>'Prices are tax excluded','mod'=>'blockcart_mod'),$_smarty_tpl);?>

								<?php }?>
								</p>
							<?php }?>
						</div>
						<div class="cart-buttons<?php if (!$_smarty_tpl->tpl_vars['products']->value) {?> unvisible<?php }?> row">
							<div class="col-xs-6">
								<span class="side_continue btn btn-default btn-bootstrap" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'blockcart_mod'),$_smarty_tpl);?>
">
									<?php echo smartyTranslate(array('s'=>'Close','mod'=>'blockcart_mod'),$_smarty_tpl);?>

								</span>
							</div>
							<div class="col-xs-6">
								<a class="btn btn-default btn-bootstrap" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink(((string)$_smarty_tpl->tpl_vars['order_process']->value),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Check out','mod'=>'blockcart_mod'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Check out','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</a>
							</div>
						</div>
					</div>
				</div>
				<?php } else { ?>
					<div class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'Your shop cart is empty','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</div>				
				<?php }?>
			</div>
		</div>
	</div>
</nav>
<!-- /MODULE Rightbar cart --><?php }} ?>
