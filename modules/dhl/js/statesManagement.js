function dhl_preview_update_state(is_cart, id_state)
{
	$('select#dhl_dest_state'+is_cart+' option:not(:first-child)').remove();
	var dhl_states = dhl_countries[$('select#dhl_dest_country'+is_cart).val()];

	var $dhl_dest_state = $("#dhl_dest_state"+is_cart).closest("div#dhl_line");
	if(typeof(dhl_states) != 'undefined')
	{
		$(dhl_states).each(function (key, item){
			$('select#dhl_dest_state'+is_cart).append('<option value="'+item.id+'" '+(id_state == item.id?'selected':'')+'>'+item.name+'</option>');
		});
		$(".dhl_id_state"+is_cart).fadeIn('slow');

		if ( "none" == $dhl_dest_state.css("display") ) {
			$dhl_dest_state.animate({ height : "toggle", marginBottom : "toggle" }, "slow");
		}
	}
	else {
		$(".dhl_id_state"+is_cart).fadeOut('slow');

		if ( "none" != $dhl_dest_state.css("display") ) {
			$dhl_dest_state.animate({ height : "toggle", marginBottom : "toggle" }, "slow");
		}
	}
}