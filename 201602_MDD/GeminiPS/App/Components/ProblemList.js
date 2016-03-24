// Gemini Problem Solver
// Component:  ProblemList
// Description: ProblemList will display a list of active problems for a worker to solve

// TODO:  Only show "active" problems, sort chronologically by id (timestamp)

// Dependencies ************************************
import React, {
  StyleSheet,
  Text,
  View,
  ListView,
  TouchableHighlight,
  Image
  } from 'react-native';

// class ProblemList ************************************
// TODO:  add icon based on probType?  Add styling?
export default class ProblemList extends React.Component {

  constructor (props) {
    super(props);
    this.ds = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2});
  }




  // render ************************************************
  render() {

    // Create object of only active problems *****************
    var activeProblems = Object.assign(
        {},
        this.props.problems
    );

    // Loop over active problems, remove problems that are not active
    for (var key in activeProblems){
      if(activeProblems[key].probStatus != "active"){
        delete activeProblems[key];
      }
    }

    return (
      <ListView
        dataSource={this.ds.cloneWithRows(this.props.problems)}
        // Currently turned off activeProblems for dev...but it works!
        // dataSource={this.ds.cloneWithRows(activeProblems)}
        renderRow={(rowData) => {
          return (
            <TouchableHighlight
              onPress={() => this.props.onSelectProblem(rowData)}
              style={styles.rowStyle}
              underlayColor="#9E7CE3"
            >
            <View>  
                <Text style={styles.titleText}>Problem ID: {rowData.id}</Text>
                <Text>Problem Type: {rowData.probType}</Text>
                <Text>Problem Location: {rowData.order.orderLoc}</Text>
                <Text>Problem Status: {rowData.probStatus}</Text>
                <Text>Transfer Reason: {rowData.transferReason}</Text>
            </View>  
            </TouchableHighlight>              
          )
        }
      }/>
    )
  }
}


// Styles ************************************
// TODO:  Update styles
var styles = StyleSheet.create({
  rowStyle: {
    borderBottomColor: '#9E7CE3',
    borderBottomWidth: 1,
    padding: 20,
  },

    titleText: {
    fontSize: 16,
    fontWeight: 'bold',
  }

  
});