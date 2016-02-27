/*
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
*/
if(typeof(blocksearch_type)=='undefined')
	var blocksearch_type = 'top';

var instantSearchQueries = [];
$(document).ready(function()
{
	if (typeof blocksearch_type == 'undefined')
		return;

	$("#search_block_" + blocksearch_type).focus(function(){
	     $(this).parent().addClass('active');
	}).blur(function(){
	     $(this).parent().removeClass('active');
	});

	//var width_ac_results = 	$("#search_query_" + blocksearch_type).parent('form').outerWidth();
	if (typeof ajaxsearch != 'undefined' && ajaxsearch)
	{
		if($("#search_block_nav").size())
		{
			$("body").delegate('.ac_results', 'hover', function(){
		        $("#search_block_nav").addClass('open');
		    });
		}
		if($("#search_block_" + blocksearch_type).hasClass('quick_search_simple'))
		{
			$("body").delegate('.ac_results', 'mouseenter', function(){
		        $("#searchbox_inner").addClass('active');
		    });
			$("body").delegate('.ac_results', 'mouseleave ', function(){
		        $("#searchbox_inner").removeClass('active');
		    });
		}
		var search_query_autocomplete = $("#search_query_" + blocksearch_type).autocomplete(
			search_url,
			{
				minChars: 3,
				max: 10,
				width: $("#search_query_" + blocksearch_type).outerWidth(),
				selectFirst: false,
				scroll: false,
				dataType: "json",
				formatItem: function(data, i, max, value, term) {
					return value;
				},
				parse: function(data) {
					search_query_autocomplete.setOptions({'width':$("#search_query_" + blocksearch_type).outerWidth()});
					var mytab = new Array();
					for (var i = 0; i < data.length; i++)
                    if(i==6){
						data[i].pname = 'searchboxsubmit';
						data[i].product_link = $('#search_query_' + blocksearch_type).val();
						mytab[mytab.length] = { data: data[i], value:  '<div id="ac_search_more"> '+ $("#search_block_" + blocksearch_type).find(".more_prod_string").html()+' </div>'};
                        break;
					}else
					    mytab[mytab.length] = { data: data[i], value:  ' <img src="'+ data[i].pthumb + '" alt="'  + data[i].pname + '" /><span class="ac_product_name">'  + data[i].pname + ' </span> '};
					return mytab;
				},
				extraParams: {
					ajaxSearch: 1,
					id_lang: id_lang
				}
			}
		)
		.result(function(event, data, formatted) {
			if(data.pname=='searchboxsubmit'){
				$('#search_query_' + blocksearch_type).val(data.product_link);
                $("#searchbox").submit();
            }else{
				$('#search_query_' + blocksearch_type).val(data.pname);
				document.location.href = data.product_link;
            }
		});
	}
	if (typeof instantsearch != 'undefined' && instantsearch)		
		$("#search_query_" + blocksearch_type).keyup(function(){
			if($(this).val().length > 4)
			{
				stopInstantSearchQueries();
				instantSearchQuery = $.ajax({
					url: search_url + '?rand=' + new Date().getTime(),
					data: {
						instantSearch: 1,
						id_lang: id_lang,
						q: $(this).val()
					},
					dataType: 'html',
					type: 'POST',
					headers: { "cache-control": "no-cache" },
					async: true,
					cache: false,
					success: function(data){
						if($("#search_query_" + blocksearch_type).val().length > 0)
						{
							tryToCloseInstantSearch();
							$('#center_column').attr('id', 'old_center_column');
							$('#old_center_column').after('<div id="center_column" class="' + $('#old_center_column').attr('class') + '">' + data + '</div>').hide();
							// Button override
							ajaxCart.overrideButtonsInThePage();
							$("#instant_search_close").on('click', function() {
								$("#search_query_" + blocksearch_type).val('');
								return tryToCloseInstantSearch();
							});
							return false;
						}
						else
							tryToCloseInstantSearch();
					}
				});
				instantSearchQueries.push(instantSearchQuery);
			}
			else
				tryToCloseInstantSearch();
		});

	$("#rightbar_search_btn, #blocksearch_mod_tri").click(function(){
        sidebarRight('search');
        return false;
    });
});


function tryToCloseInstantSearch()
{
	var $oldCenterColumn = $('#old_center_column');
	if ($oldCenterColumn.length > 0)
	{
		$('#center_column').remove();
		$oldCenterColumn.attr('id', 'center_column').show();
		return false;
	}
}

function stopInstantSearchQueries()
{
	for(var i=0; i<instantSearchQueries.length; i++)
		instantSearchQueries[i].abort();
	instantSearchQueries = [];
}
function SearchHoverWatcher(selector)
{
	this.hovering = false;
	var self = this;

	this.isHoveringOver = function(){
		return self.hovering;
	}

	$(selector).hover(function(){
		self.hovering = true;
	}, function(){
		self.hovering = false;
	})
}