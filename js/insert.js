// Init some stuff
$(document).ready(function(){
	$('#add-url, #add-keyword').keypress(function(e){
		if (e.which == 13) {add_link();}
	});
	add_link_reset();
	$('#new_url_form').attr('action', 'javascript:add_link();');
	
	$('input.text').focus(function(){
		$(this).select();
	});
	
	// this one actually has little impact, the .hasClass('disabled') in each edit_link_display(), remove() etc... fires faster
	$(document).on( 'click', 'a.button', function() {
		if( $(this).hasClass('disabled') ) {
			return false;
		}
	});
	
	// When Searching, explode search text in pieces -- see split_search_text_before_search()
	$('#filter_form').submit( function(){
		split_search_text_before_search();
		return true;
	});
});

// Create new link and add to table
function add_link() {
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
				increment_counter();
				toggle_share_fill_boxes( data.url.url, data.shorturl, data.url.title );
			}

			add_link_reset();
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
	$('#shareboxes').slideDown( '300', function(){ init_clipboard(); } ); // clipboard re-initialized after slidedown to make sure the invisible Flash element is correctly positionned
	$('#tweet_body').keypress();
}

// Display the edition interface
function edit_link_display(id) {
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
function remove_link(id) {
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
				decrement_counter();
				decrease_total_clicks( id );
			} else {
				alert('something wrong happened while deleting :/');
			}
		}
	);
}

// Redirect to stat page
function go_stats(link) {
	window.location=link;
}

// Cancel edition of a link
function edit_link_hide(id) {
	$("#edit-" + id).fadeOut(200, function(){
		end_disable('#actions-'+id+' .button');
	});
}

// Save edition of a link
function edit_link_save(id) {
	add_loading("#edit-close-" + id);
	var newurl = encodeURI( $("#edit-url-" + id).val() );
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
					var display_link = '<a href="' + data.url.url + '" title="' + data.url.title + '">' + data.url.display_title + '</a><br/><small><a href="' + data.url.url + '">' + data.url.display_url + '</a></small>';
				} else {
					var display_link = '<a href="' + data.url.url + '" title="' + data.url.url + '">' + data.url.display_url + '</a>';
				}

				$("#url-" + id).html(display_link);
				$("#keyword-" + id).html('<a href="' + data.url.shorturl + '" title="' + data.url.shorturl + '">' + data.url.keyword + '</a>');
				$("#edit-" + id).fadeOut(200, function(){
					$('#main_table tbody').trigger("update");
				});
				$('#keyword_'+id).val( newkeyword );
				$('#statlink-'+id).attr( 'href', data.url.shorturl+'+' );
			}
			feedback(data.message, data.status);
			end_loading("#edit-close-" + id);
			end_disable("#edit-close-" + id);
			if(data.status == 'success') {
				end_disable("#actions-" + id + ' .button');
			}
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
function add_link_reset() {
	$('#add-url').val('').focus();
	$('#add-keyword').val('');
}

// Increment URL counters
function increment_counter() {
	$('.increment').each(function(){
		$(this).html( parseInt($(this).html()) + 1);
	});
}

// Decrement URL counters
function decrement_counter() {
	$('.increment').each(function(){
		$(this).html( parseInt($(this).html()) - 1 );
	});
}

// Decrease number of total clicks
function decrease_total_clicks( id ) {
	var total_clicks = $("#overall_tracking strong:nth-child(2)");
	total_clicks.html( parseInt( total_clicks.html() ) - parseInt( $('#clicks-' + id).html() ) );
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

// When "Search" is clicked, split search text to beat servers which don't like query string with "http://"
// See https://github.com/YOURLS/YOURLS/issues/1576
function split_search_text_before_search() {
	// Add 2 hidden fields and populate them with parts of search text
	$("<input type='hidden' name='search_protocol' />").appendTo('#filter_form');
	$("<input type='hidden' name='search_slashes' />").appendTo('#filter_form');
	var search = get_protocol_slashes_and_rest( $('#filter_form input[name=search]').val() );
	$('#filter_form input[name=search]').val( search.rest );
	$('#filter_form input[name=search_protocol]').val( search.protocol );
	$('#filter_form input[name=search_slashes]').val( search.slashes );
}

