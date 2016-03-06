<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_2_7($object)
{
    $result = true;
    $_prefix_st = 'ST_B_';

    $result &= $object->registerHook('displayHeader');

    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_TOP_PADDING', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_BOTTOM_PADDING', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_TOP_MARGIN', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_BOTTOM_MARGIN', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_BG_PATTERN', 0);
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_BG_IMG', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_BG_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_SPEED', 0);
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_TITLE_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_TEXT_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_LINK_HOVER_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_DIRECTION_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_DIRECTION_COLOR_HOVER', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_DIRECTION_COLOR_DISABLED', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_DIRECTION_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_DIRECTION_HOVER_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_DIRECTION_DISABLED_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_PAG_NAV_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_PAG_NAV_BG_HOVER', '');
    $result &= Configuration::updateValue($_prefix_st.'RECENT_A_TITLE_FONT_SIZE', 0);

	return $result;
}
