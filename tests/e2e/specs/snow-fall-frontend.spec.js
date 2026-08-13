/**
 * WordPress dependencies
 */
import { test, expect } from '@wordpress/e2e-test-utils-playwright';

/*
 * The default Playwright config from @wordpress/scripts prefers reduced
 * motion. The snow-fall effect is gated behind prefers-reduced-motion:
 * no-preference (via <is-land>), so this suite opts back into motion.
 */
test.use( {
	contextOptions: {
		reducedMotion: 'no-preference',
	},
} );

test.describe( 'Snow fall frontend effect', () => {
	test( 'Snow fall effect is present on the frontend', async ( { page } ) => {
		await page.goto( '/' );

		const snowFall = page.locator( 'snow-fall' );
		await expect( snowFall ).toBeAttached();

		await expect
			.poll( async () => {
				return await snowFall.evaluate( ( el ) => {
					return el.shadowRoot?.childElementCount ?? 0;
				} );
			} )
			.toBeGreaterThan( 0 );

		const hasAnimation = await snowFall.evaluate( ( el ) => {
			const flake = el.shadowRoot?.firstElementChild;
			if ( ! flake ) {
				return false;
			}
			const { animationName } = getComputedStyle( flake );
			return animationName !== 'none' && animationName !== '';
		} );
		expect( hasAnimation ).toBe( true );
	} );
} );
