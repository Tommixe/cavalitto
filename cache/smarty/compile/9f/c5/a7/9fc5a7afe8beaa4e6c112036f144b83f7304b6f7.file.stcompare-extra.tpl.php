<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 15:04:44
         compiled from "/home/micreon/public_html/cavalitto/modules/stcompare/views/templates/hook/stcompare-extra.tpl" */ ?>
<?php /*%%SmartyHeaderCode:278187120568a7bfcbac966-00485182%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9fc5a7afe8beaa4e6c112036f144b83f7304b6f7' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stcompare/views/templates/hook/stcompare-extra.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '278187120568a7bfcbac966-00485182',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'product_link' => 0,
    'product' => 0,
    'product_cover' => 0,
    'link' => 0,
    'smallSize' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7bfcbcb744_10598177',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7bfcbcb744_10598177')) {function content_568a7bfcbcb744_10598177($_smarty_tpl) {?>

<?php if (isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
    <p class="buttons_bottom_block no-print">
    	<a class="add_to_compare" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_link']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to compare','mod'=>'stcompare'),$_smarty_tpl);?>
" data-product-name="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" data-product-cover="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['product_cover']->value,'small_default');?>
" data-product-cover-width="<?php echo $_smarty_tpl->tpl_vars['smallSize']->value['width'];?>
" data-product-cover-height="<?php echo $_smarty_tpl->tpl_vars['smallSize']->value['height'];?>
" ><i class="icon-adjust icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to compare','mod'=>'stcompare'),$_smarty_tpl);?>
</span></a>
    </p>
<?php }?><?php }} ?>
