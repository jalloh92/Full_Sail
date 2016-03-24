  var source   = $("#besttemplateever").html();
  var template = Handlebars.compile(source);
  var data = { nav: [
    {name: "index.html"},
    {name: "registration.html"},
    {name: "dashboard.html"},
  ]};

  $("#container").html(template(data));

