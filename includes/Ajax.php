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
        add_action( 'wp_ajax_nopriv_add_new_listing_nonce_action', [ $this, 'submit_new_listing_form' ] );
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

        // get the form field data
        $listing_title      =   isset( $_POST[ 'listing_title' ] ) ? sanitize_text_field( $_POST[ 'listing_title' ] ) : '';
        $listing_category   =   isset( $_POST[ 'listing_category' ] ) ? sanitize_text_field( $_POST[ 'listing_category' ] ) : '';
        $keywords           =   isset( $_POST[ 'keywords' ] ) ? sanitize_text_field( $_POST[ 'keywords' ] ) : '';
        $website            =   isset( $_POST[ 'website' ] ) ? sanitize_text_field( $_POST[ 'website' ] ) : '';
        $price              =   isset( $_POST[ 'price' ] ) ? sanitize_text_field( $_POST[ 'price' ] ) : '';
        $phone              =   isset( $_POST[ 'phone' ] ) ? sanitize_text_field( $_POST[ 'phone' ] ) : '';
        $email              =   isset( $_POST[ 'email' ] ) ? sanitize_text_field( $_POST[ 'email' ] ) : '';
        $about_listing      =   isset( $_POST[ 'about_listing' ] ) ? sanitize_text_field( $_POST[ 'about_listing' ] ) : '';
        $amenities          =   isset( $_POST[ 'amenities' ] ) ? $_POST[ 'amenities' ] : ''; // array data
        $address            =   isset( $_POST[ 'address' ] ) ? sanitize_text_field( $_POST[ 'address' ] ) : '';
        $state              =   isset( $_POST[ 'state' ] ) ? sanitize_text_field( $_POST[ 'state' ] ) : '';
        $country            =   isset( $_POST[ 'country' ] ) ? sanitize_text_field( $_POST[ 'country' ] ) : '';
        $postal_code        =   isset( $_POST[ 'postal_code' ] ) ? sanitize_text_field( $_POST[ 'postal_code' ] ) : '';
        $lat                =   isset( $_POST[ 'lat' ] ) ? sanitize_text_field( $_POST[ 'lat' ] ) : '';
        $long               =   isset( $_POST[ 'long' ] ) ? sanitize_text_field( $_POST[ 'long' ] ) : '';
        $opening            =   isset( $_POST[ 'opening' ] ) ? array_chunk( $_POST[ 'opening' ], 3 ) : ''; // multidimensional array data
        $opening_day        =   isset( $_POST[ 'opening' ][ 'day' ] ) ? $_POST[ 'opening' ][ 'day' ] : ''; // array data
        $opening_from       =   isset( $_POST[ 'opening' ][ 'from' ] ) ? $_POST[ 'opening' ][ 'from' ] : ''; // array data
        $opening_to         =   isset( $_POST[ 'opening' ][ 'to' ] ) ? $_POST[ 'opening' ][ 'to' ] : ''; // array data
        $socials            =   isset( $_POST[ 'socials' ] ) ? sanitize_text_field( $_POST[ 'socials' ] ) : ''; // array data
        $images             =   isset( $_FILES[ 'images' ] ) ? $_FILES[ 'images' ] : '';

        $allowed_format     =   [ 'jpg', 'jpeg', 'png', 'gif' ];
        $allowed_size       =    5242880; // 5MB in byte   
        $errors             =   []; // Store all error message

        if( empty( $listing_title ) ) {
            $errors[]   =   __( 'Listing title is required', 'shibbir-driectory-listing' );
        } elseif ( strlen( $listing_title ) > 100 || strlen(  $listing_title ) < 2 ) {
            $errors[]   =   __( 'Listing title must be between 2-100 characters long', 'shibbir-driectory-listing' );
        }

        if( empty( $listing_category ) ) {
            $errors[]   =   __( 'Listing category is required', 'shibbir-driectory-listing' );
        }

        if( empty( $keywords ) ) {
            $errors[]   =   __( 'Listing keyword is required, please make sure that each keyword is seperated by a comma ( , )', 'shibbir-driectory-listing' );
        }

        if( empty( $website ) ) {
            $errors[]   =   __( 'Website address is required', 'shibbir-driectory-listing' );
        } elseif( !filter_var( $website, FILTER_VALIDATE_URL ) ) {
            $errors[]   =   __( 'Website address is not correct, please make sure to use http:// at the beginning', 'shibbir-driectory-listing' );
        }        

        if( empty( $price ) ) {
            $errors[]   =   __( 'Listing pricie is required', 'shibbir-driectory-listing' );
        } elseif( preg_match( '/^\d+(\.\d{2})?$/', $price ) == 0 ) {
            $errors[]   =   __( 'Invalid price is given', 'shibbir-driectory-listing' );
        }

        if( empty( $phone ) ) {
            $errors[]   =   __( 'Phone number is required', 'shibbir-driectory-listing' );
        } elseif( strlen( $phone ) < 5 ) {
            $errors[]   =   __( 'Invalid phone number is given', 'shibbir-driectory-listing' );
        }

        if( empty( $email ) ) {
            $errors[]   =   __( 'Email address is required', 'shibbir-driectory-listing' );
        } elseif( !is_email( $email ) ) {
            $errors[]   =   __( 'Invalid email address is given', 'shibbir-driectory-listing' );
        }

        if( empty( $about_listing ) ) {
            $errors[]   =   __( 'Listing details is required', 'shibbir-driectory-listing' );
        } elseif( strlen( $about_listing) > 1000 || strlen( $about_listing ) < 5 ) {
            $errors[]   =   __( 'Listing details must be between 5 - 1000 characters long', 'shibbir-driectory-listing' );
        }

        if( count( $amenities ) < 1 ) {
            $errors[]   =   __( 'Amenities is required', 'shibbir-driectory-listing' );
        }        

        if( empty( $address ) ) {
            $errors[]   =   __( 'Address is required', 'shibbir-driectory-listing' );
        }        

        if( empty( $state ) ) {
            $errors[]   =   __( 'State is required', 'shibbir-driectory-listing' );
        }
        
        if( empty( $country ) ) {
            $errors[]   =   __( 'Country is required', 'shibbir-driectory-listing' );
        }        

        if( empty( $postal_code ) ) {
            $errors[]   =   __( 'postal code is required', 'shibbir-driectory-listing' );
        } elseif ( strlen( $postal_code ) > 5 || strlen( $postal_code )  < 4 ) {
            $errors[]   =   __( 'Invalid postal code is given', 'shibbir-driectory-listing' );
        }       

        if( empty( $lat ) ) {
            $errors[]   =   __( 'Google map latitude address is required', 'shibbir-driectory-listing' );
        }        

        if( empty( $long ) ) {
            $errors[]   =   __( 'Google map longitude  address is required', 'shibbir-driectory-listing' );
        }               

        foreach ( $opening as $key => $value) {
            foreach ( $value as $key_1 => $value_1 ) {
                if( empty( $value_1 ) ) {
                    $errors[]   =   __( 'Either opening day or time is m issing', 'shibbir-driectory-listing' );
                }
            }
        }

        if( $images ) {
            foreach( $images['name'] as $key => $image_name ) {

                $explode    =   explode( '.', $image_name );
                $extension  =   strtolower( end( $explode ) );                

                if( empty( $image_name ) ) {
                    $errors[]   =   __( 'Listing gallery image is required', 'shibbir-driectory-listing' );
                } elseif( !in_array( $extension, $allowed_format ) ) {
                    $errors[]   =   __( 'Listing gallery image must be either jpg, jpeg, gif or png format', 'shibbir-driectory-listing' );
                }
            }
        }

        if( count( $socials ) < 1 ) {
            $errors[]   =   __( 'Social address is required', 'shibbir-driectory-listing' );
        }       

        if( !empty( $errors ) ) {
            foreach(  $errors as $error ) {
                wp_send_json_error( [
                    'message'   =>  $error,
                ] );
            }
        } else {
            wp_send_json_success( [
                'message'   =>  'Congratulation! Your news listing has been published'
            ] );
        }        

    }
  
}
