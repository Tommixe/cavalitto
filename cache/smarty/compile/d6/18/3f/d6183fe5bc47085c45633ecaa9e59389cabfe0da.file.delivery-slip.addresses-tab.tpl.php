<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 20:05:05
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\pdf\\delivery-slip.addresses-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2905156d9dc6189df53-57303875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6183fe5bc47085c45633ecaa9e59389cabfe0da' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\pdf\\\\delivery-slip.addresses-tab.tpl',
      1 => 1449301940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2905156d9dc6189df53-57303875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_invoice' => 0,
    'invoice_address' => 0,
    'delivery_address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9dc61960223_84969322',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9dc61960223_84969322')) {function content_56d9dc61960223_84969322($_smarty_tpl) {?>
<table id="addresses-tab" cellspacing="0" cellpadding="0">
	<tr>
		<td width="33%"><span class="bold"> </span><br/><br/>
			<?php echo $_smarty_tpl->tpl_vars['order_invoice']->value->shop_address;?>

		</td>
		<?php if (!empty($_smarty_tpl->tpl_vars['invoice_address']->value)) {?>
			<td width="33%"><?php if ($_smarty_tpl->tpl_vars['delivery_address']->value) {?><span class="bold"><?php echo smartyTranslate(array('s'=>'Delivery Address','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
					<?php echo $_smarty_tpl->tpl_vars['delivery_address']->value;?>

				<?php }?>
			</td>
			<td width="33%"><span class="bold"><?php echo smartyTranslate(array('s'=>'Billing Address','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
				<?php echo $_smarty_tpl->tpl_vars['invoice_address']->value;?>

			</td>
		<?php } else { ?>
			<td width="66%"><?php if ($_smarty_tpl->tpl_vars['delivery_address']->value) {?><span class="bold"><?php echo smartyTranslate(array('s'=>'Billing & Delivery Address','pdf'=>'true'),$_smarty_tpl);?>
</span><br/><br/>
					<?php echo $_smarty_tpl->tpl_vars['delivery_address']->value;?>

				<?php }?>
			</td>
		<?php }?>
	</tr>
</table>
<?php }} ?>
