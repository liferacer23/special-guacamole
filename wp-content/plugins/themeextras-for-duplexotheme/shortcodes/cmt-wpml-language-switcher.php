<?php
// [cmt-sboxwpml-language-switcher]
if( !function_exists('cymolthemes_sc_wpml_language_switcher') ){
function cymolthemes_sc_wpml_language_switcher( $atts ) {
	$return = '';
	if( function_exists('icl_get_languages') ){
		ob_start();
		do_action('icl_language_selector');
		$langDropdown = ob_get_clean();
		$return .= '<div class="cmt-sboxwpml-lang-switcher">'.$langDropdown.'</div>';
	}
	return $return;
}
}
add_shortcode( 'cmt-sboxwpml-language-switcher', 'cymolthemes_sc_wpml_language_switcher' );