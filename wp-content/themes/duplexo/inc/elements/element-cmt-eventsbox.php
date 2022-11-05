<?php

/* Options */

$allParams = array(
	array(
		"type"        => "cymolthemes_style_selector",
		"heading"     => esc_attr__("Box Style", "duplexo"),
		"description" => esc_attr__("Select box style.", "duplexo"),
		"group"       => esc_attr__( "Box Design", "duplexo" ),
		"param_name"  => "view",
		'value'		  => array(
							array(
								'label'	=> esc_attr('Default Style','duplexo'),
								'value'	=> 'top-image',
								'thumb'	=> get_template_directory_uri() . '/inc/images/eventbox-style1.png',
							),
						),
		"std"         => "top-image",
		'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
	),
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Events Item",'duplexo'),
		"description" => esc_attr__("How many events you want to show.",'duplexo'),
		"param_name"  => "show",
		"value"       => array(
			esc_attr__('All','duplexo') => '-1',
			esc_attr__('1','duplexo')  => '1',
			esc_attr__('2','duplexo') => '2',
			esc_attr__('3','duplexo')=>'3',
			esc_attr__('4','duplexo')=>'4',
			esc_attr__('5','duplexo')=>'5',
			esc_attr__('6','duplexo')=>'6',
			esc_attr__('7','duplexo')=>'7',
			esc_attr__('8','duplexo')=>'8',
			esc_attr__('9','duplexo')=>'9',
			esc_attr__('10','duplexo')=>'10',
			esc_attr__('11','duplexo')=>'11',
			esc_attr__('12','duplexo')=>'12',
			esc_attr__('13','duplexo')=>'13',
			esc_attr__('14','duplexo')=>'14',
			esc_attr__('15','duplexo')=>'15',
			esc_attr__('16','duplexo')=>'16',
			esc_attr__('17','duplexo')=>'17',
			esc_attr__('18','duplexo')=>'18',
			esc_attr__('19','duplexo')=>'19',
			esc_attr__('20','duplexo')=>'20',
			esc_attr__('21','duplexo')=>'21',
			esc_attr__('22','duplexo')=>'22',
			esc_attr__('23','duplexo')=>'23',
			esc_attr__('24','duplexo')=>'24',
		),
		"std"  => "3",
		'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
	),
	array(
		"type"        => "dropdown",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Show Pagination",'duplexo'),
		"description" => esc_attr__("Show pagination links below Event boxes.",'duplexo'),
		"param_name"  => "pagination",
		"value"       => array(
			esc_attr__('No','duplexo')  => 'no',
			esc_attr__('Yes','duplexo') => 'yes',
		),
		"std"         => "no",
		'dependency'  => array(
			'element'    => 'sortable',
			'value_not_equal_to' => array( 'yes' ),
		),
		'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
	),
	array(
		"type"        => "dropdown",
		"heading"     => esc_attr__("Box Spacing", "duplexo"),
		"param_name"  => "box_spacing",
		"description" => esc_attr__("Spacing between each box.", "duplexo"),
		"value"       => array(
			esc_attr__("Default", "duplexo")                        => "",
			esc_attr__("0 pixel spacing (joint boxes)", "duplexo")  => "0px",
			esc_attr__("5 pixel spacing", "duplexo")                => "5px",
			esc_attr__("10 pixel spacing", "duplexo")               => "10px",
		),
		"std"  => "",
		'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
	),
	
);

/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'cmt-sboxheading', '', '',
	array(
		'exclude' => array(
			'el_class',
			'css',
			'css_animation'
		),
	)
);

$boxParams = cymolthemes_box_params();
$params    = array_merge( $heading_element, $allParams, $boxParams );

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Latest Events';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	}
	$i++;
}

global $cmt_sc_params_eventsbox;
$cmt_sc_params_eventsbox = $params;


vc_map( array(
	"name"     => esc_attr__("CymolThemes Events Box", "duplexo"),
	"base"     => "cmt-sboxeventsbox",
	"icon"     => "icon-cymolthemes-vc",
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	"params"   => $params
) );