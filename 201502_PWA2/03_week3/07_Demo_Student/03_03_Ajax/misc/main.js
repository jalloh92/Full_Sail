//$(function(){
//	$.getJSON( "main.json", function( data ) {
//var items = [];
//$.each( data, function( key, val ) {
//items.push( "<li id='" + key + "'>" + val + "</li>" );
//});
//$( "<ul/>", {
//"class": "my-new-list",
//html: items.join( "" )
//}).appendTo( "body" );
//});
//});

$(Document).ready(Function(){
	var twitter_api = 'http://search.twitter.com/search.json';
	var twitter_user = 'lupomontero';
	
				  
				  $.ajaxSetup({ cache:true});

$.getJSON(
twitter_api_url + '?callback=?&rpp=5&q=from:' + twitter_user,
	Function(data){
	$.each(data.results, function(i, tweet){
	)
	}
)};
				  