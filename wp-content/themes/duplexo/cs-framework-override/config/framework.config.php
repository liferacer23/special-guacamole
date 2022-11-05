<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

if( !isset($cmt_framework_settings) || !isset($cmt_framework_options) ){
	include( get_template_directory() .'/cs-framework-override/config/framework-options.php' );
}

CSFramework::instance( $cmt_framework_settings, $cmt_framework_options );
