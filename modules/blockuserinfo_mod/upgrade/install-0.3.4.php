<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_0_3_4($object)
{
    $result = true;
    
    $result &= $object->registerHook('displayMobileMenu');
        
	return $result;
}
