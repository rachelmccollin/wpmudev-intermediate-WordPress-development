<?php get_header(); ?>

<div class="container">
	<div class="content">
	<?php if ( have_posts()) :?>
	
		<?php $author = $wp_query->get_queried_object(); ?>
		<h1>
			<?php _e( 'Posts by ', 'wpmu' ); ?>
			<?php echo $author->display_name; ?>
		</h1>
		
        <div class="entry-meta-before">
	        <?php
			echo $author->user_description;
	        
			$authornickname = $author->first_name;
			$authorlink = $author->user_url;
	        printf( __( '<p><a href="%1$s">Visit %2$s&#39;s website</a></p>', 'wpmu' ), $authorlink, $authornickname ); ?>
        </div>
		
		<?php while ( have_posts()) : the_post();?> 

			<?php get_template_part( 'loop' ); ?>	

		<?php endwhile; endif; ?>

	</div><!--.content-->
	
<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>