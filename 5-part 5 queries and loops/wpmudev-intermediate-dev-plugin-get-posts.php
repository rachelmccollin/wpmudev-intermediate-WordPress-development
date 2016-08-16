<?php
/**
* Plugin Name:   WPMU Intermediate Plugin to Fetch Posts using get_posts()
* Plugin URI:    https://github.com/rachelmccollin/wpmudev-intermediate-WordPress-development
* Description:   Feteches posts in the same category as the current page and putputs them after the content.
* Version:       1.0
* Author:        Rachel McCollin
* Author URI:    http://rachelmccollin.co.uk
*
*
*/

/*******************************************************************************************
wpmu_get_recent_posts - fetches the posts
*******************************************************************************************/
function wpmu_get_recent_posts() {
	
	if ( ! is_home() ) {
		
		/* arguments */
		$args = array(
			'sort_order' => 'desc',
			'sort_column' => 'date',
			'number' => '5',
		);
		
		// now run get_posts and check that any are returned
		$myposts = get_posts( $args );
		if  ( $myposts ) { ?>
			
			<h2>Latest Posts</h2>
			
			<?php // output the posts
			foreach( $myposts as $mypost ) {
				
				setup_postdata( $mypost );
				
				$postID = $mypost->ID; ?>
			
				<article class="post recent <?php echo $postID; ?>">
						
					<h3><a href="<?php echo get_page_link( $postID ); ?>"><?php echo get_the_title( $postID ); ?></a></h3>
					<section class="entry">
						<?php the_excerpt( $postID ); ?>
						<a href="<?php echo get_page_link( $postID ); ?>">Read More</a>
					</section>
				</article>

		<?php }
			
		}
		
	}									
	
}
add_action( 'wpmu_after_content', 'wpmu_get_recent_posts' );