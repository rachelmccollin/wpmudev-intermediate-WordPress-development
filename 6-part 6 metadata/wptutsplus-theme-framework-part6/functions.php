<?php

// include for widgets
include( TEMPLATEPATH . '/includes/widgets.php' );

// register navigation menu
function wptutsplus_register_theme_menu() {
	register_nav_menu( 'primary', 'Main Navigation Menu' );
}
add_action( 'init', 'wptutsplus_register_theme_menu' );

// register sidebar widgets
function wptutsplus_widgets_init() {
	
	// In header widget area, located to the right hand side of the header, next to the site title and description. Empty by default.
	register_sidebar( array(
		'name' => __( 'In Header Widget Area', 'tutsplus' ),
		'id' => 'in-header-widget-area',
		'description' => __( 'A widget area located to the right hand side of the header, next to the site title and description.', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Sidebar widget area, located in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'tutsplus' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// First footer widget area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'tutsplus' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Second Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __('Second Footer Widget Area', 'tutsplus' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Third Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'tutsplus' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Fourth Footer Widget Area, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'tutsplus' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'tutsplus' ),
		'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
add_action( 'widgets_init', 'wptutsplus_widgets_init' );

// add theme support for featured images
function wptutsplus_theme_support() {
	add_theme_support( 'post-thumbnails' ); 
}
add_action( 'after_setup_theme', 'wptutsplus_theme_support' );


// colophon - activated via the wptp_after_footer hook
if ( ! function_exists( 'wptp_colophon' ) ) {
	function wptp_colophon() { ?>
		<section class="colophon" role="contentinfo">
			<small class="copyright half left">
				&copy; <a href="<?php echo apply_filters( 'wptp_colophon_link', home_url( '/' ) ) ?>"><?php echo apply_filters( 'wptp_colophon_name', get_bloginfo( 'name' ) ) ?></a> 2014
			</small><!-- #copyright -->
		
			<small class="credits half right">
					<?php _e( 'Proudly powered by', 'tutsplus' ); ?> <a href="http://wordpress.org/">WordPress</a>.
				</a>
			</small><!-- #credits -->
		</section><!--#colophon-->

	<?php		
	}

}
add_action( 'wptp_after_footer', 'wptp_colophon' );

function wptp_amend_colophon_name() {
	
	$name = 'Rachel McCollin';
	return $name;
	
}
add_filter( 'wptp_colophon_name', 'wptp_amend_colophon_name' );

function wptp_amend_colophon_link() {
	
	$link = 'http://rachelmccollin.co.uk';
	return $link;
	
}
add_filter( 'wptp_colophon_link', 'wptp_amend_colophon_link' );

?>