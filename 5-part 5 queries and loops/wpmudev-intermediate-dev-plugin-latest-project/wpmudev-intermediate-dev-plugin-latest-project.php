<?php
/**
* Plugin Name:   WPMU Intermediate plugin to show latest project in sidebar
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Uses WP_Query to fetch the latest project and putput it in the sidebar
* Version:       1.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*********************************************************************************
Enqueue stylesheet
*********************************************************************************/
function wpmu_latest_project_enqueue_styles() {
	
	wp_register_style( 'latest_project_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'latest_project_css' );
 
}
add_action( 'wp_enqueue_scripts', 'wpmu_latest_project_enqueue_styles' );
 
/*********************************************************************************

*********************************************************************************/
function wpmu_latest_project() {
	
	// arguments for query
	$args = array(
		'post_type' => 'project',
		'posts_per_page' => 1
	);
	
	// run the query
	$query = new WP_query ( $args );
	
	// check the query returns posts
	if ( $query->have_posts() ) { ?>
	
		<section class="projects">
		
			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
		
			<?php //contents of loop ?>
			<h3>Latest Project - <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
			<?php the_excerpt(); ?>
			<div class="read-more"><a href="<?php the_permalink(); ?>">Read More</a></div>
			  
			<?php endwhile; ?>
		
		<?php rewind_posts(); ?>
		
			</section>
	  
	<?php }
	
}
add_action( 'wpmu_after_sidebar', 'wpmu_latest_project' );