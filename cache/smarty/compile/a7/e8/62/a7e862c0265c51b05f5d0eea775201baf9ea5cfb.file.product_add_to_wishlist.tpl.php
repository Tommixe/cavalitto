<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:22
         compiled from "/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/product_add_to_wishlist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1893906872568a7a0625db25-17268960%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a7e862c0265c51b05f5d0eea775201baf9ea5cfb' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/product_add_to_wishlist.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1893906872568a7a0625db25-17268960',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wishlists' => 0,
    'id_product' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a06279e70_41246669',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a06279e70_41246669')) {function content_568a7a06279e70_41246669($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['wishlists']->value)&&count($_smarty_tpl->tpl_vars['wishlists']->value)>1) {?>
	<a href="javascript:;" class="wishlist_button_list addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" data-pid="<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Add to wishlist','mod'=>'stthemeeditor'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-heart-empty-1 icon-small icon_btn icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to Wishlist','mod'=>'stthemeeditor'),$_smarty_tpl);?>
</span></div></a>
<?php } else { ?>
	<a class="addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" href="#" data-pid="<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', false, 1,this); return false;" title="<?php echo smartyTranslate(array('s'=>'Add to Wishlist','mod'=>'stthemeeditor'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-heart-empty-1 icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to Wishlist','mod'=>'stthemeeditor'),$_smarty_tpl);?>
</span></div></a>
<?php }?><?php }} ?>
