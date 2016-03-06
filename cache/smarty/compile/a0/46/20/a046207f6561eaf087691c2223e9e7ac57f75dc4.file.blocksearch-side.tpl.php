<?php /* Smarty version Smarty-3.1.19, created on 2016-03-04 19:39:35
         compiled from "C:\Users\Tommaso\Dropbox\PS\cavalitto\modules\blocksearch_mod\views\templates\hook\blocksearch-side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:661756d9d667b1d4f7-25754709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a046207f6561eaf087691c2223e9e7ac57f75dc4' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blocksearch_mod\\views\\templates\\hook\\blocksearch-side.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '661756d9d667b1d4f7-25754709',
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
  'unifunc' => 'content_56d9d667bfb7b1_21053162',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d667bfb7b1_21053162')) {function content_56d9d667bfb7b1_21053162($_smarty_tpl) {?>
<div class="st-menu" id="side_search">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Search','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
</h3>
		    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
"><i class="icon-angle-double-right icon-0x"></i></a>
			</div>
			<div id="search_block_side">
				<form id="searchbox_side" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true), ENT_QUOTES, 'UTF-8', true);?>
" >
					<input type="hidden" name="controller" value="search" />
					<input type="hidden" name="orderby" value="position" />
					<input type="hidden" name="orderway" value="desc" />
					<input class="search_query form-control" type="text" id="search_query_side" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search here','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
" value="<?php echo stripslashes(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
" />
					<button type="submit" name="submit_search" class="button-search">
						<i class="icon-search-1 icon-0x"></i>
					</button>
					<div class="hidden more_prod_string"><?php echo smartyTranslate(array('s'=>'More products »','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
</div>
				</form>
				<script type="text/javascript">
			    // <![CDATA[
			    
			    jQuery(function($){
			        $('#searchbox_side').submit(function(){
			            var search_query_side_val = $.trim($('#search_query_side').val());
			            if(search_query_side_val=='' || search_query_side_val==$.trim($('#search_query_side').attr('placeholder')))
			            {
			                $('#search_query_side').focusout();
			                return false;
			            }
			            return true;
			        });
			        if(!isPlaceholer())
			        {
			            $('#search_query_side').focusin(function(){
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
</div><?php }} ?>
