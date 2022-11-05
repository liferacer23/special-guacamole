<?php 

function cymolthemes_duplexo_cpt_cmt_slides(){


	// Register Post Type
	$labels = array(
		'name'               => esc_attr_x( 'Slides', 'post type general name', 'cmtte' ),
		'singular_name'      => esc_attr_x( 'Slide', 'post type singular name', 'cmtte' ),
		'menu_name'          => esc_attr_x( 'Slides', 'admin menu', 'cmtte' ),
		'name_admin_bar'     => esc_attr_x( 'Slide', 'add new on admin bar', 'cmtte' ),
		'add_new'            => esc_attr_x( 'Add New', 'slide', 'cmtte' ),
		'add_new_item'       => esc_attr__( 'Add New Slide', 'cmtte' ),
		'new_item'           => esc_attr__( 'New Slide', 'cmtte' ),
		'edit_item'          => esc_attr__( 'Edit Slide', 'cmtte' ),
		'view_item'          => esc_attr__( 'View Slide', 'cmtte' ),
		'all_items'          => esc_attr__( 'All Slides', 'cmtte' ),
		'search_items'       => esc_attr__( 'Search Slide', 'cmtte' ),
		'parent_item_colon'  => esc_attr__( 'Parent Slide:', 'cmtte' ),
		'not_found'          => esc_attr__( 'No slide found.', 'cmtte' ),
		'not_found_in_trash' => esc_attr__( 'No slide found in Trash.', 'cmtte' )
	);
	$args = array(
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-images-alt2',
		'public'              => true,
		'publicly_queryable'  => false,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'query_var'           => true,
		'rewrite'             => array( 'with_front' => false, 'slug' => 'slide' ),
		'capability_type'     => 'post',
		'has_archive'         => false,
		'hierarchical'        => false,
		'menu_position'       => null,
		'supports'            => array( 'title', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'cmt_slide', $args );
	
	

	/* Category */

	$labels = array(
		'name'              => _x( 'Slide Group', 'taxonomy general name', 'cmtte' ),
		'singular_name'     => _x( 'Slide Group', 'taxonomy singular name', 'cmtte' ),
		'search_items'      => esc_attr__( 'Search Group', 'cmtte' ),
		'all_items'         => esc_attr__( 'All Groups', 'cmtte' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'cmtte' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'cmtte' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'cmtte' ),
		'update_item'       => esc_attr__( 'Update Group', 'cmtte' ),
		'add_new_item'      => esc_attr__( 'Add New Group', 'cmtte' ),
		'new_item_name'     => esc_attr__( 'New Group Name', 'cmtte' ),
		'menu_name'         => esc_attr__( 'Slide Group', 'cmtte' ),
	);
	
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => $cmt_pf_category_slug ),
	);
	
	register_taxonomy( 'cmt_slide_group', 'cmt_slide', $args  );
	
	
	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'cymolthemes_duplexo_cmt_slides_featured_image_box');
	function cymolthemes_duplexo_cmt_slides_featured_image_box() {
		remove_meta_box( 'postimagediv', 'cmt_slide', 'normal' );
		add_meta_box('postimagediv', esc_attr__('Slide Image','cmtte'), 'post_thumbnail_meta_box', 'cmt_slide', 'normal', 'high');
	}


}
add_action( 'init', 'cymolthemes_duplexo_cpt_cmt_slides', 8 );


/**
 *  Meta Box: Clients
 */
if ( ! function_exists( 'cymolthemes_duplexo_cmt_slides_metabox_options' ) ) {
function cymolthemes_duplexo_cmt_slides_metabox_options( $options ) {
	

	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'cymolthemes_slides_options',
		'title'     => esc_attr__('Duplexo: Slide Options','cmtte'),
		'post_type' => 'cmt_slide', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_sld_options',
				'title'  => esc_attr__('Slide Options', 'duplexo').'<small>'.__('Options for Slides', 'duplexo').'</small>',
				'fields' => array(
		
					array(
						'id'     		=> 'desc',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Description', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Add description text for this slide", 'cmtte').'</div>',
					),
					array(
						'id'     		=> 'btntext',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Button Text', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Add text for button", 'cmtte').'</div>',
					),
					array(
						'id'     		=> 'btnlink',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Button Link', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Add URL for button", 'cmtte').'</div>',
					),
				),
			),
		),
	);
	return $options;
}
}
add_filter( 'cs_metabox_options', 'cymolthemes_duplexo_cmt_slides_metabox_options' );