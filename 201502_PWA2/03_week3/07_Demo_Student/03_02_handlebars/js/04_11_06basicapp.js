
var rawTemplate = '<p>Hello {{name}}</p>'; // (step 1)
 
var compiledTemplate = Handlebars.compile(rawTemplate); // (step 2)
 
var html = compiledTemplate({ name : 'World' }); // (step 3)
 
var compiledTemplate = Handlebars.getTemplate('hello');
 
var html = compiledTemplate({ name : 'World' });



// html content will now be: <p>Hello World</p>



Handlebars.getTemplate = function(name) {
  if (Handlebars.templates === undefined || Handlebars.templates[name] === undefined) {
    $.ajax({
      url : 'templatesfolder/' + name + '.handlebars',
      success : function(data) {
        if (Handlebars.templates === undefined) {
          Handlebars.templates = {};
        }
        Handlebars.templates[name] = Handlebars.compile(data);
      },
      async : false
    });
  }
  return Handlebars.templates[name];
};