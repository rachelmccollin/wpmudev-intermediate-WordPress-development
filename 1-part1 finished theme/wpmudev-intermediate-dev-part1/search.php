<?php get_header(); ?>

<div class="container">
	<div class="content">
		<?php if ( have_posts()) { ?>
		
			<h1>Search Results</h1>
			
			<?php while ( have_posts()) : the_post();?> 
	
				<?php get_template_part( 'loop' ); ?>	
	
			<?php endwhile; ?>
		<?php } else { ?>
					
			<h1>Nothing Found, Sorry!</h1>
		
			<p>There are no results for your search term. Why not try another search?</p>
		
			<?php get_search_form (); ?>
			
		<?php } ?>

	</div><!--.content-->
	
<?php get_sidebar(); ?>

</div><!--.container-->

<?php get_footer(); ?>