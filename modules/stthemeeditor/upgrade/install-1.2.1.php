<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_2_1($object)
{
    $result = true;

    $result &= Configuration::updateGlobalValue('STSN_STICKY_MOBILE_HEADER', 2);
    $result &= Configuration::updateGlobalValue('STSN_STICKY_MOBILE_HEADER_HEIGHT', 0);
    $result &= Configuration::updateGlobalValue('STSN_STICKY_MOBILE_HEADER_COLOR', '');
    $result &= Configuration::updateGlobalValue('STSN_STICKY_MOBILE_HEADER_BACKGROUND', '');
    $result &= Configuration::updateGlobalValue('STSN_STICKY_MOBILE_HEADER_BACKGROUND_OPACITY', 0.95);

    $_hooks = array(
        array('displayFullWidthTop2','displayFullWidthTop2','Full width top 2',1),
        array('displayMobileMenu','displayMobileMenu','Mobile menu',1),
    );
    foreach($_hooks as $v)
    {
        if(!$result)
            break;
            
        $id_hook = Hook::getIdByName($v[0]);
        if (!$id_hook)
        {
            $new_hook = new Hook();
            $new_hook->name = pSQL($v[0]);
            $new_hook->title = pSQL($v[1]);
            $new_hook->description = pSQL($v[2]);
            $new_hook->position = pSQL($v[3]);
            $new_hook->live_edit  = 0;
            $new_hook->add();
            $id_hook = $new_hook->id;
            if (!$id_hook)
                $result &= false;
        }
        else
        {
            Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'hook` set `title`="'.$v[1].'", `description`="'.$v[2].'", `position`="'.$v[3].'" where `id_hook`='.$id_hook);
        }
    }
    
    Db::getInstance()->execute('
        INSERT INTO `'._DB_PREFIX_.'image_type` (`name`, `width`, `height`, `products`, `categories`, `manufacturers`, `suppliers`, `scenes`)
        VALUES (\''.pSQL('thickbox_default_2x').'\', 700, 800, 1, 0, 0, 0, 1)');

    foreach(Shop::getCompleteListOfShopsID() AS $id_shop)
    {
        $cssFile = _PS_MODULE_DIR_ . $object->name . '/views/css/customer-s'.(int)$id_shop.'.css';
        @unlink($cssFile);    
    }
    
    $result &= $object->clear_class_index();
    // clear smarty cache.
    Tools::clearSmartyCache();
    Media::clearCache();

    // Rename these two folders to fix a bug.
    $dir = _PS_ROOT_DIR_.'/cache/smarty/';
    @rename($dir.'cache', $dir.'cache_1611_del');
    @rename($dir.'compile', $dir.'compile_1611_del');
    
	return $result;
}
