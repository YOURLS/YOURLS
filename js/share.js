$(document).ready(function(){
	$('#tweet_body').focus();

	$('#tweet_body').keypress(function(){
		setTimeout( function(){update_share()}, 50 ); // we're delaying, otherwise keypress() always triggers too fast before current key press actually inserts a letter?!! Go figure.
	});
})

function update_share() {
	var text = encodeURIComponent( $('#tweet_body').val() );
	var url = encodeURIComponent( $('#copylink').val() );
	var tw = 'http://twitter.com/intent/tweet?status='+text;
	var fb = 'http://www.facebook.com/share.php?u='+url ;
	$('#share_tw').attr('href', tw);
	$('#share_fb').attr('href', fb);
	
	var charcount = parseInt(140 - $('#tweet_body').val().length);
	$('#charcount')
		.toggleClass("negative", charcount < 0)
		.text( charcount );
}

function share(dest) {
	var url = $('#share_'+dest).attr('href');
	switch (dest) {
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

function init_clipboard() {
	$('#copylink').click(function(){
		$(this).select();
	})
	
	$('#copylink').zclip({
		path: zclipurl,
		copy: $('#copylink').val(),
		afterCopy:function(){
			html_pulse( '#copybox h2, #copybox h3', 'Copied!' );
		}
	});
};                     

