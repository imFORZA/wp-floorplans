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

// Register Custom Post Type
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



/*
	List of all Fields we need to build out
  	- Style
    - Square Footage
    - Bedrooms
    - Baths
    - Garage
    - Priced From
    - Custom Taxonomy Tag - "Highlights"
    - Gallery Section
    - Floorplans Image Meta Field
    - Associated Listing IDs
    - PDF Brochure Field - Upload PDF supported needed

 */