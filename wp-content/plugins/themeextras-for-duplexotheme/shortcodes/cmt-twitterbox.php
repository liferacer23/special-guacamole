<?php
// [cmt-sboxtwitterbox consumer_key="v6t8ta31234ZkoljqvBDa" consumer_secret="731111dgQqSflffj1t68e60ly1sy5gvvuBgmCXlGEQg" oauth_token="156789585-yOkqsdefmgnrkgjhnrtfjhlgUXRNwkIIWOSCnk3SMOjzKx" oauth_token_secret="dgthuyjrtfjhka3Vh2J0DGr7oR6pBMLdLtnwo5E"]
if( !function_exists('cymolthemes_sc_twitterbox') ){
function cymolthemes_sc_twitterbox( $atts, $content=NULL ){
	
	$return = '';
	
	if( function_exists('vc_map') ){
		
		global $cmt_sc_params_twitterbox;
		$options_list = cymolthemes_create_options_list($cmt_sc_params_twitterbox);
		
		extract( shortcode_atts(
			$options_list
		, $atts ) );
		
		if( function_exists('latest_tweets_render') ){
			
			// Starting wrapper of the whole arear
			$return .= cymolthemes_box_wrapper( 'start', 'twitterbox', get_defined_vars() );
			
				// Heading element
				$return .= cymolthemes_vc_element_heading( get_defined_vars() );
				
				
				$settings = array();
				$settings['username']	  = $username;
				$settings['followustext'] = $followustext;
				$settings['show']		  = $show;
				$settings['column']		  = $column;
				$settings['boxview']      = $boxview;
				$settings['el_class'] 	  = $el_class;
				
				
				
				/***** Fetching from the plugin code *******/
				
				$screen_name = $username;
				$num         = $show;
				
				$items = latest_tweets_render( $screen_name, $num, true, true, 0 );
				$list  = apply_filters('latest_tweets_render_list', $items, $screen_name );
				
				// preparing HTML via this function
				$return .= $tweetList = cymolthemes_twitterbox($settings, $list);
				
				/* *********************************** */
				
				
			
			// Ending wrapper of the whole arear
			$return .= cymolthemes_box_wrapper( 'end', 'twitterbox', get_defined_vars() );
			
		}
		
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
}
}
add_shortcode( 'cmt-sboxtwitterbox', 'cymolthemes_sc_twitterbox' );






function cymolthemes_twitterbox( $settings, $dataArray ) {
	

	
	$followustext = '';
	if( !empty($settings['followustext']) ){
		$followustext = '<br><span class="cmt-sboxsc-twitterbox-followus-text"><small>' . $settings['followustext'] . '</small></span>';
	}
	
	
	// Screen name
	
	$twitter_handle_link = '';
	if( !empty($settings['username']) ){
		$twitter_handle_link = '<h3><span class="cymolthemes-hide">Twitter link</span><a target="_blank" class="twitter-link" href="http://twitter.com/' . $settings['username'] . '"><i class="fa fa-twitter"></i>'.$followustext.'</a></h3>';
	}
	
	
	$return   = '';
	$dataHTML = $dataArray;
	if( is_array($dataHTML) && count($dataHTML)>0 ){
		
		$dataContent = '';
		
		foreach( $dataHTML as $data ){
			$dataContent .= cymolthemes_column_div('start', $settings['column'] );
			$dataContent .= $data;
			$dataContent .= cymolthemes_column_div('end', $settings['column'] );
		}
		
		
		
		
		
		
		$return .= '
			<section class="cymolthemes-twitterbox-wrapper cymolthemes-items-wrapper">
				<div class="cymolthemes-twitterbox-inner">
					' . $twitter_handle_link . '
					<div class="row multi-columns-row cymolthemes-boxes-row-wrapper">
						'.$dataContent.'
					</div>
				</div>
			</section>';
		
	} else {
		$return .= 'Incorrect key or empty key. Please fill correct Twitter keys. You will get keys from <a href="https://dev.twitter.com" target="_blank">https://dev.twitter.com</a>.';
	}
	
	return $return;
	
} // print_footertwitterbar()

