<?php 

function cymolthemes_duplexo_cpt_cmt_client(){
	
	// Register Post Type
	$labels = array(
		'name'               => esc_attr_x( 'Clients', 'post type general name', 'cmtte' ),
		'singular_name'      => esc_attr_x( 'Client', 'post type singular name', 'cmtte' ),
		'menu_name'          => esc_attr_x( 'Client Logos', 'admin menu', 'cmtte' ),
		'name_admin_bar'     => esc_attr_x( 'Client', 'add new on admin bar', 'cmtte' ),
		'add_new'            => esc_attr_x( 'Add New', 'client', 'cmtte' ),
		'add_new_item'       => esc_attr__( 'Add New Client', 'cmtte' ),
		'new_item'           => esc_attr__( 'New Client', 'cmtte' ),
		'edit_item'          => esc_attr__( 'Edit Client', 'cmtte' ),
		'view_item'          => esc_attr__( 'View Client', 'cmtte' ),
		'all_items'          => esc_attr__( 'All Clients', 'cmtte' ),
		'search_items'       => esc_attr__( 'Search Client', 'cmtte' ),
		'parent_item_colon'  => esc_attr__( 'Parent Client:', 'cmtte' ),
		'not_found'          => esc_attr__( 'No client found.', 'cmtte' ),
		'not_found_in_trash' => esc_attr__( 'No client found in Trash.', 'cmtte' )
	);
	$args = array(
		'labels'             => $labels,
		'menu_icon'          => 'dashicons-businessman',
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'with_front' => false, 'slug' => 'client' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail' ),
		'exclude_from_search' => true,
	);

	register_post_type( 'cmt_client', $args );
	




	/* Category */
	
	$labels = array(
		'name'              => _x( 'Client Group', 'taxonomy general name', 'cmtte' ),
		'singular_name'     => _x( 'Client Group', 'taxonomy singular name', 'cmtte' ),
		'search_items'      => esc_attr__( 'Search Client Group', 'cmtte' ),
		'all_items'         => esc_attr__( 'All Client Groups', 'cmtte' ),
		'parent_item'       => esc_attr__( 'Parent Group', 'cmtte' ),
		'parent_item_colon' => esc_attr__( 'Parent Group:', 'cmtte' ),
		'edit_item'         => esc_attr__( 'Edit Group', 'cmtte' ),
		'update_item'       => esc_attr__( 'Update Group', 'cmtte' ),
		'add_new_item'      => esc_attr__( 'Add New Client Group', 'cmtte' ),
		'new_item_name'     => esc_attr__( 'New Client Group Name', 'cmtte' ),
		'menu_name'         => esc_attr__( 'Client Group', 'cmtte' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		//'rewrite'           => array( 'slug' => $cmt_pf_category_slug ),
	);
	
	register_taxonomy( 'cmt_client_group', 'cmt_client', $args  );


	/* Change "Enter Title Here" */
	function cymolthemes_duplexo_cmt_client_enter_title_here( $title ){
		$screen = get_current_screen();
		if ( 'cmt_client' == $screen->post_type ) {
			$title = esc_attr__('Client Name', 'cmtte');
		}
		return $title;
	}
	add_filter( 'enter_title_here', 'cymolthemes_duplexo_cmt_client_enter_title_here' );




	// Move Featured Image box from left to center only on CLIENTS custom_post_type
	add_action('do_meta_boxes', 'cymolthemes_duplexo_cmt_client_featured_image_box');
	function cymolthemes_duplexo_cmt_client_featured_image_box() {
		remove_meta_box( 'postimagediv', 'cmt_client', 'normal' );
		add_meta_box('postimagediv', esc_attr__('Select/Upload Image of the Client','cmtte'), 'post_thumbnail_meta_box', 'cmt_client', 'normal', 'high');
	}



	
}
add_action( 'init', 'cymolthemes_duplexo_cpt_cmt_client', 8 );





// Show Featured image in the admin section
add_filter( 'manage_cmt_client_posts_columns', 'cymolthemes_cmt_client_set_featured_image_column' );
add_action( 'manage_cmt_client_posts_custom_column' , 'cymolthemes_cmt_client_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'cymolthemes_cmt_client_set_featured_image_column' ) ) {
function cymolthemes_cmt_client_set_featured_image_column($columns) {
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
if ( ! function_exists( 'cymolthemes_cmt_client_set_featured_image_column_content' ) ) {
function cymolthemes_cmt_client_set_featured_image_column_content( $column, $post_id ) {
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
if ( ! function_exists( 'cymolthemes_duplexo_cmt_client_metabox_options' ) ) {
function cymolthemes_duplexo_cmt_client_metabox_options( $options ) {
	

	
	// Client Details Meta Box
	$options[]    = array(
		'id'        => 'cymolthemes_clients_details',
		'title'     => esc_attr__('Duplexo: Client Details', 'cmtte'),
		'post_type' => 'cmt_client', // only here is important
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cymolthemes_clients',
				'fields' => array(
		
					array(
						'id'     		=> 'clienturl',
						'type'    		=> 'text',
						'title'   		=> esc_attr__('Website Link', 'cmtte'),
						'after'  		=> '<div class="cs-text-muted"><br>'.__("(Optional) Please fill person or company's website link", 'cmtte').'</div>',
					),
				),
			),
		),
	);
	return $options;
}
}

if( function_exists('cs_framework_init') ){
	add_filter( 'cs_metabox_options', 'cymolthemes_duplexo_cmt_client_metabox_options' );
}