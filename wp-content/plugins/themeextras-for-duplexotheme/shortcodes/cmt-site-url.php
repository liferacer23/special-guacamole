<?php
// [cmt-site-url]
if( !function_exists('cymolthemes_sc_site_url') ){
function cymolthemes_sc_site_url( $atts, $content=NULL ){
	return site_url();
}
}
add_shortcode( 'cmt-site-url', 'cymolthemes_sc_site_url' );