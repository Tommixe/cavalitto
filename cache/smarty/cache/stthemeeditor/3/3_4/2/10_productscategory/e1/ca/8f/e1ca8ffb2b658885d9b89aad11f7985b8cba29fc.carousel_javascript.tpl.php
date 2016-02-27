<?php /*%%SmartyHeaderCode:895981919568a7bfca9b8e1-61753527%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1ca8ffb2b658885d9b89aad11f7985b8cba29fc' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/carousel_javascript.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '895981919568a7bfca9b8e1-61753527',
  'variables' => 
  array (
    'identify' => 0,
    'slideshow' => 0,
    's_speed' => 0,
    'a_speed' => 0,
    'pause_on_hover' => 0,
    'lazy_load' => 0,
    'move' => 0,
    'rewind_nav' => 0,
    'direction_nav' => 0,
    'control_nav' => 0,
    'sttheme' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pro_per_xxs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfcae7d84_56143381',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcae7d84_56143381')) {function content_568a7bfcae7d84_56143381($_smarty_tpl) {?><script type="text/javascript">
//<![CDATA[

jQuery(function($) { 
    var owl = $("#productscategory-itemslider .slides");
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
            [460, 2],
            [0, 1]
                         
        ]
    });
});
 
//]]>
</script><?php }} ?>
