<?php
// [cmt-sboxblogbox]
if( !function_exists('cymolthemes_sc_blogbox') ){
function cymolthemes_sc_blogbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_blogbox;
		
		$options_list = cymolthemes_create_options_list($cmt_sc_params_blogbox);
		
		// extract array
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		
		// Starting wrapper of the whole arear
		$return .= cymolthemes_box_wrapper( 'start', 'blog', get_defined_vars() );
		
			// Heading element
			$return .= cymolthemes_vc_element_heading( get_defined_vars() );
			
			
			// Getting $args for WP_Query
			$args = cymolthemes_get_query_args( 'blog', get_defined_vars() );
			
			// Wp query to fetch posts
			$posts = new WP_Query( $args );
			
			if ( $posts->have_posts() ) {
				$return .= cymolthemes_get_boxes( 'blog', get_defined_vars() );
			}
		
		// Ending wrapper of the whole arear
		$return .= cymolthemes_box_wrapper( 'end', 'blog', get_defined_vars() );
		
			
		/* Restore original Post Data */
		wp_reset_postdata();
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'cmt-sboxblogbox', 'cymolthemes_sc_blogbox' );









