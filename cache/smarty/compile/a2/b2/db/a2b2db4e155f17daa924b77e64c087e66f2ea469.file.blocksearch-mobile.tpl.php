<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:58
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blocksearch_mod\views\templates\hook\blocksearch-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2351656d9d67ecec4b6-72341685%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2b2db4e155f17daa924b77e64c087e66f2ea469' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blocksearch_mod\\views\\templates\\hook\\blocksearch-mobile.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2351656d9d67ecec4b6-72341685',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d67edd7411_78719249',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d67edd7411_78719249')) {function content_56d9d67edd7411_78719249($_smarty_tpl) {?>

<div id="search_block_menu">
<form id="searchbox_menu" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true), ENT_QUOTES, 'UTF-8', true);?>
" >
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="orderway" value="desc" />
	<input class="search_query form-control" type="text" id="search_query_menu" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search here','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
" value="<?php echo stripslashes(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
" />
	<button type="submit" name="submit_search" class="button-search">
		<i class="icon-search-1 icon-0x"></i>
	</button>
	<div class="hidden more_prod_string"><?php echo smartyTranslate(array('s'=>'More products »','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
</div>
</form>
</div>
<script type="text/javascript">
// <![CDATA[

jQuery(function($){
    $('#searchbox_menu').submit(function(){
        var search_query_menu_val = $.trim($('#search_query_menu').val());
        if(search_query_menu_val=='' || search_query_menu_val==$.trim($('#search_query_menu').attr('placeholder')))
        {
            $('#search_query_menu').focusout();
            return false;
        }
        return true;
    });
    if(!isPlaceholer())
    {
        $('#search_query_menu').focusin(function(){
            if ($(this).val()==$(this).attr('placeholder'))
                $(this).val('');
        }).focusout(function(){
            if ($(this).val()=='')
                $(this).val($(this).attr('placeholder'));
        });
    }
});

//]]>
</script><?php }} ?>
