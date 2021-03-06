<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_1_7($object)
{
    $result = true;
 
    $result &= $object->prepareHooks();
    
    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_parallax_group` `top_spacing`');  
   
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_parallax_group` 
        ADD `top_spacing` varchar(10) DEFAULT NULL,
        ADD `bottom_spacing` varchar(10) DEFAULT NULL'))
        $result &= false;;
    
    return $result;
}
