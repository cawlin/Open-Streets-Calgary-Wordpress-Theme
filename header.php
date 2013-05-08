<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Open Streets Calgary
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>	
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/bootstrap/css/bootstrap-responsive.css" media="screen" />
	<script src="<?php bloginfo('template_directory'); ?>/js/jquery.selectnav-0.1.7.js" type="text/javascript" charset="utf-8"></script>
	
</head>

<body <?php body_class(); ?>>
	<div class="container hfeed site">
		<?php do_action( 'before' ); ?>
			<header id="masthead" class="site-header" role="banner">
				<hgroup>
					<h1><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/open-streets-calgary-logo.png" width="620" height="107" alt="Open Streets Calgary"></a></h1>
				</hgroup>
				
				<nav id="site-navigation" role="navigation">
					<div class="screen-reader-text skip-link">
						<a href="#content" title="<?php esc_attr_e( 'Skip to content', 'open_streets_calgary' ); ?>"><?php _e( 'Skip to content', 'open_streets_calgary' ); ?></a>
					</div>
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
					<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Fopenstreetscalgary&amp;send=false&amp;layout=button_count&amp;width=86&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:86px; height:21px;" allowTransparency="true" id="fb-header-like"></iframe>
				</nav><!-- #site-navigation -->
			</header><!-- #masthead -->
