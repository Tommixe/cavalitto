<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
if (!defined('_PS_VERSION_'))
	exit;
    
require (dirname(__FILE__).'/StFeaturedCategoriesClass.php');

class StFeaturedCategories extends Module
{
    protected static $cache_featured_categories = false;
	private $_html = '';
    public $fields_list;
    public $fields_form;
    private $_baseUrl;
    private $spacer_size = '5';
    public $validation_errors = array();
    private $_prefix_st = 'ST_PRO_CATE_F_C_';
    private $_prefix_stsn = 'STSN_';
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    protected static $access_rights = 0775;
    public  $fields_form_setting;
    private $_hooks = array();
	
	public function __construct()
	{
		$this->name          = 'stfeaturedcategories';
		$this->tab           = 'front_office_features';
		$this->version       = '1.4.8';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
        
        $this->initHookArray();

		$this->displayName   = $this->l('Featured categories');
		$this->description   = $this->l('Display featured categories on your homepage.');
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
        			'id' => 'displayHome',
        			'val' => '1',
        			'name' => $this->l('displayHome')
        		),
        		array(
        			'id' => 'displayHomeTop',
        			'val' => '1',
        			'name' => $this->l('displayHomeTop')
        		),
                array(
        			'id' => 'displayHomeBottom',
        			'val' => '1',
        			'name' => $this->l('displayHomeBottom')
        		),
                array(
                    'id' => 'displayTopColumn',
                    'val' => '1',
                    'name' => $this->l('displayTopColumn')
                ),
                array(
                    'id' => 'displayBottomColumn',
                    'val' => '1',
                    'name' => $this->l('displayBottomColumn')
                ),
                array(
                    'id' => 'displayFullWidthBottom',
                    'val' => '1',
                    'name' => $this->l('displayFullWidthBottom')
                ),
                array(
                    'id' => 'displayFullWidthTop',
                    'val' => '1',
                    'name' => $this->l('displayFullWidthTop')
                ),
                array(
                    'id' => 'displayFullWidthTop2',
                    'val' => '1',
                    'name' => $this->l('displayFullWidthTop2')
                ),
                array(
                    'id' => 'displayHomeTertiaryLeft',
                    'val' => '1',
                    'name' => $this->l('displayHomeTertiaryLeft')
                ),
                array(
                    'id' => 'displayHomeTertiaryRight',
                    'val' => '1',
                    'name' => $this->l('displayHomeTertiaryRight')
                ),
        		array(
        			'id' => 'displayHomeSecondaryRight',
        			'val' => '1',
        			'name' => $this->l('displayHomeSecondaryRight')
        		)
            )
        );
    }
    
    private function saveHook()
    {
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $id_hook = Hook::getIdByName($value['id']);
                
                if (Tools::getValue($key.'_'.$value['id']))
                {
                    if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                        continue;
                    if (!$this->isHookableOn($value['id']))
                        $this->validation_errors[] = $this->l('This module cannot be transplanted to '.$value['id'].'.');
                    else
                        $rs = $this->registerHook($value['id'], Shop::getContextListShopID());
                }
                else
                {
                    if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    {
                        $this->unregisterHook($id_hook, Shop::getContextListShopID());
                        $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
                    } 
                }
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }

	public function install()
	{
	    if (!$this->installDB()
            || !parent::install()
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('actionCategoryAdd')
			|| !$this->registerHook('actionCategoryDelete')
			|| !$this->registerHook('actionCategoryUpdate')
			|| !$this->registerHook('displayHome')
            || !Configuration::updateValue($this->_prefix_st.'GRID', 0)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_FW', 0)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_XL', 5)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_LG', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_MD', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_SM', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_XS', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_CATE_PER_XXS', 2)

            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE_ON_HOVER', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV', 0)
            || !Configuration::updateValue($this->_prefix_st.'LAZY', 1)
            || !Configuration::updateValue($this->_prefix_st.'MOVE', 0)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB', 0)     
            || !Configuration::updateValue($this->_prefix_st.'AW_DISPLAY', 1)
            || !Configuration::updateValue($this->_prefix_st.'TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_NAV', 1)
            || !Configuration::updateValue($this->_prefix_st.'CONTROL_NAV', 0)
            //
            || !Configuration::updateValue($this->_prefix_st.'TOP_PADDING', '')
            || !Configuration::updateValue($this->_prefix_st.'BOTTOM_PADDING', '')
            || !Configuration::updateValue($this->_prefix_st.'TOP_MARGIN', '')
            || !Configuration::updateValue($this->_prefix_st.'BOTTOM_MARGIN', '')
            || !Configuration::updateValue($this->_prefix_st.'BG_PATTERN', 0)
            || !Configuration::updateValue($this->_prefix_st.'BG_IMG', '')
            || !Configuration::updateValue($this->_prefix_st.'BG_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'SPEED', 0)
            || !Configuration::updateValue($this->_prefix_st.'TITLE_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'TEXT_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'LINK_HOVER_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'GRID_HOVER_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_COLOR_HOVER', '')
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_COLOR_DISABLED', '')
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_HOVER_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_DISABLED_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'PAG_NAV_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'PAG_NAV_BG_HOVER', '')
            || !Configuration::updateValue($this->_prefix_st.'TITLE_FONT_SIZE', 0)
            )
            return false;    
		$this->clearstfeaturedcategoryCache();
		return true;
	}

	public function installDb()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_featured_category` (
				`id_st_featured_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_parent` int(10) NOT NULL DEFAULT 0,
                `level_depth` tinyint(3) unsigned NOT NULL DEFAULT 0,   
				`id_shop` int(10) unsigned NOT NULL,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `txt_color` varchar(7) DEFAULT NULL,
                `txt_color_over` varchar(7) DEFAULT NULL,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `auto_sub` tinyint(1) unsigned NOT NULL DEFAULT 0,
    			`cover` varchar(255) DEFAULT NULL,
				PRIMARY KEY (`id_st_featured_category`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
        $this->clearstfeaturedcategoryCache();
		return true;
	}

	private function uninstallDb()
	{
		$this->clearstfeaturedcategoryCache();
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_featured_category`');
	}
    private function _checkEnv()
    {
        $file = _PS_UPLOAD_DIR_.'.htaccess';
        $file_tpl = _PS_MODULE_DIR_.'stthemeeditor/config/upload_htaccess.tpl';
        if (!file_exists($file) || !file_exists($file_tpl))
            return true;
        if (!is_writeable($file) || !is_readable($file_tpl))
            return false;
        
        return @file_put_contents($file, @file_get_contents($file_tpl));
    }
    private function _checkImageDir()
    {
        $result = '';
        if (!file_exists(_PS_UPLOAD_DIR_.$this->name))
        {
            $success = @mkdir(_PS_UPLOAD_DIR_.$this->name, self::$access_rights, true)
                        || @chmod(_PS_UPLOAD_DIR_.$this->name, self::$access_rights);
            if(!$success)
                $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->l('An error occurred during new folder creation'));
        }

        if (!is_writable(_PS_UPLOAD_DIR_))
            $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->l('directory isn\'t writable.'));
        
        return $result;
    }
    public function uploadCheckAndGetName($name)
    {
        $type = strtolower(substr(strrchr($name, '.'), 1));
        if(!in_array($type, $this->imgtype))
            return false;
        $filename = Tools::encrypt($name.sha1(microtime()));
        while (file_exists(_PS_UPLOAD_DIR_.$filename.'.'.$type)) {
            $filename .= rand(10, 99);
        } 
        return $filename.'.'.$type;
    }
    public function fetchMediaServer(&$slider)
    {
        $slider = _THEME_PROD_PIC_DIR_.$slider;
        $slider = context::getContext()->link->protocol_content.Tools::getMediaServer($slider).$slider;
    }
           
	public function getContent()
	{
        $check_result = $this->_checkImageDir();
        $this->context->controller->addCSS($this->_path.'views/css/admin.css');
        $this->context->controller->addJS($this->_path.'views/js/admin.js');

        if(Tools::getValue('act')=='delete_image')
        {
            $result = array(
                'r' => false,
                'm' => '',
                'd' => ''
            );
            if(Configuration::updateValue($this->_prefix_st.'BG_IMG', ''))
                $result['r'] = true;
            die(json_encode($result));
        }

    	$id_st_featured_category = (int)Tools::getValue('id_st_featured_category');
		if (isset($_POST['savestfeaturedcategory']) || isset($_POST['savestfeaturedcategoryAndStay']))
        {
            if($id_st_featured_category)
            {
                $category = new StFeaturedCategoriesClass($id_st_featured_category);
                $id_category_old = $category->id_category;
            }
			else
				$category = new StFeaturedCategoriesClass();
            
            $error = array();
            if (!Tools::getValue('id_category'))
                 $error[] = $this->displayError($this->l('Top category is required.'));
            
            $category->id_shop = (int)Shop::getContextShopID();
            
            if (!$category->id_shop)
                $error[] = $this->displayError($this->l('Action denied, please select a store.'));
            
            if (!count($error))
            {                
        		$category->copyFromPost();
        		$category->id_parent = 0;
                $category->level_depth = 0; 

                if ($category->validateFields(false) && $category->validateFieldsLang(false))
                {
                    if($category->position==0)
                        $category->position = StFeaturedCategoriesClass::getMaximumPosition(0);
                    if($category->save())
                    {
                        $category->clearPosition();
                        $this->clearstfeaturedcategoryCache();
                        if(isset($_POST['savestfeaturedcategoryAndStay']) || Tools::getValue('fr') == 'view')
                        {
                            $rd_str = isset($_POST['savestfeaturedcategoryAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestfeaturedcategoryAndStay']) ? 'update' : 'view');
                            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id.'&conf='.($id_st_featured_category?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                        }    
                        else
                        {
                            $this->clearstfeaturedcategoryCache();
                            $this->_html .= $this->displayConfirmation($this->l('Featured category').' '.($id_st_featured_category ? $this->l('updated') : $this->l('added')));                            
                                                    
                        }
                    }
                    else
                        $this->_html .= $this->displayError($this->l('An error occurred during Featured category').' '.($id_st_featured_category ? $this->l('updating') : $this->l('creation')));
                }
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->l('Invalid value for field(s).'));
        }
        if (isset($_POST['savesettingstfeaturedcategories']))
		{
		    $this->initSettingForm();
            
            foreach($this->fields_form_setting as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
        						$errors[] = sprintf(Tools::displayError('Field "%s" is required.'), $field['label']);
                        elseif($value)
                        {
        					if (!Validate::$field['validation']($value))
        						$errors[] = sprintf(Tools::displayError('Field "%s" is invalid.'), $field['label']);
                        }
        				// Set default value
        				if ($value === false && isset($field['default_value']))
        					$value = $field['default_value'];
                         
                        if(count($errors))
                        {
                            $this->validation_errors = array_merge($this->validation_errors, $errors);
                        }
                        elseif($value==false)
                        {
                            switch($field['validation'])
                            {
                                case 'isUnsignedId':
                                case 'isUnsignedInt':
                                case 'isInt':
                                case 'isBool':
                                    $value = 0;
                                break;
                                case 'isNullOrUnsignedId':
                                    $value = $value==='0' ? '0' : '';
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                    }

            $name = $this->fields_form_setting[1]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form_setting[1]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue('STSN_'.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

            if(!count($this->validation_errors))
            {
                if (isset($_FILES['bg_img']) && isset($_FILES['bg_img']['tmp_name']) && !empty($_FILES['bg_img']['tmp_name'])) 
                {
                    if ($vali = ImageManager::validateUpload($_FILES['bg_img'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                       $this->validation_errors[] = Tools::displayError($vali);
                    else 
                    {
                        $bg_image = $this->uploadCheckAndGetName($_FILES['bg_img']['name']);
                        if(!$bg_image)
                            $this->validation_errors[] = Tools::displayError('Image format not recognized');
                        $this->_checkEnv();
                        if (!move_uploaded_file($_FILES['bg_img']['tmp_name'], _PS_UPLOAD_DIR_.$this->name.'/'.$bg_image))
                            $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                        else
                            Configuration::updateValue($this->_prefix_st.'BG_IMG', $this->name.'/'.$bg_image);
                    }
                }
            }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->saveHook();
                $this->clearstfeaturedcategoryCache();
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
            $helper = $this->initFormSetting();
			return $this->_html.$helper->generateForm($this->fields_form_setting);
		}
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_featured_category') && Tools::isSubmit('position'))
		{
		    $category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if($category->id && $category->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                $this->clearstfeaturedcategoryCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'));                
            }
            else
                $this->_html .= $this->displayError($this->l('Failed to update the position.'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
        if (Tools::isSubmit('addstfeaturedcategories'))
		{
            $helper = $this->_displayForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('addsubstfeaturedcategories'))
		{
            if(!Tools::getValue('id_parent'))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $helper = $this->initCategoryForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('updatestfeaturedcategories'))
        {
    		$category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if(!Validate::isLoadedObject($category) || $category->id_shop!=(int)Shop::getContextShopID())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
               
            if($category->id_parent)
            {
                $helper = $this->initCategoryForm(); 
                $this->_html .= $helper->generateForm($this->fields_form);
            }
            elseif(!$category->id_parent)
            {
                $helper = $this->_displayForm(); 
                $this->_html .= $helper->generateForm($this->fields_form);
            }
			return $this->_html; 
        }
        else if (Tools::isSubmit('deletestfeaturedcategories'))
		{
    		$category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if(Validate::isLoadedObject($category))
            {                    
                $category->delete();
                $category->clearPosition();
                $this->clearstfeaturedcategoryCache();
                
                if($category->id_parent)
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif (Tools::isSubmit('statusstfeaturedcategories'))
		{
            $category = new StFeaturedCategoriesClass($id_st_featured_category);
            if (Validate::isLoadedObject($category))
            {
                $category->troggleStatus();
                $this->clearstfeaturedcategoryCache();
            }
            if($category->id_parent)
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif (Tools::isSubmit('settingstfeaturedcategories'))
		{
		    $this->initSettingForm();

            if ($bg_img = Configuration::get($this->_prefix_st.'BG_IMG'))
            {
                $this->fetchMediaServer($bg_img);
                $this->fields_form_setting[1]['form']['input']['bg_img_field']['image'] = '<img width=200 src="'.($bg_img).'" /><p><a class="btn btn-default st_delete_image" href="javascript:;"><i class="icon-trash"></i> Delete</a></p>';
            }

            $helper = $this->initFormSetting();
            
			return $this->_html.$helper->generateForm($this->fields_form_setting);
		}
        else
        {
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
            $helper = $this->initList();
            $list = StFeaturedCategoriesClass::getSub(0);
			return $this->_html.$helper->generateList($list, $this->fields_list);
        }
            
	}
    
    public function getPatterns()
    {
        $html = '';
        foreach(range(1,27) as $v)
            $html .= '<div class="parttern_wrap" style="background:url('._MODULE_DIR_.'stthemeeditor/patterns/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>Pattern credits:<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    
    public function getPatternsArray()
    {
        $arr = array();
        for($i=1;$i<=27;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }
    public function initSettingForm()
    {
		$this->fields_form_setting[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Settings'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display categories:'),
                    'name' => 'grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'grid_slider',
                            'value' => 0,
                            'label' => $this->l('Slider')),
                        array(
                            'id' => 'grid_grid',
                            'value' => 1,
                            'label' => $this->l('Grid view')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Always display this block:'),
                    'name' => 'aw_display',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'aw_display_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'aw_display_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
				),
			),
            'submit' => array(
				'title' => $this->l('Save'),
			),
		);

        $this->fields_form_setting[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Slider'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('Items per row:'),
                    'name' => 'featured_cate_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('fw','xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Autoplay:'),
                    'name' => 'slideshow',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'slideshow_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'slideshow_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Time:'),
                    'name' => 's_speed',
                    'default_value' => 7000,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Transition period:'),
                    'name' => 'a_speed',
                    'default_value' => 400,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause On Hover:'),
                    'name' => 'pause_on_hover',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pause_on_hover_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pause_on_hover_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Rewind to first after the last slide:'),
                    'name' => 'rewind_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'rewind_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'rewind_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Lazy load:'),
                    'name' => 'lazy',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'lazy_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'lazy_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Scroll:'),
                    'name' => 'move',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'move_on',
                            'value' => 1,
                            'label' => $this->l('Scroll per page')),
                        array(
                            'id' => 'move_off',
                            'value' => 0,
                            'label' => $this->l('Scroll per item')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide on mobile:'),
                    'name' => 'hide_mob',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_mob_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'hide_mob_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('screen width < 768px.'),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),

                array(
                    'type' => 'text',
                    'label' => $this->l('Top padding:'),
                    'name' => 'top_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Bottom padding:'),
                    'name' => 'bottom_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Top spacing:'),
                    'name' => 'top_margin',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Bottom spacing:'),
                    'name' => 'bottom_margin',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Background color:'),
                    'name' => 'bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Select a pattern number:'),
                    'name' => 'bg_pattern',
                    'options' => array(
                        'query' => $this->getPatternsArray(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->l('None'),
                        ),
                    ),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
                ),
                'bg_img_field' => array(
                    'type' => 'file',
                    'label' => $this->l('Upload your own pattern or background image:'),
                    'name' => 'bg_img',
                    'desc' => '',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Parallax speed factor:'),
                    'name' => 'speed',
                    'default_value' => 0,
                    'desc' => $this->l('Speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling.'),
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Heading font size:'),
                    'name' => 'title_font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Heading color:'),
                    'name' => 'title_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Text color:'),
                    'name' => 'text_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Category name hover color:'),
                    'name' => 'link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Grid hover background:'),
                    'name' => 'grid_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next color:'),
                    'name' => 'direction_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next hover color:'),
                    'name' => 'direction_color_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next disabled color:'),
                    'name' => 'direction_color_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next background:'),
                    'name' => 'direction_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next hover background:'),
                    'name' => 'direction_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next disabled background:'),
                    'name' => 'direction_disabled_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Navigation color:'),
                    'name' => 'pag_nav_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  
                 array(
                    'type' => 'color',
                    'label' => $this->l('Navigation active color:'),
                    'name' => 'pag_nav_bg_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ), 
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        
        $this->fields_form_setting[2]['form'] = array(
			'legend' => array(
				'title' => $this->l('Hook manager'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->l('Check the hook that you would like this module to display on.').'<br/><a href="'._MODULE_DIR_.'stthemeeditor/img/hook_into_hint.jpg" target="_blank" >'.$this->l('Click here to see hook position').'</a>.',
			'input' => array(
			),
			'submit' => array(
				'title' => $this->l('   Save all  ')
			),
		);
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!is_array($values) || !count($values))
                continue;
            $this->fields_form_setting[2]['form']['input'][] = array(
					'type' => 'checkbox',
					'label' => $this->l($key),
					'name' => $key,
					'lang' => true,
					'values' => array(
						'query' => $values,
						'id' => 'id',
						'name' => 'name'
					)
				);
        }
    }
    
    protected function initFormSetting()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savesettingstfeaturedcategories';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper;
	}

	private function _displayForm()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Top category'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'select',
					'label' => $this->l('Category:'),
					'name' => 'id_category',
                    'required' => true,
					'options' => array(
						'query' => $category_arr,
						'id' => 'id',
						'name' => 'name'
					),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Status:'),
					'name' => 'active',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
				),
                /*array(
					'type' => 'text',
					'label' => $this->l('Position:'),
					'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                 
				),*/
                array(
					'type' => 'hidden',
					'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->l(' Save '),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->l('Save and stay'),
                'stay' => true
			),
		);
        
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $id_st_featured_category = (int)Tools::getValue('id_st_featured_category');
        if($id_st_featured_category)
            $category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
        else
            $category = new StFeaturedCategoriesClass();
        if(Validate::isLoadedObject($category))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_featured_category');
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestfeaturedcategory';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($category),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
    }

    private function getCategoryOption(&$category_arr, $id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop((int)$category->getShopID());
		$category_arr[] = array('id'=>(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
    
    protected function initList()
	{
		$this->fields_list = array(
			'name' => array(
				'title' => $this->l('Category name'),
				'class' => 'fixed-width-xxl',
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'position' => array(
				'title' => $this->l('Position'),
				'class' => 'fixed-width-xxl',
				'position' => 'position',
                'search' => false,
                'orderby' => false
			),
            'active' => array(
    			'title' => $this->l('Status'), 
                'class' => 'fixed-width-xxl',
                'active' => 'status',
    			'align' => 'center',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->l('ID Shop'), 
                'align' => 'center', 
                'class' => 'fixed-width-sm',
                'type' => 'int',
                'search' => false,
                'orderby' => false
            );

		$helper = new HelperList();
        $helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_featured_category';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->l('Add new')
		);
        $helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->l('Setting'),
		);
		$helper->title = $this->displayName;
		$helper->table = $this->name;
        $helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
        $helper->position_identifier = 'id_st_featured_category';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function deleteFeaturedCategories($id_category)
    {
        if ($id_category)
        {
            $cats = Db::getInstance('
            SELECT `id_st_featured_category` FROM '._DB_PREFIX_.'st_featured_category
            WHERE `id_category` = '.(int)$id_category.'
            ');
            foreach($cats AS $cat)
            {
                $obj = new StFeaturedCategoriesClass($cat['id_st_featured_category']);
                $obj->delete();
            }
        }
    }

	public function hookActionCategoryDelete($params)
	{
	    if(isset($params['category']))
	       $this->deleteFeaturedCategories($params['category']->id);
		$this->clearstfeaturedcategoryCache();
	}
    
    public function hookActionCategoryAdd($params)
	{
		$this->clearstfeaturedcategoryCache();
	}
    
	public function hookActionCategoryUpdate($params)
	{
		$this->clearstfeaturedcategoryCache();
	}
    
    public function hookDisplayHeader($params)
    {
        if (!$this->isCached('header.tpl', $this->stGetCacheId()))
        {
            $custom_css = '';
            
            $group_css = '';
            if ($bg_color = Configuration::get($this->_prefix_st.'BG_COLOR'))
                $group_css .= 'background-color:'.$bg_color.';';
            if ($bg_img = Configuration::get($this->_prefix_st.'BG_IMG'))
            {
                $this->fetchMediaServer($bg_img);
                $group_css .= 'background-image: url('.$bg_img.');';
            }
            elseif ($bg_pattern = Configuration::get($this->_prefix_st.'BG_PATTERN'))
            {
                $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$bg_pattern.'.png';
                $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                $group_css .= 'background-image: url('.$img.');';
            }
            if($group_css)
                $custom_css .= '.featured_categories_slider_container{background-attachment:fixed;'.$group_css.'}.featured_categories_slider_container .section .title_block, .featured_categories_slider_container .nav_top_right .flex-direction-nav,.featured_categories_slider_container .section .title_block a, .featured_categories_slider_container .section .title_block span{background:none;}';

            if ($top_padding = (int)Configuration::get($this->_prefix_st.'TOP_PADDING'))
                $custom_css .= '.featured_categories_slider_container{padding-top:'.$top_padding.'px;}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'BOTTOM_PADDING'))
                $custom_css .= '.featured_categories_slider_container{padding-bottom:'.$bottom_padding.'px;}';

            $top_margin = Configuration::get($this->_prefix_st.'TOP_MARGIN');
            if($top_margin || $top_margin!==null)
                $custom_css .= '.featured_categories_slider_container{margin-top:'.$top_margin.'px;}';
            $bottom_margin = Configuration::get($this->_prefix_st.'BOTTOM_MARGIN');
            if($bottom_margin || $bottom_margin!==null)
                $custom_css .= '.featured_categories_slider_container{margin-bottom:'.$bottom_margin.'px;}';

            if ($title_font_size = (int)Configuration::get($this->_prefix_st.'TITLE_FONT_SIZE'))
                 $custom_css .= '.featured_categories_slider_container .title_block{font-size:'.$title_font_size.'px;line-height:150%;}';

            if ($title_color = Configuration::get($this->_prefix_st.'TITLE_COLOR'))
                $custom_css .= '.featured_categories_slider_container.block .title_block a, .featured_categories_slider_container.block .title_block span{color:'.$title_color.';}';

            if ($text_color = Configuration::get($this->_prefix_st.'TEXT_COLOR'))
                $custom_css .= '.featured_categories_slider_container .s_title_block a{color:'.$text_color.';}';

            if ($link_hover_color = Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'))
                $custom_css .= '.featured_categories_slider_container .s_title_block a:hover{color:'.$link_hover_color.';}';

            if ($grid_hover_bg = Configuration::get($this->_prefix_st.'GRID_HOVER_BG'))
                $custom_css .= '.featured_categories_slider_container .products_slider .ajax_block_product:hover .pro_second_box{background-color:'.$grid_hover_bg.';}';

            if ($direction_color = Configuration::get($this->_prefix_st.'DIRECTION_COLOR'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'DIRECTION_BG'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div:hover, new-products_block_center_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div.disabled, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div.disabled,.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div.disabled:hover, .featured_categories_slider_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div.disabled:hover{background-color:'.$direction_disabled_bg.';}';
            else
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,.featured_categories_slider_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover{background-color:transplanted;}';

            if ($pag_nav_bg = Configuration::get($this->_prefix_st.'PAG_NAV_BG'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme .owl-controls .owl-page span{background-color:'.$pag_nav_bg.';}';
            if ($pag_nav_bg_hover = Configuration::get($this->_prefix_st.'PAG_NAV_BG_HOVER'))
                $custom_css .= '.featured_categories_slider_container .products_slider .owl-theme .owl-controls .owl-page.active span, .featured_categories_slider_container .products_slider .owl-theme .owl-controls .owl-page:hover span{background-color:'.$pag_nav_bg_hover.';}';
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->stGetCacheId());
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }

    public function hookDisplayTopColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }    
    public function hookDisplayBottomColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }    

    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;
        
        $this->smarty->assign('homeverybottom', true);
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayFullWidthTop2($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;
        
        $this->smarty->assign('homeverybottom', true);
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        $this->smarty->assign('homeverybottom', true);
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    
    public function hookDisplayHomeTertiaryLeft($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeTertiaryRight($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }

    private function _prepareHook($location= null)
    {
        if (!empty(self::$cache_featured_categories))
            $featured_categories = self::$cache_featured_categories;
        else
        {
            $featured_categories = StFeaturedCategoriesClass::getAll();
            self::$cache_featured_categories = $featured_categories;
        }
        
        // if(!$featured_categories)
        //     return false;
		$this->smarty->assign(array(
            'featured_categories'   => $featured_categories,
            'categorySize'          => Image::getSize(ImageType::getFormatedName('category')),
            'homeSize'            => Image::getSize(ImageType::getFormatedName('home')),
            'pro_per_fw'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_FW'),
            'pro_per_xl'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_XL'),
            'pro_per_lg'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_LG'),
            'pro_per_md'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_MD'),
            'pro_per_sm'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_SM'),
            'pro_per_xs'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_XS'),
            'pro_per_xxs'           => (int)Configuration::get('STSN_FEATURED_CATE_PER_XXS'),
            
            
            'slider_slideshow'      => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            'slider_s_speed'        => Configuration::get($this->_prefix_st.'S_SPEED'),
            'slider_a_speed'        => Configuration::get($this->_prefix_st.'A_SPEED'),
            'slider_pause_on_hover' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy_load'             => Configuration::get($this->_prefix_st.'LAZY'),
            'slider_move'           => Configuration::get($this->_prefix_st.'MOVE'),
            'hide_mob'              => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'aw_display'            => Configuration::get($this->_prefix_st.'AW_DISPLAY'),
            'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
        ));
        return true;
    }
    
	public function hookDisplayHome($params, $hook_hash = '')
	{
	    if (!$this->isCached('stfeaturedcategories.tpl', $this->stGetCacheId($hook_hash)))
    	    if(!$this->_prepareHook())
                return false;
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
        $this->smarty->assign(array(
            'hook_hash' => $hook_hash,

            'has_background_img'     => ((int)Configuration::get($this->_prefix_st.'BG_PATTERN') || Configuration::get($this->_prefix_st.'BG_IMG')) ? 1 : 0,
            'speed'          => (int)Configuration::get($this->_prefix_st.'SPEED'),
        ));
		return $this->display(__FILE__, 'stfeaturedcategories.tpl', $this->stGetCacheId($hook_hash));
	}
    
    private function clearstfeaturedcategoryCache()
    {
        $this->_clearCache('*');
    }
    
	public function hookDisplayHomeSecondaryRight($params)
	{
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__)); 
    }
    

	/**
	 * Return the list of fields value
	 *
	 * @param object $obj Object
	 * @return array
	 */
	public function getFieldsValueSt($obj,$fields_form="fields_form")
	{
		foreach ($this->$fields_form as $fieldset)
			if (isset($fieldset['form']['input']))
				foreach ($fieldset['form']['input'] as $input)
					if (!isset($this->fields_value[$input['name']]))
						if (isset($input['type']) && $input['type'] == 'shop')
						{
							if ($obj->id)
							{
								$result = Shop::getShopById((int)$obj->id, $this->identifier, $this->table);
								foreach ($result as $row)
									$this->fields_value['shop'][$row['id_'.$input['type']]][] = $row['id_shop'];
							}
						}
						elseif (isset($input['lang']) && $input['lang'])
							foreach (Language::getLanguages(false) as $language)
							{
								$fieldValue = $this->getFieldValueSt($obj, $input['name'], $language['id_lang']);
								if (empty($fieldValue))
								{
									if (isset($input['default_value']) && is_array($input['default_value']) && isset($input['default_value'][$language['id_lang']]))
										$fieldValue = $input['default_value'][$language['id_lang']];
									elseif (isset($input['default_value']))
										$fieldValue = $input['default_value'];
								}
								$this->fields_value[$input['name']][$language['id_lang']] = $fieldValue;
							}
						else
						{
							$fieldValue = $this->getFieldValueSt($obj, $input['name']);
							if ($fieldValue===false && isset($input['default_value']))
								$fieldValue = $input['default_value'];
							$this->fields_value[$input['name']] = $fieldValue;
						}

		return $this->fields_value;
	}
    
	/**
	 * Return field value if possible (both classical and multilingual fields)
	 *
	 * Case 1 : Return value if present in $_POST / $_GET
	 * Case 2 : Return object value
	 *
	 * @param object $obj Object
	 * @param string $key Field name
	 * @param integer $id_lang Language id (optional)
	 * @return string
	 */
	public function getFieldValueSt($obj, $key, $id_lang = null)
	{
		if ($id_lang)
			$default_value = ($obj->id && isset($obj->{$key}[$id_lang])) ? $obj->{$key}[$id_lang] : false;
		else
			$default_value = isset($obj->{$key}) ? $obj->{$key} : false;

		return Tools::getValue($key.($id_lang ? '_'.$id_lang : ''), $default_value);
	}
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'featured_cate_per_fw'  => Configuration::get('STSN_FEATURED_CATE_PER_FW'),
            'featured_cate_per_xl'  => Configuration::get('STSN_FEATURED_CATE_PER_XL'),
            'featured_cate_per_lg'  => Configuration::get('STSN_FEATURED_CATE_PER_LG'),
            'featured_cate_per_md'  => Configuration::get('STSN_FEATURED_CATE_PER_MD'),
            'featured_cate_per_sm'  => Configuration::get('STSN_FEATURED_CATE_PER_SM'),
            'featured_cate_per_xs'  => Configuration::get('STSN_FEATURED_CATE_PER_XS'),
            'featured_cate_per_xxs' => Configuration::get('STSN_FEATURED_CATE_PER_XXS'),
            
            'grid'                  => Configuration::get($this->_prefix_st.'GRID'),
            'slideshow'             => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            's_speed'               => Configuration::get($this->_prefix_st.'S_SPEED'),
            'a_speed'               => Configuration::get($this->_prefix_st.'A_SPEED'),
            'pause_on_hover'        => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy'                  => Configuration::get($this->_prefix_st.'LAZY'),
            'move'                  => Configuration::get($this->_prefix_st.'MOVE'),
            'hide_mob'              => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'aw_display'            => Configuration::get($this->_prefix_st.'AW_DISPLAY'),
            
            'title'                 => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),

            'top_padding'        => Configuration::get($this->_prefix_st.'TOP_PADDING'),
            'bottom_padding'     => Configuration::get($this->_prefix_st.'BOTTOM_PADDING'),
            'top_margin'         => Configuration::get($this->_prefix_st.'TOP_MARGIN'),
            'bottom_margin'      => Configuration::get($this->_prefix_st.'BOTTOM_MARGIN'),
            'bg_pattern'         => Configuration::get($this->_prefix_st.'BG_PATTERN'),
            'bg_img'             => Configuration::get($this->_prefix_st.'BG_IMG'),
            'bg_color'           => Configuration::get($this->_prefix_st.'BG_COLOR'),
            'speed'              => Configuration::get($this->_prefix_st.'SPEED'),

            'title_color'              => Configuration::get($this->_prefix_st.'TITLE_COLOR'),
            'text_color'               => Configuration::get($this->_prefix_st.'TEXT_COLOR'),
            'link_hover_color'         => Configuration::get($this->_prefix_st.'LINK_HOVER_COLOR'),
            'grid_hover_bg'            => Configuration::get($this->_prefix_st.'GRID_HOVER_BG'),
            'direction_color'          => Configuration::get($this->_prefix_st.'DIRECTION_COLOR'),
            'direction_color_hover'    => Configuration::get($this->_prefix_st.'DIRECTION_COLOR_HOVER'),
            'direction_color_disabled' => Configuration::get($this->_prefix_st.'DIRECTION_COLOR_DISABLED'),
            'direction_bg'             => Configuration::get($this->_prefix_st.'DIRECTION_BG'),
            'direction_hover_bg'       => Configuration::get($this->_prefix_st.'DIRECTION_HOVER_BG'),
            'direction_disabled_bg'    => Configuration::get($this->_prefix_st.'DIRECTION_DISABLED_BG'),
            'pag_nav_bg'               => Configuration::get($this->_prefix_st.'PAG_NAV_BG'),
            'pag_nav_bg_hover'         => Configuration::get($this->_prefix_st.'PAG_NAV_BG_HOVER'),
            'title_font_size'          => Configuration::get($this->_prefix_st.'TITLE_FONT_SIZE'),
        );
        
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $fields_values[$key.'_'.$value['id']] = 0;
                if($id_hook = Hook::getIdByName($value['id']))
                    if(Hook::getModulesFromHook($id_hook, $this->id))
                        $fields_values[$key.'_'.$value['id']] = 1;
            }
        }
        return $fields_values;
    }
    
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_featured_category');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StFeaturedCategoriesClass((int)$pos[2]))
							if (isset($position) && $object->updatePosition($way, $position))
								$msg = 'ok position '.(int)$position.' for ID '.(int)$pos[2]."\r\n";	
							else
								$msg = '{"hasError" : true, "errors" : "Can not update position"}';
						else
							$msg = '{"hasError" : true, "errors" : "This object ('.(int)$id.') can t be loaded"}';

						break;
					}
				}
                die($msg);
		}
	}
    
    public function getHookHash($func='')
    {
        if (!$func)
            return '';
        return substr(md5($func), 0, 10);
    }
    
    protected function stGetCacheId($key='',$name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key;
    }
}
