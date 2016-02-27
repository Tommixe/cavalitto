<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_2_0_7($object)
{
    $result = true;

    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_mega_menu` `link_color`');  
   
    if(!is_array($field) || !count($field))
        $result &= Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_mega_menu` ADD `link_color` varchar(7) DEFAULT NULL');
        
	return $result;
}