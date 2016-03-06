<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_7_9($object)
{
	$result = true;
    
    $result = $object->prepareHooks();
            
    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_banner` `text_width`');  
      
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_banner` ADD `text_width` tinyint(2) unsigned NOT NULL DEFAULT 0'))
            $result &= false;

    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_banner_group` `padding`');  
      
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_banner_group` 
        ADD `padding` varchar(10) DEFAULT NULL,
        ADD `top_spacing` varchar(10) DEFAULT NULL,
        ADD `bottom_spacing` varchar(10) DEFAULT NULL,
        ADD `id_cms` int(10) unsigned NOT NULL DEFAULT 0,
        ADD `id_cms_category` int(10) unsigned NOT NULL DEFAULT 0'
        ))
		$result &= false;

    return $result;
}
