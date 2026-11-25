// Tablesorter comes from own file now.

var yourls_defaultsort = 3; // default column to sort on (overwrite this inline in page)
var yourls_defaultorder = 1; // default order ('asc':0, 'desc':1) to sort on (overwrite this inline in page)

// Initialise the table to sort
$(document).ready(function(){
	if ($("#main_table").tablesorter && $("#main_table tr#nourl_found").css('display') == 'none') {
		var order = {'keyword':0, 'url':2, 'timestamp':3, 'ip':4, 'clicks':5};
		var order_by = {'asc':0, 'desc':1};
		var sort_by = order[query_string('sort_by')];
		var sort_order = order_by[query_string('sort_order')];
		if( sort_by == undefined ) {
			sort_by = yourls_defaultsort;
			sort_order = yourls_defaultorder;
		}
		
		$("#main_table").tablesorter({
			textExtraction: {
				2: function(node, table, cellIndex){return $(node).find("small a").text();},   // Sort column "URL" by URL, not by whole cell content
				5: function(node, table, cellIndex){return $(node).text().replace(/\D/g, '');} // Compute digits in the clicks column without any separator (1,200 -> 1200)
			},
			sortList:[[ sort_by, sort_order ]], 
			headers: { 1: {sorter: false}, 6: {sorter: false} }, // no sorter on columns "QR code" and "Actions"
			widgets: ['zebra'], // prettify, see tr.normal-row and tr.alt-row in tablesorter.css
			widgetOptions : { zebra : [ "normal-row", "alt-row" ] }
		});
	}
});

// Get query string
function query_string( key ) {
	default_="";
	key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
	var regex = new RegExp("[\\?&]"+key+"=([^&#]*)");
	var qs = regex.exec(window.location.href);
	if(qs == null)
		return yourls_defaultsort;
	else
		return qs[1];
}
