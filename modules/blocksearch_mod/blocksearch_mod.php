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

class BlockSearch_mod extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $_hooks = array();

	public function __construct()
	{
		$this->name = 'blocksearch_mod';
		$this->tab = 'search_filter';
		$this->version = '1.5.9';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap     = true;

		parent::__construct();
        
        $this->initHookArray();

		$this->displayName = $this->l('Quick search block mod');
		$this->description = $this->l('Adds a quick search field to your website.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);

        $this->_align =  array(
                array(
                    'id' => 'quick_search_simple_0',
                    'value' => 0,
                    'label' => '<img src="'.$this->_path.'views/img/a_0.jpg" />'),
                array(
                    'id' => 'quick_search_simple_1',
                    'value' => 1,
                    'label' => '<img src="'.$this->_path.'views/img/a_1.gif" />'),
                array(
                    'id' => 'quick_search_simple_2',
                    'value' => 2,
                    'label' => '<img src="'.$this->_path.'views/img/a_2.gif" />'),
                array(
                    'id' => 'quick_search_simple_3',
                    'value' => 3,
                    'label' => '<img src="'.$this->_path.'views/img/a_3.gif" />'),
            );
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
        			'id' => 'displayNavLeft',
        			'val' => '1',
        			'name' => $this->l('Topbar left'),
        		),
        		array(
        			'id' => 'displayNav',
        			'val' => '1',
        			'name' => $this->l('Topbar right'),
        		),
                array(
                    'id' => 'displayHeaderLeft',
                    'val' => '1',
                    'name' => $this->l('Header left'),
                ),
                array(
                    'id' => 'displayHeaderTopLeft',
                    'val' => '1',
                    'name' => $this->l('Header top left'),
                ),
        		array(
        			'id' => 'displayTop',
        			'val' => '1',
        			'name' => $this->l('Header top'),
        		),
                array(
        			'id' => 'displayHeaderBottom',
        			'val' => '1',
        			'name' => $this->l('Header bottom'),
        		),
        		array(
        			'id' => 'displayMainMenu',
        			'val' => '1',
        			'name' => $this->l('Main menu'),
        		),
        		array(
        			'id' => 'displayRightBar',
        			'val' => '1',
        			'name' => $this->l('Right bar'),
                    'ref' => 'displaySideBarRight',
        		),
                array(
                    'id' => 'displayMobileBar',
                    'val' => '1',
                    'name' => $this->l('Mobile Bar'),
                    'ref' => 'displaySideBarRight',
                ),
                array(
                    'id' => 'displayMobileBarLeft',
                    'val' => '1',
                    'name' => $this->l('Mobile Bar left'),
                    'ref' => 'displaySideBarRight',
                ),
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
                $val = (int)Tools::getValue($key.'_'.$value['id']);
                $this->_processHook($key, $value['id'], $val);
                if (isset($value['ref']) && $value['ref'])
                    $this->_processHook($key, $value['ref'], $val);
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }
    
    private function _processHook($key='', $hook='', $value=1)
    {
        if (!$key || !$hook)
            return false;
        $rs = true;
        $id_hook = Hook::getIdByName($hook);
        if ($value)
        {
            if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                return $rs;
            if (!$this->isHookableOn($hook))
                $this->validation_errors[] = $this->l('This module cannot be transplanted to '.$hook.'.');
            else
                $rs = $this->registerHook($hook, Shop::getContextListShopID());
        }
        else
        {
            if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
            {
                $rs = $this->unregisterHook($id_hook, Shop::getContextListShopID());
                $rs &= $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
            } 
        }
        return $rs;
    }

	public function install()
	{
		if (!parent::install() 
			|| !$this->registerHook('displayHeaderTopLeft') 
			|| !$this->registerHook('displayheader') 
			|| !$this->registerHook('displayMobileTopSiteMap')
            || !$this->registerHook('displaySideBarRight')
			|| !$this->registerHook('displayMobileMenu')
			|| !Configuration::updateValue('ST_QUICK_SEARCH_SIMPLE', 0))
				return false;
		return true;
	}


    public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['saveblocksearch_mod']))
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
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                    }

            Configuration::updateValue('ST_QUICK_SEARCH_SIMPLE', (int)(Tools::getValue('quick_search_simple')));

            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->saveHook();
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
            $this->_clearCache('*');
            $this->initFieldsForm();
        }
        
		$helper = $this->initForm();
		return $this->_html.$helper->generateForm($this->fields_form);
	}

    protected function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
            'input' => array(
                array(
                    'type' => 'html',
                    'id'   => 'quick_search_simple',
                    'label' => $this->l('Style:'),
                    'name' => $this->BuildRadioUI($this->_align, 'quick_search_simple', (int)Configuration::get('ST_QUICK_SEARCH_SIMPLE')),
                    'desc' => array(
                            $this->l('Style 1 and 2 can not work on the top bar'),
                            $this->l('Style 3 and 4 can not work on the menu'),
                        ),
                ),
			),
			'submit' => array(
				'title' => $this->l('   Save   ')
			)
		);
        
        $this->fields_form[1]['form'] = array(
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
            $this->fields_form[1]['form']['input'][] = array(
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
    public function BuildRadioUI($array, $name, $checked_value = 0)
    {
        $html = '';
        foreach($array AS $key => $value)
        {
            $html .= '<label><input type="radio"'.($checked_value==$value['value'] ? ' checked="checked"' : '').' value="'.$value['value'].'" id="'.(isset($value['id']) ? $value['id'] : $name.'_'.$value['value']).'" name="'.$name.'">'.(isset($value['label'])?$value['label']:'').'</label>';
            if (($key+1) % 8 == 0)
                $html .= '<br />';
        }
        return $html;
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
		$helper->submit_action = 'saveblocksearch_mod';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}

    private function getConfigFieldsValues()
    {        
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
	
	public function hookdisplayMobileTopSiteMap($params)
	{
		$this->smarty->assign(array('hook_mobile' => true, 'instantsearch' => false));
		$params['hook_mobile'] = true;
		return $this->hookDisplayTop($params);
	}
	
	/*
public function hookDisplayMobileHeader($params)
	{
		if (Configuration::get('PS_SEARCH_AJAX'))
			$this->context->controller->addJqueryPlugin('autocomplete');
		$this->context->controller->addCSS(_THEME_CSS_DIR_.'product_list.css');
	}
*/
	
	public function hookHeader($params)
	{
		$this->context->controller->addCSS($this->_path.'views/css/blocksearch.css');
		if (Configuration::get('PS_SEARCH_AJAX'))
			$this->context->controller->addJqueryPlugin('autocomplete');
		if (Configuration::get('PS_INSTANT_SEARCH'))
			$this->context->controller->addCSS(_THEME_CSS_DIR_.'product_list.css');
		if (Configuration::get('PS_SEARCH_AJAX') || Configuration::get('PS_INSTANT_SEARCH'))
		{
			Media::addJsDef(array('search_url' => $this->context->link->getPageLink('search', Tools::usingSecureMode())));
			$this->context->controller->addJS($this->_path.'views/js/blocksearch.js');
		}
	}

	public function hookLeftColumn($params)
	{
		return $this->hookRightColumn($params);
	}

	public function hookRightColumn($params)
	{
		if (Tools::getValue('search_query') || !$this->isCached('blocksearch.tpl', $this->stGetCacheId()))
		{
			$this->calculHookCommon($params);
			$this->smarty->assign(array(
				'blocksearch_type' => 'block',
				'search_query' => (string)Tools::getValue('search_query')
				)
			);
		}
		Media::addJsDef(array('blocksearch_type' => 'block'));
		return $this->display(__FILE__, 'blocksearch.tpl', Tools::getValue('search_query') ? null : $this->stGetCacheId());
	}
    
    public function hookDisplaySearch($params)
    {
        return $this->hookRightColumn($params);
    }

	public function hookDisplayTop($params)
	{
		$key = $this->stGetCacheId('blocksearch-top'.((!isset($params['hook_mobile']) || !$params['hook_mobile']) ? '' : '-hook_mobile'));
		if (Tools::getValue('search_query') || !$this->isCached('blocksearch-top.tpl', $key))
		{
			$this->calculHookCommon($params);
			$this->smarty->assign(array(
				'blocksearch_type' => 'top',
				'search_query' => (string)Tools::getValue('search_query'),
				'quick_search_simple' => Configuration::get('ST_QUICK_SEARCH_SIMPLE'),
				)
			);
		}
		Media::addJsDef(array('blocksearch_type' => 'top'));
		return $this->display(__FILE__, 'blocksearch-top.tpl', Tools::getValue('search_query') ? null : $key);
	}
	
	public function hookDisplayHeaderTopLeft($params)
	{
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayHeaderLeft($params)
	{
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayMainMenu($params)
	{
		$this->smarty->assign('search_main_menu', true);
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayHeaderBottom($params)
	{
		return $this->hookDisplayTop($params);
	}

	public function hookDisplayNav($params)
	{
        $this->smarty->assign('search_top_bar', true);
        return $this->hookDisplayTop($params);
	}

	public function hookDisplayNavLeft($params)
	{
		return $this->hookDisplayNav($params);
	}
    public function hookDisplayMobileBar($params)
    {
        return $this->display(__FILE__, 'blocksearch-mobilebar.tpl');
    }
    /*public function hookDisplayMobileBarRight($params){
    	return $this->hookDisplayMobileBar($params);
    }*/
    public function hookDisplayMobileBarLeft($params){
    	return $this->hookDisplayMobileBar($params);
    }

	public function hookDisplayRightBar($params)
    {
        return $this->display(__FILE__, 'blocksearch-bar.tpl');
    }
    
    public function hookDisplaySideBarRight($params)
    {
		$this->calculHookCommon($params);
		$this->smarty->assign(array(
			'search_query' => (string)Tools::getValue('search_query'),
			'quick_search_simple' => Configuration::get('ST_QUICK_SEARCH_SIMPLE'),
			)
		);
        return $this->display(__FILE__, 'blocksearch-side.tpl');
    }
    public function hookDisplayMobileMenu($params)
    {
        $this->smarty->assign(array(
            'search_query' => (string)Tools::getValue('search_query'),
            )
        );
        return $this->display(__FILE__, 'blocksearch-mobile.tpl');
    }
	private function calculHookCommon($params)
	{
		$this->smarty->assign(array(
			'ENT_QUOTES' =>		ENT_QUOTES,
			'search_ssl' =>		Tools::usingSecureMode(),
			'ajaxsearch' =>		Configuration::get('PS_SEARCH_AJAX'),
			'instantsearch' =>	Configuration::get('PS_INSTANT_SEARCH'),
			'self' =>			dirname(__FILE__),
		));

		return true;
	}
    
    protected function stGetCacheId($key='')
	{
		$cache_id = parent::getCacheId();
		return $cache_id.'_'.$key;
	}
}

