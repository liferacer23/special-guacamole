<?php

/* Options */

$allParams = array(
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Twitter handle (Twitter Username)",'duplexo'),
			"param_name"	=> "username",
			"description"	=> esc_attr__('Twitter user name. Example "envato".','duplexo')
		),
		array(
			"type"			=> "textfield",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__('"Follow us" text after big icon','duplexo'),
			"param_name"	=> "followustext",
			"description"	=> esc_attr__('(optional) Follow us text after the big Twitter icon so user can click on it and go to Twitter profile page.','duplexo')
		),
		array(
			"type"			=> "dropdown",
			"holder"		=> "div",
			"class"			=> "",
			"heading"		=> esc_attr__("Show Tweets",'duplexo'),
			"param_name"	=> "show",
			"description"	=> esc_attr__('How many Tweets you like to show.','duplexo'),
			'value' => array(
				esc_attr__( '1', 'duplexo' ) => '1',
				esc_attr__( '2', 'duplexo' ) => '2',
				esc_attr__( '3', 'duplexo' ) => '3',
				esc_attr__( '4', 'duplexo' ) => '4',
				esc_attr__( '5', 'duplexo' ) => '5',
				esc_attr__( '6', 'duplexo' ) => '6',
				esc_attr__( '7', 'duplexo' ) => '7',
				esc_attr__( '8', 'duplexo' ) => '8',
				esc_attr__( '9', 'duplexo' ) => '9',
				esc_attr__( '10', 'duplexo' ) => '10',
			),
			'std' => '3',
		),
		
	);

$boxParams  = cymolthemes_box_params();
$css_editor = array( cymolthemes_vc_ele_css_editor_option() );

$params = array_merge( $allParams, $boxParams, $css_editor );



// Changing default values
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'one';
	
	} else if( $param_name == 'view' ){
		$params[$i]['std'] = 'carousel';
		
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
		
	} else if( $param_name == 'carousel_nav' ){ // Removing "About Carousel" option as it's not used here.
		unset( $params[$i]['value']["Above Carousel"] );
		
	}
	
	$i++;
}

global $cmt_sc_params_twitterbox;
$cmt_sc_params_twitterbox = $params;

vc_map( array(
	"name"        => esc_attr__("CymolThemes Twitter Box",'duplexo'),
	"base"        => "cmt-sboxtwitterbox",
	"class"       => "",
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	"icon"        => "icon-cymolthemes-vc",
	"params"      => $params,
) );