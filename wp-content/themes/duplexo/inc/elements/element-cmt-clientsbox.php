<?php

/* Options */

$clientsGroupList = array();
if( taxonomy_exists('cmt_client_group') ){
	$clientsGroupList_data = get_terms( 'cmt_client_group', array( 'hide_empty' => false ) );
	$clientsGroupList      = array();
	foreach($clientsGroupList_data as $cat){
		$clientsGroupList[ esc_attr($cat->name) . ' (' . esc_attr($cat->count) . ')' ] = esc_attr($cat->slug);
	}
}

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

/**
 * Box Design options
 */
$boxParams = cymolthemes_box_params();

$allParams = array_merge(
	$heading_element,
	array(
		array(
			"type"        => "cymolthemes_style_selector",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Client Logo Design",'duplexo'),
			"description" => esc_attr__("Select Client logo design.",'duplexo'),
			"param_name"  => "view",
			"value"       => cymolthemes_global_client_template_list( true ),
			"std"         => "simple-logo",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show", "duplexo"),
			"param_name"  => "show",
			"description" => esc_attr__("Total Clients Logos you want to show.", "duplexo"),
			"value"       => array(
				esc_attr__("All", "duplexo") => "-1",
				esc_attr__("1", "duplexo")  => "1",
				esc_attr__("2", "duplexo") => "2",
				esc_attr__("3", "duplexo") => "3",
				esc_attr__("4", "duplexo") => "4",
				esc_attr__("5", "duplexo") => "5",
				esc_attr__("6", "duplexo") => "6",
				esc_attr__("7", "duplexo") => "7",
				esc_attr__("8", "duplexo") => "8",
				esc_attr__("9", "duplexo") => "9",
				esc_attr__("10", "duplexo") => "10",
				esc_attr__("11", "duplexo") => "11",
				esc_attr__("12", "duplexo") => "12",
				esc_attr__("13", "duplexo") => "13",
				esc_attr__("14", "duplexo") => "14",
				esc_attr__("15", "duplexo") => "15",
				esc_attr__("16", "duplexo") => "16",
				esc_attr__("17", "duplexo") => "17",
				esc_attr__("18", "duplexo") => "18",
				esc_attr__("19", "duplexo") => "19",
				esc_attr__("20", "duplexo") => "20",
			),
			"std"  => "10",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => esc_attr__("From Group", "duplexo"),
			"param_name"  => "category",
			"description" => esc_attr__("Select group so it will show client logo from selected group only.", "duplexo"),
			"value"       => $clientsGroupList,
			"std"         => "",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Tooltip on Logo?",'duplexo'),
			"description" => esc_attr__("Select YES to show Tooltip on the logo.",'duplexo'),
			"param_name"  => "show_tooltip",
			"value"       => array(
				esc_attr__("Yes", "duplexo") => "yes",
				esc_attr__("No", "duplexo")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Add link to all logos?",'duplexo'),
			"description" => esc_attr__("Select YES to add link to all logos. Please note that link should be added to each client logo. If no link found than the logo will appear without link.",'duplexo'),
			"param_name"  => "add_link",
			"value"       => array(
				esc_attr__("Yes", "duplexo") => "yes",
				esc_attr__("No", "duplexo")  => "no",
			),
			"std"         => "yes",
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
			
	),
	$boxParams,
	array(
		cymolthemes_vc_ele_css_editor_option(),
	)
);

$params = $allParams;

// Changing default values
$i = 0;
foreach( $params as $param ){
	$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
	if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Clients';
	
	} else if( $param_name == 'column' ){
		$params[$i]['std'] = 'five';
		
	} else if( $param_name == 'boxview' ){
		$params[$i]['std'] = 'carousel';
		
	} else if( $param_name == 'content' ){
		$params[$i]['std'] = '';
		
	} else if( $param_name == 'carousel_loop' ){
		$params[$i]['std'] = '1';
		
	} else if( $param_name == 'carousel_dots' ){
		$params[$i]['std'] = 'true';
		
	} else if( $param_name == 'carousel_nav' ){
		$params[$i]['std'] = '0';
		
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	}
	
	$i++;
}

global $cmt_sc_params_clients;
$cmt_sc_params_clients = $params;


vc_map( array(
	"name"     => esc_attr__("CymolThemes Client Logo Box", "duplexo"),
	"base"     => "cmt-clientsbox",
	"icon"     => "icon-cymolthemes-vc",
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	"params"   => $params,
) );