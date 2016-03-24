// Gemini Problem Solver
// Component:  ProblemStepScreen
// Description: ProblemDetailsScreen will display the ProblemDetails, Problem Steps, 
// Next Step / Complete Button and Transfer Button

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
export default class ProblemStepScreen extends React.Component {

  // Constructor:  sets state to the props of the problem passed in
  // Should this just be props since we are not changing value here?
  constructor (props) {
    super(props)
    this.state = {
      problem : this.props.problem, 
      stepNum: this.props.index,
      stepBtnActive: true,
      completeBtnActive: false
    };
  }


  // updateProblem *****************************************************
  // probStatus will be updated
  updateProblem(probStatus) {
    
    var problem = Object.assign(
      this.state.problem, 
      {probStatus: probStatus}
    );
    
    // onChangeProblem is a props of the Navigator (index.ios.js)
    this.props.onChangeProblem(problem);
    this.setState(problem);

  }

  // render *****************************************************
  render () {

    // Steps (dummy array) *****************************************************
    // Ideally would like to pass in the array based on probType from index.ios.js
    // if probType, then pass in the array with key of probType from a steps object
    // ??? How to integrate the steps with the problem info (unitLoc, orderInfo...)

    //TODO:  Currently looping through the steps and changing visibility of buttons when I'm done
    // but the buttons are still active (even though you can't see them)...needs to be fixed!
    var steps = [
      "Pick the unit",
      "Place the unit in the order",
      "Return order to inspection"
    ];

    var step = this.state.stepNum;
    var stepNum = this.state.stepNum + 1;
    var stepsLen = steps.length;

    var btnMsg = "Next Step";

    if(stepNum == stepsLen){
      btnMsg = "Complete Problem";
      this.state.stepBtnActive = false;
      this.state.completeBtnActive = true;
    }


    return (
      <View style={styles.container}>
        
        <View style={styles.topContainer}>      
          
          <View style={styles.spacer}></View>

          <ProblemInfo 
            problem = {this.props.problem}
            style={styles.problemInfo}
            titleTextStyle={styles.problemInfoTitleText}
            textStyle={styles.problemInfoText}
          />

          <View style={styles.spacer}></View>
        </View>
          
        <Text>Step {stepNum}:</Text>
        <Text>{steps[step]}</Text>        

        <View style={styles.bottomContainer}>
          <View style={styles.spacer}></View>

          <SimpleButton
            onPress={() => this.setState({stepNum: ++this.state.stepNum})}  
            customText="Next Step"
            style={[styles.simpleButton, this.state.stepBtnActive ? {opacity: 100} : {opacity: 0}]}
            textStyle={styles.simpleButtonText}
          />
          
          <SimpleButton
            problem={_(this.state.problem).toArray()}
            onPress={() => 
              {this.updateProblem("completed")
                this.props.navigator.push({name:'home'})
              }
            }  

            customText="Complete Problem"
            style={[styles.simpleButton, this.state.completeBtnActive ? {opacity: 100} : {opacity: 0}]}
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
        </View>
      </View>
    );
  }
}

// Styles ****************************************************
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
    alignItems: 'center'
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

  bottomContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
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