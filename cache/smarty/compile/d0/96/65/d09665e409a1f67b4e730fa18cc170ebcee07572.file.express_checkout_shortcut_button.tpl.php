<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:02:59
         compiled from "/home/micreon/public_html/cavalitto/modules/paypal/views/templates/hook/express_checkout_shortcut_button.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1341327060568a7b934ab3d5-12128466%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd09665e409a1f67b4e730fa18cc170ebcee07572' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/paypal/views/templates/hook/express_checkout_shortcut_button.tpl',
      1 => 1449302044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1341327060568a7b934ab3d5-12128466',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'use_mobile' => 0,
    'base_dir_ssl' => 0,
    'PayPal_lang_code' => 0,
    'paypal_express_checkout_shortcut_logo' => 0,
    'include_form' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7b934c6059_15677613',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7b934c6059_15677613')) {function content_568a7b934c6059_15677613($_smarty_tpl) {?>

<div id="container_express_checkout" style="float:right; margin: 10px 40px 0 0">
	<?php if (isset($_smarty_tpl->tpl_vars['use_mobile']->value)&&$_smarty_tpl->tpl_vars['use_mobile']->value) {?>
		<div style="margin-left:30px">
			<img id="payment_paypal_express_checkout" src="<?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
modules/paypal/views/img/logos/express_checkout_mobile/CO_<?php echo $_smarty_tpl->tpl_vars['PayPal_lang_code']->value;?>
_orange_295x43.png" alt="" />
		</div>
	<?php } else { ?>
		<?php if ($_smarty_tpl->tpl_vars['paypal_express_checkout_shortcut_logo']->value!=false) {?>
		<img id="payment_paypal_express_checkout" src="<?php echo $_smarty_tpl->tpl_vars['paypal_express_checkout_shortcut_logo']->value;?>
" alt="" />
		<?php } else { ?>
		<img id="payment_paypal_express_checkout" src="https://www.paypal.com/<?php echo $_smarty_tpl->tpl_vars['PayPal_lang_code']->value;?>
/i/btn/btn_xpressCheckout.gif" alt="" />
		<?php }?>
	<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['include_form']->value)&&$_smarty_tpl->tpl_vars['include_form']->value) {?>
		<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['template_dir']->value)."./express_checkout_shortcut_form.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

	<?php }?>
</div>
<div class="clearfix"></div>
<?php }} ?>
