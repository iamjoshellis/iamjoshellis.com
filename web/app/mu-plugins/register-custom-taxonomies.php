<?php
/*
Plugin Name:  Register Custom Taxonomies
Plugin URI:   https://generatewp.com/taxonomy/
Description:  Registers Custom Taxonomies
Version:      1.0.0
Author:       Josh Ellis
Author URI:   https://iamjoshellis.com
License:      MIT License
*/

namespace JoshEllis\CustomTaxonomies;

function type_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Types', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Type', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Types', 'sage' ),
		'all_items'                  => __( 'All Types', 'sage' ),
		'parent_item'                => __( 'Parent Type', 'sage' ),
		'parent_item_colon'          => __( 'Parent Type:', 'sage' ),
		'new_item_name'              => __( 'New Type', 'sage' ),
		'add_new_item'               => __( 'Add New Type', 'sage' ),
		'edit_item'                  => __( 'Edit Type', 'sage' ),
		'update_item'                => __( 'Update Type', 'sage' ),
		'view_item'                  => __( 'View Type', 'sage' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Types', 'sage' ),
		'search_items'               => __( 'Search Types', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'no_terms'                   => __( 'No items', 'sage' ),
		'items_list'                 => __( 'Types list', 'sage' ),
		'items_list_navigation'      => __( 'Types list navigation', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array(
			'slug' => 'work/type',
			'with_front' => false
		)
	);
	register_taxonomy( 'type', array( 'work' ), $args );

}
add_action( 'init', __NAMESPACE__ . '\\type_taxonomy', 0 );

function tech_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Tech', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Tech', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Tech', 'sage' ),
		'all_items'                  => __( 'All Tech', 'sage' ),
		'parent_item'                => __( 'Parent Tech', 'sage' ),
		'parent_item_colon'          => __( 'Parent Tech:', 'sage' ),
		'new_item_name'              => __( 'New Tech', 'sage' ),
		'add_new_item'               => __( 'Add New Tech', 'sage' ),
		'edit_item'                  => __( 'Edit Tech', 'sage' ),
		'update_item'                => __( 'Update Tech', 'sage' ),
		'view_item'                  => __( 'View Tech', 'sage' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Tech', 'sage' ),
		'search_items'               => __( 'Search Tech', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'no_terms'                   => __( 'No items', 'sage' ),
		'items_list'                 => __( 'Tech list', 'sage' ),
		'items_list_navigation'      => __( 'Tech list navigation', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array(
			'slug' => 'work/tech',
			'with_front' => false
		)
	);
	register_taxonomy( 'tech', array( 'work' ), $args );

}
add_action( 'init', __NAMESPACE__ . '\\tech_taxonomy', 0 );

function role_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Roles', 'Taxonomy General Name', 'sage' ),
		'singular_name'              => _x( 'Role', 'Taxonomy Singular Name', 'sage' ),
		'menu_name'                  => __( 'Roles', 'sage' ),
		'all_items'                  => __( 'All Roles', 'sage' ),
		'parent_item'                => __( 'Parent Role', 'sage' ),
		'parent_item_colon'          => __( 'Parent Role:', 'sage' ),
		'new_item_name'              => __( 'New Role', 'sage' ),
		'add_new_item'               => __( 'Add New Role', 'sage' ),
		'edit_item'                  => __( 'Edit Role', 'sage' ),
		'update_item'                => __( 'Update Role', 'sage' ),
		'view_item'                  => __( 'View Role', 'sage' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'sage' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'sage' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sage' ),
		'popular_items'              => __( 'Popular Role', 'sage' ),
		'search_items'               => __( 'Search Role', 'sage' ),
		'not_found'                  => __( 'Not Found', 'sage' ),
		'no_terms'                   => __( 'No items', 'sage' ),
		'items_list'                 => __( 'Role list', 'sage' ),
		'items_list_navigation'      => __( 'Role list navigation', 'sage' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite' => array(
			'slug' => 'work/role',
			'with_front' => false
		)
	);
	register_taxonomy( 'role', array( 'work' ), $args );

}
add_action( 'init', __NAMESPACE__ . '\\role_taxonomy', 0 );
