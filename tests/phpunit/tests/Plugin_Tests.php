<?php
/**
 * Tests for the plugin main file.
 *
 * @package SnowFall\Tests
 * @author Felix Arntz <hello@felix-arntz.me>
 */

class Snow_Fall_Tests extends WP_UnitTestCase {

	public function test_hooks() {
		$this->assertSame( 0, has_action( 'init', 'snow_fall_register_script_modules' ) );
		$this->assertSame( 10, has_action( 'wp_enqueue_scripts', 'snow_fall_enqueue_script_modules' ) );
		$this->assertSame( 100, has_action( 'wp_footer', 'snow_fall_print_web_component' ) );
	}

	public function test_snow_fall_register_script_modules() {
		global $wp_script_modules;

		// Store original `$wp_script_modules`, then reset it.
		$orig_wp_script_modules = wp_script_modules();
		$wp_script_modules      = null;

		snow_fall_register_script_modules();

		$registered = $this->get_registered_script_modules();

		// Restore original `$wp_script_modules`.
		$wp_script_modules = $orig_wp_script_modules;

		// Ensure that script modules have been registered but not enqueued.
		$this->assertArrayHasKey( 'is-land', $registered );
		$this->assertArrayHasKey( 'snow-fall', $registered );
		$this->assertFalse( $registered['is-land']['enqueue'] );
		$this->assertFalse( $registered['snow-fall']['enqueue'] );
	}

	public function test_snow_fall_enqueue_script_modules() {
		global $wp_script_modules;

		// Store original `$wp_script_modules`, then reset it.
		$orig_wp_script_modules = wp_script_modules();
		$wp_script_modules      = null;

		snow_fall_register_script_modules();
		snow_fall_enqueue_script_modules();

		$registered = $this->get_registered_script_modules();

		// Restore original `$wp_script_modules`.
		$wp_script_modules = $orig_wp_script_modules;

		// Ensure that script modules have been registered but not enqueued.
		$this->assertArrayHasKey( 'is-land', $registered );
		$this->assertArrayHasKey( 'snow-fall', $registered );
		$this->assertTrue( $registered['is-land']['enqueue'] );
		$this->assertTrue( $registered['snow-fall']['enqueue'] );
	}

	public function test_snow_fall_print_web_component() {
		$output = get_echo( 'snow_fall_print_web_component' );

		$this->assertStringContainsString( '<snow-fall></snow-fall>', $output );
		$this->assertStringContainsString( ' on:media="(prefers-reduced-motion: no-preference)"', $output );
	}

	private function get_registered_script_modules() {
		$controller_instance = wp_script_modules();

		$prop = new ReflectionProperty( $controller_instance, 'registered' );
		$prop->setAccessible( true );
		$registered = $prop->getValue( $controller_instance );
		$prop->setAccessible( false );

		return $registered;
	}
}
