import React, {
  StyleSheet,
  TextInput,
  View
} from 'react-native';

// TODO:  Fix input container...TextInput doesn't render when wrapped inside

export default class NoteScreen extends React.Component {

  constructor (props) {
    super(props)
    this.state = {note:this.props.note};
  }

  updateNote(title, body) {
    var note = Object.assign(this.state.note, {title:title, body:body});
    this.props.onChangeNote(note);
    this.setState(note);
  }

  render () {
    return (
      <View style={styles.container}>
        
          <TextInput
            autoFocus={true}
            autoCapitalize="sentences"
            placeholder="Untitled"
            style={[styles.textInput, styles.title]}
            onEndEditing={(text) => {this.refs.body.focus()}}
            value={this.state.note.title}
            onChangeText={(title) => this.updateNote(title, this.state.note.body)}
          />
         
        <TextInput
          ref="body"
          multiline={true}
          placeholder="Start typing"
          style={[styles.textInput, styles.body]}
          value={this.state.note.body}
          onChangeText={(body) => this.updateNote(this.state.note.title, body)}
        />
      </View>
    );
  }
}

var styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    marginTop: 64
  },

  title: {
    height: 40
  },

  body: {
    flex: 1
  },

  inputContainer: {
    
  },

  textInput: {
    
    fontSize: 16,
  },

  
});