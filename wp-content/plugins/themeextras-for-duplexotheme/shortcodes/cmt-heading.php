<?php
// [cmt-sboxheading tag="h1" text="This is heading text"]
if( !function_exists('cymolthemes_sc_heading') ){
function cymolthemes_sc_heading( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_heading;
		$options_list = cymolthemes_create_options_list($cmt_sc_params_heading);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		// Getting a unique class name applied by the Custom CSS box (via "css_editor") and also custom class name via "el_class".
		$css_class = '';
		if( !empty($css) ){
			$css_class = vc_shortcode_custom_css_class( $css, ' ' );
		}
		
		
		// CSS Animation
		if( ! empty( $css_animation ) ) {
			$css_class .= ' ' . cymolthemes_getCSSAnimation( $css_animation );
		}
		
		
		// Custom Class
		if( ! empty( $el_class ) ) {
			$css_class .= ' ' . esc_attr($el_class);
		}
				
		
		$ctaShortcode = '[cmt-sboxcta';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!=''  ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= ' add_button="no" i_css_animation="" css="" css_animation=""]'.$content.'[/cmt-sboxcta]';

		
		if( !empty($h2)!='' ) {
			
			$cta = do_shortcode($ctaShortcode);
		
			// Changing header order if reverser order
			
			
			$return .= '<div class="cmt-element-heading-wrapper cmt-sboxheading-inner cmt-sboxelement-align-'.$txt_align.' cmt-seperator-'.$seperator.' cmt-sboxheading-style-'.$heading_style.' '.$css_class.'">';
			$return .= $cta;
			$return .= '</div> <!-- .cmt-element-heading-wrapper container --> ';
			
			
			
			/******************************************/
			// Inline css
			global $cymolthemes_inline_css;
			if( empty($cymolthemes_inline_css) ){
				$cymolthemes_inline_css = '';
			}
			if( !empty($css) ){
				$cymolthemes_inline_css .= $css; // Custom CSS style like padding, margin etc.
			}
			
			/******************************************/
			
		}
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	
	return $return;
}
}
add_shortcode( 'cmt-sboxheading', 'cymolthemes_sc_heading' );