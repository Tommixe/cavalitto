<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:37
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\stqrcode\views\templates\hook\stqrcode-side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1497556d9d66918e012-16787632%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b97674fc3d6ad6df48fad34fa5bffdb087468bcf' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\stqrcode\\views\\templates\\hook\\stqrcode-side.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1497556d9d66918e012-16787632',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'image_link' => 0,
    'load_on_hover' => 0,
    'size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d6693aa538_51491777',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d6693aa538_51491777')) {function content_56d9d6693aa538_51491777($_smarty_tpl) {?>
<div class="st-menu" id="side_qrcode">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'QR code','mod'=>'stqrcode'),$_smarty_tpl);?>
</h3>
		    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stqrcode'),$_smarty_tpl);?>
"><i class="icon-angle-double-right icon-0x"></i></a>
			</div>
			<div id="qrcode_box">
				<a href="<?php echo $_smarty_tpl->tpl_vars['image_link']->value;?>
" class="qrcode_link" target="_blank" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'QR code','mod'=>'stqrcode'),$_smarty_tpl);?>
">
					<?php if ($_smarty_tpl->tpl_vars['load_on_hover']->value) {?>
					<i class="icon-spin5 animate-spin icon-1x"></i>
					<?php } else { ?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['image_link']->value;?>
" width="<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
" height="<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
" />
					<?php }?>
				</a>
			</div>
		</div>
	</div>
</div><?php }} ?>
