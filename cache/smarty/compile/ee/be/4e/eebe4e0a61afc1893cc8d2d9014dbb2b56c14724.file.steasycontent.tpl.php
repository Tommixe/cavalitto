<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:44
         compiled from "/home/micreon/public_html/cavalitto/modules/steasycontent/views/templates/hook/steasycontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1895656700568a7bfccc2da9-27399788%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eebe4e0a61afc1893cc8d2d9014dbb2b56c14724' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/steasycontent/views/templates/hook/steasycontent.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1895656700568a7bfccc2da9-27399788',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'easy_content' => 0,
    'ec' => 0,
    'is_inline_content' => 0,
    'is_column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfcd2a029_00853159',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcd2a029_00853159')) {function content_568a7bfcd2a029_00853159($_smarty_tpl) {?>
<!-- MODULE st easy content -->
<?php if (count($_smarty_tpl->tpl_vars['easy_content']->value)>0) {?>
    <?php  $_smarty_tpl->tpl_vars['ec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['easy_content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ec']->key => $_smarty_tpl->tpl_vars['ec']->value) {
$_smarty_tpl->tpl_vars['ec']->_loop = true;
?>
        <?php if (isset($_smarty_tpl->tpl_vars['ec']->value['is_full_width'])&&$_smarty_tpl->tpl_vars['ec']->value['is_full_width']) {?><div id="easycontent_container_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'];?>
" class="easycontent_container full_container <?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==1) {?>hidden-xs<?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==2) {?>visible-xs visible-xs-block<?php }?> <?php if (!isset($_smarty_tpl->tpl_vars['is_inline_content']->value)) {?>block<?php }?>"><?php if (!$_smarty_tpl->tpl_vars['ec']->value['stretched']) {?><div class="container"><?php }?><div class="row"><div class="col-xs-12"><?php }?>
            <aside id="easycontent_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'];?>
" class="easycontent_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'];?>
 <?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==1) {?>hidden-xs<?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']==2) {?>visible-xs visible-xs-block<?php }?> <?php if (!isset($_smarty_tpl->tpl_vars['is_inline_content']->value)&&(!isset($_smarty_tpl->tpl_vars['ec']->value['is_full_width'])||!$_smarty_tpl->tpl_vars['ec']->value['is_full_width'])) {?>block<?php }?> easycontent <?php if (isset($_smarty_tpl->tpl_vars['is_column']->value)&&$_smarty_tpl->tpl_vars['is_column']->value) {?> column_block <?php }?> section">
                <?php if ($_smarty_tpl->tpl_vars['ec']->value['title']) {?>
                <h3 class="title_block">
                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"><?php } else { ?><span><?php }?>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8', true);?>

                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?></a><?php } else { ?></span><?php }?>
                </h3>
                <?php }?>
            	<div class="style_content <?php if ($_smarty_tpl->tpl_vars['ec']->value['text_align']==2) {?> text-center <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['text_align']==3) {?> text-right <?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['width']) {?> center_width_<?php echo $_smarty_tpl->tpl_vars['ec']->value['width'];?>
 <?php }?> block_content">
                    <?php echo stripslashes($_smarty_tpl->tpl_vars['ec']->value['text']);?>

            	</div>
            </aside>
        <?php if (isset($_smarty_tpl->tpl_vars['ec']->value['is_full_width'])&&$_smarty_tpl->tpl_vars['ec']->value['is_full_width']) {?></div><?php if (!$_smarty_tpl->tpl_vars['ec']->value['stretched']) {?></div><?php }?></div></div><?php }?>
    <?php } ?>
<?php }?>
<!-- MODULE st easy content --><?php }} ?>
