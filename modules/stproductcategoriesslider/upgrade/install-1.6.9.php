<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_6_9($object)
{
    $result = true;
    $_prefix_st = 'ST_PRO_CATE_';
    
    $result &= $object->registerHook('displayHeader');

    $result &= Configuration::updateValue($_prefix_st.'TOP_PADDING', '');
    $result &= Configuration::updateValue($_prefix_st.'BOTTOM_PADDING', '');
    $result &= Configuration::updateValue($_prefix_st.'TOP_MARGIN', '');
    $result &= Configuration::updateValue($_prefix_st.'BOTTOM_MARGIN', '');
    $result &= Configuration::updateValue($_prefix_st.'BG_PATTERN', 0);
    $result &= Configuration::updateValue($_prefix_st.'BG_IMG', '');
    $result &= Configuration::updateValue($_prefix_st.'BG_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'SPEED', 0);
    $result &= Configuration::updateValue($_prefix_st.'TITLE_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'TITLE_HOVER_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'TEXT_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'PRICE_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'LINK_HOVER_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'GRID_HOVER_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_COLOR_HOVER', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_COLOR_DISABLED', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_HOVER_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_DISABLED_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'PAG_NAV_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'PAG_NAV_BG_HOVER', '');
 
    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_product_categories_slider` `top_spacing`');  
   
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_product_categories_slider` 
        ADD `top_spacing` varchar(10) DEFAULT NULL,
        ADD `bottom_spacing` varchar(10) DEFAULT NULL,
        ADD `top_padding` varchar(10) DEFAULT NULL,
        ADD `bottom_padding` varchar(10) DEFAULT NULL,
        ADD `bg_pattern` tinyint(2) unsigned NOT NULL DEFAULT 0, 
        ADD `bg_img` varchar(255) DEFAULT NULL,
        ADD `bg_color` varchar(7) DEFAULT NULL,
        ADD `speed` float(4,1) unsigned NOT NULL DEFAULT 0.1,
        ADD `title_color` varchar(7) DEFAULT NULL,
        ADD `title_hover_color` varchar(7) DEFAULT NULL,
        ADD `text_color` varchar(7) DEFAULT NULL,
        ADD `price_color` varchar(7) DEFAULT NULL,
        ADD `grid_hover_bg` varchar(7) DEFAULT NULL,
        ADD `link_hover_color` varchar(7) DEFAULT NULL,
        ADD `direction_color` varchar(7) DEFAULT NULL,
        ADD `direction_color_hover` varchar(7) DEFAULT NULL,
        ADD `direction_color_disabled` varchar(7) DEFAULT NULL,
        ADD `direction_bg` varchar(7) DEFAULT NULL,
        ADD `direction_hover_bg` varchar(7) DEFAULT NULL,
        ADD `direction_disabled_bg` varchar(7) DEFAULT NULL,
        ADD `title_alignment` tinyint(1) unsigned NOT NULL DEFAULT 0, 
        ADD `title_font_size` int(10) unsigned NOT NULL DEFAULT 0, 
        ADD `direction_nav` tinyint(1) unsigned NOT NULL DEFAULT 1, 
        ADD `control_nav` tinyint(1) unsigned NOT NULL DEFAULT 0,
        ADD `control_bg` varchar(7) DEFAULT NULL,
        ADD `control_bg_hover` varchar(7) DEFAULT NULL,
        ADD `pro_per_fw` tinyint(2) unsigned NOT NULL DEFAULT 0, 
        ADD `pro_per_xl` tinyint(2) unsigned NOT NULL DEFAULT 1, 
        ADD `pro_per_lg` tinyint(2) unsigned NOT NULL DEFAULT 1, 
        ADD `pro_per_md` tinyint(2) unsigned NOT NULL DEFAULT 1, 
        ADD `pro_per_sm` tinyint(2) unsigned NOT NULL DEFAULT 1, 
        ADD `pro_per_xs` tinyint(2) unsigned NOT NULL DEFAULT 1, 
        ADD `pro_per_xxs` tinyint(2) unsigned NOT NULL DEFAULT 1'))
        $result &= false;

    $title_alignment = (int)Configuration::get($_prefix_st.'TITLE');
    $direction_nav   = (int)Configuration::get($_prefix_st.'DIRECTION_NAV');
    $control_nav     = (int)Configuration::get($_prefix_st.'CONTROL_NAV');
    $pro_per_xl     = (int)Configuration::get($_prefix_st.'PRO_CATE_PRO_PER_XL');
    $pro_per_lg     = (int)Configuration::get($_prefix_st.'PRO_CATE_PRO_PER_LG');
    $pro_per_md     = (int)Configuration::get($_prefix_st.'PRO_CATE_PRO_PER_MD');
    $pro_per_sm     = (int)Configuration::get($_prefix_st.'PRO_CATE_PRO_PER_SM');
    $pro_per_xs     = (int)Configuration::get($_prefix_st.'PRO_CATE_PRO_PER_XS');
    $pro_per_xxs     = (int)Configuration::get($_prefix_st.'PRO_CATE_PRO_PER_XXS');

    $result &= Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'st_product_categories_slider` SET `title_alignment` = '.$title_alignment.',`direction_nav` = '.$direction_nav.',`control_nav` = '.$control_nav.',`pro_per_xl` = '.$pro_per_xl.',`pro_per_lg` = '.$pro_per_lg.',`pro_per_md` = '.$pro_per_md.',`pro_per_sm` = '.$pro_per_sm.',`pro_per_xs` = '.$pro_per_xs.',`pro_per_xxs` = '.$pro_per_xxs);
    
    return $result;
}