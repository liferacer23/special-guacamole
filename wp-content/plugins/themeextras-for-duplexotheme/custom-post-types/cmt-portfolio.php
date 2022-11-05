<?php

function cymolthemes_duplexo_cpt_cmt_portfolio(){

	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	$pf_type_title          = ( !empty($duplexo_theme_options['pf_type_title']) ) ? $duplexo_theme_options['pf_type_title'] : 'Portfolio' ;
	$pf_type_title_singular = ( !empty($duplexo_theme_options['pf_type_title_singular']) ) ? $duplexo_theme_options['pf_type_title_singular'] : 'Portfolio' ;
	$pf_type_slug           = ( !empty($duplexo_theme_options['pf_type_slug']) ) ? $duplexo_theme_options['pf_type_slug'] : 'portfolio' ;
	
	$pf_cat_title          = ( !empty($duplexo_theme_options['pf_cat_title']) ) ? $duplexo_theme_options['pf_cat_title'] : 'Portfolio Categories' ;
	$pf_cat_title_singular = ( !empty($duplexo_theme_options['pf_cat_title_singular']) ) ? $duplexo_theme_options['pf_cat_title_singular'] : 'Portfolio Category' ;
	$pf_cat_slug           = ( !empty($duplexo_theme_options['pf_cat_slug']) ) ? $duplexo_theme_options['pf_cat_slug'] : 'portfolio-category' ;
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => esc_attr_x( 'Portfolio', 'post type general name', 'cmtte' ),
		'singular_name'      => esc_attr_x( 'Portfolio', 'post type singular name', 'cmtte' ),
		'menu_name'          => esc_attr_x( 'Portfolio', 'admin menu', 'cmtte' ),
		'name_admin_bar'     => esc_attr_x( 'Portfolio', 'add new on admin bar', 'cmtte' ),
		'add_new'            => esc_attr_x( 'Add New', 'portfolio', 'cmtte' ),
		'add_new_item'       => esc_attr__( 'Add New Portfolio', 'cmtte' ),
		'new_item'           => esc_attr__( 'New Portfolio', 'cmtte' ),
		'edit_item'          => esc_attr__( 'Edit Portfolio', 'cmtte' ),
		'view_item'          => esc_attr__( 'View Portfolio', 'cmtte' ),
		'all_items'          => esc_attr__( 'All Portfolio', 'cmtte' ),
		'search_items'       => esc_attr__( 'Search Portfolio', 'cmtte' ),
		'parent_item_colon'  => esc_attr__( 'Parent Portfolio:', 'cmtte' ),
		'not_found'          => esc_attr__( 'No portfolio found.', 'cmtte' ),
		'not_found_in_trash' => esc_attr__( 'No portfolio found in Trash.', 'cmtte' )
	);
	
	
	
	
	if( trim($pf_type_title)!='Portfolio' || trim($pf_type_title_singular)!='Portfolio' ){
		// Getting Team Member Title
		
		$labels = array(
			'name'               => esc_attr_x( $pf_type_title, 'post type general name', 'cmtte' ),
			'singular_name'      => esc_attr_x( $pf_type_title_singular, 'post type singular name', 'cmtte' ),
			'menu_name'          => esc_attr_x( $pf_type_title_singular, 'admin menu', 'cmtte' ),
			'name_admin_bar'     => esc_attr_x( $pf_type_title_singular, 'add new on admin bar', 'cmtte' ),
			'add_new'            => esc_attr_x( 'Add New', 'portfolio', 'cmtte' ),
			'add_new_item'       => esc_attr__( 'Add New '.$pf_type_title_singular, 'cmtte' ),
			'new_item'           => esc_attr__( 'New '.$pf_type_title_singular, 'cmtte' ),
			'edit_item'          => esc_attr__( 'Edit '.$pf_type_title_singular, 'cmtte' ),
			'view_item'          => esc_attr__( 'View '.$pf_type_title_singular, 'cmtte' ),
			'all_items'          => esc_attr__( 'All '.$pf_type_title, 'cmtte' ),
			'search_items'       => esc_attr__( 'Search '.$pf_type_title_singular, 'cmtte' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$pf_type_title_singular.':', 'cmtte' ),
			'not_found'          => esc_attr__( 'No '.strtolower($pf_type_title_singular).' found.', 'cmtte' ),
			'not_found_in_trash' => esc_attr__( 'No '.strtolower($pf_type_title_singular).' found in Trash.', 'cmtte' )
		);
	}
	
	
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-screenoptions',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => $pf_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'/*, 'custom-fields'*/ )
	);

	register_post_type( 'cmt_portfolio', $args );
	
	


	
	//Registaring Taxonomy for Post Type Portfolio
	
	$labels = 	array(
		'name'              => esc_attr__('Portfolio Category', 'cmtte'),
		'singular_name'     => esc_attr__('Portfolio Category', 'cmtte'),
		'search_items'      => esc_attr__('Search Portfolio Category', 'cmtte'),
		'all_items'         => esc_attr__('All Portfolio Category', 'cmtte'), 
		'parent_item'       => esc_attr__('Parent Portfolio Category', 'cmtte'),
		'parent_item_colon' => esc_attr__('Parent Portfolio Category:', 'cmtte'), 
		'edit_item'         => esc_attr__('Edit Portfolio Category', 'cmtte'),
		'update_item'       => esc_attr__('Update Portfolio Category', 'cmtte'),
		'add_new_item'      => esc_attr__('Add New Portfolio Category', 'cmtte'),
		'new_item_name'     => esc_attr__('New Portfolio Category Name', 'cmtte'),
		'menu_name'         => esc_attr__('Portfolio Category', 'cmtte'),
	);
	
	

	if($pf_cat_title != '' && $pf_cat_title != esc_attr__('Portfolio Category', 'cmtte')){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'cmtte'), $pf_cat_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'cmtte'), $pf_cat_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'cmtte'), $pf_cat_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'cmtte'), $pf_cat_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'cmtte'), $pf_cat_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'cmtte'), $pf_cat_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'cmtte'), $pf_cat_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'cmtte'), $pf_cat_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'cmtte'), $pf_cat_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'cmtte'), $pf_cat_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'cmtte'), $pf_cat_title_singular ),
		);
	}
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $pf_cat_slug ),
	);
	
	register_taxonomy( 'cmt_portfolio_category', 'cmt_portfolio', $args  );
	
	
}

add_action( 'init', 'cymolthemes_duplexo_cpt_cmt_portfolio', 8 );







// Show Featured image in the admin section
add_filter( 'manage_cmt_portfolio_posts_columns', 'cymolthemes_cmt_portfolio_set_featured_image_column' );
add_action( 'manage_cmt_portfolio_posts_custom_column' , 'cymolthemes_cmt_portfolio_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'cymolthemes_cmt_portfolio_set_featured_image_column' ) ) {
function cymolthemes_cmt_portfolio_set_featured_image_column($columns) {
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
if ( ! function_exists( 'cymolthemes_cmt_portfolio_set_featured_image_column_content' ) ) {
function cymolthemes_cmt_portfolio_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Boxes: Portfolio
 */
if ( ! function_exists( 'cymolthemes_duplexo_cmt_portfolio_metabox_options' ) ) {
function cymolthemes_duplexo_cmt_portfolio_metabox_options( $options ) {
	
	// Praparing List options array
	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	//
	//$pf_type_title          = ( !empty($duplexo_theme_options['pf_type_title']) ) ? $duplexo_theme_options['pf_type_title'] : 'Portfolio' ;
	$pf_type_title_singular = ( !empty($duplexo_theme_options['pf_type_title_singular']) ) ? $duplexo_theme_options['pf_type_title_singular'] : 'Portfolio' ;
	//$pf_type_slug           = ( !empty($duplexo_theme_options['pf_type_slug']) ) ? $duplexo_theme_options['pf_type_slug'] : 'portfolio' ;
	
	//$pf_cat_title          = ( !empty($duplexo_theme_options['pf_cat_title']) ) ? $duplexo_theme_options['pf_cat_title'] : 'Portfolio Categories' ;
	//$pf_cat_title_singular = ( !empty($duplexo_theme_options['pf_cat_title_singular']) ) ? $duplexo_theme_options['pf_cat_title_singular'] : 'Portfolio Category' ;
	//$pf_cat_slug           = ( !empty($duplexo_theme_options['pf_cat_slug']) ) ? $duplexo_theme_options['pf_cat_slug'] : 'portfolio-category' ;
	
	
	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	
	$list_array    = array();
	$options_array = array();
	if( isset($duplexo_theme_options['pf_details_line']) && is_array($duplexo_theme_options['pf_details_line']) && count( $duplexo_theme_options['pf_details_line'] ) > 0 ){
		foreach( $duplexo_theme_options['pf_details_line'] as $key=>$val ){
			
			// Icon classs
			$icon_class = $val['pf_details_line_icon']['library_' . $val['pf_details_line_icon']['library'] ];
			
			$option_array = array(
				'id'         => 'pf_details_line_'.$key,
				'type'       => 'text',
				'title'      => '<span class="cmt-sboxadmin-pf-list-icon"> <i class="'. $icon_class .'"></i></span> &nbsp; '. esc_attr__($val['pf_details_line_title'], 'duplexo'),
			);
			
			switch( $val['data'] ){
				
				case 'custom' :
				default :
					$option_array['type']         = 'text';
					break;
				
				case 'multiline' :
					$option_array['type']       = 'textarea';
					break;
				
				case 'date' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['value']      = get_the_date( '', $post_id );
					break;
				
				case 'category' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_portfolio_category', '', ', ', '' ) );
					break;
				
				
				case 'category_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_portfolio_category', '', ', ', '' ) );
					break;
					
				case 'tag' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_portfolio_tags', '', ', ', '' ) );
					break;
					
				case 'tag_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_portfolio_tags', '', ', ', '' ) );
					break;
					
			}
			
			// merging with main array
			$options_array[] = $option_array;
			
		}
	}
	
	
	
	if( count($options_array)==0 ){
		// No options created in Portfolio Settings section.
		$list_array[] = array(
			'type'    => 'notice',
			'class'   => 'success',
			'content' => esc_attr__('There is no option to show. Please create some options from "Theme Options > Portfolio Settings" section.', 'cmtte'),
		);
	} else {
		
		// Options created in Portfolio Settings section.
		$list_array = $options_array;
		
	}
	
	
	
	
	

	
	// Portfolio List options
	$options[]    = array(
		'id'        => 'cymolthemes_portfolio_list_data',
		'title'     => sprintf( esc_attr__('Duplexo: %s List Options', 'cmtte'), $pf_type_title_singular ),
		'post_type' => 'cmt_portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_pf_list_data',
				'fields' => array(
		
					array(
						'id'        => 'cmt_pf_list_data',
						'type'      => 'fieldset',
						'title'     => esc_attr__('List Values','cmtte'),
						'fields'    => $list_array,
						//'debug'     => true
						'after'   		=> '<br><div class="cs-text-muted">'.__('You can add values of this each line and the line will appear on front side. The empty value line will be hidden.', 'cmtte'). '<br>' . sprintf( esc_attr__('You can manage (change icon or title of the line) from "Theme Opitons > %s Settings" section.', 'cmtte'), $pf_type_title_singular ).'</div>',
					),
					
				),
			),
		),
	);
	
	
	
	// Portfolio Featured Image / Video / Slider Metabox
	$options[]    = array(
		'id'        => 'cymolthemes_portfolio_featured',
		'title'     => esc_attr__('Duplexo: Featured Image / Video / Slider', 'cmtte'),
		'post_type' => 'cmt_portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_pf_featured',
				'fields' => array(
		
					array(
						'id'       		=> 'featuredtype',
						'type'     		=> 'radio',
						'title'    		=>  esc_attr__('Featured Image / Video / Slider', 'cmtte'),
						'options'       => array(
											'image'       => esc_attr__('Featured Image', 'cmtte'),
											'video'       => esc_attr__('Video (YouTube or Vimeo)', 'cmtte'),
											'audioembed'  => esc_attr__('Audio (SoundCloud embed code)', 'cmtte'),
											'slider'	  => esc_attr__('Image Slider', 'cmtte'),
										),
						'default'		=> 'image',
						'after'   		=> '<div class="cs-text-muted">'.__('Select what you want to show as featured. Image or Video', 'cmtte').'</div>',
					),
					/* Video (YouTube or Vimeo) */
					array(
						'id'     		=> 'video_code',
						'type'    		=> 'textarea',
						'title'   		=> esc_attr__('', 'cmtte'),
						'dependency' => array( 'featuredtype_video', '==', 'true' ),
						'after'  		=> '<div class="cs-text-muted"><br>'.__('Paste video url (oembed) or embed code.', 'cmtte').'</div>',
					),
					/* Audio (SoundCloud embed code) */
					array(
						'id'     		=> 'audio_code',
						'type'    		=> 'wysiwyg',
						'title'   		=> esc_attr__('SoundCloud (or any other service) Embed Code or MP3 file path.', 'cmtte'),
						'dependency' => array( 'featuredtype_audioembed', '==', 'true' ),
						'after'  		=> '<div class="cs-text-muted"><br>'.__('Paste SoundCloud or any other service embed code here', 'cmtte').'</div>',
						'settings'      => array(
							'textarea_rows' => 5,
							'tinymce'       => false,
							'media_buttons' => false,
							'quicktags'     => false,
						)
					),
					/* Image Slider */
					array(
						'id'          => 'slide_images',
						//'debug'       => true,
						'type'        => 'gallery',
						'title'       => esc_attr__('Slider Images', 'cmtte'),
						'add_title'   => 'Add Images',
						'edit_title'  => 'Edit Images',
						'clear_title' => 'Remove Images',
						'dependency'  => array( 'featuredtype_slider', '==', 'true' ),
						'after'       => '<br><div class="cs-text-muted">'.__('Select images for Slider gallery.', 'cmtte').'</div>',
					),
					
					
				),
			),
			
		),
	);
	
	
	
	// Portfolio View Style Meta Box
	$options[]    = array(
		'id'        => 'cymolthemes_portfolio_view',
		'title'     => sprintf( esc_attr__('Duplexo: %s View Style', 'cmtte'), $pf_type_title_singular ),
		'post_type' => 'cmt_portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_pf_view',
				'fields' => array(
		
					array(
						'id'       		=> 'viewstyle',
						'type'     		=> 'radio',
						'title'    		=> sprintf( esc_attr__('%s View Style', 'cmtte'), $pf_type_title_singular ),
						'options'       => array(
									''     			=> esc_attr__('Global', 'cmtte'),
									'left' 			=> esc_attr__('Left image and right content (default)', 'cmtte'),
									'top'  			=> esc_attr__('Top image and bottom content', 'cmtte'),
									'full' 			=> esc_attr__('No image and full-width content (without details box)', 'cmtte'),
									'full-withimg'  => esc_attr__('Top image and full-width content (without details box)', 'cmtte'),
										),
						'default'		=> '',
						'after'   		=> '<div class="cs-text-muted">' . sprintf( esc_attr__('Select view for single %s', 'cmtte'), $pf_type_title_singular ) . '</div>',
					),
				),
			),
		),
	);
	
	
	
	// Portfolio Reset Likes metabox

	$options[]    = array(
		'id'        => 'cymolthemes_portfolio_like',
		'title'     => esc_attr__('Duplexo: Portfolio Like Option','cmtte'),
		'post_type' => 'cmt_portfolio', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_portfolio_resetlike',
				'fields' => array(
		
					array(
						'id'       		=> 'pflikereset',
						'type'     		=> 'checkbox',
						'title'    		=> esc_attr__('Portfolio Reset Likes', 'cmtte'),
						'options'  		=> array(
											'header'  => esc_attr__('YES, Reset Likes', 'cmtte'),	
										),
						'after'   		=> '<div class="cs-text-muted">'.__('This will make the LIKE count to zero. For this portfolio only. If you like to reset LIKE for all portfolio than please go to "Theme Options > Advanced Settings" section', 'cmtte').'<br><br>'.'To reset, just check this checkbox and save this page.'.'</div>',
					),
				),
			),
		),
	);

	
	return $options;
}
}
add_filter( 'cs_metabox_options', 'cymolthemes_duplexo_cmt_portfolio_metabox_options' );