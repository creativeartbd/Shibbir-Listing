<?php

namespace Shibbir\Listing\Frontend;

/**
 * Shortcode handler class
 */
class Shortcode {

    /**
     * Initializes the class
     */
    public function __construct() {                
        add_shortcode( 'sl_login', [ $this, 'render_sl_login' ] );
        add_shortcode( 'sl_registration', [ $this, 'render_sl_registration' ] );
        add_shortcode( 'sl_add_new_listing', [ $this, 'render_sl_add_new_listing' ] );
    }
    
    /**
     * Login page shortcode
     *
     * @return string
     */
    public function render_sl_login() { 
        //$this->common_css();        
        ob_start();
        include __DIR__ . '/views/listing-login.php';
        return ob_get_clean();
    }

    /**
     * Login page shortcode
     *
     * @return string
     */
    public function render_sl_registration() {        

        ob_start();
        include __DIR__ . '/views/listing-registration.php';
        return ob_get_clean();
    }

    /**
     * Add new listing form shortcode
     *
     * @return string
     */
    public function render_sl_add_new_listing() {        

        ob_start();
        include __DIR__ . '/views/add-new-listing.php';
        return ob_get_clean();
    }

    
}
