<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

$duplexo_theme_options		   = get_option('duplexo_theme_options');
$pf_cat_title_singular     = ( !empty($duplexo_theme_options['pf_cat_title_singular']) ) ? esc_attr($duplexo_theme_options['pf_cat_title_singular']) : esc_attr__('Portfolio Category', 'duplexo') ;
$team_group_title_singular = ( !empty($duplexo_theme_options['team_group_title_singular']) ) ? esc_attr($duplexo_theme_options['team_group_title_singular']) : esc_attr__('Team Group', 'duplexo') ;



// Taxonomy Options
$cmt_taxonomy_options     = array();


// For Portfolio Category
$cmt_taxonomy_options[]   = array(
	'id'       => 'cmt_taxonomy_options',
	'taxonomy' => 'cmt_portfolio_category', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'duplexo'),
			'after' => '<p>' . sprintf( esc_attr__('Paste featured image URL for this %s. Please upload the image first from media section.', 'duplexo'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'duplexo'),
				'frame_title'  => esc_attr__('Select an image', 'duplexo'),
				'insert_title' => esc_attr__('Use this image', 'duplexo'),
			),
		),
	),
);

// For Team Group
$cmt_taxonomy_options[]   = array(
	'id'       => 'cmt_taxonomy_options',
	'taxonomy' => 'cmt_team_group', // category, post_tag or your custom taxonomy name
	'fields'   => array(
		array(
			'id'            => 'tax_featured_image',
			'type'          => 'upload',
			'title' => esc_attr__('Featured Image URL', 'duplexo'),
			'after' => '<p>' . sprintf( esc_attr__('Paste featured image URL for this %s. Please upload the image first from media section.', 'duplexo'), $pf_cat_title_singular ) . '</p>',
			'settings'      => array(
				'upload_type'  => 'image',
				'button_title' => esc_attr__('Upload', 'duplexo'),
				'frame_title'  => esc_attr__('Select an image', 'duplexo'),
				'insert_title' => esc_attr__('Use this image', 'duplexo'),
			),
		),
	),
);
