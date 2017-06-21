const webpack = require('webpack');
const path = require('path');

const config = {
    context: path.resolve(__dirname, 'sources/js'),
    entry: './main.js',
    output: {
        path: path.resolve(__dirname, 'dist/assets/js/'),
        filename: 'scripts.min.js'
    },
    module: {
        rules: [{
            test: /\.js$/,
            include: path.resolve(__dirname, 'sources/js'),
            use: [{
                loader: 'babel-loader',
            }]
        }, {
            test: /\.scss$/,
            use: [
                'style-loader',
                'css-loader',
                'sass-loader'
            ]
        },
        ]
    }
};

module.exports = config;