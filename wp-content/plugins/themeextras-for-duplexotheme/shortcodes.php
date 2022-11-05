<?php


/*
 * Shortcode list and their calls - Depends on Visual Composer
 */
$shortcodeList = array(
	'cmt-blogbox',
	'cmt-btn',
	'cmt-cta',
	'cmt-clientsbox',
	'cmt-contactbox',
	'cmt-custom-heading',
	'cmt-heading',
	'cmt-facts-in-digits',
	'cmt-heading',
	'cmt-icon',
	'cmt-icontext',
	'cmt-wpml-language-switcher',
	'cmt-icon-separator',
	'cmt-portfoliobox',
	'cmt-servicesbox',
	'cmt-eventsbox',
	'cmt-servicebox',
	'cmt-list',
	'cmt-teambox',
	'cmt-testimonialbox',
	'cmt-twitterbox',
	'cmt-socialbox',
	'cmt-progress-bar',
	'cmt-team-details-single',	
	'cmt-current-year',
	'cmt-social-links',
	'cmt-site-tagline',
	'cmt-site-title',
	'cmt-site-url',
	'cmt-footermenu',
	'cmt-topbar-left-menu',
	'cmt-topbar-right-menu',
	'cmt-logo',
	'cmt-dropcap',
	'cmt-skincolor',
	'cmt-pricelistbox',
	'cmt-servicebox',
	'cmt-processbox',
	'cmt-single-image',
	'cmt-static-contentbox',
	'cmt-pricing-table',
);
//if( function_exists('vc_map') && class_exists('WPBMap') ){
	foreach( $shortcodeList as $shortcode ){
		if( file_exists(get_template_directory() . '/inc/shortcodes/'.$shortcode.'.php') ){
			include_once( get_template_directory() . '/inc/shortcodes/'.$shortcode.'.php');
		} else {
			require_once CMTTE_DIR . 'shortcodes/'.$shortcode.'.php';
		}
	}
//}