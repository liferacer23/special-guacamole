<?php

/**
 *  CymolThemes: Schedule Box
 */

	$params = array_merge(
		cymolthemes_vc_heading_params(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Extra class name', 'duplexo' ),
				'param_name'  => 'el_class',
				'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'duplexo' ),
			),
			array(
			'type' => 'param_group',
			'heading' => esc_attr__( 'Pricelist', 'duplexo' ),
			'param_name' => 'pricelist',
			'group'       => esc_attr__( 'Pricelist', 'duplexo' ),
			'description' => esc_attr__( 'Set Service price', 'duplexo' ),
			'value' => urlencode( json_encode( array(
				array(
					'service_name' => esc_attr__( 'Developemnt', 'duplexo' ),
					'price' => '$30',
				),
			
			))),
			'params' => array(
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Service Name', 'duplexo' ),
						'param_name'  => 'service_name',
						'description' => esc_attr__( 'Fill Service information here', 'duplexo' ),
						'group'       => esc_attr__( 'Pricelist', 'duplexo' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				array(
						'type'        => 'textarea',
						'heading'     => esc_attr__( 'Price', 'duplexo' ),
						'param_name'  => 'price',
						// 'value'       => '',
						'description' => esc_attr__( 'Fill Price details here eg: $30', 'duplexo' ),
						'group'       => esc_attr__( 'Pricelist', 'duplexo' ),
						'admin_label' => true,
						'edit_field_class' => 'vc_col-sm-6 vc_column',
				),
				
			),
		),
			
			
		)
	);
	
	global $cmt_vc_custom_element_pricelistbox;
	$cmt_vc_custom_element_pricelistbox = $params;

	vc_map( array(
		'name'        => esc_attr__( 'CymolThemes Pricelist Box', 'duplexo' ),
		'base'        => 'cmt-sboxpricelistbox',
		"class"    => "",
		"icon"        => "icon-cymolthemes-vc",
		'category'    => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
		'params'      => $params,
	) );