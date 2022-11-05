<?php

/**
 *  CymolThemes: Static Content Box
 */


	$allParams =
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'duplexo' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'duplexo' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Box Image size', 'duplexo' ),
				'param_name'  => 'boximg_size',
				'value'			=> 'full',
				'description' => esc_attr__( 'Enter image size (Example: "thumbnail", "medium", "large", "full"). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'duplexo' ),
				'group'       => esc_attr__( 'Content', 'duplexo' ),
			),
			array(
			'type' => 'param_group',
			'heading' => esc_attr__( 'Box Content', 'duplexo' ),
			'param_name' => 'box_content',
			'group'       => esc_attr__( 'Content', 'duplexo' ),
			'description' => esc_attr__( 'Set box content', 'duplexo' ),
			'params' => array(
				array(
						'type'        => 'attach_image',
						'heading'     => esc_attr__( 'Box Image', 'duplexo' ),
						'param_name'  => 'static_boximage',
						'description' => esc_attr__( 'Select image', 'duplexo' ),
						'group'       => esc_attr__( 'Content', 'duplexo' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Box Title', 'duplexo' ),
						'param_name'  => 'static_boxtitle',
						'description' => esc_attr__( 'Enter text used as title', 'duplexo' ),
						'group'       => esc_attr__( 'Content', 'duplexo' ),
						'admin_label' => true,
				),
				array(
						'type'        => 'textfield',
						'heading'     => esc_attr__( 'Highlight Text', 'duplexo' ),
						'param_name'  => 'static_boxcontent',
						'description' => esc_attr__( 'Enter box content', 'duplexo' ),
						'group'       => esc_attr__( 'Content', 'duplexo' ),
						'admin_label' => true,
				),	
			),
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

	
	global $cmt_vc_custom_element_staticcontent_box;
	$cmt_vc_custom_element_staticcontent_box = $params;
	
	

	vc_map( array(
		'name'        => esc_attr__( 'CymolThemes Static Content Box', 'duplexo' ),
		'base'        => 'cmt-sboxstatic-contentbox',
		"class"    => "",
		"icon"        => "icon-cymolthemes-vc",
		'category'    => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
		'params'      => $params,
	) );