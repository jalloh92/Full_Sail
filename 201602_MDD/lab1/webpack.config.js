var config = {
  entry: "./public/js/App.js",
  output: {
        path: __dirname +"/public",
        filename: "app.js"
  },
  module: {
    loaders: [{
      test: /\.jsx?$/, // A regexp to test the require path. accepts either js or jsx
      loader: 'babel' // The module to load. "babel" is short for "babel-loader"
    }]
  }
};

module.exports = config;