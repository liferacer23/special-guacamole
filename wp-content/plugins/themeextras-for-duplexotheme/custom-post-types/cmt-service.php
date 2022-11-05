<?php

function cymolthemes_duplexo_cpt_cmt_service(){

	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	$service_type_title          = ( !empty($duplexo_theme_options['service_type_title']) ) ? $duplexo_theme_options['service_type_title'] : 'Service' ;
	$service_type_title_singular = ( !empty($duplexo_theme_options['service_type_title_singular']) ) ? $duplexo_theme_options['service_type_title_singular'] : 'Service' ;
	$service_type_slug           = ( !empty($duplexo_theme_options['service_type_slug']) ) ? $duplexo_theme_options['service_type_slug'] : 'service' ;
	
	$service_cat_title          = ( !empty($duplexo_theme_options['service_cat_title']) ) ? $duplexo_theme_options['service_cat_title'] : 'Service Categories' ;
	$service_cat_title_singular = ( !empty($duplexo_theme_options['service_cat_title_singular']) ) ? $duplexo_theme_options['service_cat_title_singular'] : 'Service Category' ;
	$service_cat_slug           = ( !empty($duplexo_theme_options['service_cat_slug']) ) ? $duplexo_theme_options['service_cat_slug'] : 'service-category' ;
	
	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => esc_attr_x( 'Service', 'post type general name', 'cmtte' ),
		'singular_name'      => esc_attr_x( 'Service', 'post type singular name', 'cmtte' ),
		'menu_name'          => esc_attr_x( 'Service', 'admin menu', 'cmtte' ),
		'name_admin_bar'     => esc_attr_x( 'Service', 'add new on admin bar', 'cmtte' ),
		'add_new'            => esc_attr_x( 'Add New', 'service', 'cmtte' ),
		'add_new_item'       => esc_attr__( 'Add New Service', 'cmtte' ),
		'new_item'           => esc_attr__( 'New Service', 'cmtte' ),
		'edit_item'          => esc_attr__( 'Edit Service', 'cmtte' ),
		'view_item'          => esc_attr__( 'View Service', 'cmtte' ),
		'all_items'          => esc_attr__( 'All Service', 'cmtte' ),
		'search_items'       => esc_attr__( 'Search Service', 'cmtte' ),
		'parent_item_colon'  => esc_attr__( 'Parent Service:', 'cmtte' ),
		'not_found'          => esc_attr__( 'No Service found.', 'cmtte' ),
		'not_found_in_trash' => esc_attr__( 'No Service found in Trash.', 'cmtte' )
	);
	
	
	
	
	if( trim($service_type_title)!='Service' || trim($service_type_title_singular)!='Service' ){
		// Getting Team Member Title
		
		$labels = array(
			'name'               => esc_attr_x( $service_type_title, 'post type general name', 'cmtte' ),
			'singular_name'      => esc_attr_x( $service_type_title_singular, 'post type singular name', 'cmtte' ),
			'menu_name'          => esc_attr_x( $service_type_title_singular, 'admin menu', 'cmtte' ),
			'name_admin_bar'     => esc_attr_x( $service_type_title_singular, 'add new on admin bar', 'cmtte' ),
			'add_new'            => esc_attr_x( 'Add New', 'service', 'cmtte' ),
			'add_new_item'       => esc_attr__( 'Add New '.$service_type_title_singular, 'cmtte' ),
			'new_item'           => esc_attr__( 'New '.$service_type_title_singular, 'cmtte' ),
			'edit_item'          => esc_attr__( 'Edit '.$service_type_title_singular, 'cmtte' ),
			'view_item'          => esc_attr__( 'View '.$service_type_title_singular, 'cmtte' ),
			'all_items'          => esc_attr__( 'All '.$service_type_title, 'cmtte' ),
			'search_items'       => esc_attr__( 'Search '.$service_type_title_singular, 'cmtte' ),
			'parent_item_colon'  => esc_attr__( 'Parent '.$service_type_title_singular.':', 'cmtte' ),
			'not_found'          => esc_attr__( 'No '.strtolower($service_type_title_singular).' found.', 'cmtte' ),
			'not_found_in_trash' => esc_attr__( 'No '.strtolower($service_type_title_singular).' found in Trash.', 'cmtte' )
		);
	}
	
	
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-feedback',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => $service_type_slug ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'/*, 'custom-fields'*/ )
	);

	register_post_type( 'cmt_service', $args );
	
	


	
	//Registaring Taxonomy for Post Type Service
	
	$labels = 	array(
		'name'              => esc_attr__('Service Category', 'cmtte'),
		'singular_name'     => esc_attr__('Service Category', 'cmtte'),
		'search_items'      => esc_attr__('Search Service Category', 'cmtte'),
		'all_items'         => esc_attr__('All Service Category', 'cmtte'), 
		'parent_item'       => esc_attr__('Parent Service Category', 'cmtte'),
		'parent_item_colon' => esc_attr__('Parent Service Category:', 'cmtte'), 
		'edit_item'         => esc_attr__('Edit Service Category', 'cmtte'),
		'update_item'       => esc_attr__('Update Service Category', 'cmtte'),
		'add_new_item'      => esc_attr__('Add New Service Category', 'cmtte'),
		'new_item_name'     => esc_attr__('New Service Category Name', 'cmtte'),
		'menu_name'         => esc_attr__('Service Category', 'cmtte'),
	);
	
	

	if($service_cat_title != '' && $service_cat_title != esc_attr__('Service Category', 'cmtte')){
		
		$labels = array(
			'name'              => sprintf( esc_attr__('%s', 'cmtte'), $service_cat_title ),
			'singular_name'     => sprintf( esc_attr__('%s', 'cmtte'), $service_cat_title_singular ),
			'search_items'      => sprintf( esc_attr__('Search %s', 'cmtte'), $service_cat_title ),
			'all_items'         => sprintf( esc_attr__('All %s', 'cmtte'), $service_cat_title ),
			'parent_item'       => sprintf( esc_attr__('Parent %s', 'cmtte'), $service_cat_title_singular ),
			'parent_item_colon' => sprintf( esc_attr__('Parent %s:', 'cmtte'), $service_cat_title_singular ),
			'edit_item'         => sprintf( esc_attr__('Edit %s', 'cmtte'), $service_cat_title_singular ),
			'update_item'       => sprintf( esc_attr__('Update %s', 'cmtte'), $service_cat_title_singular ),
			'add_new_item'      => sprintf( esc_attr__('Add New %s', 'cmtte'), $service_cat_title_singular ),
			'new_item_name'     => sprintf( esc_attr__('New %s Name', 'cmtte'), $service_cat_title_singular ),
			'menu_name'         => sprintf( esc_attr__('%s', 'cmtte'), $service_cat_title_singular ),
		);
	}
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => $service_cat_slug ),
	);
	
	register_taxonomy( 'cmt_service_category', 'cmt_service', $args  );
	
	
}

add_action( 'init', 'cymolthemes_duplexo_cpt_cmt_service', 8 );







// Show Featured image in the admin section
add_filter( 'manage_cmt_service_posts_columns', 'cymolthemes_cmt_service_set_featured_image_column' );
add_action( 'manage_cmt_service_posts_custom_column' , 'cymolthemes_cmt_service_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'cymolthemes_cmt_service_set_featured_image_column' ) ) {
function cymolthemes_cmt_service_set_featured_image_column($columns) {
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
if ( ! function_exists( 'cymolthemes_cmt_service_set_featured_image_column_content' ) ) {
function cymolthemes_cmt_service_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Boxes: Service
 */
if ( ! function_exists( 'cymolthemes_duplexo_cmt_service_metabox_options' ) ) {
function cymolthemes_duplexo_cmt_service_metabox_options( $options ) {
	
	// Praparing List options array
	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	//
	//$service_type_title          = ( !empty($duplexo_theme_options['service_type_title']) ) ? $duplexo_theme_options['service_type_title'] : 'Service' ;
	$service_type_title_singular = ( !empty($duplexo_theme_options['service_type_title_singular']) ) ? $duplexo_theme_options['service_type_title_singular'] : 'Service' ;

	
	$post_id = !empty($_GET['post']) ? $_GET['post'] : get_the_ID() ;
	
	
	$list_array    = array();
	$options_array = array();
	if( isset($duplexo_theme_options['service_details_line']) && is_array($duplexo_theme_options['service_details_line']) && count( $duplexo_theme_options['service_details_line'] ) > 0 ){
		foreach( $duplexo_theme_options['service_details_line'] as $key=>$val ){
			
			// Icon classs
			$icon_class = $val['service_details_line_icon']['library_' . $val['service_details_line_icon']['library'] ];
			
			$option_array = array(
				'id'         => 'service_details_line_'.$key,
				'type'       => 'text',
				'title'      => '<span class="cmt-sboxadmin-service-list-icon"> <i class="'. $icon_class .'"></i></span> &nbsp; '. esc_attr__($val['service_details_line_title'], 'duplexo'),
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
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_service_category', '', ', ', '' ) );
					break;
				
				
				case 'category_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_service_category', '', ', ', '' ) );
					break;
					
				case 'tag' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-text';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_service_tags', '', ', ', '' ) );
					break;
					
				case 'tag_link' :
					$option_array['type']       = 'text';
					$option_array['attributes'] = array( 'readonly'  => 'only-key' );
					$option_array['wrap_class'] = 'cmt-sboxinput-style-link';
					$option_array['value']      = strip_tags( get_the_term_list( $post_id, 'cmt_service_tags', '', ', ', '' ) );
					break;
					
			}
			
			// merging with main array
			$options_array[] = $option_array;
			
		}
	}
	
	
	
	if( count($options_array)==0 ){
		// No options created in Service Settings section.
		$list_array[] = array(
			'type'    => 'notice',
			'class'   => 'success',
			'content' => esc_attr__('There is no option to show. Please create some options from "Theme Options > Service Settings" section.', 'cmtte'),
		);
	} else {
		
		// Options created in Service Settings section.
		$list_array = $options_array;
		
	}
	
	
	
	
	


	
	
	
	// Service Featured Image / Video / Slider Metabox
	$options[]    = array(
		'id'        => 'cymolthemes_service_featured',
		'title'     => esc_attr__('Duplexo: Featured Image / Video / Slider', 'cmtte'),
		'post_type' => 'cmt_service', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_service_featured',
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
	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'cymolthemes_tmservice_icon',
		'title'     => esc_attr__('Duplexo: Service icon', 'cmtte'),
		'post_type' => 'cmt_service', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_service_icon',
				'fields' => array(
		
					array(
						'id'     		=> 'cmt_serviceicon',
						'type'    		=> 'cymolthemes_iconpicker',
						'title'   		=> esc_attr__('Service Icon', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please select icon for Servicebox element", 'cmtte').'</div>',
					),
				),
			),
		),
	);
	
	return $options;
}
}
add_filter( 'cs_metabox_options', 'cymolthemes_duplexo_cmt_service_metabox_options' );