<?php
/**
* Plugin Name:   Call to Action Shortcode
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Adds a shortcode for a call to action box
* Version:       1.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*********************************************************************************
Enqueue stylesheet
*********************************************************************************/
function wpmu_shortcode_enqueue_styles() {
	
	wp_register_style( 'shortcode_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'shortcode_cta_css' );
 
}
add_action( 'wp_enqueue_scripts', 'wpmu_shortcode_enqueue_styles' );
 
/*********************************************************************************
Simple shortcode
*********************************************************************************/
function wpmu_cta_simple() {
	ob_start(); 
	?>
	
	<div class="shortcode cta">
		
		Call us on 111-1111 or email <a href="email@email.com">email@email.com</a>
		
	</div>	
	
	<?php 
	return ob_get_clean();	

}
add_shortcode( 'cta-simple', 'wpmu_cta_simple' );

/*********************************************************************************
Shortcode with opening and closing tags
*********************************************************************************/
function wpmu_cta_tags( $atts, $content = null ) {
	ob_start(); 
	?>
		
	<div class="cta">
		
			<?php echo $content; ?>
		
	</div>	
	
	<?php 
	return ob_get_clean();	

}
add_shortcode( 'cta-tags', 'wpmu_cta_tags' );

/*********************************************************************************
Shortcode with attributes
*********************************************************************************/
function wpmu_cta_atts( $atts, $content = null ) {
	
	$atts = shortcode_atts( array(
		'tel' => 'telephone',
		'email' => 'email address'
	), $atts, 'cta-atts' );
	
	ob_start(); 
	?>	
	

	<div class="cta">
		
		<?php echo 'Call us on ' . $atts['tel'] . ' or email <a href="' . $atts['email'] . '">' . $atts['email'] . '</a>'; ?>
		
	</div>	
	
	<?php 
	return ob_get_clean();	

}
add_shortcode( 'cta-atts', 'wpmu_cta_atts' );