/*  
	A New Leaf
	Author: Kelly Rhodes
*/

(function($){ // Global Document Ready Function
	
	/* ================== Tooltip =================== */

	/* When the user hovers over an element with the class "masterTooltip",
	the title attribute will be shown.  The text in the title attribute will
	be given the style toolTip from the style.css sheet.  When the user hovers 
	out, the tooltip will be removed. Note:  this code will run *before* the project boxes
	are added, therefore, won't easily work with the edit & delete buttons. */

	$('.masterTooltip').hover(function(){
		// Hover in code	
	
		var title = $(this).attr('title');
		$(this).data('tipText', title).removeAttr('title');
		$('<p class="tooltip"></p>')
			.text(title)
			.appendTo('body')
			.fadeIn();
	}, function(){
		// Hover out code

		$(this).attr('title', $(this).data('tipText'));
		$('.tooltip').remove();
	}).mousemove(function(evt){
		var mousex = evt.pageX + 20; // get x coordinates relative to left edge of document
		var mousey = evt.pageY + 10; // get y coordinates relative to top edge of document
		$('.tooltip')
			.css({top: mousey, left: mousex});
	});

	/* ================== jQuery UI Buttons =================== */

	/* from jQuery UI */
	$(function() {
	    $( "input[type=submit], input[type=button], button" )
	      .button()
	      .click(function( event ) {
	        event.preventDefault();
	      });
	  });


	/* ======================== Login ======================== */

	$('#signinButton').on('click', function(e){ // when the sign in button is clicked, the function will run
		//alert("I was clicked!");

		e.preventDefault(); // prevents browser from bouncing up to top of the page
		var user = $('#user').val(); // create varible user, take the value in the field with ID #user
		var pass = $('#pass').val(); // create varible pass, take the value in the field with ID #pass

		//console.log("This notifies you if the password is working");

		$.ajax({ // take the variables user & pass from above and post to login.php
			// username will get the value from user; password will get the value from pass
			url: 'xhr/login.php',
			type: 'post',
			dataType: 'json',
			data: {
				username: user,
				password: pass
			},

			success: function(response){
				//console.log("Test User");
				// if there's an error in the response, the user will be notified
				if(response.error){
					alert(response.error);
				} else {
				/* if the login is successful, the user will be redirected 
				to their admin page.  Session will begin */	
					window.location.assign('admin.html'); 
				}; // closes if / else statement
			} // closes success function
		}); // closes ajax call
	}); // closes on 'click' function

	/* ================== Display Username =================== */

	/* When the user is logged in, the username will be displayed in 
	the header on the admin (dashboard) and projects pages. */
	$.getJSON('xhr/check_login.php', function(data){
		console.log(data);
		$.each(data, function(key,val){
			console.log(val.first_name);
			$('.userid').html("Welcome User: " + val.first_name);
		})
	});	

	/* ======================= Logout ======================== */

	$('#logOut').click(function(e){
		e.preventDefault();
		$.get('xhr/logout.php', function(){
			window.location.assign('index.html');
		})
	});



	/* ========================================== Go to Registration page 
	====================== */

	/* When the user clicks the "I'm Ready" button, they are taken to 
	the register page.*/
	$('.gotoregisterbtn').on('click',function(e){
		e.preventDefault();
		window.location.assign('register.html');
	});

	/* ================== "Fake" Radio Button Effect  =================== */
	$(".plan").on("click", function(){
		$(".plan").removeClass('checked');
		$(this).addClass('checked');
	});
	

	/* ================== Total Cost Calculator =================== */
	
	/* On registration page; used to calculate total cost of plan based 
	on number of months they sign up for */
	$(".months").change(function() {
	    
	    var months = $(this).val();
	    var monthlyPrice = $(this).closest(".plan").data("monthly-price");
	    var total = months * monthlyPrice;

		$(this).parent().next().find(".total").text(total);

	    console.log("months is: " + months + " total is: " + total); /* debugging */
  	});

	/* ================== Terms and Conditions =================== */

	/* from jQuery UI */
	$('#terms_conditions').on('click', function(e){
	    e.preventDefault();
	    //alert("I was clicked!")
	    $( "#dialog-message" ).dialog({
	      modal: true,
	      buttons: {
	        Ok: function() {
	          $( this ).dialog( "close" );
	        }
	      }
	    });
	});



	/* ========================= Verify form ========================== */

	// jQuery plugin for form validation

	$("#reg_form").validate({ 
		rules:{
			first: "required",
			last: "required",
			userName: {
				required: true,
				minlength: 2
			},

			password: {
				required: true,
				minlength:5
			},

			confirm_password:{
				required: true,
				minlength: 5,
				equalTo: "#password"
			},

			email: {
				required: true,
				email: true
			},

			confirm_email:{
				required: true,
				email: true,
				equalTo: "#email"
			}
		},

		messages: {
			first: "Please enter your first name",
			last: "Please enter your last name",
			username:{
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password:{
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password:{
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			
			email:{
				required: "Please provide your email address",
				email: "Please enter a valid email address",
			},

			confirm_email:{
				required: "Please provide your email address",
				email: "Please enter a valid email address",
				equalTo: "Please enter the same email as above"
			}
		}
	}); 

	/* ========================= Register ========================== */

	/* After user fills out the registration form, the information is 
	sent to the database, a session is started, and user is re-directed to 
	the admin page */

	$('#register').on('click', function(){
		//console.log('i was clicked!');


		var firstname = $('#first').val(),
			lastname = $('#last').val(),
			username = $('#userName').val(),
			email = $('#email').val(),
			password = $('#password').val();

		console.log(firstname + ' ' + lastname + ' ' + username + ' ' + email + ' ' + password);

		$.ajax({
			url: 'xhr/register.php',
			type: 'post',
			dataType: 'json',
			data: {
				firstname: firstname,
				lastname: lastname,
				username: username,
				email: email,
				password: password
			},

			success: function(response){
				if(response.error){
					console.log(response.error);
				} else {
					window.location.assign('admin.html');
				}
			}
		});
	});



	/* ============================================== Go to Admin page 
	====================== */

	/* When the user clicks the "Dashboard" button, they are taken to 
	the admin page.  Buttons are dynamic and user stays in the session. */
	$('.dboardbtn').on('click',function(e){
		e.preventDefault();
		window.location.assign('admin.html');
	});

	/* ============= Tabbed Accordion =================== */
	
	/* User can click between "Projects", "Tasks", and "Users"
	tabs on the admin page and pull up the appropriate data */
	$('#tabs p').hide().eq(0).show();
	$('#tabs p:not(:first)').hide();

	$('#tabs-nav li').click(function(e){
		e.preventDefault();
		$('#tabs p').hide();
	
		$("#tabs-nav .current").removeClass("current");
		$(this).addClass("current");
		var clicked = $(this).find('a:first').attr('href');

		$('#tabs ' + clicked).fadeIn();
	}).eq(0).addClass("current");

	

	/* ================================ Go to Projects page 
	====================== */

	/* When the user clicks on the "projects" button in the tabbed accordian
	on the admin (dashboard) page, he will be redirected to the projects page.
	Buttons are dynamic and user stays in the session.  */
	$('.projectsbtn').on('click',function(e){
		e.preventDefault();
		window.location.assign('projects.html');
	});

	
	/* ============= Open & Close Modal =================== */

	/* When the user clicks the "Add Project" link on the projects page, the 
	overlay will be faded in.  Then, the modal will be found and faded in */
	$('.modalClick').on('click', function(evt){
		evt.preventDefault();
		$('#noFun').removeClass('editButton').addClass('addButton').val('Add Project');
		$('#overlay')
			.fadeIn()
			.find('#modal')
			.fadeIn();
	});

	/* When the user closes the modal, both the overlay and modal 
	will be faded out */
	$('.close').on('click', function(evt){
		evt.preventDefault();
		$('#overlay')
			.fadeOut()
			.find('#modal')
			.fadeOut();
	});

	/* ============= Project Status Icon Hover (8:02) =================== */

	/* ============= Date Picker =================== */
	$(".mydatepicker").datepicker({
		numberOfMonths: 2,
		minDate: 0
	});

	/* ============= New Projects =================== */

	/* From the "Add Project" modal, once the user fills out the info about
	the new project, the project info will be added to the database. */
	
	$('.addButton').on('click', function(){
		//alert("Add Button");

		var projName = $('#projectName').val(),
			projDesc = $('#projectDesc').val(),
			projDue = $('#projectDueDate').val(),
			status = $('input[name = "status"]:checked').prop("id");
	

		$.ajax({
			url: "xhr/new_project.php",
			type: "post",
			dataType: "json",
			data: {
				projectName: projName,
				projectDescription: projDesc,
				dueDate: projDue,
				status: status
			},

			success: function(response){
				console.log('Adding Project');

				if(response.error){
					alert(response.error);
				} else {
					window.location.assign("projects.html");
				}; // closes if / else
			} // closes success function
		}); // closes ajax call
	}); // closes on 'click' function
	

	
	
	/* ================== Get Projects =================== */
	
/* Would like to add the status icon to the right of the projectbox */

	var projects = function(){
		$.ajax({
			url: 'xhr/get_projects.php',
			type: 'get', // pulling data, already secure since we are in a session
			dataType: 'json',
			success: function(response){
				if(response.error){
					console.log(response.error);
				} else {

					for(var i=0, j=response.projects.length; i < j; i++){ // looping through array of projects in database
						var result = response.projects[i];

						$('.projects').append(
							"<div class='ui-state-default'>"

							+"<div class='project_left'>"

								+ "<input class='projectid' type='hidden' value='" // result.id is the primary key of the database, hide for user
								+ result.id + "'>" 
								+ "<p>Project Name: " + result.projectName + "</p>"
								+ "<p>Project Description: " + result.projectDescription + "</p>" 
								+ "<p>Project Status: " + result.status + "</p>" 
								+ "<button class ='deletebtn'>Delete</button>" 
								+ "<button class = 'editbtn'>Edit</button>"

							+"</div>"

							+"<div class='project_right'>"

								+"<img src='images/" + result.status + "_100.png' alt='status icon'/>"

							+"</div>"

							+ "</div> <br>" // closes div projectBox
							); // closes append method
					}; // closes for loop

					$('.deletebtn').on('click', function(e){

						var projID = $(this).parent().children('.projectid').val();
						// $(this).parent().children('.projectid').css("border", "3px solid red"); // debugging
						// console.log('test delete' + projID); // debugging

						$( "#dialog-confirm" ).dialog({
						      resizable: false,
						      height:275,
						      modal: true,
						      buttons: {
						        "Delete item": function() {
						          $( this ).dialog( "close" );
						
								$.ajax({
								url: 'xhr/delete_project.php',
								data: {
									projectID: projID
								},
								type: 'post',
								dataType: 'json',

								success: function(response){
									console.log('Deleting project');

									if(response.error){
										alert(response.error);
									} else {
										console.log(projID);
										window.location.assign("projects.html"); // if successful redirect to projects page
									}; // closes if / else
								} // closes success function

							}); // closes ajax call

						        },
						        Cancel: function() {
						          $( this ).dialog( "close" );
						        }
						      }
						    });
						
					}); // End Delete function


					$('.editbtn').on('click', function(e){
						e.preventDefault();
						//alert("I was clicked");
						var projID = $(this).parent().children('.projectid').val();
						
						$('#noFun').val('Edit Project').removeClass('addButton').addClass('editButton');

						//var classTrue = $('#noFun').hasClass('addButton');
						//alert('line 304: the button has value addButton: ' + classTrue);	

						$('#overlay')
						.fadeIn()
						.find('#modal')
						.fadeIn();
	
						$.ajax({
							url: 'xhr/get_projects.php',
							data: {
								projectID: projID
							},
							type: 'get',
							dataType: 'json',
							success: function(response){
								if(response.error){
									alert(response.error);
								} else {
									console.log(projID);

									for(var i=0, j=response.projects.length; i < j; i++){ // looping through array of projects in database
										if(response.projects[i].id == projID){
											console.log("you got it! i = "+ i);
											result = response.projects[i];
										}// closes if statement
									};//closes for loop

									console.log(result.projectName);


									var updateprojname = result.projectName;
									var updateprojdesc = result.projectDescription;
									var updateprojstatus = result.status;

									$('#projectName').val(updateprojname);
									$('#projectDesc').val(updateprojdesc);

									//$('#updateemail').val(updateprojstatus); // need to figure out how to select!
								}; // ends if / else
							} // end success function

						}); // closes ajax call

						$('.editButton').on('click', function(){
							alert("Edit Button!");
							var classTrue = $('#noFun').hasClass('addButton');
							alert('line 304: the button has value addButton: ' + classTrue);

						var projName = $('#projectName').val(),
							projDesc = $('#projectDesc').val(),
							projDue = $('#projectDueDate').val(),
							status = $('input[name = "status"]:checked').prop("id");
	
						$.ajax({
							url: "xhr/update_project.php",
							type: "post",
							dataType: "json",
							data: {
								projectID: projID,
								projectName: projName,
								projectDescription: projDesc,
								dueDate: projDue,
								status: status
							},

							success: function(response){
								console.log('Editing Project');

								if(response.error){
									alert(response.error);
								} else {
									//window.location.assign("projects.html");
								}; // closes if / else
							} // closes success function
						}); // closes ajax call
					}); // closes on 'click' function





					}); // End Edit function

				} // closes if / else
			} // closes success function
		}) // closes ajax call
	} // closes function projects
	projects(); // executes projects

	
	/* ================== Sortable =================== */

	$('#sortable').sortable();
	$('#sortable').disableSelection();

	/* ================================ Go to Profile page 
	====================== */

	/* When the user clicks the "Profile" button, they are taken to 
	their profile page.  Buttons are dynamic and user stays in the session. */
	$('.profilebtn').on('click',function(e){
		e.preventDefault();
		window.location.assign('profile.html');
	});

	/* ================== Update Profile Info =================== */

	var updateAcct = function(){

		console.log("pulls user info");
		$.ajax({
			url: 'xhr/get_user.php',
			type: 'get',
			dataType: 'json',
			success: function(response){
				if(response.error){
					//alert(response.error);
				} else {
					var updatefirstname = response.user.first_name;
					var updatelastname = response.user.last_name;
					var updateemail = response.user.email;
					// var updateavatar = response.user.avatar;

					$('#updatefirstname').val(updatefirstname);
					$('#updatelastname').val(updatelastname);
					$('#updateemail').val(updateemail);
					//$('#updateavatar').val(updateavatar); // throws errors
				}; // ends if / else
			} // end success function

		}); // closes ajax call


		$('#updateAcctBtn').on('click', function(e){

			e.preventDefault();
			var changedfirstname = $('#updatefirstname').val();
			var changedlastname = $('#updatelastname').val();
			var changedemail = $('#updateemail').val();
			// var changedavatar = $('#updateavatar').val();

			$.ajax({

				url: 'xhr/update_user.php',
				type: 'post',
				dataType: 'json',
				data:{

					first_name: changedfirstname,
					last_name: changedlastname,
					email: changedemail,
					//avatar: changed avatar
				},

				success: function(response){
					if(response.error){
						console.log(response.error);
					} else {
						alert("Account Updated");
						console.log("acount updated");
					}; // closes if / else statement
				} // closes success function

			}); // closes ajax call


		}); // closes update acct button function

	}; // closes updateAcct function

	updateAcct(); // executes function





	
})(jQuery); // end private scope




