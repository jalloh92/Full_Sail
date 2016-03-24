// Gemini Problem Solver
// Component:  ProblemDetailsScreen
// Description: ProblemDetailsScreen will display the ProblemDetails, Accept Button and Transfer Button

// Dependencies ************************************
import React, {
  StyleSheet,
  Text,
  View
  } from 'react-native';

var _ = require('underscore');  

// Components / Children ************************************
import ProblemInfo from './ProblemInfo'
import SimpleButton from './SimpleButton';

// class ProblemDetailsScreen ************************************
export default class ProblemDetailsScreen extends React.Component {

  // Constructor:  sets state to the props of the problem passed in
  // Should this just be props since we are not changing value here?
  constructor (props) {
    super(props)
    this.state = {  problem : this.props.problem};
  }

  // render *****************************************************
  render () {
    return (
      <View style={styles.container}>
        
        <View style={styles.spacer}></View>

        <View style={styles.topContainer}>   
          
          <ProblemInfo 
            problem = {this.props.problem}
            style={styles.problemInfo}
            titleTextStyle={styles.problemInfoTitleText}
            textStyle={styles.problemInfoText}
          />

        </View>

        <View style={styles.spacer}></View>
        <View style={styles.spacer}></View>
        <View style={styles.spacer}></View>

        <View style={styles.bottomContainer}>    
          
          <SimpleButton
            onPress={() => this.props.navigator.push({
              name: 'accept',
              problem: this.state.problem  
            })}
            customText="Accept Problem"
            style={styles.simpleButton}
            textStyle={styles.simpleButtonText}
          />

          <View style={styles.spacer}></View>

          <SimpleButton
            onPress={() => this.props.navigator.push({
              name: 'transfer',
              problem: this.state.problem,  
            })}
            customText="Transfer Problem"
            style={styles.simpleButton}
            textStyle={styles.simpleButtonText}
          />

          <View style={styles.spacer}></View>
          <View style={styles.spacer}></View>
          <View style={styles.spacer}></View>

        </View>  
      </View>
    );
  }
}

// Styles ****************************************************
// TODO:  Update styles
var styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    marginTop: 60
  },

  topContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },

  bottomContainer: {
    flex: 3,
    justifyContent: 'center',
    alignItems: 'center',
  },

  problemInfo: {

  },

  problemInfoTitleText: {
    fontSize: 18,
    fontWeight: 'bold',
    color: '#48209A'
  },

  problemInfoText: {
    fontSize: 16,
    color: '#48209A'
  },

  textInput: {
    fontSize: 16,
  },

  simpleButton: {
    backgroundColor: '#5B29C1',
    borderColor: '#48209A',
    borderWidth: 1,
    borderRadius: 4,
    paddingHorizontal: 20,
    paddingVertical: 15,
    shadowColor: 'darkgrey',
    shadowOffset: {
        width: 1,
        height: 1
    },
    shadowOpacity: 0.8,
    shadowRadius: 1,
  },

  simpleButtonText: {
    color: 'white',
    fontWeight: 'bold',
    fontSize: 16
  },

  spacer: {
    flex: 1,
  }

});