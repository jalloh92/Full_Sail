// Gemini Problem Solver
// Component:  ProblemInfo
// Description: ProblemInfo will display the details of a problem
// Details include problemType, orderLoc, unitSku, unitQty
// Possible improvements would be to include unitDescription and unitImage

// Dependencies ************************************
import React, {
  StyleSheet,
  Text,
  View, Info
} from 'react-native';

// No Components / Children ************************************

// class ProblemInfo ************************************
export default class ProblemInfo extends React.Component {

  // Constructor:
  constructor (props) {
    super(props)
  }

  // Render:
  render () {

    var date = new Date(this.props.problem.id*1000);
    var hours = date.getHours();
    var minutes = "0" + date.getMinutes();

    return (
      <View style={this.props.style}>
        <Text style={this.props.titleTextStyle}>Problem Information:</Text>
        <Text style={this.props.textStyle}>Problem Start Time: {hours}:{minutes}</Text>
        <Text style={this.props.textStyle}>Problem Type: {this.props.problem.probType}</Text>
        <Text style={this.props.textStyle}>Problem Status: {this.props.problem.probStatus}</Text>
        <Text style={this.props.textStyle}>Problem Location: {this.props.problem.order.orderLoc}</Text>
 
      </View>
    );
  }
}

// propTypes ************************************ 
ProblemInfo.propTypes = {
    style: View.propTypes.style,
    textStyle: Text.propTypes.style,
    titleTextStyle: Text.propTypes.style
};