<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:22
         compiled from "/home/micreon/public_html/cavalitto/modules/blockcart_mod/views/templates/hook/blockcart-mobilebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1960815692568a7a06a12c46-54876300%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6e8a884ebc127831b05d817fa0b64b041a9ebfd' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/blockcart_mod/views/templates/hook/blockcart-mobilebar.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1960815692568a7a06a12c46-54876300',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart_qties' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a06a1d2a9_44769722',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a06a1d2a9_44769722')) {function content_568a7a06a1d2a9_44769722($_smarty_tpl) {?>
<!-- /MODULE mobile cart -->
<a id="mobile_bar_cart_tri" href="javascript:;" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
">
	<div class="ajax_cart_bag">
		<span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>9) {?> dozens <?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
		<span class="ajax_cart_bg_handle"></span>
	</div>
	<span class="mobile_bar_tri_text"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</span>
</a>
<!-- /MODULE mobile cart --><?php }} ?>
