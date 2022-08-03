const path = require('path')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const magicImporter = require('node-sass-magic-importer')
const CopyPlugin = require('copy-webpack-plugin')

const config = {
	entry: {
		frontend: './assets/src/js/frontend.js',
		backend: './assets/src/js/backend.js',
	},
	output: {
		path: path.resolve(__dirname, '../assets/public/js'),
		filename: '[name].js',
	},
	module: {
		rules: [
			{
				test: /\.js$/,
				use: 'babel-loader',
				exclude: /node_modules/,
			},
			{
				test: /\.css$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: {
							importLoaders: 1,
						},
					},
					'postcss-loader',
				],
			},
			{
				test: /\.scss$/,
				use: [
					MiniCssExtractPlugin.loader,
					{
						loader: 'css-loader',
						options: { url: false },
					},
					{
						loader: 'sass-loader',
						options: {
							sassOptions: {
								importer: magicImporter(),
							},
						},
					},
				],
			},
			{
				test: /\.(jpe?g|png|gif|svg)$/i,
				type: 'asset',
			},
			{
				test: /\.(jpe?g|png|gif|svg)$/i,
				use: [
					{
						loader: 'file-loader',
					},
				],
			},
		],
	},
	plugins: [
		new MiniCssExtractPlugin({ filename: '../css/[name].css' }),
		new CopyPlugin({
			patterns: [
				{
					from: 'assets/src/images',
					to: '../images',
				},
			],
		}),
	],
}

module.exports = config
