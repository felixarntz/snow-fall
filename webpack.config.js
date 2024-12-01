/**
 * External dependencies
 */
const path = require( 'path' );
const CopyWebpackPlugin = require( 'copy-webpack-plugin' );

/**
 * WordPress dependencies
 */
const config = require( '@wordpress/scripts/config/webpack.config' );

module.exports = {
	...config,
	entry: () => {
		return {};
	},
	plugins: [
		...config.plugins,
		new CopyWebpackPlugin( {
			patterns: [
				{
					from: path.resolve(
						__dirname,
						'node_modules/@11ty/is-land/is-land.js'
					),
					to: path.resolve( __dirname, 'js/is-land.js' ),
				},
				{
					from: path.resolve(
						__dirname,
						'node_modules/@zachleat/snow-fall/snow-fall.js'
					),
					to: path.resolve( __dirname, 'js/snow-fall.js' ),
				},
			],
		} ),
	],
};
