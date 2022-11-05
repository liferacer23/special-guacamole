<?php
// [cmt-sboxicontext icon="phone"]Welcome to site[/icontext]
if( !function_exists('cymolthemes_sc_icontext') ){
function cymolthemes_sc_icontext( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'icon'    => '',   // Required
		'package' => 'fa', // Optional
	), $atts ) );
	
	$return = '<span class="cymolthemes-icontext"><i class="fa fa-'.$package.'-'.$icon.'"></i> '.do_shortcode($content).'</span>';
	return $return;
}
}
add_shortcode( 'cmt-sboxicontext', 'cymolthemes_sc_icontext' );
