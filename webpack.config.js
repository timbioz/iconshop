const path = require("path");
const webpack = require("webpack");
const ExtractTextPlugin = require("extract-text-webpack-plugin");
const CleanWebpackPlugin = require("clean-webpack-plugin");

const extractSass = new ExtractTextPlugin({
    filename: "style.css"
});


module.exports = {
    devtool: "source-map",
    entry: "./src/index.js",
    output: {
        filename: "js/bundle.js",
        path: path.resolve(__dirname, "assets")
    },
    module: {
        rules: [
            {
                test: /\.(css|scss)$/,
                use: ExtractTextPlugin.extract({
                    fallback: 'style-loader',
                    use: [{
                        loader: 'css-loader',
                        options: {
                            minimize: true,
                            sourceMap: true,
                            importLoaders: 2
                        }
                    }, {
                        loader: 'postcss-loader',
                        options: {
                            sourceMap: true
                        }

                    }, {
                        loader: 'sass-loader',
                        options: {
                            sourceMap: true
                        }
                    }]
                })
            }
        ]
    },
    plugins: [
        new CleanWebpackPlugin(["dist"]),
        extractSass,
        new webpack.BannerPlugin({
            banner: `
/*
 Theme Name:   Icon Shop
 Theme URI:    http://example.com/twenty-fifteen-child/
 Description:  Twenty Fifteen Child Theme
 Author:       Timbioz
 Author URI:   http://example.com
 Template:     storefront
 Version:      1.0.0
 License:      GNU General Public License v2 or later
 License URI:  http://www.gnu.org/licenses/gpl-2.0.html
 Tags:         light, dark, two-columns, right-sidebar, responsive-layout, accessibility-ready
 Text Domain:  twenty-fifteen-child
*/
          `, // the banner as string, it will be wrapped in a comment
            raw: true, // if true, banner will not be wrapped in a comment
            entryOnly: true
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
