<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
	<?php if ( is_front_page() ) { 
		return;	
	}
	else { ?>
		<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
	<?php } ?>
	
	<div class="entry-content">
		<?php the_content('<p class="left"></p>');?>
	</div><!--.entry-content-->		

</article>