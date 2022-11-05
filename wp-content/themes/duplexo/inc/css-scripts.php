<?php

/* For security */
if ( !defined( 'ABSPATH' ) ) {
	die( 'No direct access allowed' );
}


/*
 *  Check if MIN css or not
 */
if( !function_exists('cymolthemes_min_css') ){
function cymolthemes_min_css(){
	global $duplexo_theme_options;
	
	// Checking if MIN enabled
	if(!is_admin()) {
		if( isset($duplexo_theme_options['minify']) && $duplexo_theme_options['minify']==true ){
			define('CYMOLTHEMES_MIN', '.min');
		} else {
			define('CYMOLTHEMES_MIN', '');
		}
	}
	else {
		define('CYMOLTHEMES_MIN', '.min');	
	}
}
}
add_action( 'init', 'cymolthemes_min_css' );


/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Duplexo 1.0
 *
 * @return void
 */
if( !function_exists('duplexo_scripts_styles') ){
function duplexo_scripts_styles() {
	global $duplexo_theme_options;
	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	$thread_comments_option = get_option( 'thread_comments' );
	
	if ( is_singular() && comments_open() && $thread_comments_option ){
		wp_enqueue_script( 'comment-reply' );
	}
	

	// fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css' );
	
	
	// Animsition - Add page translation effect
	if( isset($duplexo_theme_options['pagetranslation']) && $duplexo_theme_options['pagetranslation']!='no'){
		wp_register_script( 'jquery-animsition', get_template_directory_uri() . '/assets/animsition/js/jquery.animsition.min.js', array( 'jquery' ), '', true );
		wp_register_style( 'animsition', get_template_directory_uri() . '/assets/animsition/css/animsition.min.css' );
	}
	
	// Perfect Scrollbar
	wp_enqueue_script( 'perfect-scrollbar', get_template_directory_uri() . '/assets/perfect-scrollbar/perfect-scrollbar.jquery.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'perfect-scrollbar', get_template_directory_uri() . '/assets/perfect-scrollbar/perfect-scrollbar.min.css' );
	
	
	// hower.css : Hover effect (we are using min version)
	wp_register_style( 'hover', get_template_directory_uri() . '/assets/hover/hover-min.css' );
	
	// Chris Bracco Tooltip
	wp_enqueue_style( 'chrisbracco-tooltip', get_template_directory_uri() . '/assets/chrisbracco-tooltip/chrisbracco-tooltip.min.css' );
	
	// multi-columns-row
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.css' );
	
	// Select2
	wp_enqueue_script( 'select2', get_template_directory_uri() . '/assets/select2/select2.min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'select2', get_template_directory_uri() . '/assets/select2/select2.min.css' );
	
	// IsoTope
	wp_enqueue_script( 'isotope-pkgd', get_template_directory_uri() . '/assets/isotope/isotope.pkgd.min.js', array( 'jquery' ), '', true );
	
	// jquery-mousewheel
	wp_enqueue_script( 'jquery-mousewheel', get_template_directory_uri() . '/assets/jquery-mousewheel/jquery.mousewheel.min.js', array( 'jquery' ), '', true );
	
	// Flex Slider
	wp_enqueue_script( 'jquery-flexslider', get_template_directory_uri() . '/assets/flexslider/jquery.flexslider-min.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/assets/flexslider/flexslider.css' );
	
	
	// Sticky
	if( !empty($duplexo_theme_options['sticky_header']) && $duplexo_theme_options['sticky_header']=='y' ){
		wp_enqueue_script( 'jquery-sticky-kit', get_template_directory_uri() . '/assets/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) , '', true );
	}
	
	// TM Social Icons CSS Library
	wp_enqueue_style( 'cymolthemes-duplexo-icons', get_template_directory_uri() . '/assets/cmt-duplexo-icons/css/cmt-duplexo-icons.css' );
	
	// Extra icons related to different businesses
	wp_enqueue_style( 'cymolthemes-duplexo-extra-icons', get_template_directory_uri() . '/assets/cymolthemes-duplexo-extra-icons/font/flaticon.css' );
	
	// animate.css
	if ( !wp_style_is( 'animate-css', 'registered' ) ) { // If library is not registered
		wp_register_style( 'animate-css', get_template_directory_uri() . '/assets/animate/animate.min.css' );
	}
	wp_register_script( 'jquery-nivo-slider-pack', get_template_directory_uri() . '/assets/nivo-slider/jquery.nivo.slider.pack.js', array( 'jquery' ), '', true );
	wp_register_style( 'nivo-slider-css', get_template_directory_uri() . '/assets/nivo-slider/nivo-slider.css' );
	wp_register_style( 'nivo-slider-theme', get_template_directory_uri() . '/assets/nivo-slider/themes/default/default.css' );
	
	// Numinate plugin
	if ( !wp_script_is( 'waypoints', 'registered' ) ) { // If library is not registered
		wp_register_script( 'waypoints', get_template_directory_uri() . '/assets/waypoints/jquery.waypoints.min.js', array( 'jquery' ), '', true );
	}
	wp_register_script( 'numinate', get_template_directory_uri() . '/assets/numinate/numinate.min.js', array( 'jquery' ), '', true );
	
	// Slick library
	wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), '', true );
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/slick/slick.css' );
	wp_enqueue_style( 'slick-theme', get_template_directory_uri() . '/assets/slick/slick-theme.css', array('slick') );
	
	// PrettyPhoto
	if ( !wp_script_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_js = get_template_directory_uri() . '/assets/prettyphoto/js/jquery.prettyPhoto.js';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/js/jquery.prettyPhoto.js') ){
			$prettyphoto_js = WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/js/jquery.prettyPhoto.js';
		}
		wp_register_script( 'prettyphoto', $prettyphoto_js, array('jquery') , '', true);
	}
	if ( !wp_style_is( 'prettyphoto', 'registered' ) ) { // If library is not registered
		$prettyphoto_css = get_template_directory_uri() . '/assets/prettyphoto/css/prettyPhoto.css';
		if( file_exists( WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/css/prettyPhoto.css') ){
			$prettyphoto_css = WP_PLUGIN_URL . '/js_composer/assets/lib/prettyphoto/css/prettyPhoto.css';
		}
		wp_register_style( 'prettyphoto', $prettyphoto_css );
	}
	
	// CSSgram
	wp_register_style( 'cssgram', get_template_directory_uri() . '/assets/cssgram/cssgram.min.css' );
	
	// Twemoji Awesome
	wp_register_style( 'twemoji-awesome', get_template_directory_uri() . '/assets/twemoji-awesome/twemoji-awesome.css' );
	
	// Loading prettyPhoto by default
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
	
}
}
add_action( 'wp_enqueue_scripts', 'duplexo_scripts_styles', 10 );


if( !function_exists('duplexo_scripts_styles_14') ){
function duplexo_scripts_styles_14() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'multi-columns-row', get_template_directory_uri() . '/css/multi-columns-row.min.css', array('bootstrap') );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.min.css', array('bootstrap') );
	
	if ( file_exists( ABSPATH . 'wp-content/plugins/js_composer/assets/css/js_composer_tta.min.css') ) {
		wp_enqueue_style( 'js-composer-tta',  plugins_url() . '/js_composer/assets/css/js_composer_tta.min.css' );
	}
	
	wp_enqueue_style( 'duplexo-shortcode-style', get_template_directory_uri() . '/css/shortcode'.CYMOLTHEMES_MIN.'.css', array('bootstrap','bootstrap-theme') );
}
}
add_action( 'wp_enqueue_scripts', 'duplexo_scripts_styles_14', 14 );


if( !function_exists('duplexo_scripts_styles_15') ){
function duplexo_scripts_styles_15() {
	global $duplexo_theme_options;
	$min = CYMOLTHEMES_MIN;
	if( is_child_theme() ){
		$min = '';
	}
	if( defined( 'WPB_VC_VERSION' ) ){
		wp_enqueue_style( 'duplexo-core-style', get_template_directory_uri() . '/css/core'.CYMOLTHEMES_MIN.'.css' , array('js_composer_front') );
	} else {
		wp_enqueue_style( 'duplexo-core-style', get_template_directory_uri() . '/css/core'.CYMOLTHEMES_MIN.'.css' );
	}

}
}
add_action( 'wp_enqueue_scripts', 'duplexo_scripts_styles_15', 15 );


if( !function_exists('duplexo_scripts_styles_17') ){
function duplexo_scripts_styles_17() {
	// Responsive
	global $duplexo_theme_options;
	
	// Responsive CSS
	wp_enqueue_style( 'duplexo-responsive-style', get_template_directory_uri() . '/css/responsive'.CYMOLTHEMES_MIN.'.css' );
	
	// Loads JavaScript file with functionality specific to Duplexo.
	if ( wp_script_is( 'wpb_composer_front_js', 'registered' ) ) {
		wp_enqueue_script( 'duplexo-main', get_template_directory_uri() . '/js/main'.CYMOLTHEMES_MIN.'.js', array( 'jquery', 'wpb_composer_front_js' ), '1.0', true );
	} else {
		wp_enqueue_script( 'duplexo-functions', get_template_directory_uri() . '/js/main'.CYMOLTHEMES_MIN.'.js', array( 'jquery' ), '1.0', true );
	}
	
	wp_enqueue_style( 'theme-last-checkpoint', get_template_directory_uri() . '/css/theme-last-checkpoint.min.css' );
	
	
}
}
add_action( 'wp_enqueue_scripts', 'duplexo_scripts_styles_17', 17 );