<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:54:25
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\admincavalitto\themes\default\template\helpers\list\list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:889256d9d9e1391943-70731548%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75615ebb486720427534b905d8e4ab31e577e8b2' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\admincavalitto\\themes\\default\\template\\helpers\\list\\list_action_view.tpl',
      1 => 1449301921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '889256d9d9e1391943-70731548',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d9e14f5177_33442488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d9e14f5177_33442488')) {function content_56d9d9e14f5177_33442488($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" >
	<i class="icon-search-plus"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
