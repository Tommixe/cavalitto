<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:55
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stmultilink\views\templates\hook\stmultilink-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1156556d9d67b66af90-56161924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e87fb11edd5780132d97c346075315e72e4e9fea' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stmultilink\\views\\templates\\hook\\stmultilink-top.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1156556d9d67b66af90-56161924',
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
  'unifunc' => 'content_56d9d67ba33511_09488556',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d67ba33511_09488556')) {function content_56d9d67ba33511_09488556($_smarty_tpl) {?>

<!-- Block stlinkgroups top module -->
<?php  $_smarty_tpl->tpl_vars['link_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['link_group']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['link_group']->key => $_smarty_tpl->tpl_vars['link_group']->value) {
$_smarty_tpl->tpl_vars['link_group']->_loop = true;
 $_smarty_tpl->tpl_vars['link_group']->index++;
 $_smarty_tpl->tpl_vars['link_group']->first = $_smarty_tpl->tpl_vars['link_group']->index === 0;
?>
    <div id="multilink_<?php echo $_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'];?>
" class="stlinkgroups_top dropdown_wrap <?php if ($_smarty_tpl->tpl_vars['link_group']->first) {?>first-item<?php }?> top_bar_item">
        <div class="dropdown_tri <?php if (is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])) {?> dropdown_tri_in <?php }?> header_item">
        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?>
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link_group']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['new_window'])&&$_smarty_tpl->tpl_vars['link_group']->value['new_window']) {?> target="_blank" <?php }?>>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['link_group']->value['icon_class'];?>
"></i><?php }?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?>
            </a>
        <?php }?>
        </div>
        <?php if (is_array($_smarty_tpl->tpl_vars['link_group']->value['links'])&&count($_smarty_tpl->tpl_vars['link_group']->value['links'])) {?>
        <div class="dropdown_list">
            <ul class="dropdown_list_ul custom_links_list">
    		<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_group']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
    			<li>
            		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
" <?php if (isset($_smarty_tpl->tpl_vars['link']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if ($_smarty_tpl->tpl_vars['link']->value['new_window']) {?> target="_blank" <?php }?>>
                        <?php if ($_smarty_tpl->tpl_vars['link']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['link']->value['icon_class'];?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['label'], ENT_QUOTES, 'UTF-8', true);?>

            		</a>
    			</li>
    		<?php } ?>
    		</ul>
        </div>
        <?php }?>
    </div>
<?php } ?>
<!-- /Block stlinkgroups top module --><?php }} ?>
