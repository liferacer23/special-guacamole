<?php

/**
 *  CymolThemes: Static Content Box
 */

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'cmt-sboxicon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	)
);

$param_group = array(
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Box Title', 'duplexo' ),
						'param_name'  => 'static_boxtitle',
						'description' => esc_attr__( 'Enter text used as title', 'duplexo' ),
						'group'       => esc_attr__( 'Content', 'duplexo' ),
						'admin_label' => true,
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Box Content', 'duplexo' ),
						'param_name'  => 'static_boxcontent',
						'description' => esc_attr__( 'Enter box content', 'duplexo' ),
						'group'       => esc_attr__( 'Content', 'duplexo' ),
						'admin_label' => true,
				),
       			
			);
// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );	
	
	$params  = array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'duplexo' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'duplexo' ),
			),
			array(
				'type' => 'param_group',
				'heading' => esc_attr__( 'Box Content', 'duplexo' ),
				'param_name' => 'box_content',
				'group'       => esc_attr__( 'Content', 'duplexo' ),
				'description' => esc_attr__( 'Set box content', 'duplexo' ),
				'params' => $param_group,
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

$params    = array_merge( $heading_element, $params );

	
	global $cmt_vc_custom_element_stepbox;
	$cmt_vc_custom_element_stepbox = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'CymolThemes Steps Box', 'duplexo' ),
		'base'        => 'cmt-stepbox',
		"class"   	  => "",
		"icon"        => "icon-cymolthemes-vc",
		'category'    => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
		'params'      => $params,
	) );