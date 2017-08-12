<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
	<div class="uva-logo">
		<a href="/"><img src="/uvarquitectos/site/wp-content/themes/uvarquitectos/images/uva-logo.svg" alt="UVA Logo"></a>
	</div>
	<nav id="menu" role="navigation">
		<div class="mobile-menu">MENÚ</div>
		<?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
	</nav>
</header>
<div class="container">