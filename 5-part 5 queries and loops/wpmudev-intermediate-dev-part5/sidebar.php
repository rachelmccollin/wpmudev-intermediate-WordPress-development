<!-- #right sidebar -->
<aside class="sidebar">

<?php do_action( 'wpmu_before_sidebar' ); ?>

<?php if ( is_active_sidebar( 'sidebar-widget-area' ) ) : ?>
		<?php dynamic_sidebar( 'sidebar-widget-area' ); ?>
<?php endif; ?>

<?php do_action( 'wpmu_after_sidebar' ); ?>

</aside>