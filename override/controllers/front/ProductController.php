<?php
class ProductController extends ProductControllerCore
{
    /*
    * module: stoverride
    * date: 2015-12-05 09:03:17
    * version: 1.2.0
    */
    public function initContent()
    {
        parent::initContent();
        $this->context->smarty->assign(array(   
            'HOOK_PRODUCT_SECONDARY_COLUMN' => Hook::exec('displayProductSecondaryColumn'),     
        ));
    }
}
