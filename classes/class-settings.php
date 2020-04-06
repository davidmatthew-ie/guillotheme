<?php
/**
 * The file that defines the settings class.
 *
 * @package    Guillotheme
 * @subpackage Guillotheme/classes
 */

// Define the theme namespace.
Namespace Guillotheme;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The settings class.
 *
 * @package    Guillotheme
 * @subpackage Guillotheme/classes
 */
class Settings {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		add_action( 'admin_init', array( $this, 'create_settings' ) );
	}
    
	/**
	 * Initialize the settings section.
	 */
	public function create_settings() {
		register_setting( 'guillotheme', 'guillotheme_settings' );
	
		add_settings_section( 'section_main', '', '', 'guillotheme' );

		add_settings_field(
			'redirect_to',
			__( 'Internal Redirects', 'guillotheme' ),
			array( $this, 'redirect_to_cb' ),
			'guillotheme',
			'section_main'
		);

		add_settings_field(
			'custom_url',
			__( 'Custom URL', 'guillotheme' ),
			array( $this, 'custom_url_cb' ),
			'guillotheme',
			'section_main'
		);
	}

	/**
	 * The redirect_to field callback.
	 */
	public function redirect_to_cb() {
		$options = get_option( 'guillotheme_settings' );
		
		// Initialize default if not set.
		$options['redirect_to'] = isset( $options['redirect_to'] ) ? $options['redirect_to'] : 'admin';

		?>

		<fieldset>
		
			<label for="redirect-1">
				<input type="radio" id="redirect-1" name="guillotheme_settings[redirect_to]" value="admin" <?php checked( 'admin', $options['redirect_to'], true ); ?>>
				<?php _e( 'Redirect post and page permalinks back to the editor page' , 'guillotheme' ); ?>
			</label>
			
			<br>

			<label for="redirect-2">
				<input type="radio" id="redirect-2" name="guillotheme_settings[redirect_to]" value="custom" <?php checked( 'custom', $options['redirect_to'], true ); ?>>
				<?php _e( 'Redirect to your own custom url (enter below)' , 'guillotheme' ); ?>
			</label>

		</fieldset>
		
		<?php
	}

	/**
	 * The custom_url field callback.
	 */
	public function custom_url_cb() {
		$options = get_option( 'guillotheme_settings' );

		// Initialize default if not set.
		$options['custom_url'] = isset( $options['custom_url'] ) ? $options['custom_url'] : 'https://your-custom-url.com';

		?>

		<label for="custom-url">
			<input id="custom-url" type="url" class="regular-text code" name="guillotheme_settings[custom_url]" value="<?php echo esc_url( $options['custom_url'] ); ?>">
		</label>
		
		<?php
	}        
}
