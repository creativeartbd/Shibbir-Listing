<?php

namespace Shibbir\Listing;

/**
 * Ajax handler class
 */
class Ajax {

    /**
     * Class constructor
     */
    function __construct() {
        add_action( 'wp_ajax_log_nonce_action', [ $this, 'submit_listing_login_form'] );        
        add_action( 'wp_ajax_nopriv_log_nonce_action', [ $this, 'submit_listing_login_form'] );        

        add_action( 'wp_ajax_reg_nonce_action', [ $this, 'submit_listing_registration_form' ] );
        add_action( 'wp_ajax_nopriv_reg_nonce_action', [ $this, 'submit_listing_registration_form' ] );
        
        add_action( 'wp_ajax_add_new_listing_nonce_action', [ $this, 'submit_new_listing_form' ] );
    }

    /**
     * Handle login form
     *
     * @return string
     */
    public function submit_listing_login_form() {

        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'log_nonce_action' ) ) {
            wp_send_json_error( [
                'message' => 'Nonce verification failed!'
            ] );
        }

        $user_name  = isset( $_POST['user_name'] ) ? sanitize_text_field( $_POST['user_name'] ) : '';        
        $password   = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
        $check1     = isset( $_POST['check1'] ) ? sanitize_text_field( $_POST['check1'] ) : '';

        $credentials = [
            'user_login' => $user_name,
            'user_password' => $password,              
        ];

        if( $check1 ) {
            $credentials['rememberme'] = true;
            $remember_me = true;
        } else {
            $remember_me = false;
        }

        $errors     = [];

        if( empty( $user_name) ) {
            wp_send_json_error( [
                'message'   =>   __( 'Enter your uername', 'shibbir-listing' ),
            ] );
        } elseif ( empty( $password ) ) {
            wp_send_json_error( [
                'message'   =>   __( 'Enter your password', 'shibbir-listing' ),
            ] );
        } else {
            $user = wp_signon($credentials, true); // true - use HTTP only cookie
            if( is_wp_error( $user ) ) {
                wp_send_json_error( [
                    'message'   =>   __( 'Either username or password is incorrect', 'shibbir-listing' ),
                ] );
            }
        }  

        // If no error found 
        wp_set_current_user( $user->ID, $user_name );
        wp_set_auth_cookie( $user->ID, $remember_me, false );

        wp_send_json_success( [
            'message'   =>  __( 'Successfully logged', 'shibbir-listing' ), 
        ] );        
        
    }

    /**
     * Handle registration form
     *
     * @return string
     */
    public function submit_listing_registration_form() {

        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'reg_nonce_action' ) ) {
            wp_send_json_error( [
                'message' => 'Nonce verification failed!'
            ] );
        }

        $full_name  = isset( $_POST['full_name'] ) ? sanitize_text_field( $_POST['full_name'] ) : '';
        $user_name  = isset( $_POST['user_name'] ) ? sanitize_text_field( $_POST['user_name'] ) : '';       
        $email      = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $password   = isset( $_POST['password'] ) ? sanitize_text_field( $_POST['password'] ) : '';
        $check1     = isset( $_POST['check1'] ) ? sanitize_text_field( $_POST['check1'] ) : '';
        $errors     = [];

        if( empty( $full_name) ) {
            $errors[] = __( 'Enter your full name', 'shibbir-listing' );
        } elseif( strlen( $full_name ) < 3 || strlen( $full_name) > 15 ) {
            $errors[] = __( 'Full name must be between 3-15 characters long', 'shibbir-listing' );
        }

        if( empty( $user_name) ) {
            $errors[] = __( 'Enter your user name', 'shibbir-listing' );
        } elseif( strlen( $user_name ) < 3 || strlen( $user_name) > 15 ) {
            $errors[] = __( 'User name must be between 3-15 characters long', 'shibbir-listing' );
        } elseif( username_exists( $user_name ) ) {
            $errors[] = __( 'User name already exist, please choose another', 'shibbir-listing' );
        }

        if( empty( $email) ) {
            $errors[] = __( 'Enter your email address', 'shibbir-listing' );
        } elseif( !is_email( $email ) ) {
            $errors[] = __( 'Email address is not correct', 'shibbir-listing' );
        } elseif( email_exists( $email ) ) {
            $errors[] = __( 'Email address already exist, please choose another', 'shibbir-listing' );
        }

        if( empty( $password) ) {
            $errors[] = __( 'Enter your account password', 'shibbir-listing' );
        } elseif( strlen( $password ) < 6 ) {
            $errors[] = __( 'Password must be greater than 6 characters long', 'shibbir-listing' );
        }

        if( empty( $check1 ) ) {
            $errors[] = __( 'Please accept our terms and condition', 'shibbir-listing');
        }

        if( !empty( $errors ) ) {            
            foreach( $errors as $error ) {                
                wp_send_json_error( [
                    'message'   =>  $error,
                ] );
            }
        } else {
            // create new user 
            $full_name = explode( ' ', $full_name );
            $userdata = [
                'user_pass' => $password,
                'user_login' => $user_name,
                'user_email' => $email, 
                'first_name' => isset( $full_name[0] ) ? $full_name[0] : '',
                'last_name' => isset( $full_name[1] ) ? $full_name[1] : '', 
            ];

            $user_id = wp_insert_user( $userdata );

            if( ! is_wp_error( $user_id ) ) {
                $login_url = wp_login_url();
                wp_send_json_success( [
                    'message'   =>  __( 'Successfully created your account!. Now, you can login to post your new directory', 'shibbir-listing' ),
                    'login_url' =>  $login_url,
                ] );                                
            } else {                
                wp_send_json_error( [
                    'message'   =>  __( 'Opps! can\'t register your data', 'shibbir-listing' ),
                ] );                                
            }
        } 
    }

    /**
     * Handle add new listing form
     *
     * @return string
     */
    public function submit_new_listing_form() {
        
        if ( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'add_new_listing_nonce_action' ) ) {
            wp_send_json_error( [
                'message' => 'Nonce verification failed!'
            ] );
        }

        wp_send_json_success( [
            'message'   =>  __( 'Successfully created a new listing', 'shibbir-listing' ),
        ] );

    }
  
}
