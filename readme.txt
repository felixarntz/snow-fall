=== Snow Fall ===

Plugin Name:  Snow Fall
Plugin URI:   https://wordpress.org/plugins/snow-fall/
Author:       Felix Arntz
Author URI:   https://felix-arntz.me
Contributors: flixos90
Donate link:  https://felix-arntz.me/wordpress-plugins/
Tested up to: 6.8
Stable tag:   1.0.1
License:      GPLv2 or later
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Tags:         falling snow, winter, christmas, holiday, lightweight

Adds a subtle snow fall effect to your website, using a lightweight web component.

== Description ==

This plugin adds a subtle snow fall effect to your website, using the lightweight `<snow-fall>` JavaScript web component by [Zach Leatherman](https://www.zachleat.com).

* [Learn more about the `<snow-fall>` component](https://www.zachleat.com/web/snow-fall)
* [Demo of the `<snow-fall>` component](https://zachleat.github.io/snow-fall/demo.html)

The plugin takes a no-frills, zero-config approach - you simply activate the plugin, and it just works - thanks to the excellent underlying web component implementation. There should be no notable adverse effects on performance, also given the plugin uses the [WordPress Script Modules API](https://make.wordpress.org/core/2024/03/04/script-modules-in-6-5/) that was introduced in WordPress 6.5.

The plugin respects user preferences for reduced motion, as a best practice for accessibility.

Additional credit: [Banner image by Adam Chang](https://unsplash.com/photos/snow-field-and-green-pine-trees-during-daytime-IWenq-4JHqo)

= License =

The Snow Fall plugin is [licensed under the GPLv2 (or later)](https://www.gnu.org/licenses/gpl-2.0.html).

The `<snow-fall>` and `<is-land>` web components are [licensed under the MIT license](https://opensource.org/license/mit).

See their source code on GitHub:

* [`zachleat/snow-fall`](https://github.com/zachleat/snow-fall)
* [`11ty/is-land`](https://github.com/11ty/is-land)

== Installation ==

1. Upload the entire `snow-fall` folder to the `/wp-content/plugins/` directory or download it through the WordPress backend.
2. Activate the plugin through the 'Plugins' menu in WordPress.

== Frequently Asked Questions ==

= Where can I configure the plugin? =

This plugin doesn't come with a settings screen or options of any kind. You install it, and it just works.

= Does the plugin support reduced motion preferences? =

Yes! For better accessibility, for clients that are configured to reduce motion the snow fall effect will not show.

The `prefers-reduced-motion` media query is used to detect such a preference.

= Where should I submit my support request? =

For regular support requests, please use the [wordpress.org support forums](https://wordpress.org/support/plugin/snow-fall). If you have a technical issue with the plugin where you already have more insight on how to fix it, you can also [open an issue on GitHub instead](https://github.com/felixarntz/snow-fall/issues).

= How can I contribute to the plugin? =

If you have ideas to improve the plugin or to solve a bug, feel free to raise an issue or submit a pull request in the [GitHub repository for the plugin](https://github.com/felixarntz/snow-fall). Please stick to the [contributing guidelines](https://github.com/felixarntz/snow-fall/blob/main/CONTRIBUTING.md).

You can also contribute to the plugin by translating it. Simply visit [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/snow-fall) to get started.

== Changelog ==

= 1.0.1 =

* Fix reduced motion preference not working due to loading order.
* Update `snow-fall` web component to 1.0.3.

= 1.0.0 =

* Initial stable release on wordpress.org.

= 1.0.0-RC =

* Initial release candidate.
