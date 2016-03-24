// File:  Contact.js
// Single Contact that will be used to populate the ContactList

// Dependencies ********************************
import React from 'react';

// Define class "Contact" ********************************
// Parent is ContactsList
class Contact extends React.Component {
	render(){
		return (
			<li>
				{this.props.contact.name} {this.props.contact.phone}
			</li>
		)
	}
}

// Export "Contact" ********************************
export default Contact;