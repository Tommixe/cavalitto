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
  'unifunc' => 'content_56d9d680d22364_61189452',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d680d22364_61189452')) {function content_56d9d680d22364_61189452($_smarty_tpl) {?><!-- Featured categories -->
<div id="featured_categories_slider_container_99e2c99214" class="featured_categories_slider_container block ">
<section id="featured_categories_inner_99e2c99214" class="products_block section ">
    <h3 class="title_block "><span>Featured categories</span></h3>
                    <div id="featured_categories_slider_99e2c99214" class="products_slider">
            <div class="slides remove_after_init  owl-navigation-tr">
                                <div class="featured_categories_item item">
                    <a href="http://127.0.0.1/edsa-cavalitto/index.php?id_category=13&amp;controller=category&amp;id_lang=1" title="Fulvia" class="fc_cat_image">
                                            <img  data-src="http://127.0.0.1/edsa-cavalitto/img/c/13-category_default.jpg"  alt="Fulvia" width="273" height="273" class="replace-2x img-responsive  lazyOwl " />
                                        </a>
                    <div class="fc_cat_name"><p class="s_title_block"><a href="http://127.0.0.1/edsa-cavalitto/index.php?id_category=13&amp;controller=category&amp;id_lang=1" title="Fulvia">Fulvia</a></p></div>
                </div>
                            </div>
        </div>
        
        <script type="text/javascript">
        //<![CDATA[
        
        jQuery(function($) { 
            var owl = $("#featured_categories_slider_99e2c99214 .slides");
            owl.owlCarousel({
                
                autoPlay: false,
                slideSpeed: 400,
                stopOnHover: true,
                navigation: true,
                pagination: false,
                lazyLoad: true,
                scrollPerPage: false,
                rewindNav: false,
                afterInit: productsSliderAfterInit,
                
                itemsCustom : [
                    
                                                                                [1180, 4],                    
                    [972, 4],
                    [748, 3],
                    [460, 3],
                    [0, 2]
                                         
                ]
            });
        });
         
        //]]>
        </script>
            </section>
</div>
<!--/ Featured categories --><?php }} ?>
