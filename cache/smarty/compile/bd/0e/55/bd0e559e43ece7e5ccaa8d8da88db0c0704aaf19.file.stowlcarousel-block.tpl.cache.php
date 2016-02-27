<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 16:43:16
         compiled from "/home/micreon/public_html/cavalitto/modules/stowlcarousel/views/templates/hook/stowlcarousel-block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1216074246568a9314c64cc2-81821481%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd0e559e43ece7e5ccaa8d8da88db0c0704aaf19' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/stowlcarousel/views/templates/hook/stowlcarousel-block.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1216074246568a9314c64cc2-81821481',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banner_data' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a9314ccd241_53989239',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a9314ccd241_53989239')) {function content_568a9314ccd241_53989239($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['banner_data']->value['url']) {?>
    <a id="st_owl_carousel_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="st_owl_carousel_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'];?>
 st_owl_carousel_block" target="<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['new_window']) {?>_blank<?php } else { ?>_self<?php }?>" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
<?php } else { ?>
    <div id="st_owl_carousel_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'];?>
" class="st_owl_carousel_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_owl_carousel'];?>
 st_owl_carousel_block">
<?php }?>
<img class="st_owl_carousel_image" src="<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['image_multi_lang'];?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if ((isset($_smarty_tpl->tpl_vars['banner_data']->value['width'])&&$_smarty_tpl->tpl_vars['banner_data']->value['width'])) {?>width="<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['width'];?>
"<?php }?> <?php if ((isset($_smarty_tpl->tpl_vars['banner_data']->value['height'])&&$_smarty_tpl->tpl_vars['banner_data']->value['height'])) {?>height="<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['height'];?>
"<?php }?> />
<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['description']) {?>
    <div class="st_owl_carousel_text text_table_wrap <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['hide_text_on_mobile']) {?> hidden-xs <?php }?>">
        <div class="text_table">
            <div class="text_td style_content <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['text_align']==1) {?> text-left <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_align']==3) {?> text-right <?php } else { ?> text-center <?php }?> banner_text_<?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner_data']->value['text_position'])===null||$tmp==='' ? 'center' : $tmp);?>
 clearfix">
                <?php if (isset($_smarty_tpl->tpl_vars['banner_data']->value['text_width'])&&$_smarty_tpl->tpl_vars['banner_data']->value['text_width']) {?><div class="text_inner_box <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['text_width']>10&&$_smarty_tpl->tpl_vars['banner_data']->value['text_width']<20) {?> text_inner_box_left<?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_width']>20&&$_smarty_tpl->tpl_vars['banner_data']->value['text_width']<30) {?> text_inner_box_right<?php }?> center_width_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['text_width']%10;?>
0"><?php }?>
                <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['description']) {?><?php echo $_smarty_tpl->tpl_vars['banner_data']->value['description'];?>
<?php }?>
                <?php if (isset($_smarty_tpl->tpl_vars['banner_data']->value['text_width'])&&$_smarty_tpl->tpl_vars['banner_data']->value['text_width']) {?></div><?php }?>
            </div>
        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['url']) {?>
    </a>
<?php } else { ?>
    </div>
<?php }?><?php }} ?>
