// Name:  Kelly Rhodes
// Date:  October 23, 2014
// Course:  Programming Web Applications I, on-campus, section 00
// Assignment:  Final Exam

//------------------------------------INSTRUCTIONS----------------------------------------------------------------------
//
//Overview:
//Display weather information in the HTML from the JSON object provided.
//
//  •	Create and instantiate a Weather constructor object
//  •	ex: var weather = new Weather()
//  •	The Weather object needs at least 7 properties with values provided in the JSON object. Do not hard code this.
//      The code should work even if the values change in the JSON. You must include the following as part of the 7:
//      •	City and state displayed on one line in the HTML
//      •	2 pieces of data from the forecast property (from either todays, tomorrows, or following day).
//      •	The remaining 3 is up to you
//  •	Once the Weather object is completed, populate the HTML using QuerySelector and innerHTML from the properties
//      in the Weather Object NOT the JSON. The provided HTML file will contain 5 <p> tags with ids. You must create
//      and additional  <p> tag dynamically. This will give you a total of 6 <p> tags displaying the 7 pieces of data.
//      Remember, one of the <p> tags will contain the location which is City and State.
//  •	Make sure all data have labels to identify what it is.
//      Examples:
//          Location: Orlando, FL
//          Today’s Hi – 80°  (FYI, the degree symbol is Shift-Option 8)
//          Humidity 45°
//          Tomorrow’s High: 82°

//Submit zipped file to FSO, final exam activity. LastName_final.  Also, please put your name in the main.js file in comments.

console.log("JS loaded");

//----------------------------------------------------------------------------------------------------------------------

(function(){

    // --------------------CREATE & INSTANTIATE WEATHER CONSTRUCTOR OBJECT----------------------------------------------

    function Weather(){ // create Weather construction object
        this.location = data.location.city + ", " + data.location.region; // needs to be city & state
        this.day = data.results.forecast[0].date; // today, tomorrow or the following day
        this.forecast =  "High -- " + data.results.forecast[0].high + "°" + data.results.units.temperature + " ; Low -- " + data.results.forecast[0].low + "°" + data.results.units.temperature + " ; Condition -- "+ data.results.forecast[0].text; // forecast for day

        this.currentTemp = data.results.condition.temp + "°" + data.results.units.temperature; // current temp
        this.sunrise = data.results.astronomy.sunrise; // time of sunrise
        this.sunset = data.results.astronomy.sunset; // time of sunset
    }; // close Weather constructor

    var weather = new Weather();

    // --------------------POPULATE HTML--------------------------------------------------------------------------------

    // create an element (need two lines of code):
    var newElement = document.createElement("weather"); // to create the element
    document.body.appendChild(newElement); // to place the element

    var dom = { // variable for DOM properties

        wd1:      document.querySelector("#wd1"), // weather data 1
        wd2:      document.querySelector("#wd2"), // weather data 2
        wd3:      document.querySelector("#wd3"), // weather data 3
        wd4:      document.querySelector("#wd4"), // weather data 4
        wd5:      document.querySelector("#wd5"), // weather data 5
        wd6:      newElement
    };


    function displayData(){

    dom.wd1.innerHTML = ("City & State:  " + weather.location);
    dom.wd2.innerHTML = ("Forecast Date:  " + weather.day);
    dom.wd3.innerHTML = ("Forecast:  " + weather.forecast);
    dom.wd4.innerHTML = ("Current Temp:  " + weather.currentTemp);
    dom.wd5.innerHTML = ("Sunrise:  " + weather.sunrise);
    dom.wd6.innerHTML = ("Sunset:  " + weather.sunset);

    }

    displayData();

})();
