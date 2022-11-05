<?php
// [cmt-current-year]
if( !function_exists('cymolthemes_sc_current_year') ){
function cymolthemes_sc_current_year( $atts, $content=NULL ){
	return date("Y");
}
}
add_shortcode( 'cmt-current-year', 'cymolthemes_sc_current_year' );