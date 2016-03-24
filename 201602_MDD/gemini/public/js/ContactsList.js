// File:  ContactList.js
// Compiles all the contacts into an unordered list

// Dependencies ********************************
import React from 'react';

// Components / Children ********************************
import Contact from './Contact';

// Define class "ContactsList" ********************************
// Parent is ContactBox
class ContactsList extends React.Component {
	render(){
		// console.log(this.props.contacts);

		return (
			<ul>
				{this.props.contacts.map((contact)=> {
					return <Contact  contact={contact} key={contact.id}/>
				})}
			</ul>
		)
	}
}

// Export "ContactsList" ********************************
export default ContactsList;