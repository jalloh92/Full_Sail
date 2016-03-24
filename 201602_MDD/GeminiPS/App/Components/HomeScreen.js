// Gemini Problem Solver
// Component:  HomeScreen
// Description: HomeScreen will display the HomeScreenMsg and ProblemList

// Dependencies ************************************
import React, {
  StyleSheet,
  View,
  Text
  } from 'react-native';

// Components / Children ************************************
import HomeScreenMsg from './HomeScreenMsg'
import ProblemList from './ProblemList';

// class HomeScreen ************************************
export default class HomeScreen extends React.Component {
  render () {
    return (
      <View style={styles.container}>
        <View style={styles.topContainer}> 
          <HomeScreenMsg 
            msg = {this.props.msg}
            style={styles.homeScreenMsg}
            textStyle={styles.titleText}
          />
        </View>
        <View style={styles.bottomContainer}>   
          <Text style={styles.titleText}>
            Select a problem to solve:
          </Text>
          <ProblemList 
            problems={this.props.problems} 
            onSelectProblem={this.props.onSelectProblem}
          />
        </View>      
      </View>
    );
  }
}

// Styles ************************************
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
    flex: 4,
    justifyContent: 'center',
    alignItems: 'center',
  },

  homeScreenMsg: {

  },

  titleText: {
    fontSize: 18,
    fontWeight: 'bold',
  }

});