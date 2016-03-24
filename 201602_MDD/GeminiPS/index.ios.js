// Gemini Problem Solver
// Author:  Kelly Rhodes
// File:  index.ios.js
// main logic of app
'use strict';

// Dependencies ************************************
import React, {
  AppRegistry,
  Navigator,
  StyleSheet,
  View,
  Text,
  StatusBarIOS,
  AsyncStorage,
  Image
} from 'react-native';

var _ = require('underscore');
var Firebase = require('firebase');
var firebaseRef = new Firebase('https://geminips.firebaseio.com/');

// Components / Children ************************************
import HomeScreen from './App/Components/HomeScreen';
import SimpleButton from './App/Components/SimpleButton';
import TransferScreen from './App/Components/TransferScreen';
import ProblemDetailsScreen from './App/Components/ProblemDetailsScreen';
import ProblemStepScreen from './App/Components/ProblemStepScreen';

// Navigation Bar Route Mapper ************************************
var NavigationBarRouteMapper = {

  // Nav Bar LeftButton will default to back button; null on home
  LeftButton: function(route, navigator, index, navState) {
    switch (route.name) {
      case 'home':
        return null;
      
      default:
        return (
          <SimpleButton
            onPress={() => navigator.pop()}
            customText='Back'
            style={styles.navBarLeftButton}
            textStyle={styles.navBarButtonText}
           />
        ); 
    }
  },

  // Nav Bar RightButton will default to My Queue (home); null on home
  RightButton: function(route, navigator, index, navState) {
    switch (route.name) {
      case 'home':
        return null;

      default:
        return (
          <SimpleButton
            onPress={() => {
              navigator.push({
                name: 'home'
              });
            }}
            customText='My Queue'
            style={styles.navBarRightButton}
            textStyle={styles.navBarButtonText}
          />
          );
    }
  },

  // Nav Bar Title
  Title: function(route, navigator, index, navState) {
    switch (route.name) {
      case 'home':
        return (
          <Text style={styles.navBarTitleText}>
            Gemini Problem Solver
          </Text>
        );
      case 'problem':
        return (
          <Text style={styles.navBarTitleText}>
            {route.problem.probType}
          </Text>
        );
      case 'transfer':
        return (
          <Text style={styles.navBarTitleText}>
            Transfer Problem
          </Text>
        );
    }
  }
};


// class GeminiPS ************************************
class GeminiPS extends React.Component {
  
  // Constructor with initial dummy data *************
  // TODO:  sync up with Firebase vs async?
  constructor(props) {
    super(props);
    this.state = {
      msg: "Thank you!!!",
      selectedProblem: 
        { "id": "",
          "probType": "",
          "order":{
            "orderId":"",
            "unitSku":"",
            "unitQty": 0,
            "orderLoc":"",
            "unitLoc":""
          },
          "probStatus":"",
          "transferReason":""
        },
      problems: {
        1: {  "id": 1301090400,
              "probType": "missing",
              "order":{
                "orderId":"a5296ab9-9eee-7ba0-0a79-b801594f2c91",
                "unitSku":"a5296ab9-9eee-7ba0-0a79-b801594f2c91",
                "unitQty": 1,
                "orderLoc":"AAA123",
                "unitLoc":"AAA456"
              },
              "probStatus":"active",
              "transferReason":""
            },
        2: {  "id": 1301090500,
              "probType": "missing",
              "order":{
                "orderId":"a5296ab9-9eee-7ba0-0a79-b801594f2c91",
                "unitSku":"a5296ab9-9eee-7ba0-0a79-b801594f2c91",
                "unitQty": 2,
                "orderLoc":"BBB123",
                "unitLoc":"BBB456"
              },
              "probStatus":"active",
              "transferReason":""
            }
      }
    }
    
    this.loadProblems();
  }

  // loadProblems ****************************************
  // loads all problems
  async loadProblems() {
    try {
      var problems = await AsyncStorage.getItem("@GeminiPS:problems");
      if (problems !== null) {
        this.setState({problems:JSON.parse(problems)})
      }
    } catch (error) {
      console.log('AsyncStorage error: ' + error.message);
    }
  }

  // updateProblem ****************************************
  // used when a transferReason is added
  // or to change probStatus from "active" to either "transferred" or "resolved"
  // called in renderScene
  // input is a problem object
  updateProblem(problem) {

    // Create a copy of this.state.problems using Object.assign
    var newProblems = Object.assign({}, this.state.problems);
    // problem.isSaved = true;

    // Update all problems in newProblems using problem.id as the key
    newProblems[problem.id] = problem;

    // Call setState to replace the entire problems object with newProblems
    this.setState({problems:newProblems});
    
    // Calling saveProblems to save newProblems
    this.saveProblems(newProblems);
  }

  // deleteProblem ****************************************
  // not currently used
  // logic similar to updateProblem
  deleteProblem(problem) {
    var newProblems = Object.assign({}, this.state.problems);
    delete newProblems[problem.id];
    this.setState({problems:newProblems});
    this.saveProblems(newProblems);
  }

  // transferProblem ****************************************
  // logic similar to updateProblem
  transferProblem(problem) {
    var newProblems = Object.assign({}, this.state.problems);
    newProblems[problem.probStatus] = "transferred";
    this.setState({problems:newProblems});
    this.saveProblems(newProblems);
  }

  // saveProblems ****************************************
  async saveProblems(problems) {
    try {
      await AsyncStorage.setItem("@GeminiPS:problems", JSON.stringify(problems));
    } catch (error) {
      console.log('AsyncStorage error: ' + error.message);
    }
  }

  // renderScene ****************************************
  renderScene(route, navigator) {
    switch (route.name) {
      case 'home':
        return (
        <HomeScreen 
          msg = {this.state.msg}
          navigator={navigator} 
          problems={_(this.state.problems).toArray()} 
          onSelectProblem={(problem) => navigator.push({name:"problem", problem: problem})}
        />
      );

      case 'problem':
        return (
        <ProblemDetailsScreen
          navigator={navigator}
          problem={route.problem} 
        />
      );      

      case 'accept':
        return (
        <ProblemStepScreen
          msg = {this.state.msg}
          navigator={navigator}
          problem={route.problem}
          index = {0} 
          onChangeProblem={(problem) => this.updateProblem(problem)}
        />
      );

      case 'transfer':
      return (
        <TransferScreen 
          msg = {this.state.msg}
          navigator={navigator}
          problem={route.problem} 
          onChangeProblem={(problem) => this.updateProblem(problem)}
        />
      ); 
      
    }
  }   

  // render ****************************************
  render () {
    return (
      <Navigator
        initialRoute={{name: 'home'}}
        renderScene={this.renderScene.bind(this)}
        navigationBar={
          <Navigator.NavigationBar
            routeMapper={NavigationBarRouteMapper}
            style={styles.navBar}
          />
        }
        
        onTransferProblem={(problem) => this.transferProblem(problem)} 
      />
    );
  }
}

// Styles ************************************
const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5FCFF',
  },

  navContainer: {
    flex: 1
  },

  navBar: {
    backgroundColor: '#5B29C1',
    borderBottomColor: '#48209A',
    borderBottomWidth: 1
  },

  navBarTitleText: {
    color: 'white',
    fontSize: 16,
    fontWeight: '500',
    marginVertical: 9
  },

  navBarLeftButton: {
    paddingLeft: 10
  },

  navBarRightButton: {
    paddingRight: 10
  },

  navBarButtonText: {
    color: '#EEE',
    fontSize: 16,
    marginVertical: 10
  }
});

AppRegistry.registerComponent('GeminiPS', () => GeminiPS);
