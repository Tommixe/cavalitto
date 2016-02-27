<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:22
         compiled from "/home/micreon/public_html/cavalitto/modules/blocklanguages_mod/views/templates/hook/blocklanguages-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1108093768568a7a06c94438-56172810%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fb55486dbd05d6d6b89feeebd77c4c513b98e714' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/blocklanguages_mod/views/templates/hook/blocklanguages-mobile.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1108093768568a7a06c94438-56172810',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'lang_iso' => 0,
    'display_flags' => 0,
    'img_lang_dir' => 0,
    'indice_lang' => 0,
    'lang_rewrite_urls' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a06cf0d16_85792144',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a06cf0d16_85792144')) {function content_568a7a06cf0d16_85792144($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include '/home/micreon/public_html/cavalitto/tools/smarty/plugins/modifier.regex_replace.php';
?>
<!-- Block languages module -->
<ul id="languages-block_mobile_menu" class="mo_mu_level_0 mobile_menu_ul">
	<li class="mo_ml_level_0 mo_ml_column">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
			<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']==$_smarty_tpl->tpl_vars['lang_iso']->value) {?>
			    <a href="javascript:;" rel="alternate" hreflang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8', true);?>
" class="mo_ma_level_0 ma_span">
			    	<?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['img_lang_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" width="16" height="11" class="mar_r4" /><?php }?><?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=2) {?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['language']->value['name'],"/\s\(.*\)"."$"."/",'');?>
<?php }?>
			    </a>
			<?php }?>
		<?php } ?>
		<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
		<span class="opener">&nbsp;</span>
		<ul class="mo_mu_level_1 mo_sub_ul">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
    		<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']!=$_smarty_tpl->tpl_vars['lang_iso']->value) {?>
			<li class="mo_ml_level_1 mo_sub_li">
				<?php $_smarty_tpl->tpl_vars['indice_lang'] = new Smarty_variable($_smarty_tpl->tpl_vars['language']->value['id_lang'], null, 0);?>
				<?php if (isset($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value])) {?>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
|escape:'html':'UTF-8'}" rel="alternate" hreflang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8', true);?>
" class="mo_ma_level_1 mo_sub_a">
				<?php } else { ?>
					<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getLanguageLink($_smarty_tpl->tpl_vars['language']->value['id_lang']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
|escape:'html':'UTF-8'}" rel="alternate" hreflang="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language']->value['iso_code'], ENT_QUOTES, 'UTF-8', true);?>
" class="mo_ma_level_1 mo_sub_a">
				<?php }?>
				    <?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['img_lang_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" width="16" height="11" class="mar_r4" /><?php }?><?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=2) {?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['language']->value['name'],"/\s\(.*\)"."$"."/",'');?>
<?php }?>
				</a>
			</li>
			<?php }?>
		<?php } ?>
		</ul>
		<?php }?>
	</li>
</ul>
<!-- /Block languages module --><?php }} ?>
