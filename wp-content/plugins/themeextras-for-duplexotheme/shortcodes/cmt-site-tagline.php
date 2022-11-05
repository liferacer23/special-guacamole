<?php
// [cmt-site-tagline]
if( !function_exists('cymolthemes_sc_site_tagline') ){
function cymolthemes_sc_site_tagline( $atts, $content=NULL ){
	return get_bloginfo('description');
}
}
add_shortcode( 'cmt-site-tagline', 'cymolthemes_sc_site_tagline' );