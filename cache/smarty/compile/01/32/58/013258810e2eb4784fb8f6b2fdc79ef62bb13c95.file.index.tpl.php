<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:23
         compiled from "/home/micreon/public_html/cavalitto/themes/panda/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:449524615568a7a07da6109-55391976%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '013258810e2eb4784fb8f6b2fdc79ef62bb13c95' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/themes/panda/index.tpl',
      1 => 1449302559,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '449524615568a7a07da6109-55391976',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HOOK_HOME_TOP' => 0,
    'HOOK_HOME_TAB_CONTENT' => 0,
    'HOOK_HOME_TAB' => 0,
    'HOOK_HOME' => 0,
    'HOOK_HOME_TERTIARY_LEFT' => 0,
    'HOOK_HOME_TERTIARY_RIGHT' => 0,
    'HOOK_HOME_FIRST_QUARTER' => 0,
    'HOOK_HOME_SECOND_QUARTER' => 0,
    'HOOK_HOME_THIRD_QUARTER' => 0,
    'HOOK_HOME_FOURTH_QUARTER' => 0,
    'HOOK_HOME_SECONDARY_LEFT' => 0,
    'HOOK_HOME_SECONDARY_RIGHT' => 0,
    'HOOK_HOME_BOTTOM' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a07e15fe5_07181820',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a07e15fe5_07181820')) {function content_568a7a07e15fe5_07181820($_smarty_tpl) {?>
<!-- Home top -->
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TOP']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TOP']->value)) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TOP']->value;?>
<?php }?>
<!-- / Home top -->
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value)) {?>
    <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value)) {?>
        <h3 id="home-page-tabs" class="title_block clearfix ">
            <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB']->value;?>

        </h3>
    <?php }?>
    <div class="tab-content"><?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TAB_CONTENT']->value;?>
</div>
<?php }?>
<!-- Home -->
<?php if (trim($_smarty_tpl->tpl_vars['HOOK_HOME']->value)) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_HOME']->value;?>
<?php }?>
<!-- / Home -->
<!-- Home tertiaray -->
<?php if ((isset($_smarty_tpl->tpl_vars['HOOK_HOME_TERTIARY_LEFT']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_TERTIARY_LEFT']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_TERTIARY_RIGHT']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_TERTIARY_RIGHT']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_FIRST_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_FIRST_QUARTER']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_SECOND_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_SECOND_QUARTER']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_THIRD_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_THIRD_QUARTER']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_FOURTH_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_FOURTH_QUARTER']->value)) {?>
<div class="row">
    <div id="home_tertiary_left" class="col-xs-12 col-sm-6">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TERTIARY_LEFT']->value;?>

        <?php if ((isset($_smarty_tpl->tpl_vars['HOOK_HOME_FIRST_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_FIRST_QUARTER']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_SECOND_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_SECOND_QUARTER']->value)) {?>
        <div class="row">
            <div id="home_first_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_FIRST_QUARTER']->value;?>

            </div>
            <div id="home_second_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_SECOND_QUARTER']->value;?>

            </div>
        </div>
        <?php }?>
    </div>
    <div id="home_tertiary_right" class="col-xs-12 col-sm-6 col-md-6">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_TERTIARY_RIGHT']->value;?>

        <?php if ((isset($_smarty_tpl->tpl_vars['HOOK_HOME_THIRD_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_THIRD_QUARTER']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_FOURTH_QUARTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_HOME_FOURTH_QUARTER']->value)) {?>
        <div class="row">
            <div id="home_third_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_THIRD_QUARTER']->value;?>

            </div>
            <div id="home_fourth_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_FOURTH_QUARTER']->value;?>

            </div>
        </div>
        <?php }?>
    </div>
</div>
<?php }?>
<!-- / Home tertiaray -->
<!-- Home secondary -->
<?php if ((isset($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value))||(isset($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_RIGHT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_RIGHT']->value))) {?>
<div class="row">
    <?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value)) {?>
    <div id="home_secondary_left" class="col-sm-3">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value;?>

    </div>
    <?php }?>
    <div id="home_secondary_right" class="<?php if (!isset($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value)||!trim($_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_LEFT']->value)) {?> col-xs-12 col-md-12 <?php } else { ?> col-xs-12 col-sm-9  <?php }?>">
        <?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_SECONDARY_RIGHT']->value;?>

    </div>
</div>
<?php }?>
<!-- / Home secondary -->
<!-- Home bottom -->
<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HOME_BOTTOM']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HOME_BOTTOM']->value)) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_HOME_BOTTOM']->value;?>
<?php }?>
<!-- / Home bottom -->
<?php }} ?>
