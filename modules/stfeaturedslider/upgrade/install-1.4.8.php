<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_4_8($object)
{
    $_prefix_st = 'HOME_FEATURED_S_';
    $result = true;
    
    $result &= Configuration::updateGlobalValue($_prefix_st.'COUNTDOWN_ON', 1);
    $result &= Configuration::updateGlobalValue($_prefix_st.'COUNTDOWN_ON_COL', 1);
            
	return $result;
}
