$(document).ready(function(){
	$('#tweet_body').focus();

	$('#tweet_body').keyup(function(event){
		var text = escape( $('#tweet_body').val() );
		var tw = 'http://twitter.com/home?status='+text;
		var ff = 'http://friendfeed.com/share/bookmarklet/frame#title='+encodeURI( $('#tweet_body').val() ) ;
		$('#share_tw').attr('href', tw);
		$('#share_ff').attr('href', ff);
		
		var charcount = parseInt(140 - $('#tweet_body').val().length);
		$('#charcount')
			.toggleClass("negative", charcount < 0)
			.text( charcount );
	});

	$('#copylink').click(function(){
		$(this).select();
	});	
	
})

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

