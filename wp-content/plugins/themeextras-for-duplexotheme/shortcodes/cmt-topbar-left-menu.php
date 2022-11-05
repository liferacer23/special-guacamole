<?php
// [cmt-sboxtopbar-left-menu]
if( !function_exists('cymolthemes_sc_topbarleftmenu') ){
function cymolthemes_sc_topbarleftmenu( $atts, $content=NULL ){
	$return = '';
	if( has_nav_menu('cymolthemes-topbar-left-menu') ){
		$return .= wp_nav_menu( array( 'theme_location' => 'cymolthemes-topbar-left-menu', 'menu_class' => 'topbar-nav-menu', 'container' => false, 'echo' => false ) );
	}
	return $return;
}
}
add_shortcode( 'cmt-sboxtopbar-left-menu', 'cymolthemes_sc_topbarleftmenu' );