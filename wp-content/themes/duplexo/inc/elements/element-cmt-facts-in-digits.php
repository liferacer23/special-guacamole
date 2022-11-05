<?php

/* Options */

$allParams1 =  array(
	array(
		'type'			=> 'textfield',
		'holder'		=> 'div',
		'class'			=> '',
		'heading'		=> esc_attr__('Header (optional)', 'duplexo'),
		'param_name'	=> 'title',
		'std'			=> esc_attr__('Title Text', 'duplexo'),
		'description'	=> esc_attr__('Enter text for the title. Leave blank if no title is needed.', 'duplexo')
	),
	array(
		"type"			=> "dropdown",
		"holder"		=> "div",
		"class"			=> "",
		"heading"		=> esc_attr__("Design", 'duplexo'),
		"param_name"	=> "view",
		"description"	=> esc_attr__('Select box design.' , 'duplexo'),
		'value' => array(
			esc_attr__( 'Top Left icon', 'duplexo' )          => 'topicon',
			esc_attr__( 'Left icon', 'duplexo' )              => 'lefticon',
			esc_attr__( 'Left icon style1', 'duplexo' )       => 'lefticonstyle1',
			esc_attr__( 'Right icon', 'duplexo' )             => 'righticon',
			esc_attr__( 'Round Box Style', 'duplexo' )        => 'roundbox',
			esc_attr__( 'Top Center icon', 'duplexo' )        => 'topcentericon',
		),
		'std'           => 'topicon',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_attr__( 'Add icon?', 'duplexo' ),
		'param_name' => 'add_icon',
		'std'        => 'true',
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
		'dependency'  => array(
					'element'            => 'view',
					'value_not_equal_to' => array( 'circle-progress' ),
				),
	),
);

$icons_params = vc_map_integrate_shortcode( 'cmt-sboxicon', 'i_', '', array(
	'include_only_regex' => '/^(type|icon_\w*)/',
), array(
	'element' => 'add_icon',
	'value' => 'true',
) );

$icons_params_new = array();

/* Adding class for two column */
foreach( $icons_params as $param ){
	$param['edit_field_class'] = 'vc_col-sm-6 vc_column';
	$icons_params_new[] = $param;
}

$allParams2 = array(
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Rotating Number', 'duplexo'),
				'param_name'		=> 'digit',
				'std'				=> '100',
				'description'		=> esc_attr__('Enter rotating number digit here.', 'duplexo'),
			),
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'heading'			=> esc_attr__('Text Before Number', 'duplexo'),
				'param_name'		=> 'before',
				'description'		=> esc_attr__('Enter text which appear just before the rotating numbers.', 'duplexo'),
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"heading"		=> esc_attr__("Text Style",'duplexo'),
				"param_name"	=> "beforetextstyle",
				"description"	=> esc_attr__('Select text style for the text.', 'duplexo') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','duplexo') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','duplexo'),
				'value' => array(
					esc_attr__( 'Superscript', 'duplexo' ) => 'sup',
					esc_attr__( 'Subscript', 'duplexo' )   => 'sub',
					esc_attr__( 'Normal', 'duplexo' )      => 'span',
				),
				'std' => 'sup',
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				'type'				=> 'textfield',
				'holder'			=> 'div',
				'class'				=> '',
				'heading'			=> esc_attr__('Text After Number', 'duplexo'),
				'param_name'		=> 'after',
				'description'		=> esc_attr__('Enter text which appear just after the rotating numbers.', 'duplexo'),
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				"type"			=> "dropdown",
				"holder"		=> "div",
				"class"			=> "",
				"heading"		=> esc_attr__("Text Style",'duplexo'),
				"param_name"	=> "aftertextstyle",
				"description"	=> esc_attr__('Select text style for the text.', 'duplexo') . '<br>' . esc_attr__('Superscript text appears half a character above the normal line, and is rendered in a smaller font.','duplexo') . '<br>' . esc_attr__('Subscript text appears half a character below the normal line, and is sometimes rendered in a smaller font.','duplexo'),
				'value' => array(
					esc_attr__( 'Superscript', 'duplexo' ) => 'sup',
					esc_attr__( 'Subscript', 'duplexo' )   => 'sub',
					esc_attr__( 'Normal', 'duplexo' )      => 'span',
				),
				'std' => 'sub',
				'edit_field_class'	=> 'vc_col-sm-6 vc_column',
			),
			array(
				'type'			=> 'textfield',
				'holder'		=> 'div',
				'class'			=> '',
				'heading'		=> esc_attr__('Rotating digit Interval', 'duplexo'),
				'param_name'	=> 'interval',
				'std'			=> '5',
				'description'	=> esc_attr__('Enter rotating interval number here.', 'duplexo')
			)
);

// merging all options
$params = array_merge( $allParams1, $icons_params_new, $allParams2 );

// merging extra options like css animation, css options etc
$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( cymolthemes_vc_ele_extra_class_option() ),
	array( cymolthemes_vc_ele_css_editor_option() )
);

global $cmt_sc_params_facts_in_digits;
$cmt_sc_params_facts_in_digits = $params;

vc_map( array(
	'name'		=> esc_attr__( 'CymolThemes Facts in digits', 'duplexo' ),
	'base'		=> 'cmt-sboxfacts-in-digits',
	'class'		=> '',
	'icon'		=> 'icon-cymolthemes-vc',
	'category'	=> esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	'params'	=> $params
) );