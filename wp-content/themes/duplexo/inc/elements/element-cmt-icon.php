<?php

/* Options for CymolThemes Icon */


/*
 * Icon Element
 * @since 4.4
 */


/**
 *  Show selected icon library only
 */
global $duplexo_theme_options;

// Temporary new list of icon libraries
$icon_library_array = array( // all icon library list array
	'themify'        => array( esc_attr__( 'Themify icons', 'duplexo' ),   'themifyicon ti-thumb-up'),
	'linecons'       => array( esc_attr__( 'Linecons', 'duplexo' ), 'vc_li vc_li-star'),
	'cmt_duplexo'   => array( esc_attr__( 'Special Icons', 'duplexo' ), 'flaticon-honey'),
);


$icon_library = array();
if( isset($duplexo_theme_options['icon_library']) && is_array($duplexo_theme_options['icon_library']) && count($duplexo_theme_options['icon_library'])>0 ){
	// if selected icon library
	foreach( $duplexo_theme_options['icon_library'] as $i_library ){
		$icon_library[$i_library] = $icon_library_array[$i_library];
	}
}

$icon_element_array  = array();
$icon_dropdown_array = array( esc_attr__( 'Font Awesome', 'duplexo' )    => 'fontawesome' );   // Font Awesome icons
$icon_dropdown_array[ esc_attr__( 'Special Icons', 'duplexo' ) ] = 'cmt_duplexo'; // Special icons

if( is_array($icon_library) && count($icon_library)>0 ){
foreach( $icon_library as $library_id=>$library ){
	
	$icon_dropdown_array[$library[0]] = $library_id;
	
	$icon_element_array[]  = array(
		'type'        => 'cymolthemes_iconpicker',
		'heading'     => esc_attr__( 'Icon', 'duplexo' ),
		'param_name'  => 'icon_'.$library_id,
		'value'       => $library[1], // default value to backend editor admin_label
		'settings'    => array(
			'emptyIcon'    => false, // default true, display an "EMPTY" icon?
			'type'         => $library_id,
		),
		'dependency'  => array(
			'element'   => 'type',
			'value'     => $library_id,
		),
		'description' => esc_attr__( 'Select icon from library.', 'duplexo' ),
		'edit_field_class' => 'vc_col-sm-9 vc_column',
	);		
}
}
/* Select icon library code end here */

// All icon related elements
$icon_elements = array_merge(
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon library', 'duplexo' ),
			'value'       => $icon_dropdown_array,
			'std'         => '',
			'admin_label' => true,
			'param_name'  => 'type',
			'description' => esc_attr__( 'Select icon library.', 'duplexo' ),
			'edit_field_class' => 'vc_col-sm-3 vc_column',
		)
	),
	array(
		array(  // Font Awesome icons
			'type'       => 'cymolthemes_iconpicker',
			'heading'    => esc_attr__( 'Icon', 'duplexo' ),
			'param_name' => 'icon_fontawesome',
			'value'      => 'fa fa-thumbs-o-up', // default value to backend editor admin_label
			'settings'   => array(
				'emptyIcon'    => false, // default true, display an "EMPTY" icon?
				'type'         => 'fontawesome',
			),
			'dependency' => array(
				'element'  => 'type',
				'value'    => 'fontawesome',
			),
			'description' => esc_attr__( 'Select icon from library.', 'duplexo' ),
			'edit_field_class' => 'vc_col-sm-9 vc_column',
		),
	),

	$icon_element_array
		
);

$allparams = array(
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Icon color', 'duplexo' ),
		'param_name'  => 'color',
		'value'       => array_merge( 
			cymolthemes_getVcShared( 'colors' ),
			array(
				esc_attr__( 'Classic Grey', 'duplexo' )      => 'bar_grey',
				esc_attr__( 'Classic Blue', 'duplexo' )      => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'duplexo' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'duplexo' )     => 'bar_green',
				esc_attr__( 'Classic Orange', 'duplexo' )    => 'bar_orange',
				esc_attr__( 'Classic Red', 'duplexo' )       => 'bar_red',
				esc_attr__( 'Classic Black', 'duplexo' )     => 'bar_black',
			),
			array( esc_attr__( 'Custom color', 'duplexo' ) => 'custom' )
		),
		'std'         => 'skincolor',
		'description' => esc_attr__( 'Select icon color.', 'duplexo' ),
		'param_holder_class' => 'cmt_vc_colored-dropdown',
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom color', 'duplexo' ),
		'param_name'  => 'custom_color',
		'description' => esc_attr__( 'Select custom icon color.', 'duplexo' ),
		'dependency'  => array(
			'element'   => 'color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background shape', 'duplexo' ),
		'param_name'  => 'background_style',
		'value'       => array(
			esc_attr__( 'None', 'duplexo' ) => '',
			esc_attr__( 'Circle', 'duplexo' ) => 'rounded',
			esc_attr__( 'Square', 'duplexo' ) => 'boxed',
			esc_attr__( 'Rounded', 'duplexo' ) => 'rounded-less',
			esc_attr__( 'Outline Circle', 'duplexo' ) => 'rounded-outline',
			esc_attr__( 'Outline Square', 'duplexo' ) => 'boxed-outline',
			esc_attr__( 'Outline Rounded', 'duplexo' ) => 'rounded-less-outline',
		),
		'std'         => '',
		'description' => esc_attr__( 'Select background shape and style for icon.', 'duplexo' ),
		'param_holder_class' => 'cmt-sboxsimplify-textarea',
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Background color', 'duplexo' ),
		'param_name'  => 'background_color',
		'value'       => array_merge( array( esc_attr__( 'Transparent', 'duplexo' ) => 'transparent' ), cymolthemes_getVcShared( 'colors' ), array( esc_attr__( 'Custom color', 'duplexo' ) => 'custom' ) ),
		'std'         => 'grey',
		'description' => esc_attr__( 'Select background color for icon.', 'duplexo' ),
		'param_holder_class' => 'cmt_vc_colored-dropdown',
		'dependency'  => array(
			'element'   => 'background_style',
			'not_empty' => true,
		),
	),
	array(
		'type'        => 'colorpicker',
		'heading'     => esc_attr__( 'Custom background color', 'duplexo' ),
		'param_name'  => 'custom_background_color',
		'description' => esc_attr__( 'Select custom icon background color.', 'duplexo' ),
		'dependency'  => array(
			'element'   => 'background_color',
			'value'     => 'custom',
		),
	),
	array(
		'type'        => 'dropdown',
		'heading'     => esc_attr__( 'Size', 'duplexo' ),
		'param_name'  => 'size',
		'value'       => array_merge( cymolthemes_getVcShared( 'sizes' ), array( 'Extra Large' => 'xl' ) ),
		'std'         => 'md',
		'description' => esc_attr__( 'Icon size.', 'duplexo' )
	),
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Icon alignment', 'duplexo' ),
		'param_name' => 'align',
		'value'      => array(
			esc_attr__( 'Left', 'duplexo' )   => 'left',
			esc_attr__( 'Right', 'duplexo' )  => 'right',
			esc_attr__( 'Center', 'duplexo' ) => 'center',
		),
		'std'         => 'left',
		'description' => esc_attr__( 'Select icon alignment.', 'duplexo' ),
	),
	array(
		'type'        => 'vc_link',
		'heading'     => esc_attr__( 'URL (Link)', 'duplexo' ),
		'param_name'  => 'link',
		'description' => esc_attr__( 'Add link to icon.', 'duplexo' )
	),
	vc_map_add_css_animation(),
	cymolthemes_vc_ele_extra_class_option(),
	cymolthemes_vc_ele_css_editor_option(),
);

// All params
$params = array_merge( $icon_elements, $allparams );
	
global $cmt_sc_params_icon;
$cmt_sc_params_icon = $params;

vc_map( array(
	'name'     => esc_attr__( 'CymolThemes Icon', 'duplexo' ),
	'base'     => 'cmt-sboxicon',
	'icon'     => 'icon-cymolthemes-vc',
	'category' => array( esc_attr__( 'CymolThemes Special Elements', 'duplexo' ) ),
	'admin_enqueue_css' => array(get_template_directory_uri().'/assets/themify-icons/themify-icons.css', get_template_directory_uri().'/assets/twemoji-awesome/twemoji-awesome.css' ),
	'params'   => $params,
	'js_view'  => 'VcIconElementView_Backend',
) );
