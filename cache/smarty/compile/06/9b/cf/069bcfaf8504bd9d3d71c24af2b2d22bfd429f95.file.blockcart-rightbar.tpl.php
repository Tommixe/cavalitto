<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/blockcart_mod/views/templates/hook/blockcart-rightbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1441676163568a7a05bb16b0-29316711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '069bcfaf8504bd9d3d71c24af2b2d22bfd429f95' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/blockcart_mod/views/templates/hook/blockcart-rightbar.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1441676163568a7a05bb16b0-29316711',
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
  'unifunc' => 'content_568a7a05bc4aa4_43981374',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a05bc4aa4_43981374')) {function content_568a7a05bc4aa4_43981374($_smarty_tpl) {?>
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
