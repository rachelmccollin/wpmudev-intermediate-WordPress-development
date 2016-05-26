<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
	
	<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
	
	<div class="entry-content">
		<?php the_content('<p class="left"></p>');?>
	</div><!--.entry-content-->		

</article>	