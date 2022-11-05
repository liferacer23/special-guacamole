<?php

/* Options for CymolThemes Blogbox */

// Team Group
$teamGroupList = array();
if( taxonomy_exists('cmt_team_group') ){
	$teamGroups    = get_terms( 'cmt_team_group', array( 'hide_empty' => false ) );
	$teamGroupList = array();
	foreach($teamGroups as $teamGroup){
		$name                   = $teamGroup->name.' ('.$teamGroup->count.')';
		$teamGroupList[ $name ] = $teamGroup->slug;
	}
}


// Getting Options
$duplexo_theme_options      = get_option('duplexo_theme_options');
$team_type_title           = ( !empty($duplexo_theme_options['team_type_title']) ) ? $duplexo_theme_options['team_type_title'] : 'Team Members' ;
$team_type_title_singular  = ( !empty($duplexo_theme_options['team_type_title_singular']) ) ? $duplexo_theme_options['team_type_title_singular'] : 'Team Member' ;
$team_group_title          = ( !empty($duplexo_theme_options['team_group_title']) ) ? $duplexo_theme_options['team_group_title'] : 'Team Groups' ;
$team_group_title_singular = ( !empty($duplexo_theme_options['team_group_title_singular']) ) ? $duplexo_theme_options['team_group_title_singular'] : 'Team Group' ;

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
$boxParams = cymolthemes_box_params('team');

$allParams = array_merge(

	$heading_element,
	array(
		array(
			"type"        => "cymolthemes_style_selector",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Box Design",'duplexo'),
			"description" => esc_attr__("Select box design.",'duplexo'),
			"param_name"  => "view",
			"value"       => cymolthemes_global_team_member_template_list( true ),
			"std"         => "styleone",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Show", "duplexo"),
			"param_name"  => "show",
			"description" => sprintf( esc_attr__("How many %s item you want to show.", "duplexo"), $team_type_title ),
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
			),
			"std"  => "4",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => sprintf( esc_attr__("Show Sortable %s Links",'duplexo'), $team_group_title ),
			"description" => sprintf( esc_attr__("Show sortable %s links above box items so user can sort by just single click.",'duplexo'), $team_group_title ),
			"param_name"  => "sortable",
			"value"       => array(
				esc_attr__('No','duplexo')  => 'no',
				esc_attr__('Yes','duplexo') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'            => 'boxview',
				'value_not_equal_to' => array( 'carousel' ),
			),
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Replace ALL word', 'duplexo' ),
			'param_name'  => 'allword',
			'description' => esc_attr__( 'Replace ALL word in sortable group links. Default is ALL word.', 'duplexo' ),
			"std"         => "All",
			'dependency'  => array(
				'element'   => 'sortable',
				'value'     => array( 'yes' ),
			),
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Show Pagination",'duplexo'),
			"description" => sprintf( esc_attr__("Show pagination links below %s boxes.",'duplexo'), $team_type_title_singular ),
			"param_name"  => "pagination",
			"value"       => array(
				esc_attr__('No','duplexo')  => 'no',
				esc_attr__('Yes','duplexo') => 'yes',
			),
			"std"         => "no",
			'dependency'  => array(
				'element'    => 'sortable',
				'value_not_equal_to' => array( 'yes' ),
			),
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "checkbox",
			"heading"     => sprintf( esc_attr__("From %s", "duplexo"), $team_group_title_singular ),
			"param_name"  => "category",
			"description" => sprintf( esc_attr__('If you like to show %1$s from selected %2$s than select the category here.', "duplexo"), $team_type_title, $team_group_title ),
			"value"       => $teamGroupList,
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order by",'duplexo'),
			"description" => sprintf( esc_attr__("Sort retrieved %s by parameter.",'duplexo'), $team_type_title_singular ),
			"param_name"  => "orderby",
			"value"       => array(
				esc_attr__('No order (none)','duplexo')           => 'none',
				esc_attr__('Order by post id (ID)','duplexo')     => 'ID',
				esc_attr__('Order by author (author)','duplexo')  => 'author',
				esc_attr__('Order by title (title)','duplexo')    => 'title',
				esc_attr__('Order by slug (name)','duplexo')      => 'name',
				esc_attr__('Order by date (date)','duplexo')      => 'date',
				esc_attr__('Order by last modified date (modified)','duplexo') => 'modified',
				esc_attr__('Random order (rand)','duplexo')       => 'rand',
				esc_attr__('Order by number of comments (comment_count)','duplexo') => 'comment_count',
				
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "date",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Order",'duplexo'),
			"description" => esc_attr__("Designates the ascending or descending order of the 'orderby' parameter.",'duplexo'),
			"param_name"  => "order",
			"value"       => array(
				esc_attr__('Ascending (1, 2, 3; a, b, c)','duplexo')  => 'ASC',
				esc_attr__('Descending (3, 2, 1; c, b, a)','duplexo') => 'DESC',
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			"std"              => "DESC",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Box Spacing", "duplexo"),
			"param_name"  => "box_spacing",
			"description" => esc_attr__("Spacing between each box.", "duplexo"),
			"value"       => array(
				esc_attr__("Default", "duplexo")                        => "",
				esc_attr__("0 pixel spacing (joint boxes)", "duplexo")  => "0px",
				esc_attr__("5 pixel spacing", "duplexo")                => "5px",
				esc_attr__("10 pixel spacing", "duplexo")               => "10px",
			),
			"std"  => "",
			'group'		  => esc_attr__( 'Box Style', 'duplexo' ),
		)
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
	if( $param_name == 'column' ){
		$params[$i]['std'] = 'four';
		
	} else if( $param_name == 'h2' ){
		$params[$i]['std'] = 'Our Team';
	
	} else if( $param_name == 'h2_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
		
	} else if( $param_name == 'h4_use_theme_fonts' ){
		$params[$i]['std'] = 'yes';
			
	} else if( $param_name == 'txt_align' ){
		$params[$i]['std'] = 'center';
		
	}
	
	$i++;
}

global $cmt_sc_params_teambox;
$cmt_sc_params_teambox = $params;

vc_map( array(
	"name"     => sprintf( esc_attr__("CymolThemes %s Box", "duplexo"), $team_type_title_singular ),
	"base"     => "cmt-teambox",
	"icon"     => "icon-cymolthemes-vc",
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	"params"   => $params,
) );