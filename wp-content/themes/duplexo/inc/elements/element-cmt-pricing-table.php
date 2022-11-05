<?php

/******* Each Line (group) Options ********/

$group_params = array(
	array(
		'type' => 'textfield',
		'heading' => esc_attr__( 'Label', 'duplexo' ),
		'param_name' => 'label',
		'description' => esc_attr__( 'Enter text used as title of bar. You can use STRONG tag to bold some texts.', 'duplexo' ),
		'admin_label' => true,
	),
);

// Merging icon with other options
$param_group = array_merge( $group_params );

$params_boxstyle =  array(
	array(
		'type'			=> 'cymolthemes_style_selector',
		'heading'		=> esc_attr__( 'Pricing Table Box Style', 'duplexo' ),
		'description'	=> esc_attr__( 'Select Pricing Table box style.', 'duplexo' ),
		'param_name'	=> 'boxstyle',
		'std'			=> 'style-1',
		'value'			=> array(
					array(
						'label'	=> esc_attr('price Table Box - Style 1','duplexo'),
						'value'	=> 'style-1',
						'thumb'	=> get_template_directory_uri() . '/inc/images/table-style1.jpg',
					),
					),
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Featured Column', 'duplexo' ),
		'param_name'		=> 'featured_col',
		//'std'				=> '',
		'value'				=> array(
			esc_attr__( 'None', 'duplexo' )		=> '',
			esc_attr__( '1st Column', 'duplexo' )	=> '1',
			esc_attr__( '2nd Column', 'duplexo' )	=> '2',
			esc_attr__( '3rd Column', 'duplexo' )	=> '3',
			esc_attr__( '4th Column', 'duplexo' )	=> '4',
			esc_attr__( '5th Column', 'duplexo' )	=> '5',
		),
		'description'		=> esc_attr__( 'Select whith column will be with featured style.', 'duplexo' ),
		'edit_field_class'	=> 'vc_col-sm-6 vc_column',
	),
	array(
		'type'			=> 'textarea_raw_html',
		'heading'		=> esc_attr__( 'Feature Column Heading', 'duplexo' ),
		'param_name'	=> 'feature_column_title',
		'description'	=> esc_attr__( 'Enter text used as main heading for feature column. Some HTML tags are allowed.', 'duplexo' ),
		'std'         => '',
		'value'       => '',
		'param_holder_class' => 'cmt-sboxsimplify-textarea',
	),	
);

/*** Coumn Options ***/
$params_heading =  array(
	array(
		'type'			=> 'textfield',
		'heading'		=> esc_attr__( 'Heading', 'duplexo' ),
		'param_name'	=> 'heading',
		'description'	=> esc_attr__( 'Enter text used as main heading. This will be plan title like "Basic", "Pro" etc.', 'duplexo' ),
	),
	array(
		'type'			=> 'textarea',
		'heading'		=> esc_attr__( 'Description', 'duplexo' ),
		'param_name'	=> 'description',
		'description'	=> esc_attr__( 'Enter text used as description.', 'duplexo' ),
	)
);

// Main Icon picker
$main_icon = vc_map_integrate_shortcode( 'cmt-sboxicon', 'i_', esc_attr__( 'Content', 'duplexo' ),
	array(
		'include_only_regex' => '/^(type|icon_\w*)/',
	)
);

$params_price =  array(
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price', 'duplexo' ),
		'param_name'		=> 'price',
		'std'				=> '100',
		'description'		=> esc_attr__( 'Enter Price.', 'duplexo' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Currency symbol', 'duplexo' ),
		'param_name'		=> 'cur_symbol',
		'std'				=> '$',
		'description'		=> esc_attr__( 'Enter currency symbol', 'duplexo' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'dropdown',
		'heading'			=> esc_attr__( 'Currency Symbol position', 'duplexo' ),
		'param_name'		=> 'cur_symbol_position',
		'std'				=> 'after',
		'value'				=> array(
			esc_attr__( 'Before price', 'duplexo' )	=> 'before',
			esc_attr__( 'After price', 'duplexo' )	=> 'after',
		),
		'description'		=> esc_attr__( 'Select currency position.', 'duplexo' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'textfield',
		'heading'			=> esc_attr__( 'Price Frequency', 'duplexo' ),
		'param_name'		=> 'price_frequency',
		'std'				=> esc_attr__( 'Monthly', 'duplexo' ),
		'description'		=> esc_attr__( 'Enter currency frequency like "Monthly", "Yearly" or "Weekly" etc.', 'duplexo' ),
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
);

$params_btn = array(
	array(
		'type'       		=> 'textfield',
		'heading'    		=> esc_attr__( 'Button Text', 'duplexo' ),
		'param_name' 		=> 'btn_title',
		'edit_field_class'	=> 'vc_col-sm-3 vc_column',
	),
	array(
		'type'				=> 'vc_link',
		'heading'			=> esc_attr__( 'Button URL (Link)', 'duplexo' ),
		'param_name'		=> 'btn_link',
		'description'		=> esc_attr__( 'Add link to button.', 'duplexo' ),
		'edit_field_class'	=> 'vc_col-sm-9 vc_column',
	),
);

$params_lines =  array(
	array(
		'type'			=> 'param_group',
		'heading'		=> esc_attr__( 'Each Line (Features)', 'duplexo' ),
		'param_name'	=> 'values',
		'description'	=> esc_attr__( 'Enter values for graph - value, title and color.', 'duplexo' ),
		'value'			=> urlencode( json_encode( array(
			array(
				'label'		=> esc_attr__( 'This is label one', 'duplexo' ),
				'value'		=> '90',
			),
			array(
				'label'		=> esc_attr__( 'This is label two', 'duplexo' ),
				'value'		=> '80',
			),
			array(
				'label'		=> esc_attr__( 'This is label three', 'duplexo' ),
				'value'		=> '70',
			),
		) ) ),
		'params'		=> $param_group,
	),
	
);

// CSS Animation
$css_animation = vc_map_add_css_animation();
$css_animation['group'] = esc_attr__( 'Animation', 'duplexo' );

// Extra Class
$extra_class = cymolthemes_vc_ele_extra_class_option();
$extra_class['group'] = esc_attr__( 'Animation', 'duplexo' );


$params_all = array_merge(
	$params_heading,
	$main_icon,
	$params_price,
	$params_btn,
	$params_lines
);

/**** Multiple Columns for pricing table ****/
$params = array();

for( $i=1; $i<=5; $i++ ){  // 3 column
	
	$tab_title = esc_attr__('First Column','duplexo');
	switch( $i ){
		case 2:
			$tab_title = esc_attr__('Second Column','duplexo');
			break;
		case 3:
			$tab_title = esc_attr__('Third Column','duplexo');
			break;
		case 4:
			$tab_title = esc_attr__('Fourth Column','duplexo');
			break;
		case 5:
			$tab_title = esc_attr__('Fifth Column','duplexo');
			break;
	}
	
	foreach( $params_all as $param ){
		
		if( !empty($param['param_name']) ){
			$param['param_name'] = 'col'.$i.'_'.$param['param_name'];
		}
		$param['group']      = $tab_title;

		if( !empty($param['dependency']) && !empty($param['dependency']["element"]) ){
			$param['dependency']["element"] = 'col'.$i.'_'.$param['dependency']["element"];
		}
		
		$params[] = $param;
		
	}

} // for

$params = array_merge(
	$params_boxstyle,
	$params,
	array($css_animation),
	array($extra_class),
	array( cymolthemes_vc_ele_css_editor_option() )
);

global $cmt_sc_params_pricingtable;
$cmt_sc_params_pricingtable = $params;


vc_map( array(
	'name'		=> esc_attr__( 'CymolThemes Pricing Table', 'duplexo' ),
	'base'		=> 'cmt-sboxpricing-table',
	'class'		=> '',
	'icon'		=> 'icon-cymolthemes-vc',
	'category'	=> esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	'params'	=> $params
) );