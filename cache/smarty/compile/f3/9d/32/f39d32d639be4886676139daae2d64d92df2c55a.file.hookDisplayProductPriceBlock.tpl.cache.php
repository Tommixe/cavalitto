<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:51
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\advancedeucompliance\views\templates\hook\hookDisplayProductPriceBlock.tpl" */ ?>
<?php /*%%SmartyHeaderCode:546356d9d677dba916-58414299%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f39d32d639be4886676139daae2d64d92df2c55a' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\advancedeucompliance\\views\\templates\\hook\\hookDisplayProductPriceBlock.tpl',
      1 => 1449813699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '546356d9d677dba916-58414299',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'smartyVars' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d6782eaf95_65075001',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d6782eaf95_65075001')) {function content_56d9d6782eaf95_65075001($_smarty_tpl) {?>

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
