window.addEvent('domready', function() {
    //alert('The DOM is ready!');
    //console.log("mootools app loaded");

    /* get Elements from the DOM */
    //var myForm = document.id('myForm');
    var myForm = $('myForm');

    /* test to see if we grabbed the right thing if anything! */
    //myForm.setStyle("border", "1px solid black");

   
    /* --------- CREATING VARIABLES --------- */


    /* A critter is an object with animal and noise properties */
    function Critter(animal, noise){
    	this.animal = animal;
    	this.noise = noise;
    };

    var pig = new Critter();
    
    /* grab the values from the DOM */
	pig.animal = $('animal').getProperty('value');
	pig.noise = $('noise').getProperty('value');
	//console.log(pig);

    /* animalArray will hold all of my critters */
    var animalArray = [];
    animalArray.push(pig);
    //console.log(animalArray);


    /* --------- LOCAL STORAGE --------- */
    /* Need a plugin to do!              */
    /* already incorporates JSON         */

	var st= new LocalStorage(); 
    st.set('mooStorage',animalArray); // pushes animalArray to local storage "mooStorage"
    console.log(st.get('mooStorage')); // pulls animalArray from local storage "mooStorage"

    
    /* --------- FORM SUBMIT --------- */
    /* if we have a button of type 'submit', can addEvent on submit */
    myForm.addEvents({
	    submit: function(e){
	        alert('form was submitted!');

	        var critter = {}; // empty placeholder critter

	        /* grab the updated values */
	        critter.animal = $('animal').getProperty('value');
	        critter.noise = $('noise').getProperty('value');

	        animalArray.push(critter);
	        st.set('mooStorage',animalArray);
	        console.log(st.get('mooStorage'));

	        e.stop(); // prevent default event
	        
	    }
	}); // closes myForm.addEvents

    
    /* --------- INSERT DOM ELEMENTS --------- */
    /* per the documentation this should create html code... */
    var myFirstElement  = new Element('div', {id: 'myFirstElement'});
	var mySecondElement = new Element('div', {id: 'mySecondElement'});
	var myThirdElement  = new Element('div', {id: 'myThirdElement'});






    /* --------- GET CRITTERS --------- */

    $('getCritters').addEvent('click', function(e){
    	//alert("get critters was clicked!");

    	animalArray = st.get('mooStorage');

    	for(var i=0; i<animalArray.length; i++){
    		console.log(i);

    		var newElement = new Element('div', {'class':'critterClass', 'text': 'hello' });
    		
    		/* console told me this wasn't a function? */
    		//$('critter_box').appendHTML(newElement);


    	}

    	e.stop(); // prevent default event


    });




}) // closes window.addEvent