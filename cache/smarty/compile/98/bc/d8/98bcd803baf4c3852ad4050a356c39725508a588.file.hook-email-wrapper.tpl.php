<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 20:00:41
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\advancedeucompliance\views\templates\hook\hook-email-wrapper.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2600756d9db591a6b52-68495136%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98bcd803baf4c3852ad4050a356c39725508a588' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\advancedeucompliance\\views\\templates\\hook\\hook-email-wrapper.tpl',
      1 => 1449813699,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2600756d9db591a6b52-68495136',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cms_contents' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9db59277a08_61723689',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9db59277a08_61723689')) {function content_56d9db59277a08_61723689($_smarty_tpl) {?>

<div style="background-color:#fff;width:650px;font-family:Open-sans,sans-serif;color:#555454;font-size:13px;line-height:18px;margin:auto">
    <table style="width:100%;margin-top:10px">
        <tbody>
            <?php  $_smarty_tpl->tpl_vars['content'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['content']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['cms_contents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['content']->key => $_smarty_tpl->tpl_vars['content']->value) {
$_smarty_tpl->tpl_vars['content']->_loop = true;
?>
            <tr>
                <td style="width:20px;padding:7px 0">&nbsp;</td>
                <td style="padding:7px 0">
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['cleanHtml'][0][0]->smartyCleanHtml($_smarty_tpl->tpl_vars['content']->value);?>

                </td>
                <td style="width:20px;padding:7px 0">&nbsp;</td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div><?php }} ?>
