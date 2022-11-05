<?php

/* Options */

// Getting social list
$global_social_list = cymolthemes_shared_social_list();

$sociallist = array_merge(
	array('' => esc_attr__('Select service','duplexo')),
	$global_social_list,
	array('rss'     => 'Rss Feed')
);
$sociallist = array_flip($sociallist);


$params = array_merge(
	cymolthemes_vc_heading_params(),
	array(
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
	
	array( vc_map_add_css_animation() ),
	array( cymolthemes_vc_ele_extra_class_option() ),
	array( cymolthemes_vc_ele_css_editor_option() )
	
);

global $cmt_sc_params_socialbox;
$cmt_sc_params_socialbox = $params;

vc_map( array(
	'name'        => esc_attr__( 'CymolThemes Social Box', 'duplexo' ),
	'base'        => 'cmt-sboxsocialbox',
	"icon"        => "icon-cymolthemes-vc",
	'category'    => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	'params'      => $params,
) );