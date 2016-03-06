<?php /*%%SmartyHeaderCode:873256d9d65e4bf093-85581055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8de91c74c3f5458cfc2e7fe3d3526ca2843b1913' => 
    array (
      0 => 'C:\\Users\\Tommaso\\Dropbox\\PS\\cavalitto\\modules\\blocksearch_mod\\views\\templates\\hook\\blocksearch-top.tpl',
      1 => 1449302560,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '873256d9d65e4bf093-85581055',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_56d9d6ba40c090_33196984',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56d9d6ba40c090_33196984')) {function content_56d9d6ba40c090_33196984($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class=" top_bar_item clearfix">
	<form id="searchbox" method="get" action="http://127.0.0.1/edsa-cavalitto/index.php?controller=search" >
		<div id="searchbox_inner" class="clearfix">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Search here" value="" autocomplete="off" />
			<button type="submit" name="submit_search" class="button-search">
				<i class="icon-search-1 icon-large"></i>
			</button>
			<div class="hidden more_prod_string">More products »</div>
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
<!-- /Block search module TOP --><?php }} ?>
