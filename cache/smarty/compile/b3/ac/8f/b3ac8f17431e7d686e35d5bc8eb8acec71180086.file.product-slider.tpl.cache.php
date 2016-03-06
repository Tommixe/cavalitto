<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:49
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\themes\panda\product-slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2837456d9d6750cff78-13792396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ac8f17431e7d686e35d5bc8eb8acec71180086' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\themes\\panda\\product-slider.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2837456d9d6750cff78-13792396',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'direction_nav' => 0,
    'products' => 0,
    'new_sticker' => 0,
    'product' => 0,
    'sale_sticker' => 0,
    'PS_CATALOG_MODE' => 0,
    'restricted_country_mode' => 0,
    'discount_percentage' => 0,
    'priceDisplay' => 0,
    'countdown_active' => 0,
    'countdown_style' => 0,
    'countdown_v_alignment' => 0,
    'countdown_title_aw_display' => 0,
    'link' => 0,
    'lazy_load' => 0,
    'pro_image' => 0,
    'use_view_more_instead' => 0,
    'add_prod_display' => 0,
    'static_token' => 0,
    'st_display_add_to_cart' => 0,
    'fly_i' => 0,
    'flyout_comparison' => 0,
    'comparator_max_item' => 0,
    'flyout_quickview' => 0,
    'quick_view' => 0,
    'flyout_wishlist' => 0,
    'flyout_buttons' => 0,
    'flyout_buttons_on_mobile' => 0,
    'sttheme' => 0,
    'length_of_product_name' => 0,
    'display_sd' => 0,
    'st_yotpo_sart' => 0,
    'st_yotpoAppkey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d676c56923_02774568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d676c56923_02774568')) {function content_56d9d676c56923_02774568($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\tools\\smarty\\plugins\\modifier.date_format.php';
?>
<?php $_smarty_tpl->_capture_stack[0][] = array("home_default_width", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getWidthSize'][0][0]->getWidth(array('type'=>'home_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("home_default_height", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getHeightSize'][0][0]->getHeight(array('type'=>'home_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("small_default_width", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getWidthSize'][0][0]->getWidth(array('type'=>'small_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("small_default_height", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getHeightSize'][0][0]->getHeight(array('type'=>'small_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->tpl_vars['st_yotpo_sart'] = new Smarty_variable(Configuration::get('STSN_YOTPO_SART'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['st_yotpoAppkey'] = new Smarty_variable(Configuration::get('yotpo_app_key'), null, 0);?>
<?php $_smarty_tpl->_capture_stack[0][] = array("st_yotpoDomain", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getYotpoDomain",'mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("st_yotpoLanguage", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getYotpoLanguage",'mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->tpl_vars['st_display_add_to_cart'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_ADD_TO_CART'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['use_view_more_instead'] = new Smarty_variable(Configuration::get('STSN_USE_VIEW_MORE_INSTEAD'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_wishlist'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_WISHLIST'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_quickview'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_QUICKVIEW'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_comparison'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_COMPARISON'), null, 0);?>    
<?php $_smarty_tpl->tpl_vars['discount_percentage'] = new Smarty_variable(Configuration::get('STSN_DISCOUNT_PERCENTAGE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons_on_mobile'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['new_sticker'] = new Smarty_variable(Configuration::get('STSN_NEW_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sale_sticker'] = new Smarty_variable(Configuration::get('STSN_SALE_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['countdown_active'] = new Smarty_variable(Configuration::get('ST_COUNTDOWN_ACTIVE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['countdown_style'] = new Smarty_variable(Configuration::get('ST_COUNTDOWN_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['countdown_v_alignment'] = new Smarty_variable(Configuration::get('ST_COUNTDOWN_V_ALIGNMENT'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['countdown_title_aw_display'] = new Smarty_variable(Configuration::get('ST_COUNTDOWN_TITLE_AW_DISPLAY'), null, 0);?>
<div class="slides remove_after_init <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
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
?>
	<div class="ajax_block_product <?php if ($_smarty_tpl->tpl_vars['product']->first) {?>first_item<?php } elseif ($_smarty_tpl->tpl_vars['product']->last) {?>last_item<?php }?> item">
        <?php $_smarty_tpl->_capture_stack[0][] = array("new_on_sale", null, null); ob_start(); ?>
            <?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0&&isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value>1) {?><span class="sale_percentage_sticker"><?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo smartyTranslate(array('s'=>'Off'),$_smarty_tpl);?>
<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])!=0) {?><?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price_tax_exc'])),$_smarty_tpl);?>
<?php }?><?php }?></span><?php }?><?php }?>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php if ($_smarty_tpl->tpl_vars['countdown_active']->value) {?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_count_down", null, null); ob_start(); ?>
            <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0) {?>
                <?php if ((smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S')>=$_smarty_tpl->tpl_vars['product']->value['specific_prices']['from']&&smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S')<$_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'])) {?>
                <div class="countdown_wrap countdown_timer countdown_style_<?php echo (($tmp = @$_smarty_tpl->tpl_vars['countdown_style']->value)===null||$tmp==='' ? 0 : $tmp);?>
 <?php if ($_smarty_tpl->tpl_vars['countdown_v_alignment']->value) {?> v_middle<?php }?> s_countdown_timer" data-countdown="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to'],'%Y/%m/%d %H:%M:%S');?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"></div>
                <?php } elseif (($_smarty_tpl->tpl_vars['product']->value['specific_prices']['to']=='0000-00-00 00:00:00')&&($_smarty_tpl->tpl_vars['product']->value['specific_prices']['from']=='0000-00-00 00:00:00')&&$_smarty_tpl->tpl_vars['countdown_title_aw_display']->value) {?>
                    <div class="countdown_wrap s_countdown_perm <?php if ($_smarty_tpl->tpl_vars['countdown_v_alignment']->value) {?> v_middle<?php }?>" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
">
                        <div class="countdown_title"><?php echo smartyTranslate(array('s'=>'Limited special offer'),$_smarty_tpl);?>
</div>
                    </div>
                <?php }?>
            <?php }?><?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php }?>
        <?php $_smarty_tpl->tpl_vars['pro_image'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'), null, 0);?> 
        <div class="pro_outer_box">
        <div class="pro_first_box">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="product_image"><img <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> data-src="<?php echo $_smarty_tpl->tpl_vars['pro_image']->value;?>
" <?php } else { ?> src="<?php echo $_smarty_tpl->tpl_vars['pro_image']->value;?>
" <?php }?> width="<?php echo Smarty::$_smarty_vars['capture']['home_default_width'];?>
" height="<?php echo Smarty::$_smarty_vars['capture']['home_default_height'];?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="replace-2x img-responsive front-image <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> lazyOwl <?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['product']->value['hover_image'])&&$_smarty_tpl->tpl_vars['product']->value['hover_image']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['hover_image'];?>
<?php }?><?php echo Smarty::$_smarty_vars['capture']['new_on_sale'];?>
</a>     
            <?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable(0, null, 0);?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_cart", null, null); ob_start(); ?>
                <?php if (isset($_smarty_tpl->tpl_vars['use_view_more_instead']->value)&&$_smarty_tpl->tpl_vars['use_view_more_instead']->value==1) {?>
                    <a class="view_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View more'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-eye-2 icon-small icon_btn icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'View more'),$_smarty_tpl);?>
</span></div></a>
                <?php } else { ?>
                    <?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>          
                        <?php if ((!isset($_smarty_tpl->tpl_vars['product']->value['customization_required'])||!$_smarty_tpl->tpl_vars['product']->value['customization_required'])&&($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
    					  <a class="ajax_add_to_cart_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
<?php if (isset($_smarty_tpl->tpl_vars['static_token']->value)) {?>&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
<?php }?>&amp;add" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
</span></div></a>
                          <?php if (isset($_smarty_tpl->tpl_vars['use_view_more_instead']->value)&&$_smarty_tpl->tpl_vars['use_view_more_instead']->value==2) {?>
                            <a class="view_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View more'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-eye-2 icon-small icon_btn icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'View more'),$_smarty_tpl);?>
</span></div></a>
                            <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
                          <?php }?>
    					<?php } else { ?>
                            <a class="view_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-eye-2 icon_btn icon-small icon-mar-lr2"></i><span><?php if ((isset($_smarty_tpl->tpl_vars['product']->value['customization_required'])&&$_smarty_tpl->tpl_vars['product']->value['customization_required'])) {?><?php echo smartyTranslate(array('s'=>'Customize'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'More'),$_smarty_tpl);?>
<?php }?></span></div></a>
    					<?php }?>
    				<?php } else { ?>
                    <?php }?>
				<?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_compare", null, null); ob_start(); ?>
                <?php if (!$_smarty_tpl->tpl_vars['flyout_comparison']->value&&isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
                    <a class="add_to_compare" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" rel="nofollow" data-product-cover="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" data-product-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-product-cover-width="<?php echo Smarty::$_smarty_vars['capture']['small_default_width'];?>
" data-product-cover-height="<?php echo Smarty::$_smarty_vars['capture']['small_default_height'];?>
" title="<?php echo smartyTranslate(array('s'=>'Add to compare'),$_smarty_tpl);?>
"><div><i class="icon-adjust icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to compare'),$_smarty_tpl);?>
</span></div></a>
    			<?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_quick_view", null, null); ob_start(); ?>
                <?php if (!$_smarty_tpl->tpl_vars['flyout_quickview']->value&&isset($_smarty_tpl->tpl_vars['quick_view']->value)&&$_smarty_tpl->tpl_vars['quick_view']->value) {?>
                    <a class="quick-view" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Quick view'),$_smarty_tpl);?>
"><div><i class="icon-search-1 icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Quick view'),$_smarty_tpl);?>
</span></div></a>
                <?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value&&trim(Smarty::$_smarty_vars['capture']['pro_a_cart'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            <?php if (trim(Smarty::$_smarty_vars['capture']['pro_a_compare'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            <?php if (trim(Smarty::$_smarty_vars['capture']['pro_quick_view'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['flyout_wishlist']->value&&isset($_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist'])&&$_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist']) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            
            <div class="hover_fly <?php if ($_smarty_tpl->tpl_vars['flyout_buttons']->value) {?>hover_fly_static<?php }?> <?php if ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==1) {?> mobile_hover_fly_show <?php } elseif ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==2) {?> mobile_hover_fly_cart <?php } else { ?> mobile_hover_fly_hide <?php }?> fly_<?php echo $_smarty_tpl->tpl_vars['fly_i']->value;?>
 <?php if (trim(Smarty::$_smarty_vars['capture']['pro_quick_view'])) {?> has_quick_view <?php }?> clearfix">
                <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value) {?><?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>
<?php }?>
                <?php echo Smarty::$_smarty_vars['capture']['pro_quick_view'];?>

                <?php echo Smarty::$_smarty_vars['capture']['pro_a_compare'];?>

                <?php if (!$_smarty_tpl->tpl_vars['flyout_wishlist']->value&&isset($_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist'])&&$_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist'];?>
<?php }?>   
            </div>
            <?php if (isset(Smarty::$_smarty_vars['capture']['pro_count_down'])) {?><?php echo Smarty::$_smarty_vars['capture']['pro_count_down'];?>
<?php }?>
        </div>
        <div class="pro_second_box">
        <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==1) {?>
            <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(70, null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(35, null, 0);?>
        <?php }?>
		<p class="s_title_block <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']) {?> nohidden <?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==2) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],$_smarty_tpl->tpl_vars['length_of_product_name']->value,'...'), ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></p>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayProductListReviews','product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
            <div class="price_container">
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"before_price"),$_smarty_tpl);?>

                <span class="price">
                <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>

                <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>

                <?php }?>
                </span>
                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0) {?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl);?>

                    <span class="old_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
                    <?php if (isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value==1) {?>
                    <span class="sale_percentage">
                        -<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])!=0) {?><?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price_tax_exc'])),$_smarty_tpl);?>
<?php }?><?php }?>
                    </span>
                    <?php }?>
                <?php }?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>

                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>'after_price'),$_smarty_tpl);?>

            </div>
        <?php } else { ?>
            <!--<div style="height:21px;"></div>-->
        <?php }?>
        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"weight"),$_smarty_tpl);?>

        <?php if (isset($_smarty_tpl->tpl_vars['display_sd']->value)&&$_smarty_tpl->tpl_vars['display_sd']->value) {?><p class="product_desc"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),120,'...');?>
</p><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pro_rating_average'])&&$_smarty_tpl->tpl_vars['product']->value['pro_rating_average']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['pro_rating_average'];?>
<?php }?>   
        <?php if ($_smarty_tpl->tpl_vars['st_yotpo_sart']->value&&$_smarty_tpl->tpl_vars['st_yotpoAppkey']->value&&Smarty::$_smarty_vars['capture']['st_yotpoDomain']&&Smarty::$_smarty_vars['capture']['st_yotpoLanguage']) {?>
            <div class="yotpo bottomLine"
            data-appkey="<?php echo $_smarty_tpl->tpl_vars['st_yotpoAppkey']->value;?>
"
            data-domain="<?php echo Smarty::$_smarty_vars['capture']['st_yotpoDomain'];?>
"
            data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"
            data-product-models=""
            data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-image-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pro_image']->value, ENT_QUOTES, 'UTF-8', true);?>
"
            data-description="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),360,'...');?>
"
            data-lang="<?php echo htmlspecialchars(Smarty::$_smarty_vars['capture']['st_yotpoLanguage'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-bread-crumbs="">
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1||$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?>
        <div class="act_box <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1) {?> display_when_hover <?php } elseif ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?> display_normal <?php }?>">
            <?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>

        </div>
        <?php }?>
        </div>
        </div>
	</div>
<?php } ?>
</div><?php }} ?>
