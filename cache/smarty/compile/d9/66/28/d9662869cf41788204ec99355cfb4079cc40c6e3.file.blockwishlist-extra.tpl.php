<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:44
         compiled from "/home/micreon/public_html/cavalitto/themes/panda/modules/blockwishlist/blockwishlist-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:392816801568a7bfcb8a6d1-56120405%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9662869cf41788204ec99355cfb4079cc40c6e3' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/themes/panda/modules/blockwishlist/blockwishlist-extra.tpl',
      1 => 1449302559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '392816801568a7bfcb8a6d1-56120405',
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
  'unifunc' => 'content_568a7bfcba7fe4_16641204',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcba7fe4_16641204')) {function content_568a7bfcba7fe4_16641204($_smarty_tpl) {?>
<div class="buttons_bottom_block no-print">
<?php if (isset($_smarty_tpl->tpl_vars['wishlists']->value)&&count($_smarty_tpl->tpl_vars['wishlists']->value)>1) {?>
	<a id="wishlist_button" href="javascript:;" class="wishlist_button_list addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" data-pid="<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
" title="<?php echo smartyTranslate(array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-heart-empty-1 icon-small icon_btn icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to Wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</span></div></a>
<?php } else { ?>
	<a id="wishlist_button" href="javascript:;" onclick="WishlistCart('wishlist_block_list', 'add', '<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
', $('#idCombination').val(), $('#quantity_wanted').val(), this); return false;" rel="nofollow" data-pid="<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
"  title="<?php echo smartyTranslate(array('s'=>'Add to my wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
" class="addToWishlist wishlistProd_<?php echo intval($_smarty_tpl->tpl_vars['id_product']->value);?>
"><i class="icon-heart-empty-1 icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to wishlist','mod'=>'blockwishlist'),$_smarty_tpl);?>
</span></a>
<?php }?>
</div><?php }} ?>
