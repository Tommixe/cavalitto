<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_9_2($object)
{
    $result = true;
    
    $result = $object->prepareHooks();
        
	return $result;
}
