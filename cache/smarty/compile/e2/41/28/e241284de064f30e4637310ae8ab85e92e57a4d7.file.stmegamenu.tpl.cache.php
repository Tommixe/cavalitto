<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:27
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stmegamenu\views\templates\hook\stmegamenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1590956d9d65f2ff8b1-28203465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e241284de064f30e4637310ae8ab85e92e57a4d7' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stmegamenu\\views\\templates\\hook\\stmegamenu.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1590956d9d65f2ff8b1-28203465',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stmenu' => 0,
    'megamenu_width' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d65f4f27f3_46893836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d65f4f27f3_46893836')) {function content_56d9d65f4f27f3_46893836($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['stmenu']->value)&&is_array($_smarty_tpl->tpl_vars['stmenu']->value)&&count($_smarty_tpl->tpl_vars['stmenu']->value)) {?>
<!-- Menu -->
<?php if (!isset($_smarty_tpl->tpl_vars['megamenu_width']->value)||!$_smarty_tpl->tpl_vars['megamenu_width']->value) {?>
<div class="wide_container boxed_megamenu">
<?php }?>
<div id="st_mega_menu_container" class="animated fast">
	<div class="container">
		<nav id="st_mega_menu_wrap" role="navigation">
	    	<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		</nav>
	</div>
</div>
<?php if (!isset($_smarty_tpl->tpl_vars['megamenu_width']->value)||!$_smarty_tpl->tpl_vars['megamenu_width']->value) {?>
</div>
<?php }?>
<!--/ Menu -->
<?php }?><?php }} ?>
