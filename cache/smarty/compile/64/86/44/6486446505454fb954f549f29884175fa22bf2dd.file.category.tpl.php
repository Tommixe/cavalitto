<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 16:43:17
         compiled from "/home/micreon/public_html/cavalitto/themes/panda/category.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1697436592568a9315c85443-86548963%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6486446505454fb954f549f29884175fa22bf2dd' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/themes/panda/category.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1697436592568a9315c85443-86548963',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'category' => 0,
    'display_category_title' => 0,
    'subcategories' => 0,
    'products' => 0,
    'categoryNameComplement' => 0,
    'HOOK_CATEGORY_HEADER' => 0,
    'scenes' => 0,
    'display_category_desc' => 0,
    'display_category_image' => 0,
    'link' => 0,
    'categorySize' => 0,
    'sttheme' => 0,
    'description_short' => 0,
    'display_subcategory' => 0,
    'categories_per_xl' => 0,
    'categories_per_lg' => 0,
    'categories_per_md' => 0,
    'categories_per_sm' => 0,
    'categories_per_xs' => 0,
    'categories_per_xxs' => 0,
    'subcategory' => 0,
    'img_cat_dir' => 0,
    'lang_iso' => 0,
    'nb_products' => 0,
    'HOOK_CATEGORY_FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a9315dd9cf0_91447325',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a9315dd9cf0_91447325')) {function content_568a9315dd9cf0_91447325($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include '/home/micreon/public_html/cavalitto/tools/smarty/plugins/modifier.replace.php';
?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (isset($_smarty_tpl->tpl_vars['category']->value)) {?>
	<?php if ($_smarty_tpl->tpl_vars['category']->value->id&&$_smarty_tpl->tpl_vars['category']->value->active) {?>

        <?php if ($_smarty_tpl->tpl_vars['display_category_title']->value) {?>
        <h1 class="heading page-heading<?php if ((isset($_smarty_tpl->tpl_vars['subcategories']->value)&&!$_smarty_tpl->tpl_vars['products']->value)||(isset($_smarty_tpl->tpl_vars['subcategories']->value)&&$_smarty_tpl->tpl_vars['products']->value)||!isset($_smarty_tpl->tpl_vars['subcategories']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?> product-listing<?php }?>"><span class="cat-name"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php if (isset($_smarty_tpl->tpl_vars['categoryNameComplement']->value)) {?>&nbsp;<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['categoryNameComplement']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></span></h1>
        <?php }?>

        <?php if (isset($_smarty_tpl->tpl_vars['HOOK_CATEGORY_HEADER']->value)&&$_smarty_tpl->tpl_vars['HOOK_CATEGORY_HEADER']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_CATEGORY_HEADER']->value;?>
<?php }?>

    	<?php if ($_smarty_tpl->tpl_vars['scenes']->value||($_smarty_tpl->tpl_vars['display_category_desc']->value&&$_smarty_tpl->tpl_vars['category']->value->description)||($_smarty_tpl->tpl_vars['display_category_image']->value&&$_smarty_tpl->tpl_vars['category']->value->id_image)) {?>
            <div class="content_scene_cat mar_b1">
                <?php if ($_smarty_tpl->tpl_vars['scenes']->value) {?>
                    <!-- Scenes -->
                    <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./scenes.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('scenes'=>$_smarty_tpl->tpl_vars['scenes']->value), 0);?>

                <?php } else { ?>
                    <!-- Category image -->
                    <?php if ($_smarty_tpl->tpl_vars['display_category_image']->value&&$_smarty_tpl->tpl_vars['category']->value->id_image) {?>
                    <div class="align_center mar_b1">
                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value->link_rewrite,$_smarty_tpl->tpl_vars['category']->value->id_image,'category_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['category']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" id="categoryImage" class="img-responsive" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" />
                    </div>
                    <?php }?>
                <?php }?>
            
                <?php if ($_smarty_tpl->tpl_vars['display_category_desc']->value&&$_smarty_tpl->tpl_vars['category']->value->description) {?>
                    <div class="cat_desc">
                    <?php if ((!isset($_smarty_tpl->tpl_vars['sttheme']->value['display_cate_desc_full'])||!$_smarty_tpl->tpl_vars['sttheme']->value['display_cate_desc_full'])&&strlen($_smarty_tpl->tpl_vars['category']->value->description)>120) {?>
                        <?php if (isset($_smarty_tpl->tpl_vars['description_short']->value)) {?>
                        <div id="category_description_short"><?php echo $_smarty_tpl->tpl_vars['description_short']->value;?>
</div>
                        <?php } else { ?>
                        <div id="category_description_short" style="height:1.5em;overflow:hidden;"><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                        <?php }?>
                        <div id="category_description_full" style="display:none"><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value->id_category,$_smarty_tpl->tpl_vars['category']->value->link_rewrite), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" class="lnk_more go"><?php echo smartyTranslate(array('s'=>'More'),$_smarty_tpl);?>
</a>
                    <?php } else { ?>
                        <div id="category_description_full"><?php echo $_smarty_tpl->tpl_vars['category']->value->description;?>
</div>
                    <?php }?>
                    </div>
                <?php }?>
            </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['display_subcategory']->value&&isset($_smarty_tpl->tpl_vars['subcategories']->value)) {?>
        <?php $_smarty_tpl->tpl_vars['categories_per_xl'] = new Smarty_variable(Configuration::get('STSN_CATEGORIES_PER_XL'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['categories_per_lg'] = new Smarty_variable(Configuration::get('STSN_CATEGORIES_PER_LG'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['categories_per_md'] = new Smarty_variable(Configuration::get('STSN_CATEGORIES_PER_MD'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['categories_per_sm'] = new Smarty_variable(Configuration::get('STSN_CATEGORIES_PER_SM'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['categories_per_xs'] = new Smarty_variable(Configuration::get('STSN_CATEGORIES_PER_XS'), null, 0);?>
        <?php $_smarty_tpl->tpl_vars['categories_per_xxs'] = new Smarty_variable(Configuration::get('STSN_CATEGORIES_PER_XXS'), null, 0);?>
		<!-- Subcategories -->
		<div id="subcategories">
            <h3 class="heading hidden"><?php echo smartyTranslate(array('s'=>'Subcategories'),$_smarty_tpl);?>
</h3>
            <ul class="inline_list <?php if ($_smarty_tpl->tpl_vars['display_subcategory']->value==1||$_smarty_tpl->tpl_vars['display_subcategory']->value==3) {?> subcate_grid_view row <?php } else { ?> subcate_list_view <?php }?>">
            <?php  $_smarty_tpl->tpl_vars['subcategory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['subcategory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['subcategories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['subcategories']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['subcategory']->key => $_smarty_tpl->tpl_vars['subcategory']->value) {
$_smarty_tpl->tpl_vars['subcategory']->_loop = true;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['subcategories']['iteration']++;
?>
                <li class="clearfix <?php if ($_smarty_tpl->tpl_vars['display_subcategory']->value==1||$_smarty_tpl->tpl_vars['display_subcategory']->value==3) {?> col-xl-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['categories_per_xl']->value),'.','-');?>
 col-lg-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['categories_per_lg']->value),'.','-');?>
 col-md-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['categories_per_md']->value),'.','-');?>
 col-sm-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['categories_per_sm']->value),'.','-');?>
 col-xs-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['categories_per_xs']->value),'.','-');?>
 col-xxs-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['categories_per_xxs']->value),'.','-');?>
  <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subcategories']['iteration']%$_smarty_tpl->tpl_vars['categories_per_xl']->value==1) {?> first-item-of-large-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subcategories']['iteration']%$_smarty_tpl->tpl_vars['categories_per_lg']->value==1) {?> first-item-of-desktop-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subcategories']['iteration']%$_smarty_tpl->tpl_vars['categories_per_md']->value==1) {?> first-item-of-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subcategories']['iteration']%$_smarty_tpl->tpl_vars['categories_per_sm']->value==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subcategories']['iteration']%$_smarty_tpl->tpl_vars['categories_per_xs']->value==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['subcategories']['iteration']%$_smarty_tpl->tpl_vars['categories_per_xxs']->value==1) {?> first-item-of-portrait-line<?php }?> <?php }?>">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category'],$_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="img">
                        <?php if ($_smarty_tpl->tpl_vars['subcategory']->value['id_image']) {?>
                            <img class="replace-2x" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['subcategory']->value['id_image'],'category_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" />
                        <?php } else { ?>
                            <img src="<?php echo $_smarty_tpl->tpl_vars['img_cat_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-category_default.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" />
                        <?php }?>
                    </a>
                    <h5><a class="subcategory-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['subcategory']->value['id_category'],$_smarty_tpl->tpl_vars['subcategory']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php if ($_smarty_tpl->tpl_vars['display_subcategory']->value==2||$_smarty_tpl->tpl_vars['display_subcategory']->value==3) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['subcategory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['subcategory']->value['name'],25,'...'), ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></h5>
                    <?php if ($_smarty_tpl->tpl_vars['subcategory']->value['description']) {?>
                        <div class="subcat_desc"><?php echo $_smarty_tpl->tpl_vars['subcategory']->value['description'];?>
</div>
                    <?php }?>
                </li>
            <?php } ?>
            </ul>
        </div>
        <?php }?>

        <?php if ($_smarty_tpl->tpl_vars['nb_products']->value==0) {?>
           <p class="alert alert-warning category_no_products"><?php echo smartyTranslate(array('s'=>'There are no products in  this category'),$_smarty_tpl);?>
</p>
           <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','location'=>"5",'mod'=>'steasycontent','caller'=>'steasycontent'),$_smarty_tpl);?>

        <?php }?>

		<?php if ($_smarty_tpl->tpl_vars['products']->value) {?>
			<div class="content_sortPagiBar">
                <div class="sortPagiBar clearfix">
                    <?php echo $_smarty_tpl->getSubTemplate ("./product-sort.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("./nbr-product-page.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                    <?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div>

            <?php echo $_smarty_tpl->getSubTemplate ("./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value), 0);?>

            
            <div class="content_sortPagiBar">
                <div class="bottom-pagination-content clearfix">
                    <?php echo $_smarty_tpl->getSubTemplate ("./pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('paginationId'=>'bottom'), 0);?>

                </div>
            </div>
		<?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['HOOK_CATEGORY_FOOTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_CATEGORY_FOOTER']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_CATEGORY_FOOTER']->value;?>
<?php }?>
	<?php } elseif ($_smarty_tpl->tpl_vars['category']->value->id) {?>
		<p class="alert alert-warning"><?php echo smartyTranslate(array('s'=>'This category is currently unavailable.'),$_smarty_tpl);?>
</p>
	<?php }?>
<?php }?>
<?php }} ?>
