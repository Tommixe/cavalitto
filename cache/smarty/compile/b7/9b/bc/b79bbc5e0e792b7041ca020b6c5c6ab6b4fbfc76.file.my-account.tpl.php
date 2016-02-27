<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:00:10
         compiled from "/home/micreon/public_html/cavalitto/themes/panda/modules/blockwishlist/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:716879815568a7aea2a7892-76440571%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b79bbc5e0e792b7041ca020b6c5c6ab6b4fbfc76' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/themes/panda/modules/blockwishlist/my-account.tpl',
      1 => 1449302559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '716879815568a7aea2a7892-76440571',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7aea2da2e0_11944603',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7aea2da2e0_11944603')) {function content_568a7aea2da2e0_11944603($_smarty_tpl) {?>

<!-- MODULE WishList -->
<li class="lnk_wishlist">
	<a 	href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>
">
		<span class="icon_wrap"><i class="icon-heart-empty icon_btn icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'blockwishlist'),$_smarty_tpl);?>

	</a>
</li>
<!-- END : MODULE WishList --><?php }} ?>
