<?php
/**
* Plugin Name:   WPMU DEV Add Post Metabox
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Adds a metabox for post meta to the post editing screen
* Version:       2.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*********************************************************************************
Enqueue stylesheet - this is empty for you to add to if you wish
*********************************************************************************/
function wpmu_metabox_enqueue_styles() {
	
	wp_register_style( 'metabox_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'metabox_css' );
 
}
add_action( 'wp_enqueue_scripts', 'wpmu_metabox_enqueue_styles' );
 
/*********************************************************************************
Add metabox
*********************************************************************************/
// create the metabox
function wpmu_add_post_metabox() {
	add_meta_box( 'wpmu_metabox', __( 'Add More', 'wpmu' ), 'wpmu_metabox_callback', 'post', 'normal', 'high' );
}
add_action( 'add_meta_boxes', 'wpmu_add_post_metabox' );

// the callback function for the metabox contents 
function wpmu_metabox_callback( $post ) { ?>
	
	<form action="" method="post">
		
		<?php // add nonce for security
		wp_nonce_field( 'wpmu_metabox_nonce', 'wpmu_nonce' );
		
		//retrieve metadata value if it exists
		$weather = get_post_meta( $post->ID, 'wpmu_weather', true ); ?>

		<label for "wpmu_metadata_weather"><?php _e( 'Today&#39;s Weather', 'wpmu' ); ?></label>
		<input type="text" name="wpmu_metadata_weather" value=<?php echo esc_attr( $weather ); ?>>
	
	</form>
	
<?php }

// the function to save data from the metabox
function wpmu_save_my_meta( $post_id ) {

	//check for nonce
	if( !isset( $_POST['wpmu_nonce'] ) ||
	!wp_verify_nonce( $_POST['wpmu_nonce'], 'wpmu_metabox_nonce' ) ) {
	  return;
	}
	
	// Check if the current user has permission to edit the post.
	if ( !current_user_can( 'edit_post', $post_id ) ) {
	  return;
	 }
	
	if ( isset( $_POST['wpmu_metadata_weather'] ) ) {		
		$new_value = ( $_POST['wpmu_metadata_weather'] );
		update_post_meta( $post_id, 'wpmu_weather', $new_value );		
	}
	
}
add_action( 'save_post', 'wpmu_save_my_meta' );

/*********************************************************************************
Ouput function
*********************************************************************************/
function wpmu_display_postmeta() {
	
	if ( is_singular( 'post' ) ) {
	
	$weather = get_post_meta( get_the_ID(), 'wpmu_weather', true ); ?>	
	
		<div class="entry-meta">
			<ul class="post-meta">
				<li><span class="post-meta-key"><?php _e( 'Today&#39;s Weather:', 'wpmu' ); ?></span> <?php echo $weather; ?></li>
			</ul>	
		</div>
	
	<?php }	
	
}
add_action( 'wpmu_after_content', 'wpmu_display_postmeta', 5 );

/*********************************************************************************
Hide custom fields UI
*********************************************************************************/
function wpmu_remove_custom_fields_ui() {
	
	remove_meta_box( 'postcustom', 'post', 'normal' );

}
add_action( 'admin_init','wpmu_remove_custom_fields_ui' );

/**********************************************************************************
wpmu_metabox_i18n - registers text domain for i18n
**********************************************************************************/
function wpmu_metabox_i18n() {
	
	load_plugin_textdomain( 'wpmu', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'wpmu_metabox_i18n' );