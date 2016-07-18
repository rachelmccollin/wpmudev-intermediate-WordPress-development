<?php
/**********************************************************************************
Call include files
**********************************************************************************/
include( get_stylesheet_directory() . '/includes/customizer.php' );

/**********************************************************************************
wpmu_register_menus - register menus
**********************************************************************************/
function wpmu_register_menus() {
  register_nav_menus(
    array( 'header-menu' => __( 'Primary' ) )
  );
}
add_action( 'init', 'wpmu_register_menus' );

/**********************************************************************************
wpmu_widgets_init - register widgets
**********************************************************************************/
function wpmu_widgets_init() {
	// widget area in header
	register_sidebar (array(
		'name'          => __('Header Widget Area','rm'),
		'id'            => "header-widget-area",
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' )
		);
	// main sidebar
	register_sidebar (array(
		'name'          => __('Sidebar','rm'),
		'id'            => "sidebar-widget-area",
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' )
		);
	// first footer widget area
	register_sidebar (array(
		'name'          => __('First Footer Widget Area','rm'),
		'id'            => "footer-first-widget-area",
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' )
		);
	// second footer widget area
	register_sidebar (array(
		'name'          => __('Second Footer Widget Area','rm'),
		'id'            => "footer-second-widget-area",
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' )
		);
	// third footer widget area
	register_sidebar (array(
		'name'          => __('Third Footer Widget Area','rm'),
		'id'            => "footer-third-widget-area",
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' )
		);
	// fourth footer widget area
	register_sidebar (array(
		'name'          => __('Fourth Footer Widget Area','rm'),
		'id'            => "footer-fourth-widget-area",
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>' )
		);
}
add_action('init', 'wpmu_widgets_init');

/**********************************************************************************
wpmu_theme_support - adds theme support for post formats, post thumbnails, HTML5 and automatic feed links
**********************************************************************************/
function wpmu_theme_support() {

  /* post formats */
  add_theme_support( 'post-formats', array( 'aside', 'quote' ) );
  
  /* post thumbnails */
  add_theme_support( 'post-thumbnails', array( 'post', 'page', 'project' ) );

  /* HTML5 */
  add_theme_support( 'html5' );

  /* automatic feed links */
  add_theme_support( 'automatic-feed-links' );

}
add_action( 'after_setup_theme', 'wpmu_theme_support' );

/**********************************************************************************
wpmu_add_pages_to_category_archives - adds pages to category archives
**********************************************************************************/
function wpmu_add_pages_to_category_archives( $query ) {
	
	if ( is_category() && $query->is_main_query() ) {
		$query->set('post_type', array( 'post', 'page' ) );
	}
	
}
add_action( 'pre_get_posts', 'wpmu_add_pages_to_category_archives' );

/**********************************************************************************
wpmu_theme_i18n - registers text domain for i18n
**********************************************************************************/
function wpmu_theme_i18n() {
	
	load_theme_textdomain( 'wpmu', get_template_directory() . '/languages');

}
add_action( 'after_setup_theme', 'wpmu_theme_i18n' );