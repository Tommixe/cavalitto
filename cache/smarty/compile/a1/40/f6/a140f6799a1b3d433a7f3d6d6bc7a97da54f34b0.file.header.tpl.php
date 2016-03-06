<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:20
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stblog\views\templates\hook\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:166856d9d6581e34d2-89296785%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a140f6799a1b3d433a7f3d6d6bc7a97da54f34b0' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stblog\\views\\templates\\hook\\header.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166856d9d6581e34d2-89296785',
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
  'unifunc' => 'content_56d9d65842a476_52229514',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d65842a476_52229514')) {function content_56d9d65842a476_52229514($_smarty_tpl) {?>
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
