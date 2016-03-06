<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_3_9($object)
{
    $_prefix_st = 'ST_SELLERS_';

    $result = true;

    $result &= $object->registerHook('displayHeader');

    $result &= Configuration::updateValue($_prefix_st.'TOP_PADDING', '');
    $result &= Configuration::updateValue($_prefix_st.'BOTTOM_PADDING', '');
    $result &= Configuration::updateValue($_prefix_st.'TOP_MARGIN', '');
    $result &= Configuration::updateValue($_prefix_st.'BOTTOM_MARGIN', '');
    $result &= Configuration::updateValue($_prefix_st.'BG_PATTERN', 0);
    $result &= Configuration::updateValue($_prefix_st.'BG_IMG', '');
    $result &= Configuration::updateValue($_prefix_st.'BG_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'SPEED', 0);
    $result &= Configuration::updateValue($_prefix_st.'TITLE_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'TEXT_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'PRICE_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'LINK_HOVER_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'GRID_HOVER_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_COLOR', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_COLOR_HOVER', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_COLOR_DISABLED', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_HOVER_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'DIRECTION_DISABLED_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'PAG_NAV_BG', '');
    $result &= Configuration::updateValue($_prefix_st.'PAG_NAV_BG_HOVER', '');
    $result &= Configuration::updateValue($_prefix_st.'TITLE_FONT_SIZE', 0);
    $result &= Configuration::updateValue($_prefix_st.'SELLERS_PRO_PER_FW', 0);

	return $result;
}
