<?php 

function cymolthemes_duplexo_cpt_cmt_testimonial(){

	
	/*
	 *  Custom Post Type
	 */
	$labels = array(
		'name'               => esc_attr_x( 'Testimonials', 'Testimonials post type general name', 'cmtte' ),
		'singular_name'      => esc_attr_x( 'Testimonial', 'Testimonials post type singular name', 'cmtte' ),
		'menu_name'          => esc_attr_x( 'Testimonials', 'Testimonials post type admin menu', 'cmtte' ),
		'name_admin_bar'     => esc_attr_x( 'Testimonial', 'Testimonials post type - add new on admin bar', 'cmtte' ),
		'add_new'            => esc_attr_x( 'Add New', 'testimonial', 'cmtte' ),
		'add_new_item'       => esc_attr__( 'Add New Testimonial', 'cmtte' ),
		'new_item'           => esc_attr__( 'New Testimonial', 'cmtte' ),
		'edit_item'          => esc_attr__( 'Edit Testimonial', 'cmtte' ),
		'view_item'          => esc_attr__( 'View Testimonial', 'cmtte' ),
		'all_items'          => esc_attr__( 'All Testimonials', 'cmtte' ),
		'search_items'       => esc_attr__( 'Search Testimonial', 'cmtte' ),
		'parent_item_colon'  => esc_attr__( 'Parent Testimonial:', 'cmtte' ),
		'not_found'          => esc_attr__( 'No testimonial found.', 'cmtte' ),
		'not_found_in_trash' => esc_attr__( 'No testimonial found in Trash.', 'cmtte' )
	);
	
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-format-status',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => 'testimonial' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'cmt_testimonial', $args );
	
	
	
	// Testimonial Group

	$labels = array(
		'name'              => _x( 'Testimonial Group', 'taxonomy general name', 'cmtte' ),
		'singular_name'     => _x( 'Testimonial Group', 'taxonomy singular name', 'cmtte' ),
		'search_items'      => esc_attr__( 'Search Group', 'cmtte' ),
		'all_items'         => esc_attr__( 'All Groups', 'cmtte' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'cmtte' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'cmtte' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'cmtte' ),
		'update_item'       => esc_attr__( 'Update Group', 'cmtte' ),
		'add_new_item'      => esc_attr__( 'Add New Group', 'cmtte' ),
		'new_item_name'     => esc_attr__( 'New Group Name', 'cmtte' ),
		'menu_name'         => esc_attr__( 'Testimonial Group', 'cmtte' ),
	);
	
	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => $cmt_pf_category_slug ),
	);
	
	register_taxonomy( 'cmt_testimonial_group', 'cmt_testimonial', $args  );
	
	
	
	/* Change "Enter Title Here" */
	function cymolthemes_duplexo_cmt_testimonial_enter_title_here( $title ){
		$screen = get_current_screen();
		if ( 'cmt_testimonial' == $screen->post_type ) {
			$title = esc_attr__('Person or Company Name', 'cmtte');
		}
		return $title;
	}
	add_filter( 'enter_title_here', 'cymolthemes_duplexo_cmt_testimonial_enter_title_here' );


	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'cymolthemes_duplexo_cmt_testimonial_featured_image_box');
	function cymolthemes_duplexo_cmt_testimonial_featured_image_box() {
		remove_meta_box( 'postimagediv', 'cmt_testimonial', 'normal' );
		add_meta_box('postimagediv', esc_attr__('Select/Upload Image of Person or Company','cmtte'), 'post_thumbnail_meta_box', 'cmt_testimonial', 'normal', 'high');
	}
		
}
add_action( 'init', 'cymolthemes_duplexo_cpt_cmt_testimonial', 8 );








// Show Featured image in the admin section
add_filter( 'manage_cmt_testimonial_posts_columns', 'cymolthemes_cmt_testimonial_cmt_testimonial_set_featured_image_column' );
add_action( 'manage_cmt_testimonial_posts_custom_column' , 'cymolthemes_cmt_testimonial_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'cymolthemes_cmt_testimonial_cmt_testimonial_set_featured_image_column' ) ) {
function cymolthemes_cmt_testimonial_cmt_testimonial_set_featured_image_column($columns) {
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
if ( ! function_exists( 'cymolthemes_cmt_testimonial_set_featured_image_column_content' ) ) {
function cymolthemes_cmt_testimonial_set_featured_image_column_content( $column, $post_id ) {
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
 *  Meta Box: Clients
 */
if ( ! function_exists( 'cymolthemes_duplexo_cmt_testimonials_metabox_options' ) ) {
function cymolthemes_duplexo_cmt_testimonials_metabox_options( $options ) {
	

	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'cymolthemes_testimonials_details',
		'title'     => esc_attr__('Duplexo: Testimonial Details', 'cmtte'),
		'post_type' => 'cmt_testimonial', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_testi_details',
				'fields' => array(
		
					array(
						'id'     		=> 'clienturl',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Website Link', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please fill person or company's website link", 'cmtte').'</div>',
					),
					array(
						'id'     		=> 'designation',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Person Designation or Company Name', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please fill designation of the person. Fill Company name if it is a company", 'cmtte').'</div>',
					),
					array(
						'id'           	=> 'star_ratings',
						'type'         	=> 'select',
						'title'        	=>  esc_attr__('Select Star Ratings', 'cmtte'),
						'options'  		=> array(
							'1'				=> esc_attr__('One star', 'cmtte'),
							'2'				=> esc_attr__('Two stars', 'cmtte'),
							'3'				=> esc_attr__('Three stars', 'cmtte'),
							'4'				=> esc_attr__('Four stars', 'cmtte'),
							'5'				=> esc_attr__('Five stars', 'cmtte'),
						),
						'default'      	=> '5',
						'after'  		=> '<div class="cs-text-muted"><br>'.__("Please select star ratings.", 'cmtte').'</div>',
					),
				),
			),
		),
	);
	return $options;
}
}
add_filter( 'cs_metabox_options', 'cymolthemes_duplexo_cmt_testimonials_metabox_options' );

