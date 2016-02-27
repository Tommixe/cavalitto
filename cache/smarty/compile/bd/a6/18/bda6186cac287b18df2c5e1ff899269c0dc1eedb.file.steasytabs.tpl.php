<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:44
         compiled from "/home/micreon/public_html/cavalitto/modules/steasytabs/views/templates/hook/steasytabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1032592267568a7bfcca6031-53217056%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bda6186cac287b18df2c5e1ff899269c0dc1eedb' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/steasytabs/views/templates/hook/steasytabs.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1032592267568a7bfcca6031-53217056',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabsContent' => 0,
    'tc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfccb0fa2_10467683',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfccb0fa2_10467683')) {function content_568a7bfccb0fa2_10467683($_smarty_tpl) {?>

<!-- Block extra tabs -->
<?php  $_smarty_tpl->tpl_vars['tc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabsContent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tc']->key => $_smarty_tpl->tpl_vars['tc']->value) {
$_smarty_tpl->tpl_vars['tc']->_loop = true;
?>
<div id="idTab31<?php echo $_smarty_tpl->tpl_vars['tc']->value['id_st_easy_tabs'];?>
" class="product_accordion block_hidden_only_for_screen">
    <a href="javascript:;" class="opener">&nbsp;</a>
    <div class="product_accordion_title">
        <?php echo $_smarty_tpl->tpl_vars['tc']->value['title'];?>

    </div>
	<div class="pa_content steasytabs_content">
	   <?php echo $_smarty_tpl->tpl_vars['tc']->value['content'];?>

	</div>
</div>
<?php } ?>
<!-- /Block extra tabs --><?php }} ?>
