<?php
/**
 * Plugin Name: Shibbir Listing
 * Description: A directory listing plugin by Shibbir Ahmed
 * Plugin URI: https://shibbir.dev
 * Author: Shibbir Ahmed
 * Author URI: https://shibbir.dev
 * Version: 1.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
final class Shibbir_Listing {

    /**
     * Plugin version
     *
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activate' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
        add_filter( 'register_url', [ $this, 'change_register_url' ] );        
        add_filter( 'login_url', [ $this, 'change_login_url' ], 10, 3 );
    }

    /**
     * Change default registration URL
     * 
     * @since 1.0.0
     * 
     * @return string
     */
    public function change_register_url($url) {
        if (is_admin()) {
            return $url;
        }
        return site_url('/registration');
    }

    /**
     * Change default login URL
     * 
     * @since 1.0.0
     * 
     * @return string
     */
    public function change_login_url($login_url, $redirect, $force_reauth) {
        $login_url = site_url('/login');
        if (!empty($redirect)) {
            $login_url = add_query_arg('redirect_to', $redirect, $login_url);
        }
        if ($force_reauth) {
            $login_url =  add_query_arg('reauth', 1, $login_url);
        }
        return $login_url;
    }

    /**
     * Initializes a singleton instance
     *
     * @return \Shibbir_Listing
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'SHIBBIR_LISTING_VERSION', self::version );
        define( 'SHIBBIR_LISTING_FILE', __FILE__ );
        define( 'SHIBBIR_LISTING_PATH', __DIR__ );
        define( 'SHIBBIR_LISTING_URL', plugins_url( '', SHIBBIR_LISTING_FILE ) );
        define( 'SHIBBIR_LISTING_ASSETS_URL', SHIBBIR_LISTING_URL . '/assets' );
    }

    /**
     * Initialize the plugin
     *
     * @return void
     */
    public function init_plugin() {

        new Shibbir\Listing\Assets();

        if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
            new Shibbir\Listing\Ajax();
        }

        if ( is_admin() ) {            
            new Shibbir\Listing\Admin();
        } else {            
            new Shibbir\Listing\Frontend();
        }

    }

    /**
     * Do stuff upon plugin activation
     *
     * @return void
     */
    public function activate() {
        $installer = new Shibbir\Listing\Installer();
        $installer->run();
    }
}

/**
 * Initializes the main plugin
 *
 * @return \Shibbir_Listing
 */
function Shibbir_Listing() {
    return Shibbir_Listing::init();
}

// kick-off the plugin
Shibbir_Listing();
