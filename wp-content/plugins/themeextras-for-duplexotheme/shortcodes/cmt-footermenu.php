<?php
// [cmt-footermenu]
if( !function_exists('cymolthemes_sc_footermenu') ){
function cymolthemes_sc_footermenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('cymolthemes-footer-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'cymolthemes-footer-menu', 'menu_class' => 'footer-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'cmt-footermenu', 'cymolthemes_sc_footermenu' );