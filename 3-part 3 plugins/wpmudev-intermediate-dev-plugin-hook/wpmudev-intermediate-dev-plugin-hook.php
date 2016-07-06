<?php
/**
* Plugin Name:   Call to Action Plugin - Hooked to Theme
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Adds a call to action box
* Version:       1.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*********************************************************************************
Enqueue stylesheet
*********************************************************************************/
function wpmu_hook_plugin_enqueue_styles() {
	
	wp_register_style( 'hook_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'hook_cta_css' );
 
}
add_action( 'wp_enqueue_scripts', 'wpmu_hook_plugin_enqueue_styles' );
 
/*********************************************************************************
CTA box
*********************************************************************************/
function wpmu_cta_below_posts() {	
	
	if ( is_singular( 'post' ) ) { ?>
		
		<div class="cta-in-post">
		
			Call us on 111-1111 or email <a href="email@email.com">email@email.com</a>
		
		</div>
		
	<?php }

}
add_action( 'wpmu_after_content', 'wpmu_cta_below_posts' );
