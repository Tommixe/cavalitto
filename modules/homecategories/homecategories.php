<?php

class Homecategories extends Module
{
	private $_html = '';
	private $_postErrors = array();

	function __construct()
	{
		$this->name = 'homecategories';
		$this->tab = 'front_office_features';
		$this->version = 1.3;
		$this->author = 'John Stocks';
		$this->need_instance = 0;



		parent::__construct(); // The parent construct is required for translations

		$this->page = basename(__FILE__, '.php');
		$this->displayName = $this->l('Homepage Categories for v1.5');
		$this->description = $this->l('Displays categories on your homepage');
	}

	function install()
	{
			return (parent::install() AND $this->registerHook('home') AND $this->registerHook('header'));
	}



  public function hookHeader()
	{
		Tools::addCSS(($this->_path).'homecategories.css', 'all');
	}

function hookHome($params)
{
  global $smarty, $cookie, $link;
 
  $id_customer = (int)$params['cookie']->id_customer;
  $id_group = $id_customer ? Customer::getDefaultGroupId($id_customer) : _PS_DEFAULT_CUSTOMER_GROUP_;
  $id_lang = (int)$params['cookie']->id_lang;
  $result = Db::getInstance(_PS_USE_SQL_SLAVE_)->ExecuteS('
  SELECT c.*, cl.*
  $category = new Category(1);
  $nb = intval(Configuration::get('HOME_categories_NBR'));
 
    global $link;
                 $this->context->smarty->assign(array(
                 'categories' => $result, Category::getRootCategories(intval($params['cookie']->id_lang), true),
                 'link' => $link));
                 
  $this->context->smarty->assign(array(
   'category' => $category,
   'lang' => Language::getIsoById(intval($params['cookie']->id_lang)),
  ));
  return $this->display(__FILE__, 'homecategories.tpl');
 }
}