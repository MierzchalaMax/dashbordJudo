const webpack = require("webpack");
const path = require('path');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
// const OptimizeCSSAssetsPlugin = require('optimize-css-assets-webpack-plugin')
const devMode = process.env.MODE_ENV !== 'production';

module.exports = {
  /**
   * I/O CONFIG
   */
  entry: {
    App: './src/index.js',
    ressources: './ressources/index.js'
  },
  output: {
    filename: './[name].bundle.js',
    path: __dirname + '/public/bundle/'
  },
//   watchOptions: {
//     aggregateTimeout: 1000,
//     poll: 1000
//   },
  /**
   * MODULES CONFIG
   */
  module:{
    rules:[
      /**
       * REGEX SCSS||SASS => MiniCssExtractPlugin
       */
      {
      test: /\.(sa|sc|c)ss$/,
      exclude: /node_module/,
      use: [
        {
          loader: MiniCssExtractPlugin.loader,
          options: {
            hmr: process.env.NODE_ENV === 'development'
          },
        },
        {loader:'css-loader', options: {url: false}},
        // 'postcss-loader',
        'sass-loader',
      ],
    }, 
    /**
     * REGEX JS => MiniCssExtractPlugin
     */
    {
      // test: /\.m?js$/,
      test: /\.js$/,
      exclude: /node_modules/,
      include: path.resolve(__dirname, 'public/assets/js/index.js'),
      use: "babel-loader"
      // {
      //   loader: 'babel-loader',
      //   options: {
      //     presets: ['@babel/preset-env'],
      //     plugins: ['@babel/plugin-transform-runtime']
      //   }
      // }
    }
    ]
  },
  devtool:'source-map',
  /**
   * PLUGINS CONFIG
   */
  plugins:[
    new MiniCssExtractPlugin ({
      filename: '../assets/css/style.css'
    }),
    new CopyWebpackPlugin ([  
      {from: './ressources/font', to: '../assets/font'},
      {from: './ressources/img', to: '../assets/img'},
      {from: './ressources/js', to: '../assets/js'}
      // copyUnmodified: true
    ])
  ],
   mode: devMode ? 'development': 'production'
};