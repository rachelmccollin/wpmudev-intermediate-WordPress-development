<?php 
// The archive file for the service taxonomy, registered via a plugin
	
get_header(); ?>

<div class="container">
	<div class="content">
	<?php if ( have_posts()) :?>
	
		<?php $title = $wp_query->get_queried_object(); ?>
		<h1><?php echo $title->name; ?> Projects</h1>
		
		<?php echo term_description( $title->ID, 'service' ) ?>
		
		<?php while ( have_posts()) : the_post();?> 

			<?php get_template_part( 'loop', 'project' ); ?>	

		<?php endwhile; endif; ?>

	</div><!--.content-->
	
<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>