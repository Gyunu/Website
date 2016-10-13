var webpack = require('webpack');
module.exports = {
	context: __dirname + "/src/ts",
		entry: "./index",
		output: {
			path: __dirname + "/dist/assets/js",
			filename: "min.js"
		},
		resolve: {
			extensions: ['', '.webpack.js', '.web.js', '.ts', '.tsx', '.js']
		},
		module: {
			loaders: [
				{ test: /\.tsx?$/, loader: 'ts-loader' }
			]
		},
		plugins: [
			new webpack.optimize.UglifyJsPlugin({minimize: true})
		]
};
