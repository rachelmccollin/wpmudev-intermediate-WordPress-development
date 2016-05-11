<footer>
	
	<div class="container">
		
		<aside class="footer first">
		<?php if ( is_active_sidebar( 'footer-first-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'footer-first-widget-area' ); ?>
		<?php endif; ?>
		</aside>
	
		<aside class="footer second">
		<?php if ( is_active_sidebar( 'footer-second-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'footer-second-widget-area' ); ?>
		<?php endif; ?>
		</aside>
		
		<aside class="footer third">
		<?php if ( is_active_sidebar( 'footer-third-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'footer-third-widget-area' ); ?>
		<?php endif; ?>
		</aside>
		
		<aside class="footer fourth">
		<?php if ( is_active_sidebar( 'footer-fourth-widget-area' ) ) : ?>
				<?php dynamic_sidebar( 'footer-fourth-widget-area' ); ?>
		<?php endif; ?>
		</aside>	
		
	</div>	

</footer>
<?php wp_footer(); ?>
</body>
</html>