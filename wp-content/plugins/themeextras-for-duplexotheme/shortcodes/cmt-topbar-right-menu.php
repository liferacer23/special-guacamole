<?php
// [cmt-sboxtopbar-right-menu]
if( !function_exists('cymolthemes_sc_topbarrightmenu') ){
function cymolthemes_sc_topbarrightmenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('cymolthemes-topbar-right-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'cymolthemes-topbar-right-menu', 'menu_class' => 'topbar-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'cmt-sboxtopbar-right-menu', 'cymolthemes_sc_topbarrightmenu' );