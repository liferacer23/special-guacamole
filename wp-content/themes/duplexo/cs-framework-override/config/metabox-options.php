<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.

/**
 *  Meta Boxes
 */
$cmt_metabox_options = array();


/************************* Common Meta Boxes *****************************/



// Slier Area metabox options array
$slider_list_array = array();
$slider_list_array[''] = esc_attr__('No Slider', 'duplexo');
if ( class_exists( 'RevSlider' ) )    { $slider_list_array['revslider']   = esc_attr__('Slider Revolution', 'duplexo'); }
if ( function_exists('layerslider') ) { $slider_list_array['layerslider'] = esc_attr__('Layer Slider', 'duplexo'); }
$slider_list_array['custom']   = esc_attr__('Custom Slider', 'duplexo');

$cmt_metabox_slider_area = array(
	array(
		'id'      	=> 'slidertype',
		'type'   	=> 'radio',
		'title'		=> esc_attr__('Select Slider Type', 'duplexo'),
		'desc'    	=> '<div class="cs-text-muted">'.esc_attr__('Select slider which you want to show on this page. The slider will appear in header area.', 'duplexo').'</div>',
		'options'	=> $slider_list_array,
		'default' 	 => '',
	)
);
$cmt_metabox_slider_area[] = array(
	'id'      	 => 'revslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'duplexo'),
	'after'    	 => ( cymolthemes_revslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="cmt-sboxno-slider-message">'.esc_attr__('No slider found. Plesae create slider from Slider Revolution section.', 'duplexo') . '<br><a href="'. admin_url( 'admin.php?page=revslider' ) .'">' . esc_attr__('Click here to go to Slider Revolution section and create your first slider or import demo slider.', 'duplexo') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Revolution Slider. The slider will appear in header area.', 'duplexo').'</div>',
	'options' 	 => cymolthemes_revslider_array(),
	'dependency' => array( 'slidertype_revslider', '==', 'true' ),
);
$cmt_metabox_slider_area[] = array(
	'id'      	 => 'layerslider',
	'type'   	 => 'select',
	'title'		 => esc_attr__('Select Slider', 'duplexo'),
	'after'    	 => ( cymolthemes_layerslider_array(true)==0 ) ? '<div class="cs-text-muted"><div class="cmt-sboxno-slider-message">'.esc_attr__('No slider found. Plesae create slider from Layer Slider section.', 'duplexo') . '<br><a href="'. admin_url( 'admin.php?page=layerslider' ) .'">' . esc_attr__('Click here to go to Layer Slider section and create your first slider or import demo slider.', 'duplexo') . '</a></div></div>' : '<div class="cs-text-muted">'.esc_attr__('Select slider created in Layer Slider. The slider will appear in header area.', 'duplexo').'</div>',
	'options' 	 => cymolthemes_layerslider_array(),
	'dependency' => array( 'slidertype_layerslider', '==', 'true' ),
);
$cmt_metabox_slider_area[] = array(
	'id'       	 => 'customslider',
	'type'     	 => 'textarea',
	'title'    	 => esc_attr__('Custom Slider code', 'duplexo'),
	'shortcode'	 => true,
	'after'  	 => '<div class="cs-text-muted">'.esc_attr__('You can paste custom slider shortcode or HTML code here. The output code will appear in header area.', 'duplexo').'</div>',
	'dependency' => array( 'slidertype_custom', '==', 'true' ),// Multiple dependency
);
$cmt_metabox_slider_area[] = array(
	'id'         => 'slider_width',
	'type'       => 'select',
	'title'      => esc_attr__('Boxed or Wide Slider', 'duplexo'),
	'info'       => esc_attr__('Select slider width.', 'duplexo'),
	'options'    => array(
		'wide'      => esc_attr__('Wide Slider', 'duplexo'),
		'boxed'     => esc_attr__('Boxed Slider', 'duplexo'),
	),
	'default'    => 'wide',
	'dependency' => array( 'slidertype_', '!=', 'true' ),// Multiple dependency
);






// Background metabox options array
$cmt_metabox_background = array(
	array(
		'id'      => 'custom_background_switcher',
		'title'   => esc_attr__('Custom Background', 'duplexo'),
		'type'    => 'switcher',
		'default' => false,
		'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'duplexo').'</div>',
	),
	array(
		'id'		 => 'custom_background',
		'type'		 => 'cymolthemes_background',
		'title'		 => esc_attr__('Body Background Properties', 'duplexo'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for main body. This is for main outer body background. For "Boxed" layout only', 'duplexo').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
	array(
		'id'		 => 'custom_inner_background',
		'type'		 => 'cymolthemes_background',
		'title'		 => esc_attr__('Content Area Background Properties', 'duplexo'),
		'after'		 => '<div class="cs-text-muted">'.esc_attr__('Set background for content area', 'duplexo').'</div>',
		'dependency' => array( 'custom_background_switcher', '==', 'true' ),// Multiple dependency
	),
);






// Topbar metabox options array
$cmt_metabox_topbar = array(
	array(
		'id'      => 'show_topbar',
		'type'    => 'select',
		'title'   => esc_attr__('Show Topbar', 'duplexo'),
		'info'    => esc_attr__('For this page only.', 'duplexo'),
		'options' => array(
			''      => esc_attr__('Global', 'duplexo'),
			'yes'   => esc_attr__('Yes, show Topbar', 'duplexo'),
			'no'    => esc_attr__('No, hide Topbar', 'duplexo'),
		),
		'default' => '',
	),
	array(
		'id'     	 => 'topbar_bg_color',
		'type'   	 => 'select',
		'title'  	 => esc_attr__('Background Color', 'duplexo'),
		'info'   	 => esc_attr__('Please select color for background', 'duplexo'),
		'options' 	 => array(
			''           => esc_attr__('Global', 'duplexo'),
			'darkgrey'   => esc_attr__('Dark grey', 'duplexo'),
			'grey'       => esc_attr__('Grey', 'duplexo'),
			'white'      => esc_attr__('White', 'duplexo'),
			'skincolor'  => esc_attr__('Skincolor', 'duplexo'),
			'custom'     => esc_attr__('Custom Color', 'duplexo'),
		),
		'default'	 => '',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'		 => 'topbar_bg_custom_color',
		'type'		 => 'color_picker',
		'title'		 => esc_attr__('Select Background Color', 'duplexo'),
		'default'	 => '#dd3333',
		'dependency' => array( 'show_topbar|topbar_bg_color', '!=|==', 'no|custom' ),
	),
	array(
		'id'		 => 'topbar_text_color',
		'type'		 => 'select',
		'title'		 => esc_attr__('Text Color', 'duplexo'),
		'info'		 => esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option.', 'duplexo'),
		'options'	 => array(
			''          => esc_attr__('Global', 'duplexo'),
			'white'     => esc_attr__('White', 'duplexo'),
			'dark'      => esc_attr__('Dark', 'duplexo'),
			'skincolor' => esc_attr__('Skin Color', 'duplexo'),
			'custom'    => esc_attr__('Custom color', 'duplexo'),
		),
		'default' 	 => esc_attr__('Global', 'duplexo'),
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_text_custom_color',
		'type'       => 'color_picker',
		'title'      => esc_attr__('Custom Text Color', 'duplexo' ),
		'default'    => 'rgba(0, 0, 255, 0.25)',
		'dependency' => array( 'show_topbar|topbar_text_color', '!=|==', 'no|custom' ),//Multiple dependency
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Please select custom color for text', 'duplexo').'</div>',
	),
	array(
		'id'       	 => 'topbar_left_text',
		'type'     	 => 'textarea',
		'title'    	 =>  esc_attr__('Topbar Left Content (overwrite default text)', 'duplexo'),
		'shortcode'	 => true,
		'after'  	 => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for left area. This will overwrite default text set in Theme Options', 'duplexo').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
	array(
		'id'         => 'topbar_right_text',
		'type'       => 'textarea',
		'title'      =>  esc_attr__('Topbar Right Content (overwrite default text)', 'duplexo'),
		'shortcode'  => true,
		'after'      => '<div class="cs-text-muted">'.esc_attr__('Add content for Topbar text for right area. This will overwrite default text set in Theme Options', 'duplexo').'</div>',
		'dependency' => array( 'show_topbar', '!=', 'no' ),// Multiple dependency
	),
);





// Titlebar metabox options array
$cmt_metabox_titlebar = array(
	array(
		'id'       			=> 'hide_titlebar',
		'type'      		=> 'checkbox',
		'title'         	=> esc_attr__('Hide Titlebar', 'duplexo'),
		'label'		        =>  esc_attr__( 'YES, Hide the Titlebar', 'duplexo' ),
		'after'   			=> '<div class="cs-text-muted">'.esc_attr__('If you want to hide Titlebar than check this option', 'duplexo').'</div>',
	),
	array(
		'id'		   		=> 'title',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Title', 'duplexo'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Replace current page title with this title. So Search results will show the original page title and the page will show this title', 'duplexo').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		   		=> 'subtitle',
		'type'     			=> 'textarea',
		'title'    		 	=>  esc_attr__('Page Subtitle', 'duplexo'),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('(Optional) Please fill page subtitle', 'duplexo').'</div>',
		'dependency'        => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Background Options', 'duplexo'),
		'after'  	  	 => '<small>'.esc_attr__('Background options for Titlebar area', 'duplexo').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'		 => 'titlebar_bg_custom_options',
		'type'		 => 'select',
		'title'		 =>  esc_attr__('Titlebar Background Options', 'duplexo'),
		'options'	 => array(
			''       	=> esc_attr__('Use global settings', 'duplexo'),
			'custom' 	=> esc_attr__('Set custom settings', 'duplexo'),
		),
		'default'	 => '',
		'after'		 => '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'duplexo').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_bg_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Background Color', 'duplexo'),
		'options'  => array(
			''           => esc_attr__('Global', 'duplexo'),
			'darkgrey'   => esc_attr__('Dark grey', 'duplexo'),
			'grey'       => esc_attr__('Grey', 'duplexo'),
			'white'      => esc_attr__('White', 'duplexo'),
			'skincolor'  => esc_attr__('Skincolor', 'duplexo'),
			'custom'     => esc_attr__('Custom Color', 'duplexo'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select predefined color for Titlebar background color', 'duplexo').'</div>',
		'dependency'    => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),//Multiple dependency
	),
	array(
		'id'      		=> 'titlebar_background',
		'type'    		=> 'cymolthemes_background',
		'title'  		=> esc_attr__('Titlebar Background Properties', 'duplexo' ),
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Set background for Title bar. You can set color or image and also set other background related properties', 'duplexo').'</div>',
		'color'			=> true,
		'dependency'   => array( 'hide_titlebar|titlebar_bg_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Font Settings', 'duplexo'),
		'after'  	  	 => '<small>'.esc_attr__('Font Settings for different elements in Titlebar area', 'duplexo').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_font_custom_options',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Font Options', 'duplexo'),
		'options'  => array(
						''       => esc_attr__('Use global settings', 'duplexo'),
						'custom' => esc_attr__('Set custom settings', 'duplexo'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select "Ude global settings" to load global font settings.', 'duplexo').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),// Multiple dependency
	),
	array(
		'id'            => 'titlebar_text_color',
		'type'          => 'select',
		'title'         =>  esc_attr__('Titlebar Text Color', 'duplexo'),
		'options'  => array(
						'white'  => esc_attr__('White', 'duplexo'),
						'dark'   => esc_attr__('Dark', 'duplexo'),
						'custom' => esc_attr__('Custom Color', 'duplexo'),
					),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('Select <code>Dark</code> color if you are going to select light color in above option', 'duplexo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_heading_font',
		'type'           => 'cymolthemes_typography', 
		'title'          => esc_attr__('Heading Font', 'duplexo'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for heading in Titlebar', 'duplexo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_subheading_font',
		'type'           => 'cymolthemes_typography', 
		'title'          => esc_attr__('Sub-heading Font', 'duplexo'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for sub-heading in Titlebar', 'duplexo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	array(
		'id'             => 'titlebar_breadcrumb_font',
		'type'           => 'cymolthemes_typography', 
		'title'          => esc_attr__('Breadcrumb Font', 'duplexo'),
		'chosen'         => false,
		'text-align'     => false,
		'google'         => true, // Disable google fonts. Won't work if you haven't defined your google api key
		'font-backup'    => true, // Select a backup non-google font in addition to a google font
		'subsets'        => false, // Only appears if google is true and subsets not set to false
		'line-height'    => true,
		'text-transform' => true,
		'word-spacing'   => false, // Defaults to false
		'letter-spacing' => true, // Defaults to false
		'color'          => true,
		'all-varients'   => false,
		'units'       => 'px', // Defaults to px
		'default'     => array(
			"family"      => "Arimo",
			"font"        => "google",  // "google" OR "websafe"
			"font-backup" => "'Trebuchet MS', Helvetica, sans-serif",
			"font-weight" => "400",
			"font-size"   => "14",
			"line-height" => "16",
			"color"       => "#202020"
		),
		'after'  	=> '<div class="cs-text-muted"><br>'.esc_attr__('Select font family, size etc. for breadcrumbs in Titlebar', 'duplexo').'</div>',
		'dependency'=> array( 'hide_titlebar|titlebar_font_custom_options', '!=|!=', ''.true|'custom' ),// Multiple dependency
	),
	
	
	array(
		'type'       	 => 'heading',
		'content'    	 => esc_attr__('Titlebar Content Options', 'duplexo'),
		'after'  	  	 => '<small>'.esc_attr__('Content options for Titlebar area', 'duplexo').'</small>',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            	=> 'titlebar_view',
		'type'          	=> 'select',
		'title'         	=>  esc_attr__('Titlebar Text Align', 'duplexo'),
		'options'       	=> array (
						''         => esc_attr__('Global', 'duplexo'),
						'default'  => esc_attr__('All Center', 'duplexo'),
						'left'     => esc_attr__('Title Left / Breadcrumb Right', 'duplexo'),
						'right'    => esc_attr__('Title Right / Breadcrumb Left', 	'duplexo'),
						'allleft'  => esc_attr__('All Left', 'duplexo'),
						'allright' => esc_attr__('All Right', 'duplexo'),
		),
		'default'	 => '',
		'after'  			=> '<div class="cs-text-muted">'.esc_attr__('Select text align in Titlebar', 'duplexo').'</div>',
		'dependency' => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'     		 => 'titlebar_height',
		'type'   		 => 'number',
		'title'          => esc_attr__( 'Titlebar Height', 'duplexo' ),
		'after'  	  	 => '<div class="cs-text-muted"><br>'.esc_attr__('Set height of the Titlebar. In pixel only', 'duplexo').'</div>',
		'default'		 => '',
		'after'   		 => ' px',
		'dependency'     => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	array(
		'id'            => 'titlebar_hide_breadcrumb',
		'type'          => 'select',
		'title'         =>  esc_attr__('Hide Breadcrumb', 'duplexo'),
		'options'  => array(
						''     => esc_attr__('Global', 'duplexo'),
						'no'   => esc_attr__('NO, show the breadcrumb', 'duplexo'),
						'yes'  => esc_attr__('YES, Hide the Breadcrumb', 'duplexo'),
		),
		'default'       => '',
		'after'  		=> '<div class="cs-text-muted"><br>'.esc_attr__('You can show or hide the breadcrumb', 'duplexo').'</div>',
		'dependency'    => array( 'hide_titlebar', '!=', true ),//Multiple dependency
	),
	
	
);


// Other Options
$cmt_other_options =  array(
	array(
		'id'     		 	=> 'skincolor',
		'type'   		 	=> 'color_picker',
		'title'  		 	=> esc_attr__('Skin Color', 'duplexo' ),
		'after'  		 	=> '<div class="cs-text-muted">'.esc_attr__('Select Skin Color for this page only. This will override Skin color set under "Theme Options" section. ', 'duplexo').'<br><br> <strong>' . esc_attr__( 'NOTE: ' ,'duplexo') . '</strong> ' . esc_attr__( 'Leave this empty to use "Skin Color" set in the "Theme Options" directly. ' ,'duplexo') . '</div>',
	),
);









/**** Metabox options - Sidebar ****/

// Getting custom sidebars 
$all_sidebars = cymolthemes_get_all_registered_sidebars();



$cmt_metabox_sidebar = array(
	array(
		'id'       => 'sidebar',
		'title'    => esc_attr__('Select Sidebar Position', 'duplexo'),
		'type'     => 'image_select',
		'options'  => array(
			''          => get_template_directory_uri() . '/inc/images/layout_default.png',
			'no'        => get_template_directory_uri() . '/inc/images/layout_no_side.png',
			'left'      => get_template_directory_uri() . '/inc/images/layout_left.png',
			'right'     => get_template_directory_uri() . '/inc/images/layout_right.png',
			'both'      => get_template_directory_uri() . '/inc/images/layout_both.png',
			'bothleft'  => get_template_directory_uri() . '/inc/images/layout_left_both.png',
			'bothright' => get_template_directory_uri() . '/inc/images/layout_right_both.png',
		),
		'default'  => '',
	),
	array(
		'id'      => 'left_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Left Sidebar', 'duplexo'),
		'options' => $all_sidebars,
		'default' => '',
	),
	array(
		'id'      => 'right_sidebar',
		'type'    => 'select',
		'title'   => esc_attr__('Select Right Sidebar', 'duplexo'),
		'options' => $all_sidebars,
		'default' => '',
	),
);



// Getting name of CPT from Theme Options
$duplexo_theme_options		  = get_option('duplexo_theme_options');
$pf_type_title_singular   = ( !empty($duplexo_theme_options['pf_type_title_singular']) ) ? $duplexo_theme_options['pf_type_title_singular'] : 'Portfolio' ;
$service_type_title_singular   = ( !empty($duplexo_theme_options['service_type_title_singular']) ) ? $duplexo_theme_options['service_type_title_singular'] : 'Service' ;
$team_type_title_singular = ( !empty($duplexo_theme_options['team_type_title_singular']) ) ? $duplexo_theme_options['team_type_title_singular'] : 'Team Member' ;


// CPT list
$cmt_cpt_list = array(
	'page'           => esc_attr__('Page', 'duplexo'),
	'post'           => esc_attr__('Post', 'duplexo'),
	'cmt_portfolio'   => esc_attr($pf_type_title_singular),
	'cmt_service'   => esc_attr($service_type_title_singular),
	'cmt_team_member' => esc_attr($team_type_title_singular),
	'cmt_testimonial' => esc_attr__('Testimonials', 'duplexo'),
);

// Foreach loop
foreach( $cmt_cpt_list as $cpt_id=>$cpt_name ){
	
	$cmt_metabox_options[] = array(
		'id'        => '_cymolthemes_metabox_group',
		'title'     => sprintf( esc_attr__('Duplexo - %s Single view Elements Options', 'duplexo'), $cpt_name ),
		'post_type' => $cpt_id,
		'context'   => 'normal',
		'priority'  => 'default',
		'sections'  => array(
		
		
			array(
				'name'   => '_cymolthemes_slider_area_options',
				'title'  => esc_attr__('Header Slider Options', 'duplexo'),
				'icon'   => 'fa fa-picture-o',
				'fields' => $cmt_metabox_slider_area,
			),
			
			
			array(
				'name'   => '_cymolthemes_background_options',
				'title'  => esc_attr__(' Background Options', 'duplexo'),
				'icon'   => 'fa fa-paint-brush',
				'fields' => $cmt_metabox_background,
			),
			
			
			array(
				'name'   => '_cymolthemes_page_topbar_options',
				'title'  => esc_attr__('Topbar Options', 'duplexo'),
				'icon'   => 'fa fa-tasks',
				'fields' => $cmt_metabox_topbar,
			),
			
			
			
			array(
				'name'   => '_cymolthemes_titlebar_options',
				'title'  => esc_attr__('Titlebar Options', 'duplexo'),
				'icon'   => 'fa fa-align-justify',
				'fields' => $cmt_metabox_titlebar,
			),
			
			
			array(
				'name'   => '_cymolthemes_page_customize',
				'title'  => esc_attr__('Other Options', 'duplexo'),
				'icon'   => 'fa fa-cog',
				'fields' => $cmt_other_options,
			),
			
			
		),
	);
	
	
	
	/**
	 *  CPT - Sidebar
	 */
	$cmt_metabox_options[]    = array(
		'id'        => '_cymolthemes_metabox_sidebar',
		'title'     => esc_attr__('Duplexo - Sidebar Options', 'duplexo'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cmt_sidebar_options',
				'fields' => $cmt_metabox_sidebar,
			),
		),
	);
	
	$cmt_metabox_options[]    = array(
		'id'        => 'cymolthemes_page_row_settings',
		'title'     => esc_attr__('Duplexo - Content ROW settings', 'duplexo'),
		'post_type' => $cpt_id,
		'context'   => 'side',
		'priority'  => 'default',
		'sections'  => array(
			array(
				'name'   => 'cmt_content_row_settings',
				'fields' => array(
					array(
						'id'      => 'row_lower_padding',
						'title'   => esc_attr__('Lower ROW Spacing', 'duplexo'),
						'type'    => 'switcher',
						'default' => false,
						'label'   => '<div class="cs-text-muted">'.esc_attr__('If you are using Visual Composer page builder and you are adding ROWs with white background color only than please set this YES. So the spacing between each ROW will be reduced and you can see decent spacing between each ROW.', 'duplexo').'</div>',
					)
				)
			)
		)
	);
	
	
	
	
	
} // foreach




/* Blog Post Format - Gallery meta box */
$cmt_metabox_options[] = array(
	'id'        => '_cymolthemes_metabox_gallery',
	'title'     => esc_attr__('Duplexo - Gallery Images', 'duplexo'),
	'post_type' => 'post',
	'context'   => 'normal',
	'priority'  => 'default',
	'sections'  => array(
		array(
			'name'   => 'cymolthemes_metabox_gallery_sections',
			'fields' => array(
				array(
					'id'          => 'gallery_images',
					'type'        => 'gallery',
					'title'       => esc_attr__('Slider Images', 'duplexo'),
					'add_title'   => esc_attr__('Add Images', 'duplexo'),
					'edit_title'  => esc_attr__('Edit Gallery', 'duplexo'),
					'clear_title' => esc_attr__('Remove Gallery', 'duplexo'),
					'after'       => '<br><div class="cs-text-muted">'.esc_attr__('Select images for gallery. Click on "Edit Gallery" button to add images, order images or remove images in gallery.', 'duplexo').'</div>',
				),
			)
		)
	),
);
