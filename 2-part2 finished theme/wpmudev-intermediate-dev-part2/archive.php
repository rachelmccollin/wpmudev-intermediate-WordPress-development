<?php get_header(); ?>

<div class="container">
	<div class="content">
	<?php if ( have_posts()) :?>
	
		<?php $title = $wp_query->get_queried_object(); ?>
		<h1>Archive for <?php echo $title->name; ?></h1>
		
		<?php while ( have_posts()) : the_post();?> 

			<?php get_template_part( 'loop' ); ?>	

		<?php endwhile; endif; ?>

	</div><!--.content-->
	
<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>