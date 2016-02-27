<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_2($object)
{
    $result = true;
    
    $result &= $object->prepareHooks();

    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_news_letter` `top_padding`');  
   
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_news_letter` 
        ADD `top_padding` varchar(10) DEFAULT NULL,
        ADD `bottom_padding` varchar(10) DEFAULT NULL'))
        $result &= false;
        
	return $result;
}
