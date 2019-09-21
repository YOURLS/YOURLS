// Tablesorter comes from own file now.

var yourls_defaultsort = 2; // default column to sort on (overwrite this inline in page)
var yourls_defaultorder = 1; // default order ('asc':0, 'desc':1) to sort on (overwrite this inline in page)

// Initialise the table to sort
$(document).ready(function(){
	if ($("#main_table").tablesorter && $("#main_table tr#nourl_found").css('display') == 'none') {
		var order = {'keyword':0, 'url':1, 'timestamp':2, 'ip':3, 'clicks':4};
		var order_by = {'asc':0, 'desc':1};
		var sort_by = order[query_string('sort_by')];
		var sort_order = order_by[query_string('sort_order')];
		if( sort_by == undefined ) {
			sort_by = yourls_defaultsort;
			sort_order = yourls_defaultorder;
		}
		
		$("#main_table").tablesorter({
			textExtraction: {
				1: function(node, table, cellIndex){return $(node).find("small a").text();} // Sort column "URL" by URL, not by whole cell content
			},
			sortList:[[ sort_by, sort_order ]], 
			headers: { 5: {sorter: false} }, // no sorter on column "Actions"
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