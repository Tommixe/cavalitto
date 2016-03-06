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

<!-- MODULE Product categories slider -->
{capture name="column_slider"}{if isset($column_slider) && $column_slider}_column{/if}{/capture}
{if isset($product_categories) && count($product_categories)}
    {foreach $product_categories as $p_c}
        {if isset($homeverybottom) && $homeverybottom && !$p_c.pro_per_fw}<div id="product_categories_slider_container_{$p_c.id_st_product_categories_slider}" class="wide_container {if $hide_mob} hidden-xs {/if} block"><div class="container">{/if}
        <section id="product_categories_slider_{$p_c.id_st_product_categories_slider}" class="product_categories_slider_block{$smarty.capture.column_slider} {if !isset($homeverybottom) || !$homeverybottom} block {/if} {if isset($column_slider) && $column_slider} column_block {/if} products_block section {if $hide_mob} hidden-xs {/if} {if $display_as_grid==1} display_as_grid {elseif $display_as_grid==2} display_as_simple {/if}{if $countdown_on} s_countdown_block{/if}">
            <h3 class="title_block mar_b1 {if (!isset($column_slider) || !$column_slider) && $p_c.title_alignment} title_block_center {/if}">
                <a href="{$link->getCategoryLink($p_c.id_category, $p_c.link_rewrite)|escape:'html':'UTF-8'}" title="{$p_c.name|escape:'html':'UTF-8'}">{$p_c.name|escape:'html':'UTF-8'}</a>
            </h3>            
	        {if isset($p_c.products) AND $p_c.products}
            {if !$display_as_grid || ($display_as_grid && isset($column_slider) && $column_slider)}
            <div id="product_categories-itemslider-{$hook_hash}{$smarty.capture.column_slider}_{$p_c.id_category}" class="products_slider product_categories-itemslider{$smarty.capture.column_slider} block_content">
                {if isset($column_slider) && $column_slider}
            	{include file="$tpl_dir./product-slider-list.tpl" products=$p_c.products }
                {else}
            	{include file="$tpl_dir./product-slider.tpl" direction_nav=$p_c.direction_nav products=$p_c.products }
                {/if}
        	</div>
            <script type="text/javascript">
            //<![CDATA[
            {literal}
            jQuery(function($) {
                var owl = $("#product_categories-itemslider-{/literal}{$hook_hash}{$smarty.capture.column_slider}{literal}_{/literal}{$p_c.id_category}{literal} .slides");
                owl.owlCarousel({
                    {/literal}
                    autoPlay: {if $pro_cate_slideshow}{$pro_cate_s_speed|default:5000}{else}false{/if},
                    slideSpeed: {$pro_cate_a_speed},
                    stopOnHover: {if $pro_cate_pause_on_hover}true{else}false{/if},
                    lazyLoad: {if $lazy_load}true{else}false{/if},
                    scrollPerPage: {if $pro_cate_move}true{else}false{/if},
                    rewindNav: {if $rewind_nav}true{else}false{/if},
                    afterInit: productsSliderAfterInit,
                    {if isset($column_slider) && $column_slider}
                    singleItem : true,
                    navigation: true,
                    pagination: false,
                    {else}
                    navigation: {if $p_c.direction_nav}true{else}false{/if},
                    pagination: {if $p_c.control_nav}true{else}false{/if},
                    {literal}
                    itemsCustom : [
                        {/literal}
                        {if $sttheme.responsive && !$sttheme.version_switching}
                        {if isset($homeverybottom) && $homeverybottom && $p_c.pro_per_fw}[{if $sttheme.responsive_max==2}1660{else}1420{/if}, {if $p_c.pro_per_fw}{$p_c.pro_per_fw}{else}1{/if}],{/if}
                        {if $sttheme.responsive_max==2}{literal}[1420, {/literal}{if $p_c.pro_per_xl}{$p_c.pro_per_xl}{else}1{/if}{literal}],{/literal}{/if}
                        {if $sttheme.responsive_max>=1}{literal}[1180, {/literal}{if $p_c.pro_per_lg}{$p_c.pro_per_lg}{else}1{/if}{literal}],{/literal}{/if}
                        {literal}
                        [972, {/literal}{if $p_c.pro_per_md}{$p_c.pro_per_md}{else}1{/if}{literal}],
                        [748, {/literal}{if $p_c.pro_per_sm}{$p_c.pro_per_sm}{else}1{/if}{literal}],
                        [460, {/literal}{if $p_c.pro_per_xs}{$p_c.pro_per_xs}{else}1{/if}{literal}],
                        [0, {/literal}{if $p_c.pro_per_xxs}{$p_c.pro_per_xxs}{else}1{/if}{literal}]
                        {/literal}{else}{literal}
                        [0, {/literal}{if $sttheme.responsive_max==2}{if $p_c.pro_per_xl}{$p_c.pro_per_xl}{else}1{/if}{elseif $sttheme.responsive_max==1}{if $p_c.pro_per_lg}{$p_c.pro_per_lg}{else}1{/if}{else}{if $p_c.pro_per_md}{$p_c.pro_per_md}{else}1{/if}{/if}{literal}]
                        {/literal}
                        {/if}
                        {literal} 
                    ]
                    {/literal}
                    {/if}
                    {literal} 
                });
            });
            {/literal} 
            //]]>
            </script>
            {elseif $display_as_grid==2}
                {include file="$tpl_dir./product-list-simple.tpl" products=$p_c.products for_f='pro_cate' id='stproductcategoriesslider_grid'}
            {else}
                {include file="$tpl_dir./product-list.tpl" products=$p_c.products class='stproductcategoriesslider_grid' for_f='pro_cate' id='stproductcategoriesslider_grid' pro_per_xl=$p_c.pro_per_xl pro_per_lg=$p_c.pro_per_lg pro_per_md=$p_c.pro_per_md pro_per_sm=$p_c.pro_per_sm pro_per_xs=$p_c.pro_per_xs pro_per_xxs=$p_c.pro_per_xxs}
            {/if}
        	{else}
        		<p class="warning">{l s='No products' mod='stproductcategoriesslider'}</p>
        	{/if}
        </section>
        {if isset($homeverybottom) && $homeverybottom && !$p_c.pro_per_fw}</div></div>{/if}
    {/foreach}
{/if}
<!-- /MODULE Product categories slider -->