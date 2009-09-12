
$(document).ready(function(){
	$('#tabs ul#headers').css('display', 'block');
	$('.tab h2').css('display','none');
	
	// Toggle tabs
	$('#tabs ul#headers li a').click(function(){
		var target = $(this).attr('href').replace('#', '');
		$('#tabs div.tab').css('display', 'none');
		$('#tabs div#'+target).css('display', 'block');
		$('#tabs ul#headers li a').removeClass('selected');
		$(this).addClass('selected').css('outline', 'none').blur();
		return false;
	});

	// Activate tab
	if (location.hash) {
		$('#tabs ul#headers li a[href="'+location.hash+'"]').click();
	} else {
		$('#tabs ul#headers li a:first').click();
	}
	
	// Toggle detail lists
	$('a.details').click(function(){
		var target = $(this).attr('id').replace('more_', 'details_');
		$('#'+target).toggle();
		return false;	
	});

});
