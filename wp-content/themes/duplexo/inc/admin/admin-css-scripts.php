<?php
/**
 * Enqueue scripts and styles for the ADMIN section.
 *
 * @since Duplexo 1.0
 *
 * @return void
 */
if( !function_exists('duplexo_wp_admin_scripts_styles') ){
function duplexo_wp_admin_scripts_styles() {
	
	/* Core files of the theme */
	wp_enqueue_style( 'admin-style', get_template_directory_uri() . '/inc/admin/admin-css.css', false, '1.0.0' );
	wp_enqueue_script( 'admin-script', get_template_directory_uri() . '/inc/admin/admin-script.js', array( 'jquery' ) );
	
	/* CymolThemes Icon Picker - JS files */
	
	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap', get_template_directory_uri().'/inc/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ) );

	
	// Bootstrap icon picker
	wp_enqueue_script( 'bootstrap-iconpicker', get_template_directory_uri().'/inc/assets/bootstrap-iconpicker/js/bootstrap-iconpicker.js', array( 'bootstrap', 'iconset-fontawesome', 'iconset-linecons', 'iconset-themify' ) );
	
	
	/* CymolThemes Icon Picker - CSS files */
	
	// Bootstrap icon picker - CSS
	wp_enqueue_style( 'bootstrap-iconpicker', get_template_directory_uri() . '/inc/assets/bootstrap-iconpicker/css/bootstrap-iconpicker.min.css' );
	
	// iconset-fontawesome
	wp_enqueue_style( 'font-awesome', get_template_directory_uri().'/assets/font-awesome/css/font-awesome.min.css' );
	
	// iconset-fontawesome
	wp_enqueue_style( 'vc-linecons', get_template_directory_uri().'/assets/vc-linecons/vc_linecons_icons.min.css' );
	
	// iconset-themify
	wp_enqueue_style( 'themify', get_template_directory_uri().'/assets/themify-icons/themify-icons.css' );
		
	// Sticky Kit library
	wp_enqueue_script( 'jquery-sticky-kit', get_template_directory_uri() . '/inc/assets/sticky-kit/jquery.sticky-kit.min.js', array( 'jquery' ) );
	
	// Twemoji Awesome
	wp_enqueue_style( 'twemojiawesome' );
	
	// themify
	wp_enqueue_style( 'themify' );
	
}
}
add_action( 'admin_enqueue_scripts', 'duplexo_wp_admin_scripts_styles' );