<?php
/**
* Plugin Name:   Call to Action Widget
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Adds a widget for a call to action box
* Version:       2.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*********************************************************************************
Enqueue stylesheet
*********************************************************************************/
function wpmu_widget_enqueue_styles() {
	
	wp_register_style( 'widget_cta_css', plugins_url( 'css/style.css', __FILE__ ) );
    wp_enqueue_style( 'widget_cta_css' );
 
}
add_action( 'wp_enqueue_scripts', 'wpmu_widget_enqueue_styles' );
 
/*********************************************************************************
Widget
*********************************************************************************/
class Wpmu_Cta_Widget extends WP_Widget {
	//widget constructor function
	function __construct() {
		$widget_options = array(
			'classname' => 'wpmu_cta_widget',
			'description' => __( 'Add a Call to Action box encouraging people to get in touch.', 'wpmu' )
		);
		parent::__construct( 'wpmu_cta_widget', __( 'Call to Action', 'wpmu' ), $widget_options );
	}
 
	//function to define the form in the Widgets screen
	function form( $instance ) { 
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$tel = ! empty( $instance['tel'] ) ? $instance['tel'] : __( 'Telephone number', 'wpmu' );
		$email = ! empty( $instance['email'] ) ? $instance['email'] : __( 'Email address', 'wpmu' );
	?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'wpmu' ); ?></label>
			<input class="widefat" type ="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'tel' ); ?>"><?php _e( 'Your telephone number:', 'wpmu' ); ?></label>
			<input class="widefat" rows="10" type="text" id="<?php echo $this->get_field_id( 'tel' ); ?>" name="<?php echo $this->get_field_name( 'tel' ); ?>" value="<?php echo esc_attr( $tel ); ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'email' ); ?>"><?php _e( 'Your email address:', 'wpmu' ); ?></label>
			<input class="widefat" rows="10" type="text" id="<?php echo $this->get_field_id( 'email' ); ?>" name="<?php echo $this->get_field_name( 'email' ); ?>" value="<?php echo esc_attr( $email ); ?>" />
		</p>
	
	<?php }

 	//function to define the data saved by the widget
	function update( $new_instance, $old_instance ) { 
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		$instance[ 'tel' ] = strip_tags( $new_instance[ 'tel' ] );
		$instance[ 'email' ] = strip_tags( $new_instance[ 'email' ] );
		return $instance;
	}

 	//function to display the widget in the site
	function widget( $args, $instance ) {
		echo $args ['before_widget'];
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$tel = $instance['tel'];
		$email = $instance['email'];
	?>
		<div class="cta">
			<?php if ( ! empty( $title ) ) {
				echo $before_title . $title . $after_title; 
			}; ?>
		
		<?php printf( __( 'Call us on %1$s or email <a href="%2$s">%2$s</a>', 'wpmu' ), $tel, $email ); ?>

	</div>
		
		<?php echo $args['after_widget'];
	
	}

}

//function to register the widget
function wpmu_register_widget() { 
	register_widget( 'Wpmu_Cta_Widget' );
}
add_action( 'widgets_init', 'wpmu_register_widget' );

/**********************************************************************************
wpmu_cta_widget_i18n - registers text domain for i18n
**********************************************************************************/
function wpmu_cta_widget_i18n() {
	
	load_plugin_textdomain( 'wpmu', false, plugin_basename( dirname( __FILE__ ) ) . '/languages' );

}
add_action( 'plugins_loaded', 'wpmu_cta_widget_i18n' );