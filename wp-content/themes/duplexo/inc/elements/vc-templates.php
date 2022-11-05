<?php

/************************** Custom Template *****************************/
add_filter( 'vc_load_default_templates', 'cymolthemes_custom_template_for_vc' );
if( !function_exists('cymolthemes_custom_template_for_vc') ){
function cymolthemes_custom_template_for_vc($maindata) {
	
	$maindata = array();
	
	/* ***************** */

	// Our Team
    $data               = array();
    $data['name']       = esc_attr__( 'Our Team', 'duplexo' );
    $data['custom_class'] = 'duplexo_our_team';
    $data['content']    = <<<TMCONTENTTILLTHIS
[vc_row cmt_bgimagefixed="" cmt_responsive_css="65626540|colbreak_no|||||||||colbreak_no|||||55px||45px||colbreak_no||||||||||colbreak_no|||||||||"][vc_column][cmt-teambox h2="" show="8"][/cmt-teambox][/vc_column][/vc_row]
TMCONTENTTILLTHIS;
	$maindata[] = $data;
	

	/************* END of Visual Composer Template list ***************/

	// Return all VC templates
	return $maindata;

}
}
