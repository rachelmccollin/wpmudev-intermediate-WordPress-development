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
		'name' => __( 'Projects', 'wpmu' ),
		'singular_name' => __( 'Project', 'wpmu' ),
		'add_new' => __( 'New Project', 'wpmu' ),
		'add_new_item' => __( 'Add New Project', 'wpmu' ),
		'edit_item' => __( 'Edit Project', 'wpmu' ),
		'new_item' => __( 'New Project', 'wpmu' ),
		'view_item' => __( 'View Project', 'wpmu' ),
		'search_items' => __( 'Search Projects', 'wpmu' ),
		'not_found' =>  __( 'No Projects Found', 'wpmu' ),
		'not_found_in_trash' => __( 'No Projects found in Trash', 'wpmu' ),
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
		'name'              => __( 'Services', 'wpmu' ),
		'singular_name'     => __( 'Service', 'wpmu' ),
		'search_items'      => __( 'Search Services', 'wpmu' ),
		'all_items'         => __( 'All Services', 'wpmu' ),
		'edit_item'         => __( 'Edit Services', 'wpmu' ),
		'update_item'       => __( 'Update Services', 'wpmu' ),
		'add_new_item'      => __( 'Add New Services', 'wpmu' ),
		'new_item_name'     => __( 'New Service Name', 'wpmu' ),
		'menu_name'         => __( 'Services', 'wpmu' ),
	);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'services' ),
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

/**********************************************************************************
wpmu_cpt_i18n - registers text domain for i18n
**********************************************************************************/
function wpmu_cpt_i18n() {
	
	load_plugin_textdomain( 'wpmu', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'wpmu_cpt_i18n' );