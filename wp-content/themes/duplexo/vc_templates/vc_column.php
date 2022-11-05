<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_id
 * @var $el_class
 * @var $width
 * @var $css
 * @var $offset
 * @var $content - shortcode content
 * @var $css_animation
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column
 */
$el_class = $el_id = $width = $parallax_speed_bg = $parallax_speed_video = $parallax = $parallax_image = $video_bg = $video_bg_url = $video_bg_parallax = $css = $offset = $css_animation = '';

/**** CymolThemes custom changes START ****/
$cmt_textcolor = $cmt_bgcolor = $cmt_col_bg_expand = '';
/**** CymolThemes custom changes END ****/

$output = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

wp_enqueue_script( 'wpb_composer_front_js' );

$width = wpb_translateColumnWidthToSpan( $width );
$width = vc_column_offset_class_merge( $offset, $width );

$css_classes = array(
	$this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation ),
	'wpb_column',
	'cmt-column',
	'vc_column_container',
	$width,
);

if ( vc_shortcode_custom_css_has_property( $css, array(
		'border',
		'background',
	) ) || $video_bg || $parallax
) {
	$css_classes[] = 'vc_col-has-fill';
}


/**** CymolThemes custom changes START ****/
$cmt_bg_pos_class = '';
$cmt_customdiv 	 = '';
$cmt_class_list 	 = '';
$cmt_classes 	 = array();

$if_minus_margin = cymolthemes_check_if_minus_margin($css);
if( $if_minus_margin == true ) {
	$css_classes[] = 'cmt-overlap-row';
}
if( !empty($cmt_textcolor) ){
	$cmt_classes[] = 'cmt-textcolor-'.$cmt_textcolor;
}
if( !empty($cmt_bgimage_position) ){
	$cmt_bg_pos_class = 'cmt-bgimage-position-'.$cmt_bgimage_position;
}

if( !empty($cmt_bgcolor) || cymolthemes_check_if_bgcolor_in_css($css) ){
	$cmt_classes[] = 'cmt-col-bgcolor-'.$cmt_bgcolor;
	$cmt_classes[] = 'cmt-col-bgcolor-yes';
	$cmt_customdiv = '<div class="cmt-col-wrapper-bg-layer cmt-bg-layer '.$cmt_bg_pos_class.'"><div class="cmt-bg-layer-inner"></div></div>';
}
if( strpos($css, 'url(') !== false || !empty($parallax_image) ) {
	$cmt_classes[] = 'cmt-col-bgimage-yes';
	$cmt_customdiv = '<div class="cmt-col-wrapper-bg-layer cmt-bg-layer '.$cmt_bg_pos_class.'"><div class="cmt-bg-layer-inner"></div></div>';
}

$cmt_classes[]	= cymolthemes_responsive_padding_margin_class( $cmt_responsive_css );
if( !empty($cmt_responsive_css) ){
	$cmt_responsive_css_array = explode('|',$cmt_responsive_css);
	
	if( !empty($cmt_responsive_css_array[1]) && $cmt_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		$cmt_classes[] = 'break-1200-colum';
	}
	
	if( !empty($cmt_responsive_css_array[10]) && $cmt_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$cmt_classes[] = 'break-991-colum';
	}
	
	if( !empty($cmt_responsive_css_array[19]) && $cmt_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$cmt_classes[] = 'break-767-colum';
	}
	
	if( !empty($cmt_responsive_css_array[29]) && $cmt_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$cmt_classes[] = 'break-custom-colum';
	}
}

if( !empty($cmt_col_bg_expand) && in_array( $cmt_col_bg_expand, array('left','right') ) ){  // Left expand or Right expand
	$css_classes[] = 'cmy-span cmt-sbox' . $cmt_col_bg_expand . '-span';
}
if( !empty($cmt_shadow) ){ // Shadow
	$css_classes[] = 'cmt-sboxcolum-shadow-box';
}
if( !empty($cmt_zindex) ){
	if( $cmt_zindex=='zero' ){ $cmt_zindex='0'; }
	$css_classes[] = 'cmt-zindex-'.$cmt_zindex;
}
$cmt_class_list = implode( ' ', $cmt_classes );

/**** CymolThemes custom changes End ****/


/**** CymolThemes custom changes START ****/
$cmt_classes		= array();
$cmt_classes[]	= cymolthemes_responsive_padding_margin_class( $cmt_responsive_css );  // Added by CymolThemes

if( !empty($cmt_responsive_css) ){
	$cmt_responsive_css_array = explode('|',$cmt_responsive_css);
	
	if( !empty($cmt_responsive_css_array[1]) && $cmt_responsive_css_array[1]=='colbreak_yes' ){ // 1200
		$cmt_classes[] = 'cmt-break-col-1200';
	}
	
	if( !empty($cmt_responsive_css_array[10]) && $cmt_responsive_css_array[10]=='colbreak_yes' ){  // 991
		$cmt_classes[] = 'cmt-break-col-991';
	}
	
	if( !empty($cmt_responsive_css_array[19]) && $cmt_responsive_css_array[19]=='colbreak_yes' ){  // 767
		$cmt_classes[] = 'cmt-break-col-767';
	}
	
	if( !empty($cmt_responsive_css_array[29]) && $cmt_responsive_css_array[29]=='colbreak_yes' ){  // custom
		$cmt_classes[] = 'cmt-break-col-custom';
	}
}
/**** CymolThemes custom changes END ******/


/**** CymolThemes custom changes START ****/
if( !empty($reduce_extra_padding) ){
	$css_classes[] = 'margin-15px-' . esc_attr($reduce_extra_padding) . '-colum';
}
/**** CymolThemes custom changes END ****/




$wrapper_attributes = array();

$has_video_bg = ( ! empty( $video_bg ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) );

$parallax_speed = $parallax_speed_bg;
if ( $has_video_bg ) {
	$parallax = $video_bg_parallax;
	$parallax_speed = $parallax_speed_video;
	$parallax_image = $video_bg_url;
	$css_classes[] = 'vc_video-bg-container';
	wp_enqueue_script( 'vc_youtube_iframe_api_js' );
}

if ( ! empty( $parallax ) ) {
	wp_enqueue_script( 'vc_jquery_skrollr_js' );
	$wrapper_attributes[] = 'data-vc-parallax="' . esc_attr( $parallax_speed ) . '"'; // parallax speed
	$css_classes[] = 'vc_general vc_parallax vc_parallax-' . $parallax;
	if ( false !== strpos( $parallax, 'fade' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fade';
		$wrapper_attributes[] = 'data-vc-parallax-o-fade="on"';
	} elseif ( false !== strpos( $parallax, 'fixed' ) ) {
		$css_classes[] = 'js-vc_parallax-o-fixed';
	}
}

if ( ! empty( $parallax_image ) ) {
	if ( $has_video_bg ) {
		$parallax_image_src = $parallax_image;
	} else {
		$parallax_image_id = preg_replace( '/[^\d]/', '', $parallax_image );
		$parallax_image_src = wp_get_attachment_image_src( $parallax_image_id, 'full' );
		if ( ! empty( $parallax_image_src[0] ) ) {
			$parallax_image_src = $parallax_image_src[0];
		}
	}
	$wrapper_attributes[] = 'data-vc-parallax-image="' . esc_attr( $parallax_image_src ) . '"';
}
if ( ! $parallax && $has_video_bg ) {
	$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
}

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( $css_classes ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

?>


<div <?php echo implode( ' ', $wrapper_attributes ); ?>>
	<div class="vc_column-inner <?php echo sanitize_html_class( trim( vc_shortcode_custom_css_class( $css ) ) ) . ' ' . cymolthemes_sanitize_html_classes( $cmt_class_list ); ?>">
		<?php echo trim($cmt_customdiv);  // Added by CymolThemes ?>
		<div class="wpb_wrapper">
			<?php echo wpb_js_remove_wpautop( $content ); ?>
		</div>
	</div>
</div>



<?php
/* Added by CymolThemes - code start */
$customStyle = '';
if(trim($css)!= ''){
	/***********************************/
	// Inline css
	global $cymolthemes_inline_css;
	if( empty($cymolthemes_inline_css) ){
		$cymolthemes_inline_css = '';
	}
	
	// background image layer
	$new_bgimage_element = vc_shortcode_custom_css_class( $css, '' ). ' > .cmt-col-wrapper-bg-layer';
	$newCSS   			 = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element,$css );
	$cymolthemes_inline_css   .= cymolthemes_vc_get_bg_css_only( $newCSS );
	
	// background color layer
	$new_bgimage_element2 = vc_shortcode_custom_css_class( $css, '' ). ' > .cmt-col-wrapper-bg-layer > .cmt-bg-layer-inner';
	$newCSS2   			  = str_replace( vc_shortcode_custom_css_class( $css, '' ),$new_bgimage_element2,$css );
	$cymolthemes_inline_css    .= cymolthemes_vc_get_bg_css_only( $newCSS2, 'nobg' );
	/************************************/	
}

// Responsive padding margin option values
if( !empty($cmt_responsive_css) ){

		global $cymolthemes_inline_css;
		if( empty($cymolthemes_inline_css) ){
			$cymolthemes_inline_css = '';
		}
		$cymolthemes_inline_css .= cymolthemes_responsive_padding_margin( $cmt_responsive_css, '.cmt-column>' );
}
	
/* Added by CymolThemes - code end */
