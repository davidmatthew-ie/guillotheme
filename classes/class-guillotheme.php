<?php
/**
 * The file containing the main Guillotheme class.
 *
 * @package Guillotheme
 * @subpackage Guillotheme/classes
 */

// Theme namespace.
Namespace Guillotheme;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The core theme class.
 */
class Guillotheme {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		$this->init_settings();
		$this->init_settings_link();
		$this->init_admin();
		add_action( 'wp', array( $this, 'redirect' ) );
		add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
	}

	/**
	 * Initialize the settings fields.
	 */
	public function init_settings() {
		require 'class-settings.php';
		new Settings();
	}

	/**
	 * Create the settings link from the plugin admin area.
	 */
	public function settings_link( $plugin_actions, $plugin_file ) {
		$g_actions = array();
		if ( basename( dirname ( dirname( __FILE__ ) ) ) . '/guillotheme.php' === $plugin_file ) {
			$g_settings_url = esc_url( add_query_arg( array( 'page' => 'guillotheme' ), admin_url( 'admin.php' ) ) );
			$g_actions['tr_settings'] = sprintf( __( '<a href="%s">Settings</a>', 'guillotheme' ), $g_settings_url );
		}
		return array_merge( $g_actions, $plugin_actions );
	}

	/**
	 * Add the settings link from the plugin admin area.
	 */
	public function init_settings_link() {
		add_filter(
			'plugin_action_links', 
			array( $this, 'settings_link' ), 
			10,
			2
		);
	}

	/**
	 * The admin setup function.
	 */
	public function init_admin() {
		require 'class-admin.php';
		new Admin();
	}

	/**
	 * Load the required translation if available.
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'guillotheme', FALSE, basename( dirname( dirname( __FILE__ ) ) ) . '/languages/' );
	}
	
	/**
	 * The redirect function.
	 */
	public function redirect() {

		if ( ! is_admin() ) {

			$options = get_option( 'guillotheme_settings' );

			if ( $options['redirect_to'] == 'custom' ) {
				
				// Redirect to the custom url.
				$custom_url = esc_url( $options['custom_url'] );
				wp_redirect( $custom_url );
				exit;

			} else {

				// Create the post edit link.
				$edit_link = admin_url( 'post.php?post=' . get_the_id() . '&action=edit' );

				if ( is_user_logged_in() ) {

					// Redirect to the post edit link.
					wp_safe_redirect( $edit_link );
					exit;

				} else {

					// Redirect to the login page.
					wp_safe_redirect( wp_login_url( $edit_link ) );
					exit;

				}
			}	
		}	
	}	
}
