// Handle .hide-if-no-js and .hide-if-js styles
$(document).ready(function(){
	$('.hide-if-no-js').removeClass('hide-if-no-js');
 	$('.hide-if-js').hide();
});

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
	delay = delay || ( close == true ? 10000 : 3500 );
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
		url: ajaxurl,
		data: {action:'logout'},
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

// Get the var=xxx from a query string
function get_var_from_query( url, varname, default_val ) {
	if( varname == undefined ) {
		varname = 'nonce';
	}
	if( default_val == undefined ) {
		default_val = '';
	}
	
	try{
		url = url.split('?')[1].split('&').reverse().filter(function(e){
			var pair = e.split('=');
			return( pair[0] == varname );
		})[0].split('=')[1];
		// weeeeeeee
		// split the query string on '&', reverse to check last pairs first so that ?ozh=1&ozh=2 matches ozh=2 first
		// then filter on each pair to find the matching 'varname=something',
		// which is then returned in a one element array that we split on '=' and take second part. woot!
	} catch(err) {
		return default_val;
	}
	
	return url;
}

/**
 * Jquery Cookie plugin
 * Copyright (c) 2006 Klaus Hartl (stilbuero.de)
 * Dual licensed under the MIT and GPL licenses:
 * http://www.opensource.org/licenses/mit-license.php
 * http://www.gnu.org/licenses/gpl.html
 * Available at http://plugins.jquery.com/files/jquery.cookie.js.txt
 */
jQuery.cookie = function(name, value, options) {
    if (typeof value != 'undefined') { // name and value given, set cookie
        options = options || {};
        if (value === null) {
            value = '';
            options.expires = -1;
        }
        var expires = '';
        if (options.expires && (typeof options.expires == 'number' || options.expires.toUTCString)) {
            var date;
            if (typeof options.expires == 'number') {
                date = new Date();
                date.setTime(date.getTime() + (options.expires * 24 * 60 * 60 * 1000));
            } else {
                date = options.expires;
            }
            expires = '; expires=' + date.toUTCString(); // use expires attribute, max-age is not supported by IE
        }
        // CAUTION: Needed to parenthesize options.path and options.domain
        // in the following expressions, otherwise they evaluate to undefined
        // in the packed version for some reason...
        var path = options.path ? '; path=' + (options.path) : '';
        var domain = options.domain ? '; domain=' + (options.domain) : '';
        var secure = options.secure ? '; secure' : '';
        document.cookie = [name, '=', encodeURIComponent(value), expires, path, domain, secure].join('');
    } else { // only name given, get cookie
        var cookieValue = null;
        if (document.cookie && document.cookie != '') {
            var cookies = document.cookie.split(';');
            for (var i = 0; i < cookies.length; i++) {
                var cookie = jQuery.trim(cookies[i]);
                // Does this cookie string begin with the name we want?
                if (cookie.substring(0, name.length + 1) == (name + '=')) {
                    cookieValue = decodeURIComponent(cookie.substring(name.length + 1));
                    break;
                }
            }
        }
        return cookieValue;
    }
};

