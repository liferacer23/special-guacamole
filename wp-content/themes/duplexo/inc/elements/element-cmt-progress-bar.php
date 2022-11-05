<?php

// Icon picker
$icons_params = vc_map_integrate_shortcode( 'cmt-sboxicon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
		// we need only type, icon_fontawesome, icon_blabla..., NOT color and etc
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);

// each progress bar options
$param_group = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'duplexo' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar.', 'duplexo' ),
		'admin_label' => true,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Value', 'duplexo' ),
		'param_name' => 'value',
		'description' => esc_attr__( 'Enter value of bar.', 'duplexo' ),
		'admin_label' => true,
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'duplexo' ),
		'param_name' => 'color',
		'value' => array(
				esc_attr__( 'Default', 'duplexo' ) => '',
			) + array(
				esc_attr__( 'Classic Grey', 'duplexo' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'duplexo' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'duplexo' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'duplexo' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'duplexo' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'duplexo' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'duplexo' ) => 'bar_black',
			) + cymolthemes_getVcShared( 'colors-dashed' ),
		'description' => esc_attr__( 'Select single bar background color.', 'duplexo' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	
	// Show / Hide icon
	array(
		'type'       => 'dropdown',
		'heading'    => esc_attr__( 'Show Icon?', 'duplexo' ),
		'param_name' => 'add_icon',
		'value'      => array(
			esc_attr__( 'Yes', 'duplexo' ) => 'true',
			esc_attr__( 'No', 'duplexo' )  => 'false',
		),
		'std'         => 'true',
		'description' => esc_attr__( 'Want to show icon with the progress bar.', 'duplexo' ),
	)
);

// Merging icon with other options
$param_group = array_merge( $param_group, $icons_params );

$params =  array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Widget title', 'duplexo' ),
		'param_name' => 'title',
		'description' => esc_attr__( 'Enter text used as widget title (Note: located above content element).', 'duplexo' ),
	),
	array(
		'type' => 'param_group',
		'heading' => esc_attr__( 'Values', 'duplexo' ),
		'param_name' => 'values',
		'description' => esc_attr__( 'Enter values for graph - value, title and color.', 'duplexo' ),
		'value' => urlencode( json_encode( array(
			array(
				'label' => esc_attr__( 'Development', 'duplexo' ),
				'value' => '90',
			),
			array(
				'label' => esc_attr__( 'Design', 'duplexo' ),
				'value' => '80',
			),
			array(
				'label' => esc_attr__( 'Marketing', 'duplexo' ),
				'value' => '70',
			),
		) ) ),
		'params' => $param_group,
	),
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Units', 'duplexo' ),
		'param_name' => 'units',
		'description' => esc_attr__( 'Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'duplexo' ),
	),
	array(
		'type' => 'dropdown',
		'heading' => esc_attr__( 'Color', 'duplexo' ),
		'param_name' => 'bgcolor',
		'std' => 'skincolor',
		'value' => array(
				esc_attr__( 'Classic Grey', 'duplexo' ) => 'bar_grey',
				esc_attr__( 'Classic Blue', 'duplexo' ) => 'bar_blue',
				esc_attr__( 'Classic Turquoise', 'duplexo' ) => 'bar_turquoise',
				esc_attr__( 'Classic Green', 'duplexo' ) => 'bar_green',
				esc_attr__( 'Classic Orange', 'duplexo' ) => 'bar_orange',
				esc_attr__( 'Classic Red', 'duplexo' ) => 'bar_red',
				esc_attr__( 'Classic Black', 'duplexo' ) => 'bar_black',
			) + cymolthemes_getVcShared( 'colors-dashed' ) ,
		'description' => esc_attr__( 'Select bar background color.', 'duplexo' ),
		'admin_label' => true,
		'param_holder_class' => 'vc_colored-dropdown',
	),
	array(
		'type' => 'checkbox',
		'heading' => esc_attr__( 'Options', 'duplexo' ),
		'param_name' => 'options',
		'value' => array(
			esc_attr__( 'Add stripes', 'duplexo' ) => 'striped',
			esc_attr__( 'Add animation (Note: visible only with striped bar).', 'duplexo' ) => 'animated',
		),
	),
);

$params = array_merge(
	$params,
	array( vc_map_add_css_animation() ),
	array( cymolthemes_vc_ele_extra_class_option() ),
	array( cymolthemes_vc_ele_css_editor_option() )
);
		
global $cmt_sc_params_progressbar;
$cmt_sc_params_progressbar = $params;


vc_map( array(
	'name'		=> esc_attr__( 'CymolThemes Progress Bar', 'duplexo' ),
	'base'		=> 'cmt-sboxprogress-bar',
	'class'		=> '',
	'icon'		=> 'icon-cymolthemes-vc',
	'category'	=> esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	'params'	=> $params
) );