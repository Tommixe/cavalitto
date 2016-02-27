<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 16:43:16
         compiled from "/home/micreon/public_html/cavalitto/modules/stowlcarousel/views/templates/hook/stowlcarousel-0.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1532595751568a9314c3e1f1-64312451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73bca20d2397c20bb35a6a2587d2a3a5a6eb8c95' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stowlcarousel/views/templates/hook/stowlcarousel-0.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1532595751568a9314c3e1f1-64312451',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slides' => 0,
    'banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a9314c62483_33534736',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a9314c62483_33534736')) {function content_568a9314c62483_33534736($_smarty_tpl) {?><!-- MODULE stowlcarousel -->
<?php if (isset($_smarty_tpl->tpl_vars['slides']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['slides']->value['slide'])&&count($_smarty_tpl->tpl_vars['slides']->value['slide'])) {?>
        <div id="st_owl_carousel-<?php echo $_smarty_tpl->tpl_vars['slides']->value['id_st_owl_carousel_group'];?>
" class="<?php if (count($_smarty_tpl->tpl_vars['slides']->value['slide'])>1) {?> owl-carousel owl-theme owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['slides']->value['prev_next']==2) {?> owl-navigation-rectangle <?php } elseif ($_smarty_tpl->tpl_vars['slides']->value['prev_next']==3) {?> owl-navigation-circle <?php }?><?php }?>">
            <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value['slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
                <?php echo $_smarty_tpl->getSubTemplate ("./stowlcarousel-block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('banner_data'=>$_smarty_tpl->tpl_vars['banner']->value), 0);?>

            <?php } ?>
        </div>
        <?php echo $_smarty_tpl->getSubTemplate ("./stowlcarousel-script.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('js_data'=>$_smarty_tpl->tpl_vars['slides']->value), 0);?>

    <?php }?>
<?php }?>
<!--/ MODULE stowlcarousel --><?php }} ?>
