{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!-- Block search module TOP -->
{if isset($search_main_menu) || (!isset($search_top_bar) && $quick_search_simple lt 2)}
{if isset($search_main_menu)}<div id="search_block_main_menu"><div class="container">{/if}
<div id="search_block_top" class="{if $quick_search_simple} quick_search_simple {/if} top_bar_item clearfix">
	<form id="searchbox" method="get" action="{$link->getPageLink('search',true)|escape:'html':'UTF-8'}" >
		<div id="searchbox_inner" class="clearfix">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="{l s='Search here' mod='blocksearch_mod'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" autocomplete="off" />
			<button type="submit" name="submit_search" class="button-search">
				<i class="icon-search-1 icon-large"></i>
			</button>
			<div class="hidden more_prod_string">{l s='More products »' mod='blocksearch_mod'}</div>
		</div>
	</form>
    <script type="text/javascript">
    // <![CDATA[
    {literal}
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
    {/literal}
    //]]>
    </script>
</div>
{if isset($search_main_menu)}</div></div>{/if}
{else}
<div id="search_block_nav" class="top_bar_item dropdown_wrap">
    <div class="dropdown_tri header_item">
        <i class="icon-search-1 icon-small"></i>{if $quick_search_simple==2}{l s='Search' mod='blocksearch_mod'}{/if}
    </div>
    <div class="dropdown_list">
        <div id="search_block_top" class="top_bar_item clearfix">
            <form id="searchbox" method="get" action="{$link->getPageLink('search',true)|escape:'html':'UTF-8'}" >
                <input type="hidden" name="controller" value="search" />
                <input type="hidden" name="orderby" value="position" />
                <input type="hidden" name="orderway" value="desc" />
                <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="{l s='Search here' mod='blocksearch_mod'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" />
                <button type="submit" name="submit_search" class="button-search">
                    <i class="icon-search-1 icon-large"></i>
                </button>
                <div class="hidden more_prod_string">{l s='More products »' mod='blocksearch_mod'}</div>
            </form>
            <script type="text/javascript">
            // <![CDATA[
            {literal}
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
            {/literal}
            //]]>
            </script>
        </div>
    </div>
</div>
{/if}
<!-- /Block search module TOP -->