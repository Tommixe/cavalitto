<?php /* Smarty version Smarty-3.1.19, created on 2016-03-06 14:02:38
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\admincavalitto\themes\default\template\helpers\tree\tree_header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1429156dc2a6e5d96f5-02275185%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4fa384bb94caaa2a02dade8ab59259afffe4919f' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\admincavalitto\\themes\\default\\template\\helpers\\tree\\tree_header.tpl',
      1 => 1449301921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1429156dc2a6e5d96f5-02275185',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'toolbar' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56dc2a6e6c7616_08790816',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56dc2a6e6c7616_08790816')) {function content_56dc2a6e6c7616_08790816($_smarty_tpl) {?>
<div class="tree-panel-heading-controls clearfix">
	<?php if (isset($_smarty_tpl->tpl_vars['title']->value)) {?><i class="icon-tag"></i>&nbsp;<?php echo smartyTranslate(array('s'=>$_smarty_tpl->tpl_vars['title']->value),$_smarty_tpl);?>
<?php }?>
	<?php if (isset($_smarty_tpl->tpl_vars['toolbar']->value)) {?><?php echo $_smarty_tpl->tpl_vars['toolbar']->value;?>
<?php }?>
</div><?php }} ?>
