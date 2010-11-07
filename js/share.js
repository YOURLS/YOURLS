$(document).ready(function(){
	$('#tweet_body').focus();

	$('#tweet_body').keypress(function(){
		setTimeout( function(){update_share()}, 50 ); // we're delaying, otherwise keypress() always triggers too fast before current key press actually inserts a letter?!! Go figure.
	});
	
	$('#copylink').click(function(){
		$(this).select();
	});	
	
	init_clipboard();
})

function update_share() {
	var text = encodeURI( $('#tweet_body').val() );
	var url = encodeURI( $('#copylink').val() );
	var tw = 'http://twitter.com/home?status='+text;
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

function share(dest) {
	var url = $('#share_'+dest).attr('href');
	switch (dest) {
	case 'ff':
		//$('body').append('<script type="text/javascript" src="http://friendfeed.com/share/bookmarklet/javascript"></script>');
		window.open(url, 'ff','toolbar=no,width=500,height=350');
		break;
	case 'fb':
		//var url = $('#share_fb').attr('href');
		window.open( url, 'fb','toolbar=no,width=1000,height=550');
		break;
	case 'tw':
		//var url = $('#share_tw').attr('href');
		window.open(url, 'tw','toolbar=no,width=800,height=550');
		break;
	}
	return false;
}

var clip;
function init_clipboard() {
	// Check we have the proper copy element
	if( !$('#copylink').length )
		return;
		
	// Create a new clipboard client
	clip = new ZeroClipboard.Client();
	
	// Glue the clipboard client to the last td in each row
	clip.glue( 'copylink' );

	// Grab the text from the parent row of the icon
	var txt = $('#copylink').val();
	clip.setText(txt);

	// Add a complete event to let the user know the text was copied
	clip.addEventListener('complete', function(client, text) {
		html_pulse( '#copybox h2', 'Copied!' );
	});
	
	// Custom animation on hover
	$('#copylink').css({'backgroundPosition':'130% 50%'});
	clip.addEventListener('onMouseOver', function(client, text) {
		$('#copylink').select().animate({'backgroundPosition':'100% 50%'}, 300);
	});
	clip.addEventListener('onMouseOut', function(client, text) {
		$('#copylink').blur().animate({'backgroundPosition':'130% 50%'}, 300);
	});
	
	// Force flash clip size (IE fix)
	$('#'+clip.movieId).css('height', '35px');
};                     

