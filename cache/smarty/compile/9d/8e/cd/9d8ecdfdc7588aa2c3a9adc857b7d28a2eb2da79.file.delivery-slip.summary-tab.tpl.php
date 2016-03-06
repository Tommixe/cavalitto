<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 20:05:05
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\pdf\\delivery-slip.summary-tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3164056d9dc61a3a0d0-40134986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d8ecdfdc7588aa2c3a9adc857b7d28a2eb2da79' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\pdf\\\\delivery-slip.summary-tab.tpl',
      1 => 1449301940,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3164056d9dc61a3a0d0-40134986',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'carrier' => 0,
    'order' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9dc61b43874_73454902',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9dc61b43874_73454902')) {function content_56d9dc61b43874_73454902($_smarty_tpl) {?>
<table id="summary-tab" width="100%">
	<tr>
		<th class="header small" valign="middle"><?php echo smartyTranslate(array('s'=>'Order Reference','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<th class="header small" valign="middle"><?php echo smartyTranslate(array('s'=>'Order Date','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<?php if (isset($_smarty_tpl->tpl_vars['carrier']->value)) {?>
			<th class="header small" valign="middle"><?php echo smartyTranslate(array('s'=>'Carrier','pdf'=>'true'),$_smarty_tpl);?>
</th>
		<?php }?>
	</tr>
	<tr>
		<td class="center small white"><?php echo $_smarty_tpl->tpl_vars['order']->value->getUniqReference();?>
</td>
		<td class="center small white"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['order']->value->date_add,'full'=>0),$_smarty_tpl);?>
</td>
		<?php if (isset($_smarty_tpl->tpl_vars['carrier']->value)) {?>
			<td class="center small white"><?php echo $_smarty_tpl->tpl_vars['carrier']->value->name;?>
</td>
		<?php }?>
	</tr>
</table>

<?php }} ?>
