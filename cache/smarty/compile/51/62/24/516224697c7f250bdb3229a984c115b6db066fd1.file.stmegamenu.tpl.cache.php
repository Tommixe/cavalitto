<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/stmegamenu/views/templates/hook/stmegamenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1244869234568a7a056a8ae8-33823000%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '516224697c7f250bdb3229a984c115b6db066fd1' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stmegamenu/views/templates/hook/stmegamenu.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1244869234568a7a056a8ae8-33823000',
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
  'unifunc' => 'content_568a7a056c2329_37103397',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a056c2329_37103397')) {function content_568a7a056c2329_37103397($_smarty_tpl) {?>
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
