<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_2_0_6($object)
{
    $result = true;

    $result &= $object->registerHook('displayMobileBarLeft');
    $result &= $object->registerHook('displayMobileMenu');
    $result &= $object->unregisterHook('displaySideBarRight');
    $result &= $object->unregisterHook('displayMobileBar');
    $result &= $object->unregisterHook('displayMobileBarRight');
    
	return $result;
}