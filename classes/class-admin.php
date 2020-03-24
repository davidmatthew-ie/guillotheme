<?php
/**
 * The file that defines the admin class.
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
 * The admin class.
 *
 * @package    Guillotheme
 * @subpackage Guillotheme/classes
 */
class Admin {

	/**
	 * The class constructor.
	 */
	public function __construct() {
		add_action( 'admin_menu', array( $this, 'create_submenu' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_js' ) );
    }
    
    /**
	 * Create the submenu page.
	 */
    public function create_submenu() {
		add_submenu_page(
            'options-general.php',
            'Guillotheme Settings',
            'Guillotheme',
            'manage_options',
            'guillotheme',
            array( $this, 'admin_html' )
        );
	}
	
	/**
	 * Enqueue admin script.
	 */
    public function admin_js() {
		wp_enqueue_script( 'guillotheme-js', esc_url( plugins_url() . '/guillotheme/js/admin.js' ), array(), GUILLOTHEME_VERSION );
	}
	
	/**
	 * Callback to render the submenu page markup.
	 */
    public function admin_html() {
    
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
		}

        ?>

        <div class="wrap">
        	
			<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        
			<form action="options.php" method="post">
			
			<?php
			settings_fields( 'guillotheme' );
			do_settings_sections( 'guillotheme' );
			submit_button( 'Save Settings' );
			?>

			</form>

		</div>

        <?php
	}
}
