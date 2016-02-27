<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 16:43:16
         compiled from "/home/micreon/public_html/cavalitto/modules/stmegamenu/views/templates/hook/stmegamenu-column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:729526975568a9314be35b8-78477190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4aaf85679a79218478f5f52738c713b76ba696a3' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stmegamenu/views/templates/hook/stmegamenu-column.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '729526975568a9314be35b8-78477190',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stmenu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a9314bf3180_98394722',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a9314bf3180_98394722')) {function content_568a9314bf3180_98394722($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['stmenu']->value)&&is_array($_smarty_tpl->tpl_vars['stmenu']->value)&&count($_smarty_tpl->tpl_vars['stmenu']->value)) {?>
<!-- Menu -->
<div id="st_mega_menu_column" class="block column_block">
	<h3 class="title_block">
		<span>
			<?php echo smartyTranslate(array('s'=>'Categories','mod'=>'stmegamenu'),$_smarty_tpl);?>

		</span>
	</h3>
	<div id="st_mega_menu_column_block" class="block_content">
    	<div id="st_mega_menu_column_desktop">
    		<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

    	</div>
    	<div id="st_mega_menu_column_mobile">
	    	<?php echo $_smarty_tpl->getSubTemplate ("./stmobilemenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

    	</div>
	</div>
</div>
<!--/ Menu -->
<?php }?><?php }} ?>
