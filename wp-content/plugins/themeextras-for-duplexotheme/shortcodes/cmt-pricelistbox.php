<?php
// [cmt-sboxpricelistbox]
if( !function_exists('cymolthemes_sc_pricelist') ){
function cymolthemes_sc_pricelist( $atts, $content=NULL ){
	
	global $cmt_vc_custom_element_pricelistbox;
	$options_list = cymolthemes_create_options_list($cmt_vc_custom_element_pricelistbox);
	
	extract( shortcode_atts(
		$options_list
	, $atts ) );
	
	
	$ctaShortcode = '[cmt-sboxheading ';
	foreach( $options_list as $key=>$val ){
		if( trim( ${$key} )!='' ){
			$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
		}
	}
	$ctaShortcode .= 'el_width="100%" css_animation=""][/cmt-sboxheading]';
	
	
	
	$return = do_shortcode($ctaShortcode);
	

	// pricelist lists
	$pricelist = json_decode(urldecode($pricelist));
	
	
	$return .= '<div class="cmt-pricelist-block-wrapper">';
	$return .= '<ul class="cmt-pricelist-block">';
		foreach( $pricelist as $data ){
			
			$service_name 	= '';
			$timing = '';
			
			//service_name 
			if( !empty($data->service_name) ){
				$servicename = ( isset($data->service_name) ) ? $data->service_name : '';
				$cmt_servicename= '<span>'.$servicename.'</span>';
			}
			
			//price
			if( !empty($data->price) ){
				$price = ( isset($data->price) ) ? $data->price : '';
				$prices= '<p class="service-price">'.$price.'</p>';
			}
			
			$return .= '<li>'.$cmt_servicename.$prices.'</li>';
			
		}
	$return .= '</ul> <!-- .cmt-pricelist-block -->';
	$return .= '</div><!-- .cmt-pricelist-block-wrapper -->  ';
	

	$wrapperStart = '<div class="cymolthemes-pricelistbox-wrapper '.$el_class.'">';
	$wrapperEnd   = '</div>';
	return $wrapperStart.$return.$wrapperEnd;
	
	
}
}
add_shortcode( 'cmt-sboxpricelistbox', 'cymolthemes_sc_pricelist' );