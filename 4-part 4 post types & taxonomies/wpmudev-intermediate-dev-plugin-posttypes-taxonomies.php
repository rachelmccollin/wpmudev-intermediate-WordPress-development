<?php
/**
* Plugin Name:   WPMU Intermediate Plugin to Register Custom Post Types & Taxonomies
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Registers the 'project' cusotm post type and the 'service' taxonomy.
* Version:       1.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*******************************************************************************************
wpmu_create_post_type - registers the post types
*******************************************************************************************/
function wpmu_create_post_type() {
	$labels = array( 
		'name' => __( 'Projects' ),
		'singular_name' => __( 'Project' ),
		'add_new' => __( 'New Project' ),
		'add_new_item' => __( 'Add New Project' ),
		'edit_item' => __( 'Edit Project' ),
		'new_item' => __( 'New Project' ),
		'view_item' => __( 'View Project' ),
		'search_items' => __( 'Search Projects' ),
		'not_found' =>  __( 'No Projects Found' ),
		'not_found_in_trash' => __( 'No Projects found in Trash' ),
	);
	$args = array(
		'labels' => $labels,
		'has_archive' => true,
		'public' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'projects' ),
		'supports' => array(
			'title', 
			'editor', 
			'excerpt', 
			'custom-fields', 
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array( 'post_tag', 'category'), 
	);
	register_post_type( 'project', $args );
} 
add_action( 'init', 'wpmu_create_post_type' );

/*******************************************************************************************
wpmu_register_taxonomy - registers the taxonomies
*******************************************************************************************/
function wpmu_register_taxonomy() {

  $labels = array(
		'name'              => __( 'Services' ),
		'singular_name'     => __( 'Service' ),
		'search_items'      => __( 'Search Services' ),
		'all_items'         => __( 'All Services' ),
		'edit_item'         => __( 'Edit Services' ),
		'update_item'       => __( 'Update Services' ),
		'add_new_item'      => __( 'Add New Services' ),
		'new_item_name'     => __( 'New Service Name' ),
		'menu_name'         => __( 'Services' ),
	);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'weebles' ),
		'show_admin_column' => true
	);
	
	register_taxonomy( 'service', array( 'post', 'project' ), $args);
	
}
add_action( 'init', 'wpmu_register_taxonomy' );

/*******************************************************************************************
wpmu_add_categories_to_pages - registers the category taxonmy to the page post type
*******************************************************************************************/
function wpmu_add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'wpmu_add_categories_to_pages' );