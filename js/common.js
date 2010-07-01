// Change an element text an revert in a smooth pulse. el is an element id like '#copybox h2'
function html_pulse( el, newtext ){
	var oldtext = $(el).html();
	// Fast pulse to "Copied" and revert
	$(el).fadeTo(
		"normal",
		0.01,
		function(){
			$(el)
			.html( newtext )
			.css('opacity', 1)
			.fadeTo(
				"slow", 1, // this fades from 1 to 1: just a 'sleep(1)' actually
				function(){
					$(el).fadeTo("normal", 0.01, function(){$(el).html( oldtext ).css('opacity', 1)});
				}
			);
		}
	);


}

// Update feedback message
function feedback(msg, type, delay) {
	close = ( type == 'fail' || type == 'error' ) ? true : false;		
	delay = delay || ( close == true ? 10000 : 2000 );
	$.notifyBar({
		html: '<span>'+msg+'</span>',
		delay: delay,
		animationSpeed: "normal",
		close: close,
		cls: type
	});
	return true;
}

// Unused for now
function logout() {
	$.ajax({
		type: "POST",
		url: "index_ajax.php",
		data: {mode:'logout'},
		success: function() {
			window.parent.location.href = window.parent.location.href;
		}
	});
}

// Begin the spinning animation & disable a button
function add_loading(el) {
	$(el).attr("disabled", "disabled").addClass('disabled').addClass('loading');
}

// End spinning animation
function end_loading(el) {
	$(el).removeClass('loading');
}

// Un-disable an element
function end_disable(el) {
	$(el).removeAttr("disabled").removeClass('disabled');
}

// Trim long string
function trim_long_string( string, length) {
	var newstring = string;
	length = length || 60;
	if ( newstring.length > length ) {
		newstring = newstring.substr(0, (length - 5) ) + '[...]';	
	}
	return newstring;
}
