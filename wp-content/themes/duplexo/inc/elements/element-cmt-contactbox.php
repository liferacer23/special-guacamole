<?php

/* Options */

$params = array(
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Address",'duplexo'),
		"description" => esc_attr__("Write address here. You can write in multi-line too.",'duplexo'),
		"param_name"  => "address",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Phone",'duplexo'),
		"description" => esc_attr__("Write phone number here. Example: (+01) 123 456 7890",'duplexo'),
		"param_name"  => "phone",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Email",'duplexo'),
		"description" => esc_attr__("Write email here. Example: info@example.com",'duplexo'),
		"param_name"  => "email",
	),
	array(
		"type"        => "textfield",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Website",'duplexo'),
		"description" => esc_attr__("Write website URL here. Example: http://www.example.com",'duplexo'),
		"param_name"  => "website",
	),
	array(
		"type"        => "textarea",
		"holder"      => "div",
		"class"       => "",
		"heading"     => esc_attr__("Time",'duplexo'),
		"description" => esc_attr__("Write time here. You can write in multi-line too.",'duplexo'),
		"param_name"  => "time",
	),
);

$params    = array_merge( $params, array( vc_map_add_css_animation() ), array( cymolthemes_vc_ele_extra_class_option() ), array( cymolthemes_vc_ele_css_editor_option() ) );

global $cmt_sc_params_contactbox;
$cmt_sc_params_contactbox = $params;

vc_map( array(
	"name"     => esc_attr__("CymolThemes Contact Details Box",'duplexo'),
	"base"     => "cmt-sboxcontactbox",
	"class"    => "",
	'category' => esc_attr__( 'CymolThemes Special Elements', 'duplexo' ),
	"icon"     => "icon-cymolthemes-vc",
	"params"   => $params
) );