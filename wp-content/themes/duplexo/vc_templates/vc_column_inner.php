<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $el_id
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_Inner
 */
$el_class = $width = $el_id = $css = $offset = '';
$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ),
	'wpb_column',
	'cmt-column-inner',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_col-has-fill';
}


/**** CymolThemes custom changes START ****/

$cmt_customdiv 	= '';
$cmt_class_list 	= '';
$cmt_classes 	= array();
if( !empty($cmt_textcolor) ){
	$cmt_classes[] = 'cmt-textcolor-'.$cmt_textcolor;
}
if( !empty($cmt_bgcolor) || cymolthemes_check_if_bgcolor_in_css($css) ){
	$cmt_classes[] = 'cmt-col-bgcolor-'.$cmt_bgcolor;
	$cmt_classes[] = 'cmt-col-bgcolor-yes';
	$cmt_customdiv = '<div class="cmt-col-wrapper-bg-layer cmt-bg-layer"><div class="cmt-bg-layer-inner"></div></div>';
}
if( strpos($css, 'url(') !== false ) {
	$cmt_classes[] = 'cmt-col-bgimage-yes';
	$cmt_customdiv = '<div class="cmt-col-wrapper-bg-layer cmt-bg-layer"><div class="cmt-bg-layer-inner"></div></div>';
}
if( !empty($cmt_shadow) ){ // Shadow
	$cmt_classes[] = 'cmt-sboxcolum-shadow-box-inner';
}
if( !empty($cmt_zindex) ){
	if( $cmt_zindex=='zero' ){ $cmt_zindex='0'; }
	$css_classes[] = 'cmt-zindex-'.$cmt_zindex;
}
$cmt_classes[] 	= cymolthemes_responsive_padding_margin_class( $cmt_responsive_css );
$cmt_class_list = implode( ' ', $cmt_classes );

/**** CymolThemes custom changes End ****/


/**** CymolThemes custom changes START ****/
if( !empty($reduce_extra_padding) ){
	$css_classes[] = 'margin-15px-' . esc_attr($reduce_extra_padding) . '-colum';
}
/**** CymolThemes custom changes END ****/



$wrapper_attributes = array();

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

/***** Modified by CymolThemes - START *****/
?>

<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<div class="vc_column-inner <?php echo esc_attr( trim( vc_shortcode_custom_css_class( $css ) ). ' ' . cymolthemes_sanitize_html_classes( $cmt_class_list ) ); ?>">
		<?php echo cymolthemes_wp_kses($cmt_customdiv); // Added by CymolThemes  ?> 
		<div class="wpb_wrapper">
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>

<?php
/***** Modified by CymolThemes - END *****/



/**** Added by CymolThemes - code start ****/
$customStyle = '';
if(trim($css)!= ''){
	// Inline css
	global $cymolthemes_inline_css;
	if( empty($cymolthemes_inline_css) ){
		$cymolthemes_inline_css = '';
	}
	// background image layer
	$new_bgimage_element    = vc_shortcode_custom_css_class( $css, '' ). ' > .cmt-col-wrapper-bg-layer';
	$newCSS   			    = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
	$cymolthemes_inline_css .= cymolthemes_vc_get_bg_css_only( $newCSS );
	
	// background color layer
	$new_bgimage_element2   = vc_shortcode_custom_css_class( $css, '' ). ' > .cmt-col-wrapper-bg-layer > .cmt-bg-layer-inner';
	$newCSS2   			    = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element2,$css );
	$cymolthemes_inline_css .= cymolthemes_vc_get_bg_css_only( $newCSS2, 'nobg' );
	
}

// Responsive padding margin option values
if( !empty($cmt_responsive_css) ){

		global $cymolthemes_inline_css;
		if( empty($cymolthemes_inline_css) ){
			$cymolthemes_inline_css = '';
		}
		$cymolthemes_inline_css .= cymolthemes_responsive_padding_margin( $cmt_responsive_css, '.cmt-column-inner>' );
}
	
/**** Added by CymolThemes - code end ****/