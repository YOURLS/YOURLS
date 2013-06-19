/*
 * General stuff for YOURLS
 */

$(document).ready(function() {
	// General behavior
	init_clipboard();
	$('details').details();
	$( 'a.button' ).on( 'click', function() {
		if( $(this).hasClass('disabled') ) {
			return false;
		}
	});

	// On the main page
	add_link_reset();
	$('.add-url').focus();
	$( 'button.add-button' ).on( 'click', function() {
		add_link();
	});
	
	// When there's a share box
	$('#tweet_body:visible').focus();
	$('#tweet_body').keypress(function(){
		setTimeout( function(){update_share()}, 50 ); // we're delaying, otherwise keypress() always triggers too fast before current key press actually inserts a letter?!! Go figure.
	});	
	
})

// Create new link and add to table
function add_link() {
	if( $('.add-button').hasClass( 'disabled' ) ) {
		return false;
	}
	var newurl  = $(".add-url").val();
	var nonce   = $("#nonce-add").val();
	var keyword = $(".add-keyword").val();
	if ( !newurl ) {
		return false;
	}
	
	add_loading( ".add-button" );
	
	$.getJSON(
		ajaxurl,
		{ action:'add', url: newurl, keyword: keyword, nonce: nonce },
		function( data ){
			if( data.status == 'success' ) {
				$('.admin-main-table tbody').prepend( data.html );
				$('.notfound').css('display', 'none');
				increment_counter();
				toggle_share_fill_boxes( data.url.url, data.shorturl, data.url.title );
			}

			add_link_reset();
			end_loading( ".add-button" );
			//feedback(data.message, data.status);
		}
	);
}

// Delete a link
function remove_link( id ) {
	// TODO: localize this
	if ( !confirm( 'Really delete?' ) ) {
		return;
	}
	var keyword = $( '#keyword_'+id ).val();
	var nonce = get_var_from_query( $( '#delete-button-'+id ).attr( 'href' ), 'nonce' );
	
	$.getJSON(
		ajaxurl,
		{ action: "delete", keyword: keyword, nonce: nonce, id: id },
		function( data ){
			if ( data.success == 1 ) {
				$( "#id-" + id ).fadeOut(function(){
					$(this).remove();
					if( $('#main_table tbody tr').length  == 1 ) {
						$('#nourl_found').css('display', '');
					}
				});
				decrement_counter();
			} else {
				// TODO: localize this
				alert( 'Could not delete link' );
			}
		}
	);
}

// Toggle Share box display
function toggle_share( id ) {
	var longurl  = $( '#longurl-'+id ).val();
	var title    = $( '#title-'+id ).val();
	var shorturl = $( '#shorturl-'+id ).val();
	toggle_share_fill_boxes( longurl, shorturl, title );
}

// Populate the share box with given data
function toggle_share_fill_boxes( url, shorturl, title ) {
	$('#copylink').val( shorturl );
	$('#titlelink').val( title );
	$('#origlink').attr( 'href', url ).html( url );
	$('#statlink').attr( 'href', shorturl+'+' ).html( shorturl+'+' );
	var tweet = ( title ? title + ' ' + shorturl : shorturl );
	$('#tweet_body').val( tweet ).keypress();
	$('#shareboxes').slideDown( '300' );
	$('#tweet_body').keypress();
}

// Live update the share box (eg after a keypress)
function update_share() {
	var text = encodeURIComponent( $('#tweet_body').val() );
	var url = encodeURIComponent( $('#copylink').val() );
	var tw = 'http://twitter.com/intent/tweet?status='+text;
	var ff = 'http://friendfeed.com/share/bookmarklet/frame#title='+text ;
	var fb = 'http://www.facebook.com/share.php?u='+url ;
	$('#share_tw').attr('href', tw);
	$('#share_ff').attr('href', ff);
	$('#share_fb').attr('href', fb);
	
	var charcount = parseInt(140 - $('#tweet_body').val().length);
	$('#charcount')
		.toggleClass("negative", charcount < 0)
		.text( charcount );
}

// Mark an element as "loading" with a spinning icon
function add_loading( elem ) {
	add_disable( elem );
	$( elem ).attr( 'data-html', $( elem ).html() )
			 .html( '' )
			 .append( '<i class="spin icon-rotate-right"></i>' );
}

// End marking an element as "loading" (remove spinning icon and restore content)
function end_loading( elem ) {
	end_disable( elem );
	$( elem ).html( $( elem ).attr( 'data-html' ) )
			 .removeAttr( 'data-html' );
}

// Mark an element as "disabled" via class name
function add_disable( elem ) {
	$( elem ).addClass( 'disabled' );
}

// End marking an element as "disabled" via class name
function end_disable( elem ) {
	$( elem ).removeClass( 'disabled' );
}

// Reset the Add URL form
function add_link_reset() {
	$('.add-keyword').val('');
	$('.add-url').val('').focus();
}

// Increment URL counters
function increment_counter() {
	$( '.increment' ).each(function(){
		$( this ).html( parseInt( $(this).html() ) + 1 );
	});
}

// Decrement URL counters
function decrement_counter() {
	$( '.increment' ).each(function(){
		$( this ).html( parseInt( $(this).html() ) - 1 );
	});
}

// Init the ZeroClipboard buttons & tooltips
function init_clipboard() {
	if( typeof( ZeroClipboard ) == 'undefined' )
		return false;

	if( ZeroClipboard.detectFlashSupport() ) {
		ZeroClipboard.setDefaults( { moviePath: moviepath, hoverClass: "btn-clipboard-hover", activeClass: "btn-clipboard-active" } );
		var zclip = new ZeroClipboard( $( ".btn-clipboard" ) );
		zclip.on( 'wrongflash', function ( client, args ) {
			alert( 'Your flash is too old ' + args.flashVersion );
			// TODO: replace this with the notify JS stuff.
		} );
		zclip.on( 'mouseover', function () { $(this).tooltip('show'); } );
		zclip.on( 'mouseout', function () {
			var title = null;
			if( title = $(this).attr( 'data-temp-title' ) ) {
				$(this).attr( 'data-original-title', title ).removeAttr( 'data-temp-title' );
			}
			$(this).tooltip('hide');
		} );
		zclip.on( 'complete', function() {
			if( !$(this).attr( 'data-temp-title' ) ) {
				var hint = $(this).attr( 'data-copied-hint' );
				$(this).attr( 'data-temp-title', $(this).attr( 'data-original-title' ) );
				$(this).attr( 'data-original-title', hint );
				$(this).tooltip( 'show' );
			}
		} );
	} else {
		$( ".btn-clipboard" ).hide();
	}
}

// Get the var=xxx from a query string
function get_var_from_query( url, varname, default_val ) {
	if( varname == undefined ) {
		varname = 'nonce';
	}
	if( default_val == undefined ) {
		default_val = '';
	}
	
	// Split the url on '?' and get only the params (which is element 1)
	url = url.split('?')[1];
	// Now split those params on '&' so we can get each one individually (Ex. param_var=param_value)
	url = url.split('&');
	// Now we have to find the varname in that array using methods that IE likes (Curse you IE!!!)
	var i=0;
	for( i=0; i<url.length; i++ ){
		// So split the first param elemment on '=' and check the param_var to see if it matches varname (element 0)
		if( url[i].split('=')[0] == varname ){
			// If it matches we want to return the param_value
			return url[i].split('=')[1];
		}
	}
	
	// If we didn't find anything then we just return the default_val
	return default_val;	
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

