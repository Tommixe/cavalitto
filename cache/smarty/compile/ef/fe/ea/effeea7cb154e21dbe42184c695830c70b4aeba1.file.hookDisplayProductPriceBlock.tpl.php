<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/advancedeucompliance/views/templates/hook/hookDisplayProductPriceBlock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1606490013568a7a055d9c52-85291935%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'effeea7cb154e21dbe42184c695830c70b4aeba1' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/advancedeucompliance/views/templates/hook/hookDisplayProductPriceBlock.tpl',
      1 => 1449813699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1606490013568a7a055d9c52-85291935',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'smartyVars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a05634666_65230970',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a05634666_65230970')) {function content_568a7a05634666_65230970($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value)) {?>
    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['before_price'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['before_price']['from_str_i18n'])) {?>
        <span class="aeuc_from_label">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['before_price']['from_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </span>
    <?php }?>

    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['old_price'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['old_price']['before_str_i18n'])) {?>
        <span class="aeuc_before_label">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['old_price']['before_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </span>
    <?php }?>

    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['price'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['price']['tax_str_i18n'])) {?>
        <span class=<?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['price']['css_class'])) {?>
                        "<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['price']['css_class'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"
                    <?php } else { ?>
                        "aeuc_tax_label"
                    <?php }?>>
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['price']['tax_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </span>
    <?php }?>

    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['ship'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['ship']['link_ship_pay'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['ship']['ship_str_i18n'])) {?>
        <div class="aeuc_shipping_label">
            <a href="<?php echo $_smarty_tpl->tpl_vars['smartyVars']->value['ship']['link_ship_pay'];?>
" class="iframe">
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['ship']['ship_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

            </a>
        </div>
    <?php }?>

    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['weight'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['weight']['rounded_weight_str_i18n'])) {?>
        <div class="aeuc_weight_label">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['weight']['rounded_weight_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </div>
    <?php }?>

    
    <?php if (isset($_smarty_tpl->tpl_vars['smartyVars']->value['after_price'])&&isset($_smarty_tpl->tpl_vars['smartyVars']->value['after_price']['delivery_str_i18n'])) {?>
        <div class="aeuc_delivery_label">
            <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['smartyVars']->value['after_price']['delivery_str_i18n'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        </div>
    <?php }?>
<?php }?><?php }} ?>
