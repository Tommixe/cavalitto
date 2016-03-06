<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:12
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stthemeeditor\views\templates\hook\stthemeeditor-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2466056d9d650b22ac0-67226183%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7d4890946d8139ee1ec5f6e62b1e192faebef167' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stthemeeditor\\views\\templates\\hook\\stthemeeditor-header.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2466056d9d650b22ac0-67226183',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d650d4a635_15521091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d650d4a635_15521091')) {function content_56d9d650d4a635_15521091($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['version_switching'])&&$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==1) {?>
<style type="text/css">body{min-width:<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>1440<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?>1200<?php } else { ?>992<?php }?>px;}</style>
<?php }?>
<?php }} ?>
