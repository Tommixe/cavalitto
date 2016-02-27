<?php /*%%SmartyHeaderCode:739020681568a7a06dcda10-90422561%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e4ec7aa24213c68b6d2bda2ea7b972fb7bb1417' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stfeaturedcategories/views/templates/hook/stfeaturedcategories.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '739020681568a7a06dcda10-90422561',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568bd236d02f03_03994876',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568bd236d02f03_03994876')) {function content_568bd236d02f03_03994876($_smarty_tpl) {?><!-- Featured categories -->
<div id="featured_categories_slider_container_99e2c99214" class="featured_categories_slider_container block ">
<section id="featured_categories_inner_99e2c99214" class="products_block section ">
    <h3 class="title_block "><span>Categorie in evidenza</span></h3>
                    <div id="featured_categories_slider_99e2c99214" class="products_slider">
            <div class="slides remove_after_init  owl-navigation-tr">
                                <div class="featured_categories_item item">
                    <a href="http://cavalitto.micreon.net/index.php?id_category=13&amp;controller=category&amp;id_lang=2" title="Fulvia" class="fc_cat_image">
                                            <img  data-src="http://cavalitto.micreon.net/img/c/13-category_default.jpg"  alt="Fulvia" width="273" height="273" class="replace-2x img-responsive  lazyOwl " />
                                        </a>
                    <div class="fc_cat_name"><p class="s_title_block"><a href="http://cavalitto.micreon.net/index.php?id_category=13&amp;controller=category&amp;id_lang=2" title="Fulvia">Fulvia</a></p></div>
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
