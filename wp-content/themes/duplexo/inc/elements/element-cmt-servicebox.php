<?php

/* Options for CymolThemes Servicebox */
$bgcolor_custom = array();
$bgcolor_custom[__( 'Transparent', 'duplexo' )] = 'transparent';
$bgcolor_custom[__( 'Skin color', 'duplexo' )]  = 'skincolor';
$boxcolor =   array_merge( $bgcolor_custom , cymolthemes_getVcShared( 'colors-dashed' ) ) ;

/**
 * Heading Element
 */
$heading_element = vc_map_integrate_shortcode( 'cmt-sboxheading', '', '',
	array(
		'exclude' => array(
			'seperator',
			'el_class',
			'css',
			'reverse_heading',
			'css_animation'
		),
	)
);

$params = array_merge(
	
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Icon position', 'duplexo' ),
			'description' => esc_attr__( 'Icon position in the Service box.', 'duplexo' ),
			'param_name'  => 'add_icon',
			'std'         => 'left-spacing',
			'value'       => array(
				esc_attr__( 'Before Heading', 'duplexo' )           => 'before-heading',
				esc_attr__( 'Top Center', 'duplexo' )               => 'top-center',
				esc_attr__( 'Top Left', 'duplexo' )                 => 'top-left',
				esc_attr__( 'Left with spacing', 'duplexo' )        => 'left-spacing',
				esc_attr__( 'Bottom Left', 'duplexo' )              => 'bottom-center',
				esc_attr__( 'Top Right (RTL)', 'duplexo' )          => 'top-right',
				esc_attr__( 'Right with spacing (RTL)', 'duplexo' ) => 'right-spacing',
				esc_attr__( 'After Heading (RTL)', 'duplexo' )      => 'after-heading',
				esc_attr__( 'Without Icon', 'duplexo' )      		=> 'without-icon',
				esc_attr__( 'Top Left With Number', 'duplexo' )     => 'left-spacing-style2',
			),
		),
	),
	
	$heading_element,
	array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Background Color', 'duplexo' ),
			'param_name' => 'bgcolor',
			'value'      => array( 'Transparent' => 'transparent' ) + cymolthemes_getVcShared('pre-bg-colors'),
			'std'         => 'transparent',
			'description' => esc_attr__( 'Select Service Box display style.', 'duplexo' ),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Text Color', 'duplexo' ),
			'param_name' => 'textcolor',
			'value'      => array( esc_attr__('Default', 'duplexo') => '' ) + cymolthemes_getVcShared('pre-text-colors'),
			'std'         => '',
			'description' => esc_attr__( 'Select Service Box display style.', 'duplexo' ),
		)
	),
	array(
		array(
			'type'        => 'dropdown',
			'heading'     => esc_attr__( 'Add button', 'duplexo' ) . '?',
			'description' => esc_attr__( 'Add button to Service Box.', 'duplexo' ),
			'param_name'  => 'add_button',
			'value'       => array(
				esc_attr__( 'No', 'duplexo' )  => '',
				esc_attr__( 'Yes', 'duplexo' ) => 'bottom',
			),
			'std' 		  => '',
			
		),
	),
	vc_map_integrate_shortcode( 'cmt-sboxbtn', 'btn_', esc_attr__( 'Button', 'duplexo' ),
		array(
		'exclude' => array(
			'align',
			'button_block',
			'el_class',
			'css_animation',
			'css',
		),
	),
		array(
			'element' => 'add_button',
			'not_empty' => true,
		)
	),
	
	vc_map_integrate_shortcode( 'cmt-sboxicon', 'i_', esc_attr__( 'Icon', 'duplexo' ),
		array(
			'exclude' => array( 'align', 'el_class', 'css_animation', 'link', 'css' ),
		),
		array(
			'element' => 'add_icon',
			'not_empty' => true,
		)
	),
	
	// ICON TYPE: TEXT
	array(
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Number Behind icon', 'duplexo' ),
			'param_name'  => 'big_number_besidetext',
			'value'		  => '01',
			'description' => esc_attr__( 'This text will appear behind the icon as big text.', 'duplexo' ),
			'group'		  => esc_attr__( 'Icon', 'duplexo' ),
			'dependency'  => array(
				'element'	=> 'add_icon',
				'value'		=> array( 'left-spacing-style2' ),
			)
		),
	),
	
	array(
		/// cta3
		vc_map_add_css_animation(),
		cymolthemes_vc_ele_extra_class_option(),
		cymolthemes_vc_ele_css_editor_option(),
	)
	
	
);

// Changing modifying, adding extra options
$i = 0;
foreach( $params as $param ){
	
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	
	if( $param_name == 'txt_align' ){ // Remove Text Alignment option
		$params[$i]['dependency'] = array(  // This is to hide this option forever
			'element'  => 'btn_style',
			'value'    => array( 'abcdefg' )
		);
		
	} else if( $param_name == 'btn_style' ){
		$style = $param['value'];
		if( is_array($style) ){
			$params[$i]['std']   = 'text';
		}
		
	} else if( $param_name == 'btn_color' ){
		$colors = $param['value'];
		if( is_array($colors) ){
			$params[$i]['std']   = 'skincolor';
		}
	
	} else if( $param_name == 'color' ){
		$colors = $param['value'];
		if( is_array($colors) ){
			$colors = array_reverse($colors);
			$colors[__( 'Skin color', 'duplexo' )] = 'skincolor';
			$params[$i]['value'] = array_reverse($colors);
			$params[$i]['std']   = 'grey';
		}
	
	} else if( $param_name == 'btn_shape' ){
		$params[$i]['dependency'] = array(
			'element'            => 'btn_style',
			'value_not_equal_to' => array( 'text' )
		);
	} else if( $param_name == 'btn_title' ){
		$params[$i]['std'] = esc_attr__( 'Read More', 'duplexo' );
	
	} else if( $param_name == 'btn_add_icon' ){
		$params[$i]['std']   = false;
	
	} else if( $param_name == 'i_background_style' ){
		$params[$i]['value'][__( 'None', 'duplexo' )] = 'none';
		$params[$i]['std'] = 'none';
		
	} else if( $param_name == 'i_background_color' ){
		$params[$i]['value'][__( 'None', 'duplexo' )] = 'none';
		$params[$i]['std'] = 'grey';
		$params[$i]['dependency'] = array(
			'element'               => 'i_background_style',
			'value_not_equal_to'    => array( 'none' )
		);
		
	} else if( $param_name == 'separator' ){
		$params[$i]['dependency'] = array(
			'element'  => 'i_type',
			'value'    => array( 'notavailablevalue' ),
		);
	
	
	} else if( $param_name == 'i_size' ){
		$params[$i]['std'] = 'md';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h2_google_fonts' ){
		$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
	
	} else if( $param_name == 'h4_google_fonts' ){
		$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
	
	} else if( $param_name == 'css_animation' ){
		$params[$i]['group'] = esc_attr__( 'Animations', 'duplexo' );
	
	}
	
	$i++;
} // Foreach

global $cmt_sc_params_servicebox;
$cmt_sc_params_servicebox = $params;

vc_map( array(
	'name'        => esc_attr__( 'CymolThemes Icon Box', 'duplexo' ),
	'base'        => 'cmt-servicebox',
	"icon"        => "icon-cymolthemes-vc",
	'category'    => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	'params'      => $params,
) );