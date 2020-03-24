<?php
/**
 * The main plugin file.
 *
 * @package           Guillotheme
 * Plugin Name:       Guillotheme
 * Description:       Chops the head right off your WordPress theme, disabling the front-end.
 * Version:           1.0.0
 * Author:            David Matthew
 * Author URI:        https://davidmatthew.ie
 * License:           GPL-3
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       guillotheme
 * Domain Path:       /languages
 */

// Define the plugin namespace.
Namespace Guillotheme;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Current plugin version, manually defined for performance reasons.
define( 'GUILLOTHEME_VERSION', '1.0.0' );

// Load the core plugin class and create a plugin instance.
require plugin_dir_path( __FILE__ ) . 'classes/class-guillotheme.php';
new Guillotheme();
