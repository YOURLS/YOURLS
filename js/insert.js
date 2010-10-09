// Init some stuff
$(document).ready(function(){
	$('#add-url, #add-keyword').keypress(function(e){
		if (e.which == 13) {add();}
	});
	reset_url();
	$('#new_url_form').attr('action', 'javascript:add();');
	
	$('input.text').focus(function(){
		$(this).select();
	});
	
	// this one actually has little impact, the .hasClass('disabled') in each edit(), remove() etc... fires faster
	$('a.button').live('click', function() {
		if( $(this).hasClass('disabled') ) {
			return false;
		}
	});
});

// Create new link and add to table
function add() {
	if( $('#add-button').hasClass('disabled') ) {
		return false;
	}
	var newurl = $("#add-url").val();
	var nonce = $("#nonce-add").val();
	if ( !newurl || newurl == 'http://' || newurl == 'https://' ) {
		return;
	}
	var keyword = $("#add-keyword").val();
	add_loading("#add-button");
	$.getJSON(
		ajaxurl,
		{action:'add', url: newurl, keyword: keyword, nonce: nonce},
		function(data){
			if(data.status == 'success') {
				$('#main_table tbody').prepend( data.html ).trigger("update");
				$('#nourl_found').css('display', 'none');
				zebra_table();
				increment();
			}

			reset_url();
			toggle_share_fill_boxes( data.url.url, data.shorturl, data.url.title );

			end_loading("#add-button");
			end_disable("#add-button");

			feedback(data.message, data.status);
		}
	);
}

function toggle_share_fill_boxes( url, shorturl, title ) {
	$('#copylink').val( shorturl );
	$('#titlelink').val( title );
	$('#origlink').attr( 'href', url ).html( url );
	$('#statlink').attr( 'href', shorturl+'+' ).html( shorturl+'+' );
	var tweet = ( title ? title + ' ' + shorturl : shorturl );
	$('#tweet_body').val( tweet ).keypress();
	$('#shareboxes').slideDown();
	init_clipboard();
	$('#tweet_body').keypress();
}

// Display the edition interface
function edit(id) {
	if( $('#edit-button-'+id).hasClass('disabled') ) {
		return false;
	}
	add_loading('#actions-'+id+' .button');
	var keyword = $('#keyword_'+id).val();
	var nonce = get_var_from_query( $('#edit-button-'+id).attr('href'), 'nonce' );
	$.getJSON(
		ajaxurl,
		{ action: "edit_display", keyword: keyword, nonce: nonce, id: id },
		function(data){
			$("#id-" + id).after( data.html );
			$("#edit-url-"+ id).focus();
			end_loading('#actions-'+id+' .button');
		}
	);
}

// Delete a link
function remove(id) {
	if( $('#delete-button-'+id).hasClass('disabled') ) {
		return false;
	}
	if (!confirm('Really delete?')) {
		return;
	}
	var keyword = $('#keyword_'+id).val();
	var nonce = get_var_from_query( $('#delete-button-'+id).attr('href'), 'nonce' );
	$.getJSON(
		ajaxurl,
		{ action: "delete", keyword: keyword, nonce: nonce, id: id },
		function(data){
			if (data.success == 1) {
				$("#id-" + id).fadeOut(function(){
					$(this).remove();
					if( $('#main_table tbody tr').length  == 1 ) {
						$('#nourl_found').css('display', '');
					}

					zebra_table();
				});
				decrement();
			} else {
				alert('something wrong happened while deleting :/');
			}
		}
	);
}

// Redirect to stat page
function stats(link) {
	window.location=link;
}

// Cancel edition of a link
function hide_edit(id) {
	$("#edit-" + id).fadeOut(200, function(){
		end_disable('#actions-'+id+' .button');
	});
}

// Save edition of a link
function edit_save(id) {
	add_loading("#edit-close-" + id);
	var newurl = $("#edit-url-" + id).val();
	var newkeyword = $("#edit-keyword-" + id).val();
	var title = $("#edit-title-" + id).val();
	var keyword = $('#old_keyword_'+id).val();
	var nonce = $('#nonce_'+id).val();
	var www = $('#yourls-site').val();
	$.getJSON(
		ajaxurl,
		{action:'edit_save', url: newurl, id: id, keyword: keyword, newkeyword: newkeyword, title: title, nonce: nonce },
		function(data){
			if(data.status == 'success') {
			
				if( data.url.title != '' ) {
					var display_link = '<a href="' + data.url.url + '" title="' + data.url.url + '">' + data.url.display_title + '</a><br/><small><a href="' + data.url.url + '">' + data.url.display_url + '</a></small>';
				} else {
					var display_link = '<a href="' + data.url.url + '" title="' + data.url.url + '">' + data.url.display_url + '</a>';
				}

				$("#url-" + id).html(display_link);
				$("#keyword-" + id).html('<a href="' + data.url.shorturl + '" title="' + data.url.shorturl + '">' + data.url.keyword + '</a>');
				$("#timestamp-" + id).html(data.url.date);
				$("#edit-" + id).fadeOut(200, function(){
					$('#main_table tbody').trigger("update");
				});
				$('#keyword_'+id).val( newkeyword );
				$('#statlink-'+id).attr( 'href', data.url.shorturl+'+' );
			}
			feedback(data.message, data.status);
			end_loading("#edit-close-" + id);
			end_disable("#actions-" + id + ' .button');
		}
	);
}

// Prettify table with odd & even rows
function zebra_table() {
	$("#main_table tbody tr:even").removeClass('odd').addClass('even');
	$("#main_table tbody tr:odd").removeClass('even').addClass('odd');
	$('#main_table tbody').trigger("update");
}

// Ready to add another URL
function reset_url() {
	$('#add-url').val('http://').focus();
	$('#add-keyword').val('');
}

// Increment URL counters
function increment() {
	$('.increment').each(function(){
		$(this).html( parseInt($(this).html()) + 1);
	});
}

// Decrement URL counters
function decrement() {
	$('.increment').each(function(){
		$(this).html( parseInt($(this).html()) - 1 );
	});
}

// Toggle Share box
function toggle_share(id) {
	if( $('#share-button-'+id).hasClass('disabled') ) {
		return false;
	}
	var link = $('#url-'+id+' a:first');
	var longurl = link.attr('href');
	var title = link.attr('title');
	var shorturl = $('#keyword-'+id+' a:first').attr('href');
	
	toggle_share_fill_boxes( longurl, shorturl, title );
}
