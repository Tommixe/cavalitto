<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/blockviewed_mod/views/templates/hook/blockviewed-bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166899865568a7a05bcf412-73429658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6857cba23ae42a30b52d754370c7aba4bae0bbd3' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/blockviewed_mod/views/templates/hook/blockviewed-bar.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166899865568a7a05bcf412-73429658',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products_viewed_nbr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a05bd9209_08767277',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a05bd9209_08767277')) {function content_568a7a05bd9209_08767277($_smarty_tpl) {?>
<!-- /MODULE viewed products -->
<div id="rightbar_viewed" class="rightbar_wrap">
    <a id="rightbar_viewed_btn" href="javascript:;" class="rightbar_tri icon_wrap" title="<?php echo smartyTranslate(array('s'=>'Recently Viewed','mod'=>'blockviewed_mod'),$_smarty_tpl);?>
">
        <i class="icon-history icon-0x"></i>
        <span class="icon_text"><?php echo smartyTranslate(array('s'=>'Viewed','mod'=>'blockviewed_mod'),$_smarty_tpl);?>
</span>
        <span class="products_viewed_nbr amount_circle <?php if ($_smarty_tpl->tpl_vars['products_viewed_nbr']->value>9) {?> dozens <?php }?>"><?php echo $_smarty_tpl->tpl_vars['products_viewed_nbr']->value;?>
</span>
    </a>
</div>
<!-- /MODULE viewed products --><?php }} ?>
