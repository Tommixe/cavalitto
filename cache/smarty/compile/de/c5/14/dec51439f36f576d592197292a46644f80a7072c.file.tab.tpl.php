<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:44
         compiled from "/home/micreon/public_html/cavalitto/modules/steasytabs/views/templates/hook/tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1688340987568a7bfcc8bee1-53418119%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dec51439f36f576d592197292a46644f80a7072c' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/steasytabs/views/templates/hook/tab.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1688340987568a7bfcc8bee1-53418119',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabsHeader' => 0,
    'th' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfcc9c796_51368017',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcc9c796_51368017')) {function content_568a7bfcc9c796_51368017($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabsHeader']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
?>
<li><a href="#idTab31<?php echo $_smarty_tpl->tpl_vars['th']->value['id_st_easy_tabs'];?>
" id="st_easy_tab_<?php echo $_smarty_tpl->tpl_vars['th']->value['id_st_easy_tabs'];?>
"><?php if ($_smarty_tpl->tpl_vars['th']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['th']->value['title'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Custom tab','mod'=>'steasytabs'),$_smarty_tpl);?>
<?php }?></a></li>
<?php } ?><?php }} ?>
