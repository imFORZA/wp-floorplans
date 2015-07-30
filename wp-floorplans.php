<?php

/**
 * Plugin Name: WP FloorPlans
 * Version: 0.0.1
 * Plugin URI: //www.imforza.com
 * Description:
 * Author: imFORZA
 * Author URI: //www.imforza.com
 * Text Domain: wpfloorplans
 * Domain Path: /languages/
 * License: GPL v3
*/



if ( ! function_exists('wpfloorplans_floorplans_cpt') ) {

// Register Floorplans Custom Post Type
function wpfloorplans_floorplans_cpt() {

	$labels = array(
		'name'                => _x( 'Floor Plans', 'Post Type General Name', 'wpfloorplans' ),
		'singular_name'       => _x( 'Floor Plan', 'Post Type Singular Name', 'wpfloorplans' ),
		'menu_name'           => __( 'Floor Plans', 'wpfloorplans' ),
		'name_admin_bar'      => __( 'Floor Plans', 'wpfloorplans' ),
		'parent_item_colon'   => __( 'Parent Floor Plan:', 'wpfloorplans' ),
		'all_items'           => __( 'All Floor Plans', 'wpfloorplans' ),
		'add_new_item'        => __( 'Add New Floor Plan', 'wpfloorplans' ),
		'add_new'             => __( 'Add New', 'wpfloorplans' ),
		'new_item'            => __( 'New Floor Plan', 'wpfloorplans' ),
		'edit_item'           => __( 'Edit Floor Plan', 'wpfloorplans' ),
		'update_item'         => __( 'Update Floor Plan', 'wpfloorplans' ),
		'view_item'           => __( 'View Floor Plan', 'wpfloorplans' ),
		'search_items'        => __( 'Search Floor Plan', 'wpfloorplans' ),
		'not_found'           => __( 'No Floor Plan Found', 'wpfloorplans' ),
		'not_found_in_trash'  => __( 'No Floor Plan Found in Trash', 'wpfloorplans' ),
	);
	$args = array(
		'label'               => __( 'wpfloorplans', 'wpfloorplans' ),
		'description'         => __( 'Add Floorplans to your website.', 'wpfloorplans' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'trackbacks', 'revisions', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'wpfloorplans', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wpfloorplans_floorplans_cpt', 0 );

}




if ( ! function_exists( 'wpfloorplans_highlights_tax' ) ) {

// Register Highlights Taxonomy
function wpfloorplans_highlights_tax() {

	$labels = array(
		'name'                       => _x( 'Highlights', 'Taxonomy General Name', 'wpfloorplans' ),
		'singular_name'              => _x( 'Highlight', 'Taxonomy Singular Name', 'wpfloorplans' ),
		'menu_name'                  => __( 'Highlights', 'wpfloorplans' ),
		'all_items'                  => __( 'All Highlights', 'wpfloorplans' ),
		'parent_item'                => __( 'Parent Highlight', 'wpfloorplans' ),
		'parent_item_colon'          => __( 'Parent Highlight:', 'wpfloorplans' ),
		'new_item_name'              => __( 'New Highlight Name', 'wpfloorplans' ),
		'add_new_item'               => __( 'Add New Highlight', 'wpfloorplans' ),
		'edit_item'                  => __( 'Edit Highlight', 'wpfloorplans' ),
		'update_item'                => __( 'Update Highlight', 'wpfloorplans' ),
		'view_item'                  => __( 'View Highlight', 'wpfloorplans' ),
		'separate_items_with_commas' => __( 'Separate Highlights with commas', 'wpfloorplans' ),
		'add_or_remove_items'        => __( 'Add or remove Highlights', 'wpfloorplans' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wpfloorplans' ),
		'popular_items'              => __( 'Popular Highlights', 'wpfloorplans' ),
		'search_items'               => __( 'Search Highlights', 'wpfloorplans' ),
		'not_found'                  => __( 'No Highlight Found', 'wpfloorplans' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'highlights', array( 'wpfloorplans' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wpfloorplans_highlights_tax', 0 );

}


/*
	List of all Fields we need to build out
  	- Style
    - Square Footage
    - Bedrooms
    - Baths
    - Garage
    - Priced From
    - Gallery Section
    - Floorplans Image Meta Field
    - Associated Listing IDs
    - PDF Brochure Field - Upload PDF supported needed

 */