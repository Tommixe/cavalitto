<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:00:10
         compiled from "/home/micreon/public_html/cavalitto/themes/panda/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1433902681568a7aeadeb4b9-88950660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dfdf96f48e122b41144ffb1d3e6f1c56b81a4141' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/themes/panda/my-account.tpl',
      1 => 1449302559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1433902681568a7aeadeb4b9-88950660',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'account_created' => 0,
    'has_customer_an_address' => 0,
    'link' => 0,
    'returnAllowed' => 0,
    'voucherAllowed' => 0,
    'HOOK_CUSTOMER_ACCOUNT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7aeae455a4_85999272',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7aeae455a4_85999272')) {function content_568a7aeae455a4_85999272($_smarty_tpl) {?>

<?php $_smarty_tpl->_capture_stack[0][] = array('path', null, null); ob_start(); ?><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<h1 class="page-heading"><?php echo smartyTranslate(array('s'=>'My account'),$_smarty_tpl);?>
</h1>
<?php if (isset($_smarty_tpl->tpl_vars['account_created']->value)) {?>
	<p class="alert alert-success">
		<?php echo smartyTranslate(array('s'=>'Your account has been created.'),$_smarty_tpl);?>

	</p>
<?php }?>
<p class="info-account"><?php echo smartyTranslate(array('s'=>'Welcome to your account. Here you can manage all of your personal information and orders. '),$_smarty_tpl);?>
</p>
<div class="row addresses-lists">
	<div class="col-xs-12 col-sm-6 col-lg-4">
		<ul class="myaccount-link-list">
            <?php if ($_smarty_tpl->tpl_vars['has_customer_an_address']->value) {?>
            <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('address',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Add my first address'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-cog icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'Add my first address'),$_smarty_tpl);?>
</a></li>
            <?php }?>
            <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('history',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Orders'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-basket icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'Order history and details'),$_smarty_tpl);?>
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['returnAllowed']->value) {?>
                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-follow',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Merchandise returns'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-left icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'My merchandise returns'),$_smarty_tpl);?>
</a></li>
            <?php }?>
            <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('order-slip',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Credit slips'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-doc-text-inv icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'My credit slips'),$_smarty_tpl);?>
</a></li>
            <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('addresses',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Addresses'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-cog icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'My addresses'),$_smarty_tpl);?>
</a></li>
            <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('identity',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Information'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-vcard icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'My personal information'),$_smarty_tpl);?>
</a></li>
<?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value||isset($_smarty_tpl->tpl_vars['HOOK_CUSTOMER_ACCOUNT']->value)&&$_smarty_tpl->tpl_vars['HOOK_CUSTOMER_ACCOUNT']->value!='') {?>
            <?php if ($_smarty_tpl->tpl_vars['voucherAllowed']->value) {?>
                <li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('discount',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Vouchers'),$_smarty_tpl);?>
"><span class="icon_wrap"><i class="icon-star-1 icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'My vouchers'),$_smarty_tpl);?>
</a></li>
            <?php }?>
            <?php echo $_smarty_tpl->tpl_vars['HOOK_CUSTOMER_ACCOUNT']->value;?>

<?php }?>
        </ul>
    </div>
</div>
<?php }} ?>
