<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_2_0($object)
{
    $result = true;

    $result &= Configuration::updateGlobalValue('STSN_F_TOP_BG_FIXED', 0);
    $result &= Configuration::updateGlobalValue('STSN_FOOTER_BG_FIXED', 0);
    $result &= Configuration::updateGlobalValue('STSN_F_SECONDARY_BG_FIXED', 0);
    $result &= Configuration::updateGlobalValue('STSN_F_INFO_BG_FIXED', 0);

    $result &= Configuration::updateGlobalValue('STSN_PRO_LR_PREV_NEXT_COLOR', '');
    $result &= Configuration::updateGlobalValue('STSN_PRO_LR_PREV_NEXT_COLOR_HOVER', '');
    $result &= Configuration::updateGlobalValue('STSN_PRO_LR_PREV_NEXT_COLOR_DISABLED', '');
    $result &= Configuration::updateGlobalValue('STSN_PRO_LR_PREV_NEXT_BG', '');
    $result &= Configuration::updateGlobalValue('STSN_PRO_LR_PREV_NEXT_BG_HOVER', '');
    $result &= Configuration::updateGlobalValue('STSN_PRO_LR_PREV_NEXT_BG_DISABLED', '');
    
    $result &= Configuration::updateGlobalValue('STSN_SIDE_PANEL_BG', '');
    $result &= Configuration::updateGlobalValue('STSN_FULLWIDTH_TOPBAR', 0);
    $result &= Configuration::updateGlobalValue('STSN_FULLWIDTH_HEADER', 0);
    $result &= Configuration::updateGlobalValue('STSN_HEADER_BOTTOM_BORDER_COLOR', '');
    $result &= Configuration::updateGlobalValue('STSN_HEADER_BOTTOM_BORDER', 0);
    $result &= Configuration::updateGlobalValue('STSN_USE_VIEW_MORE_INSTEAD', 0);

    $result &= $object->registerHook('displaySideBarRight');
    
    $result &= $object->add_quick_access();
    $result &= $object->clear_class_index();
    
    // clear smarty cache.
    Tools::clearSmartyCache();
    Media::clearCache();
    
	return $result;
}
