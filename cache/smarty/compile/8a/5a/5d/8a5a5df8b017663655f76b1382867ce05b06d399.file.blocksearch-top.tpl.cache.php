<?php /* Smarty version Smarty-3.1.19, created on 2016-01-04 14:56:21
         compiled from "/home/micreon/public_html/cavalitto/modules/blocksearch_mod/views/templates/hook/blocksearch-top.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1402325950568a7a056410c0-29885586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a5a5df8b017663655f76b1382867ce05b06d399' => 
    array (
      0 => '/home/micreon/public_html/cavalitto/modules/blocksearch_mod/views/templates/hook/blocksearch-top.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1402325950568a7a056410c0-29885586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'search_main_menu' => 0,
    'search_top_bar' => 0,
    'quick_search_simple' => 0,
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_568a7a05679e87_38734638',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_568a7a05679e87_38734638')) {function content_568a7a05679e87_38734638($_smarty_tpl) {?>
<!-- Block search module TOP -->
<?php if (isset($_smarty_tpl->tpl_vars['search_main_menu']->value)||(!isset($_smarty_tpl->tpl_vars['search_top_bar']->value)&&$_smarty_tpl->tpl_vars['quick_search_simple']->value<2)) {?>
<?php if (isset($_smarty_tpl->tpl_vars['search_main_menu']->value)) {?><div id="search_block_main_menu"><div class="container"><?php }?>
<div id="search_block_top" class="<?php if ($_smarty_tpl->tpl_vars['quick_search_simple']->value) {?> quick_search_simple <?php }?> top_bar_item clearfix">
	<form id="searchbox" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true), ENT_QUOTES, 'UTF-8', true);?>
" >
		<div id="searchbox_inner" class="clearfix">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search here','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
" value="<?php echo stripslashes(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
" autocomplete="off" />
			<button type="submit" name="submit_search" class="button-search">
				<i class="icon-search-1 icon-large"></i>
			</button>
			<div class="hidden more_prod_string"><?php echo smartyTranslate(array('s'=>'More products »','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
</div>
		</div>
	</form>
    <script type="text/javascript">
    // <![CDATA[
    
    jQuery(function($){
        $('#searchbox').submit(function(){
            var search_query_top_val = $.trim($('#search_query_top').val());
            if(search_query_top_val=='' || search_query_top_val==$.trim($('#search_query_top').attr('placeholder')))
            {
                $('#search_query_top').focusout();
                return false;
            }
            return true;
        });
        if(!isPlaceholer())
        {
            $('#search_query_top').focusin(function(){
                if ($(this).val()==$(this).attr('placeholder'))
                    $(this).val('');
            }).focusout(function(){
                if ($(this).val()=='')
                    $(this).val($(this).attr('placeholder'));
            });
        }
    });
    
    //]]>
    </script>
</div>
<?php if (isset($_smarty_tpl->tpl_vars['search_main_menu']->value)) {?></div></div><?php }?>
<?php } else { ?>
<div id="search_block_nav" class="top_bar_item dropdown_wrap">
    <div class="dropdown_tri header_item">
        <i class="icon-search-1 icon-small"></i><?php if ($_smarty_tpl->tpl_vars['quick_search_simple']->value==2) {?><?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
<?php }?>
    </div>
    <div class="dropdown_list">
        <div id="search_block_top" class="top_bar_item clearfix">
            <form id="searchbox" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true), ENT_QUOTES, 'UTF-8', true);?>
" >
                <input type="hidden" name="controller" value="search" />
                <input type="hidden" name="orderby" value="position" />
                <input type="hidden" name="orderway" value="desc" />
                <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search here','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
" value="<?php echo stripslashes(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
" />
                <button type="submit" name="submit_search" class="button-search">
                    <i class="icon-search-1 icon-large"></i>
                </button>
                <div class="hidden more_prod_string"><?php echo smartyTranslate(array('s'=>'More products »','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
</div>
            </form>
            <script type="text/javascript">
            // <![CDATA[
            
            jQuery(function($){
                $('#searchbox').submit(function(){
                    var search_query_top_val = $.trim($('#search_query_top').val());
                    if(search_query_top_val=='' || search_query_top_val==$.trim($('#search_query_top').attr('placeholder')))
                    {
                        $('#search_query_top').focusout();
                        return false;
                    }
                    return true;
                });
                if(!isPlaceholer())
                {
                    $('#search_query_top').focusin(function(){
                        if ($(this).val()==$(this).attr('placeholder'))
                            $(this).val('');
                    }).focusout(function(){
                        if ($(this).val()=='')
                            $(this).val($(this).attr('placeholder'));
                    });
                }
            });
            
            //]]>
            </script>
        </div>
    </div>
</div>
<?php }?>
<!-- /Block search module TOP --><?php }} ?>
