[![PHP Unit Testing](https://img.shields.io/github/actions/workflow/status/felixarntz/snow-fall/php-test.yml?style=for-the-badge&label=PHP%20Unit%20Testing)](https://github.com/felixarntz/snow-fall/actions/workflows/php-test.yml)
[![Codecov](https://img.shields.io/codecov/c/github/felixarntz/snow-fall?style=for-the-badge)](https://app.codecov.io/github/felixarntz/snow-fall)
[![Packagist version](https://img.shields.io/packagist/v/felixarntz/snow-fall?style=for-the-badge)](https://packagist.org/packages/felixarntz/snow-fall)
[![WordPress plugin version](https://img.shields.io/wordpress/plugin/v/snow-fall?style=for-the-badge)](https://wordpress.org/plugins/snow-fall/)
[![WordPress tested version](https://img.shields.io/wordpress/plugin/tested/snow-fall?style=for-the-badge)](https://wordpress.org/plugins/snow-fall/)
[![WordPress plugin downloads](https://img.shields.io/wordpress/plugin/dt/snow-fall?style=for-the-badge)](https://wordpress.org/plugins/snow-fall/)

# Snow Fall

![Banner for "Snow Fall"](https://github.com/felixarntz/snow-fall/blob/main/.wordpress-org/banner-1544x500.png?raw=true)

This plugin adds a subtle snow fall effect to your website, using the lightweight `<snow-fall>` JavaScript web component by [Zach Leatherman](https://www.zachleat.com).

* [Learn more about the `<snow-fall>` component](https://www.zachleat.com/web/snow-fall)
* [Demo of the `<snow-fall>` component](https://zachleat.github.io/snow-fall/demo.html)

The plugin takes a no-frills, zero-config approach - you simply activate the plugin, and it just works - thanks to the excellent underlying web component implementation. There should be no notable adverse effects on performance, also given the plugin uses the [WordPress Script Modules API](https://make.wordpress.org/core/2024/03/04/script-modules-in-6-5/) that was introduced in WordPress 6.5.

The plugin respects user preferences for reduced motion, as a best practice for accessibility.

Additional credit: [Banner image by Adam Chang](https://unsplash.com/photos/snow-field-and-green-pine-trees-during-daytime-IWenq-4JHqo)

## Installation and usage

You can download the latest version from the [WordPress plugin repository](https://wordpress.org/plugins/snow-fall/).

Please see the [plugin repository installation instructions](https://wordpress.org/plugins/snow-fall/#installation) for detailed information on installation and the [plugin repository FAQ](https://wordpress.org/plugins/snow-fall/#faq) for additional details on usage and customization.

Alternatively, if you use Composer to manage your WordPress site, you can also [install the plugin from Packagist](https://packagist.org/packages/felixarntz/snow-fall):

```
composer require felixarntz/snow-fall:^1.0
```

## Contributions

If you have ideas to improve the plugin or to solve a bug, feel free to raise an issue or submit a pull request right here on GitHub. Please refer to the [contributing guidelines](https://github.com/felixarntz/snow-fall/blob/main/CONTRIBUTING.md) to learn more and get started.

You can also contribute to the plugin by translating it. Simply visit [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/snow-fall) to get started.

## License

The Snow Fall plugin is [licensed under the GPLv2 (or later)](https://www.gnu.org/licenses/gpl-2.0.html).

The `<snow-fall>` and `<is-land>` web components are [licensed under the MIT license](https://opensource.org/license/mit).
