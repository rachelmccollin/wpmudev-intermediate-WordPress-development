<?php get_header(); ?>

<div class="container">
	<div class="content">
		
			<h1><?php _e( 'Something Went Wrong!', 'wpmu' ); ?></h1>
		
			<p><?php _e( 'We couldn&#39;t find your page. Why not try a search?', 'wpmu' ); ?></p>
		
			<?php get_search_form (); ?>
			
	</div><!--.content-->
	
<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>