const path = require("path");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");

const extractSass = new ExtractTextPlugin({
  filename: "css/[name].css"
});

module.exports = {
  devServer: {
    contentBase: "./dist",
    port: "3200"
  },
  devtool: "source-map",
  entry: "./src/index.js",
  output: {
    filename: "js/bundle.js",
    path: path.resolve(__dirname, "dist")
  },
  module: {
    rules: [
      {
        test: /\.css$/,
        use: extractSass.extract({
          use: ["css-loader"],
          fallback: "style-loader"
        })
      },
      {
        test: /\.scss$/,
        use: extractSass.extract({
          use: [
            {
              loader: "css-loader"
            },
            {
              loader: "sass-loader"
            }
          ],
          fallback: "style-loader"
        })
      }
    ]
  },
  plugins: [
    new CleanWebpackPlugin(["dist"]),
    extractSass,
    new HtmlWebpackPlugin({
      filename: "./index.html",
      template: "./src/views/index.html"
    })
  ],
  resolve: {
    extensions: [".js", ".css", ".scss", ".json"],
    alias: {
      jquery: path.resolve(__dirname, "./node_modules/jquery/dist/jquery.js"),
      bootstrap_css: path.resolve(__dirname, "./node_modules/bootstrap/dist/css/bootstrap.css"),
      bootstrap_js: path.resolve(__dirname, "./node_modules/bootstrap/dist/js/bootstrap.js"),
      popper_js: path.resolve(__dirname, "./node_modules/popper.js/dist/popper.js")
    }
  }
};
