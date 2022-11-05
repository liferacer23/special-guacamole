<?php
// [cmt-sboxprocessbar]
if( !function_exists('cymolthemes_sc_processbar') ){
function cymolthemes_sc_processbar( $atts, $content=NULL ){
	
	$return = '';
	$hover_img = '';
		
		global $cmt_vc_custom_element_processbarbox;
		$options_list = cymolthemes_create_options_list($cmt_vc_custom_element_processbarbox);
		
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		

		$class   = array();
		$class[] = 'cmt-sboxelements-bgcolor-' . $box_bgcolor;
		$class[] = 'cmt-sbox' . $box_textcolor;
		$class = implode( ' ', $class );
		
		$return .= '<div class="cmt-sboxprocessbar-block-wrapper">';
		
		$total = 4;
		for( $i=1; $i <= $total ; $i++ ){
			
			if( trim(trim(${'label'.$i}))!='' ){				
				$label = rawurldecode(trim(${'label'.$i}));
				if( trim($label) != '' ){
					$prcess_labels= '<span>' . $label . '</span>';
				}				
			
				if( trim(trim(${'boximage'.$i}))!='' ){				
					$image = rawurldecode(trim(${'boximage'.$i}));
					$boximage = ( isset($image) ) ? wp_get_attachment_image( $image, 'thumb' ) : '';
					if( trim($boximage) != '' ){
						$hover_img= '<div class="process-img">' . $boximage . '</div>';
					}				
				}
				if( trim(trim(${'boximage'.$i}))=='' ){ $hover_img='';}
				
				$return .= '<div class="cmt-sboxprocess-content ' . cymolthemes_sanitize_html_classes($class) . '">'.$prcess_labels.$hover_img.'</div>';
			}
		}
		
		
		$return .= '</div>';
		$wrapperStart = '<div class="cymolthemes-processbar-wrapper-main"><div class="cymolthemes-processbar-wrapper '.$el_class.'">';
		$wrapperEnd   = '</div></div>';
		return $wrapperStart.$return.$wrapperEnd;
		
}
}
add_shortcode( 'cmt-sboxprocessbar', 'cymolthemes_sc_processbar' );