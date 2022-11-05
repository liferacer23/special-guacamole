<?php
// [cmt-sboxcontactbox]
if( !function_exists('cymolthemes_sc_contactbox') ){
function cymolthemes_sc_contactbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_contactbox;
		$options_list = cymolthemes_create_options_list($cmt_sc_params_contactbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		$class = array( 'duplexo_contact_widget_wrapper', 'cymolthemes_vc_contact_wrapper' );
		
		
		// CSS Animation
		if ( !empty( $css_animation ) ) {
			$class[] = cymolthemes_getCSSAnimation( $css_animation );
		}
		
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = cymolthemes_vc_shortcode_custom_css_class( $css );
		}
		
		
		$class = implode(' ', $class );
		
		$return = '<ul class="' . $class . '">';
		if( trim($address)!='' ) {
			$return .= '<li class="cymolthemes-contact-address  cmt-duplexo-icon-location-pin">' . cymolthemes_wp_kses($address) . '</li>';
		}
		if( trim($phone)!='' ) {
			$return .= '<li class="cymolthemes-contact-phonenumber cmt-duplexo-icon-mobile">'.cymolthemes_wp_kses($phone).'</li>';
		}
		if( trim($email)!='' ) {
			$return .= '<li class="cymolthemes-contact-email cmt-duplexo-icon-comment-1"><a href="mailto:'.trim($email).'">'.trim($email).'</a></li>';
		}
		if( trim($website)!='' ) {
			$return .= '<li class="cymolthemes-contact-website cmt-duplexo-icon-world"><a href="'.esc_url(cymolthemes_addhttp($website)).'">'.esc_url($website).'</a></li>';
		}
		if( trim($time)!='' ) {
			$return .= '<li class="cymolthemes-contact-time cmt-duplexo-icon-clock">' . cymolthemes_wp_kses($time) . '</li>';
		}
		$return .= '</ul>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'cmt-sboxcontactbox', 'cymolthemes_sc_contactbox' );