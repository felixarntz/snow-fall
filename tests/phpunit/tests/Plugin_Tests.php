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

		$controller = wp_script_modules();
		$registered = $this->get_registered_script_modules( $controller );
		$is_land_enqueued   = $this->is_script_module_enqueued( $controller, 'is-land', $registered );
		$snow_fall_enqueued = $this->is_script_module_enqueued( $controller, 'snow-fall', $registered );

		// Restore original `$wp_script_modules`.
		$wp_script_modules = $orig_wp_script_modules;

		// Ensure that script modules have been registered but not enqueued.
		$this->assertArrayHasKey( 'is-land', $registered );
		$this->assertArrayHasKey( 'snow-fall', $registered );
		$this->assertFalse( $is_land_enqueued );
		$this->assertFalse( $snow_fall_enqueued );
	}

	public function test_snow_fall_enqueue_script_modules() {
		global $wp_script_modules;

		// Store original `$wp_script_modules`, then reset it.
		$orig_wp_script_modules = wp_script_modules();
		$wp_script_modules      = null;

		snow_fall_register_script_modules();
		snow_fall_enqueue_script_modules();

		$controller = wp_script_modules();
		$registered = $this->get_registered_script_modules( $controller );
		$is_land_enqueued   = $this->is_script_module_enqueued( $controller, 'is-land', $registered );
		$snow_fall_enqueued = $this->is_script_module_enqueued( $controller, 'snow-fall', $registered );

		// Restore original `$wp_script_modules`.
		$wp_script_modules = $orig_wp_script_modules;

		// Ensure that script modules have been registered and enqueued.
		$this->assertArrayHasKey( 'is-land', $registered );
		$this->assertArrayHasKey( 'snow-fall', $registered );
		$this->assertTrue( $is_land_enqueued );
		$this->assertTrue( $snow_fall_enqueued );
	}

	public function test_snow_fall_print_web_component() {
		$output = get_echo( 'snow_fall_print_web_component' );

		$this->assertStringContainsString( '<snow-fall></snow-fall>', $output );
		$this->assertStringContainsString( ' on:media="(prefers-reduced-motion: no-preference)"', $output );
	}

	/**
	 * Returns the private registered script modules map from WP_Script_Modules.
	 *
	 * @param WP_Script_Modules $controller Script modules controller.
	 * @return array<string, array<string, mixed>>
	 */
	private function get_registered_script_modules( $controller ) {
		$prop = new ReflectionProperty( $controller, 'registered' );
		$prop->setAccessible( true );
		$registered = $prop->getValue( $controller );
		$prop->setAccessible( false );

		return $registered;
	}

	/**
	 * Checks whether a script module is marked as enqueued.
	 *
	 * WordPress 6.5–6.8 store enqueue state on each entry in `$registered` as an
	 * `enqueue` boolean. WordPress 6.9+ tracks enqueued IDs in a separate `$queue`
	 * (exposed via `WP_Script_Modules::get_queue()`).
	 *
	 * @param WP_Script_Modules                   $controller Script modules controller.
	 * @param string                              $id         Script module identifier.
	 * @param array<string, array<string, mixed>> $registered Registered modules map.
	 * @return bool
	 */
	private function is_script_module_enqueued( $controller, $id, $registered ) {
		// WordPress 6.9+: enqueue state lives on a dedicated queue.
		if ( method_exists( $controller, 'get_queue' ) ) {
			return in_array( $id, $controller->get_queue(), true );
		}

		// WordPress 6.5–6.8: enqueue state is stored on the registered entry.
		return ! empty( $registered[ $id ]['enqueue'] );
	}
}
