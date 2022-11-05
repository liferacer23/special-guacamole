<?php

/* ------------------------- */
/* --- VC Shared Library --- */
require_once get_template_directory().'/inc/elements/vc-shared.php';

/* ------------------------- */
/* --- VC Shared Library --- */
require_once get_template_directory().'/inc/elements/vc-extras.php';

/* ------------------------- */
/* ---   VC Templates    --- */
require_once get_template_directory().'/inc/elements/vc-templates.php';

/* -------------------- */
/* --- Element List --- */

// cmt_custom_heading
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_custom_heading' );
function cymolthemes_vc_custom_element_custom_heading(){ get_template_part('inc/elements/element-cmt','custom-heading'); }

// cymolthemes_icon
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_icon' );
function cymolthemes_vc_custom_element_icon(){ get_template_part('inc/elements/element-cmt','icon'); }

// cymolthemes_btn
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_btn' );
function cymolthemes_vc_custom_element_btn(){ get_template_part('inc/elements/element-cmt','btn'); }

// cymolthemes_cta
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_cta' );
function cymolthemes_vc_custom_element_cta(){ get_template_part('inc/elements/element-cmt','cta'); }

// cymolthemes_heading
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_heading' );
function cymolthemes_vc_custom_element_heading(){ get_template_part('inc/elements/element-cmt','heading'); }

// cymolthemes_servicebox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_servicebox' );
function cymolthemes_vc_custom_element_servicebox(){ get_template_part('inc/elements/element-cmt','servicebox'); }

// cymolthemes_progress_bar
add_action( 'vc_after_init', 'cymolthemes_vc_progress_bar' );
function cymolthemes_vc_progress_bar(){ get_template_part('inc/elements/element-cmt','progress-bar'); }

// cymolthemes_attach_image
add_action( 'vc_after_init', 'cymolthemes_vc_single_image' );
function cymolthemes_vc_single_image(){ get_template_part('inc/elements/element-cmt','single-image'); }

// cymolthemes_blogbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_blogbox' );
function cymolthemes_vc_custom_element_blogbox(){ get_template_part('inc/elements/element-cmt','blogbox'); }

// cymolthemes_portfoliobox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_portfoliobox' );
function cymolthemes_vc_custom_element_portfoliobox(){ get_template_part('inc/elements/element-cmt','portfoliobox'); }

// cymolthemes_portfoliobox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_servicesbox' );
function cymolthemes_vc_custom_element_servicesbox(){ get_template_part('inc/elements/element-cmt','servicesbox'); }

// cymolthemes_teambox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_teambox' );
function cymolthemes_vc_custom_element_teambox(){ get_template_part('inc/elements/element-cmt','teambox'); }

// cymolthemes_testimonialbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_testimonialbox' );
function cymolthemes_vc_custom_element_testimonialbox(){ get_template_part('inc/elements/element-cmt','testimonialbox'); }

// cymolthemes_clientsbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_clientsbox' );
function cymolthemes_vc_custom_element_clientsbox(){ get_template_part('inc/elements/element-cmt','clientsbox'); }

// cymolthemes_eventsbox
if( class_exists('Tribe__Events__Main') ){
	add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_eventsbox' );
	function cymolthemes_vc_custom_element_eventsbox(){ get_template_part('inc/elements/element-cmt','eventsbox'); }
}

// cymolthemes_facts_in_digits
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_facts_in_digits' );
function cymolthemes_vc_custom_element_facts_in_digits(){ get_template_part('inc/elements/element-cmt','facts-in-digits'); }

// cmt_static_contentbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_featureplan_contentbox' );
function cymolthemes_vc_custom_element_featureplan_contentbox(){ get_template_part('inc/elements/element-cmt','static-contentbox'); }

// cymolthemes_twitterbox
if( function_exists('latest_tweets_render') ){
	add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_twitterbox' );
	function cymolthemes_vc_custom_element_twitterbox(){ get_template_part('inc/elements/element-cmt','twitterbox'); }
}

// cymolthemes_contactbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_contactbox' );
function cymolthemes_vc_custom_element_contactbox(){ get_template_part('inc/elements/element-cmt','contactbox'); }

// cymolthemes_list
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_list' );
function cymolthemes_vc_custom_element_list(){ get_template_part('inc/elements/element-cmt','list'); }

// cymolthemes_socialbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_socialbox' );
function cymolthemes_vc_custom_element_socialbox(){ get_template_part('inc/elements/element-cmt','socialbox'); }

// cymolthemes_pricelistbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_pricelistbox' );
function cymolthemes_vc_custom_element_pricelistbox(){ get_template_part('inc/elements/element-cmt','pricelistbox'); }

// cmt-sboxpricing-table
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_pricingtable' );
function cymolthemes_vc_custom_element_pricingtable(){ get_template_part('inc/elements/element-cmt','pricing-table'); }

// cmt-processbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_static_contentbox' );
function cymolthemes_vc_custom_element_static_contentbox(){ get_template_part('inc/elements/element-cmt','processbox'); }

// cmt-processbox
add_action( 'vc_after_init', 'cymolthemes_vc_custom_element_stepbox' );
function cymolthemes_vc_custom_element_stepbox(){ get_template_part('inc/elements/element-cmt','stepbox'); }