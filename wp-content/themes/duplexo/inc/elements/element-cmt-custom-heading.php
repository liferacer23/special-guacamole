<?php

/* Options for CymolThemes Custom Heading element */

$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Text source', 'duplexo' ),
		'param_name'  => 'source',
		'value'       => array(
			esc_attr__( 'Custom text', 'duplexo' )        => '',
			esc_attr__( 'Post or Page Title', 'duplexo' ) => 'post_title'
		),
		'std'         => '',
		'description' => esc_attr__( 'Select text source.', 'duplexo' )
	),
	array(
		'type'        => 'textarea',
		'heading'     => esc_attr__( 'Text', 'duplexo' ),
		'param_name'  => 'text',
		'admin_label' => true,
		'value'       => esc_attr__( 'This is custom heading element', 'duplexo' ),
		'description' => esc_attr__( 'Note: If you are using non-latin characters be sure to activate them under Settings/Visual Composer/General Settings.', 'duplexo' ),
		'dependency'  => array(
			'element'   => 'source',
			'is_empty'  => true,
		),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'duplexo' ),
		'param_name'  => 'link',
		'description' => esc_attr__( 'Add link to custom heading.', 'duplexo' ),
		// compatible with btn2 and converted from href{btn1}
	),
	array(
		'type'       => 'font_container',
		'param_name' => 'font_container',
		'value'      => 'tag:h2|text_align:left',
		'settings'   => array(
			'fields'   => array(
				'tag'                     => 'h2', // default value h2
				'text_align',
				'font_size',
				'line_height',
				'color',
				'tag_description'         => esc_attr__( 'Select element tag.', 'duplexo' ),
				'text_align_description'  => esc_attr__( 'Select text alignment.', 'duplexo' ),
				'font_size_description'   => esc_attr__( 'Enter font size.', 'duplexo' ),
				'line_height_description' => esc_attr__( 'Enter line height.', 'duplexo' ),
				'color_description'       => esc_attr__( 'Select heading color.', 'duplexo' ),
			),
		),
		'std'        => 'tag:h2',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Use theme default font family?', 'duplexo' ),
		'param_name'  => 'use_theme_fonts',
		'value'       => array(
			esc_attr__( 'Yes, use default fonts', 'duplexo' )               => 'yes',
			esc_attr__( 'No, use custom fonts (select below)', 'duplexo' )  => 'no'
		),
		'std'         => array( esc_attr__( 'Yes', 'duplexo' ) => 'yes' ),
		'description' => esc_attr__( 'Use font family from the theme.', 'duplexo' ),
		'std'         => 'yes',
	),
	
	
	array(
		'type'       => 'google_fonts',
		'param_name' => 'google_fonts',
		'value'      => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'std'        => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
		'settings'   => array(
			'fields'   => array(
				'font_family_description' => esc_attr__( 'Select font family.', 'duplexo' ),
				'font_style_description'  => esc_attr__( 'Select font styling.', 'duplexo' )
			)
		),
		'dependency' => array(
			'element'            => 'use_theme_fonts',
			'value_not_equal_to' => 'yes',
		),
	)
	
);

$params = array_merge(
	$allparams,
	array(
		vc_map_add_css_animation(),
		cymolthemes_vc_ele_extra_class_option(),
		cymolthemes_vc_ele_css_editor_option(),
	)
);


global $cmt_sc_params_custom_heading;
$cmt_sc_params_custom_heading = $params;


vc_map( array(
	'name'     => esc_attr__( 'CymolThemes Custom Heading', 'duplexo' ),
	'base'     => 'cmt-custom-heading',
	'icon'     => 'icon-cymolthemes-vc',
	'show_settings_on_create' => true,
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	'params'   => $params
) );
