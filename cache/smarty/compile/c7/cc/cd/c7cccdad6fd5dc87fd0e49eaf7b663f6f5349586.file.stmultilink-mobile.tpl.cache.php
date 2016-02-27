<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:22
         compiled from "/home/micreon/public_html/cavalitto/modules/stmultilink/views/templates/hook/stmultilink-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:406506586568a7a06d0f0a6-94113891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7cccdad6fd5dc87fd0e49eaf7b663f6f5349586' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stmultilink/views/templates/hook/stmultilink-mobile.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '406506586568a7a06d0f0a6-94113891',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_groups' => 0,
    'link_group' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a06d56d01_45130862',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a06d56d01_45130862')) {function content_568a7a06d56d01_45130862($_smarty_tpl) {?>

<!-- Block stlinkgroups top module -->
<?php  $_smarty_tpl->tpl_vars['link_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link_group']->key => $_smarty_tpl->tpl_vars['link_group']->value) {
$_smarty_tpl->tpl_vars['link_group']->_loop = true;
?>
<?php if (!$_smarty_tpl->tpl_vars['link_group']->value['hide_on_mobile']) {?>
<ul id="multilink_mobile_<?php echo $_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'];?>
" class="mo_mu_level_0 mobile_menu_ul">
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>javascript:;<?php }?>" rel="nofollow" class="mo_ma_level_0 <?php if (!$_smarty_tpl->tpl_vars['link_group']->value['url']) {?>ma_span<?php }?>"<?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['new_window'])&&$_smarty_tpl->tpl_vars['link_group']->value['new_window']) {?> target="_blank" <?php }?>>
            <?php if ($_smarty_tpl->tpl_vars['link_group']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['link_group']->value['icon_class'];?>
"></i><?php }?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </a>
        <?php if (is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])) {?>
        <span class="opener">&nbsp;</span>
        <ul class="mo_mu_level_1 mo_sub_ul">
        <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_group']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
            <li class="mo_ml_level_1 mo_sub_li">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['link']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if ($_smarty_tpl->tpl_vars['link']->value['new_window']) {?> target="_blank" <?php }?> class="mo_ma_level_1 mo_sub_a">
                    <?php if ($_smarty_tpl->tpl_vars['link']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['link']->value['icon_class'];?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['label'], ENT_QUOTES, 'UTF-8', true);?>

                </a>
            </li>
        <?php } ?>
        </ul>
        <?php }?>
    </li>
</ul>
<?php }?>
<?php } ?>
<!-- /Block stlinkgroups top module --><?php }} ?>
