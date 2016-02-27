<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:17
         compiled from "/home/micreon/public_html/cavalitto/admincavalitto/themes/default/template/content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1970936929568a7a01be55f6-34642430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4cbf7eb453ed50b94e12cb9566e23636e846e04' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/admincavalitto/themes/default/template/content.tpl',
      1 => 1449301919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1970936929568a7a01be55f6-34642430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a01beb290_97041391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a01beb290_97041391')) {function content_568a7a01beb290_97041391($_smarty_tpl) {?>
<div id="ajax_confirmation" class="alert alert-success hide"></div>

<div id="ajaxBox" style="display:none"></div>


<div class="row">
	<div class="col-lg-12">
		<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		<?php }?>
	</div>
</div><?php }} ?>
