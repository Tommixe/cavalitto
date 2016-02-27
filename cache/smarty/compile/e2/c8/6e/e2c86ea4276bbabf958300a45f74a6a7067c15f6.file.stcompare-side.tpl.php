<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/stcompare/views/templates/hook/stcompare-side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:359322363568a7a05c1d463-65243848%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e2c86ea4276bbabf958300a45f74a6a7067c15f6' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stcompare/views/templates/hook/stcompare-side.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '359322363568a7a05c1d463-65243848',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'products' => 0,
    'use_taxes' => 0,
    'priceDisplay' => 0,
    'product' => 0,
    'products_compared_link' => 0,
    'link' => 0,
    'smallSize' => 0,
    'compared_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a05c7eeb0_78619565',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a05c7eeb0_78619565')) {function content_568a7a05c7eeb0_78619565($_smarty_tpl) {?>
<!-- MODULE st compare -->
<?php if ($_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
	<nav class="st-menu" id="side_products_compared">
		<div class="divscroll">
			<div class="wrapperscroll">
				<div class="st-menu-header">
					<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Product Comparison','mod'=>'stcompare'),$_smarty_tpl);?>
</h3>
			    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stcompare'),$_smarty_tpl);?>
"><i class="icon-angle-double-right icon-0x"></i></a>
				</div>
				<div id="stcompare_content">
					<ul id="products_compared_list" class="pro_column_list">
						<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&is_array($_smarty_tpl->tpl_vars['products']->value)&&count($_smarty_tpl->tpl_vars['products']->value)) {?>
							<?php $_smarty_tpl->tpl_vars['taxes_behavior'] = new Smarty_variable(false, null, 0);?>
							<?php if ($_smarty_tpl->tpl_vars['use_taxes']->value&&(!$_smarty_tpl->tpl_vars['priceDisplay']->value||$_smarty_tpl->tpl_vars['priceDisplay']->value==2)) {?>
								<?php $_smarty_tpl->tpl_vars['taxes_behavior'] = new Smarty_variable(true, null, 0);?>
							<?php }?>
							<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
								<li id="products_compared_<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" class="pro_column_box clearfix">
				        			<?php $_smarty_tpl->tpl_vars['products_compared_link'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getLink(), null, 0);?> 
									<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['products_compared_link']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" class="pro_column_left products-block-image">
										<img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['product']->value->id_image,'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['smallSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['smallSize']->value['height'];?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" class="replace-2x img-responsive" />
									</a>
									<div class="pro_column_right">
										<p class="s_title_block nohidden">
					                        <a class="stcompare-product-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['products_compared_link']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
">
					                            <?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value->name,45,'...'), ENT_QUOTES, 'UTF-8', true);?>

					                        </a>
					                    </p>
					                    <a class="stcompare_remove" href="javascript:;" title="<?php echo smartyTranslate(array('s'=>'Remove'),$_smarty_tpl);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
											<i class="icon-cancel"></i>
										</a>
									</div>
								</li>
							<?php } ?>
						<?php }?>
					</ul>
					<p id="stcompare_no_products" class=" alert alert-warning <?php if (count($_smarty_tpl->tpl_vars['compared_products']->value)) {?> unvisible<?php }?>"><?php echo smartyTranslate(array('s'=>'There are no products selected for comparison.','mod'=>'stcompare'),$_smarty_tpl);?>
</p>
					<div id="stcompare_btns" class="row">
						<div class="col-xs-6">
							<span class="side_continue btn btn-default btn-bootstrap" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stcompare'),$_smarty_tpl);?>
">
								<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stcompare'),$_smarty_tpl);?>

							</span>
						</div>
						<div class="col-xs-6">
							<a class="btn btn-default btn-bootstrap" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Compare Products','mod'=>'stcompare'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'Compare','mod'=>'stcompare'),$_smarty_tpl);?>
</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
<?php }?>
<!-- /MODULE st compare --><?php }} ?>
