<?php
// [cmt-servicebox]
if( !function_exists('cymolthemes_sc_servicebox') ){
function cymolthemes_sc_servicebox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_servicebox;
		$options_list = cymolthemes_create_options_list($cmt_sc_params_servicebox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// We are passing this var to TM-CTA shortcode directly and removing from this Servicebox shortcode as we need custom CSS to be applied directly to cmt-sboxcta shortcode
		$css_copy = '';
		
		
		
		$return = $class = $iconcodeleft = $iconcoderight = '';
			
		
		// Icon Position changes
		$add_icon_new = $add_icon;
		$add_icon = 'top'; // by default, icon will be at top
		if( $add_icon_new=='bottom-center' ){
			$add_icon = 'bottom';
		}
		if( $add_icon_new=='left-spacing' ){
			$add_icon = 'left';
		}
		if( $add_icon_new=='right-spacing' ){
			$add_icon = 'right';
		}
		if( $add_icon_new=='before-heading' ){
			$add_icon = 'beforeheading';
		}
		if( $add_icon_new=='after-heading' ){
			$add_icon = 'afterheading';
		}
		if( $add_icon_new=='without-icon' ){
			$add_icon = 'withouticon';
		}	
		
		
		
		
		
		// Service Box class structure
		$cmt_sbox_class = array();
		$cmt_sbox_class[] = 'cmt-sbox';
		$cmt_sbox_class[] = 'cmt-sbox-iconalign-'.$add_icon_new;
		$cmt_sbox_class[] = 'cmt-sbox-bgcolor-' . $bgcolor . ' cmt-bgcolor-' . $bgcolor;  // BG Color
		$cmt_sbox_class[] = 'cmt-sbox-textcolor-' . $textcolor . ' cmt-textcolor-' . $textcolor;  // Text Color
		
		// icon size
		if( !empty($i_size) ){
			$cmt_sbox_class[] = 	'cmt-sbox-isize-' . $i_size;  // Icon size
		}
		
		// icon size
		if( !empty($i_size) ){
			$cmt_sbox_class[] = 	'cmt-sbox-isize-' . $i_size;  // Icon size
		}
		
		// icon background style
		if( !empty($i_background_style) ){
			$cmt_sbox_class[] = 'cmt-sbox-istyle-'.$i_background_style;
		}
		
		// Custom div and classes for overlay color if bgimage is set from design options tab
		$cmt_smbox_custom_div = '';
		$cmt_bgimage			 = false;
		$cssclass 			 = cymolthemes_vc_shortcode_custom_css_class($css);
		$cmt_sbox_class[] 	 = $cssclass;
		
		// box effect
		if( !empty($box_effect) ){
			$cmt_sbox_class[] = 'cmt-sbox-effect-'.$box_effect;
		}
		
		// Check if bg image is set
		if( strpos($css, 'url(') !== false ){
			$cmt_bgimage		 = true;
			$cmt_sbox_class[] = 'cmt-bg';
			$cmt_sbox_class[] = 'cmt-bgimage-yes';
			$cmt_smbox_custom_div .= '<div class="cmt-sbox-bgimage-layer cmt-bgimage-layer"></div>';	
		}
		
		// Check if BG color set
		if( cymolthemes_check_if_bg_color_in_css($css)==true || ( !empty($bgcolor) && $bgcolor!='transparent' ) ){
			$cmt_sbox_class[] = 'cmt-bgcolor-yes';
		}	
		
		if( $cmt_bgimage == true ){
			$cmt_smbox_custom_div .= '<div class="cmt-sbox-wrapper-bg-layer cmt-bg-layer"></div>';	
		}
		
		$cmt_bignumber_div = '';
		if(!empty($big_number_besidetext) && $add_icon_new == 'left-spacing-style2') {
			$cmt_bignumber_div .= '<div class="cmt-sbox-bignumber">' . $big_number_besidetext . '</div>';	
		}		
		
		
		if( !empty($h2) && empty($h4) ){
			$cmt_sbox_class[] = 'cmt-sbox-heading-only';
		} else if( empty($h2) && !empty($h4) ){
			$cmt_sbox_class[] = 'cmt-sbox-subheading-only';
		} else if( !empty($h2) && !empty($h4) ){
			$cmt_sbox_class[] = 'cmt-sbox-both-headings';
		}
		
		// Custom Class
		if ( ! empty( $el_class ) ) {
			$cmt_sbox_class[] = trim($el_class);
		}
		
		// CSS Animation
		if ( ! empty( $css_animation ) ) {
			$cmt_sbox_class[] = cymolthemes_getCSSAnimation( $css_animation );
		}
		
		
		// Button align same as text align
		$options_list['btn_align'] = $add_icon_new;
		
		
		
		// Generating CTA shortcode
		$ctaShortcode = '[cmt-sboxcta servicebox="true" ';
		
		if( !isset($options_list['add_button']) || empty($options_list['add_button']) ){
			$ctaShortcode .= 'add_button="no" ';
		}
		
		foreach( $options_list as $key=>$val ){
			if( isset(${$key}) && trim( ${$key} )!='' && $key!='i_on_border' && $key!='el_class' && $key!='css' ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		if( !empty($cmt_i_on_border) ){
			$ctaShortcode .= $cmt_i_on_border;  // icon on border
		}
		$ctaShortcode .= ' i_css_animation="" css="'.$css_copy.'" css_animation=""]'.$content.'[/cmt-sboxcta]';
		
		$return = do_shortcode($ctaShortcode);
		
		
		// Wrapping custom class to slyle
		$return = '<div class="' . cymolthemes_sanitize_html_classes( implode(' ',$cmt_sbox_class) ) . '">'. $cmt_smbox_custom_div . $cmt_bignumber_div . $return .'</div>';
		
		/* Added by CymolThemes - code start */
		$customStyle = '';
		if(trim($css)!= ''){

			
			/******************************************/
			// Inline css
			global $cymolthemes_inline_css;
			if( empty($cymolthemes_inline_css) ){
				$cymolthemes_inline_css = '';
			}
			// Remove BG image from main DIV
			// BG color layer
			$cymolthemes_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .cmt-bg-layer{' . cymolthemes_bg_only_from_css($css) . 'background-image: none !important;}';
			// BG image DIV for bg-hover effect
			$cymolthemes_inline_css .= '.' . vc_shortcode_custom_css_class( $css, '' ) . ' .cmt-bgimage-layer{' . cymolthemes_bg_only_from_css($css) . '}';
			// Removing padding and margin from cmt-sbox div
			$cymolthemes_inline_css .= '.wpb_wrapper > .' . vc_shortcode_custom_css_class( $css, '' ) . '{padding:0 !important; margin:0 !important; border:none !important;}';

			
			
			// Applying custom CSS to inner layer too
			$new_bgimage_element2 = vc_shortcode_custom_css_class( $css, '' ). ' > .cmt-sboxvc_cta3-container';
			$newCSS2   			  = str_replace( vc_shortcode_custom_css_class( $css, '' ), $new_bgimage_element2, $css );
			$cymolthemes_inline_css    .= str_replace( '}', 'background-image:none !important;}', $newCSS2 );
			/******************************************/
			
			
			
		}
		/* Added by CymolThemes - code end */
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	
	return $return;
}
}
add_shortcode( 'cmt-servicebox', 'cymolthemes_sc_servicebox' );



if( !function_exists('cymolthemes_bg_only_from_css') ){
function cymolthemes_bg_only_from_css( $css ){
	// Check if '{' charactor exists
	if( strpos($css,'{' )!=false ){
		$css = substr($css, strpos($css,'{' )+1 ); // returns "d"
		$css = str_replace('}','', $css );
		$new_css_array = explode(';',$css);
		$bgonly_css = '';
		foreach( $new_css_array as $css_line ){
			if( substr($css_line,0,10)=='background' ){
				$bgonly_css .= $css_line.';';
			}
		}
	}
	return $bgonly_css;
}
}



if( !function_exists('cymolthemes_check_if_bg_color_in_css') ){
function cymolthemes_check_if_bg_color_in_css( $css ){
	$return = false;
	
	// Check if '{' charactor exists
	if( strpos($css,'{' )!=false ){
		$css = substr($css, strpos($css,'{' )+1 ); // returns "d"
		$css = str_replace('}','', $css );
		$new_css_array = explode(';',$css);
		foreach( $new_css_array as $css_line ){
			if( substr($css_line,0,11)=='background:' ){
				$css_line = explode(' ',$css_line);
				foreach($css_line as $line){
					if( substr($line,0,5)=='rgba(' || substr($line,0,5)=='#' ){
						$return = true;
					}
				}
			}
		}
	}
	
	return $return;
}
}