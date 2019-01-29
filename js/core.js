$(document).ready( function(){
	$('.header_search_button').click(function(e) {
		var herader_search_val = $('.header_search_input').val();
		if( herader_search_val != null ) {
			window.location.href = siteurl + "home/search/" + herader_search_val;
		}
	});
	$('.cart_info').hide();
	
});
