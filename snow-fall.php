<?php
/**
 * Plugin main file.
 *
 * @package SnowFall
 * @author Felix Arntz <hello@felix-arntz.me>
 *
 * @wordpress-plugin
 * Plugin Name: Snow Fall
 * Plugin URI: https://wordpress.org/plugins/snow-fall/
 * Description: Adds a subtle snow fall effect to your website, using a lightweight web component.
 * Version: 1.0.0
 * Requires at least: 6.5
 * Requires PHP: 7.2
 * Author: Felix Arntz
 * Author URI: https://felix-arntz.me
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: snow-fall
 * Tags: falling snow, winter, christmas, holiday, lightweight
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the JavaScript modules.
 *
 * @since 1.0.0
 */
function snow_fall_register_script_modules(): void {
	wp_register_script_module(
		'is-land',
		plugin_dir_url( __FILE__ ) . 'js/is-land.js',
		array(),
		'4.0.0'
	);
	wp_register_script_module(
		'snow-fall',
		plugin_dir_url( __FILE__ ) . 'js/snow-fall.js',
		array( 'is-land' ),
		'1.0.2'
	);
}
add_action( 'init', 'snow_fall_register_script_modules', 0 );

/**
 * Enqueues the JavaScript modules.
 *
 * @since 1.0.0
 */
function snow_fall_enqueue_script_modules(): void {
	wp_enqueue_script_module( 'snow-fall' );
	wp_enqueue_script_module( 'is-land' );
}
add_action( 'wp_enqueue_scripts', 'snow_fall_enqueue_script_modules' );

/**
 * Prints the web component output.
 *
 * @since 1.0.0
 */
function snow_fall_print_web_component(): void {
	?>
	<is-land on:media="(prefers-reduced-motion: no-preference)" on:idle>
		<snow-fall></snow-fall>
	</is-land>
	<?php
}
add_action( 'wp_footer', 'snow_fall_print_web_component', 100 );
