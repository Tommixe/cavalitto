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
{extends file="helpers/form/form.tpl"}

{block name="input"}
    {if $input.type == 'selector'}
	<div class="addthis_box" id="{$input.class_t}">
	<table class="double_select {$input.class_t}">
  		<tr>
			<td align="center">
				{l s="Button Options"}
			</td>
			<td align="center">
				{l s="Selected Buttons"}
			</td>
		</tr>
		<tr>
			<td style="padding-left:20px;">
				<select multiple class="select_left" id="left_{$input.name|trim:'[]'}">
					{foreach $input.addthis as $k=>$item}
                    {if !in_array($k, $fields_value[$input.name])}
					<option value="{$k}">{$item}</option>
                    {/if}
					{/foreach}
				</select>
                <div class="row">
        	    	<div class="col-lg-4"><a href="#" class="btn btn-default multiple_select_add"><i class="icon-arrow-right"></i> {l s='Add'}</a></div>
        	    </div>
			</td>
			<td>
				<select multiple class="select_right" name="{$input.name}" id="right_{$input.name|trim:'[]'}">
					{foreach $fields_value[$input.name] as $item}
					<option value="{$item}" selected="selected">{$input.addthis.$item}</option>
					{/foreach}
				</select>
                <div class="row">
        	    	<div class="col-lg-4"><a href="#" class="btn btn-default multiple_select_remove"><i class="icon-arrow-left"></i> {l s='Remove'}</a></div>
        	    </div>
			</td>
		</tr>
	</table>
    <table class="double_select {$input.class_t}" style="display:none;">
  		<tr>
			<td align="center">
				{l s="Button Options"}
			</td>
			<td align="center">
				{l s="Selected Buttons"}
			</td>
		</tr>
		<tr>
			<td style="padding-left:20px;">
				<select multiple class="select_left" id="left_{$input.name_specail|trim:'[]'}">
					{foreach $input.addthis_specail as $k=>$item}
                    {if !in_array($k, $fields_value[$input.name_specail])}
					<option value="{$k}">{$item}</option>
                    {/if}
					{/foreach}
				</select>
				<div class="row">
        	    	<div class="col-lg-4"><a href="#" class="btn btn-default multiple_select_add"><i class="icon-arrow-right"></i> {l s='Add'}</a></div>
        	    </div>
			</td>
			<td>
				<select multiple class="select_right" name="{$input.name_specail}" id="right_{$input.name_specail|trim:'[]'}">
					{foreach $fields_value[$input.name_specail] as $item}
					<option value="{$item}" selected="selected">{$input.addthis_specail.$item}</option>
					{/foreach}
				</select>
				<div class="row">
        	    	<div class="col-lg-4"><a href="#" class="btn btn-default multiple_select_remove"><i class="icon-arrow-left"></i> {l s='Remove'}</a></div>
        	    </div>
			</td>
		</tr>
	</table>
    	<div class="advanced_attr">
            <div class="hint clear info">
            {l s ="Do you want to add some advanced attributes?" }
    	    <span style="cursor:pointer" class="addAttribute">Click here</span>.
    	   </div>
            <ul class="advanced_contain" style="display:none;">
            </ul>
        </div>
	</div>
    {else}
		{$smarty.block.parent}
	{/if}
{/block}

{block name="script"}
var _EXT_ATTR = {$extra_attr};
var _EXT_ATTR_FOR_BLOG = {$extra_attr_for_blog};
{/block}