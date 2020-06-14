<?php

namespace Shibbir\Listing;

/**
 * Installer class
 */
class Installer {

    /**
     * Run the installer
     *
     * @return void
     */
    public function run() {
        $this->add_version();        
        $this->add_pages();        
    }

    /**
     * Add time and version on DB
     */
    public function add_version() {
        $installed = get_option( 'shibbir_listing_installed' );

        if ( ! $installed ) {
            update_option( 'shibbir_listing_installed', time() );
        }

        update_option( 'shibbir_listing_version', shibbir_listing_VERSION );
    }

    /**
     * Add required pages
     * 
     * @return void
     */
    public function add_pages() {
        $pages = array(
            'login'             => '[sl_login]',
            'registration'      => '[sl_registration]',
            'add new listing'   => '[sl_add_new_listing]',
        );
        // Create login, registraton and add listing page with the shortcodes
        foreach( $pages as $page_title => $page_content ) {
            $page_check = get_page_by_title( $page_title );
            if( ! $page_check->ID ) {
                global $wpdb;
                $table_name = $wpdb->prefix . 'posts';
                if ( !$wpdb->get_row( "SELECT post_name FROM {$table_name} WHERE post_name = '" . $page_title . "' AND post_type = 'page' ", ARRAY_A ) ) {
                    $page_attributes = array(
                        'post_type'     => 'page',
                        'post_title'    => ucfirst( $page_title ),
                        'post_content'  => $page_content,
                        'post_status'   => 'publish',
                        'post_author'   => 1,
                        'post_slug'     => $page_title
                    );
                    wp_insert_post( $page_attributes );
                }                
            }
        }
    }
}
