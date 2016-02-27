<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:03:00
         compiled from "/home/micreon/public_html/cavalitto/modules/advancedeucompliance/views/templates/hook/displayCartTotalPriceLabel.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1895038811568a7b94a70116-57909274%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16d6e38cd46fe8d746a5523bb64fa264e662fad0' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/advancedeucompliance/views/templates/hook/displayCartTotalPriceLabel.tpl',
      1 => 1449813699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1895038811568a7b94a70116-57909274',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'smartyVars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7b94a7fc67_91663815',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7b94a7fc67_91663815')) {function content_568a7b94a7fc67_91663815($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value)) {?>
    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['price'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['price']['tax_str_i18n'])) {?>
        <span class="aeuc_tax_label_shopping_cart">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['price']['tax_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </span>
    <?php }?>
<?php }?><?php }} ?>
