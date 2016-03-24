// Gemini Problem Solver
// Component:  HomeScreenMsg
// Description: HomeScreenMsg will display message based on last problem status
// Parent is HomeScreen

// Dependencies ************************************
import React, {
  Text,
  View
} from 'react-native';

// No Components / Children ************************************

// class HomeScreenMsg ************************************
export default class HomeScreenMsg extends React.Component {
  render () {

    //TODO:  work out logic based on last problem status
    // {this.props.customText}
    // var msg = "Thank you for solving another problem!"

    return (
        <View style={this.props.style}>
          <Text style={this.props.textStyle}>{this.props.msg}</Text>
        </View>
    );
  }
}

// propTypes ************************************ 
HomeScreenMsg.propTypes = {
    customText: React.PropTypes.string,
    style: View.propTypes.style,
    textStyle: Text.propTypes.style
};