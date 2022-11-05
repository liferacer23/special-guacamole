<?php
/*
 * Plugin Name: CymolThemes Duplexo Demo Content Setup
 * Plugin URI: https://cymolthemes.com/
 * Description: Duplexo Demo Content Setup Plugin By CymolThemes
 * Version: 1.0
 * Author: CymolThemes
 * Author URI: https://cymolthemes.com/
 * Text Domain: duplexo-demosetup
 * Domain Path: /languages
 */
 
 
 
/**
 *  Version and directory
 */
define( 'DUPLEXO_TMDC_VERSION', '1.0' );
define( 'DUPLEXO_TMDC_DIR', plugin_dir_path( __FILE__ ) );
define( 'DUPLEXO_TMDC_URI', plugins_url( '', __FILE__ ) );



/**
 *  Demo Content setup
 */
require_once DUPLEXO_TMDC_DIR . 'one-click-demo/demo-content.php';



/**
 *  Translation
 */
function duplexo_demosetup_load_plugin_textdomain() {
	$domain = 'duplexo-demo-content-setup';
	$locale = apply_filters( 'plugin_locale', get_locale(), $domain );
	if ( $loaded = load_textdomain( 'duplexo-demosetup', trailingslashit( WP_LANG_DIR ) . $domain . '/' . $domain . '-' . $locale . '.mo' ) ) {
		return $loaded;
	} else {
		load_plugin_textdomain( 'duplexo-demosetup', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
	}
}
add_action( 'init', 'duplexo_demosetup_load_plugin_textdomain' );



/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function duplexo_demosetup_load_textdomain() {
	load_plugin_textdomain( 'duplexo-demosetup', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}
add_action( 'plugins_loaded', 'duplexo_demosetup_load_textdomain' );







function duplexo_demo_content_scripts_styles(){

	wp_enqueue_style(
		'cmt-one-click-demo-style',
		plugin_dir_url( __FILE__ ) . 'style.css',
		time(),
		true
	);
	wp_enqueue_script(
		'cmt-one-click-demo-set-js',
		plugin_dir_url( __FILE__ ) . 'functions.js',
		array( 'jquery' ),
		time(),
		true
	);
	


}
add_action( 'admin_enqueue_scripts', 'duplexo_demo_content_scripts_styles', 20 );



/**
 * HTML Output for the one click demo setup
 *
 * @since 1.0.0
 */
if( !function_exists('cymolthemes_duplexo_one_click_html') ){
function cymolthemes_duplexo_one_click_html() {
	?>
	
	<div id="import-demo-data-results">
				
		<div class="import-demo-data-text-w">
		
			<div class="import-demo-data-layout">
				<!-- <h3>Select demo data type  <small>(select below)</small>: </h3> -->
				
				<div class="cmt-import-demo-left">
					<div class="cmt-import-demo-left-inner">
						
						<select id="import-layout-type" name="import-layout-type">
							<option value="Classic">Classic Site</option>
							<option value="Overlay">Overlay Site</option>
							<option value="Infostack">Infostack Site</option>
							<option value="ClassicInfo">ClassicInfo Site</option>
							<option value="RTL">RTL Site</option>		
						</select>
						
						<br><br><hr>
						
						<div class="import-demo-data-text">
						
							<strong><?php esc_attr_e('NOTE:', 'duplexo'); ?></strong>
							<?php esc_attr_e('This process may overwrite your existing content or settings. So please do this on fresh WordPress setup only.', 'duplexo'); ?>
							<br /><br />
							<?php esc_attr_e('Also if you already included demo data than this will add multiple menu links and you need to remove the repeated menu items by going to "Admin > Appearance > menus" section.', 'duplexo'); ?>
							
						</div>

						
					</div>
				</div>
				
				<div class="cmt-import-demo-right">
				
					<!-- Multi purpose -->
					<span class="import-demo-thumb-w import-demo-thumb-classic">
						<div class="cmt-import-demo-preview-text">Preview:</div>
						<a href="https://duplexo.cymolthemes.com/header-style-03/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-classic.png" alt="Classic">
							<span class="cmt-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Overlay -->
					<span class="import-demo-thumb-w import-demo-thumb-overlay" style="display:none;">
						<div class="cmt-import-demo-preview-text">Preview:</div>
						<a href="https://duplexo.cymolthemes.com/header-style-02/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-overlay.png" alt="overlay">
							<span class="cmt-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- Infostack -->
					<span class="import-demo-thumb-w import-demo-thumb-infostack" style="display:none;">
						<div class="cmt-import-demo-preview-text">Preview:</div>
						<a href="https://duplexo.cymolthemes.com/header-style-04/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-infostack.png" alt="Infostack">
							<span class="cmt-import-demo-link-text">View demo online</span>
						</a>
					</span>
					
					<!-- ClassicInfo -->
					<span class="import-demo-thumb-w import-demo-thumb-classicinfo" style="display:none;">
						<div class="cmt-import-demo-preview-text">Preview:</div>
						<a href="https://duplexo.cymolthemes.com/" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-classicinfo.png" alt="ClassicInfo">
							<span class="cmt-import-demo-link-text">View demo online</span>
						</a>
					</span>	

					<!-- rtl -->
					<span class="import-demo-thumb-w import-demo-thumb-rtl" style="display:none;">
						<div class="cmt-import-demo-preview-text">Preview:</div>
						<a href="https://duplexo.cymolthemes.com/duplexo-rtl" target="_blank">
							<img src="<?php echo plugin_dir_url( __FILE__ ) ?>images/layout-rtl.png" alt="rtl">
							<span class="cmt-import-demo-link-text">View demo online</span>
						</a>
					</span>						
					
				</div>
				
				<div class="clear clr"></div>
				
			</div>
		
			
			<br /><br />
			<input type="button" class="button button-primary" id="cymolthemes_one_click_demo_content" value="<?php esc_attr_e('I agree, continue demo content setup', 'duplexo'); ?>" /> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
			<a href="#" class="cmt-one-click-error-close"><?php esc_attr_e('Cancel', 'duplexo' ); ?></a>
		</div>
	
	</div>
	
	<div class="clear"></div>
	
	<?php
}
}