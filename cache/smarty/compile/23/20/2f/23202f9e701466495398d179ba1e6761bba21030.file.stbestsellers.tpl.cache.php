<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 16:43:16
         compiled from "/home/micreon/public_html/cavalitto/modules/stbestsellers/views/templates/hook/stbestsellers.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1388827932568a9314dbe924-62931362%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '23202f9e701466495398d179ba1e6761bba21030' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stbestsellers/views/templates/hook/stbestsellers.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1388827932568a9314dbe924-62931362',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aw_display' => 0,
    'products' => 0,
    'column_slider' => 0,
    'hook_hash' => 0,
    'hide_mob' => 0,
    'countdown_on' => 0,
    'homeverybottom' => 0,
    'pro_per_fw' => 0,
    'display_as_grid' => 0,
    'title_position' => 0,
    'link' => 0,
    'slider_slideshow' => 0,
    'slider_s_speed' => 0,
    'slider_a_speed' => 0,
    'slider_pause_on_hover' => 0,
    'lazy_load' => 0,
    'slider_move' => 0,
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
    'has_background_img' => 0,
    'speed' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a9314ea5051_20327737',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a9314ea5051_20327737')) {function content_568a9314ea5051_20327737($_smarty_tpl) {?>

<!-- MODULE Top-sellers Slider -->
<?php if ($_smarty_tpl->tpl_vars['aw_display']->value||(isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value)) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array("column_slider", null, null); ob_start(); ?><?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>_column<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<div id="best-sellers_block_center_container_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="best-sellers_block_center_container <?php if ($_smarty_tpl->tpl_vars['hide_mob']->value) {?> hidden-xs <?php }?> block<?php if ($_smarty_tpl->tpl_vars['countdown_on']->value) {?> s_countdown_block<?php }?>">
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value&&!$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?><div class="wide_container"><div class="container"><?php }?>
<section id="best-sellers_block_center_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
" class="best-sellers_block_center<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
 <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?> column_block <?php }?> products_block <?php if (!!isset($_smarty_tpl->tpl_vars['column_slider']->value)||!$_smarty_tpl->tpl_vars['column_slider']->value) {?> section <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_as_grid']->value==1) {?> display_as_grid <?php } elseif ($_smarty_tpl->tpl_vars['display_as_grid']->value==2) {?> display_as_simple <?php }?>">
	<h3 class="title_block <?php if ((!isset($_smarty_tpl->tpl_vars['column_slider']->value)||!$_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['title_position']->value) {?> title_block_center <?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('best-sales'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Top sellers','mod'=>'stbestsellers'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Top sellers','mod'=>'stbestsellers'),$_smarty_tpl);?>
</a></h3>
    <script type="text/javascript">
    //<![CDATA[
    var best_itemslider_options<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
;
    //]]>
    </script>
	<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
    <?php if (!$_smarty_tpl->tpl_vars['display_as_grid']->value||($_smarty_tpl->tpl_vars['display_as_grid']->value&&isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value)) {?>
    <div id="bestsellers-itemslider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
" class="bestsellers-itemslider<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
 products_slider block_content">
        <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>
    	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-slider-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <?php } else { ?>
    	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

        <?php }?>
	</div>
    
    <script type="text/javascript">
    //<![CDATA[
    
    jQuery(function($) {
        var owl = $("#bestsellers-itemslider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
 .slides");
        owl.owlCarousel({
            
            autoPlay: <?php if ($_smarty_tpl->tpl_vars['slider_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['slider_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
            slideSpeed: <?php echo $_smarty_tpl->tpl_vars['slider_a_speed']->value;?>
,
            stopOnHover: <?php if ($_smarty_tpl->tpl_vars['slider_pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
            lazyLoad: <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?>true<?php } else { ?>false<?php }?>,
            scrollPerPage: <?php if ($_smarty_tpl->tpl_vars['slider_move']->value) {?>true<?php } else { ?>false<?php }?>,
            rewindNav: <?php if ($_smarty_tpl->tpl_vars['rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            afterInit: productsSliderAfterInit,
            <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>
            singleItem : true,
            navigation: true,
            pagination: false,
            <?php } else { ?>
            navigation: <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            pagination: <?php if ($_smarty_tpl->tpl_vars['control_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            
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
            
            <?php }?>
             
        });      
    });
     
    //]]>
    </script>
    <?php } elseif ($_smarty_tpl->tpl_vars['display_as_grid']->value==2) {?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list-simple.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value,'for_f'=>'sellers','id'=>'stbestsellers_grid'), 0);?>

    <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value,'class'=>'stbestsellers_grid','for_f'=>'sellers','id'=>'stbestsellers_grid'), 0);?>

    <?php }?>
    <?php } else { ?>
        <div class="block_content"><div class="warning"><?php echo smartyTranslate(array('s'=>'No best sellers at this time','mod'=>'stbestsellers'),$_smarty_tpl);?>
</div></div>
    <?php }?>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value&&!$_smarty_tpl->tpl_vars['pro_per_fw']->value) {?></div></div><?php }?>
</div>
<?php if (!Smarty::$_smarty_vars['capture']['column_slider']&&$_smarty_tpl->tpl_vars['has_background_img']->value&&$_smarty_tpl->tpl_vars['speed']->value) {?>
<script type="text/javascript">
//<![CDATA[

jQuery(function($) {
    $('#best-sellers_block_center_container_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
').parallax("50%", <?php echo floatval($_smarty_tpl->tpl_vars['speed']->value);?>
);
});
 
//]]>
</script>
<?php }?>
<?php }?>
<!-- /MODULE Top-sellers Slider --><?php }} ?>
