
$(document).ready(function($){

<!-- need to look into how to concatenate url strings.  How to get city & state from field (ziptastic) and add to request -->	

//alert("document loaded!");	

/* set current time & date */
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

var d = new Date(); /* get today's date & time */
var day = d.getDate() /* get the numerical representation of the day of the month */
var dayOfWeek = days[d.getDay()]; /* get the name of the day of the week by passing into array days[] */
var month = d.getMonth() + 1; /* get the numerical representation of the month (add one since it's zero based) */
var monthOfYear = months[d.getMonth()]; /* get the name of the month of the year by passing into array months[] */
var year = d.getFullYear(); /* get the numerical representation of the year */

$("#current_head").append("<p>" + dayOfWeek + ", " + monthOfYear + " " + day + ", " + year + "</p>");
 


 /* ------------------------------------------------------ */
 /* Request Current Conditon Data */
	$.ajax({ 
		
		url : "http://api.wunderground.com/api/fce94f5d57caef21/geolookup/conditions/q/FL/Orlando.json",
		dataType : "jsonp", 
          success : function(parsed_json) { 
              
              var icon = parsed_json['current_observation']['icon'];
              var weather = parsed_json['current_observation']['weather'];
              var temp_f = parsed_json['current_observation']['temp_f']; 
              var feelslike_f = parsed_json['current_observation']['feelslike_f']; 
              var humidity = parsed_json['current_observation']['relative_humidity'];
              var wind_dir = parsed_json['current_observation']['wind_dir'];
              var wind_mph = parsed_json['current_observation']['wind_mph'];

              $("#current_left_1").append("<img src='http://icons.wxug.com/i/c/k/" + icon + ".gif' alt='weather icon'/>");
              // $("#current_left_1").append("<img src=" + icon_url + "alt='weather icon'/>");
              $("#current_left_1").append("<p>" + weather + "</p>");
              $("#current_left_1").append("<p>Wind:<br>" + wind_dir + " " + wind_mph + " MPH</p>");

              $("#current_left_2").append("<h2>" + temp_f + "ºF</h2>");
              $("#current_left_2").append("<p>Feels like " + feelslike_f + "ºF</p>");
              $("#current_left_2").append("<p>Humidity:<br>" + humidity + "</p>");


          } // Closes current conditions lookup

    }); // Closes ajax call

    /* ------------------------------------------------------ */  
    /* (1) Request 3 Day Forecast */
        
    $.ajax({ 

        url : "http://api.wunderground.com/api/fce94f5d57caef21/forecast/q/FL/Orlando.json", 
        dataType : "jsonp", 
        success : function(parsed_json) { 

       	var day;
       	var icon;
       	var conditions;
        var low;
      	var high;
      	var array3Day = parsed_json['forecast']['simpleforecast']['forecastday'];


      	for(var i=1; i<array3Day.length; i++){ /* starting with i=1 to get conditions starting for the following day */
     		 day = (array3Day[i]['date']['weekday_short']);
     		 icon = (array3Day[i]['icon']);
     		 conditions = (array3Day[i]['conditions']);
      	 low = (array3Day[i]['low']['fahrenheit']);
      	 high = (array3Day[i]['high']['fahrenheit']);

      		$("#f" + i).append("<p>" + day + "</p>");
      		$("#f" + i).append("<img src='http://icons.wxug.com/i/c/k/" + icon + ".gif' alt='weather icon'/>");
      		$("#f" + i).append("<p>" + conditions + "</p>");
      		$("#f" + i).append("<p>Low: " + low + "ºF</p>");
      		$("#f" + i).append("<p>High: " + high + "ºF</p>");
      	}

      } // Closes 3 Day Forecast lookup

    }); // Closes ajax call

    /* ------------------------------------------------------ */ 
	/* (2) Request 10 Day Data */

	$.ajax({ 	
		url : "http://api.wunderground.com/api/fce94f5d57caef21/forecast10day/q/FL/Orlando.json",
		dataType : "jsonp", 
          success : function(parsed_json) { 
            
            var day;
         	  var icon;
         	  //var conditions;
          	var low;
          	var high;
          	var array10Day = parsed_json['forecast']['simpleforecast']['forecastday'];


          	for(var i=0; i<array10Day.length; i++){ 
         		 day = (array10Day[i]['date']['weekday_short']);
         		 icon = (array10Day[i]['icon']);
         		 //conditions = (array10Day[i]['conditions']);
          	 low = (array10Day[i]['low']['fahrenheit']);
          	 high = (array10Day[i]['high']['fahrenheit']);

          	 $("#t" + i).append("<p>" + day + "</p>");
          	 $("#t" + i).append("<img src='http://icons.wxug.com/i/c/k/" + icon + ".gif' alt='weather icon'/>");
          	 //$("#t" + i).append("<p>" + conditions + "</p>");
          	 $("#t" + i).append("<p>Low: " + low + "ºF</p>");
          	 $("#t" + i).append("<p>High: " + high + "ºF</p>");
          	}
          } // Closes 10 day forecast lookup */

    }); // Closes ajax call

  /* ------------------------------------------------------ */
  /* (3) Request Hourly Data */

  	$.ajax({
         url : "http://api.wunderground.com/api/fce94f5d57caef21/hourly/q/FL/Orlando.json",
         dataType : "jsonp",
          success : function(parsed_json) { 

            var hour;
            var ampm;
         	  //var icon;
         	  var condition;
          	var temp;
          	var arrayHourly = parsed_json['hourly_forecast'];

          	for(var i=0; i<arrayHourly.length; i++){ 
         		 hour = (arrayHourly[i]['FCTTIME']['hour']);
             ampm = (arrayHourly[i]['FCTTIME']['ampm']);
         	   //icon = (arrayHourly[i]['icon']);
         		 condition = (arrayHourly[i]['condition']);
             temp = (arrayHourly[i]['temp']['english']);

             if(hour > 12){
                hour = hour - 12;
              };
             

          		$("#h" + i).append("<p>" + hour + ":00 " + ampm + "</p>");
          		//$("#h" + i).append("<img src='http://icons.wxug.com/i/c/k/" + icon + ".gif' alt='weather icon'/>");
          		$("#h" + i).append("<p>" + condition + "</p>");
          		$("#h" + i).append("<p>Temp: " + temp + "ºF</p>");
          	}

          } // Closes hourly data lookup*/

    }); // Closes ajax call

          /* ------------------------------------------------------ */
          /*(4) Request Almanac Data */
$.ajax({
          url : "http://api.wunderground.com/api/fce94f5d57caef21/almanac/q/FL/Orlando.json",
          dataType : "jsonp", 
          success : function(parsed_json) { 

              var recordhigh = parsed_json['almanac']['temp_high']['record']['F']; 
              var recordhighyr = parsed_json['almanac']['temp_high']['recordyear'];
              var recordlow = parsed_json['almanac']['temp_low']['record']['F'];
              var recordlowyr = parsed_json['almanac']['temp_low']['recordyear'];

              $("#almanac").append("<p> The record high on this day was " + recordhigh + "ºF in " + recordhighyr + ". The record low on this day was " + recordlow + "ºF in " + recordlowyr + ".</p>");
                                
          } // Closes almanac lookup*/
           }); // Closes ajax call

          /* ------------------------------------------------------ */
          /* (5) Request Astronomy Data */
          $.ajax({
          url : "http://api.wunderground.com/api/fce94f5d57caef21/astronomy/q/FL/Orlando.json",
          dataType : "jsonp", 
          success : function(parsed_json) { 

              var sunriseHr = parsed_json['moon_phase']['sunrise']['hour']; 
              var sunriseMin = parsed_json['moon_phase']['sunrise']['minute']; 
              var sunsetHr = parsed_json['moon_phase']['sunset']['hour']; 
              var sunsetMin = parsed_json['moon_phase']['sunset']['minute']; 
                
               $("#astro").append("<p> Sunrise will be at " + sunriseHr + ":" + sunriseMin + ". Sunset will be at " + sunsetHr + ":" + sunsetMin + ".</p>"); 

          } // Closes almanac lookup*/
            }); // Closes ajax call



});  //Closes Doc Ready Function

	

