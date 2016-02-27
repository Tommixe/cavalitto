<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/side_bar_right.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2020354654568a7a05bdd572-29189784%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9574df75afeee352fc45555c0d0fdc9a3c1bda5e' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/side_bar_right.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2020354654568a7a05bdd572-29189784',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'wishlists' => 0,
    'wishlist' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a05c063f8_57481821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a05c063f8_57481821')) {function content_568a7a05c063f8_57481821($_smarty_tpl) {?>
<!-- MODULE wishlist -->
<?php if (isset($_smarty_tpl->tpl_vars['wishlists']->value)&&count($_smarty_tpl->tpl_vars['wishlists']->value)>1) {?>
	<nav class="st-menu" id="side_stwishlist">
		<div class="divscroll">
			<div class="wrapperscroll">
				<div class="st-menu-header">
					<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Wishlists','mod'=>'stthemeeditor'),$_smarty_tpl);?>
</h3>
			    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stthemeeditor'),$_smarty_tpl);?>
"><i class="icon-angle-double-right icon-0x"></i></a>
				</div>
				<div id="stwishlist_content">
					<p id="stwishlist_added" class="alert alert-success unvisible"><?php echo smartyTranslate(array('s'=>'The product was successfully added to your wishlist.','mod'=>'stthemeeditor'),$_smarty_tpl);?>
</p>
					<ul id="stwishlist_list">
						<?php  $_smarty_tpl->tpl_vars['wishlist'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['wishlist']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['wishlists']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['wishlist']->key => $_smarty_tpl->tpl_vars['wishlist']->value) {
$_smarty_tpl->tpl_vars['wishlist']->_loop = true;
?>
							<li><a href="javascript:;" title="<?php echo $_smarty_tpl->tpl_vars['wishlist']->value['name'];?>
" class="stwishlist" data-wid="<?php echo $_smarty_tpl->tpl_vars['wishlist']->value['id_wishlist'];?>
"><?php echo smartyTranslate(array('s'=>'Add to %s','sprintf'=>array($_smarty_tpl->tpl_vars['wishlist']->value['name']),'mod'=>'stthemeeditor'),$_smarty_tpl);?>
</a></li>
						<?php } ?>
					</ul>
					<div class="row">
						<div class="col-xs-6">
							<span class="side_continue btn btn-default btn-bootstrap" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stthemeeditor'),$_smarty_tpl);?>
">
								<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stthemeeditor'),$_smarty_tpl);?>

							</span>
						</div>
						<div class="col-xs-6">
							<a class="btn btn-default btn-bootstrap" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getModuleLink('blockwishlist','mywishlist',array(),true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'stthemeeditor'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My wishlists','mod'=>'stthemeeditor'),$_smarty_tpl);?>
</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
<?php }?>
<!-- /MODULE wishlist --><?php }} ?>
