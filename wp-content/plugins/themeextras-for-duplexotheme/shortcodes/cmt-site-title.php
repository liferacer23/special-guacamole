<?php
// [cmt-site-title]
if( !function_exists('cymolthemes_sc_site_title') ){
function cymolthemes_sc_site_title( $atts, $content=NULL ){
	return get_bloginfo('name');
}
}
add_shortcode( 'cmt-site-title', 'cymolthemes_sc_site_title' );