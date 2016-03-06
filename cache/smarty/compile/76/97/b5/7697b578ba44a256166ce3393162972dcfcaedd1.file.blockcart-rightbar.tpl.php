<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:34
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blockcart_mod\views\templates\hook\blockcart-rightbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:632456d9d6666e9c52-26653374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7697b578ba44a256166ce3393162972dcfcaedd1' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blockcart_mod\\views\\templates\\hook\\blockcart-rightbar.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '632456d9d6666e9c52-26653374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_process' => 0,
    'link' => 0,
    'cart_qties' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d666895018_89209650',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d666895018_89209650')) {function content_56d9d666895018_89209650($_smarty_tpl) {?>
<!-- /MODULE Rightbar cart -->
<div id="rightbar_cart" class="rightbar_wrap">
    <a id="rightbar-shopping_cart" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['order_process']->value,true), ENT_QUOTES, 'UTF-8', true);?>
" class="rightbar_tri icon_wrap" title="<?php echo smartyTranslate(array('s'=>'View my shopping cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
">
        <i class="icon-glyph icon_btn icon-0x"></i>
        <span class="icon_text"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</span>
        <span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0) {?> simple_hidden <?php }?><?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>9) {?> dozens <?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
    </a>
</div>
<!-- /MODULE Rightbar cart --><?php }} ?>
