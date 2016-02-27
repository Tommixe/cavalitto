<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:00:10
         compiled from "/home/micreon/public_html/cavalitto/modules/stblogcomments/views/templates/hook/my-account.tpl" */ ?>
<?php /*%%SmartyHeaderCode:179750321568a7aea2dd6e2-75830664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '177670bbb6784efc9a612995b1ffc69c0900902e' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stblogcomments/views/templates/hook/my-account.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '179750321568a7aea2dd6e2-75830664',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7aea2e5843_81267529',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7aea2e5843_81267529')) {function content_568a7aea2e5843_81267529($_smarty_tpl) {?>

<!-- MODULE St Blog Comment -->
<li class="lnk_stblogcomments">
	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getModuleLink('stblogcomments','mycomments');?>
" title="<?php echo smartyTranslate(array('s'=>'Blog comments','mod'=>'stblogcomments'),$_smarty_tpl);?>
">
		<span class="icon_wrap"><i class="icon-chat-1 icon-1x"></i></span><?php echo smartyTranslate(array('s'=>'Blog comments','mod'=>'stblogcomments'),$_smarty_tpl);?>
</a>
	</a>
</li>
<!-- END : MODULE St Blog Comment --><?php }} ?>
