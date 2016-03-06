<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:59
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blockuserinfo_mod\views\templates\hook\nav-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:709856d9d67f489c87-99590930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e49d9da5d19b2de41a82b5ade1917a89699c45b0' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blockuserinfo_mod\\views\\templates\\hook\\nav-mobile.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '709856d9d67f489c87-99590930',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_logged' => 0,
    'sttheme' => 0,
    'link' => 0,
    'show_user_info_icons' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d67f83d6b1_34129065',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d67f83d6b1_34129065')) {function content_56d9d67f83d6b1_34129065($_smarty_tpl) {?><!-- Block user information module NAV  -->
<ul id="userinfo_mod_mobile_menu" class="mo_mu_level_0 mobile_menu_ul">
<?php if ($_smarty_tpl->tpl_vars['is_logged']->value) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'])&&trim($_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'])) {?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_link'];?>
<?php } else { ?>javascript:;<?php }?>" rel="nofollow" class="mo_ma_level_0 <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?> ma_span<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'];?>

        </a>
    </li>
    <?php }?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" class="mo_ma_level_0" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
            <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>

        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" class="mo_ma_level_0" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
            <?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>

        </a>
    </li>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,'mylogout'), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" class="mo_ma_level_0" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
            <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-logout icon-large"></i><?php }?><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>

        </a>
    </li>
<?php } else { ?>
	<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['welcome'])&&trim($_smarty_tpl->tpl_vars['sttheme']->value['welcome'])) {?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_link'];?>
<?php } else { ?>javascript:;<?php }?>" rel="nofollow" class="mo_ma_level_0 <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?> ma_span<?php }?>" title="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome'];?>
">
            <?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome'];?>

        </a>
    </li>
    <?php }?>
    <li class="mo_ml_level_0 mo_ml_column">
        <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" rel="nofollow" class="mo_ma_level_0">
            <?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo smartyTranslate(array('s'=>'Login','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>

        </a>
    </li>
<?php }?>
</ul>
<!-- /Block usmodule NAV -->
<?php }} ?>
