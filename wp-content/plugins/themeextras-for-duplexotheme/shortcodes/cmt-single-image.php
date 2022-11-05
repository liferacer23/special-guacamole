<?php
// [cmt-sboxsingle-image]
if( !function_exists('cymolthemes_sc_single_image') ){
function cymolthemes_sc_single_image( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
	global $cymolthemes_sc_params_single_image;
	$options_list = cymolthemes_create_options_list($cymolthemes_sc_params_single_image);
		
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
		
		// boximage size
		$boximg_size = explode('|', $image );
		
		$full_img  = ( isset($boximg_size[0]) ) ? $boximg_size[0] : '' ;
		$thumb_img = ( isset($boximg_size[1]) ) ? $boximg_size[1] : '' ;
		$img_id    = ( isset($boximg_size[2]) ) ? $boximg_size[2] : '' ;

		$alignment = (!empty($alignment)) ? $alignment : 'left' ;
		
		// boxstyle
		$cmt_img_boxstyle   = ( !empty($cmt_img_boxstyle) ) ? $cmt_img_boxstyle : '' ;
		
		$return .= '<div class="cmt-sboxsingle-image-wrapper '. $cmt_img_boxstyle .' wpb_single_image vc_align_' . esc_attr($alignment) . ' ' . esc_attr($el_class) . '">';

		if( !empty($full_img) ){
			$return .= '<div class="cmt-sboxsingle-image-inner"><img src="' . $full_img . '" class="cmt-sboxsingle-image-img" alt="" /></div>';
		}
		$return .= '</div>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;
	
}
}
add_shortcode( 'cmt-sboxsingle-image', 'cymolthemes_sc_single_image' );