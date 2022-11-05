<?php

/**
 *  Codestar Framework core files
 */
if( ! function_exists( 'duplexo_cs_framework_init' ) ) {
function duplexo_cs_framework_init(){
	// Codestar framework config
	defined('CS_OPTION'          ) or define('CS_OPTION',           'duplexo_theme_options' );
	defined('CS_ACTIVE_FRAMEWORK') or define('CS_ACTIVE_FRAMEWORK', true ); // default true
	defined('CS_ACTIVE_METABOX'  ) or define('CS_ACTIVE_METABOX',   true ); // default true
	defined('CS_ACTIVE_SHORTCODE') or define('CS_ACTIVE_SHORTCODE', true ); // default true
	defined('CS_ACTIVE_CUSTOMIZE') or define('CS_ACTIVE_CUSTOMIZE', true ); // default true
}
}
add_action( 'init', 'duplexo_cs_framework_init', 1 );
add_action( 'admin_init', 'duplexo_cs_framework_init', 1 );


/*
 *  Creating default array of theme options. This is useful if CodeStar plugin is disabled
 */
if( !function_exists('cymolthemes_load_default_theme_options') ){
function cymolthemes_load_default_theme_options(){
	global $duplexo_theme_options;
	
	if( !is_array($duplexo_theme_options) ){
		$duplexo_theme_options = array();
		include get_template_directory() . '/cs-framework-override/config/framework-options.php';
		foreach( $cmt_framework_options as $section ){
			if( isset($section['fields']) && is_array($section['fields']) ){
				foreach( $section['fields'] as $field ){
					if( isset($field['id']) && isset($field['default']) ){
						$field_id              = $field['id'];
						$field_val             = $field['default'];
						$duplexo_theme_options[$field_id] = $field_val;
					}
				}
				
			}
		}
	}
}
}
add_action('init','cymolthemes_load_default_theme_options');
add_action('admin_init','cymolthemes_load_default_theme_options');

/**
 *  Adding theme fonts
 */
if( ! function_exists( 'cymolthemes_enqueue_theme_fonts' ) ) {
function cymolthemes_enqueue_theme_fonts() {
	
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php');
	
	$options_group = $cmt_framework_options;
	$font_elements = array();
	
	foreach($options_group as $option_group){
		if( isset($option_group['fields']) && count($option_group['fields'])>0 ){
			$fields = $option_group['fields'];
			foreach($fields as $field){
				if( $field['type'] == 'cymolthemes_typography' ){
					$font_elements[] = $field['id'];
				}
			} // foreach
		}
	} // foreach

	
	// Processing all options
	cymolthemes_cs_wp_enqueue_scripts($font_elements);
	
}
}
add_filter( 'wp_head', 'cymolthemes_enqueue_theme_fonts' );

/**
 *  Get all varients of the font
 */
if ( ! function_exists( 'cymolthemes_get_all_varients' ) ) {
function cymolthemes_get_all_varients($font){
	$return = array();
	if( function_exists('cymolthemes_cs_get_google_fonts') ){
		$allfonts = cymolthemes_cs_get_google_fonts();
		if( is_array($allfonts->items) && count($allfonts->items)>0 ){
			foreach( $allfonts->items as $item ){
				if( $item->family == $font ){
					$return = $item->variants;
				}
			}
		}
	}
	return $return;
}
}


/**
 *  Load Google fonts for all cymolthemes_typography elements
 */
if ( ! function_exists( 'cymolthemes_cs_wp_enqueue_scripts' ) ) {
function cymolthemes_cs_wp_enqueue_scripts($elements) {
	$all_fonts = array();
	
	// Getting value of all Google Font options
	$google_fonts = cymolthemes_get_font_option_values($elements);
	
	
	// If page or single post than fetch font list for Titlebar and add them
	if( is_page() || is_single() ){
	
		// Getting Page settings for Titlebar meta box
		$page_settings = get_post_meta( get_the_ID(), '_cmt_page_metabox_titlebar', true );
		
		// Include array of metabox options
		include( get_template_directory(). '/cs-framework-override/config/metabox.config.php' );
		
		if( isset($page_settings['hide_titlebar']) && $page_settings['hide_titlebar']==false ){
			
			if( !empty($page_settings['titlebar_font_custom_options']) && $page_settings['titlebar_font_custom_options']=='custom' ){
				
				foreach($cmt_metabox_titlebar as $field){
					if( $field['type'] == 'cymolthemes_typography' ){
						$google_fonts[] = $page_settings[$field['id']];
					}
				}  // if
			} // foreach
		}
	}
	
	// Processing all varients and preparing array
	foreach( $google_fonts as $google_font ){
		if( isset($google_font['all-varients']) && trim($google_font['all-varients'])=='on' ){
			// Load all varient of the font
			$all_fonts[ $google_font['family'] ] = cymolthemes_get_all_varients($google_font['family']);
			
		} else {
			// Load only selected varient
			if( isset( $all_fonts[$google_font['family']] ) ){
				$curr_varients = $all_fonts[$google_font['family']];
				$curr_varients[] = ( !empty($google_font['variant']) ) ? $google_font['variant'] : '' ;
				$all_fonts[$google_font['family']] = $curr_varients;
			} else {
				$all_fonts[ $google_font['family'] ] = array( $google_font['variant'] );
			}
			
		}
		
	} // foreach
	
	// Removing repeated variations and replacing REGULAR word with 400 for Google Fonts
	foreach($all_fonts as $key =>$val){
		$val = array_unique($val);
		
		// Replace REGULAR word with 400 for Google Fonts
		$new_val = array();
		foreach( $val as $values ){
			if( $values=='regular' ){
				$values = '400';
			}
			$new_val[] = $values;
		}
		
		$all_fonts[$key] = $new_val;
	}
	
	// Prepare URL for Google Webfonts
	if( count($all_fonts)>0 ){
		$google_font_list = array();
		foreach( $all_fonts as $font_name=>$font_values ){
			$font_values = implode(',',$font_values);
			$google_font_list[] = $font_name.':'.$font_values;
		}
		$google_font_list = urlencode( implode('|',$google_font_list) );
		
		if( !is_admin() ){
			wp_enqueue_style( 'cymolthemes-cs-google-fonts', esc_url( '//fonts.googleapis.com/css?family='.$google_font_list ), array(), null );
		}
		
	}	
}
}

/**
 *  Get value of each cymolthemes_typography option
 */
if ( ! function_exists( 'cymolthemes_get_font_option_values' ) ) {
function cymolthemes_get_font_option_values($elements){
	$google_fonts   = array();
	if( is_array($elements) && count($elements)>0 ){
		global $duplexo_theme_options;
		foreach( $elements as $element ){
			$val = ( isset($duplexo_theme_options[$element]) ) ? $duplexo_theme_options[$element] : array() ;
			if( isset($val['font']) && $val['font']=='google' ){  // Load only Google fonts
				$google_fonts[] = $val;
			}
		}
	}
	return $google_fonts;
}
}