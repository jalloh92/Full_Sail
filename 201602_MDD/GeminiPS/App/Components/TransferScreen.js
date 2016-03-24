// Gemini Problem Solver
// Component:  TransferScreen
// Description: TransferScreen will display the ProblemDetails, TextInput and Submit Button
// User adds reason for transfer; can either submit the reason or cancel

//TODO:  Develop this

// Dependencies ************************************
import React, {
  StyleSheet,
  Text,
  TextInput,
  View
  } from 'react-native';

// Components / Children ************************************
import ProblemInfo from './ProblemInfo'
import SimpleButton from './SimpleButton';

// class TransferScreen ************************************
export default class TransferScreen extends React.Component {

  // Constructor:  sets state to the props of the problem passed in
  constructor (props) {
    super(props)
    this.state = {problem:this.props.problem, msg:this.props.msg};
  }

  // updateProblem
  // transferReason and probStatus will be updated
  updateProblem(transferReason, probStatus) {
    
    var problem = Object.assign(
      this.state.problem, 
      {transferReason: transferReason,
        probStatus: probStatus}
    );
    
    // onChangeProblem is a props of the Navigator (index.ios.js)
    this.props.onChangeProblem(problem);
    this.setState(problem);

  }

  // render
  render () {
    return (
      <View style={styles.container}>

        <View style={styles.topContainer}>      
          <ProblemInfo 
            problem = {this.props.problem}
            style={styles.problemInfo}
            titleTextStyle={styles.problemInfoTitleText}
            textStyle={styles.problemInfoText}
          />

          <View style={styles.spacer}></View>

          <Text style={styles.textcontainer}>
            Please give a reason why you are transferring this problem:
          </Text>
        </View>

        <TextInput
          ref="transferReason"
          multiline={true}
          placeholder="Start typing"
          autoFocus={true}
          autoCapitalize="sentences"
          style={styles.textInput}
          value={this.state.problem.transferReason}
          onChangeText={(transferReason) => this.updateProblem(transferReason, this.state.problem.probStatus)}
        />    
        
        <View style={styles.bottomContainer}>
          <View style={styles.spacer}></View>

          <SimpleButton
            onPress={() => 
              {
                this.setState({msg:"New Msg"})
                this.updateProblem(this.state.problem.transferReason, "transferred")
                this.props.navigator.push({name:'home'})
              }
            }  
            customText="Transfer Problem"
            style={styles.simpleButton}
            textStyle={styles.simpleButtonText}
          />

          <View style={styles.spacer}></View>

          <SimpleButton
            onPress={() => this.props.navigator.pop()}
            customText="Cancel Transfer"
            style={styles.simpleButton}
            textStyle={styles.simpleButtonText}
          />

          <View style={styles.spacer}></View>
        </View>
      </View>
    );
  }
}

// Styles ************************************
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

  textcontainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    fontSize: 18,
    fontWeight: 'bold',
    color: '#48209A'
  },

  textInput: {
    flex: 1,
    fontSize: 16,
    borderColor: '#48209A',
    borderWidth: 1,
    alignItems: 'center'
  },

  bottomContainer: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },

  simpleButton: {
    flex:2,
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