import React from 'react';

// components
import ContactsList from './ContactsList';

// define data
let contacts = [{
	id: 1,
	name: 'Unicorn',
	phone: '555 555 5555'
},
{
	id: 2,
	name: 'Steve',
	phone: '555 333 5555'
},{
	id: 3,
	name: 'Bob',
	phone: '555 444 5555'
},{
	id: 4,
	name: 'Sue',
	phone: '555 777 5555'
}]

class App extends React.Component {
	render(){
		// console.log(this.props.contacts);
		
		return (
			<div>
				<h1>Contact List</h1>
				<ContactsList contacts={this.props.contacts}/>
			</div>
		)
	}
}

React.render(<App contacts={contacts} />, document.getElementById('app'));