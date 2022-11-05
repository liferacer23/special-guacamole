<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}


// [cmt-sboxbtn type="fontawesome" size="small" bgcolor="grey" align="center" roundborder="yes"]
if( !function_exists('cymolthemes_sc_cta') ){
function cymolthemes_sc_cta( $atts, $content=NULL ) {
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		$inline_css = '';
		$icons_top = '';
		$icons_left = '';
		$icons_bottom = '';
		$icons_right = '';
		
		$actions_top = '';
		$actions_left   = '';
		$actions_bottom = '';
		$actions_right = '';
		
		$heading1       = '';
		$heading2       = '';
		
		$icons_beforeheading = '';
		$icons_afterheading  = '';
		
		$el_width = '';
		$seperator='';
		
		global $cmt_sc_params_cta;
		$options_list   = cymolthemes_create_options_list($cmt_sc_params_cta);
		$options_list['servicebox'] = '';
		
		extract( shortcode_atts( 
			$options_list
		, $atts ) );
		
		
		// main container class
		$containerClass   = array();
		$containerClass[] = 'cmt-sboxvc_cta3-container';
		
		
		// inner class
		$cssClass   = array();
		$cssClass[] = 'cmt-vc_general';
		$cssClass[] = 'cmt-sboxvc_cta3';
		
		// If Servicebox is not calling CTA than add this special class
		if( empty($servicebox_cssClass) ){
			$cssClass[] = 'cmt-sboxcta3-only';
		}
		
		// Service Box inner class
		$servicebox_cssClass   = array();
		$servicebox_cssClass[] = 'cmt-vc_general';
		$servicebox_cssClass[] = 'cmt-sboxvc_cta3';
		
		
		// style
		if( !empty($style) ){
			$cssClass[] = 'cmt-sboxvc_cta3-style-'.$style;
		}
		
		// shape
		if( !empty($shape) ){
			$cssClass[] = 'cmt-sboxvc_cta3-shape-'.$shape;
		}
		
		// align
		if( !empty($txt_align) ){
			$cssClass[]            = 'cmt-sboxvc_cta3-align-'.$txt_align;
			$servicebox_cssClass[] = 'cmt-sboxvc_cta3-align-'.$txt_align;
		}
		
		// Color
		if( !empty($color) ){
			$cssClass[] = 'cmt-sboxvc_cta3-color-'.$color;
		}
		
		// Icon Size
		if( !empty($i_size) ){
			$cssClass[]            = 'cmt-sboxvc_cta3-icon-size-'.$i_size;
			$servicebox_cssClass[] = 'cmt-sboxvc_cta3-icon-size-'.$i_size;
		}
		
		// Icon Position
		if( !empty($add_icon) ){
			$cssClass[]            = 'cmt-sboxvc_cta3-icons-'.$add_icon;
			$servicebox_cssClass[] = 'cmt-sboxvc_cta3-icons-'.$add_icon;
		}
		
		// Button Position
		if( !empty($add_button) ){
			$cssClass[]            = 'cmt-sboxvc_cta3-actions-'.$add_button;
			$servicebox_cssClass[] = 'cmt-sboxvc_cta3-actions-'.$add_button;
		}
		
		// icon on border
		if( !empty($i_on_border) && $i_on_border=='true' ){
			$cssClass[]            = 'cmt-sboxvc_cta3-icons-on-border';
			$servicebox_cssClass[] = 'cmt-sboxvc_cta3-icons-on-border';
		}
		
		// VC custom class
		if ( ! empty( $css ) ) {
			$cssClass[]            = cymolthemes_vc_shortcode_custom_css_class( $css );
			//$servicebox_cssClass[] = cymolthemes_vc_shortcode_custom_css_class( $css );
		}
		
		// CSS Animation
		if ( ! empty( $css_animation ) ) {
			$cssClass[] = cymolthemes_getCSSAnimation( $css_animation );
		}
		
		
		// Heading shortcode generate
		$heading_sc = '[cmt-custom-heading text="'. $h2 .'"';
		foreach( get_defined_vars() as $key=>$val ){
			if( substr($key, 0, 3)=='h2_' ){
				$key = substr($key, 3, 99);
				if( $key=='font_container' ){
					if( !empty($val) ){
						$val = 'tag:h2|'.$val;
					} else {
						$val = 'tag:h2';
					}
				}
				$heading_sc .= ' '. $key .'="'. $val .'"';
			}
		}
		$heading_sc .= ']';
		
		
		// Sub-heading shortcode generate
		$subheading_sc = '[cmt-custom-heading text="'. $h4 .'"';
		foreach( get_defined_vars() as $key=>$val ){
			if( substr($key, 0, 3)=='h4_' && !empty($val) ){
				$key = substr($key, 3, 99);
				if( $key=='font_container' ){
					if( !empty($val) ){
						
						if (strpos($val, 'tag:h2') !== false) { // if property already exists
							$val = str_replace( 'tag:h2', 'tag:h4', $val );
						} else {
							$val = 'tag:h4|'.$val;
						}
						
					} else {
						$val = 'tag:h4';
					}
				}
				$subheading_sc .= ' '. $key .'="'. $val .'"';
			}
		}
		$subheading_sc .= ']';
		
		
		
		
		
		// Heading
		$heading1 = (!empty($h2)) ? do_shortcode($heading_sc) : '' ;
		$heading2 = (!empty($h4)) ? do_shortcode($subheading_sc) : '' ;
		$full_heading = $heading1 . $heading2;
		
		
		// Reverse heading
		if( $reverse_heading == 'true' ){
			$full_heading = $heading2 . $heading1;
		}
		
		
		
		// icon
		$icon_sc = '[cmt-sboxicon';
		foreach( get_defined_vars() as $key=>$val ){
			if( substr($key, 0, 2)=='i_' && !empty($val) ){
				$key = substr($key, 2, 99);
				$icon_sc .= ' '. $key .'="'. $val .'"';
			}
		}
		$icon_sc .= ']';
		$icon = '<div class="cmt-sboxvc_cta3-icons cmt-section-wrapper-cell">'.do_shortcode($icon_sc).'</div>';
		
		if( !empty($icon) && !empty($add_icon) && $add_icon!='no' ){
			$icon_position_array = array( 'left', 'right', 'top', 'bottom', 'beforeheading', 'afterheading' );
			if( in_array( $add_icon, $icon_position_array ) ){
				${'icons_'.$add_icon} = $icon;
			}
		}
		
		
		
		
		
		// Button
		$btn_sc = '[cmt-sboxbtn';
		foreach( get_defined_vars() as $key=>$val ){
			if( substr($key, 0, 4)=='btn_' && !empty($val) ){
				$key = substr($key, 4, 99);
				$btn_sc .= ' '. $key .'="'. $val .'"';
			}
		}
		$btn_sc .= ']';
		$btn = do_shortcode($btn_sc);
		
		if( !empty($btn) && !empty($add_button) && $add_button!='no' ){
			$btn_position_array = array( 'left', 'right', 'top', 'bottom' );
			if( in_array( $add_button, $btn_position_array ) ){
				${'actions_'.$add_button} = $btn;
			}
		}
		
		
		// Extra Class
		if( !empty($el_class) ){
			$containerClass[] = $el_class;
		}
		
		// box width
		if( !empty($el_width) ){
			$containerClass[] = 'cmt-sboxvc_cta3-size-' . $el_width;
		}
		
		
		
		// The content
		$content = apply_filters('the_content', $content);
		$content = trim($content);
		
		// wrap with div if not empty
		$no_desc_class = 'cmt-sboxcta3-without-desc';
		if( !empty($content) ){
			if( substr($content,0,4)=='</p>' ){ $content = substr($content,4); } // removing closing p tag.. this is bug in Wordpress directly
			$no_desc_class = 'cmt-sboxcta3-with-desc';
			$content       = '<div class="cmt-sboxcta3-content-wrapper">' . $content . '</div>';
		}
		$cssClass[] = $no_desc_class;
		
		
		
		// converting array to string
		if( !empty($containerClass) ){
			$containerClass = implode( ' ', $containerClass );
		}
		if( !empty($cssClass) ){
			$cssClass = implode( ' ', $cssClass );
		}
		if( !empty($servicebox_cssClass) ){
			$servicebox_cssClass = implode( ' ', $servicebox_cssClass );
		}
		
		
		
		
		if( isset($servicebox) && $servicebox=='true' ){
			
			$custom_css_class = cymolthemes_vc_shortcode_custom_css_class( $css );
			if( !empty($custom_css_class) ){
				$containerClass = $containerClass . ' ' . $custom_css_class;
			}
			
			// Special design for service box only
		$return = '<section class="'. esc_attr( $containerClass ) .'"><div class="'. esc_attr( $servicebox_cssClass ) .'"'.$inline_css .'>'. $icons_top . $icons_left .'<div class="cmt-vc_cta3_content-container">'. $actions_top . $actions_left .'<div class="cmt-vc_cta3-content"><div class="cmt-vc_cta3-content-header cmt-section-wrapper">' . $icons_beforeheading . '<div class="cmt-sboxvc_cta3-headers cmt-section-wrapper-cell">'. $full_heading .'</div>' . $icons_afterheading . '</div></div><div class="cmt-sboxcta3-desc-btn-wrapper"><div class="cmt-sboxcta3-description">'. $content .'</div>'. $icons_bottom . $actions_bottom .'</div>'. $actions_right .'</div>'. $icons_right .'</div></section>';
			
			
		} else {
		
			// wrapping div to all buttons
			
			if( !empty($actions_top)    ){ $actions_top    = '<div class="cmt-sboxvc_cta3-actions">' . $actions_top . '</div>'; }
			if( !empty($actions_left)   ){ $actions_left   = '<div class="cmt-sboxvc_cta3-actions">' . $actions_left . '</div>'; }
			if( !empty($actions_bottom) ){ $actions_bottom = '<div class="cmt-sboxvc_cta3-actions">' . $actions_bottom . '</div>'; }
			if( !empty($actions_right)  ){ $actions_right  = '<div class="cmt-sboxvc_cta3-actions">' . $actions_right . '</div>'; }
			
			$heading_sep_class = ' cmt-sboxheading-with-separator';
			$heading_sep_div   = '<div class="heading-seperator"><span></span></div>';

			if( $seperator=='no' ){
				$heading_sep_class	= '';
				$heading_sep_div 	= '';
			}

			$return = '<section class="'. esc_attr( $containerClass ) .'"><div class="'. esc_attr( $cssClass ) .'"'.$inline_css .'>'. $icons_top . $icons_left .'<div class="cmt-vc_cta3_content-container">'. $actions_top . $actions_left .'<div class="cmt-vc_cta3-content"><header class="cmt-vc_cta3-content-header cmt-section-wrapper">' . $icons_beforeheading . '<div class="cmt-sboxvc_cta3-headers cmt-section-wrapper-cell">'. $full_heading .'</div>' . $icons_afterheading . $heading_sep_div .'</header>'. $content .'</div>'. $actions_bottom . $actions_right .'</div>'. $icons_bottom . $icons_right .'</div></section>';
		}
		
	
	
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	
	
	return $return;
	
	
}
}
add_shortcode( 'cmt-sboxcta', 'cymolthemes_sc_cta' );