<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:56
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blockcart_mod\views\templates\hook\blockcart-mobilebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1227556d9d67c9550e3-47529737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c85a6e3e4d92466a1ec92dad49d96dd03823b236' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blockcart_mod\\views\\templates\\hook\\blockcart-mobilebar.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1227556d9d67c9550e3-47529737',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart_qties' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d67ca463d9_60022008',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d67ca463d9_60022008')) {function content_56d9d67ca463d9_60022008($_smarty_tpl) {?>
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
