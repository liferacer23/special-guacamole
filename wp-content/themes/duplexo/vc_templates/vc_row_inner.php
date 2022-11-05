<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css
 * @var $el_id
 * @var $equal_height
 * @var $content_placement
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Row_Inner
 */
$el_class = $equal_height = $content_placement = $css = $el_id = '';
$disable_element = '';
$output = $after_output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$el_class = $this->getExtraClass( $el_class );
$css_classes = array(
	'cmt-row-inner',
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_inner',
	'vc_row-fluid',
	$el_class,
	vc_shortcode_custom_css_class( $css ),
	cymolthemes_responsive_padding_margin_class( $cmt_responsive_css ),  // Added by CymolThemes
);
if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( vc_shortcode_custom_css_has_property( $css, array(
	'border',
	'background',
) ) ) {
	$css_classes[] = 'vc_row-has-fill';
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}


/**** CymolThemes custom changes START ****/
if( !empty($cmt_responsive_css) ){
	$cmt_responsive_css_array = explode('|',$cmt_responsive_css);
	
	if( !empty($cmt_responsive_css_array[1]) && $cmt_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		$css_classes[] = 'break-1200-colum';
	}
	
	if( !empty($cmt_responsive_css_array[10]) && $cmt_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$css_classes[] = 'break-991-colum';
	}
	
	if( !empty($cmt_responsive_css_array[19]) && $cmt_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$css_classes[] = 'break-767-colum';
	}
	
	if( !empty($cmt_responsive_css_array[29]) && $cmt_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$css_classes[] = 'break-custom-colum';
	}
}
/**** CymolThemes custom changes END ******/



/**** CymolThemes custom changes START ****/
if( !empty($break_in_responsive) ){
	$css_classes[] = 'break-' . esc_attr($break_in_responsive) . '-colum';
}
if( !empty($cmt_shadow) ){ // Shadow
	$css_classes[] = 'cmt-shadow-row';
}
if( !empty($cmt_zindex) ){
	if( $cmt_zindex=='zero' ){ $cmt_zindex='0'; }
	$css_classes[] = 'cmt-zindex-'.$cmt_zindex;
}
/**** CymolThemes custom changes END ******/


$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

// Responsive padding margin option values
if( !empty($cmt_responsive_css) ){
	global $cymolthemes_inline_css;
	if( empty($cymolthemes_inline_css) ){
		$cymolthemes_inline_css = '';
	}
	$cymolthemes_inline_css .= cymolthemes_responsive_padding_margin( $cmt_responsive_css , '.cmt-row-inner' );
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';

/***** Modified by CymolThemes - START *****/
?>

<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<?php echo wpb_js_remove_wpautop( $content ); ?>
</div>
<?php echo esc_attr($after_output); ?>

<?php
/***** Modified by CymolThemes - END *****/


