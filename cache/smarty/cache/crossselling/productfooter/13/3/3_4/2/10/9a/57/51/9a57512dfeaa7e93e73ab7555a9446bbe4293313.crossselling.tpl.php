<?php /*%%SmartyHeaderCode:1445957195568a7b93353799-92561294%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9a57512dfeaa7e93e73ab7555a9446bbe4293313' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/themes/panda/modules/crossselling/crossselling.tpl',
      1 => 1449302559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1445957195568a7b93353799-92561294',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfcb22d48_77341021',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcb22d48_77341021')) {function content_568a7bfcb22d48_77341021($_smarty_tpl) {?><section id="crossselling-products_block_center" class="block products_block section">
    <h3 class="title_block ">
        <span>
                    I clienti che hanno acquistato questo prodotto hanno comprato anche:
                </span>
    </h3>
    	<div id="crossselling-itemslider" class="products_slider">
            <div class="slides remove_after_init  owl-navigation-tr">
                                    <div class="ajax_block_product first_item">
                                                                                                <div class="pro_outer_box">
                        <div class="pro_first_box" itemprop="isRelatedTo" itemscope itemtype="https://schema.org/Product">
                            <a href="http://cavalitto.micreon.net/index.php?id_product=14&amp;controller=product&amp;id_lang=2" title="Guarnizione bocchettone serbatoio benzina Fulvia" class="product_image"><img itemprop="image" src="http://cavalitto.micreon.net/img/p/3/4/34-home_default.jpg" alt="Guarnizione bocchettone serbatoio benzina Fulvia" class="replace-2x img-responsive front-image" width="273" height="273" />                                                    </a>
                                                        <div class="hover_fly   mobile_hover_fly_show  fly_0 clearfix">
                                                            </div>
                        </div>
                        <div class="pro_second_box">
                                                                                                    <p itemprop="name" class="s_title_block "><a itemprop="url" href="http://cavalitto.micreon.net/index.php?id_product=14&amp;controller=product&amp;id_lang=2" title="Guarnizione bocchettone serbatoio benzina Fulvia">Guarnizione bocchettone...</a></p>
                          
                                                <div class="act_box  display_when_hover ">
                                                                                                                            <a class="ajax_add_to_cart_button btn btn-default" href="http://cavalitto.micreon.net/index.php?controller=cart&amp;qty=1&amp;id_product=14&amp;token=416326991d4a38107caaa92769f256b8&amp;add=" rel="nofollow" title="Aggiungi al carrello" data-id-product="14"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span>Aggiungi al carrello</span></div></a>
                                                                                                                        
                        </div>
                                                </div>
                        </div>
                    </div>
                            </div>
    <script type="text/javascript">
//<![CDATA[

jQuery(function($) { 
    var owl = $("#crossselling-itemslider .slides");
    owl.owlCarousel({
        
        autoPlay: false,
        slideSpeed: 400,
        stopOnHover: true,
        lazyLoad: false,
        scrollPerPage: false,
        rewindNav: false,
        navigation: true,
        pagination: false,
        afterInit: productsSliderAfterInit,
        
        itemsCustom : [
            
                                    [1180, 5],            
            [972, 4],
            [748, 3],
            [460, 1],
            [0, 1]
                         
        ]
    });
});
 
//]]>
</script>
</section>
<?php }} ?>
