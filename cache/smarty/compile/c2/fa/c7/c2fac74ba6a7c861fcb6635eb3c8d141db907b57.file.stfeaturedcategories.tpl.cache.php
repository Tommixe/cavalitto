<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:59
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stfeaturedcategories\views\templates\hook\stfeaturedcategories.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1085956d9d67faff5e8-71331129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2fac74ba6a7c861fcb6635eb3c8d141db907b57' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stfeaturedcategories\\views\\templates\\hook\\stfeaturedcategories.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1085956d9d67faff5e8-71331129',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aw_display' => 0,
    'featured_categories' => 0,
    'hook_hash' => 0,
    'hide_mob' => 0,
    'homeverybottom' => 0,
    'pro_per_fw' => 0,
    'display_as_grid' => 0,
    'title_position' => 0,
    'direction_nav' => 0,
    'category' => 0,
    'link' => 0,
    'lazy_load' => 0,
    'categorySize' => 0,
    'img_cat_dir' => 0,
    'lang_iso' => 0,
    'slider_slideshow' => 0,
    'slider_s_speed' => 0,
    'slider_a_speed' => 0,
    'slider_pause_on_hover' => 0,
    'control_nav' => 0,
    'slider_move' => 0,
    'rewind_nav' => 0,
    'sttheme' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pro_per_xxs' => 0,
    'has_background_img' => 0,
    'speed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d680972d24_72043595',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d680972d24_72043595')) {function content_56d9d680972d24_72043595($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\tools\\smarty\\plugins\\modifier.replace.php';
?>
<!-- Featured categories -->
<?php if ($_smarty_tpl->tpl_vars['aw_display']->value||(isset($_smarty_tpl->tpl_vars['featured_categories']->value)&&$_smarty_tpl->tpl_vars['featured_categories']->value)) {?>
<div id="featured_categories_slider_container_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="featured_categories_slider_container block <?php if ($_smarty_tpl->tpl_vars['hide_mob']->value) {?> hidden-xs <?php }?>">
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value&&!$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?><div id="featured_categories_outer_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="wide_container"><div class="container"><?php }?>
<section id="featured_categories_inner_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="products_block section <?php if (isset($_smarty_tpl->tpl_vars['display_as_grid']->value)&&$_smarty_tpl->tpl_vars['display_as_grid']->value) {?> display_as_grid <?php }?>">
    <h3 class="title_block <?php if ($_smarty_tpl->tpl_vars['title_position']->value) {?> title_block_center <?php }?>"><span><?php echo smartyTranslate(array('s'=>'Featured categories','mod'=>'stfeaturedcategories'),$_smarty_tpl);?>
</span></h3>
    <?php if (isset($_smarty_tpl->tpl_vars['featured_categories']->value)&&is_array($_smarty_tpl->tpl_vars['featured_categories']->value)&&count($_smarty_tpl->tpl_vars['featured_categories']->value)) {?>
        <?php if (!isset($_smarty_tpl->tpl_vars['display_as_grid']->value)||!$_smarty_tpl->tpl_vars['display_as_grid']->value) {?>
        <div id="featured_categories_slider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="products_slider">
            <div class="slides remove_after_init <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
                <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['category']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['category']->iteration++;
?>
                <div class="featured_categories_item item">
                    <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="fc_cat_image">
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['id_image']) {?>
                        <img <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> data-src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value['link_rewrite'],$_smarty_tpl->tpl_vars['category']->value['id_image'],'category_default'), ENT_QUOTES, 'UTF-8', true);?>
" <?php } else { ?> src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value['link_rewrite'],$_smarty_tpl->tpl_vars['category']->value['id_image'],'category_default'), ENT_QUOTES, 'UTF-8', true);?>
" <?php }?> alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" class="replace-2x img-responsive <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> lazyOwl <?php }?>" />
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['img_cat_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-category_default.jpg" alt="" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" class="replace-2x img-responsive" />
                    <?php }?>
                    </a>
                    <div class="fc_cat_name"><p class="s_title_block"><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['category']->value['name'],35,'...'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></p></div>
                </div>
                <?php } ?>
            </div>
        </div>
        
        <script type="text/javascript">
        //<![CDATA[
        
        jQuery(function($) { 
            var owl = $("#featured_categories_slider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
 .slides");
            owl.owlCarousel({
                
                autoPlay: <?php if ($_smarty_tpl->tpl_vars['slider_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['slider_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
                slideSpeed: <?php echo $_smarty_tpl->tpl_vars['slider_a_speed']->value;?>
,
                stopOnHover: <?php if ($_smarty_tpl->tpl_vars['slider_pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
                navigation: <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>true<?php } else { ?>false<?php }?>,
                pagination: <?php if ($_smarty_tpl->tpl_vars['control_nav']->value) {?>true<?php } else { ?>false<?php }?>,
                lazyLoad: <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?>true<?php } else { ?>false<?php }?>,
                scrollPerPage: <?php if ($_smarty_tpl->tpl_vars['slider_move']->value) {?>true<?php } else { ?>false<?php }?>,
                rewindNav: <?php if ($_smarty_tpl->tpl_vars['rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
                afterInit: productsSliderAfterInit,
                
                itemsCustom : [
                    
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value&&$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?>[<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>1660<?php } else { ?>1420<?php }?>, <?php echo $_smarty_tpl->tpl_vars['pro_per_fw']->value;?>
],<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>[1420, <?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
],<?php }?>
                    <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>[1180, <?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
],<?php }?>
                    
                    [972, <?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
],
                    [748, <?php echo $_smarty_tpl->tpl_vars['pro_per_sm']->value;?>
],
                    [460, <?php echo $_smarty_tpl->tpl_vars['pro_per_xs']->value;?>
],
                    [0, <?php echo $_smarty_tpl->tpl_vars['pro_per_xxs']->value;?>
]
                    <?php } else { ?>
                    [0, <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
<?php }?>]
                    
                    <?php }?>
                     
                ]
            });
        });
         
        //]]>
        </script>
        <?php } else { ?>
            <ul class="featured_categories_list row">
            <?php  $_smarty_tpl->tpl_vars['category'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['category']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['featured_categories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['category']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['category']->key => $_smarty_tpl->tpl_vars['category']->value) {
$_smarty_tpl->tpl_vars['category']->_loop = true;
 $_smarty_tpl->tpl_vars['category']->iteration++;
?>
                <li class="col-lg-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_lg']->value),'.','-');?>
 col-md-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_md']->value),'.','-');?>
 col-sm-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_sm']->value),'.','-');?>
 col-xs-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xs']->value),'.','-');?>
 col-xxs-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xxs']->value),'.','-');?>
  <?php if ($_smarty_tpl->tpl_vars['category']->iteration%$_smarty_tpl->tpl_vars['pro_per_lg']->value==1) {?> first-item-of-desktop-line<?php }?><?php if ($_smarty_tpl->tpl_vars['category']->iteration%$_smarty_tpl->tpl_vars['pro_per_md']->value==1) {?> first-item-of-line<?php }?><?php if ($_smarty_tpl->tpl_vars['category']->iteration%$_smarty_tpl->tpl_vars['pro_per_sm']->value==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->tpl_vars['category']->iteration%$_smarty_tpl->tpl_vars['pro_per_xs']->value==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->tpl_vars['category']->iteration%$_smarty_tpl->tpl_vars['pro_per_xxs']->value==1) {?> first-item-of-portrait-line<?php }?>">
                    <a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="fc_cat_image">
                    <?php if ($_smarty_tpl->tpl_vars['category']->value['id_image']) {?>
                        <img src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCatImageLink($_smarty_tpl->tpl_vars['category']->value['link_rewrite'],$_smarty_tpl->tpl_vars['category']->value['id_image'],'category_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" class="replace-2x img-responsive" />
                    <?php } else { ?>
                        <img src="<?php echo $_smarty_tpl->tpl_vars['img_cat_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-category_default.jpg" alt="" width="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['categorySize']->value['height'];?>
" class="replace-2x img-responsive" />
                    <?php }?>
                    </a>
                    <p class="fc_cat_name s_title_block"><a href="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getCategoryLink($_smarty_tpl->tpl_vars['category']->value['id_category'],$_smarty_tpl->tpl_vars['category']->value['link_rewrite']), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['category']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['category']->value['name'],35,'...'), ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
</a></p>
                </li>
            <?php } ?>
            </ul>
        <?php }?>
    <?php } else { ?>
        <p class="warning"><?php echo smartyTranslate(array('s'=>'No featured categories','mod'=>'stfeaturedcategories'),$_smarty_tpl);?>
</p>
    <?php }?>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value&&!$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?></div></div><?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['has_background_img']->value&&$_smarty_tpl->tpl_vars['speed']->value) {?>
<script type="text/javascript">
//<![CDATA[

jQuery(function($) {
    $('#featured_categories_slider_container_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
').parallax("50%", <?php echo floatval($_smarty_tpl->tpl_vars['speed']->value);?>
);
});
 
//]]>
</script>
<?php }?>
<?php }?>
<!--/ Featured categories --><?php }} ?>
