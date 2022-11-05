<?php

/**
 *  CymolThemes: Image Box
 */
 
 
	$params = array(
		array(
			'type'			=> 'cymolthemes_style_selector',
			'heading'		=> esc_attr__( 'Image Style', 'duplexo' ),
			'description'	=> esc_attr__( 'Select Image box style.', 'duplexo' ),
			'param_name'	=> 'cmt_img_boxstyle',
			'value'			=> array(
									array(
										'label'	=> esc_attr('Image Box - Style 1','duplexo'),
										'value'	=> 'imagestyle-one',
										'thumb'	=> get_template_directory_uri() . '/inc/images/cmt-sboximgbox-style1.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 2','duplexo'),
										'value'	=> 'imagestyle-two',
										'thumb'	=> get_template_directory_uri() . '/inc/images/cmt-sboximgbox-style2.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 3','duplexo'),
										'value'	=> 'imagestyle-three',
										'thumb'	=> get_template_directory_uri() . '/inc/images/cmt-sboximgbox-style3.png',
									),
									array(
										'label'	=> esc_attr('Image Box - Style 4','duplexo'),
										'value'	=> 'imagestyle-four',
										'thumb'	=> get_template_directory_uri() . '/inc/images/cmt-sboximgbox-style4.png',
									),
								),
			'group'		  	=> esc_attr__( 'Box Style', 'duplexo' ),
			"std"         	=> "imagestyle-one",
		),
		array(
			'type'			=> 'cymolthemes_attach_image',
			'heading'		=> esc_attr__( 'Image', 'duplexo' ),
			'param_name'	=> 'image',
			'value'			=> '',
			'description'	=> esc_attr__( 'Select image from media library.', 'duplexo' ),
			'admin_label'	=> true,
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Image alignment', 'duplexo' ),
			'param_name' => 'alignment',
			'value' => array(
				esc_attr__( 'Left', 'duplexo' )		=> 'left',
				esc_attr__( 'Right', 'duplexo' )	=> 'right',
				esc_attr__( 'Center', 'duplexo' )	=> 'center',
			),
			'description' => esc_attr__( 'Select image alignment.', 'duplexo' ),
		),
		array(
			'type' => 'textfield',
			'heading' => esc_attr__( 'Extra class name', 'duplexo' ),
			'param_name' => 'el_class',
			'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'duplexo' ),
		),
		array(
			'type' => 'css_editor',
			'heading' => esc_attr__( 'CSS box', 'duplexo' ),
			'param_name' => 'css',
			'group' => esc_attr__( 'Design Options', 'duplexo' ),
		),
	);


	global $cymolthemes_sc_params_single_image;
	$cymolthemes_sc_params_single_image = $params;
	
	vc_map( array(
		'name'		=> esc_attr__( 'CymolThemes Single Image', 'duplexo' ),
		'base'		=> 'cmt-sboxsingle-image',
		'icon'		=> 'icon-cymolthemes-vc',
		'category'	=> esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
		'params'	=> $params,
	) );
