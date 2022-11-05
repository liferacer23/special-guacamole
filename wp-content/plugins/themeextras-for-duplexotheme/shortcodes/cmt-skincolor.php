<?php
// [cmt-skincolor]This text will be in skin color[/cmt-skincolor]
if( !function_exists('cymolthemes_sc_skincolor') ){
function cymolthemes_sc_skincolor( $atts, $content=NULL ) {
	return '<span class="cymolthemes-skincolor cmt-skincolor">'.$content.'</span>';
}
}
add_shortcode( 'cmt-skincolor', 'cymolthemes_sc_skincolor' );