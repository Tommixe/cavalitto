<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_2_9($object)
{
    $result = true;
    $_prefix_st = 'ST_B_';

    $result &= Configuration::updateValue($_prefix_st.'BLOG_FEATURED_A_CAT_MOD', 1);
    $result &= Configuration::updateValue($_prefix_st.'HOME_FEATURED_A_CAT_MOD', 1);
    
	return $result;
}
