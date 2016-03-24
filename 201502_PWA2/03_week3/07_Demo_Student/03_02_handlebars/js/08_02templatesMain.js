  var source   = $("#some-template").html();
  var template = Handlebars.compile(source);
  var data = { 
  	
    };
  $("#container").html(template(data));

