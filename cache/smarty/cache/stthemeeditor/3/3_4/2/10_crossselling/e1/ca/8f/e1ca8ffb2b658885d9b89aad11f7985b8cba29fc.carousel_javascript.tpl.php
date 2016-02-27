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
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfcb1ebc0_74472992',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcb1ebc0_74472992')) {function content_568a7bfcb1ebc0_74472992($_smarty_tpl) {?><script type="text/javascript">
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
</script><?php }} ?>
