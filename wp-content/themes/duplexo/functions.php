<?php
/**
 * Duplexo functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Duplexo
 * @since Duplexo 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Duplexo 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 847;
}


if ( ! function_exists( 'cymolthemes_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Duplexo 1.0
 */
function cymolthemes_setup() {

	global $duplexo_theme_options;
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on duplexo, use a find and replace
	 * to change 'duplexo' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'duplexo', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'gallery', 'audio', 'video', 'quote', 'link', 'status', 'chat'
	) );
		
	/*
	 * Enable support for woocommerce.
	 */
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-lightbox' );

	/*
	 * This theme uses wp_nav_menu() in four locations.
	 */
	register_nav_menus( array( // https://codex.wordpress.org/Function_Reference/has_nav_menu
		'cymolthemes-main-menu'			=> esc_html__( 'Main Menu', 'duplexo' ),
		'cymolthemes-footer-menu'		=> esc_html__( 'Footer Menu', 'duplexo' ),
	) );
	
}
endif; // cymolthemes_setup()
add_action( 'after_setup_theme', 'cymolthemes_setup' );


/************************* Custom Files ************************/

// Load theme functions
require get_template_directory() . '/inc/cmt-functions.php';

// filters and action hooks
require get_template_directory() . '/inc/general.php';

// Add our shortcodes as addons for Visual Composer
if( function_exists('vc_map') ){
	require get_template_directory() . '/inc/theme-elements.php';
}

// WooCommerce support
require get_template_directory() . '/inc/woocommerce.php';

// Load framework
require get_template_directory() . '/inc/base-framework.php';

// Widget Positions options
require get_template_directory() . '/inc/theme-widgets.php';


// Enqueue styles and scripts
require get_template_directory() . '/inc/css-scripts.php';

// Enqueue styles and scripts for admin
require get_template_directory() . '/inc/admin/admin-css-scripts.php';

// bundled plugins
require get_template_directory() . '/inc/class-tgm-plugin-activation.php';
require get_template_directory() . '/inc/require-plugins.php';
