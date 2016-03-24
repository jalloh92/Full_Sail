import React, {
  AppRegistry,
  Navigator,
  StyleSheet,
  View,
  Text,
  StatusBarIOS,
  AsyncStorage
} from 'react-native';

var _ = require('underscore');


import HomeScreen from './App/Components/HomeScreen';
import SimpleButton from './App/Components/SimpleButton';
import NoteScreen from './App/Components/NoteScreen';

var NavigationBarRouteMapper = {

  LeftButton: function(route, navigator, index, navState) {
    switch (route.name) {
      case 'createNote':
        return (
          <SimpleButton
            onPress={() => navigator.pop()}
            customText='Back'
            style={styles.navBarLeftButton}
            textStyle={styles.navBarButtonText}
           />
        );
      default:
        return null;
    }
  },

  RightButton: function(route, navigator, index, navState) {
    switch (route.name) {
      case 'home':
        return (
          <SimpleButton
            onPress={() => {
              navigator.push({
                name: 'createNote',
                note: {
                  id: new Date().getTime(),
                  title: '',
                  body: ''
                }  
              });
            }}
            customText='Create Note'
            style={styles.navBarRightButton}
            textStyle={styles.navBarButtonText}
          />
        );

      case 'createNote':
        if (route.note.isSaved) {
          return (
            <SimpleButton
              onPress={
                () => {
                  navigator.props.onDeleteNote(route.note);
                  navigator.pop();
                }
              }
              customText='Delete'
              style={styles.navBarRightButton}
              textStyle={styles.navBarButtonText}
              />
          );
        } else {
          return null;
        }
      
      default:
         return null;
    }
  },

  Title: function(route, navigator, index, navState) {
    switch (route.name) {
      case 'home':
        return (
          <Text style={styles.navBarTitleText}>React Notes</Text>
        );
      case 'createNote':
        return (
          <Text style={styles.navBarTitleText}>
            {route.note ? route.note.title : 'Create Note'}
          </Text>
        );
    }
  }
};

class AwesomeProject extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      selectedNote: {title:"", body:""},
      notes: {
        1: {title: "Note 1", body: "body", id: 1},
        2: {title: "Note 2", body: "body", id: 2}
      }
    }
    this.loadNotes();
  }

  async loadNotes() {
    try {
      var notes = await AsyncStorage.getItem("@AwesomeProject:notes");
      if (notes !== null) {
        this.setState({notes:JSON.parse(notes)})
      }
    } catch (error) {
      console.log('AsyncStorage error: ' + error.message);
    }
  }

  updateNote(note) {
    var newNotes = Object.assign({}, this.state.notes);
    note.isSaved = true;
    newNotes[note.id] = note;
    this.setState({notes:newNotes});
    this.saveNotes(newNotes);
  }

  deleteNote(note) {
    var newNotes = Object.assign({}, this.state.notes);
    delete newNotes[note.id];
    this.setState({notes:newNotes});
    this.saveNotes(newNotes);
  }

  async saveNotes(notes) {
    try {
      await AsyncStorage.setItem("@AwesomeProject:notes", JSON.stringify(notes));
    } catch (error) {
      console.log('AsyncStorage error: ' + error.message);
    }
  }

  renderScene(route, navigator) {
    switch (route.name) {
      case 'home':
        return (
        <HomeScreen navigator={navigator} 
        notes={_(this.state.notes).toArray()} 
        onSelectNote={(note) => navigator.push({name:"createNote", note: note})}/>);
      case 'createNote':
      return (
          <NoteScreen 
            note={route.note} 
            onChangeNote={(note) => this.updateNote(note)}
          />
        );
    }
  }    

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
        onDeleteNote={(note) => this.deleteNote(note)}
      />
    );
  }  
}

var styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
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
    marginVertical: 9  // iOS
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
    marginVertical: 10 // iOS
  }

});

AppRegistry.registerComponent('AwesomeProject', () => AwesomeProject);