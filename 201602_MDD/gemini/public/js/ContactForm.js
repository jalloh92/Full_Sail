// File:  ContactForm.js
// Form for adding a new contact

// Dependencies ********************************
import React from 'react';

// Define class "ContactForm" ********************************
// Parent is ContactBox
var ContactForm = React.createClass({
	// Setting the initial name and phone to blank strings
	getInitialState: function() {
	  return {name: '', phone: ''};
	},

	handleNameChange: function(e) {
	  this.setState({name: e.target.value});
	},

	handlePhoneChange: function(e) {
	  this.setState({phone: e.target.value});
	},

	handleSubmit: function(e) {
	  // Call preventDefault() on the event to prevent 
	  // the browser's default action of submitting the form.
	  e.preventDefault();
	  var name = this.state.name.trim();
	  var phone = this.state.phone.trim();
	  if (!phone || !name) {
	    return;
	  }

	  // On Submit, use props to set name and phone to fields entered
	  // Change fields to blank
	  this.props.onSubmit({name: name, phone: phone});
	  this.setState({name: '', phone: ''});
	},

	render: function() {
	  // Input fields with with a value set are called controlled components
	  return (
	    <form className="contactForm" onSubmit={this.handleSubmit}>
	      <input
	        type="text"
	        placeholder="Your name"
	        value={this.state.name}
	        onChange={this.handleNameChange}
	      />
	      <input
	        type="text"
	        placeholder="Phone Number"
	        value={this.state.phone}
	        onChange={this.handlePhoneChange}
	      />
	      <input type="submit" value="Post" />
	    </form>
	  );
	}
});

// Export "ContactForm" ********************************
export default ContactForm;