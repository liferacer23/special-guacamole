<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'cymolthemes_vcSetAsTheme' );
function cymolthemes_vcSetAsTheme() {
	vc_set_as_theme();
	if( function_exists('vc_set_default_editor_post_types') ){
		vc_set_default_editor_post_types(array('page', 'cmt_portfolio', 'cmt_team_member', 'cmt_service'));
	}
}

/** ------------------------------------------------------ **/
/**                  Shared Library start                  **/
class cymolthemes_VcSharedLibrary {
	// Here we will store plugin wise (shared) settings. Colors, Locations, Sizes, etc...
	/**
	 * @var array
	 */
	public static $colors = array(
		'[Skin Color]' => 'skincolor',
		'Blue' => 'blue',
		'Turquoise' => 'turquoise',
		'Pink' => 'pink',
		'Violet' => 'violet',
		'Peacoc' => 'peacoc',
		'Chino' => 'chino',
		'Mulled Wine' => 'mulled_wine',
		'Vista Blue' => 'vista_blue',
		'Black' => 'black',
		'Grey' => 'grey',
		'Orange' => 'orange',
		'Sky' => 'sky',
		'Green' => 'green',
		'Juicy pink' => 'juicy_pink',
		'Sandy brown' => 'sandy_brown',
		'Purple' => 'purple',
		'White' => 'white'
	);

	/**
	 * @var array
	 */
	public static $predefined_text_colors = array(
		'Grey'       => 'grey',
		'Dark Grey'  => 'darkgrey',
		'White'      => 'white',
		'Skin Color' => 'skincolor'
	);
	
	/**
	 * @var array
	 */
	public static $predefined_bg_colors = array(
		'Grey'       => 'grey',
		'Dark Grey'  => 'darkgrey',
		'White'      => 'white',
		'Skin Color' => 'skincolor'
	);
	
	/**
	 * @var array
	 */
	public static $icons = array(
		'Glass' => 'glass',
		'Music' => 'music',
		'Search' => 'search'
	);

	/**
	 * @var array
	 */
	public static $sizes = array(
		'Mini' => 'xs',
		'Small' => 'sm',
		'Normal' => 'md',
		'Large' => 'lg'
	);

	/**
	 * @var array
	 */
	public static $button_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'3D' => '3d',
		'Square Outlined' => 'square_outlined'
	);

	/**
	 * @var array
	 */
	public static $message_box_styles = array(
		'Standard' => 'standard',
		'Solid' => 'solid',
		'Solid icon' => 'solid-icon',
		'Outline' => 'outline',
		'3D' => '3d',
	);

	/**
	 * Toggle styles
	 * @var array
	 */
	public static $toggle_styles = array(
		'Default' => 'default',
		'Simple' => 'simple',
		'Round' => 'round',
		'Round Outline' => 'round_outline',
		'Rounded' => 'rounded',
		'Rounded Outline' => 'rounded_outline',
		'Square' => 'square',
		'Square Outline' => 'square_outline',
		'Arrow' => 'arrow',
		'Text Only' => 'text_only',
	);

	/**
	 * Animation styles
	 * @var array
	 */
	public static $animation_styles = array(
		'Bounce' => 'easeOutBounce',
		'Elastic' => 'easeOutElastic',
		'Back' => 'easeOutBack',
		'Cubic' => 'easeinOutCubic',
		'Quint' => 'easeinOutQuint',
		'Quart' => 'easeOutQuart',
		'Quad' => 'easeinQuad',
		'Sine' => 'easeOutSine'
	);

	/**
	 * @var array
	 */
	public static $cta_styles = array(
		'Rounded' => 'rounded',
		'Square' => 'square',
		'Round' => 'round',
		'Outlined' => 'outlined',
		'Square Outlined' => 'square_outlined'
	);

	/**
	 * @var array
	 */
	public static $txt_align = array(
		'Left' => 'left',
		'Right' => 'right',
		'Center' => 'center',
		'Justify' => 'justify'
	);

	/**
	 * @var array
	 */
	public static $el_widths = array(
		'100%' => '',
		'90%' => '90',
		'80%' => '80',
		'70%' => '70',
		'60%' => '60',
		'50%' => '50',
		'40%' => '40',
		'30%' => '30',
		'20%' => '20',
		'10%' => '10'
	);

	/**
	 * @var array
	 */
	public static $sep_widths = array(
		'1px' => '',
		'2px' => '2',
		'3px' => '3',
		'4px' => '4',
		'5px' => '5',
		'6px' => '6',
		'7px' => '7',
		'8px' => '8',
		'9px' => '9',
		'10px' => '10'
	);

	/**
	 * @var array
	 */
	public static $sep_styles = array(
		'Border' => '',
		'Dashed' => 'dashed',
		'Dotted' => 'dotted',
		'Double' => 'double',
		'Shadow' => 'shadow'
	);

	/**
	 * @var array
	 */
	public static $box_styles = array(
		'Default' => '',
		'Rounded' => 'vc_box_rounded',
		'Border' => 'vc_box_border',
		'Outline' => 'vc_box_outline',
		'Shadow' => 'vc_box_shadow',
		'Bordered shadow' => 'vc_box_shadow_border',
		'3D Shadow' => 'vc_box_shadow_3d'
	);

	/**
	 * Round box styles
	 *
	 * @var array
	 */
	public static $round_box_styles = array(
		'Round' => 'vc_box_circle',
		'Round Border' => 'vc_box_border_circle',
		'Round Outline' => 'vc_box_outline_circle',
		'Round Shadow' => 'vc_box_shadow_circle',
		'Round Border Shadow' => 'vc_box_shadow_border_circle'
	);

	/**
	 * Circle box styles
	 *
	 * @var array
	 */
	public static $circle_box_styles = array(
		'Circle' => 'vc_box_circle_2',
		'Circle Border' => 'vc_box_border_circle_2',
		'Circle Outline' => 'vc_box_outline_circle_2',
		'Circle Shadow' => 'vc_box_shadow_circle_2',
		'Circle Border Shadow' => 'vc_box_shadow_border_circle_2'
	);

	/**
	 * @return array
	 */
	public static function cymolthemes_getColors() {
		return self::$colors;
	}
	
	/**
	 * @return array
	 */
	public static function cymolthemes_getPreTextColors() {
		return self::$predefined_text_colors;
	}
	
	/**
	 * @return array
	 */
	public static function cymolthemes_getPreBgColors() {
		return self::$predefined_bg_colors;
	}
	
	/**
	 * @return array
	 */
	public static function cymolthemes_getIcons() {
		return self::$icons;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getSizes() {
		return self::$sizes;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getButtonStyles() {
		return self::$button_styles;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getMessageBoxStyles() {
		return self::$message_box_styles;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getToggleStyles() {
		return self::$toggle_styles;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getAnimationStyles() {
		return self::$animation_styles;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getCtaStyles() {
		return self::$cta_styles;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getTextAlign() {
		return self::$txt_align;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getBorderWidths() {
		return self::$sep_widths;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getElementWidths() {
		return self::$el_widths;
	}

	/**
	 * @return array
	 */
	public static function cymolthemes_getSeparatorStyles() {
		return self::$sep_styles;
	}

	/**
	 * Get list of box styles
	 *
	 * Possible $groups values:
	 * - default
	 * - round
	 * - circle
	 *
	 * @param array $groups Array of groups to include. If not specified, return all
	 *
	 * @return array
	 */
	public static function cymolthemes_getBoxStyles( $groups = array() ) {
		$list = array();
		$groups = (array) $groups;

		if ( ! $groups || in_array( 'default', $groups ) ) {
			$list += self::$box_styles;
		}

		if ( ! $groups || in_array( 'round', $groups ) ) {
			$list += self::$round_box_styles;
		}

		if ( ! $groups || in_array( 'cirlce', $groups ) ) {
			$list += self::$circle_box_styles;
		}

		return $list;
	}

	public static function cymolthemes_getColorsDashed() {
		$colors = array(
			esc_attr__( '[Skin Color]', 'duplexo' ) => 'skincolor',
			esc_attr__( 'Blue', 'duplexo' ) => 'blue',
			esc_attr__( 'Turquoise', 'duplexo' ) => 'turquoise',
			esc_attr__( 'Pink', 'duplexo' ) => 'pink',
			esc_attr__( 'Violet', 'duplexo' ) => 'violet',
			esc_attr__( 'Peacoc', 'duplexo' ) => 'peacoc',
			esc_attr__( 'Chino', 'duplexo' ) => 'chino',
			esc_attr__( 'Mulled Wine', 'duplexo' ) => 'mulled-wine',
			esc_attr__( 'Vista Blue', 'duplexo' ) => 'vista-blue',
			esc_attr__( 'Black', 'duplexo' ) => 'black',
			esc_attr__( 'Grey', 'duplexo' ) => 'grey',
			esc_attr__( 'Orange', 'duplexo' ) => 'orange',
			esc_attr__( 'Sky', 'duplexo' ) => 'sky',
			esc_attr__( 'Green', 'duplexo' ) => 'green',
			esc_attr__( 'Juicy pink', 'duplexo' ) => 'juicy-pink',
			esc_attr__( 'Sandy brown', 'duplexo' ) => 'sandy-brown',
			esc_attr__( 'Purple', 'duplexo' ) => 'purple',
			esc_attr__( 'White', 'duplexo' ) => 'white'
		);

		return $colors;
	}
}

/**
 * @param string $asset
 *
 * @return array
 */
function cymolthemes_getVcShared( $asset = '' ) {
	switch ( $asset ) {
		case 'colors':
			return cymolthemes_VcSharedLibrary::cymolthemes_getColors();
			break;

		case 'pre-text-colors':
			return cymolthemes_VcSharedLibrary::cymolthemes_getPreTextColors();
			
		case 'pre-bg-colors':
			return cymolthemes_VcSharedLibrary::cymolthemes_getPreBgColors();
			
		case 'colors-dashed':
			return cymolthemes_VcSharedLibrary::cymolthemes_getColorsDashed();
			break;

		case 'icons':
			return cymolthemes_VcSharedLibrary::cymolthemes_getIcons();
			break;

		case 'sizes':
			return cymolthemes_VcSharedLibrary::cymolthemes_getSizes();
			break;

		case 'button styles':
		case 'alert styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getButtonStyles();
			break;
		case 'message_box_styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getMessageBoxStyles();
			break;
		case 'cta styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getCtaStyles();
			break;

		case 'text align':
			return cymolthemes_VcSharedLibrary::cymolthemes_getTextAlign();
			break;

		case 'cta widths':
		case 'separator widths':
			return cymolthemes_VcSharedLibrary::cymolthemes_getElementWidths();
			break;

		case 'separator styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getSeparatorStyles();
			break;

		case 'separator border widths':
			return cymolthemes_VcSharedLibrary::cymolthemes_getBorderWidths();
			break;

		case 'single image styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getBoxStyles();
			break;

		case 'single image external styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getBoxStyles( array( 'default', 'round' ) );
			break;

		case 'toggle styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getToggleStyles();
			break;

		case 'animation styles':
			return cymolthemes_VcSharedLibrary::cymolthemes_getAnimationStyles();
			break;

		default:
			# code...
			break;
	}

	return '';
}

global $cymolthemes_pixel_icons;
$cymolthemes_pixel_icons = array(
	array( 'vc_pixel_icon vc_pixel_icon-alert' => esc_attr__( 'Alert', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-info' => esc_attr__( 'Info', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-tick' => esc_attr__( 'Tick', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-explanation' => esc_attr__( 'Explanation', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-address_book' => esc_attr__( 'Address book', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-alarm_clock' => esc_attr__( 'Alarm clock', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-anchor' => esc_attr__( 'Anchor', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-application_image' => esc_attr__( 'Application Image', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-arrow' => esc_attr__( 'Arrow', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-asterisk' => esc_attr__( 'Asterisk', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-hammer' => esc_attr__( 'Hammer', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon' => esc_attr__( 'Balloon', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_buzz' => esc_attr__( 'Balloon Buzz', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_facebook' => esc_attr__( 'Balloon Facebook', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-balloon_twitter' => esc_attr__( 'Balloon Twitter', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-battery' => esc_attr__( 'Battery', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-binocular' => esc_attr__( 'Binocular', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_excel' => esc_attr__( 'Document Excel', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_image' => esc_attr__( 'Document Image', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_music' => esc_attr__( 'Document Music', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_office' => esc_attr__( 'Document Office', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_pdf' => esc_attr__( 'Document PDF', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_powerpoint' => esc_attr__( 'Document Powerpoint', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-document_word' => esc_attr__( 'Document Word', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-bookmark' => esc_attr__( 'Bookmark', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camcorder' => esc_attr__( 'Camcorder', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-camera' => esc_attr__( 'Camera', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart' => esc_attr__( 'Chart', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-chart_pie' => esc_attr__( 'Chart pie', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-clock' => esc_attr__( 'Clock', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-fire' => esc_attr__( 'Fire', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-heart' => esc_attr__( 'Heart', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-mail' => esc_attr__( 'Mail', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-play' => esc_attr__( 'Play', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-shield' => esc_attr__( 'Shield', 'duplexo' ) ),
	array( 'vc_pixel_icon vc_pixel_icon-video' => esc_attr__( 'Video', 'duplexo' ) ),
);

/*
 *  GLOBAL: Carousel Options
 */
function cymolthemes_box_params($boxtype=''){
	
	$boxview = array(
		esc_attr__('Row and Column','duplexo')  => 'default',
		esc_attr__('Carousel effect','duplexo') => 'carousel',
	);
	
	// CSS Animation
	$vc_map_add_css_animation = vc_map_add_css_animation();
	$vc_map_add_css_animation['group'] = esc_attr__( 'Box Design', 'duplexo' );
	
	if( $boxtype=='blog' ){
		// Nothing to do
	}


	// Testimonial changes for box option
	$std_column  = 'three';
	$std_boxview = 'default';
	if( $boxtype == 'testimonial' ){
		$std_column  = 'one';
		$std_boxview = 'carousel';
	}
	
	$boxOprions = array(
		
		array(
			"type"        => "dropdown",
			"heading"     => esc_attr__("Column", "duplexo"),
			"param_name"  => "column",
			"description" => esc_attr__("Select column.", "duplexo"),
			"value"       => array(
				esc_attr__("One Column",    "duplexo") => "one",
				esc_attr__("Two Columns",   "duplexo") => "two",
				esc_attr__("Three Columns", "duplexo") => "three",
				esc_attr__("Four Columns",  "duplexo") => "four",
				esc_attr__("Five Columns",  "duplexo") => "five",
				esc_attr__("Six Columns",   "duplexo") => "six",
			),
			'std'         => esc_attr($std_column),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
		),
		array(
			"type"        => "dropdown",
			"holder"      => "div",
			"class"       => "",
			"heading"     => esc_attr__("Box View",'duplexo'),
			"description" => esc_attr__("Select box view. Show as normal row and column or show with carousel effect.",'duplexo'),
			"param_name"  => "boxview",
			"value"       => $boxview,
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'std'         => esc_attr($std_boxview),
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Timeline: Group by', 'duplexo' ),
			'param_name' => 'timeline_groupby',
			'value'      => array(
				esc_attr__( 'Monthly grouping', 'duplexo' ) => 'monthly',
				esc_attr__( 'Yearly grouping', 'duplexo' )  => 'yearly'
			),
			'description' => esc_attr__( 'Timeline: Show timeline view in which group by.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Timeline: Box view', 'duplexo' ),
			'param_name' => 'timeline_boxview',
			'value'      => array(
				esc_attr__( 'Simple view - without featured image', 'duplexo' ) => 'simple',
				esc_attr__( 'Simple view - with featured image', 'duplexo' )    => 'simple_with_fetured',
				esc_attr__( 'Box view', 'duplexo' )                             => 'box',
			),
			'description' => esc_attr__( 'Timeline: Show timeline view in which group by.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'timeline' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'monthly',
		),
		
		
		/*** Carousel Options start ***/		
		
		// speed
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Carousel: Transaction speed', 'duplexo' ),
			'param_name'  => 'carousel_speed',
			'description' => esc_attr__( 'Carousel Effect: Slide/Fade animation speed.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1500',
		),
		
		// Auto Play
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Autoplay', 'duplexo' ),
			'param_name' => 'carousel_autoplay',
			'value'      => array(
				esc_attr__( 'Yes', 'duplexo' ) => '1',
				esc_attr__( 'No', 'duplexo' )  => '0'
			),
			'description' => esc_attr__( 'Carousel Effect: Enable/disable Autoplay', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// autoplaySpeed
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Carousel: autoplaySpeed', 'duplexo' ),
			'param_name'  => 'carousel_autoplayspeed',
			'description' => esc_attr__( 'Carousel Effect: autoplay speed. Inert numbers only. Default value is "4500".', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '4500',
		),
		
		// loop
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Loop Item', 'duplexo' ),
			'param_name' => 'carousel_loop',
			'value'      => array(
				esc_attr__( 'No', 'duplexo' )  => '0',
				esc_attr__( 'Yes', 'duplexo' ) => '1',
			),
			'description' => esc_attr__( 'Carousel Effect: Infinite loop sliding.', 'duplexo' ).'<br><strong>'.esc_attr__( 'NOTE:', 'duplexo' ).' </strong> '.esc_attr__( 'If you select NO than the carousel will rewind all and start from 1st item. Also this will work if you enabled "Autoplay".', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// Dots
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: dots', 'duplexo' ),
			'param_name' => 'carousel_dots',
			'value'      => array(
				esc_attr__('No', 'duplexo')  => '0',
				esc_attr__('Yes', 'duplexo') => '1',
				
			),
			'description' => esc_attr__( 'Carousel Effect: Show dots navigation.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		// Next/Prev links
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Next/Prev Arrows', 'duplexo' ),
			'param_name' => 'carousel_nav',
			'value'      => array(
				esc_attr__('Above Carousel', 'duplexo')       => 'above',
				esc_attr__('below Carousel', 'duplexo')       => 'below',
				esc_attr__('Before / After boxes', 'duplexo') => '1',
				esc_attr__('Hide', 'duplexo')                 => 'hide',
				
			),
			'description' => esc_attr__( 'Carousel Effect: Show dots navigation.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'above',
		),
		
		// centerMode
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: centerMode', 'duplexo' ),
			'param_name' => 'carousel_centermode',
			'value'      => array(
				esc_attr__('No', 'duplexo')  => '0',
				esc_attr__('Yes', 'duplexo') => '1',
				
			),
			'description' => esc_attr__( 'Enables centered view with partial prev/next slides. Use with odd numbered slidesToShow counts.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		
		// centerPadding
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Carousel: centerPadding', 'duplexo' ),
			'param_name'  => 'carousel_centerpadding',
			'description' => esc_attr__( 'Carousel center effect padding.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'carousel_centermode',
				'value'     => array( '1'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '300',
		),
		
		// pauseOnFocus
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: pauseOnFocus', 'duplexo' ),
			'param_name' => 'carousel_pauseonfocus',
			'value'      => array(
				esc_attr__('Yes', 'duplexo') => '1',
				esc_attr__('No', 'duplexo')  => '0',
			),
			'description' => esc_attr__( 'Carousel Effect: Pause Autoplay On Focus.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '0',
		),
		
		// pauseOnHover
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: pauseOnHover', 'duplexo' ),
			'param_name' => 'carousel_pauseonhover',
			'value'      => array(
				esc_attr__('Yes', 'duplexo') => '1',
				esc_attr__('No', 'duplexo')  => '0',
			),
			'description' => esc_attr__( 'Carousel Effect: Pause on mouse hover.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => '1',
		),
		
		// 
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: slidesToScroll', 'duplexo' ),
			'param_name' => 'carousel_slidestoscroll',
			'value'      => array(
				esc_attr__( '1 Slide', 'duplexo' )        => '1',
				esc_attr__( 'Same as column', 'duplexo' ) => 'column',
			),
			'description' => esc_attr__( '# of slides to scroll.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel' ),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'column',
		),
		// Box trasaction effect
		array(
			'type'       => 'dropdown',
			'heading'    => esc_attr__( 'Carousel: Box transaction effect', 'duplexo' ),
			'param_name' => 'carousel_effecttype',
			'value'      => array(
				esc_attr__( 'Slide', 'duplexo' )  => 'slide',
				esc_attr__( 'fade', 'duplexo' )   => 'fade',
			),
			'description' => esc_attr__( 'Select Fade or Slide effect for carousel.', 'duplexo' ) . '<br><strong>' . esc_attr__( 'NOTE:', 'duplexo' ) . esc_attr__( 'The FADE effect will work with one column view only.', 'duplexo' ) . '</strong>',
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
			'dependency'  => array(
				'element'   => 'boxview',
				'value'     => array( 'carousel', 'slickview','slickview-leftimg','slickview-bottomimg'),
			),
			'edit_field_class' => 'vc_col-sm-6 vc_column',
			'std'              => 'slide',
		),		
		
		$vc_map_add_css_animation,
		
		array(
			'type'        => 'textfield',
			'heading'     => esc_attr__( 'Extra class name', 'duplexo' ),
			'param_name'  => 'el_class',
			'description' => esc_attr__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'duplexo' ),
			'group'       => esc_attr__( 'Box Design', 'duplexo' ),
		),
		
	);
	
	return $boxOprions;
}

/**
 *  GLOBAL: Heading Options in Visual Composer element
 */
function cymolthemes_vc_heading_params($data=''){
	$h2_custom_heading = vc_map_integrate_shortcode( 'cmt-custom-heading', 'h2_', esc_attr__( 'Heading', 'duplexo' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h2',
			'value'   => 'true',
		)
	);
	

	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h2_custom_heading ) && ! empty( $h2_custom_heading ) ) {
		foreach ( $h2_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h2_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}

	$h4_custom_heading = vc_map_integrate_shortcode( 'cmt-custom-heading', 'h4_', esc_attr__( 'Subheading', 'duplexo' ),
		array(
			'exclude' => array(
				'text',
				'source',
				'css',
				'el_class',
			),
		),
		array(
			'element' => 'use_custom_fonts_h4',
			'value' => 'true',
		)
	);

	// This is needed to remove custom heading _tag and _align options.
	if ( is_array( $h4_custom_heading ) && ! empty( $h4_custom_heading ) ) {
		foreach ( $h4_custom_heading as $key => $param ) {
			if ( is_array( $param ) && isset( $param['type'] ) && $param['type'] == 'font_container' ) {
				if ( isset( $param['settings'] ) && is_array( $param['settings'] ) && isset( $param['settings']['fields'] ) ) {
					$sub_key = array_search( 'tag', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['tag'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['tag'] );
					}
					$sub_key = array_search( 'text_align', $param['settings']['fields'] );
					if ( false !== $sub_key ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields'][ $sub_key ] );
					} else if ( isset( $param['settings']['fields']['text_align'] ) ) {
						unset( $h4_custom_heading[ $key ]['settings']['fields']['text_align'] );
					}
				}
			}
		}
	}
		
	$params = array_merge(
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_attr__( 'Heading', 'duplexo' ),
				'admin_label' => true,
				'param_name'  => 'h2',
				'save_always' => true,
				'value'       => esc_attr__( 'Welcome', 'duplexo' ),
				'description' => esc_attr__( 'Enter text for heading line.', 'duplexo' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type' => 'checkbox',
				'heading' => esc_attr__( 'Use custom font?', 'duplexo' ),
				'param_name' => 'use_custom_fonts_h2',
				'description' => esc_attr__( 'Enable Google fonts.', 'duplexo' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),

		),
		$h2_custom_heading,
		array(
			array(
				'type'             => 'textfield',
				'heading'          => esc_attr__( 'Subheading', 'duplexo' ),
				'param_name'       => 'h4',
				'description'      => esc_attr__( 'Enter text for subheading line.', 'duplexo' ),
				'edit_field_class' => 'vc_col-sm-9 vc_column',
			),
			array(
				'type'             => 'checkbox',
				'heading'          => esc_attr__( 'Use custom font?', 'duplexo' ),
				'param_name'       => 'use_custom_fonts_h4',
				'description'      => esc_attr__( 'Enable custom font option.', 'duplexo' ),
				'edit_field_class' => 'vc_col-sm-3 vc_column',
			),
		),
		$h4_custom_heading,
		array(
			array(
				'type'        => 'dropdown',
				'heading'     => esc_attr__( 'Text alignment', 'duplexo' ),
				'param_name'  => 'txt_align',
				'value'       => cymolthemes_getVcShared( 'text align' ), // default left
				'description' => esc_attr__( 'Select text alignment.', 'duplexo' ),
				'std'         => 'left',
			),
		)
	);
	
	
	// Setting default font settings.. Make sure you change this when change default value in Redux Options
	$i = 0;
	foreach( $params as $param ){
		$param_name = (isset($param['param_name'])) ? $param['param_name'] : '' ;
		if( $param_name == 'h2_google_fonts' ){
			$params[$i]['std'] = 'font_family:Arimo%3Aregular%2Citalic%2C700%2C700italic|font_style:700%20bold%20regular%3A700%3Anormal';
		} else if( $param_name == 'h4_google_fonts' ){
			$params[$i]['std'] = 'font_family:Lato%3A100%2C100italic%2C300%2C300italic%2Cregular%2Citalic%2C700%2C700italic%2C900%2C900italic|font_style:300%20light%20regular%3A300%3Anormal';
		}
		$i++;
	}; // Foreach
	
	return $params;
}

function cymolthemes_vc_ele_extra_class_option(){
	
	$return = array(
		'type'        => 'textfield',
		'heading'     => esc_attr__( 'Extra class name', 'duplexo' ),
		'param_name'  => 'el_class',
		'description' => esc_attr__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'duplexo' )
	);
			
	return $return;
			
}

function cymolthemes_vc_ele_css_editor_option(){
	
	$return = array(
		'type'       => 'css_editor',
		'heading'    => esc_attr__( 'CSS box', 'duplexo' ),
		'param_name' => 'css',
		'group'      => esc_attr__( 'Design Options', 'duplexo' )
	);
			
	return $return;
			
}

function cymolthemes_responsive_padding_margin_option( $for=''){
	$return = array(
		"type"			=> "cymolthemes_responsive_editor",
		"heading"		=> esc_attr__("Responsive Screen Padding/Margin Options", "duplexo"),
		"description"	=> esc_attr__("You can manage padding/margin from here. For different screen sizes", "duplexo"),
		"param_name"	=> "cmt_responsive_css",
		'group'			=> esc_attr__( 'Responsive Screen Padding/Margin Options', 'duplexo' ),
	);
	
	if( $for=='column' ){
		$return['break_column_option'] = 'no';
	}
	
	return $return;
}

/**
 * @param $value
 *
 * @since 4.2
 * @return array
 */
function cymolthemes_vc_build_link( $value ) {
	return cymolthemes_vc_parse_multi_attribute( $value, array( 'url' => '', 'title' => '', 'target' => '' ) );
}

/**
 * Parse string like "title:Hello world|weekday:Monday" to array('title' => 'Hello World', 'weekday' => 'Monday')
 *
 * @param $value
 * @param array $default
 *
 * @since 4.2
 * @return array
 */
function cymolthemes_vc_parse_multi_attribute( $value, $default = array() ) {
	$result = $default;
	$params_pairs = explode( '|', $value );
	if ( ! empty( $params_pairs ) ) {
		foreach ( $params_pairs as $pair ) {
			$param = preg_split( '/\:/', $pair );
			if ( ! empty( $param[0] ) && isset( $param[1] ) ) {
				$result[ $param[0] ] = rawurldecode( $param[1] );
			}
		}
	}

	return $result;
}

 /*
 * Enqueue icon element font
 * @todo move to separate folder
 * @since 4.4
 *
 * @param $font
 */
function cymolthemes_vc_icon_element_fonts_enqueue( $font ) {
	switch ( $font ) {
		case 'themify':
			wp_enqueue_style( 'themify' );  // added by CymolThemes
			break;
		case 'fontawesome':
		default:
			wp_enqueue_style( 'font-awesome' );
			break;
		case 'linecons':
			wp_enqueue_style( 'vc_linecons' );
			break;
	}
}

function cymolthemes_getStyles( $el_class, $css, $google_fonts_data, $font_container_data, $atts ) {
	$styles = array();
	if ( ! empty( $font_container_data ) && isset( $font_container_data['values'] ) ) {
		foreach ( $font_container_data['values'] as $key => $value ) {
			if ( 'tag' !== $key && strlen( $value ) ) {
				if ( preg_match( '/description/', $key ) ) {
					continue;
				}
				if ( 'font_size' === $key || 'line_height' === $key ) {
					$value = preg_replace( '/\s+/', '', $value );
				}
				if ( 'font_size' === $key ) {
					$pattern = '/^(\d*(?:\.\d+)?)\s*(px|\%|in|cm|mm|em|rem|ex|pt|pc|vw|vh|vmin|vmax)?$/';
					// allowed metrics: http://www.w3schools.com/cssref/css_units.asp
					$regexr = preg_match( $pattern, $value, $matches );
					$value = isset( $matches[1] ) ? (float) $matches[1] : (float) $value;
					$unit = isset( $matches[2] ) ? $matches[2] : 'px';
					$value = $value . $unit;
				}
				if ( strlen( $value ) > 0 ) {
					$styles[] = str_replace( '_', '-', $key ) . ': ' . $value;
				}
			}
		}
	}
	if ( ( ! isset( $atts['use_theme_fonts'] ) || 'yes' !== $atts['use_theme_fonts'] ) && ! empty( $google_fonts_data ) && isset( $google_fonts_data['values'], $google_fonts_data['values']['font_family'], $google_fonts_data['values']['font_style'] ) ) {
		$google_fonts_family = explode( ':', $google_fonts_data['values']['font_family'] );
		$styles[] = 'font-family:' . $google_fonts_family[0];
		$google_fonts_styles = explode( ':', $google_fonts_data['values']['font_style'] );
		$styles[] = 'font-weight:' . $google_fonts_styles[1];
		$styles[] = 'font-style:' . $google_fonts_styles[2];
	}

	/**
	 * Filter 'VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG' to change vc_custom_heading class
	 *
	 * @param string - filter_name
	 * @param string - element_class
	 * @param string - shortcode_name
	 * @param array - shortcode_attributes
	 *
	 * @since 4.3
	 */
	$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_custom_heading ' . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

	return array(
		'css_class' => trim( preg_replace( '/\s+/', ' ', $css_class ) ),
		'styles' => $styles,
	);
}

function cmt_vc_get_css_color( $prefix, $color ) {
	$rgb_color = preg_match( '/rgba/', $color ) ? preg_replace( array(
		'/\s+/',
		'/^rgba\((\d+)\,(\d+)\,(\d+)\,([\d\.]+)\)$/',
	), array(
		'',
		'rgb($1,$2,$3)',
	), $color ) : $color;
	$string = $prefix . ':' . $rgb_color . ';';
	if ( $rgb_color !== $color ) {
		$string .= $prefix . ':' . $color . ';';
	}

	return $string;
}

function cymolthemes_getCSSAnimation( $css_animation ) {
	$output = '';
	if ( '' !== $css_animation ) {
		wp_enqueue_script( 'waypoints' );
		wp_enqueue_script( 'vc_waypoints' );
		wp_enqueue_style( 'animate-css' );
		$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation . ' ' . $css_animation;
	}

	return $output;
}

/**
 * @param $el_class
 *
 * @return string
 */
function cymolthemes_getExtraClass( $el_class ) {
	$output = '';
	if ( '' !== $el_class ) {
		$output = ' ' . str_replace( '.', '', $el_class );
	}

	return $output;
}

/**
 * @param $param_value
 * @param string $prefix
 *
 * @since 4.2
 * @return string
 */
if( !function_exists('cymolthemes_vc_shortcode_custom_css_class') ){
function cymolthemes_vc_shortcode_custom_css_class( $param_value, $prefix = '' ) {
	$css_class = preg_match( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', $param_value ) ? $prefix . preg_replace( '/\s*\.([^\{]+)\s*\{\s*([^\}]+)\s*\}\s*/', '$1', $param_value ) : '';
	return $css_class;
}
}

/**
 *  Check if Background color is available in css code
 */
if( !function_exists('cymolthemes_check_if_bgcolor_in_css') ){
function cymolthemes_check_if_bgcolor_in_css( $css ) {
	$return = false;
	
	if( !empty($css) ){
		$css_array = explode('{', $css);
		$css_array = $css_array[1];
		$css_array = str_replace('}','', $css_array );
		$css_array = explode( ';', $css_array );
		if( is_array($css_array) && count($css_array)>0 ){
			foreach( $css_array as $css_rule ){
				if ( substr( $css_rule, 0, 11 ) == 'background:' ) {
					$css_rule = explode( ':', $css_rule );
					$css_rule = $css_rule[1];
					$css_rule = explode( ' ', $css_rule );
					$css_rule = array_filter($css_rule);
					
					foreach( $css_rule as $rule ){
						if( substr($rule, 0, 1)=='#' || substr($rule, 0, 4)=='rgb(' || substr($rule, 0, 5)=='rgba(' ){
							$return = true;
						}
						
					}
					
				} else if ( substr( $css_rule, 0, 17 ) == 'background-color:' ) {
					$return = true;
				}
			}
		}
		
	}
	
	return $return;
}
}

/**                  Shared Library end                    **/
/** ------------------------------------------------------ **/