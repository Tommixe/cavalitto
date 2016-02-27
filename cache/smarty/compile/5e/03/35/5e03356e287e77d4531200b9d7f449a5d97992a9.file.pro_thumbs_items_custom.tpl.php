<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:46
         compiled from "/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/pro_thumbs_items_custom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73215748568a7bfe802608-70127987%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e03356e287e77d4531200b9d7f449a5d97992a9' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stthemeeditor/views/templates/hook/pro_thumbs_items_custom.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73215748568a7bfe802608-70127987',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'st_responsive' => 0,
    'st_version_switching' => 0,
    'responsive_max' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pro_per_xxs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfe82a748_14949439',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfe82a748_14949439')) {function content_568a7bfe82a748_14949439($_smarty_tpl) {?>
<script type="text/javascript">
//<![CDATA[

if(pro_thumbs_items_custom)
    pro_thumbs_items_custom = [
        
        <?php if ($_smarty_tpl->tpl_vars['st_responsive']->value&&!$_smarty_tpl->tpl_vars['st_version_switching']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['responsive_max']->value==2) {?>[1420, <?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
],<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['responsive_max']->value>=1) {?>[1180, <?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
],<?php }?>
        
        [972, <?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
],
        [748, <?php echo $_smarty_tpl->tpl_vars['pro_per_sm']->value;?>
],
        [460, <?php echo $_smarty_tpl->tpl_vars['pro_per_xs']->value;?>
],
        [0, <?php echo $_smarty_tpl->tpl_vars['pro_per_xxs']->value;?>
]
        <?php } else { ?>
        [0, <?php if ($_smarty_tpl->tpl_vars['responsive_max']->value==2) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
<?php } elseif ($_smarty_tpl->tpl_vars['responsive_max']->value==1) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
<?php }?>]
        <?php }?>
    ];
 
//]]>
</script><?php }} ?>
