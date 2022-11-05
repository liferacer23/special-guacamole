<?php
// [cmt-social-links]
if( !function_exists('cymolthemes_sc_social_links') ){
function cymolthemes_sc_social_links( $atts, $content=NULL ){
	
	extract( shortcode_atts( array(
		'tooltip'		   => 'yes',
		'tooltip_position' => 'top',
	), $atts ) );
	
	
	
	$wrapperStart = '<div class="cymolthemes-social-links-wrapper">';
	$wrapperEnd   = '</div>';
	return $wrapperStart . cymolthemes_get_social_links($tooltip_position, $tooltip) . $wrapperEnd;
}
}
add_shortcode( 'cmt-social-links', 'cymolthemes_sc_social_links' );






/**
 *  Preparing Social Links
 */
if( !function_exists('cymolthemes_get_social_links') ){
function cymolthemes_get_social_links( $tooltip_position='top' , $tooltip='yes' ){
	global $duplexo_theme_options;
	
	$socialArray = array(
		/* <social-id>  =>  <social-name> */
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
		'rss'          => 'RSS',
	);
	
	
	$return = '';
	if( !empty($duplexo_theme_options['social_icons_list']) ){
		foreach( $duplexo_theme_options['social_icons_list'] as $socialicon ){
			
			$social_id   = $socialicon['social_service_name'];
			$social_name = $socialArray[ $socialicon['social_service_name'] ];
			$social_link = ( !empty($socialicon['social_service_link']) ) ? trim($socialicon['social_service_link']) : '' ;
			
			
			// check for valid position for tooltip
			$class = '';
			$valie_tooltip_positions = array('top','right','bottom','left');
			if ( in_array( $tooltip_position, $valie_tooltip_positions ) ){
				$class = 'tooltip-' . $tooltip_position;
			}
			
			// If tooltip show or hide
			$data_tooltip = 'data-tooltip="'. $social_name .'"';
			if( !empty($tooltip) && $tooltip=='no' ){
				$data_tooltip = '';
			}
			
			// Link according to type of link
			$href = '#';
			if( $social_id == 'rss' ){
				$href = get_bloginfo('rss2_url');
			} else {
				$href = $social_link;
			}
			
			$return .= '<li class="cmt-social-' . $social_id . '"><a class=" ' . sanitize_html_class($class) . '" target="_blank" href="' . $href . '" ' . $data_tooltip . '><i class="cmt-duplexo-icon-' . $social_id . '"></i></a></li>' . "\n";
			
			
		}
	}
	
	
	
	
	
	foreach( $socialArray as $key=>$value ){
		
		if( $key == 'rss' ){
			if( isset($duplexo_theme_options['rss']) && $duplexo_theme_options['rss']=='1' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.get_bloginfo('rss2_url').'" data-tooltip="'.$value[1].'"><i class="cmt-social-icon-'.$value[0].'"></i></a></li>';
			}
		} else {
			if( isset($duplexo_theme_options[$key]) && trim($duplexo_theme_options[$key])!='' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.esc_url($duplexo_theme_options[$key]).'" data-tooltip="'.$value[1].'"><i class="cmt-social-icon-'.$value[0].'"></i></a></li>';
			}
		}
	}
	
	if( $return!='' ){
		$return = '<ul class="social-icons">'.$return.'</ul>';
	}
	
	return $return;
}
}


/**
 *  Preparing Footer Socialbar Links
 */
if( !function_exists('cymolthemes_get_socialbar_links') ){
function cymolthemes_get_socialbar_links( $tooltip_position='top' , $tooltip='yes' ){
	global $duplexo_theme_options;
	
	$socialArray = array(
		/* <social-id>  =>  <social-name> */
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
		'rss'          => 'RSS',
	);
	
	
	$return = '';
	if( !empty($duplexo_theme_options['social_icons_list']) ){
		foreach( $duplexo_theme_options['social_icons_list'] as $socialicon ){
			
			$social_id   = $socialicon['social_service_name'];
			$social_name = $socialArray[ $socialicon['social_service_name'] ];
			$social_link = ( !empty($socialicon['social_service_link']) ) ? trim($socialicon['social_service_link']) : '' ;
			
			
			// check for valid position for tooltip
			$class = '';
			$valie_tooltip_positions = array('top','right','bottom','left');
			if ( in_array( $tooltip_position, $valie_tooltip_positions ) ){
				$class = 'tooltip-' . $tooltip_position;
			}
			
			// If tooltip show or hide
			$data_tooltip = 'data-tooltip="'. $social_name .'"';
			if( !empty($tooltip) && $tooltip=='no' ){
				$data_tooltip = '';
			}
			
			// Link according to type of link
			$href = '#';
			if( $social_id == 'rss' ){
				$href = get_bloginfo('rss2_url');
			} else {
				$href = $social_link;
			}
			
			$return .= '<li class="cmt-social-' . $social_id . ' cmt-sboxsocialbox-i-wrapper"><a class="cmt-sboxsocialbox-icon-link cmt-sboxsocialbox-icon-link-' . $social_id . ' ' . sanitize_html_class($class) . '" target="_blank" href="' . $href . '"><span class="frame-hover"></span><i class="cmt-duplexo-icon-' . $social_id . '"></i><span class="social_name">'.$social_name.'</span></a></li>' . "\n";
		}
	}

	foreach( $socialArray as $key=>$value ){
		
		if( $key == 'rss' ){
			if( isset($duplexo_theme_options['rss']) && $duplexo_theme_options['rss']=='1' ){
				$return .= '<li class="'.$key.'"><a target="_blank" href="'.get_bloginfo('rss2_url').'" data-tooltip="'.$value[1].'"><i class="cmt-social-icon-'.$value[0].'"></i></a></li>';
			}
		} else {
			if( isset($duplexo_theme_options[$key]) && trim($duplexo_theme_options[$key])!='' ){
				$return .= '<li class="'.$key.' "><a target="_blank" href="'.esc_url($duplexo_theme_options[$key]).'" data-tooltip="'.$value[1].'"><i class="cmt-social-icon-'.$value[0].'"></i></a></li>';
			}
		}
	}
	
	if( $return!='' ){
		$return = '<ul class="social-icons cmt-sboxsocialbox-links-wrapper">'.$return.'</ul>';
	}
	
	return $return;
}
}