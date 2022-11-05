<?php

/* Options */

// Social services
$sociallist = array(
	esc_attr__('Select service','duplexo') => '',
	'Twitter'      => 'twitter',
	'YouTube'      => 'youtube',
	'Flickr'       => 'flickr',
	'Facebook'     => 'facebook',
	'LinkedIn'     => 'linkedin',
	'Google+'      => 'gplus',
	'yelp'         => 'yelp',
	'Dribbble'     => 'dribbble',
	'Pinterest'    => 'pinterest',
	'Podcast'      => 'podcast',
	'Instagram'    => 'instagram',
	'Xing'         => 'xing',
	'Vimeo'        => 'vimeo',
	'VK'           => 'vk',
	'Houzz'        => 'houzz',
	'Issuu'        => 'issuu',
	'Google Drive' => 'google-drive',
	'Rss Feed'     => 'rss',
);

/**
 * Box Design options
 */
$boxParams = cymolthemes_box_params();


$allParams = array_merge(
	$heading_element,
	array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Extra class name', 'duplexo' ),
			'param_name'  => 'el_class',
			'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'duplexo' ),
		),
		array(
			'type'        => 'param_group',
			'heading'     => esc_attr__( 'Social Services List', 'duplexo' ),
			'param_name'  => 'socialservices',
			'description' => esc_attr__( 'Select social service and add URL for it.', 'duplexo' ).'<br><strong>'.esc_attr__('NOTE:','duplexo').'</strong> '.esc_attr__("You don't need to add URL if you are selecting 'RSS' in the social service",'duplexo'),
			'group'       => esc_attr__( 'Social Services', 'duplexo' ),
			'params'     => array(
				array( // First social service
					'type'        => 'dropdown',
					'heading'     => esc_attr__( 'Select Social Service', 'duplexo' ),
					'param_name'  => 'servicename',
					'std'         => 'none',
					'value'       => $sociallist,
					'description' => esc_attr__( 'Select social service', 'duplexo' ),
					'group'       => esc_attr__( 'Social Services', 'duplexo' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-4 vc_column',
				),
				array(
					'type'        => 'textarea',
					'heading'     => esc_attr__( 'Social URL', 'duplexo' ),
					'param_name'  => 'servicelink',
					'dependency'  => array(
						'element'            => 'servicename',
						'value_not_equal_to' => array( 'rss' )
					),
					'value'       => '',
					'description' => esc_attr__( 'Fill social service URL', 'duplexo' ),
					'group'       => esc_attr__( 'Social Services', 'duplexo' ),
					'admin_label' => true,
					'edit_field_class' => 'vc_col-sm-8 vc_column',
				),
			),
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Select column', 'duplexo' ),
			'param_name'  => 'column',
			'value'       => array(
				esc_attr__('One column','duplexo')   => 'one',
				esc_attr__('Two column','duplexo')   => 'two',
				esc_attr__('Three column','duplexo') => 'three',
				esc_attr__('Four column','duplexo')  => 'four',
				esc_attr__('Five column','duplexo')  => 'five',
				esc_attr__('Six column','duplexo')   => 'six',
			),
			'std'         => 'six',
			'description' => esc_attr__( 'Select how many column will show the social icons', 'duplexo' ),
			'group'       => esc_attr__( 'Social Services', 'duplexo' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array( // First social service
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Social icon size', 'duplexo' ),
			'param_name'  => 'iconsize',
			'std'         => 'large',
			'value'       => array(
				esc_attr__('Small icon','duplexo')  => 'small',
				esc_attr__('Medium icon','duplexo') => 'medium',
				esc_attr__('Large icon','duplexo')  => 'large',
			),
			'description' => esc_attr__( 'Select social icon size', 'duplexo' ),
			'group'       => esc_attr__( 'Social Services', 'duplexo' ),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
	),
	$boxParams,
	array(
		cymolthemes_vc_ele_css_editor_option(),
	)
);

$params = $allParams;

global $cmt_sc_params_clients;
$cmt_sc_params_clients = $params;


vc_map( array(
	"name"     => esc_attr__("CymolThemes Social Box", "duplexo"),
	"base"     => "cmt-sboxsocialbox",
	"icon"     => "icon-cymolthemes-vc",
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	"params"   => $params,
) );