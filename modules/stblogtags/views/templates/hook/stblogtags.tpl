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
<!-- Block tags module -->
<div id="blog_tags_block" class="block tags_block column_block">
	<h3 class="title_block"><span>{l s='Tags' mod='stblogtags'}</span></h3>
	<div class="block_content tags_wrap">
    {if $tags}
        {foreach $tags as $tag}
    		<a href="{$link->getModuleLink('stblogsearch', 'default', ["stb_search_query"=>"{$tag.name}"])|escape:'html'}" title="{l s='More about' mod='stblogtags'} {$tag.name|escape:html:'UTF-8'}" class="{$tag.class} {if $tag@last}last_item{elseif $tag@first}first_item{else}item{/if}">{$tag.name|escape:html:'UTF-8'}</a>
    	{/foreach}
    {else}
    	{l s='No tags specified yet' mod='stblogtags'}
    {/if}
	</div>
</div>
<!-- /Block tags module -->