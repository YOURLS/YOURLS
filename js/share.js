$(document).ready(function(){
	$('#share_body').focus();

	$('#share_body').keypress(function(){
		var charcount = parseInt(280 - $('#share_body').val().length);
		$('#charcount')
			.toggleClass("negative", charcount < 0)
			.text( charcount );
	});
})

/** Builds new url from template and current text
 *  then opens a new window (no options) or popup (with options)
 *	src is the anchor containing the onClick
 */
function share(src, options) {
	var new_url = $(src).data('shareurl');
	
	new_url = new_url.replace('#share#', encodeURI($('#share_body').val())); // replace keyword with current text
	$(src).attr('href', new_url);
	
	window.open(new_url, '_blank', options);
}

function init_clipboard() {
    var clipboard = new Clipboard('#copylink', {
        text: function (trigger) {
            return $(trigger).val();
        }
    });
    
    clipboard.on('success', function () {
        $('#copylink').select();
        html_pulse('#copybox h2, #copybox h3', 'Copied!');
    });
};