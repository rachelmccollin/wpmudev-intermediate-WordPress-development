<?php 
// The archive file for the project post type, registered via a plugin
	
get_header(); ?>

<div class="container">
	<div class="content">
	<?php if ( have_posts()) :?>
	
		<h1><?php echo apply_filters( 'project_archive_title', __( 'Our Favorite Projects', 'wpmu' ) ); ?></h1>
		
		<?php while ( have_posts()) : the_post();?> 

			<?php get_template_part( 'loop', 'project' ); ?>	

		<?php endwhile; endif; ?>

	</div><!--.content-->
	
<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>