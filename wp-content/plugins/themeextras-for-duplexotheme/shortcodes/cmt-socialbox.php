<?php
// [cmt-sboxsocialbox]
if( !function_exists('cymolthemes_sc_social_box') ){
function cymolthemes_sc_social_box( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_socialbox;
		$options_list = cymolthemes_create_options_list($cmt_sc_params_socialbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		
		// Class list
		$class = array();
		$class[] = 'cymolthemes-socialbox-wrapper';
		$class[] = 'cmt-sboxsocialbox-icon-size-' . $iconsize;
		$class[] = 'cmt-sboxsocialbox-column-'.$column;
		
		
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
		
		// Extra class name
		$extraClass = '';
		
		$columnclass = 'col-md-3 col-lg-3 col-xs-12';
		switch($column){
			case 'one':
				$columnclass = 'col-md-12 col-lg-12 col-xs-12';
				break;
				
			case 'two':
				$columnclass = 'col-md-6 col-lg-6 col-xs-12';
				break;
			
			case 'three':
				$columnclass = 'col-md-4 col-lg-4 col-xs-12';
				break;
				
			case 'four':
				$columnclass = 'col-md-3 col-lg-3 col-xs-12';
				break;
			
			case 'five':
				$columnclass = 'col-md-20percent col-lg-20percent col-xs-12';
				break;
			
			case 'six':
				$columnclass = 'col-md-4 col-lg-2 col-xs-12';
				break;
		}
		
		
		// prearing shortcode
		$ctaShortcode = '[cmt-sboxheading ';
		foreach( $options_list as $key=>$val ){
			if( trim( ${$key} )!='' && $key!='el_class' && $key!='css' ){
				$ctaShortcode .= ' '.$key.'="'.${$key}.'" ';
			}
		}
		$ctaShortcode .= 'el_width="100%" css_animation=""][/cmt-sboxheading]';
		
		
		// calling CTA shortcode
		$return = '';
		$return = do_shortcode($ctaShortcode);
		
		
		// Add/remove separator line below main heading text
		$heading_sep_class = ' cmt-sboxheading-with-separator';
		if( !empty($heading_sep) && $heading_sep=='no' ){
			$heading_sep_class = '';
		}
		$class[] = $heading_sep_class;
		
		
		
		// Social list
		$sociallist = array(
			'twitter'      => 'Twitter',
			'youtube'      => 'YouTube',
			'flickr'       => 'Flickr',
			'facebook'     => 'Facebook',
			'linkedin'     => 'LinkedIn',
			'gplus'        => 'Google+',
			'yelp'         => 'Yelp',
			'dribbble'     => 'Dribbble',
			'pinterest'    => 'Pinterest',
			'podcast'      => 'Podcast',
			'instagram'    => 'Instagram',
			'xing'         => 'Xing',
			'vimeo'        => 'Vimeo',
			'vk'           => 'VK',
			'houzz'        => 'Houzz',
			'issuu'        => 'Issuu',
			'google-drive' => 'Google Drive',
			'rss'          => 'RSS Feed',
		);
		
		
		
		
		// social service list
		$socialdata = json_decode(urldecode($socialservices));
		
		// CSS Animation
		if ( !empty( $css_animation ) ) {
			$class[] = cymolthemes_getCSSAnimation( $css_animation );
		}
		
		$return .= '<div class="cmt-sboxsocialbox-links-wrapper row multi-columns-row">';
		
		if( is_array($socialdata) && count($socialdata)>0 ){
			foreach( $socialdata as $data ){
				if( !empty($data->servicename) ){
					
					// Social link
					if( $data->servicename=='rss' ){
						$servicelink = get_bloginfo('rss2_url');
					} else {
						$servicelink = ( isset($data->servicelink) && trim($data->servicelink)!='' ) ? $data->servicelink : '#' ;
					}
					
					// Preparing icon
					$servicename = ( isset($sociallist[$data->servicename]) ) ? $sociallist[$data->servicename] : $data->servicename ;
					$return .= '<div class="cmt-sboxsocialbox-i-wrapper '.$columnclass.'">';
					$return .= '<a class="cmt-sboxsocialbox-icon-link cmt-sboxsocialbox-icon-link-'.$data->servicename.'" target="_blank" href="'.$servicelink.'" data-tooltip="'.$servicename.'"><i class="cmt-duplexo-icon-'.$data->servicename.'"></i></a>';
					$return .= '</div>';
					
				}
			}
		}
		
		$return .= '</div><!-- .cmt-sboxsocialbox-links-wrapper -->  ';
		
		
		// class list
		$class = implode(' ', $class );
		
		// preparing final output
		$return = '<div class="' . $class . '">' . $return . '</div>';
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
		
	// final return
	return $return;
	
	
}
}
add_shortcode( 'cmt-sboxsocialbox', 'cymolthemes_sc_social_box' );