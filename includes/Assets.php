<?php

namespace Shibbir\Listing;

/**
 * Assets handlers class
 */
class Assets {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_enqueue_scripts', [ $this, 'register_assets' ] );
        add_action( 'admin_enqueue_scripts', [ $this, 'register_assets' ] );    
       
    }

    /**
     * All available scripts
     *
     * @return array
     */
    public function get_scripts() {
        return [
            'sl-modernizer-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/js/vendor/modernizr-3.7.1.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/js/vendor/modernizr-3.7.1.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-bootstrap-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/bootstrap/js/bootstrap.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/bootstrap/js/bootstrap.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-proper-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/bootstrap/js/popper.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/bootstrap/js/popper.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-slick-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/slick/slick.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/slick/slick.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-slick-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/slick/slick.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/slick/slick.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-magnific-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/magnific/jquery.magnific-popup.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/magnific/jquery.magnific-popup.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-isotope-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/isotope/isotope.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/isotope/isotope.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-imagesloaded-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/imagesloaded/imagesloaded.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/imagesloaded/imagesloaded.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-counterup-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/counterup/jquery.counterup.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/counterup/jquery.counterup.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-jquery-ui-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/jquery_ui/jquery-ui.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/jquery_ui/jquery-ui.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-sidebar-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/sidebar/sidebar-menu.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/sidebar/sidebar-menu.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-niceselect-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/niceselect/jquery.nice-select.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/niceselect/jquery.nice-select.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-wow-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/js/wow.min.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/js/wow.min.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-main-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/js/main.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/js/main.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-image-uploader-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/js/vendor/image-uploader.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/js/vendor/image-uploader.js' ),
                'deps'    => [ 'jquery' ]
            ],
            'sl-script' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/js/sl-js.js',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/js/sl-js.js' ),
                'deps'    => [ 'jquery' ]
            ]
        ];
    }

    /**
     * All available styles
     *
     * @return array
     */
    public function get_styles() {
        return [
            'sl-all-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/fonts/fontawesome/css/all.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/fonts/fontawesome/css/all.css' )
            ],
            'sl-slick-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/slick/slick.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/slick/slick.css' )
            ],
            'sl-slick-theme' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/slick/slick-theme.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/slick/slick-theme.css' )
            ],
            'sl-magnific-popup-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/magnific/magnific-popup.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/magnific/magnific-popup.css' )
            ],
            'sl-sidebar-menu-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/sidebar/sidebar-menu.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/sidebar/sidebar-menu.css' )
            ],
            'sl-jquery-ui-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/jquery_ui/jquery-ui.min.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/jquery_ui/jquery-ui.min.css' )
            ],
            'sl-nice-select-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/plugin/niceselect/nice-select.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/plugin/niceselect/nice-select.css' )
            ],
            'sl-animate-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/css/animate.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/css/animate.css' )
            ],
            'sl-responsive-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/css/responsive.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/css/responsive.css' )
            ],
            'sl-image-uploader-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/css/image-uploader.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/css/image-uploader.css' )
            ],            
            'sl-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/css/style.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/css/style.css' )
            ],            
            'sl-admin-style' => [
                'src'     => SHIBBIR_LISTING_ASSETS_URL . '/css/admin.css',
                'version' => filemtime( SHIBBIR_LISTING_PATH . '/assets/css/admin.css' )
            ]
        ];
    }

    /**
     * Register scripts and styles
     *
     * @return void
     */
    public function register_assets() {

        $scripts = $this->get_scripts();
        $styles  = $this->get_styles();

        foreach ( $scripts as $handle => $script ) {
            $deps = isset( $script['deps'] ) ? $script['deps'] : false;

            wp_register_script( $handle, $script['src'], $deps, $script['version'], true );
        }

        foreach ( $styles as $handle => $style ) {
            $deps = isset( $style['deps'] ) ? $style['deps'] : false;

            wp_register_style( $handle, $style['src'], $deps, $style['version'] );
        }

        $this->execute_style();
        

        wp_localize_script( 'sl-script', 'sl', [
            'ajax_url'  =>   admin_url( 'admin-ajax.php' ),
            'error'     =>  __( 'Error: Something went wrong', 'shibbir-listing' ),
            'homepage'  =>  home_url( '/' ),
        ] );

        // wp_localize_script( 'academy-admin-script', 'weDevsAcademy', [
        //     'nonce' => wp_create_nonce( 'wd-ac-admin-nonce' ),
        //     'confirm' => __( 'Are you sure?', 'wedevs-academy' ),
        //     'error' => __( 'Something went wrong', 'wedevs-academy' ),
        // ] );
    }

    public function execute_style () {
        if( is_admin() ) {
            // All admin styles
            wp_enqueue_style( 'sl-admin-style' );
        } else {
            // All frontend styles
            wp_enqueue_style( 'sl-all-style' );
            wp_enqueue_style( 'sl-slick-style' );
            wp_enqueue_style( 'sl-slick-theme' );
            wp_enqueue_style( 'sl-magnific-popup-style' );
            wp_enqueue_style( 'sl-sidebar-menu-style' );
            wp_enqueue_style( 'sl-jquery-ui-style' );
            wp_enqueue_style( 'sl-nice-select-style' );
            wp_enqueue_style( 'sl-animate-style' );
            wp_enqueue_style( 'sl-style' );        
            wp_enqueue_style( 'sl-responsive-style' );

             // All frontend scrits        
            wp_enqueue_script( 'sl-modernizer-script' );
            wp_enqueue_script( 'sl-bootstrap-script' );
            wp_enqueue_script( 'sl-proper-script' );
            wp_enqueue_script( 'sl-slick-script' );
            wp_enqueue_script( 'sl-magnific-script' );
            wp_enqueue_script( 'sl-isotope-script' );
            wp_enqueue_script( 'sl-imagesloaded-script' );
            wp_enqueue_script( 'sl-counterup-script' );
            wp_enqueue_script( 'sl-jquery-ui-script' );
            wp_enqueue_script( 'sl-sidebar-script' );
            wp_enqueue_script( 'sl-niceselect-script' );
            wp_enqueue_script( 'sl-wow-script' );
            wp_enqueue_script( 'sl-main-script' );
            wp_enqueue_script( 'sl-image-uploader-script');
            wp_enqueue_script( 'sl-script' );
        }
    }
}
