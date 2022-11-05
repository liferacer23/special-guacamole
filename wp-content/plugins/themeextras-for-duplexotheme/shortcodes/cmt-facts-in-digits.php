<?php
// [cmt-sboxfacts-in-digits]
if( !function_exists('cymolthemes_sc_facts_in_digits') ){
function cymolthemes_sc_facts_in_digits($atts, $content=NULL ) {
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_facts_in_digits;
		$options_list = cymolthemes_create_options_list($cmt_sc_params_facts_in_digits);
		
		// This global variable will be used in template file for design
		global $cmt_global_fid_element_values;
		$cmt_global_fid_element_values = array();
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// Required JS files
		wp_enqueue_script( 'waypoints', array( 'jquery' ) );
		wp_enqueue_script( 'numinate',  array( 'jquery' ) );
				
		
		
		//  Before or after text
		
		$before_text = '';
		$after_text  = '';
		
		if( trim($before)!='' ){
			if( $beforetextstyle=='sup' || $beforetextstyle=='sub' || $beforetextstyle=='span' ){
				$before_text = '<'.$beforetextstyle.'>'.trim($before).'</'.$beforetextstyle.'>';
			}
		}
		
		if( trim($after)!='' ){
			if( $aftertextstyle=='sup' || $aftertextstyle=='sub' || $aftertextstyle=='span' ){
				$after_text = '<'.$aftertextstyle.'>'.trim($after).'</'.$aftertextstyle.'>';
			}
		}
		
		
		// Icon
		$lefticoncode  = '';
		$righticoncode = '';
		$class         = array();
		$class_icon         = 'cmt-fid-without-icon';
		if( $add_icon=='true' ){
			$class_icon = 'cmt-fid-with-icon';
			
			if( !isset($i_icon_linecons) ){
				$i_icon_linecons = '';
			}
			if( !isset($i_icon_themify) ){
				$i_icon_themify = '';
			}
			
			
			// We are calling this to add CSS file of the selected icon.
			do_shortcode('[cmt-sboxicon type="'.$i_type.'" icon_fontawesome="'.$i_icon_fontawesome.'" icon_linecons="'.$i_icon_linecons.'" icon_themify="'.$i_icon_themify.'" color="skincolor" align="left"]');
			
			// This is real icon code
			$icon_class   = ( !empty( ${'i_icon_'.$i_type} ) ) ? ${'i_icon_'.$i_type} : '' ;
			$lefticoncode = '<div class="cmt-fid-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
			
		}  // if( $add_icon=='true' )
		
		// icon exists class
		$class[] = $class_icon;
		

		if( !empty($view) ){
			$class[] = 'cmt-fid-view-'.$view;
		}
		
		if ( !empty( $css_animation ) ) {
			$class[] = cymolthemes_getCSSAnimation( $css_animation );
		}
		
		// with border?
		if( !empty($add_border) ) {
			$class[] = 'cmt-fid-with-border'; 
		} else {
			$class[] = 'cmt-fid-no-border' ;
		}
		
		// Extra Class
		if( !empty($el_class) ){
			$class[] = $el_class;
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$class[] = cymolthemes_vc_shortcode_custom_css_class( $css );
		}
		
		// storing in global varibales to be used in template file
		$cmt_global_fid_element_values['title']         = $title;
		$cmt_global_fid_element_values['main-class']    = implode(' ', $class);
		$cmt_global_fid_element_values['lefticoncode']  = $lefticoncode;
		$cmt_global_fid_element_values['righticoncode'] = $righticoncode;
		$cmt_global_fid_element_values['before_text']   = $before_text;
		$cmt_global_fid_element_values['after_text']    = $after_text;
		$cmt_global_fid_element_values['digit']         = $digit;
		$cmt_global_fid_element_values['interval']      = $interval;
		$cmt_global_fid_element_values['view']          = $view;
		
		$cmt_global_fid_element_values['before']          = $before;
		$cmt_global_fid_element_values['beforetextstyle'] = $beforetextstyle;
		$cmt_global_fid_element_values['after']           = $after;
		$cmt_global_fid_element_values['aftertextstyle']  = $aftertextstyle;
		
		
		// calling template depending on the selected VIEW option
		ob_start();
		get_template_part('template-parts/fidbox/fidbox', $view);
		$return = ob_get_contents();
		ob_end_clean();
	
	
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'cmt-sboxfacts-in-digits', 'cymolthemes_sc_facts_in_digits' );