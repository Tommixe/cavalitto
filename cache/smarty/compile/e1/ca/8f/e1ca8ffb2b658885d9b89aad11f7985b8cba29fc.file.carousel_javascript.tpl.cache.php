<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:44
         compiled from "/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/carousel_javascript.tpl" */ ?>
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
  'function' => 
  array (
  ),
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
  'unifunc' => 'content_568a7bfcae4f83_41129257',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcae4f83_41129257')) {function content_568a7bfcae4f83_41129257($_smarty_tpl) {?>
<script type="text/javascript">
//<![CDATA[

jQuery(function($) { 
    var owl = $("#<?php echo $_smarty_tpl->tpl_vars['identify']->value;?>
-itemslider .slides");
    owl.owlCarousel({
        
        autoPlay: <?php if ($_smarty_tpl->tpl_vars['slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
        slideSpeed: <?php echo $_smarty_tpl->tpl_vars['a_speed']->value;?>
,
        stopOnHover: <?php if ($_smarty_tpl->tpl_vars['pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
        lazyLoad: <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?>true<?php } else { ?>false<?php }?>,
        scrollPerPage: <?php if ($_smarty_tpl->tpl_vars['move']->value) {?>1<?php } else { ?>false<?php }?>,
        rewindNav: <?php if ($_smarty_tpl->tpl_vars['rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
        navigation: <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>true<?php } else { ?>false<?php }?>,
        pagination: <?php if ($_smarty_tpl->tpl_vars['control_nav']->value) {?>true<?php } else { ?>false<?php }?>,
        afterInit: productsSliderAfterInit,
        
        itemsCustom : [
            
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
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
</script><?php }} ?>
