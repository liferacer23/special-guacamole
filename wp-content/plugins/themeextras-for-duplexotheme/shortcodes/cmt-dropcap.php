<?php
// [cmt-sboxdropcap]D[/cmt-sboxdropcap]
// [cmt-sboxdropcap style="square"]A[/cmt-sboxdropcap]
// [cmt-sboxdropcap style="rounded"]B[/cmt-sboxdropcap]
// [cmt-sboxdropcap style="round"]C[/cmt-sboxdropcap]
// [cmt-sboxdropcap color="skincolor"]A[/cmt-sboxdropcap]
// [cmt-sboxdropcap color="grey"]B[/cmt-sboxdropcap]
// [cmt-sboxdropcap color="dark"]B[/cmt-sboxdropcap]
// [cmt-sboxdropcap bgcolor="skincolor"]A[/cmt-sboxdropcap]
// [cmt-sboxdropcap bgcolor="grey"]B[/cmt-sboxdropcap]
// [cmt-sboxdropcap bgcolor="dark"]B[/cmt-sboxdropcap]
if( !function_exists('cymolthemes_sc_dropcap') ){
function cymolthemes_sc_dropcap( $atts, $content=NULL ){
	extract( shortcode_atts( array(
		'style'   => '',
		'color'   => 'skincolor',
		'bgcolor' => '',
	), $atts ) );
	
	if( empty($color) ){
		$color = 'skincolor';
	}
	
	$class = array();
	$class[] = 'cmt-sboxdropcap';
	$class[] = 'cmt-sboxdcap-style-' . $style;
	$class[] = 'cmt-sboxdcap-txt-color-' . $color;
	$class[] = 'cmt-sbox' . $color;
	$class[] = 'cmt-bgcolor-' . $bgcolor;
	
	$class = implode( ' ', $class );
	
	return '<span class="' . cymolthemes_sanitize_html_classes($class) . '">' . esc_attr($content) . '</span>';
}
}
add_shortcode( 'cmt-sboxdropcap', 'cymolthemes_sc_dropcap' );