<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:38
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stiosslider\views\templates\hook\stiosslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3138156d9d66a226972-93958378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2f74f793074df1ab2950d0511d6339bef0bfdef5' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stiosslider\\views\\templates\\hook\\stiosslider.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3138156d9d66a226972-93958378',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slide_group' => 0,
    'google_font_links' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d66a454fc3_14657761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d66a454fc3_14657761')) {function content_56d9d66a454fc3_14657761($_smarty_tpl) {?><!-- MODULE stiossldier -->
<?php if (isset($_smarty_tpl->tpl_vars['slide_group']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['google_font_links']->value)) {?><?php echo $_smarty_tpl->tpl_vars['google_font_links']->value;?>
<?php }?>
    <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slide_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['slide']->value['templates']==1) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("./stiosslider-fullwidth-boxed.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['templates']==2) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("./stiosslider-center-background.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['templates']==3) {?>
            <?php echo $_smarty_tpl->getSubTemplate ("./stiosslider-fullscreen.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <?php } else { ?>
            <?php echo $_smarty_tpl->getSubTemplate ("./stiosslider-fullwidth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <?php }?>
    <?php } ?>
<?php }?>
<!--/ MODULE stiossldier --><?php }} ?>
