// Gemini Problem Solver
// Component:  SimpleButton
// Description: Just a simple button with text!

// Dependencies ************************************
import React, {
  Text,
  TouchableOpacity,
  View
} from 'react-native';

// class SimpleButton ************************************
export default class SimpleButton extends React.Component {
  render () {
    return (
      <TouchableOpacity onPress={this.props.onPress}>
        <View style={this.props.style}>
          <Text style={this.props.textStyle}>
            {this.props.customText || 'Simple Button'}
          </Text>
        </View>
      </TouchableOpacity>
    );
  }
}

// propTypes ************************************ 
SimpleButton.propTypes = {
    onPress: React.PropTypes.func.isRequired,
    customText: React.PropTypes.string,
    style: View.propTypes.style,
    textStyle: Text.propTypes.style
};