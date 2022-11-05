<?php

/* Options for CymolThemes Button */

global $cmt_pixel_icons;
$icons_params = vc_map_integrate_shortcode( 'cmt-sboxicon', 'i_', '',
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	), array(
		'element' => 'add_icon',
		'value' => 'true',
	)
);
// populate integrated cmt-sboxicons params.
if ( is_array( $icons_params ) && ! empty( $icons_params ) ) {
	foreach ( $icons_params as $key => $param ) {
		if ( is_array( $param ) && ! empty( $param ) ) {
			if ( 'i_type' === $param['param_name'] ) {
				// Do nothing
			}
			if ( isset( $param['admin_label'] ) ) {
				// remove admin label
				unset( $icons_params[ $key ]['admin_label'] );
			}

		}
	}
}
$params = array_merge(
	array(
		array(
			'type'       => 'textfield',
			'heading'    => esc_attr__( 'Text', 'duplexo' ),
			'param_name' => 'title',
			'value'      => esc_attr__( 'Text on the button', 'duplexo' ),
		),
		array(
			'type' => 'vc_link',
			'heading' => esc_attr__( 'URL (Link)', 'duplexo' ),
			'param_name' => 'link',
			'description' => esc_attr__( 'Add link to button.', 'duplexo' ),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Style', 'duplexo' ),
			'description' => esc_attr__( 'Select button display style.', 'duplexo' ),
			'param_name' => 'style',
			'std'		 => 'flat',
			'value' => array(
				esc_attr__( 'Flat', 'duplexo' ) => 'flat',
				esc_attr__( 'Modern', 'duplexo' ) => 'modern',
				esc_attr__( 'Classic', 'duplexo' ) => 'classic',
				esc_attr__( 'Outline', 'duplexo' ) => 'outline',
				esc_attr__( '3d', 'duplexo' ) => '3d',
				esc_attr__( 'Simple Text', 'duplexo' ) => 'text',
				esc_attr__( 'Custom', 'duplexo' ) => 'custom',
				esc_attr__( 'Outline custom', 'duplexo' ) => 'outline-custom',
				esc_attr__( 'Gradient', 'duplexo' ) => 'gradient',
				esc_attr__( 'Gradient Custom', 'duplexo' ) => 'gradient-custom',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 1', 'duplexo' ),
			'param_name' => 'gradient_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'duplexo' ),
			'param_holder_class' => 'cmt_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => cymolthemes_getVcShared( 'colors-dashed' ),
			'std' => 'turquoise',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Gradient Color 2', 'duplexo' ),
			'param_name' => 'gradient_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'duplexo' ),
			'param_holder_class' => 'cmt_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => cymolthemes_getVcShared( 'colors-dashed' ),
			'std' => 'blue',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 1', 'duplexo' ),
			'param_name' => 'gradient_custom_color_1',
			'description' => esc_attr__( 'Select first color for gradient.', 'duplexo' ),
			'param_holder_class' => 'cmt_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#dd3333',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Gradient Color 2', 'duplexo' ),
			'param_name' => 'gradient_custom_color_2',
			'description' => esc_attr__( 'Select second color for gradient.', 'duplexo' ),
			'param_holder_class' => 'cmt_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#eeee22',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Button Text Color', 'duplexo' ),
			'param_name' => 'gradient_text_color',
			'description' => esc_attr__( 'Select button text color.', 'duplexo' ),
			'param_holder_class' => 'cmt_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => '#ffffff',
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'gradient-custom' ),
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
		),
		
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Background', 'duplexo' ),
			'param_name' => 'custom_background',
			'description' => esc_attr__( 'Select custom background color for your element.', 'duplexo' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#ededed',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Text', 'duplexo' ),
			'param_name' => 'custom_text',
			'description' => esc_attr__( 'Select custom text color for your element.', 'duplexo' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'custom' )
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Outline and Text', 'duplexo' ),
			'param_name' => 'outline_custom_color',
			'description' => esc_attr__( 'Select outline and text color for your element.', 'duplexo' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover background', 'duplexo' ),
			'param_name' => 'outline_custom_hover_background',
			'description' => esc_attr__( 'Select hover background color for your element.', 'duplexo' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#666',
		),
		array(
			'type' => 'colorpicker',
			'heading' => esc_attr__( 'Hover text', 'duplexo' ),
			'param_name' => 'outline_custom_hover_text',
			'description' => esc_attr__( 'Select hover text color for your element.', 'duplexo' ),
			'dependency' => array(
				'element' => 'style',
				'value' => array( 'outline-custom' )
			),
			'edit_field_class' => 'vc_col-sm-4 vc_column',
			'std' => '#fff',
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Shape', 'duplexo' ),
			'description' => esc_attr__( 'Select button shape.', 'duplexo' ),
			'param_name'  => 'shape',
			'std'		  => 'round',
			'value'       => array(
				esc_attr__( 'Square', 'duplexo' ) => 'square',
				esc_attr__( 'Rounded', 'duplexo' ) => 'rounded',
				esc_attr__( 'Round', 'duplexo' ) => 'round',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Color', 'duplexo' ),
			'param_name' => 'color',
			'description' => esc_attr__( 'Select button color.', 'duplexo' ),
			'param_holder_class' => 'cmt_vc_colored-dropdown vc_btn3-colored-dropdown',
			'value' => array(
							esc_attr__( '[Skin Color]', 'duplexo' ) => 'skincolor',
							esc_attr__( 'Classic Grey', 'duplexo' ) => 'default',
							esc_attr__( 'Classic Blue', 'duplexo' ) => 'primary',
							esc_attr__( 'Classic Turquoise', 'duplexo' ) => 'info',
							esc_attr__( 'Classic Green', 'duplexo' ) => 'success',
							esc_attr__( 'Classic Orange', 'duplexo' ) => 'warning',
							esc_attr__( 'Classic Red', 'duplexo' ) => 'danger',
							esc_attr__( 'Classic Black', 'duplexo' ) => 'inverse'
					   ) + cymolthemes_getVcShared( 'colors-dashed' ),
			'std' => 'skincolor',
			'dependency' => array(
				'element' => 'style',
				'value_not_equal_to' => array( 'custom', 'outline-custom' )
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Button Size', 'duplexo' ),
			'param_name' => 'size',
			'description' => esc_attr__( 'Select button display size.', 'duplexo' ),
			'std' => 'md',
			'value' => cymolthemes_getVcShared( 'sizes' ),
		),
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Button Text Bold?', 'duplexo' ),
			'param_name'  => 'font_weight',
			'description' => esc_attr__( 'Select YES if you like to bold the font text.', 'duplexo' ),
			'std'         => 'no',
			'value'       => array(
				esc_attr__( 'Yes', 'duplexo' ) => 'yes',
				esc_attr__( 'No', 'duplexo' )  => 'no',
			),
		),
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Alignment', 'duplexo' ),
			'param_name' => 'align',
			'description' => esc_attr__( 'Select button alignment.', 'duplexo' ),
			'value' => array(
				esc_attr__( 'Inline', 'duplexo' ) => 'inline',
				esc_attr__( 'Left', 'duplexo' ) => 'left',
				esc_attr__( 'Right', 'duplexo' ) => 'right',
				esc_attr__( 'Center', 'duplexo' ) => 'center'
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Set full width button?', 'duplexo' ),
			'param_name' => 'button_block',
			'dependency' => array(
				'element'            => 'align',
				'value_not_equal_to' => 'inline',
			),
			'value'      => array(
				esc_attr__( 'No', 'duplexo' )  => 'false',
				esc_attr__( 'Yes', 'duplexo' ) => 'true',
			),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Add icon?', 'duplexo' ),
			'param_name' => 'add_icon',
			'value'      => array(
				esc_attr__( 'No',  'duplexo' ) => '',
				esc_attr__( 'Yes', 'duplexo' ) => 'true',
			),
		),
		
		array(
			'type' => 'dropdown',
			'heading' => esc_attr__( 'Icon Alignment', 'duplexo' ),
			'description' => esc_attr__( 'Select icon alignment.', 'duplexo' ),
			'param_name' => 'i_align',
			'value' => array(
				esc_attr__( 'Left', 'duplexo' ) => 'left',
				esc_attr__( 'Right', 'duplexo' ) => 'right',
			),
			'dependency' => array(
				'element' => 'add_icon',
				'value' => 'true',
			),
		),
	),
	
	$icons_params,
	
	array(
		vc_map_add_css_animation(),
		cymolthemes_vc_ele_extra_class_option(),
		cymolthemes_vc_ele_css_editor_option(),
	)
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	
	// Button Icon
	if( $param_name == 'i_align' ){
		$params[$i]['std'] = 'right';
	
	} else if( $param_name == 'i_type' ){
		$params[$i]['std'] = 'themify';
		
	} else if( $param_name == 'i_icon_themify' ){
		$params[$i]['std']   = 'themifyicon ti-arrow-right';
		$params[$i]['value'] = 'themifyicon ti-arrow-right';

	}
		
	$i++;
} // Foreach

global $cmt_sc_params_btn;
$cmt_sc_params_btn = $params;

vc_map( array(
	'name'     => esc_attr__( 'CymolThemes Button', 'duplexo' ),
	'base'     => 'cmt-sboxbtn',
	'icon'     => 'icon-cymolthemes-vc',
	'category' => array( esc_attr__( 'CymolThemes Special Elements', 'duplexo' ) ),
	'params'   => $params,
	'js_view'  => 'VcButton3View',
	'custom_markup' => '{{title}}<div class="vc_btn3-container"><button class="vc_general vc_btn3 vc_btn3-size-sm vc_btn3-shape-{{ params.shape }} vc_btn3-style-{{ params.style }} vc_btn3-color-{{ params.color }}">{{{ params.title }}}</button></div>',
) );
