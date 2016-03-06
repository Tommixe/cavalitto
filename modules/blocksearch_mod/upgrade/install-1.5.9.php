<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_5_9($object)
{
    $result = true;

    $result &= $object->registerHook('displaySideBarRight');
    $result &= $object->registerHook('displayMobileMenu');
    $result &= $object->unregisterHook('displayMobileBar');
    $result &= $object->unregisterHook('displayMobileBarRight');
    
	return $result;
}
