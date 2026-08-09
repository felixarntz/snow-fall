<?php
/**
 * File with WordPress stubs needed for PHPStan.
 *
 * @package SnowFall
 */

if ( ! function_exists( 'wp_register_script_module' ) ) {
	function wp_register_script_module( string $id, string $src, array $deps = array(), $version = false ) {
		// Stub.
	}
}

if ( ! function_exists( 'wp_enqueue_script_module' ) ) {
	function wp_enqueue_script_module( string $id, string $src = '', array $deps = array(), $version = false ) {
		// Stub.
	}
}
