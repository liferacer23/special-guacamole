<?php
// [cmt-sboxstatic-contentbox]
if( !function_exists('cymolthemes_sc_static_contentbox') ){
function cymolthemes_sc_static_contentbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){ 
	
	global $cmt_vc_custom_element_staticcontent_box;
	$options_list = cymolthemes_create_options_list($cmt_vc_custom_element_staticcontent_box);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	

		// boximage size
			$boximg_size   = ( !empty($boximg_size) ) ? $boximg_size : 'full' ;
		
				
		// Starting wrapper of the whole arear
		$return .= cymolthemes_box_wrapper( 'start', 'contentbox', get_defined_vars() );
		
		// Heading element
		$return .= cymolthemes_vc_element_heading( get_defined_vars() );
	
		// Getting $args for WP_Query
		$args = cymolthemes_get_query_args( 'contentbox', get_defined_vars() );
	
		if( !empty($box_content) ){
		
			$static_boxes = (array) vc_param_group_parse_atts( $box_content );

				
				$return .= '<div class="row multi-columns-row cymolthemes-boxes-row-wrapper">';
				foreach( $static_boxes as $cmt_box ){
					$staticbox_desc  = ( !empty($cmt_box['static_boxcontent']) ) ? '<div class="cmt-sboxplan-price"><span class="cmt-sboxprice">'.$cmt_box['static_boxcontent'].'</span></div>' : '' ;
					$image_box = '' ;
					$cmt_box['static_boximage']=( !empty($cmt_box['static_boximage']) ) ? $cmt_box['static_boximage'] : '';
					$cmt_box['static_boxlink']=( !empty($cmt_box['static_boxlink']) ) ? $cmt_box['static_boxlink'] : '';
					
					// Builing URL array
					$url =  cymolthemes_vc_build_link($cmt_box['static_boxlink']);
						
		
					if( function_exists('wpb_getImageBySize') ){
							$image_box = wpb_getImageBySize( array(
								'attach_id'  => $cmt_box['static_boximage'],
								'thumb_size' => $boximg_size,
							) );
							$image_box = ( !empty($image_box['thumbnail']) ) ? $image_box['thumbnail'] : '' ;
						} else {
							$image_box = wp_get_attachment_image( $cmt_box['static_boximage'], 'full' );
					}
					
										
					$static_boxtitle      = ( !empty($cmt_box['static_boxtitle']) ) ? '<h4>'.$cmt_box['static_boxtitle'].'</h4>' : '' ;
				

					$return .= cymolthemes_column_div('start', $column );
						$return .= '
						<div class="cmt-sboxstatic-box-wrapper cmt-sboxfeature-plans">
							<div class="cmt-sboxfeatureplan-image"> 
								<div class="wpb_single_image wpb_content_element vc_align_left">
									<figure class="wpb_wrapper vc_figure">
									' . $image_box . '
									</figure>
									'.$staticbox_desc.'
								</div>
							</div>
							<div class="cmt-sboxstatic-box-content" >
								'.$static_boxtitle.'								
							</div>
						</div>
						';
					$return .= cymolthemes_column_div('end', $column );
				} // end foreach
				$return .= '</div>';
				
			} // end if
			
		$return .= cymolthemes_box_wrapper( 'end', 'static', get_defined_vars() );
		
		/* Restore original Post Data */
		wp_reset_postdata();
	
} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}

	return $return;	
	
}
}
add_shortcode( 'cmt-sboxstatic-contentbox', 'cymolthemes_sc_static_contentbox' );