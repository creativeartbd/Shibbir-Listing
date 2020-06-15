<?php

namespace Shibbir\Listing\Admin;

/**
 * Custom Post Type for Listing
 */
class Posttype {
    

    /**
     * Initializes the class
     */
    public function __construct() {    
                     
        add_action( 'init', [ $this, 'register_listing_post_type' ] );
        add_action( 'init', [ $this, 'register_listing_taxonomy' ] );
        add_action( 'add_meta_boxes', [ $this, 'listing_meta_boxes' ] );  
        add_action( 'save_post_listing', [ $this, 'save_listing_meta_data' ]);  
        
        $is_sl_flushed = get_option( 'is_sl_flushed' );        

        // Flush the rewrite rules once 
        if( ! $is_sl_flushed ) {
            flush_rewrite_rules();
            update_option( 'is_sl_flushed', true );
        }
                
    }
    
    /**
     * Register listing custom post type
     *
     * @return string
     */
    public function register_listing_post_type() { 

          $labels = array(
               'name'                  => _x( 'Listings', 'Post type general name', 'shibbir-directory-listing' ),
               'singular_name'         => _x( 'Listing', 'Post type singular name', 'shibbir-directory-listing' ),
               'menu_name'             => _x( 'Listings', 'Admin Menu text', 'shibbir-directory-listing' ),
               'name_admin_bar'        => _x( 'Listing', 'Add New on Toolbar', 'shibbir-directory-listing' ),
               'add_new'               => __( 'Add New listing', 'shibbir-directory-listing' ),
               'add_new_item'          => __( 'Add New listing', 'shibbir-directory-listing' ),
               'new_item'              => __( 'New Listing', 'shibbir-directory-listing' ),
               'edit_item'             => __( 'Edit Listing', 'shibbir-directory-listing' ),
               'view_item'             => __( 'View Listing', 'shibbir-directory-listing' ),
               'all_items'             => __( 'All Listings', 'shibbir-directory-listing' ),
               'search_items'          => __( 'Search Listings', 'shibbir-directory-listing' ),
               'parent_item_colon'     => __( 'Parent Listings:', 'shibbir-directory-listing' ),
               'not_found'             => __( 'No listings found.', 'shibbir-directory-listing' ),
               'not_found_in_trash'    => __( 'No listings found in Trash.', 'textdomain' ),
               'featured_image'        => _x( 'Listing Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'shibbir-directory-listing' ),
               'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'shibbir-directory-listing' ),
               'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'shibbir-directory-listing' ),
               'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'shibbir-directory-listing' ),
               'archives'              => _x( 'Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'shibbir-directory-listing' ),            
          );
   
          $args = array(
               'labels'             => $labels,
               'public'             => true,
               'publicly_queryable' => true,
               'show_ui'            => true,
               'show_in_menu'       => true,
               'query_var'          => true,
               'rewrite'            => array( 'slug' => 'listing' ),
               'capability_type'    => 'post',
               'has_archive'        => true,
               'hierarchical'       => false,
               'menu_position'      => null,
               'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ),
          );

          register_post_type( 'listing', $args );
          
     }

     /**
     * Register listing custom post type taxonomy
     *
     * @return string
     */

     public function register_listing_taxonomy() {

          $listing_category_args = array(
               'hierarchical'  =>  false,
               'query_var'     =>  'listing_category',
               'show_tagcloud' =>  true,
               'rewrite'       =>  array(
                   'slug'          =>  'listing-category',
                   'with_front'    =>  true,
               ),
               'labels'        =>  array(
                   'name'          =>  'Listing Category',
                   'singular_name' =>  'Listing Category',
                   'edit_item'     =>  'Edit listing category',
                   'update_item'   =>  'Update listing category',
                   'add_new_item'  =>  'Add new listing category',
                   'new_item_name' =>  'New listing Category',
                   'all_items'     =>  'All listing category',
                   'search_items'  =>  'Search listing category',
                   'popular_items' =>  'Popular listing category',
                   'separate_items_with_commas'    =>  'Separate listing category with commas',
                   'add_or_remove_items'   =>  'Add or remove listing category',
                   'choose_from_most_used' =>  'Choose from the most popular listing category'
               )
           );
   
           $amenities_args = array(
               'hierarchical'  =>  false,
               'query_var'     =>  'amenities',
               'show_tagcloud' =>  true,
               'rewrite'       =>  array(
                   'slug'          =>  'amenities',
                   'with_front'    =>  true,
               ),
               'labels'        =>  array(
                   'name'          =>  'Amenities',
                   'singular_name' =>  'Amenities',
                   'edit_item'     =>  'Edit amenities',
                   'update_item'   =>  'Update amenities',
                   'add_new_item'  =>  'Add new amenities',
                   'new_item_name' =>  'New listing amenities',
                   'all_items'     =>  'All listing amenities',
                   'search_items'  =>  'Search listing amenities',
                   'popular_items' =>  'Popular listing amenities',
                   'separate_items_with_commas'    =>  'Separate amenities with commas',
                   'add_or_remove_items'   =>  'Add or remove amenities',
                   'choose_from_most_used' =>  'Choose from the most popular amenities'
               )
           );
   
           register_taxonomy( 'listing-category', array('listing'), $listing_category_args );
           register_taxonomy( 'amenities', array('listing'), $amenities_args );
     }

    /**
    * Metaboxes for the new lsting
    *
    * @return void
    */
    public function listing_meta_boxes() {
        add_meta_box( 'sl-metaboxes', __( 'Listing Details', 'shibbir-listing' ), [ $this, 'sl_metabox_callback' ], 'listing', 'advanced' );        
    }

    /**
    * Metaboxes callback funciton
    *
    * @return string
    */
    public function sl_metabox_callback() {
        include __DIR__ . '/views/listing-metaboxes.php';
    }

    /**
    * Save listing meta boxes data
    *
    * @return void
    */
    public function save_listing_meta_data() {        
        
        if( ! wp_verify_nonce( $_REQUEST['_wpnonce'], 'sl_meta_boxes_action' ) ) {
            return;
        }


        // Get metaboxes value and sanitize it
        $sl_keywords    =   isset( $_POST['sl_keywords'] ) ? sanitize_text_field( $_POST[ 'sl_keywords'] ) : '';
        $sl_website     =   isset( $_POST['sl_website'] ) ? sanitize_text_field( $_POST[ 'sl_website'] ) : '';
        $sl_price       =   isset( $_POST['sl_price'] ) ? sanitize_text_field( $_POST[ 'sl_price'] ) : '';
        $sl_phone       =   isset( $_POST['sl_phone'] ) ? sanitize_text_field( $_POST[ 'sl_phone'] ) : '';
        $sl_email       =   isset( $_POST['sl_email'] ) ? sanitize_text_field( $_POST[ 'sl_email'] ) : '';
        $sl_address     =   isset( $_POST['sl_address'] ) ? sanitize_text_field( $_POST[ 'sl_address'] ) : '';
        $sl_state       =   isset( $_POST['sl_state'] ) ? sanitize_text_field( $_POST[ 'sl_state'] ) : '';
        $sl_country     =   isset( $_POST['sl_country'] ) ? sanitize_text_field( $_POST[ 'sl_country'] ) : '';
        $sl_postal      =   isset( $_POST['sl_postal'] ) ? sanitize_text_field( $_POST[ 'sl_postal'] ) : '';
        $sl_glat        =   isset( $_POST['sl_glat'] ) ? sanitize_text_field( $_POST[ 'sl_glat'] ) : '';
        $sl_glong       =   isset( $_POST['sl_glong'] ) ? sanitize_text_field( $_POST[ 'sl_glong'] ) : '';
    }
    
}
