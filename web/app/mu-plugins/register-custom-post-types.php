<?php
/*
Plugin Name:  Register Custom Post Types
Plugin URI:   https://generatewp.com/post-type/
Description:  Registers Custom Post Types
Version:      1.0.0
Author:       Josh Ellis
Author URI:   https://iamjoshellis.com
License:      MIT License
*/

namespace JoshEllis\CustomPostTypes;

function work_post_type() {

	$labels = array(
		'name'                  => _x( 'Work', 'Post Type General Name', 'sage' ),
		'singular_name'         => _x( 'Work', 'Post Type Singular Name', 'sage' ),
		'menu_name'             => __( 'Work', 'sage' ),
		'name_admin_bar'        => __( 'Work', 'sage' ),
		'archives'              => __( 'Work Archives', 'sage' ),
		'parent_item_colon'     => __( 'Parent Work:', 'sage' ),
		'all_items'             => __( 'All Work', 'sage' ),
		'add_new_item'          => __( 'Add New Work', 'sage' ),
		'add_new'               => __( 'Add New', 'sage' ),
		'new_item'              => __( 'New Work', 'sage' ),
		'edit_item'             => __( 'Edit Work', 'sage' ),
		'update_item'           => __( 'Update Work', 'sage' ),
		'view_item'             => __( 'View Work', 'sage' ),
		'search_items'          => __( 'Search Work', 'sage' ),
		'not_found'             => __( 'Not found', 'sage' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sage' ),
		'featured_image'        => __( 'Featured Image', 'sage' ),
		'set_featured_image'    => __( 'Set featured image', 'sage' ),
		'remove_featured_image' => __( 'Remove featured image', 'sage' ),
		'use_featured_image'    => __( 'Use as featured image', 'sage' ),
		'insert_into_item'      => __( 'Insert into item', 'sage' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sage' ),
		'items_list'            => __( 'Work list', 'sage' ),
		'items_list_navigation' => __( 'Work list navigation', 'sage' ),
		'filter_items_list'     => __( 'Filter items list', 'sage' ),
	);
	$args = array(
		'label'                 => __( 'Work', 'sage' ),
		'description'           => __( 'Post Type Description', 'sage' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'type', 'tech', 'role' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'work', $args );

}
add_action( 'init',  __NAMESPACE__ . '\\work_post_type', 1 );
