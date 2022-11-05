<?php
// [cmt-processbox]
if( !function_exists('cymolthemes_processbox') ){
function cymolthemes_processbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){ 
	
	global $cmt_vc_custom_element_processbox;
	$options_list = cymolthemes_create_options_list($cmt_vc_custom_element_processbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	

		// boximage size
			$boximg_size   = ( !empty($boximg_size) ) ? $boximg_size : 'full' ;
		
				

		// Heading element
		$return .= cymolthemes_vc_element_heading( get_defined_vars() );
	
		// Getting $args for WP_Query
		$args = cymolthemes_get_query_args( 'box_content', get_defined_vars() );

	
		if( !empty($box_content) ){
		
			$static_boxes = (array) vc_param_group_parse_atts( $box_content );

				
				$return .= '<div class="cymolthemes-boxes-row-wrapper cmt-processbox-wrapper">';
				$x = 1;
				foreach( $static_boxes as $cmt_box ){
					$staticbox_desc  = ( !empty($cmt_box['static_boxcontent']) ) ? '<div class="cmt-sboxbox-description">'.$cmt_box['static_boxcontent'].'</div>' : '' ;
					$image_box = '' ;
					$cmt_box['static_boximage']=( !empty($cmt_box['static_boximage']) ) ? $cmt_box['static_boximage'] : '';

					if( function_exists('wpb_getImageBySize') ){
							$image_box = wpb_getImageBySize( array(
								'attach_id'  => $cmt_box['static_boximage'],
								'thumb_size' => $boximg_size,
							) );
							$image_box = ( !empty($image_box['thumbnail']) ) ? $image_box['thumbnail'] : '' ;
						} else {
							$image_box = wp_get_attachment_image( $cmt_box['static_boximage'], 'full' );
					}
					
										
					$static_boxtitle      = ( !empty($cmt_box['static_boxtitle']) ) ? '<div class="cmt-sboxbox-title"><h5>'.$cmt_box['static_boxtitle'].'</h5></div>' : '' ;
				
		
					
					
						$return .= '
						<div class="cmt-processbox">
							<div class="cmt-sboxbox-image"> 
									<div class="cmt-sboxprocess-image">
									' . $image_box . '
									<div class="process-num"><span class="number">0' . $x . '</span></div>
									</div>								
							</div>
							<div class="cmt-sboxbox-content" >
								'.$static_boxtitle.'
								'.$staticbox_desc.'
							</div>
						</div>
						';
					$x++;
				} // end foreach
				$return .= '</div>';
				
			} // end if
			

		/* Restore original Post Data */
		wp_reset_postdata();
	
} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;	
	
}
}
add_shortcode( 'cmt-processbox', 'cymolthemes_processbox' );