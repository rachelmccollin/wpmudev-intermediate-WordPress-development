<!DOCTYPE html>
<html>
<head> 
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title('|','true','right'); ?><?php bloginfo('name'); ?></title>
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wpmu_before_header' ); ?>

<header>
	<div class="header-left">
		<div class="site-title">
			<h1 class="site-name"><a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		</div><!--.site-title-->
	</div><!--.header-left-->

	<div class="header-right">
		<?php if ( is_active_sidebar( 'header-widget-area' ) ) : ?>
			<?php dynamic_sidebar( 'header-widget-area' ); ?>
		<?php endif; ?>
	</div><!--header-right-->
</header>

<?php do_action( 'wpmu_after_header' ); ?>


<nav class="main">
	<?php wp_nav_menu( array(
		'theme_location' => 'header-menu',
		'container_class' => 'menu'
	) ); ?>
</nav>