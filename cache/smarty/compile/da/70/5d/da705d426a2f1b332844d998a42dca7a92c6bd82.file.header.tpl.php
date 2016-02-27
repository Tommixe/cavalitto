<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/stblog/views/templates/hook/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84665894568a7a0502c307-63330572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da705d426a2f1b332844d998a42dca7a92c6bd82' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stblog/views/templates/hook/header.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84665894568a7a0502c307-63330572',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ss_slideshow' => 0,
    'ss_s_speed' => 0,
    'ss_a_speed' => 0,
    'ss_pause' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a0503f314_52981912',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a0503f314_52981912')) {function content_568a7a0503f314_52981912($_smarty_tpl) {?>
<script type="text/javascript">
// <![CDATA[

blog_flexslider_options = {
	
    autoPlay : <?php if ($_smarty_tpl->tpl_vars['ss_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['ss_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
    slideSpeed: <?php if (!$_smarty_tpl->tpl_vars['ss_a_speed']->value) {?>0<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['ss_a_speed']->value;?>
<?php }?>,
    stopOnHover: <?php if ($_smarty_tpl->tpl_vars['ss_pause']->value) {?>true<?php } else { ?>false<?php }?>,
    
};
//]]>
</script>
<?php }} ?>
