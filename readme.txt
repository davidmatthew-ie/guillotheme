=== Guillotheme ===
Contributors: davidmatthew
Tags: translation-ready, headless, decoupled
Requires at least: 5.0
Tested up to: 5.3.2
Requires PHP: 7.0
Stable tag: 1.0.0
License: GNU GPL v3
License URI: https://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Guillotheme chops the front-end (i.e. the head) right off your theme by restricting access to the front-end (specifically, the WordPress-generated front-end permalinks). These are unnecessary in the case of a headless or decoupled set-up, and could potentially confuse non-technical users or other content editors when WordPress is being used headlessly (i.e. purely for its CMS capabilities).

== Features ==

* Designed to complement a headless setup.
* Activate the plugin to automatically prevent access to WordPress-generated front-end permalinks.
* For logged-in users, redirect back to the source page if the front-end is accessed (e.g. a post preview link within the editor will redirect back to the editor).
* Non-logged in users are redirected to the login page.
* Optionally use your own custom url for the redirect destination for both logged-in and logged-out users.

== Development ==

* Namespaced and object-oriented code.
* Adheres to [WordPress Coding Standards](https://github.com/WordPress/WordPress-Coding-Standards).

== Installation ==

1. No special set-up required - just click install and activate, and you're good to go!
2. If you manually download the plugin, just unzip to the WordPress plugins folder and the plugin will be automatically detected. It can then be activated as normal.

== Screenshots ==

1. The default redirect configuration.
2. Using your own custom url as the redirect destination.

== Changelog ==

= 1.0.0 =
* Initial release.
