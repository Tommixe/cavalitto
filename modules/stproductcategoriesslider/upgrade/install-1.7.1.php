<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_7_1($object)
{
    $result = true;
    $_prefix_st = 'ST_PRO_CATE_';
    
    $result &= Configuration::updateGlobalValue($_prefix_st.'COUNTDOWN_ON', 1);
    $result &= Configuration::updateGlobalValue($_prefix_st.'COUNTDOWN_ON_COL', 1);

    return $result;
}