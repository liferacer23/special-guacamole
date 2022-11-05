<?php
/*
 * Plugin Name: Duplexo Theme Extras
 * Plugin URI: https://cymolthemes.com/
 * Description: Theme Extras for Duplexo Theme
 * Version: 1.1
 * Author: CymolThemes
 * Author URI: https://www.cymolthemes.com
 * Text Domain: cmtte
 * Domain Path: /languages
 */

/**
 *  CMTTE = CymolThemes Theme Extras
 */
define( 'CMTTE_VERSION', '1.0' );
define( 'CMTTE_DIR', trailingslashit( dirname( __FILE__ ) ) );
define( 'CMTTE_URI', plugins_url( '', __FILE__ ) );


/**
 *  Codestar Framework core files
 */
function cymolthemes_duplexo_cs_framework_init(){
	defined('CS_OPTION'          ) or define('CS_OPTION',           'duplexo');
	defined('CS_ACTIVE_FRAMEWORK') or define('CS_ACTIVE_FRAMEWORK', true    ); // default true
	defined('CS_ACTIVE_METABOX'  ) or define('CS_ACTIVE_METABOX',   true    ); // default true
	defined('CS_ACTIVE_SHORTCODE') or define('CS_ACTIVE_SHORTCODE', true    ); // default true
	defined('CS_ACTIVE_CUSTOMIZE') or define('CS_ACTIVE_CUSTOMIZE', true    ); // default true

	
	// Make shortcode work in text widget
	//add_filter('widget_text', 'do_shortcode');
	add_filter('widget_text', 'do_shortcode', 11);
	
}
add_action( 'init', 'cymolthemes_duplexo_cs_framework_init', 2 );




/**
 *  Codestar Framework core files
 */
function cymolthemes_header_css(){
	echo '
<style>
th#cymolthemes_featured_image, td.cymolthemes_featured_image {
    width: 115px !important;
}
td.cymolthemes_featured_image img{
    max-width: 75px;
	height: auto;
}
</style>
';
}
add_action( 'admin_head', 'cymolthemes_header_css' );






add_action( 'plugins_loaded', 'cymolthemes_duplexo_load_textdomain' );
/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function cymolthemes_duplexo_load_textdomain() {
	load_plugin_textdomain( 'cmtte', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}







/**
 *  Custom Post Types - With Post Meta Boxes
 */
if( function_exists('vc_map') ){
	require_once CMTTE_DIR . 'vc/cymolthemes_iconpicker/cymolthemes_iconpicker.php';
	require_once CMTTE_DIR . 'vc/cymolthemes_style_selector/cymolthemes_style_selector.php';
	require_once CMTTE_DIR . 'vc/cymolthemes_responsive_editor/cymolthemes_responsive_editor.php';
	require_once CMTTE_DIR . 'vc/cymolthemes_attach_image/cymolthemes_attach_image.php';
}
if( file_exists( get_template_directory() . '/inc/cmt-functions.php' ) ){
	require_once get_template_directory() . '/inc/cmt-functions.php';
} else {
	require_once CMTTE_DIR . 'cmt-functions.php';
}
require_once CMTTE_DIR . 'custom-post-types/cmt-portfolio.php';
require_once CMTTE_DIR . 'custom-post-types/cmt-service.php';
require_once CMTTE_DIR . 'custom-post-types/cmt-team.php';
require_once CMTTE_DIR . 'custom-post-types/cmt-testimonial.php';
require_once CMTTE_DIR . 'custom-post-types/cmt-client.php';


/**
 *  Theme widgets
 */
if( !function_exists('cymolthemes_duplexo_init_widgets') ){
function cymolthemes_duplexo_init_widgets(){
	require CMTTE_DIR .'widgets/widgets.php';
}
}
add_action( 'widgets_init', 'cymolthemes_duplexo_init_widgets' );


/**
 *  Shortcodes
 */
require_once CMTTE_DIR . 'shortcodes.php';



function cymolthemes_rewrite_flush() {
    // ATTENTION: This is *only* done during plugin activation hook
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'cymolthemes_rewrite_flush' );




/**
 * Enqueue scripts and styles
 */
if( !function_exists('cymolthemes_duplexo_scripts_styles') ){
function cymolthemes_duplexo_scripts_styles() {
	wp_enqueue_script( 'jquery-resize', CMTTE_URI . '/js/jquery-resize.min.js', array( 'jquery' ) );
}
}
add_action( 'wp_enqueue_scripts', 'cymolthemes_duplexo_scripts_styles' );



if( !function_exists('cymolthemes_duplexo_admin_scripts') ){
function cymolthemes_duplexo_admin_scripts() {
	wp_enqueue_style( 'cmtte-duplexo-admin-style', plugins_url('/css/admin-style.css', __FILE__) );
}
}
add_action( 'admin_enqueue_scripts', 'cymolthemes_duplexo_admin_scripts' );


/**
 * Login page CSS script
 */
if( !function_exists('cymolthemes_login_stylesheet') ){
function cymolthemes_login_stylesheet() {
    wp_enqueue_style( 'cymolthemes-style-login', plugins_url('/css/style-login.min.css', __FILE__)  );
}
}
add_action( 'login_enqueue_scripts', 'cymolthemes_login_stylesheet' );



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
 *  This function will do encoding things. The encode function is not allowed in theme so we created function in plugin
 */
if( !function_exists('cymolthemes_enc_data') ){
function cymolthemes_enc_data( $htmldata='' ) {
	return base64_encode($htmldata);
}
}


/**
 *  This function will encode URL
 */
if( !function_exists('cymolthemes_url_encode') ){
function cymolthemes_url_encode( $url='' ) {
	return urlencode($url);
}
}


/************** Start Plugin Options settings ************************/




/**
 *  This will create option link and option page
 */
if( !function_exists('cymolthemes_duplexo_register_options_page') ){
function cymolthemes_duplexo_register_options_page() {
	add_options_page(
		esc_attr__('Duplexo Extra Options', 'cmtte'),  // Page title in TITLE tag
		esc_attr__('Duplexo Extra Options', 'cmtte'),  // heading on page
		'manage_options',
		'cmtte-duplexo',
		'cymolthemes_duplexo_options_page'
	);
}
}
add_action('admin_menu', 'cymolthemes_duplexo_register_options_page');


/**
 *  Save plugin options
 */
if( !function_exists('cymolthemes_duplexo_register_settings') ){
function cymolthemes_duplexo_register_settings() {
	
	// Social share for Blog
	register_setting( 'cmtte_duplexo_options_group', 'cmtte_duplexo_social_share_blog', 'cymolthemes_duplexo_social_share_blog_callback' );
	//add_option( 'cmtte_duplexo_option_name', 'This is my option value.');
	
	// Social share for Portfolio
	register_setting( 'cmtte_duplexo_options_group', 'cmtte_duplexo_social_share_portfolio', 'cymolthemes_duplexo_social_share_portfolio_callback' );
	//add_option( 'cmtte_duplexo_option_name', 'This is my option value.');
	

}
}
add_action( 'admin_init', 'cymolthemes_duplexo_register_settings' );




if( !function_exists('cymolthemes_duplexo_social_share_blog_callback') ){
function cymolthemes_duplexo_social_share_blog_callback( $data ){
	// Save settings to theme options so we can re-use it
	$duplexo_toptions = get_option('duplexo_theme_options');
	if( !empty($duplexo_toptions['post_social_share_services']) ){
		$duplexo_toptions['post_social_share_services'] = $data;
		update_option('duplexo_theme_options', $duplexo_toptions);
	}
	return $data;
}
}



if( !function_exists('cymolthemes_duplexo_social_share_portfolio_callback') ){
function cymolthemes_duplexo_social_share_portfolio_callback( $data ){
	// Save settings to theme options so we can re-use it
	$duplexo_toptions = get_option('duplexo_theme_options');
	if( !empty($duplexo_toptions['portfolio_social_share_services']) ){
		$duplexo_toptions['portfolio_social_share_services'] = $data;
		update_option('duplexo_theme_options', $duplexo_toptions);
	}
	return $data;
}
}






if( !function_exists('cymolthemes_duplexo_options_page') ){
function cymolthemes_duplexo_options_page(){
	
	// Commong elements
	$duplexo_toptions	= get_option('duplexo_theme_options');
	$social_list	= array(
						'Facebook'		=> 'facebook',
						'Twitter'		=> 'twitter',
						'Google Plus'	=> 'gplus',
						'Pinterest'		=> 'pinterest',
						'LinkedIn'		=> 'linkedin',
						'Stumbleupon'	=> 'stumbleupon',
						'Tumblr'		=> 'tumblr',
						'Reddit'		=> 'reddit',
						'Digg'			=> 'digg',
					);
	
	
	
	?>
	<div class="wrap"> 
		<h1>Duplexo Extra Options</h1>
		
		<form method="post" action="options.php">
		
			<?php settings_fields( 'cmtte_duplexo_options_group' ); ?>

			<p>This page will set some extra options for Duplexo theme. So it will be stored even when you change theme.</p>
			<br><br>
			
			
			<h2>Select Social Share Service (for single Post or Portfolio)</h2>
			<p>The selected social service icon will be visible on single view so user can share on social sites.</p>
			<table class="form-table">
				<tr valign="top">
					<th scope="row"><label for="cmtte_duplexo_option_name"> Select Social Share Service for Blog Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$cmtte_duplexo_social_share_blog = array();
						if( !empty($duplexo_toptions['post_social_share_services']) ){
							$cmtte_duplexo_social_share_blog = $duplexo_toptions['post_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($cmtte_duplexo_social_share_blog) && in_array( $social_slug, $cmtte_duplexo_social_share_blog ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="cmtte_duplexo_social_share_blog[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
				
				<!-- ---------- -->
				<tr valign="top">
					<th scope="row"><label for="cmtte_duplexo_option_name"> Select Social Share Service for Portfolio Section </label></th>
					<td>
						<p>
						
						<?php
						
						// Getting from Theme Options
						$cmtte_duplexo_social_share_portfolio = array();
						if( !empty($duplexo_toptions['portfolio_social_share_services']) ){
							$cmtte_duplexo_social_share_portfolio = $duplexo_toptions['portfolio_social_share_services'];
							
						}
						
						// Now setting checkboxes in Plugin Options
						foreach( $social_list as $social_name=>$social_slug ){
							$checked = '';
							if( is_array($cmtte_duplexo_social_share_portfolio) && in_array( $social_slug, $cmtte_duplexo_social_share_portfolio ) ){
								$checked = 'checked="checked"';
							}
							echo '<label><input name="cmtte_duplexo_social_share_portfolio[]" type="checkbox" value="'.$social_slug.'" '.$checked.'> ' . $social_name . '</label> <br/>';
						}
						
						?>
						
						</p>
					</td>
				</tr>
				
				
				
				
			</table>
			<?php  submit_button(); ?>
		</form>
		
	</div>
	<?php
}
}



/*******
 *  Social Share links creations
 */
if ( !function_exists( 'cymolthemes_social_share_links' ) ){
function cymolthemes_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);	
	if( !empty($post_type) ){		
		$post_type = esc_attr($post_type);		
		$social_services = cymolthemes_get_option( $post_type.'_social_share_services' );		
		$return = '';
		if( !empty( $social_services ) && is_array( $social_services ) ){		
			foreach( $social_services as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="cmt-social-share cmt-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TMSocialWindow=window.open(\''. esc_url($link) .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="cmt-duplexo-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="cmt-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}


/*******
 *  Social Share links creations
 */
if ( !function_exists( 'cymolthemes_social_share_links' ) ){
function cymolthemes_social_share_links( $post_type='portfolio' ){
	$post_type = esc_attr($post_type);
	
	if( !empty($post_type) ){
		
		$post_type = esc_attr($post_type);
		
		${ $post_type.'_social_share_services' } = cymolthemes_get_option( $post_type.'_social_share_services' );
		
		$return = '';
		
		if( !empty( ${ $post_type.'_social_share_services' } ) && is_array( ${$post_type.'_social_share_services'} ) && count( ${$post_type.'_social_share_services'} > 0 ) ){
			foreach( ${$post_type.'_social_share_services'} as $social ){
				
				switch($social){
					case 'facebook':
						$link = '//web.facebook.com/sharer/sharer.php?u='.urlencode(get_permalink()). '&_rdr';
						break;
						
					case 'twitter':
						$link = '//twitter.com/share?url='. get_permalink();
						break;
					
					case 'gplus':
						$link = '//plus.google.com/share?url='. get_permalink();
						break;
					
					case 'pinterest':
						$link = '//www.pinterest.com/pin/create/button/?url='. get_permalink();
						break;
						
					case 'linkedin':
						$link = '//www.linkedin.com/shareArticle?mini=true&url='. get_permalink();
						break;
						
					case 'stumbleupon':
						$link = '//stumbleupon.com/submit?url='. get_permalink();
						break;
					
					case 'tumblr':
						$link = '//tumblr.com/share/link?url='. get_permalink();
						break;
						
					case 'reddit':
						$link = '//reddit.com/submit?url='. get_permalink();
						break;
						
					case 'digg':
						$link = '//www.digg.com/submit?url='. get_permalink();
						break;
						
				} // switch end here
				
				// Now preparing the icon
				$return .= '<li class="cmt-social-share cmt-social-share-'. $social .'">
				<a href="javascript:void(0)" onClick="TMSocialWindow=window.open(\''. esc_url($link) .'\',\'TMSocialWindow\',width=600,height=100); return false;"><i class="cmt-duplexo-icon-'. sanitize_html_class($social) .'"></i></a>
				</li>';
				
			}  // foreach
			
		} // if
		
		// preparing final output
		if( $return != '' ){
			$return = '<div class="cmt-social-share-links"><ul>'. $return .'</ul></div>';
		}
		
	}
	
	// return data
	return $return;
	
}
}





// Show Featured image in the admin section
add_filter( 'manage_post_posts_columns', 'cymolthemes_post_set_featured_image_column' );
add_action( 'manage_post_posts_custom_column' , 'cymolthemes_post_set_featured_image_column_content', 10, 2 );
if ( ! function_exists( 'cymolthemes_post_set_featured_image_column' ) ) {
function cymolthemes_post_set_featured_image_column($columns) {
	$new_columns = array();
	foreach( $columns as $key=>$val ){
		$new_columns[$key] = $val;
		if( $key=='title' ){
			$new_columns['cymolthemes_featured_image'] = esc_attr__( 'Featured Image', 'duplexo' );
		}
	}
	return $new_columns;
}
}
if ( ! function_exists( 'cymolthemes_post_set_featured_image_column_content' ) ) {
function cymolthemes_post_set_featured_image_column_content( $column, $post_id ) {
	if( $column == 'cymolthemes_featured_image' ){
		if ( has_post_thumbnail($post_id) ) {
			the_post_thumbnail('thumbnail');
		} else {
			echo '<img style="max-width:75px;height:auto;" src="' . CMTTE_URI . '/images/admin-no-image.png" />';
		}
	}
}
}





if( !function_exists('cymolthemes_author_socials') ){
function cymolthemes_author_socials( $contactmethods ) {
	$contactmethods['twitter']  = esc_attr__( 'Twitter Link', 'duplexo' );  // Add Twitter
	$contactmethods['facebook'] = esc_attr__( 'Facebook Link', 'duplexo' );  //add Facebook
	$contactmethods['linkedin'] = esc_attr__( 'LinkedIn Link', 'duplexo' );  //add LinkedIn
	$contactmethods['gplus']    = esc_attr__( 'Google Plus Link', 'duplexo' );  //add Google Plus
	return $contactmethods;
}
}
add_filter('user_contactmethods','cymolthemes_author_socials',10,1);





/**
 *  Login page logo link
 */
if( !function_exists('cymolthemes_loginpage_custom_link') ){
function cymolthemes_loginpage_custom_link() {
	return esc_url( home_url( '/' ) );
}
}
add_filter('login_headerurl','cymolthemes_loginpage_custom_link');






/**
 * Login page logo link title
 */
if( !function_exists('cymolthemes_change_title_on_logo') ){
function cymolthemes_change_title_on_logo() {
	return esc_attr( get_bloginfo( 'name', 'display' ) );
}
}
add_filter('login_headertext', 'cymolthemes_change_title_on_logo');






/**
 *  add skincolor class style
 */
add_action( 'admin_head', 'cymolthemes_admin_skincolor_css' );
function cymolthemes_admin_skincolor_css(){
	global $duplexo_theme_options;
	if( !empty($duplexo_theme_options['skincolor']) ){
	?>
	<style>
		.cmt_vc_colored-dropdown .skincolor,
		.vc_colored-dropdown .skincolor,
		.vc_btn3.vc_btn3-color-skincolor{  /* VC button */
			background-color: <?php echo esc_attr($duplexo_theme_options['skincolor']); ?> !important;
			color: #fff !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-outline{
			color: <?php echo esc_attr($duplexo_theme_options['skincolor']); ?> !important;
			border-color: <?php echo esc_attr($duplexo_theme_options['skincolor']); ?> !important;
			background-color: transparent !important;
		}
		.vc_btn3.vc_btn3-color-skincolor.vc_btn3-style-3d {
			box-shadow: 0 4px rgba(<?php echo cymolthemes_hex2rgb($duplexo_theme_options['skincolor']); ?>, 0.73), 0 4px rgb(0, 0, 0) !important;
		}
		
		.vc_btn3.vc_btn3-style-text.vc_btn3-color-skincolor{ /* Normal Text style button */
			color: <?php echo esc_attr($duplexo_theme_options['skincolor']); ?> !important;
			background-color: transparent !important;
		}
		
	</style>
	<?php
	}
}







/**
 *  Login page stylesheet
 */
if( !function_exists('cymolthemes_login_page_css') ){
function cymolthemes_login_page_css() {
	$duplexo_theme_options = get_option('duplexo_theme_options');
	
	$bg_size = '';
	$return  = '.login #backtoblog a, .login #nav a{color: white; text-shadow: 1px 1px black;}
	.login #backtoblog a:hover, .login #nav a:hover{color: white; text-decoration: underline;}
	';
	
	// Custom CSS Code for login page only
	if( isset($duplexo_theme_options['login_custom_css_code']) && trim($duplexo_theme_options['login_custom_css_code'])!='' ){
		$return .= $duplexo_theme_options['login_custom_css_code'];
	}
	
	// Login page background
	$return .= cymolthemes_get_background_css('body.login', $duplexo_theme_options['login_background']);
	
	
	$logo_a_tag = '';
	$image      = '';
	$imgwidth   = '';
	$imgheight  = '';
	$bg_size    = '';
	
	if( !empty($duplexo_theme_options['logoimg']) ){
		
		if( !empty($duplexo_theme_options['logoimg']['full-url']) ){
			
			$image = $duplexo_theme_options['logoimg']['full-url'];  // Image src
			
			if( function_exists('getimagesize') ){
				$imgsize_array = getimagesize( $duplexo_theme_options['logoimg']['full-url'] );
				$imgwidth      = $imgsize_array[0];  // Image width
				$imgheight     = $imgsize_array[1];  // Image height
			}
			
		} else if( isset($duplexo_theme_options['logoimg']['id']) && trim($duplexo_theme_options['logoimg']['id'])!='' ){
			$image     = wp_get_attachment_image_src( $duplexo_theme_options['logoimg']['id'], 'full' );
			$imgwidth  = $image[1];  // Image width
			$imgheight = $image[2];  // Image height
			$image     = $image[0];  // Image src
		}
		
		if( !empty($imgwidth) && $imgwidth>320 ){
			$imgheight = ceil( ($imgheight / $imgwidth) * 320 );
			$imgwidth  = 320;
			$bg_size   = 'background-size: 100%;';
		}
		
		
		
		if( !empty($image) ){
			$logo_a_tag .= 'background-image: url("'. $image .'");';
		}
		if( !empty($imgwidth) ){
			$logo_a_tag .= 'width:'. $imgwidth .'px;';
		}
		if( !empty($imgheight) ){
			$logo_a_tag .= 'height:'. $imgheight .'px;';
		}
	}
	
	// Login button
	if( !empty($duplexo_theme_options['skincolor']) ){
		$return .= '#wp-submit{background-color:'. $duplexo_theme_options['skincolor'] .'}';
	}
	
	if( !empty($logo_a_tag) ){
		$return .= '.login #login form{background-color: #f7f7f7; box-shadow: none;}';
		$return .= '.login #login h1 a{ background-size:cover; '. $logo_a_tag .' '. $bg_size .' }';
	}
	
	// Remove text shadow from login button
	$return .= '.wp-core-ui #login .button-primary {text-shadow: none;}';
	
	if( !empty($return) ){
		echo '<style type="text/css"> /* CymolThemes CSS for login page */ '. $return .'</style>';
	}
	
}
}
add_action('login_head', 'cymolthemes_login_page_css');



/**
 *  W#C Remove type attribute from css & script tags fles
*/

function cymolthemes_is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

if( !cymolthemes_is_login_page() && !is_admin() ){

	add_filter('style_loader_tag', 'cymolthemes_remove_type_attribute', 10, 2);
	add_filter('script_loader_tag', 'cymolthemes_remove_type_attribute', 10, 2);
		
	// remove type from all css & script tags from files
	if( !function_exists('cymolthemes_remove_type_attribute') ){
	function cymolthemes_remove_type_attribute($tag, $handle) {
		return preg_replace( "/type=['\"]text\/(javascript|css)['\"]/", '', $tag );
	}
	}

	add_action('wp_loaded', 'cymolthemes_output_loading_start');
	function cymolthemes_output_loading_start() { 
		ob_start("cymolthemes_output_calloutput"); 
	}
	add_action('shutdown', 'cymolthemes_output_loading_end');
	function cymolthemes_output_loading_end() { 
		if (ob_get_contents()){ ob_end_flush(); }
	}
	function cymolthemes_output_calloutput($loading) {
		return preg_replace( "%[ ]type=[\'\"]text\/(javascript|css)[\'\"]%", '', $loading );
	}
	
}


/**
 *  Delete WPBackery Welcome page
 */
function delete_wpbackery_welcomepage(){
	delete_transient( '_vc_page_welcome_redirect' );
}
add_action( 'admin_init', 'delete_wpbackery_welcomepage', 1 );



/**
 *  Create New Param Type : Info
 */
if( function_exists('vc_add_shortcode_param') ){
	vc_add_shortcode_param( 'cymolthemes_info', 'cymolthemes_vc_param_info' );
	function cymolthemes_vc_param_info( $settings, $value ) {
		$return  = '';
		$head    = ( !empty($settings['head']) ) ? '<h2 class="cmt_vc_info_heading">'.$settings['head'].'</h2>' : '' ;
		$subhead = ( !empty($settings['subhead']) ) ? '<h4 class="kw_vc_info_subheading">'.$settings['subhead'].'</h4>' : '' ;
		$desc    = ( !empty($settings['desc']) ) ? '<div class="cmt_vc_info_desc">'.$settings['desc'].'</div>' : '' ;
		
		
		
		
		$return .= '<div class="cymolthemes_vc_param_info '.$settings['param_name'].'">'
					. '<div class="cymolthemes_vc_param_info_inner">'
						. $head
						. $subhead
						. $desc 
					. '</div>'
			   . '</div>'; // This is html markup that will be outputted in content elements edit form
	   return $return;
	}
}



/**
 * Register widget areas.
 *
 * @since Duplexo 1.0
 *
 * @return void
 */
function duplexo_widgets_init() {
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Blog', 'duplexo' ),
		'id' => 'sidebar-left-blog',
		'description' => esc_attr__( 'This is left sidebar for blog section', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Blog', 'duplexo' ),
		'id' => 'sidebar-right-blog',
		'description' => esc_attr__( 'This is right sidebar for blog section', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Pages', 'duplexo' ),
		'id' => 'sidebar-left-page',
		'description' => esc_attr__( 'This is left sidebar for pages', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Pages', 'duplexo' ),
		'id' => 'sidebar-right-page',
		'description' => esc_attr__( 'This is right sidebar for pages', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Portfolio - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Portfolio', 'duplexo' ),
		'id' => 'sidebar-left-portfolio',
		'description' => esc_attr__( 'This is left sidebar for Portfolio', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Portfolio', 'duplexo' ),
		'id' => 'sidebar-right-portfolio',
		'description' => esc_attr__( 'This is right sidebar for Portfolio', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio Category - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Portfolio Category', 'duplexo' ),
		'id' => 'sidebar-left-portfoliocat',
		'description' => esc_attr__( 'This is left sidebar for Portfolio Category pages.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Portfolio Category - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Portfolio Category', 'duplexo' ),
		'id' => 'sidebar-right-portfoliocat',
		'description' => esc_attr__( 'This is right sidebar for Portfolio Category pages.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
		// Service - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Service', 'duplexo' ),
		'id' => 'sidebar-left-service',
		'description' => esc_attr__( 'This is left sidebar for Service', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Service', 'duplexo' ),
		'id' => 'sidebar-right-service',
		'description' => esc_attr__( 'This is right sidebar for Service', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service Category - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Service Category', 'duplexo' ),
		'id' => 'sidebar-left-servicecat',
		'description' => esc_attr__( 'This is left sidebar for Service Category pages.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Service Category - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Service Category', 'duplexo' ),
		'id' => 'sidebar-right-servicecat',
		'description' => esc_attr__( 'This is right sidebar for Service Category pages.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Team Member - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Team Member', 'duplexo' ),
		'id' => 'sidebar-left-team-member',
		'description' => esc_attr__( 'This is left sidebar for Team Member', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Team Member - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Team Member', 'duplexo' ),
		'id' => 'sidebar-right-team-member',
		'description' => esc_attr__( 'This is right sidebar for Team Member', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Team Member Group - Left
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Team Member Group pages', 'duplexo' ),
		'id' => 'sidebar-left-team-member-group',
		'description' => esc_attr__( 'This is left sidebar for Team Member Group.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	// Team Member Group - Right
	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for Team Member Group pages', 'duplexo' ),
		'id' => 'sidebar-right-team-member-group',
		'description' => esc_attr__( 'This is right sidebar for Team Member Group', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_attr__( 'Left Sidebar for Search', 'duplexo' ),
		'id' => 'sidebar-left-search',
		'description' => esc_attr__( 'This is left sidebar for search', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_attr__( 'Right Sidebar for search', 'duplexo' ),
		'id' => 'sidebar-right-search',
		'description' => esc_attr__( 'This is right sidebar for search', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	if( function_exists('is_woocommerce') ){
		// WooCommerce - Left
		register_sidebar( array(
			'name' => esc_attr__( 'Left Sidebar for WooCommerce Shop', 'duplexo' ),
			'id' => 'sidebar-left-woocommerce',
			'description' => esc_attr__( 'This is left sidebar for WooCommerce shop pages.', 'duplexo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
		// WooCommerce - Right
		register_sidebar( array(
			'name' => esc_attr__( 'Right Sidebar for WooCommerce Shop', 'duplexo' ),
			'id' => 'sidebar-right-woocommerce',
			'description' => esc_attr__( 'This is right sidebar for WooCommerce shop pages.', 'duplexo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
		) );
	}
	
	if( function_exists('tribe_is_upcoming') ){
		// The Events Calendar - Left
		register_sidebar( array(
			'name'          => esc_attr__( 'Left Sidebar for Events', 'duplexo' ),
			'id'            => 'sidebar-left-events',
			'description'   => esc_attr__( 'This is left sidebar for "The Events Calendar" plugin only.', 'duplexo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		// The Events Calendar - Right
		register_sidebar( array(
			'name'          => esc_attr__( 'Right Sidebar for Events', 'duplexo' ),
			'id'            => 'sidebar-right-events',
			'description'   => esc_attr__( 'This is right sidebar for "The Events Calendar" plugin only.', 'duplexo' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - Top', 'duplexo' ),
		'id'            => 'floating-widgets-top',
		'description'   => esc_attr__( 'This widget will appear (as full width) before the widget columns. So you can set any full width content here.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 1st column', 'duplexo' ),
		'id'            => 'floating-widgets-1',
		'description'   => esc_attr__( 'Set 1st column widgets for Floatingbar area.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 2nd column', 'duplexo' ),
		'id'            => 'floating-widgets-2',
		'description'   => esc_attr__( 'Set 2nd column widgets for Floatingbar area.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 3rd column', 'duplexo' ),
		'id'            => 'floating-widgets-3',
		'description'   => esc_attr__( 'Set 3rd column widgets for Floatingbar area.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - 4th column', 'duplexo' ),
		'id'            => 'floating-widgets-4',
		'description'   => esc_attr__( 'Set 4th column widgets for Floatingbar area.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => esc_attr__( 'Floatingbar Widget - Bottom', 'duplexo' ),
		'id'            => 'floating-widgets-bottom',
		'description'   => esc_attr__( 'This widget will appear (as full width) after the widget columns. So you can set any full width content here.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	
	
	// First Footer widgets
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 1st Widget Area', 'duplexo' ),
		'id' => 'first-footer-1-widget-area',
		'description' => esc_attr__( 'This is first footer widget area for first row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 2nd Widget Area', 'duplexo' ),
		'id' => 'first-footer-2-widget-area',
		'description' => esc_attr__( 'This is second footer widget area for first row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 3rd Widget Area', 'duplexo' ),
		'id' => 'first-footer-3-widget-area',
		'description' => esc_attr__( 'This is third footer widget area for first row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'First Footer - 4th Widget Area', 'duplexo' ),
		'id' => 'first-footer-4-widget-area',
		'description' => esc_attr__( 'This is fourth footer widget area for first row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	// Second Footer widgets
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 1st Widget Area', 'duplexo' ),
		'id' => 'second-footer-1-widget-area',
		'description' => esc_attr__( 'This is first footer widget area for second row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 2nd Widget Area', 'duplexo' ),
		'id' => 'second-footer-2-widget-area',
		'description' => esc_attr__( 'This is second footer widget area for second row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 3rd Widget Area', 'duplexo' ),
		'id' => 'second-footer-3-widget-area',
		'description' => esc_attr__( 'This is third footer widget area for second row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	register_sidebar( array(
		'name' => esc_attr__( 'Second Footer - 4th Widget Area', 'duplexo' ),
		'id' => 'second-footer-4-widget-area',
		'description' => esc_attr__( 'This is fourth footer widget area for second row of footer.', 'duplexo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	// Dynamic Sidebars (Unlimited Sidebars)
	global $duplexo_theme_options;
	$duplexo_theme_options = get_option('duplexo_theme_options');
	if( isset($duplexo_theme_options['custom_sidebars']) && is_array($duplexo_theme_options['custom_sidebars']) && count($duplexo_theme_options['custom_sidebars'])>0 ){
		foreach( $duplexo_theme_options['custom_sidebars'] as $custom_sidebar ){
			
			if( isset($custom_sidebar['custom_sidebar']) && trim($custom_sidebar['custom_sidebar'])!='' ){
				$custom_sidebar = $custom_sidebar['custom_sidebar'];
				if( trim($custom_sidebar)!='' ){
					$custom_sidebar_key = sanitize_title($custom_sidebar);
					register_sidebar( array(
						'name'          => $custom_sidebar,
						'id'            => $custom_sidebar_key,
						'description'   => esc_attr__( 'This is custom widget developed from "Duplexo Options".', 'duplexo' ),
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget'  => '</aside>',
						'before_title'  => '<h3 class="widget-title">',
						'after_title'   => '</h3>',
					) );
				}
			}
			
		}
	}
	
}
add_action( 'widgets_init', 'duplexo_widgets_init' );
