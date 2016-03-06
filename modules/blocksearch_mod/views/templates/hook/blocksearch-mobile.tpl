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

<div id="search_block_menu">
<form id="searchbox_menu" method="get" action="{$link->getPageLink('search',true)|escape:'html':'UTF-8'}" >
	<input type="hidden" name="controller" value="search" />
	<input type="hidden" name="orderby" value="position" />
	<input type="hidden" name="orderway" value="desc" />
	<input class="search_query form-control" type="text" id="search_query_menu" name="search_query" placeholder="{l s='Search here' mod='blocksearch_mod'}" value="{$search_query|escape:'htmlall':'UTF-8'|stripslashes}" />
	<button type="submit" name="submit_search" class="button-search">
		<i class="icon-search-1 icon-0x"></i>
	</button>
	<div class="hidden more_prod_string">{l s='More products »' mod='blocksearch_mod'}</div>
</form>
</div>
<script type="text/javascript">
// <![CDATA[
{literal}
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
{/literal}
//]]>
</script>