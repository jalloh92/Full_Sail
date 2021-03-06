// File:  ContactBox.js
// Compiles the ContactList & ContactForm
// Loads information from api / server

// Dependencies ********************************
import React from 'react';

// Components / Children ********************************
import ContactsList from './ContactsList';
import ContactForm from './ContactForm';

// Define class "ContactBox" ********************************
// Parent is App
var ContactBox = React.createClass({
    
    loadContactsFromServer: function() {
      $.ajax({
        // TODO:  fix url so that it is passed in from App.js
        // url: this.props.url,
        url: "/api/contacts",
        dataType: 'json',
        cache: false,
        success: function(data) {
          this.setState({data: data});
        }.bind(this),
        error: function(xhr, status, err) {
          console.error(this.props.url, status, err.toString());
        }.bind(this)
      });
    },

    // Passing a new callback (handleContactSubmit) into the child 
    // Binding it to the child's onContactSubmit event
    handleContactSubmit: function(contact) {
      // Submit to the server and refresh the list

      var contacts = this.state.data;

      // Optimistically set an id on the new contact. It will be replaced by an
      // id generated by the server. In a production application you would likely
      // not use Date.now() for this and would have a more robust system in place.
      contact.id = Date.now();
      var newContacts = contacts.concat([contact]);
      this.setState({data: newContacts});

      $.ajax({
      	// TODO:  fix url so that it is passed in from App.js
        // url: this.props.url,
        url: "/api/contacts",
        dataType: 'json',
        type: 'POST',
        data: contact,
        success: function(data) {
          this.setState({data: data});
        }.bind(this),
        error: function(xhr, status, err) {
          this.setState({data: contacts});
          console.error(this.props.url, status, err.toString());
        }.bind(this)
      });
    },
    
    getInitialState: function() {
      return {data: []};
    },

    // componentDidMount is a method called automatically by React 
    // after a component is rendered for the first time. 
    componentDidMount: function() {
      this.loadContactsFromServer();
      setInterval(this.loadContactsFromServer, this.props.pollInterval);
    },

    render: function() {
      return (
        <div className="contactBox">
          <h3>Contacts</h3>
          <ContactsList data={this.state.data} />
          <h3>Contact Form</h3>
          <ContactForm onContactSubmit={this.handleContactSubmit} />
        </div>
      );
    }
  });

// Export "ContactBox" ********************************
export default ContactBox;