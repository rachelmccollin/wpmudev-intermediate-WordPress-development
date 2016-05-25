<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			
	<?php if ( is_front_page() ) { 
		return;	
	}
	else { ?>
		<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h1>
	<?php } ?>
	
	<div class="entry-content">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail( 'large' ); ?>
		</a>
		<?php the_content('<p class="left"></p>');?>
	</div><!--.entry-content-->		
	
	<?php if( is_singular( 'project' ) ) { ?>
		<div class="entry-meta">
			<?php the_terms( $post->ID, 'service', 'Services: ', ', ' ); ?>
		</div>
	<?php } ?>

</article>