// File:  App.js
// Compiles all the children; handles the rendering to the browser

// Dependencies ********************************
import React from 'react';
import ReactDOM from 'react-dom';


// Components / Children ********************************
import ContactBox from './ContactBox';

// Define class App ********************************
class App extends React.Component {
	render(){
		return (
			<div>
				<h2>Contact Box</h2>
				<ContactBox />
			</div>
		)
	}
}

// Render to the browser ********************************
ReactDOM.render(
    <App url="/api/contacts" pollInterval={2000} />,
    document.getElementById('app')
);
