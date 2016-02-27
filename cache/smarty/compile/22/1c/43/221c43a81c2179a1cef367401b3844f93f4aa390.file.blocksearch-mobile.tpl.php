<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:22
         compiled from "/home/micreon/public_html/cavalitto/modules/blocksearch_mod/views/templates/hook/blocksearch-mobile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1022031965568a7a06cf4e96-82860795%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '221c43a81c2179a1cef367401b3844f93f4aa390' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/blocksearch_mod/views/templates/hook/blocksearch-mobile.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1022031965568a7a06cf4e96-82860795',
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
  'unifunc' => 'content_568a7a06d051e9_55385496',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a06d051e9_55385496')) {function content_568a7a06d051e9_55385496($_smarty_tpl) {?>

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
