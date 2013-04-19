<?php
/**
 * Open Streets Calgary functions and definitions
 *
 * @package Open Streets Calgary
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'open_streets_calgary_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function open_streets_calgary_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Open Streets Calgary, use a find and replace
	 * to change 'open_streets_calgary' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'open_streets_calgary', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'open_streets_calgary' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // open_streets_calgary_setup
add_action( 'after_setup_theme', 'open_streets_calgary_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function open_streets_calgary_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'open_streets_calgary_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'open_streets_calgary_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function open_streets_calgary_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'open_streets_calgary' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'open_streets_calgary_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function open_streets_calgary_scripts() {
	wp_enqueue_style( 'Open Streets Calgary-style', get_stylesheet_uri() );

	wp_enqueue_script( 'Open Streets Calgary-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'Open Streets Calgary-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'Open Streets Calgary-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'open_streets_calgary_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );


/**
 * register more featured images for pages
 */

if( class_exists( 'kdMultipleFeaturedImages' ) ) {
	$args1 = array(
            'id' => 'featured-image-2',
            'post_type' => 'page',      // Set this to post or page
            'labels' => array(
                'name'      => 'Featured image 2',
                'set'       => 'Set featured image 2',
                'remove'    => 'Remove featured image 2',
                'use'       => 'Use as featured image 2',
            )
    );

    $args2 = array(
            'id' => 'featured-image-3',
            'post_type' => 'page',      // Set this to post or page
            'labels' => array(
                'name'      => 'Featured image 3',
                'set'       => 'Set featured image 3',
                'remove'    => 'Remove featured image 3',
                'use'       => 'Use as featured image 3',
            )
    );

    new kdMultipleFeaturedImages( $args1 );
    new kdMultipleFeaturedImages( $args2 );
}


/**
 * register widget area for the homepage where a quote appears
 */

function register_widget_area() {
    if( function_exists( 'register_sidebar' ) ) {
        register_sidebar( array(
            'name' => 'homepage-quote-area',
            'id' => 'homepage-quote-area',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h1 class="title">',
            'after_title' => '</h1>',
        ) );
    }
}
add_action( 'widgets_init', 'register_widget_area' );



