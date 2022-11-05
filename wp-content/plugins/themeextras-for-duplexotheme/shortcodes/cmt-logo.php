<?php
// [cmt-sboxlogo]
if( !function_exists('cymolthemes_sc_logo') ){
function cymolthemes_sc_logo( $atts, $content=NULL ){
	
	
	
	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	if( !empty($duplexo_theme_options['logotype']) ){
	
		$return = '<span class="cmt-sboxsc-logo cmt-sboxsc-logo-type-'.$duplexo_theme_options['logotype'].'">';
		
		if( $duplexo_theme_options['logotype']=='image' ){
			if( isset($duplexo_theme_options['logoimg']) && is_array($duplexo_theme_options['logoimg']) ){
				
				// standard logo
				if( isset($duplexo_theme_options['logoimg']['full-url']) && trim($duplexo_theme_options['logoimg']['full-url'])!='' ){
					$image = $duplexo_theme_options['logoimg']['full-url'];
					$return .= '<img class="cymolthemes-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$duplexo_theme_options['logoimg']['full-url'].'">';
				
				} else if( isset($duplexo_theme_options['logoimg']['thumb-url']) && trim($duplexo_theme_options['logoimg']['thumb-url'])!='' ){
					$image = $duplexo_theme_options['logoimg']['thumb-url'];
					$return .= '<img class="cymolthemes-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$duplexo_theme_options['logoimg']['thumb-url'].'">';

				} else if( isset($duplexo_theme_options['logoimg']['id']) && trim($duplexo_theme_options['logoimg']['id'])!='' ){
					$image   = wp_get_attachment_image_src( $duplexo_theme_options['logoimg']['id'], 'full' );
					$return .= '<img class="cymolthemes-logo-img standardlogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$image[0].'" width="'.$image[1].'" height="'.$image[2].'">';
					
					
				}
				
				
				// stikcy logo
				if( isset($duplexo_theme_options['logoimg_sticky']) && is_array($duplexo_theme_options['logoimg_sticky']) ){
					
					if( isset($duplexo_theme_options['logoimg_sticky']['full-url']) && trim($duplexo_theme_options['logoimg_sticky']['full-url'])!='' ){
						$sticky_image   = $duplexo_theme_options['logoimg_sticky']['full-url'];
						$return .= '<img class="cymolthemes-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$duplexo_theme_options['logoimg_sticky']['full-url'].'">';
					
					} else if( isset($duplexo_theme_options['logoimg_sticky']['thumb-url']) && trim($duplexo_theme_options['logoimg_sticky']['thumb-url'])!='' ){
						$sticky_image   = $duplexo_theme_options['logoimg_sticky']['thumb-url'];
						$return .= '<img class="cymolthemes-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$duplexo_theme_options['logoimg_sticky']['thumb-url'].'">';
					
					} else if( isset($duplexo_theme_options['logoimg_sticky']['id']) && trim($duplexo_theme_options['logoimg_sticky']['id'])!='' ){
						$sticky_image   = wp_get_attachment_image_src( $duplexo_theme_options['logoimg_sticky']['id'], 'full' );
						$return .= '<img class="cymolthemes-logo-img stickylogo" alt="' . get_bloginfo( 'name' ) . '" src="'.$sticky_image[0].'" width="'.$sticky_image[1].'" height="'.$image[2].'">';
						
					}
					
				}
				
				
			}
		} else {
			if( !empty($duplexo_theme_options['logotext']) ){
				$return = $duplexo_theme_options['logotext'];
			}
		}
		
		$return .= '</span>';
		
	}
	
	return $return;
}
}
add_shortcode( 'cmt-sboxlogo', 'cymolthemes_sc_logo' );