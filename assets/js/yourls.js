/*
 * General stuff for YOURLS
 */

$(document).ready(function() {
	
	init_clipboard();

	$('details').details();
	
	console.log( 'yeeeh' );
	
})

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
				$(this).attr( 'data-original-title', title ).attr( 'data-temp-title', '' );
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