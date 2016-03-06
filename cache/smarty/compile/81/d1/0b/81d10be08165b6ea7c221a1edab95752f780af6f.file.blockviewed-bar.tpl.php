<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:34
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blockviewed_mod\views\templates\hook\blockviewed-bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8256d9d666b026d9-73044329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81d10be08165b6ea7c221a1edab95752f780af6f' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blockviewed_mod\\views\\templates\\hook\\blockviewed-bar.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8256d9d666b026d9-73044329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products_viewed_nbr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d666bec0a6_34338874',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d666bec0a6_34338874')) {function content_56d9d666bec0a6_34338874($_smarty_tpl) {?>
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
