<?php 

function cymolthemes_duplexo_cpt_cmt_team(){

	// Getting Options
	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	$team_type_title          = ( !empty($duplexo_theme_options['team_type_title']) ) ? $duplexo_theme_options['team_type_title'] : 'Team Members' ;
	$team_type_title_singular = ( !empty($duplexo_theme_options['team_type_title_singular']) ) ? $duplexo_theme_options['team_type_title_singular'] : 'Team Member' ;
	$team_type_slug           = ( !empty($duplexo_theme_options['team_type_slug']) ) ? $duplexo_theme_options['team_type_slug'] : 'team-member' ;
	
	$team_group_title          = ( !empty($duplexo_theme_options['team_group_title']) ) ? $duplexo_theme_options['team_group_title'] : 'Team Groups' ;
	$team_group_title_singular = ( !empty($duplexo_theme_options['team_group_title_singular']) ) ? $duplexo_theme_options['team_group_title_singular'] : 'Team Group' ;
	$team_cat_slug           = ( !empty($duplexo_theme_options['team_cat_slug']) ) ? $duplexo_theme_options['team_cat_slug'] : 'team-group' ;
	
	
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => esc_attr_x( 'Team Members', 'Team Member CPT general name', 'cmtte' ),
		'singular_name'      => esc_attr_x( 'Team Member', 'Team Member CPT singular name', 'cmtte' ),
		'menu_name'          => esc_attr_x( 'Team Member', 'Team Member CPT admin menu', 'cmtte' ),
		'name_admin_bar'     => esc_attr_x( 'Team Member', 'Team Member CPT add new on admin bar', 'cmtte' ),
		'add_new'            => esc_attr_x( 'Add New', 'Team Member CPT', 'cmtte' ),
		'add_new_item'       => esc_attr__( 'Add New Team Member', 'cmtte' ),
		'new_item'           => esc_attr__( 'New Team Member', 'cmtte' ),
		'edit_item'          => esc_attr__( 'Edit Team Member', 'cmtte' ),
		'view_item'          => esc_attr__( 'View Team Member', 'cmtte' ),
		'all_items'          => esc_attr__( 'All Team Members', 'cmtte' ),
		'search_items'       => esc_attr__( 'Search Team Member', 'cmtte' ),
		'parent_item_colon'  => esc_attr__( 'Parent Team Member:', 'cmtte' ),
		'not_found'          => esc_attr__( 'No team member found.', 'cmtte' ),
		'not_found_in_trash' => esc_attr__( 'No team member found in Trash.', 'cmtte' )
	);
	
	
	
	if( $team_type_title!='Team Members' || $team_type_title_singular!='Team Member' ){
		
		$labels = array(
			'name'               => esc_attr_x( $team_type_title, 'post type general name', 'cmtte' ),
			'singular_name'      => esc_attr_x( $team_type_title_singular, 'post type singular name', 'cmtte' ),
			'menu_name'          => esc_attr_x( $team_type_title_singular, 'admin menu', 'cmtte' ),
			'name_admin_bar'     => esc_attr_x( $team_type_title_singular, 'add new on admin bar', 'cmtte' ),
			'add_new'            => esc_attr_x( 'Add New', 'Team Member CPT', 'cmtte' ),
			'add_new_item'       => esc_attr__( 'Add New '.$team_type_title_singular, 'cmtte' ),
			'new_item'           => esc_attr__( 'New '.$team_type_title_singular, 'cmtte' ),
			'edit_item'          => esc_attr__( 'Edit '.$team_type_title_singular, 'cmtte' ),
			'view_item'          => esc_attr__( 'View '.$team_type_title_singular, 'cmtte' ),
			'all_items'          => esc_attr__( 'All '.$team_type_title, 'cmtte' ),
			'search_items'       => esc_attr__( 'Search '.$team_type_title_singular, 'cmtte' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$team_type_title_singular.':', 'cmtte' ),
			'not_found'          => esc_attr__( 'No '.$team_type_title_singular.' found.', 'cmtte' ),
			'not_found_in_trash' => esc_attr__( 'No '.$team_type_title_singular.' found in Trash.', 'cmtte' )
		);
	}
	
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-groups',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => $team_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
	);

	register_post_type( 'cmt_team_member', $args );
	
	
	
	
	
	//Taxonomy 
	
	$labels = 	array(
		'name'              => esc_attr_x( 'Team Group', 'taxonomy general name', 'cmtte' ),
		'singular_name'     => esc_attr_x( 'Team Group', 'taxonomy singular name', 'cmtte' ),
		'search_items'      => esc_attr__( 'Search Group', 'cmtte' ),
		'all_items'         => esc_attr__( 'All Team Groups', 'cmtte' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'cmtte' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'cmtte' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'cmtte' ),
		'update_item'       => esc_attr__( 'Update Group', 'cmtte' ),
		'add_new_item'      => esc_attr__( 'Add New Group', 'cmtte' ),
		'new_item_name'     => esc_attr__( 'New Group Name', 'cmtte' ),
		'menu_name'         => esc_attr__( 'Team Group', 'cmtte' ),
	);
	

	if( $team_group_title != esc_attr__('Team Groups', 'cmtte') || $team_group_title_singular != esc_attr__('Team Group', 'cmtte') ){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'cmtte'), $team_group_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'cmtte'), $team_group_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'cmtte'), $team_group_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'cmtte'), $team_group_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'cmtte'), $team_group_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'cmtte'), $team_group_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'cmtte'), $team_group_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'cmtte'), $team_group_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'cmtte'), $team_group_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'cmtte'), $team_group_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'cmtte'), $team_group_title_singular ),
		);
	}
	

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $team_cat_slug ),
	);
	
	register_taxonomy( 'cmt_team_group', 'cmt_team_member', $args  );

	
	
	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'cymolthemes_duplexo_cmt_team_featured_image_box');
	function cymolthemes_duplexo_cmt_team_featured_image_box() {
		
		$duplexo_theme_options = get_option('duplexo_theme_options');
		$team_type_title_singular = ( !empty($duplexo_theme_options['team_type_title_singular']) ) ? $duplexo_theme_options['team_type_title_singular'] : 'Team Member' ;
		
		remove_meta_box( 'postimagediv', 'cmt_team_member', 'normal' );
		add_meta_box('postimagediv', sprintf( esc_attr__("%s's Image",'cmtte'), $team_type_title_singular ), 'post_thumbnail_meta_box', 'cmt_team_member', 'normal', 'high');
	}


}
add_action( 'init', 'cymolthemes_duplexo_cpt_cmt_team', 8 );








// Show Featured image in the admin section
add_filter( 'manage_cmt_team_member_posts_columns', 'cymolthemes_cmt_team_member_set_featured_image_column' );
add_action( 'manage_cmt_team_member_posts_custom_column' , 'cymolthemes_cmt_team_member_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'cymolthemes_cmt_team_member_set_featured_image_column' ) ) {
function cymolthemes_cmt_team_member_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['cymolthemes_featured_image'] = esc_attr__( 'Featured Image', 'duplexo' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'cymolthemes_cmt_team_member_set_featured_image_column_content' ) ) {
function cymolthemes_cmt_team_member_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'cymolthemes_featured_image' ){
		echo '<a href="'. get_permalink($post_id) .'">';
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img src="' . CMTTE_URI . '/images/admin-no-image.png" />';
		}
		echo '</a>';
	}
}
}






/**
 *  Meta Box: Team
 */
if ( ! function_exists( 'cymolthemescmtte_duplexo_cmt_team_metabox_options' ) ) {
function cymolthemescmtte_duplexo_cmt_team_metabox_options( $options ) {
	
	
	// Getting Options
	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	$team_type_title_singular = ( !empty($duplexo_theme_options['team_type_title_singular']) ) ? $duplexo_theme_options['team_type_title_singular'] : 'Team Member' ;
	
	$team_extra_details_lines  = ( !empty($duplexo_theme_options['team_extra_details_lines']) ) ? $duplexo_theme_options['team_extra_details_lines'] : array() ;
	
	// Default options - Team Member details
	$list_array = array(
		array(
			'type'    => 'subheading',
			'content' => sprintf( esc_attr__('%s\'s General Details','cmtte'), $team_type_title_singular ),
		),
		 array (
			"id"    => "team_details_line_position",
			"type"  => "text",
			"title" => '<span class="cmt-sboxadmin-team-list-icon"> <i class="fa fa-pencil"></i></span> &nbsp; '.__('Position', 'cmtte'),
		),
		array (
			"id"    => "team_details_line_email",
			"type"  => "text",
			"title" => '<span class="cmt-sboxadmin-team-list-icon"> <i class="fa fa-envelope"></i></span> &nbsp; '.__('Email', 'cmtte'),
		),
		array(
			"id"    => "team_details_line_phone",
			"type"  => "text",
			"title" => '<span class="cmt-sboxadmin-team-list-icon"> <i class="fa fa-phone"></i></span> &nbsp; '.__('Phone', 'cmtte'),
		),
		array(
			"id"    => "team_details_line_website",
			"type"  => "text",
			"title" => '<span class="cmt-sboxadmin-team-list-icon"> <i class="fa fa-link"></i></span> &nbsp; '.__('Website', 'cmtte'),
		)
	);
	
	
	
	// Team Member Extra Details
	$extra_details_info = sprintf( esc_attr__('You can add extra lines from Theme Opitons > %s Settings" section.', 'cmtte'), $team_type_title_singular );
	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	if( is_array($team_extra_details_lines) && count($team_extra_details_lines) > 0 ){
		
		$extra_details_info = '<br><div class="cs-text-muted">' . sprintf( esc_attr__('%s\'s Extra Details: You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'cmtte'), $team_type_title_singular ) . '<br>' .
		sprintf( esc_attr__('You can manage (change icon or title of the line) from Theme Opitons > %s Settings" section.', 'cmtte'), $team_type_title_singular ) . '</div>';
		
		$list_array[] = array(
			'type'    => 'subheading',
			'content' => sprintf( esc_attr__('%s\'s Extra Details','cmtte'), $team_type_title_singular ),
		);
		
		foreach( $duplexo_theme_options['team_extra_details_lines'] as $key=>$val ){
			
			// Icon classs
			$icon_class = $val['team_extra_details_line_icon']['library_' . $val['team_extra_details_line_icon']['library'] ];
			
			$this_array = array();
			$this_array['id']    = 'team_extra_details_line_'.$key;
			$this_array['type']  = 'text';
			$this_array['title'] = '<span class="cmt-sboxadmin-team-list-icon"> <i class="'. $icon_class .'"></i></span> &nbsp; '. esc_attr__($val['team_extra_details_line_title'], 'duplexo');
			$this_array['after'] = '<div class="cs-text-muted">'. sprintf( esc_attr__('This extra field is added from "Theme Options > %s Settings" section. You can manage this field from that section.','cmtte'), $team_type_title_singular ) .'</div>';
			
			
			if( $val['data']=='date' ){  // Date
				$this_array['attributes'] = array( 'readonly' => 'only-key' );
				$this_array['value']      = get_the_date( '', $post_id );
				
			} else if( $val['data']=='category' ){  // Category
				$this_array['attributes'] = array( 'readonly' => 'only-key' );
				$this_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_portfolio_category', '', ', ', '' ) );
				
			}
			
			$list_array[] = $this_array;
		}
	}
	
	
	
	
	// Team Members Details
	$options[]    = array(
		'id'        => 'cymolthemes_team_member_details',
		'title'     => sprintf( esc_attr__("Duplexo: %s's Details", 'cmtte'), $team_type_title_singular ),
		'post_type' => 'cmt_team_member', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_team_list_data',
				'fields' => array(
					array(
						'id'        => 'cmt_team_info',
						'type'      => 'fieldset',
						//'title'     => esc_attr__('List Values','cmtte'),
						'fields'    => $list_array,
						'after'   	=> '<br><div class="cs-text-muted"><strong>' . sprintf( esc_attr__('%s\'s General Details:', 'cmtte'), $team_type_title_singular ) . '</strong> ' . esc_attr__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'cmtte'). '<br></div>' . $extra_details_info,
						
					),
				),
			),
		),
	);
	
	
	
	
	// Team Members Details
	$options[]    = array(
		'id'        => 'cymolthemes_team_member_social',
		'title'     => sprintf( esc_attr__("Duplexo: %s's Social Links", 'cmtte'), $team_type_title_singular ),
		'post_type' => 'cmt_team_member', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			
			//Team Members Social Links
			array(
				'name'   => 'cymolthemes_team_socials',
				//'title'  => esc_attr__("Team Member's Social Links", 'cmtte'),
				'fields' => array(
					array(
						'id'              => 'social_icons_list',
						'type'            => 'group',
						'title'           => esc_attr__('Social Links', 'duplexo'),
						'info'            => esc_attr__('Add your social services here. Also you can reorder the Social Links as per your choice. Just drag and drop items to reorder and save settings', 'duplexo'),
						'button_title'    => esc_attr__('Add New Social Links', 'duplexo'),
						'accordion_title' => 'social_icons_list_icon',
						'fields'          => array(
							array(
								'id'            => 'social_icons_list_icon',
								'type'          => 'select',
								'title'         =>  esc_attr__('Social Sevice', 'duplexo'),
								'options'  		=> array(
													'twitter'    => esc_attr__('Twitter', 'duplexo' ),
													'youtube'    => esc_attr__('YouTube', 'duplexo' ),
													'flickr'     => esc_attr__('Flickr', 'duplexo' ),
													'facebook'   => esc_attr__('Facebook', 'duplexo' ),
													'linkedin'   => esc_attr__('LinkedIn', 'duplexo' ),
													'gplus'      => esc_attr__('Google+', 'duplexo' ),
													'yelp'       => esc_attr__('Yelp', 'duplexo' ),
													'dribbble'   => esc_attr__('Dribbble', 'duplexo' ),
													'pinterest'  => esc_attr__('Pinterest', 'duplexo' ),
													'podcast'    => esc_attr__('Podcast', 'duplexo' ),
													'instagram'  => esc_attr__('Instagram', 'duplexo' ),
													'xing'       => esc_attr__('Xing', 'duplexo' ),
													'vimeo'      => esc_attr__('Vimeo', 'duplexo' ),
													'vk'         => esc_attr__('VK', 'duplexo' ),
													'houzz'      => esc_attr__('Houzz', 'duplexo' ),
													'issuu'      => esc_attr__('Issuu', 'duplexo' ),
													'google-drive' => esc_attr__('Google Drive', 'duplexo' ),
													'rss'        => esc_attr__('RSS', 'duplexo' ),
												),
								'class'         => 'chosen',
								'default'       => 'twitter',
								'after'  		=> '<div class="cs-text-muted"><br>'.__('Select Social service from here', 'duplexo').'</div>',
							),
							array(
								'id'     		=> 'social_icons_list_link',
								'type'    		=> 'text',
								'title'   		=> esc_attr__('Link to Social service selected above', 'duplexo'),
								'after'  		=> '<div class="cs-text-muted"><br>'. esc_attr__('Paste URL only', 'duplexo').'</div>',
								'dependency' 	=> array( 'social_icons_list_icon', '!=', 'rss' ),
							),
						)
					),
				
				),
			),
		),
	);
	
	
	
	
	
	
	
	return $options;
}
}
add_filter( 'cs_metabox_options', 'cymolthemescmtte_duplexo_cmt_team_metabox_options' );

