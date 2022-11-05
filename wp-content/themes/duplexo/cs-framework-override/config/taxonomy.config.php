<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if( !isset($cmt_taxonomy_options) ){
	include( get_template_directory() .'/cs-framework-override/config/taxonomy-options.php' );
}

CSFramework_Taxonomy::instance( $cmt_taxonomy_options );
