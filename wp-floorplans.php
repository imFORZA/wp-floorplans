<?php

/**
 * Plugin Name: WP FloorPlans
 * Version: 1.0.0
 * Plugin URI: //www.imforza.com
 * Description: A WordPress plugin to display Floor Plans.
 * Author: imFORZA
 * Author URI: //www.imforza.com
 * Text Domain: wpfloorplans
 * Domain Path: /languages/
 * License: GPL v3
*/

############################################################
// Language Support
############################################################

load_plugin_textdomain('wp-floorplans', false, dirname(plugin_basename(__FILE__)) . '/languages');


############################################################
// Add CSS File
############################################################

add_action('wp_enqueue_scripts', 'wpfloorplans_styles');

function wpfloorplans_styles() {
	if(!is_admin()) {
		wp_register_style('wpfloorplans', plugins_url( 'assets/css/wp-floorplans.css', __FILE__ ), false, null, 'all');
		wp_enqueue_style('wpfloorplans');
	}
}

############################################################
// Community Taxonomy
############################################################

if ( ! function_exists( 'wpfloorplans_community_tax' ) ) {

// Register Highlights Taxonomy
function wpfloorplans_community_tax() {

	$labels = array(
		'name'                       => _x( 'Community', 'Taxonomy General Name', 'wpfloorplans' ),
		'singular_name'              => _x( 'Community', 'Taxonomy Singular Name', 'wpfloorplans' ),
		'menu_name'                  => __( 'Communities', 'wpfloorplans' ),
		'all_items'                  => __( 'All Communities', 'wpfloorplans' ),
		'parent_item'                => __( 'Parent Community', 'wpfloorplans' ),
		'parent_item_colon'          => __( 'Parent Community:', 'wpfloorplans' ),
		'new_item_name'              => __( 'New Community Name', 'wpfloorplans' ),
		'add_new_item'               => __( 'Add New Community', 'wpfloorplans' ),
		'edit_item'                  => __( 'Edit Community', 'wpfloorplans' ),
		'update_item'                => __( 'Update Community', 'wpfloorplans' ),
		'view_item'                  => __( 'View Community', 'wpfloorplans' ),
		'separate_items_with_commas' => __( 'Separate Communities with commas', 'wpfloorplans' ),
		'add_or_remove_items'        => __( 'Add or remove Communities', 'wpfloorplans' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wpfloorplans' ),
		'popular_items'              => __( 'Popular Communities', 'wpfloorplans' ),
		'search_items'               => __( 'Search Communities', 'wpfloorplans' ),
		'not_found'                  => __( 'No Communities Found', 'wpfloorplans' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'					 => array('slug'=>'floorplan/community', 'with_front' => false)
	);
	register_taxonomy( 'community', array( 'wpfloorplans' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wpfloorplans_community_tax', 0 );

}


############################################################
// Highlights Taxonomy
############################################################

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
		'rewrite'					 => array('slug'=>'floorplan/highlight', 'with_front' => false)
	);
	register_taxonomy( 'highlights', array( 'wpfloorplans' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'wpfloorplans_highlights_tax', 0 );

}


############################################################
// FloorPlan Custom Post Type
############################################################

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
		'menu_icon'           => 'dashicons-images-alt2',
		'register_meta_box_cb' => 'wpfloorplans_add_metaboxes',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' 			  => array('slug'=>'floorplan', 'with_front' => false)
	);
	register_post_type( 'wpfloorplans', $args );

}

// Hook into the 'init' action
add_action( 'init', 'wpfloorplans_floorplans_cpt', 0 );

}





############################################################
// CPT Meta Boxes
############################################################

// Setup Details Meta Boxes
$wpfloorplans_prefix = 'wpfloorplans_';
$wpfloorplans_meta_box = array(
	'id' => 'floorplan-details',
	'title' => __( 'Floorplan Details', 'wpfloorplans' ),
	'page' => 'wpfloorplans',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __( 'Style', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_style',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Square Footage', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_sqft',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Bedrooms', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_beds',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Baths', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_baths',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Floors', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_floors',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Garage', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_garages',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Priced From', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_price',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'PDF Brochure URL', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_brochure',
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => __( 'Virtual Tour URL', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_virtual_tour',
			'type' => 'text',
			'std' => ''
		)
	)
);
add_action('admin_menu', 'wpfloorplans_add_metaboxes');

// Setup Photos Meta Boxes
$wpfloorplans_gallery_boxes = array(
	'id' => 'floorplan-galleries',
	'title' => __( 'Floorplan Galleries', 'wpfloorplans' ),
	'page' => 'wpfloorplans',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array (
		array (
			'name' => __( 'Floorplan Gallery', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_floorplan_gallery',
			'type' => 'wysiwyg',
			'std' => '',
			'options' => array(
				'wpautop' => true,
				'media_buttons' => true,
				'textarea_name' => $wpfloorplans_prefix . 'floorplan_photo_gallery',
				'textarea_rows' => get_option('default_post_edit_rows', 10),
				'tabindex' => '',
				'editor_css' => '',
				'editor_class' => '',
				'teeny' => false,
				'dfw' => false,
				'tinymce' => true,
				'quicktags' => true
			)
		),
		array (
			'name' => __( 'Photo Gallery', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_photo_gallery',
			'type' => 'wysiwyg',
			'std' => '',
			'options' => array(
				'wpautop' => true,
				'media_buttons' => true,
				'textarea_name' => $wpfloorplans_prefix . 'floorplan_photo_gallery',
				'textarea_rows' => get_option('default_post_edit_rows', 10),
				'tabindex' => '',
				'editor_css' => '',
				'editor_class' => '',
				'teeny' => false,
				'dfw' => false,
				'tinymce' => true,
				'quicktags' => true
			)
		),
		array (
			'name' => __( 'Listings Gallery', 'wpfloorplans' ),
			'id' => $wpfloorplans_prefix . 'floorplan_listings_gallery',
			'type' => 'wysiwyg',
			'std' => '',
			'options' => array(
				'wpautop' => true,
				'media_buttons' => true,
				'textarea_name' => $wpfloorplans_prefix . 'floorplan_photo_gallery',
				'textarea_rows' => get_option('default_post_edit_rows', 10),
				'tabindex' => '',
				'editor_css' => '',
				'editor_class' => '',
				'teeny' => false,
				'dfw' => false,
				'tinymce' => true,
				'quicktags' => true
			)
		)
	)
);
add_action('admin_menu', 'wpfloorplans_add_gallery_metaboxes');

// Add Meta Boxes
function wpfloorplans_add_metaboxes() {
	global $wpfloorplans_meta_box;
	add_meta_box($wpfloorplans_meta_box['id'], $wpfloorplans_meta_box['title'], 'wpfloorplans_show_box', $wpfloorplans_meta_box['page'], $wpfloorplans_meta_box['context'], $wpfloorplans_meta_box['priority']);
}

function wpfloorplans_show_box() {
	global $wpfloorplans_meta_box, $post;

	echo '<input type="hidden" name="wpfloorplans_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table" style="overflow:hidden;">';

		foreach($wpfloorplans_meta_box['fields'] as $field) {
			$wpfloorplans_meta = get_post_meta($post->ID, $field['id'], true);

			switch ($field['type']) {

				case 'text':
					echo '<tr>',
					'<th style="width: 15%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
					'<td>';
					echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $wpfloorplans_meta ? $wpfloorplans_meta : $field['std'], '" size="20" style="width: 50%; min-width: 150px;" />', '<br />', isset($field['desc']);
					echo '</td>', '</tr>';
				break;

			}
		}
		echo '</table>';
}

// Add Gallery Boxes

function wpfloorplans_add_gallery_metaboxes() {
	global $wpfloorplans_gallery_boxes;
	add_meta_box($wpfloorplans_gallery_boxes['id'], $wpfloorplans_gallery_boxes['title'], 'wpfloorplans_show_gallerybox', $wpfloorplans_gallery_boxes['page'], $wpfloorplans_gallery_boxes['context'], $wpfloorplans_gallery_boxes['priority']);
}

function wpfloorplans_show_gallerybox() {
	global $wpfloorplans_gallery_boxes, $post;

	echo '<input type="hidden" name="wpfloorplans_gallery_boxes_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

	echo '<table class="form-table" style="overflow:hidden">';

		foreach($wpfloorplans_gallery_boxes['fields'] as $field) {
			$wpfloorplans_gallerymeta = get_post_meta($post->ID, $field['id'], true);

			switch ($field['type']) {
				case 'wysiwyg':
					echo '<label style="font-weight:bold;" for="', $field['id'], '">', $field['name'], '</label>',
					'<div style="margin: 15px 0;"',
						wp_editor($wpfloorplans_gallerymeta ? $wpfloorplans_gallerymeta : $field['std'], $field['id']);
					echo '</div>';
				break;

			}
		}
		echo '</table>';
}

// Save MetaBox Data
add_action('save_post', 'wpfloorplans_save_data');

function wpfloorplans_save_data($post_id) {
	global $wpfloorplans_meta_box;

	if (isset($_POST['wpfloorplans_meta_box_nonce']) && !wp_verify_nonce($_POST['wpfloorplans_meta_box_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	return;

	if (!current_user_can('edit_post', $post_id))
	return;

	foreach($wpfloorplans_meta_box['fields'] as $field) {
		$wpfloorplan_old = get_post_meta($post_id, $field['id'], true);

		if (!empty($_POST[$field['id']])) {
			$wpfloorplan_new = $_POST[$field['id']];
		} else {
			$wpfloorplan_new = '';
		}

		if ($wpfloorplan_new && $wpfloorplan_new != $wpfloorplan_old) {
			update_post_meta($post_id, $field['id'], $wpfloorplan_new);
		} elseif ('' == $wpfloorplan_new && $wpfloorplan_old) {
			delete_post_meta($post_id, $field['id'], $wpfloorplan_old);
		}
	}
}

// Save Gallery Box Data
add_action('save_post', 'wpfloorplans_save_gallerydata');

function wpfloorplans_save_gallerydata($post_id) {
	global $wpfloorplans_gallery_boxes;

	if (isset($_POST['wpfloorplans_gallery_boxes_nonce']) && !wp_verify_nonce($_POST['wpfloorplans_gallery_boxes_nonce'], basename(__FILE__))) {
		return $post_id;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
	return;

	if (!current_user_can('edit_post', $post_id))
	return;

	foreach($wpfloorplans_gallery_boxes['fields'] as $field) {
		$wpfloorplan_gallery_old = get_post_meta($post_id, $field['id'], true);

		if (!empty($_POST[$field['id']])) {
			$wpfloorplan_gallery_new = $_POST[$field['id']];
		} else {
			$wpfloorplan_gallery_new = '';
		}

		if ($wpfloorplan_gallery_new && $wpfloorplan_gallery_new != $wpfloorplan_gallery_old) {
			update_post_meta($post_id, $field['id'], $wpfloorplan_gallery_new);
		} elseif ('' == $wpfloorplan_gallery_new && $wpfloorplan_gallery_old) {
			delete_post_meta($post_id, $field['id'], $wpfloorplan_gallery_old);
		}
	}
}

############################################################
// Template Functions
############################################################
function wpfloorplans_style() {
	global $wpfloorplans_style;
	$wpfloorplans_style = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_style', true);
	if ($wpfloorplans_style == '') {} else {
		echo '<span id="floorplan-style">' . $wpfloorplans_style . '</span>';
	}
}

function wpfloorplans_sqft() {
	global $wpfloorplans_sqft;
	$wpfloorplans_sqft = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_sqft', true);
	if ($wpfloorplans_sqft == '') {} else {
		echo '<span id="floorplan-square-footage">' . $wpfloorplans_sqft . '</span>';
	}
}

function wpfloorplans_beds() {
	global $wpfloorplans_beds;
	$wpfloorplans_beds = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_beds', true);
	if ($wpfloorplans_beds == '') {} else {
		echo '<span id="floorplan-beds">' . $wpfloorplans_beds . '</span>';
	}
}

function wpfloorplans_baths() {
	global $wpfloorplans_baths;
	$wpfloorplans_baths = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_baths', true);
	if ($wpfloorplans_baths == '') {} else {
		echo '<span id="floorplan-baths">' . $wpfloorplans_baths . '</span>';
	}
}

function wpfloorplans_floors() {
	global $wpfloorplans_floors;
	$wpfloorplans_floors = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_floors', true);
	if ($wpfloorplans_floors == '') {} else {
		echo '<span id="floorplan-floors">' . $wpfloorplans_floors . '</span>';
	}
}


function wpfloorplans_garages() {
	global $wpfloorplans_garages;
	$wpfloorplans_garages = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_garages', true);
	if ($wpfloorplans_garages == '') {} else {
		echo '<span id="floorplan-garages">' . $wpfloorplans_garages . '</span>';
	}
}

function wpfloorplans_price() {
	global $wpfloorplans_price;
	$wpfloorplans_price = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_price', true);
	if ($wpfloorplans_price == '') {} else {
		echo '<span id="floorplan-price">' . $wpfloorplans_price . '</span>';
	}
}

function wpfloorplans_brochure_url() {
	global $wpfloorplans_brochure_url;
	$wpfloorplans_brochure_url = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_brochure', true);
	if ($wpfloorplans_brochure_url == '') {} else {
		echo $wpfloorplans_brochure_url;
	}
}

function wpfloorplans_virtual_tour_url() {
	global $wpfloorplans_virtual_tour_url;
	$wpfloorplans_virtual_tour_url = get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_virtual_tour', true);
	if ($wpfloorplans_virtual_tour_url == '') {} else {
		echo $wpfloorplans_virtual_tour_url;
	}
}

function wpfloorplans_floorplan_gallery() {
	global $wpfloorplans_floorplan_gallery;
	$wpfloorplans_floorplan_gallery = apply_filters('the_content', get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_floorplan_gallery', true));
	if ($wpfloorplans_floorplan_gallery == '') {} else {
		$wpfloorplans_floorplan_gallery = htmlspecialchars_decode($wpfloorplans_floorplan_gallery);
		$wpfloorplans_floorplan_gallery = wpautop($wpfloorplans_floorplan_gallery);
		echo $wpfloorplans_floorplan_gallery;
	}
}

function wpfloorplans_photo_gallery() {
	global $wpfloorplans_photo_gallery;
	$wpfloorplans_photo_gallery = apply_filters('the_content', get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_photo_gallery', true));
	if ($wpfloorplans_photo_gallery == '') {} else {
		$wpfloorplans_photo_gallery = htmlspecialchars_decode($wpfloorplans_photo_gallery);
		$wpfloorplans_photo_gallery = wpautop($wpfloorplans_photo_gallery);
		echo $wpfloorplans_photo_gallery;
	}
}

function wpfloorplans_listing_gallery() {
	global $wpfloorplans_listing_gallery;
	$wpfloorplans_listing_gallery = apply_filters('the_content', get_post_meta(get_the_ID(), 'wpfloorplans_floorplan_listings_gallery', true));
	if ($wpfloorplans_listing_gallery == '') {} else {
		$wpfloorplans_listing_gallery = htmlspecialchars_decode($wpfloorplans_listing_gallery);
		$wpfloorplans_listing_gallery = wpautop($wpfloorplans_listing_gallery);
		echo $wpfloorplans_listing_gallery;
	}
}

############################################################
// Load Template Files
############################################################
add_filter( 'template_include', 'wpfloorplans_templates', 1 );

function wpfloorplans_templates( $template_path ) {
	if (get_post_type() == 'wpfloorplans') {

		// Single Floorplan Template
		if (is_single()) {
			// Check if a file exists in the theme, otherwise serve from plugin
			if ($theme_file = locate_template(array('single-wpfloorplans.php'))) {
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . 'templates/single-wpfloorplans.php';
			}
		}

		// Archive Floorplan Template
		if (is_archive()) {
			// Check if a file exists in the theme, otherwise serve from plugin
			if($theme_file = locate_template(array('archive-wpfloorplans.php'))) {
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . 'templates/archive-wpfloorplans.php';
			}
		}

		// Taxonomy Floorplan Template
		if (is_tax('community')) {
			// Check if a file exists in the theme, otherwise serve from plugin
			if($theme_file = locate_template(array('archive-wpfloorplans.php'))) {
				$template_path = $theme_file;
			} else {
				$template_path = plugin_dir_path(__FILE__) . 'templates/archive-wpfloorplans.php';
			}
		}
	}
	return $template_path;
}


############################################################
// Plugin Activation
############################################################

register_activation_hook(__FILE__, 'wpfloorplans_activate');

function wpfloorplans_activate() {
	global $wpdb;
	
	flush_rewrite_rules();
}


############################################################
// Plugin Deactivation
############################################################

register_deactivation_hook(__FILE__, 'wpfloorplans_deactivation');

function wpfloorplans_deactivation() {
	
	flush_rewrite_rules();
}