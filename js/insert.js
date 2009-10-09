// Init some stuff
$(document).ready(function(){
	$('#add-url, #add-keyword').keyup(function(e){ if (e.keyCode == 13) {add();} } );
	reset_url();
	$('#new_url_form').attr('action', 'javascript:add();');
	
	$('input.text').click(function(){
		$(this).select();
	});	
	
	
	if ($("#tblUrl").tablesorter && $("#tblUrl tr.nourl_found").length != 1) {
		var order = {'id':0, 'url':1, 'timestamp':2, 'ip':3, 'clicks':4};
		var order_by = {'asc':0, 'desc':1};
		var s_by = order[query_string('s_by')];
		var s_order = order_by[query_string('s_order')];
		if( s_by == undefined ) {
			s_by = 2;
			s_order = 1;
		}
		
		$("#tblUrl").tablesorter({
			sortList:[[ s_by, s_order ]], // Sort on column #3 (numbering starts at 0)
			headers: { 5: {sorter: false} }, // no sorter on column #6
			widgets: ['zebra'] // prettify
		});
	}
	

});

// Create new link and add to table
function add() {
	var newurl = $("#add-url").val();
	if ( !newurl || newurl == 'http://' || newurl == 'https://' ) {
		alert('no URL ?');
		return;
	}
	var keyword = $("#add-keyword").val();
	add_loading("#add-button");
	$.getJSON(
		"index_ajax.php",
		{mode:'add', url: newurl, keyword: keyword},
		function(data){
			if(data.status == 'success') {
				$('#tblUrl tbody').prepend( data.html ).trigger("update");
				$('.nourl_found').remove();
				zebra_table();
				reset_url();
				increment();
			}
			feedback(data.message, data.status);
			end_loading("#add-button");
			end_disable("#add-button");
		}
	);
}

// Display the edition interface
function edit(id) {
	add_loading('#actions-'+id+' .button');
	var keyword = $('#keyword_'+id).val();
	$.getJSON(
		"index_ajax.php",
		{ mode: "edit_display", keyword: keyword },
		function(data){
			$("#id-" + id).after( data.html );
			$("#edit-url-"+ id).focus();
			end_loading('#actions-'+id+' .button');
		}
	);
}

// Delete a link
function remove(id) {
	if (!confirm('Really delete?')) {
		return;
	}
	var keyword = $('#keyword_'+id).val();
	$.getJSON(
		"index_ajax.php",
		{ mode: "delete", keyword: keyword },
		function(data){
			if (data.success == 1) {
				$("#id-" + id).fadeOut(function(){$(this).remove();zebra_table();});
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
	var keyword = $('#old_keyword_'+id).val();
	var www = $('#yourls-site').val();
	$.getJSON(
		"index_ajax.php",
		{mode:'edit_save', url: newurl, keyword: keyword, newkeyword: newkeyword },
		function(data){
			if(data.status == 'success') {
				$("#url-" + id).html('<a href="' + data.url.url + '" title="' + data.url.url + '">' + data.url.display_url + '</a>');
				$("#keyword-" + id).html('<a href="' + data.url.shorturl + '" title="' + data.url.shorturl + '">' + data.url.keyword + '</a>');
				$("#timestamp-" + id).html(data.url.date);
				$("#edit-" + id).fadeOut(200, function(){
					$('#tblUrl tbody').trigger("update");
				});
				$('#keyword_'+id).val( newkeyword );
				$('#statlink-'+id).attr( 'href', data.url.shorturl+'+' );
			}
			feedback(data.message, data.status);
			end_disable("#edit-close-" + id);
			end_loading("#edit-close-" + id);
			end_disable("#edit-button-" + id);
			end_disable("#delete-button-" + id);
		}
	);
}

// Unused for now since HTTP Auth sucks donkeys.
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

// Prettify table with odd & even rows
function zebra_table() {
	$("#tblUrl tbody tr:even").removeClass('odd').addClass('even');
	$("#tblUrl tbody tr:odd").removeClass('even').addClass('odd');
	$('#tblUrl tbody').trigger("update");
}

// Update feedback message
function feedback(msg, type) {
	var span = (type == 'fail') ? '<span class="fail">' : '<span>' ;
	var delay = (type == 'fail') ? 2500 : 1000 ;
	$('#feedback').html(span + msg + '</span>').fadeIn(200,function(){
		$(this).animate({'opacity':1}, delay, function() {
			$(this).fadeOut(800);
		})
	});
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

// Get query string
function query_string( key ) {
	default_="";
	key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
	var qs = regex.exec(window.location.href);
	if(qs == null)
		return default_;
	else
		return qs[1];
}