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

class StBlogFeaturedArticles extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $_prefix_st = 'ST_B_';
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    protected static $access_rights = 0775;
    public static $per_nbr = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
    );
    public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc'),
        5 => array('id' =>5 , 'name' => 'Blog ID: Desc'),
        6 => array('id' =>6 , 'name' => 'Blog ID: Asc'),
        7 => array('id' =>7 , 'name' => 'Position: Desc'),
        8 => array('id' =>8 , 'name' => 'Position: Asc'),
    );
    private $_hooks = array();
	public function __construct()
	{
		$this->name          = 'stblogfeaturedarticles';
		$this->tab           = 'front_office_features';
		$this->version       = '1.2.9';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
        
        $this->initHookArray();
		
        $this->displayName = $this->l('Blog Module - Featured articles');
        $this->description = $this->l('Display featured articles on your store.');
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
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
        			'id' => 'displayHomeTop',
        			'val' => '1',
        			'name' => $this->l('displayHomeTop')
        		),
                array(
        			'id' => 'displayHome',
        			'val' => '1',
        			'name' => $this->l('displayHome')
        		),
        		array(
        			'id' => 'displayHomeSecondaryRight',
        			'val' => '1',
        			'name' => $this->l('displayHomeSecondaryRight')
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
        			'id' => 'displayHomeBottom',
        			'val' => '1',
        			'name' => $this->l('displayHomeBottom')
        		),
                array(
        			'id' => 'displayFullWidthBottom',
        			'val' => '1',
        			'name' => $this->l('displayFullWidthBottom')
        		),
                array(
        			'id' => 'displayStBlogHome',
        			'val' => '1',
        			'name' => $this->l('displayStBlogHome')
        		),
                array(
        			'id' => 'displayStBlogHomeTop',
        			'val' => '1',
        			'name' => $this->l('displayStBlogHomeTop')
        		),
                array(
        			'id' => 'displayStBlogHomeBottom',
        			'val' => '1',
        			'name' => $this->l('displayStBlogHomeBottom')
        		)
            ),
            'Column' => array(
                array(
        			'id' => 'displayLeftColumn',
        			'val' => '1',
        			'name' => $this->l('displayLeftColumn')
        		),
        		array(
        			'id' => 'displayRightColumn',
        			'val' => '1',
        			'name' => $this->l('displayRightColumn')
        		),
                array(
        			'id' => 'displayStBlogLeftColumn',
        			'val' => '1',
        			'name' => $this->l('displayStBlogLeftColumn')
        		),
        		array(
        			'id' => 'displayStBlogRightColumn',
        			'val' => '1',
        			'name' => $this->l('displayStBlogRightColumn')
        		)
            ),
            'Footer' => array(
        		array(
        			'id' => 'displayFooterPrimary',
        			'val' => '1',
        			'name' => $this->l('displayFooterPrimary')
        		),
                array(
        			'id' => 'displayFooter',
        			'val' => '1',
        			'name' => $this->l('displayFooter')
        		),
                array(
        			'id' => 'displayFooterTertiary',
        			'val' => '1',
        			'name' => $this->l('displayFooterTertiary')
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
		if (!parent::install() 
            || !$this->registerHook('displayHeader')
			|| !$this->registerHook('displayStBlogHome')
			|| !$this->registerHook('displayHomeBottom')
			|| !Configuration::updateValue('ST_B_COL_FEATURED_A_NBR', 4)
			|| !Configuration::updateValue('ST_B_FOOTER_FEATURED_A_NBR', 3)

            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_GRID', 0)
            || !Configuration::updateValue('ST_B_HOME_FEATURED_A_GRID', 0)

            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_NBR', 4)
            || !Configuration::updateValue('ST_B_HOME_FEATURED_A_NBR', 4)
            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_CAT_MOD', 1)
            || !Configuration::updateValue('ST_B_HOME_FEATURED_A_CAT_MOD', 1)
            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_SORTBY', 8)


            || !Configuration::updateValue('ST_B_FEATURED_A_SLIDESHOW',0)
            || !Configuration::updateValue('ST_B_FEATURED_A_S_SPEED',7000)
            || !Configuration::updateValue('ST_B_FEATURED_A_A_SPEED',400)
            || !Configuration::updateValue('ST_B_FEATURED_A_PAUSE_ON_HOVER',1)
            || !Configuration::updateValue('ST_B_FEATURED_A_REWIND_NAV',1)
            || !Configuration::updateValue('ST_B_FEATURED_A_LAZY',0)
            || !Configuration::updateValue('ST_B_FEATURED_A_MOVE',0)

            || !Configuration::updateValue('STSN_B_HOME_FEATURED_A_PRO_PER_XL', 5)
            || !Configuration::updateValue('STSN_B_HOME_FEATURED_A_PRO_PER_LG', 4)
            || !Configuration::updateValue('STSN_B_HOME_FEATURED_A_PRO_PER_MD', 4)
            || !Configuration::updateValue('STSN_B_HOME_FEATURED_A_PRO_PER_SM', 3)
            || !Configuration::updateValue('STSN_B_HOME_FEATURED_A_PRO_PER_XS', 2)
            || !Configuration::updateValue('STSN_B_HOME_FEATURED_A_PRO_PER_XXS', 1)

            || !Configuration::updateValue('STSN_B_BLOG_FEATURED_A_PRO_PER_XL', 4)
            || !Configuration::updateValue('STSN_B_BLOG_FEATURED_A_PRO_PER_LG', 3)
            || !Configuration::updateValue('STSN_B_BLOG_FEATURED_A_PRO_PER_MD', 3)
            || !Configuration::updateValue('STSN_B_BLOG_FEATURED_A_PRO_PER_SM', 2)
            || !Configuration::updateValue('STSN_B_BLOG_FEATURED_A_PRO_PER_XS', 2)
            || !Configuration::updateValue('STSN_B_BLOG_FEATURED_A_PRO_PER_XXS', 1)

            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_TITLE', 0)
            || !Configuration::updateValue('ST_B_HOME_FEATURED_A_TITLE', 0)
            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_DIRECTION_NAV', 1)
            || !Configuration::updateValue('ST_B_HOME_FEATURED_A_DIRECTION_NAV', 1)
            || !Configuration::updateValue('ST_B_BLOG_FEATURED_A_CONTROL_NAV', 0)
            || !Configuration::updateValue('ST_B_HOME_FEATURED_A_CONTROL_NAV', 0)
            //
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_TOP_PADDING', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_BOTTOM_PADDING', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_TOP_MARGIN', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_BOTTOM_MARGIN', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_BG_PATTERN', 0)
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_BG_IMG', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_BG_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_SPEED', 0)
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_TITLE_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_TEXT_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_LINK_HOVER_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR_HOVER', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR_DISABLED', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_DIRECTION_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_DIRECTION_HOVER_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_DIRECTION_DISABLED_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_PAG_NAV_BG', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_PAG_NAV_BG_HOVER', '')
            || !Configuration::updateValue($this->_prefix_st.'FEATURED_A_TITLE_FONT_SIZE', 0)
        )
			return false;
		return true;
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
	    if(!Module::isInstalled('stblog'))
            $this->_html .= $this->displayConfirmation($this->l('Please, install Blog module first.'));
	    if(!Module::isEnabled('stblog'))
            $this->_html .= $this->displayConfirmation($this->l('Please, enable Blog module first.'));
            
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
            if(Configuration::updateValue($this->_prefix_st.'FEATURED_A_BG_IMG', ''))
                $result['r'] = true;
            die(json_encode($result));
        }

	    $this->initFieldsForm();
		if (isset($_POST['savestblogfeaturedarticles']))
		{
            foreach($this->fields_form as $form)
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
                        
                        if($field['name']=='limit' && $value>20)
                             $value=20;
                        
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
                            Configuration::updateValue('ST_B_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_B_'.strtoupper($field['name']), $value);
                    }
                        
            $name = $this->fields_form[0]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form[0]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue('STSN_B_'.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

            $name = $this->fields_form[1]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form[1]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue('STSN_B_'.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));
                
            $this->saveHook();

            if(!count($this->validation_errors))
            {
                if (isset($_FILES['featured_a_bg_img']) && isset($_FILES['featured_a_bg_img']['tmp_name']) && !empty($_FILES['featured_a_bg_img']['tmp_name'])) 
                {
                    if ($vali = ImageManager::validateUpload($_FILES['featured_a_bg_img'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                       $this->validation_errors[] = Tools::displayError($vali);
                    else 
                    {
                        $bg_image = $this->uploadCheckAndGetName($_FILES['featured_a_bg_img']['name']);
                        if(!$bg_image)
                            $this->validation_errors[] = Tools::displayError('Image format not recognized');
                        $this->_checkEnv();
                        if (!move_uploaded_file($_FILES['featured_a_bg_img']['tmp_name'], _PS_UPLOAD_DIR_.$this->name.'/'.$bg_image))
                            $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                        else
                            Configuration::updateValue($this->_prefix_st.'FEATURED_A_BG_IMG', $this->name.'/'.$bg_image);
                    }
                }
            }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->clearSliderCache();
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
                
        }
        if ($bg_img = Configuration::get($this->_prefix_st.'FEATURED_A_BG_IMG'))
        {
            $this->fetchMediaServer($bg_img);
            $this->fields_form[1]['form']['input']['bg_img_field']['image'] = '<img width=200 src="'.($bg_img).'" /><p><a class="btn btn-default st_delete_image" href="javascript:;"><i class="icon-trash"></i> Delete</a></p>';
        }
		$helper = $this->initForm();
		return $this->_html.$helper->generateForm($this->fields_form);
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
    protected function initFieldsForm()
    {
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Blog homepage'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display:'),
                    'name' => 'blog_featured_a_grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'blog_grid_slider',
                            'value' => 0,
                            'label' => $this->l('Slider')),
                        array(
                            'id' => 'blog_grid_medium',
                            'value' => 1,
                            'label' => $this->l('Slider(Information on the right hand side)')),
                        array(
                            'id' => 'blog_grid_samll',
                            'value' => 2,
                            'label' => $this->l('Grid(Image on the left side)')),
                        array(
                            'id' => 'blog_grid_top',
                            'value' => 4,
                            'label' => $this->l('Grid(Image on the top)')),
                        array(
                            'id' => 'blog_grid_list',
                            'value' => 3,
                            'label' => $this->l('List view')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Blog homepage:'),
                    'name' => 'blog_featured_a_nbr',
                    'desc' => $this->l('Define the number of featured articles to be displayed in blog homepage.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Category from which to pick blogs to be displayed'),
                    'name' => 'blog_featured_a_cat_mod',
                    'class' => 'fixed-width-xs',
                    'desc' => $this->l('Choose the category ID of the blogs that you would like to display on blog homepage (default: 1 for "Home").'),
                    'validation' => 'isUnsignedInt',
                ),
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'blog_featured_a_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'blog_featured_a_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'blog_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'blog_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Sort by:'),
                    'name' => 'blog_featured_a_sortby',
                    'options' => array(
                        'query' => self::$sort_by,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ),

                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'blog_featured_a_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'blog_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'blog_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'blog_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'blog_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'blog_featured_a_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'blog_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'blog_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            )
        );
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Homepage'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display:'),
                    'name' => 'home_featured_a_grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_grid_slider',
                            'value' => 0,
                            'label' => $this->l('Slider')),
                        array(
                            'id' => 'home_grid_medium',
                            'value' => 1,
                            'label' => $this->l('Slider(Information on the right hand side)')),
                        array(
                            'id' => 'home_grid_samll',
                            'value' => 2,
                            'label' => $this->l('Grid')),
                        array(
                            'id' => 'home_grid_list',
                            'value' => 3,
                            'label' => $this->l('List view')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Store homepage'),
                    'name' => 'home_featured_a_nbr',
                    'desc' => $this->l('Define the number of featured articles to be displayed in store homepage.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Category from which to pick blogs to be displayed'),
                    'name' => 'home_featured_a_cat_mod',
                    'class' => 'fixed-width-xs',
                    'desc' => $this->l('Choose the category ID of the blogs that you would like to display on blog homepage (default: 1 for "Home").'),
                    'validation' => 'isUnsignedInt',
                ),
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'home_featured_a_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'home_featured_a_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'home_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Sort by:'),
                    'name' => 'home_featured_a_sortby',
                    'options' => array(
                        'query' => self::$sort_by,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'home_featured_a_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'home_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'home_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'home_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'home_featured_a_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'home_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'home_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Top padding:'),
                    'name' => 'featured_a_top_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Bottom padding:'),
                    'name' => 'featured_a_bottom_padding',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Top spacing:'),
                    'name' => 'featured_a_top_margin',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Bottom spacing:'),
                    'name' => 'featured_a_bottom_margin',
                    'validation' => 'isNullOrUnsignedId',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Leave it empty to use the default value.'),
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Background color:'),
                    'name' => 'featured_a_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Select a pattern number:'),
                    'name' => 'featured_a_bg_pattern',
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
                    'name' => 'featured_a_bg_img',
                    'desc' => '',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Parallax speed factor:'),
                    'name' => 'featured_a_speed',
                    'default_value' => 0,
                    'desc' => $this->l('Speed to move relative to vertical scroll. Example: 0.1 is one tenth the speed of scrolling, 2 is twice the speed of scrolling.'),
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Heading font size:'),
                    'name' => 'featured_a_title_font_size',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'validation' => 'isUnsignedInt',
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Heading color:'),
                    'name' => 'featured_a_title_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Text color:'),
                    'name' => 'featured_a_text_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Link hover color:'),
                    'name' => 'featured_a_link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next color:'),
                    'name' => 'featured_a_direction_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next hover color:'),
                    'name' => 'featured_a_direction_color_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next disabled color:'),
                    'name' => 'featured_a_direction_color_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next background:'),
                    'name' => 'featured_a_direction_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next hover background:'),
                    'name' => 'featured_a_direction_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Prev/next disabled background:'),
                    'name' => 'featured_a_direction_disabled_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Navigation color:'),
                    'name' => 'featured_a_pag_nav_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  
                 array(
                    'type' => 'color',
                    'label' => $this->l('Navigation active color:'),
                    'name' => 'featured_a_pag_nav_bg_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ), 
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            )
        );

        
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->l('Slider settings'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->l('Autoplay:'),
                    'name' => 'featured_a_slideshow',
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
                    'name' => 'featured_a_s_speed',
                    'default_value' => 7000,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Transition period:'),
                    'name' => 'featured_a_a_speed',
                    'default_value' => 400,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause On Hover:'),
                    'name' => 'featured_a_pause_on_hover',
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
                    'name' => 'featured_a_rewind_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'featured_a_rewind_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'featured_a_rewind_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Lazy load:'),
                    'name' => 'featured_a_lazy',
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
                    'name' => 'featured_a_move',
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
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            )
        );

        $this->fields_form[3]['form'] = array(
            'legend' => array(
                'title' => $this->l('Others'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Left/right column:'),
                    'name' => 'col_featured_a_nbr',
                    'desc' => $this->l('Define the number of featured articles to be displayed in left/right column.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Footer:'),
                    'name' => 'footer_featured_a_nbr',
                    'desc' => $this->l('Define the number of featured articles to be displayed in footer.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            )
        );
        
        $this->fields_form[4]['form'] = array(
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
            $this->fields_form[4]['form']['input'][] = array(
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
    protected function initForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestblogfeaturedarticles';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    public function hookDisplayHeader($params)
    {
        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;

        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css = '';
            
            $group_css = '';
            if ($bg_color = Configuration::get($this->_prefix_st.'FEATURED_A_BG_COLOR'))
                $group_css .= 'background-color:'.$bg_color.';';
            if ($bg_img = Configuration::get($this->_prefix_st.'FEATURED_A_BG_IMG'))
            {
                $this->fetchMediaServer($bg_img);
                $group_css .= 'background-image: url('.$bg_img.');';
            }
            elseif ($bg_pattern = Configuration::get($this->_prefix_st.'FEATURED_A_BG_PATTERN'))
            {
                $img = _MODULE_DIR_.'stthemeeditor/patterns/'.$bg_pattern.'.png';
                $img = $this->context->link->protocol_content.Tools::getMediaServer($img).$img;
                $group_css .= 'background-image: url('.$img.');';
            }
            if($group_css)
                $custom_css .= 'body#index .st_blog_featured_article_container{background-attachment:fixed;'.$group_css.'}body#index .st_blog_featured_article_container .section .title_block, body#index .st_blog_featured_article_container .nav_top_right .flex-direction-nav,body#index .st_blog_featured_article_container .section .title_block a, body#index .st_blog_featured_article_container .section .title_block span{background:none;}';

            if ($top_padding = (int)Configuration::get($this->_prefix_st.'FEATURED_A_TOP_PADDING'))
                $custom_css .= 'body#index .st_blog_featured_article_container{padding-top:'.$top_padding.'px;}';
            if ($bottom_padding = (int)Configuration::get($this->_prefix_st.'FEATURED_A_BOTTOM_PADDING'))
                $custom_css .= 'body#index .st_blog_featured_article_container{padding-bottom:'.$bottom_padding.'px;}';

            $top_margin = Configuration::get($this->_prefix_st.'FEATURED_A_TOP_MARGIN');
            if($top_margin || $top_margin!==null)
                $custom_css .= 'body#index .st_blog_featured_article_container{margin-top:'.$top_margin.'px;}';
            $bottom_margin = Configuration::get($this->_prefix_st.'FEATURED_A_BOTTOM_MARGIN');
            if($bottom_margin || $bottom_margin!==null)
                $custom_css .= 'body#index .st_blog_featured_article_container{margin-bottom:'.$bottom_margin.'px;}';

            if ($title_font_size = (int)Configuration::get($this->_prefix_st.'FEATURED_A_TITLE_FONT_SIZE'))
                 $custom_css .= 'body#index .st_blog_featured_article_container .title_block{font-size:'.$title_font_size.'px;line-height:150%;}';

            if ($title_color = Configuration::get($this->_prefix_st.'FEATURED_A_TITLE_COLOR'))
                $custom_css .= 'body#index .st_blog_featured_article_container.block .title_block a, body#index .st_blog_featured_article_container.block .title_block span{color:'.$title_color.';}';
            
            if ($text_color = Configuration::get($this->_prefix_st.'FEATURED_A_TEXT_COLOR'))
                $custom_css .= 'body#index .st_blog_featured_article_container .s_title_block a,
                body#index .st_blog_featured_article_container .blog_info,
                body#index .st_blog_featured_article_container .blok_blog_short_content a.go,
                body#index .st_blog_featured_article_container .blok_blog_short_content{color:'.$text_color.';}';

            if ($link_hover_color = Configuration::get($this->_prefix_st.'FEATURED_A_LINK_HOVER_COLOR'))
                $custom_css .= 'body#index .st_blog_featured_article_container .s_title_block a:hover,
                body#index .st_blog_featured_article_container .blok_blog_short_content a.go:hover{color:'.$link_hover_color.';}';

            if ($direction_color = Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{color:'.$direction_color.';}';
            if ($direction_color_hover = Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR_HOVER'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{color:'.$direction_color_hover.';}';
            if ($direction_color_disabled = Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR_DISABLED'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled:hover{color:'.$direction_color_disabled.';}';
            
            if ($direction_bg = Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_BG'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div{background-color:'.$direction_bg.';}';
            if ($direction_hover_bg = Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_HOVER_BG'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div:hover, new-products_block_center_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div:hover{background-color:'.$direction_hover_bg.';}';
            if ($direction_disabled_bg = Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_DISABLED_BG'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div.disabled, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div.disabled,body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-rectangle .owl-controls .owl-buttons div.disabled:hover, body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-lr.owl-navigation-circle .owl-controls .owl-buttons div.disabled:hover{background-color:'.$direction_disabled_bg.';}';
            else
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,body#index .st_blog_featured_article_container .products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover{background-color:transplanted;}';

            if ($pag_nav_bg = Configuration::get($this->_prefix_st.'FEATURED_A_PAG_NAV_BG'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme .owl-controls .owl-page span{background-color:'.$pag_nav_bg.';}';
            if ($pag_nav_bg_hover = Configuration::get($this->_prefix_st.'FEATURED_A_PAG_NAV_BG_HOVER'))
                $custom_css .= 'body#index .st_blog_featured_article_container .products_slider .owl-theme .owl-controls .owl-page.active span, body#index .st_blog_featured_article_container .products_slider .owl-theme .owl-controls .owl-page:hover span{background-color:'.$pag_nav_bg_hover.';}';
            
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    
    private function _prepareHook($ext='')
    {
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php');
        
        $ext = $ext ? strtoupper($ext) : '';
        $nbr = Configuration::get('ST_B_'.$ext.'_FEATURED_A_NBR');
        
        if(!$nbr)
            $nbr = 4;
            
        $order_by = 'id_st_blog';
        $order_way = 'DESC';
        $soby = (int)Configuration::get('ST_B_'.(($ext=='HOME') ? 'HOME' : 'BLOG').'_FEATURED_A_SORTBY');
        switch($soby)
        {
            case 1:
                $order_by = 'date_add';
                $order_way = 'DESC';
            break;
            case 2:
                $order_by = 'date_add';
                $order_way = 'ASC';
            break;
            case 3:
                $order_by = 'date_upd';
                $order_way = 'DESC';
            break;
            case 4:
                $order_by = 'date_upd';
                $order_way = 'ASC';
            break;
            case 5:
                $order_by = 'id_st_blog';
                $order_way = 'DESC';
            break;
            case 6:
                $order_by = 'id_st_blog';
                $order_way = 'ASC';
            break;
            case 7:
                $order_by = 'position';
                $order_way = 'DESC';
            break;
            case 8:
                $order_by = 'position';
                $order_way = 'ASC';
            break;
        }
        
        $featured_category_id = (int)Configuration::get('ST_B_'.$ext.'_FEATURED_A_CAT_MOD');
        if (!$featured_category_id)
        {
            $featured_category_id = (int)Configuration::get('ST_B_BLOG_FEATURED_A_CAT_MOD');
        }
        if (!$featured_category_id)
        {
            $root_category = StBlogCategory::getShopCategoryRoot((int)$this->context->language->id);
            if(!is_array($root_category) || !isset($root_category['id_st_blog_category']))
                return false;
            $featured_category_id =  $root_category['id_st_blog_category'];
        }
        $category = new StBlogCategory($featured_category_id, (int)$this->context->language->id);
		$blogs = $category->getBlogs((int)$this->context->language->id, 1, $nbr, $order_by, $order_way);
        /*
        if(!$blogs)
            return false;
        */    
		$this->smarty->assign(array(
            'blogs'                 => $blogs,
            'imageSize'             => StBlogImageClass::$imageTypeDef,
            'display_viewcount'     => Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'),
            
            'slider_slideshow'      => Configuration::get('ST_B_FEATURED_A_SLIDESHOW'),
            'slider_s_speed'        => Configuration::get('ST_B_FEATURED_A_S_SPEED'),
            'slider_a_speed'        => Configuration::get('ST_B_FEATURED_A_A_SPEED'),
            'slider_pause_on_hover' => Configuration::get('ST_B_FEATURED_A_PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get('ST_B_FEATURED_A_REWIND_NAV'),
            'lazy_load'             => Configuration::get('ST_B_FEATURED_A_LAZY'),
            'slider_move'           => Configuration::get('ST_B_FEATURED_A_MOVE'),
        ));
        return true;
    }
    
	public function hookDisplayLeftColumn($params, $hook_hash='')
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
        if (!$this->isCached('stblogfeaturedarticles-column.tpl', $this->stGetCacheId($hook_hash)))
	    {         
            if(!$this->_prepareHook('col'))    
                return false;
            
            $this->smarty->assign(array(
                'hook_hash' => $hook_hash,
            ));
        } 
            
		return $this->display(__FILE__, 'stblogfeaturedarticles-column.tpl', $this->stGetCacheId($hook_hash));
	}
	public function hookDisplayRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__)); 
	}
	public function hookDisplayStBlogRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__)); 
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__)); 
	}
    public function hookDisplayStBlogHome($params, $hook_hash='')
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
        if (!$this->isCached('stblogfeaturedarticles-home.tpl', $this->stGetCacheId($hook_hash)))
	    {   
            if(!$this->_prepareHook('blog'))    
                return false; 
            
             $this->smarty->assign(array(
                'hook_hash'             => $hook_hash,
                'display_as_grid'       => Configuration::get('ST_B_BLOG_FEATURED_A_GRID'),
                'title_position'        => Configuration::get('ST_B_BLOG_FEATURED_A_TITLE'),
                'direction_nav'         => Configuration::get('ST_B_BLOG_FEATURED_A_DIRECTION_NAV'),
                'control_nav'           => Configuration::get('ST_B_BLOG_FEATURED_A_CONTROL_NAV'),
    
                'pro_per_xl'            => (int)Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_XL'),
                'pro_per_lg'            => (int)Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_LG'),
                'pro_per_md'            => (int)Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_MD'),
                'pro_per_sm'            => (int)Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_SM'),
                'pro_per_xs'            => (int)Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_XS'),
                'pro_per_xxs'           => (int)Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_XXS'),
            ));
        }
            
        return $this->display(__FILE__, 'stblogfeaturedarticles-home.tpl', $this->stGetCacheId($hook_hash)); 
    }
    public function hookDisplayStBlogHomeTop($params)
    {
        return $this->hookDisplayStBlogHome($params, $this->getHookHash(__FUNCTION__)); 
    }
    public function hookDisplayStBlogHomeBottom($params)
    {
        return $this->hookDisplayStBlogHome($params, $this->getHookHash(__FUNCTION__)); 
    }
    public function hookDisplayHome($params,  $hook_hash = '', $flag=0)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
        
        if (!$this->isCached('stblogfeaturedarticles-home.tpl', $this->stGetCacheId($hook_hash)))
	    {      
            if(!$this->_prepareHook('home'))    
                return false; 
    
            $this->smarty->assign(array(
                'homeverybottom'        => ($flag==2 ? true : false),
                'hook_hash'             => $hook_hash,
    
                'display_as_grid'       => Configuration::get('ST_B_HOME_FEATURED_A_GRID'),
                'title_position'        => Configuration::get('ST_B_HOME_FEATURED_A_TITLE'),
                'direction_nav'         => Configuration::get('ST_B_HOME_FEATURED_A_DIRECTION_NAV'),
                'control_nav'           => Configuration::get('ST_B_HOME_FEATURED_A_CONTROL_NAV'),
    
                'pro_per_xl'            => (int)Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_XL'),
                'pro_per_lg'            => (int)Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_LG'),
                'pro_per_md'            => (int)Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_MD'),
                'pro_per_sm'            => (int)Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_SM'),
                'pro_per_xs'            => (int)Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_XS'),
                'pro_per_xxs'           => (int)Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_XXS'),

                'has_background_img'     => ((int)Configuration::get($this->_prefix_st.'FEATURED_A_BG_PATTERN') || Configuration::get($this->_prefix_st.'FEATURED_A_BG_IMG')) ? 1 : 0,
                'speed'          => (int)Configuration::get($this->_prefix_st.'FEATURED_A_SPEED'),
            ));
        }
          
        return $this->display(__FILE__, 'stblogfeaturedarticles-home.tpl', $this->stGetCacheId($hook_hash)); 
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__)); 
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__)); 
    }
    
    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__), 2);
    }
    
    public function hookDisplayFullWidthTop2($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__), 2);
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__), 2);
    }

    public function hookDisplayFooter($params, $hook_hash = '')
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);     
        
        if (!$this->isCached('stblogfeaturedarticles-footer.tpl', $this->stGetCacheId($hook_hash)))
	    {     
            if(!$this->_prepareHook('footer'))    
                return false;
            
            $this->smarty->assign(array(
                    'hook_hash' => $hook_hash
        		)); 
        }
            
		return $this->display(__FILE__, 'stblogfeaturedarticles-footer.tpl', $this->stGetCacheId($hook_hash));
    }
    public function hookDisplayFooterPrimary($params)
    {
        return $this->hookDisplayFooter($params, $this->getHookHash(__FUNCTION__));         
    }
    public function hookDisplayFooterTertiary($params)
    {
        return $this->hookDisplayFooter($params, $this->getHookHash(__FUNCTION__));         
    }
    private function getConfigFieldsValues()
    {
        $fields_values = array(

            'col_featured_a_nbr'    => Configuration::get('ST_B_COL_FEATURED_A_NBR'),
            'footer_featured_a_nbr' => Configuration::get('ST_B_FOOTER_FEATURED_A_NBR'),
            
            'blog_featured_a_grid'       => Configuration::get('ST_B_BLOG_FEATURED_A_GRID'),
            'home_featured_a_grid'       => Configuration::get('ST_B_HOME_FEATURED_A_GRID'),


            'blog_featured_a_nbr'       => Configuration::get('ST_B_BLOG_FEATURED_A_NBR'),
            'home_featured_a_nbr'       => Configuration::get('ST_B_HOME_FEATURED_A_NBR'),
            'blog_featured_a_cat_mod'   => Configuration::get('ST_B_BLOG_FEATURED_A_CAT_MOD'),
            'home_featured_a_cat_mod'   => Configuration::get('ST_B_HOME_FEATURED_A_CAT_MOD'),
            'blog_featured_a_sortby'    => Configuration::get('ST_B_BLOG_FEATURED_A_SORTBY'),
            'home_featured_a_sortby'    => Configuration::get('ST_B_HOME_FEATURED_A_SORTBY'),
            
            'featured_a_slideshow'      => Configuration::get('ST_B_FEATURED_A_SLIDESHOW'),
            'featured_a_s_speed'        => Configuration::get('ST_B_FEATURED_A_S_SPEED'),
            'featured_a_a_speed'        => Configuration::get('ST_B_FEATURED_A_A_SPEED'),
            'featured_a_pause_on_hover' => Configuration::get('ST_B_FEATURED_A_PAUSE_ON_HOVER'),
            'featured_a_rewind_nav'     => Configuration::get('ST_B_FEATURED_A_REWIND_NAV'),
            'featured_a_lazy'           => Configuration::get('ST_B_FEATURED_A_LAZY'),
            'featured_a_move'           => Configuration::get('ST_B_FEATURED_A_MOVE'),
            
            'blog_featured_a_pro_per_xl'     => Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_XL'),
            'blog_featured_a_pro_per_lg'     => Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_LG'),
            'blog_featured_a_pro_per_md'     => Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_MD'),
            'blog_featured_a_pro_per_sm'     => Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_SM'),
            'blog_featured_a_pro_per_xs'     => Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_XS'),
            'blog_featured_a_pro_per_xxs'    => Configuration::get('STSN_B_BLOG_FEATURED_A_PRO_PER_XXS'),

            'home_featured_a_pro_per_xl'     => Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_XL'),
            'home_featured_a_pro_per_lg'     => Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_LG'),
            'home_featured_a_pro_per_md'     => Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_MD'),
            'home_featured_a_pro_per_sm'     => Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_SM'),
            'home_featured_a_pro_per_xs'     => Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_XS'),
            'home_featured_a_pro_per_xxs'    => Configuration::get('STSN_B_HOME_FEATURED_A_PRO_PER_XXS'),

            'blog_featured_a_title'          => Configuration::get('ST_B_BLOG_FEATURED_A_TITLE'),
            'blog_featured_a_direction_nav'  => Configuration::get('ST_B_BLOG_FEATURED_A_DIRECTION_NAV'),
            'blog_featured_a_control_nav'    => Configuration::get('ST_B_BLOG_FEATURED_A_CONTROL_NAV'),

            'home_featured_a_title'          => Configuration::get('ST_B_HOME_FEATURED_A_TITLE'),
            'home_featured_a_direction_nav'  => Configuration::get('ST_B_HOME_FEATURED_A_DIRECTION_NAV'),
            'home_featured_a_control_nav'    => Configuration::get('ST_B_HOME_FEATURED_A_CONTROL_NAV'),

            'featured_a_top_padding'        => Configuration::get($this->_prefix_st.'FEATURED_A_TOP_PADDING'),
            'featured_a_bottom_padding'     => Configuration::get($this->_prefix_st.'FEATURED_A_BOTTOM_PADDING'),
            'featured_a_top_margin'         => Configuration::get($this->_prefix_st.'FEATURED_A_TOP_MARGIN'),
            'featured_a_bottom_margin'      => Configuration::get($this->_prefix_st.'FEATURED_A_BOTTOM_MARGIN'),
            'featured_a_bg_pattern'         => Configuration::get($this->_prefix_st.'FEATURED_A_BG_PATTERN'),
            'featured_a_bg_img'             => Configuration::get($this->_prefix_st.'FEATURED_A_BG_IMG'),
            'featured_a_bg_color'           => Configuration::get($this->_prefix_st.'FEATURED_A_BG_COLOR'),
            'featured_a_speed'              => Configuration::get($this->_prefix_st.'FEATURED_A_SPEED'),

            'featured_a_title_color'              => Configuration::get($this->_prefix_st.'FEATURED_A_TITLE_COLOR'),
            'featured_a_text_color'               => Configuration::get($this->_prefix_st.'FEATURED_A_TEXT_COLOR'),
            'featured_a_link_hover_color'         => Configuration::get($this->_prefix_st.'FEATURED_A_LINK_HOVER_COLOR'),
            'featured_a_direction_color'          => Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR'),
            'featured_a_direction_color_hover'    => Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR_HOVER'),
            'featured_a_direction_color_disabled' => Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_COLOR_DISABLED'),
            'featured_a_direction_bg'             => Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_BG'),
            'featured_a_direction_hover_bg'       => Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_HOVER_BG'),
            'featured_a_direction_disabled_bg'    => Configuration::get($this->_prefix_st.'FEATURED_A_DIRECTION_DISABLED_BG'),
            'featured_a_pag_nav_bg'               => Configuration::get($this->_prefix_st.'FEATURED_A_PAG_NAV_BG'),
            'featured_a_pag_nav_bg_hover'         => Configuration::get($this->_prefix_st.'FEATURED_A_PAG_NAV_BG_HOVER'),
            'featured_a_title_font_size'          => Configuration::get($this->_prefix_st.'FEATURED_A_TITLE_FONT_SIZE'),
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


    public function hookDisplayHomeSecondaryRight($params)
    {
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
    
    public function getHookHash($func='')
    {
        if (!$func)
            return '';
        return substr(md5($func), 0, 10);
    }
    
    protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
    
    private function clearSliderCache()
	{
		$this->_clearCache('*');
    }
}