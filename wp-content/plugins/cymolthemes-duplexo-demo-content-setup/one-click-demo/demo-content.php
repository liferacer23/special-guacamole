<?php


/******************* Helper Functions ************************/

/**
 *
 * Encode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_encode_string' ) ) {
	function cs_encode_string( $string ) {
		return rtrim( strtr( call_user_func( 'base'. '64' .'_encode', addslashes( gzcompress( serialize( $string ), 9 ) ) ), '+/', '-_' ), '=' );
	}
}

/**
 *
 * Decode string for backup options
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
if ( ! function_exists( 'cs_decode_string' ) ) {
	function cs_decode_string( $string ) {
		return unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
	}
}



/*************** Demo Content Settings *******************/
function cymolthemes_action_rss2_head(){
	// Get theme configuration
	$sidebars = get_option('sidebars_widgets');
	// Get Widgests configuration
	$sidebars_config = array();
	foreach ($sidebars as $sidebar => $widget) {
		if ($widget && is_array($widget)) {
			foreach ($widget as $name) {
				$name = preg_replace('/-\d+$/','',$name);
				$sidebars_config[$name] = get_option('widget_'.$name);
			}
		}
	}
	
	// Get Menus
	$locations = get_nav_menu_locations();
	$menus     = wp_get_nav_menus();
	$menuList  = array();
	foreach( $locations as $location => $menuid ){
		if( $menuid!=0 && $menuid!='' && $menuid!=false ){
			if( is_array($menus) && count($menus)>0 ){
				foreach( $menus as $menu ){
					if( $menu->term_id == $menuid ){
						$menuList[$location] = $menu->name;
					}
				}
			}
		}
	}
	
	$config = array(
			'page_for_posts'   => get_the_title( get_option('page_for_posts') ),
			'show_on_front'    => get_option('show_on_front'),
			'page_on_front'    => get_the_title( get_option('page_on_front') ),
			'posts_per_page'   => get_option('posts_per_page'),
			'sidebars_widgets' => $sidebars,
			'sidebars_config'  => $sidebars_config,
			'menu_list'        => $menuList,
		);            
	if ( defined('CYMOLTHEMES_THEME_DEVELOPMENT') ) {
		echo sprintf('<wp:theme_custom>%s</wp:theme_custom>', base64_encode(serialize($config)));
	}
}

if ( defined('CYMOLTHEMES_THEME_DEVELOPMENT') ) {
	add_action('rss2_head', 'cymolthemes_action_rss2_head');
}

/**********************************************************/




/********************* Ajax Callback Init **************************/
add_action( 'admin_footer', 'cymolthemes_one_click_js_code' );
function cymolthemes_one_click_js_code() {
	$images   = array();
	$images[] = get_template_directory_uri() . '/cs-framework-override/fields/cymolthemes_one_click_demo_content/import-alert.jpg';
	$images[] = get_template_directory_uri() . '/cs-framework-override/fields/cymolthemes_one_click_demo_content/import-loader.gif';
	$images[] = get_template_directory_uri() . '/cs-framework-override/fields/cymolthemes_one_click_demo_content/import-success.jpg';
	
	?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
		
		/*********** Preload images **************/
		function preload(arrayOfImages) {
			$(arrayOfImages).each(function(){
				$('<img/>')[0].src = this;
			});
		}
		preload([
			<?php
			$total = count($images);
			$x     = 1;
			foreach( $images as $image ){
				echo '"'. $image . '"' ;
				if( $total != $x ){
					echo ',';
				}
				$x++;
			}
			?>
		]);
		/*****************************************/
		
	});
	</script>
	<?php
}




if( !class_exists( 'cymolthemes_duplexo_one_click_demo_setup' ) ) {
	

	class cymolthemes_duplexo_one_click_demo_setup{
		
		
		function __construct(){
			add_action( 'wp_ajax_duplexo_install_demo_data', array( &$this , 'ajax_install_demo_data' ) );
		}
		
		
		/**
		 * Decide if the given meta key maps to information we will want to import
		 *
		 * @param string $key The meta key to check
		 * @return string|bool The key if we do want to import, false if not
		 */
		function is_valid_meta_key( $key ) {
			// skip attachment metadata since we'll regenerate it from scratch
			// skip _edit_lock as not relevant for import
			if ( in_array( $key, array( '_wp_attached_file', '_wp_attachment_metadata', '_edit_lock' ) ) )
				return false;
			return $key;
		}
		
		
		
		
		/**
		 * Added to http_request_timeout filter to force timeout at 60 seconds during import
		 * @return int 60
		 */
		function bump_request_timeout() {
			return 600;
		}
		
		
		
		/**
		 * Map old author logins to local user IDs based on decisions made
		 * in import options form. Can map to an existing user, create a new user
		 * or falls back to the current user in case of error with either of the previous
		 */
		function get_author_mapping() {
			
			if ( ! isset( $_POST['imported_authors'] ) )
				return;

			$create_users = $this->allow_create_users();

			foreach ( (array) $_POST['imported_authors'] as $i => $old_login ) {
				// Multisite adds strtolower to sanitize_user. Need to sanitize here to stop breakage in process_posts.
				$santized_old_login = sanitize_user( $old_login, true );
				$old_id = isset( $this->authors[$old_login]['author_id'] ) ? intval($this->authors[$old_login]['author_id']) : false;

				if ( ! empty( $_POST['user_map'][$i] ) ) {
					$user = get_userdata( intval($_POST['user_map'][$i]) );
					if ( isset( $user->ID ) ) {
						if ( $old_id )
							$this->processed_authors[$old_id] = $user->ID;
						$this->author_mapping[$santized_old_login] = $user->ID;
					}
				} else if ( $create_users ) {
					if ( ! empty($_POST['user_new'][$i]) ) {
						$user_id = wp_create_user( $_POST['user_new'][$i], wp_generate_password() );
					} else if ( $this->version != '1.0' ) {
						$user_data = array(
							'user_login' => $old_login,
							'user_pass' => wp_generate_password(),
							'user_email' => isset( $this->authors[$old_login]['author_email'] ) ? $this->authors[$old_login]['author_email'] : '',
							'display_name' => $this->authors[$old_login]['author_display_name'],
							'first_name' => isset( $this->authors[$old_login]['author_first_name'] ) ? $this->authors[$old_login]['author_first_name'] : '',
							'last_name' => isset( $this->authors[$old_login]['author_last_name'] ) ? $this->authors[$old_login]['author_last_name'] : '',
						);
						$user_id = wp_insert_user( $user_data );
					}

					if ( ! is_wp_error( $user_id ) ) {
						if ( $old_id )
							$this->processed_authors[$old_id] = $user_id;
						$this->author_mapping[$santized_old_login] = $user_id;
					} else {
						printf( __( 'Failed to create new user for %s. Their posts will be attributed to the current user.', 'duplexo-demosetup' ), esc_html($this->authors[$old_login]['author_display_name']) );
						if ( defined('IMPORT_DEBUG') && IMPORT_DEBUG )
							echo ' ' . $user_id->get_error_message();
						echo '<br />';
					}
				}

				// failsafe: if the user_id was invalid, default to the current user
				if ( ! isset( $this->author_mapping[$santized_old_login] ) ) {
					if ( $old_id )
						$this->processed_authors[$old_id] = (int) get_current_user_id();
					$this->author_mapping[$santized_old_login] = (int) get_current_user_id();
				}
			}
		}
		
		
		
		/**
		 * Install demo data
		 **/
		function ajax_install_demo_data() {
		
			// Maximum execution time
			@ini_set('max_execution_time', 60000);
			@set_time_limit(60000);

			define('WP_LOAD_IMPORTERS', true);
			include_once( DUPLEXO_TMDC_DIR .'one-click-demo/wordpress-importer/wordpress-importer.php' );
			$included_files = get_included_files();


			$WP_Import = new cymolthemes_WP_Import;
			
			$WP_Import->fetch_attachments = true;
			
			// Getting layout type
			$layout_type = 'default';

			$filename = 'demo.xml';
			
			if( !empty($_POST['layout_type']) && $_POST['layout_type']=='rtl' ){
				$filename = 'rtl-demo.xml';
			}
			
			$WP_Import->import_start( DUPLEXO_TMDC_DIR .'one-click-demo/'.$filename );
			
			
			$_POST     = stripslashes_deep( $_POST );
			$subaction = $_POST['subaction'];
			if( !empty($_POST['layout_type']) ){
				$layout_type = $_POST['layout_type'];
				$layout_type = strtolower($layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
				$layout_type = str_replace(' ','-',$layout_type);
			}
			$data      = isset( $_POST['data'] ) ? unserialize( base64_decode( $_POST['data'] ) ) : array();
			$answer    = array();
			echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
			
			
			switch( $subaction ) {
				
				case( 'start' ):
				
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_cat';
					$answer['message']        = __('Inserting Categories...', 'duplexo-demosetup');
					$answer['data']           = '';
					$answer['layout_type']	  = $layout_type;
				
					die( json_encode( $answer ) );
				
				break;
				
				
				case( 'install_demo_cat' ):
					wp_suspend_cache_invalidation( true );
					$WP_Import->process_categories();
					wp_suspend_cache_invalidation( false );
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_tags';
					$answer['message']        = __('All Categories were inserted successfully. Inserting Tags...', 'duplexo-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				case( 'install_demo_tags' ):
					wp_suspend_cache_invalidation( true );
					$WP_Import->process_tags();
					wp_suspend_cache_invalidation( false );
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_terms';
					$answer['message']        = __('All Tags were inserted successfully. Inserting Terms...', 'duplexo-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				case( 'install_demo_terms' ):
					
					wp_suspend_cache_invalidation( true );
					ob_start();
					$WP_Import->process_terms();
					ob_end_clean();
					wp_suspend_cache_invalidation( false );
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_posts';
					$answer['message']        = __('All Terms were inserted successfully. Inserting Posts...', 'duplexo-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				
				case( 'install_demo_posts' ):
					//wp_suspend_cache_invalidation( true );
					echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
					ob_start();
					echo '';  //Patch for ob_start()   If you remove this the ob_start() will not work.
					$WP_Import->process_posts();
					ob_end_clean();
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_images';
					$answer['message']        = __('All Posts were inserted successfully. Importing images...', 'duplexo-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					$answer['missing_menu_items']   = base64_encode( serialize( $WP_Import->missing_menu_items ) );
					$answer['processed_terms']      = base64_encode( serialize( $WP_Import->processed_terms ) );
					$answer['processed_posts']      = base64_encode( serialize( $WP_Import->processed_posts ) );
					$answer['processed_menu_items'] = base64_encode( serialize( $WP_Import->processed_menu_items ) );
					$answer['menu_item_orphans']    = base64_encode( serialize( $WP_Import->menu_item_orphans ) );
					$answer['url_remap']            = base64_encode( serialize( $WP_Import->url_remap ) );
					$answer['featured_images']      = base64_encode( serialize( $WP_Import->featured_images ) );
					
					die( json_encode( $answer ) );
				break;
				
				
				
				case( 'install_demo_images' ):
					$WP_Import->missing_menu_items   = unserialize( base64_decode( $_POST['missing_menu_items'] ) );
					$WP_Import->processed_terms      = unserialize( base64_decode( $_POST['processed_terms'] ) );
					$WP_Import->processed_posts      = unserialize( base64_decode( $_POST['processed_posts'] ) );
					$WP_Import->processed_menu_items = unserialize( base64_decode( $_POST['processed_menu_items'] ) );
					$WP_Import->menu_item_orphans    = unserialize( base64_decode( $_POST['menu_item_orphans'] ) );
					$WP_Import->url_remap            = unserialize( base64_decode( $_POST['url_remap'] ) );
					$WP_Import->featured_images      = unserialize( base64_decode( $_POST['featured_images'] ) );
					
					
					ob_start();
					$WP_Import->backfill_parents();
					$WP_Import->backfill_attachment_urls();
					$WP_Import->remap_featured_images();
					$WP_Import->import_end();
					ob_end_clean();
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_slider';
					$answer['message']        = __('All Images were inserted successfully. Inserting demo sliders...', 'duplexo-demosetup');
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
				break;
				
				
				
				
				case( 'install_demo_slider' ):
					
					$json_message		= __('RevSlider plugin not found. Setting the widgets and options...', 'duplexo-demosetup');
					
					if ( class_exists( 'RevSlider' ) ){
						$json_message	= __('All demo sliders inserted successfully. Setting the widgets and options...', 'duplexo-demosetup');
						
						// List of slider backup ZIP that we will import
						$slider_array	= array(
							DUPLEXO_TMDC_DIR . 'sliders/mainlayout-homeslider-01.zip',
							DUPLEXO_TMDC_DIR . 'sliders/mainlayout-homeslider-02.zip',
							DUPLEXO_TMDC_DIR . 'sliders/mainlayout-homeslider-03.zip',
							DUPLEXO_TMDC_DIR . 'sliders/mainlayout-overlaymainslider1.zip',
						);
						
						$slider			= new RevSlider();
						foreach($slider_array as $filepath){
							if( file_exists($filepath) ){
								$result = $slider->importSliderFromPost(true,true,$filepath);  
							}
						}

					}
					
					// Output message
					$answer['answer']         = 'ok';
					$answer['next_subaction'] = 'install_demo_settings';
					$answer['message']        = $json_message;
					$answer['data']           = base64_encode( serialize( $data ) );
					$answer['layout_type']	  = $layout_type;
					
					die( json_encode( $answer ) );
					
				break;
				
				
				
				
				
				case( 'install_demo_settings' ):
					
					
					/**** Breacrumb NavXT related changes ****/
					$breadcrumb_navxt_settings						= array();
					$breadcrumb_navxt_settings['hseparator']		= '<span class="tm-bread-sep">&nbsp; &#047; &nbsp;</span>';  // General > Breadcrumb Separator
					$breadcrumb_navxt_settings['Hhome_template']	= '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" title="Go to %title%." href="%link%" class="%type%"><i class="themifyicon ti-home"></i>&nbsp;&nbsp;Home<span class="hide">%htitle%</span></a></span>';  // General > Home Template
					$breadcrumb_navxt_settings['Hhome_template_no_anchor']	= '<span typeof="v:Breadcrumb"><span property="v:title"><span class="hide">%htitle%</span></span></span>';  // General > Home Template
					
					// Getting existing settings
					$bcn_options    = get_option('bcn_options');
					if( !empty($bcn_options) && is_array($bcn_options) ){
						// options already exists... so merging changes with existing options
						$breadcrumb_navxt_settings = array_merge($bcn_options, $breadcrumb_navxt_settings);
					}
					update_option( 'bcn_options', $breadcrumb_navxt_settings );
					
					/**** Finish Breadcrumb NavXT changes ****/
					
					
					
					/**** START CodeStart theme options import ****/
					
					$theme_options = array();
					
					$theme_options['classic']		= 'eNrtXXtz3DaS_99V-Q64cd1WXFwRJb7maVu3Xseb26ts4rWVe9RVagpDYmYYkQSX5EjWuvyB7mvcXCe7brwIcjiUZEuOVHWxZc2AjUbjh0aj0WgwdOGP54uP1WK-GFXnSR7xlJej59Viuhg9XUcT6rv4bbIYpfSK72r8Ei5Gl0nM8KM3W4zWuzRdYsGSpSxjeV2NntOFt_iYLFxcWXXLaMyA61wnqFwwfDcpX9F0uaLR-abkuzxG-ikKMV6MkoxuBGt3MVJyiKIktgqBZ8kKRmurDCQpeJXUCc-tUg9-07qm0RYlsx5AXCeq5B92S9B4u_dj_COlhgaTPGflYxIaRjTlCHySbWzms6YcRFxcRruq5plN4MMQMegsjNGaY_sUJfooerCmWZJeqdbe8qJI8kpUChYjxGZXOA2JDxXO6JZn9Ij8XDAcL-B3RfPKqaDxtWJyQcuEyl5OEaHNLqWiOx70tmYfaqcuoc6al7aQ0DmUzdFwgMxeKGp50L0kZ86WJZttrZ75Y80xZXXNSqcqaJTkAheo4PZBOY1n07mnEaFp6qCoUr8FUzlmoZREjfCG803KpNK4QpJzx-YaszXdpbUZCPPcsXoOLJ-6rhAKNc9cItryC9YIyFbUDQQVyL71ljjPoFNm1OafNWgg1isYkvSI_CtLL1idRNcMG3CZKGlvOWShe3jIws8YMtf1o_FqeFQQKv_xQRWMB7R7dn9QBY8QqgGtCu5Rq8LHB5Xv_T5aNX6EUA1plXt_UE0eH1TeZECrvPuBypdu5gPECf2AiBZJTVMFUZ_NGoAsnNybdlW71QNFDTDaFQUrI1qxz3H4gsOYQdPu8XjY5RtUtAiegB_4tSH7Qvd4fF_u8WGsPLFT3LD6_1fEa2Ba7eqa5wamyVeDaXw70zXc-cNdhJZUdGBZXCc1ln7NTn7uOja9tlPrFS0dewsP419qldEEy9VmaZSiG2hBMyyJhkMLUwyk1HWxODlJeUTTLa_qk3hXpOwDP7ksHGWUTuotwFxcmVwnon51soYtfw2jheKuNse_FZubxSlA2pw7zffPD1iIiaF2r3u2RO1kP1lw4EA1qEHp5Tap5cj4LRIRv1i2-MVxXDD_CcmminZL8zhl5TKJUHIKDD8K2jRZlbTU2ofgJWvxzZubh2Ja0ktW8YzpTfmakjV1aFnyS1wn5pd5s1mXVdB6QFOV3ulfRFBExL_OardapUwPvq7RaVt9RXlJnThcMOyuK1aU1Us1zkaTUhhmqOKsy12CkQqA1A96MFhGKa_YFyMRtpHYFXeKg-_u4aDE_iwgjG5JXDD6dMvoy6rOB6etH3YIe9TQY9NgJVVWt6yWQyDbZfmyiamikVpOjHbbs7Vk9LzgSa5jr54vrZk_P0ToNDE9ix6XmWrLL5c1L1boQ6wWngJLlrT6C0MV0xIMErvSUllUnc6ioStBiG_dI_HnmYZSVRmYy2GHqMPZ9wxnAn_98Rh-H_vjZ1rPVOWUrWvBQeoZ1HqxS0mU0qp6iTTCPNKoHp2-SJPTF4l-JJWX5Rcs5QVzODw_geeUbEu2fjnKaJLWfJHka_5H9oFmoGLHEc_wZ3RKusUvTihUR_49bRRbnjPJ_jvP8YNw7Eyms7njuZ6sc7JLTzu4iZXEdMufjw91i9QZBhAxUlipLuouPB2dvmObpIIluy2fRfAj3yR58xQl-W-YU07FI1hpHcGW1JyndVK8hAVh9CuB6koMJIT5rELGRH2FaRHYn8W66mRxu2xLAfTq7ztasvaD-iplDs7hVrEMgjbzsOnBD6wmr8jfdrxmFXakDeTAJAp7aA7MH2SHvkt3qoAWNhWE6TZUw0v6PJBLegVrujJfx9FVBjCLNRxVSpc7Ma3p9cu8bvku13ic3BE0yUqy4rXu5hes-AiRmNPe9MgPjwIwGMeu90yaaBu-AbPhWWSPed8_FAEf-7ffbviuP_fXg26rUHmN3e8aXDAYf4lbfmCL9hUwQ0MRR-UuWz3ECMCN1G4oGPA5wczJbAK-zrW7JQPhRcIue07Exq1ZrWUKMEBhTLBEf5cdNsF47GiNUZ-_Mmn7K8dj6bK0hnmLR9oNH4VObjxMGl8saySMwDSXkbZsr2nNNry8XCKvymibXFywakH2atR0o2uEeES66RCjx26IwRbXYqlN1gmLtZhvobRcIk05gUWGlaqtmVWd7uotL3VzXDDgK1HQFS_Qx_Rt4D01RcfmsQ17d1dmkXQR1zbfnxwFYPPnXDD6NHimhwtWCdT-dKk5PJRj9mvXsG5_QNMD9IZZVcCuB1wwXh4GRewRqO_7U20OFK1V-_BWRZzjb3h9VWhJDT76kXIcoZ3vm93RXFw-HLBdY2GXMv5gYpf-0IHC9LMsvusPR6ymEiWRO0FhJnwUjbU0TWzSwTI4uzIVqE_u2p1DCY4L2ReVafM1GlNbZaElGf2wbJ9GzPRs7zxfZnyVpMaxCbT2VKAd51dLnQQkd524s2_Zm6UkU7Wnrm6kVfuw8Zn3UR60Qd6R_Osez1wnz4z6yOE2gtxw1BsTYw-PKP3Uj1Orp8G0Y34rBrZ6a3bnCIEoWSZ5IWMFyPMMZj35D17G5GzLcvIG3fPjY722yRo4r3S0tTF6805LgBRN0y8zszffQchf_dYXYyTJB7nE3cYEB-Mj-VcNpwqpy16KnaRazHAD_tx-aLbWqlOWVmK8bXkosIt0uPmvQPxzHczR3KeA14s4udD7Y8nQEYHHU2I_kUVNoMAKYxETvxJxA1wnwjGSsYkT4KD_3W9GzXGg3QanZyxlov6LE_j2Yjs-_c7zAzKdj8l8FnpQOlacDvaqvpTLwMy_017piMvt-_QGYzLkVRzDXCJZmX7th2LaXfP7urYtmQolhnc7ZCmN2JanaO9u3b-f1-skYnsdJDBuf2LpmlY1oRfsiPwZpkES08ExFGPfxI8wfGRFfX54c0b-9svPZ29MwMTkarbjaWMof1GoGMsbMF8Z-LgvTgoQzNddKbZLcI1P565LvHBMprO5C6L5JhCjPZtWRCuYCcbv2N93DPuVI1MCXFxPXxVcIhKDpsGwQbdXsVFh1OEzAmsmU3Dj28vYxO2b8AfXl-k-3XV7isB7pqu2l6bBloLwIHk3NOrqMIo_h8VsfDSZoBP6rNMvsfoMRHaVo1Mxrq3y1tvyjPFcXPp66AlIEQ7F0HB4M7ahSOWgpS5FdrBa6P296gfCa0hIkxyJH1go4mZb6sndnq_f4ODYN96VDdwBLrjN0mRLGtW4ucDAbqMYoTziEIgEh4h7tjBr8Z-eA3HJCzwQ-x3G8QsTJILDA-jN7iVBwld43XhM-omHx2RuVburffV1Dp9rHL6aF3dxQqz7o7ReK5k0jhUraElrg5g5tPIaw2SWDJ19sK-TaIH-DQzhOsnJe_pQchCG0nY-I1LnU_wzrJVer8YsvYd35cFssw6I7D8-kYPHXCdy-PhEHj8-kVwnj0_k6eMTefb4RJ4_YJH9A0uJ-3Bl9kzUcc15bYUsxYKJJcuoptem8DSUK_5BUXt2rOkQkX8ToqAT0rOJhrKWJnukHeex4z5ZxAObbVfdAlXUtgTouQhXB1xcNDUa5tJoQ34oAjn37jrKLdu8p_yIoejmzf1dM3lwsJKyqjVQfSoX4PRXY2XTDiaodCm_Ylww-G5SSOTWNnBcJ0GT4Wj3aUBXMRyDGYnxQVSniKr4Yw4hWhWuUW-cDXsVHkiI_Tb3iGdranIf2v0ZDrvJEb5WDxGmPdKHfRJxXDArWxHDbqeGc5iMChZXMjKKcVfRDxD8tS4l__s_ROTjRbsStcy5YrQUKXgylitz9YAtnj79Ojptvovd7q8Y3yWv0pQIbhUpGWxTL1h83F1ijBhNCjvIsZcK-KtJ8sW8wWuz3Nx7OKlM8js14b463LlD8yRm0Nwcpq5AaKkMaZIltb1FDzz5WCZzREuRpAuoiNsS-S5bNT4IDofghGkpGS-b4D708B2Ukb9CofouCK1MG8VfxwzwceNQdI7I_Oa55iDus4N6OmZktTRI1e4aVJ_PdCYLJrAspf5A3ygKrQ8lAZj3WKJ9k31S1NQkYpXKVJfvlEAHgkZsxfn56HlcIpDB5MzLpBZTOln4kvemSHcVfg8kXCJFgnOeVTWWhSpRAjSaxRhiUy62PRQZA8dcJ00qEcX0VaI8y-kqZbE5IQa5ZZKNUrtX5guCLsdRKd1r-a1SaEdSGxFZlTaUMJmqjkH6pDLtiKZDDNxL2wEfv1cfMa2KblThGd1g_U9yndvrCVbHkFPLifbDHkpgicDYvu8eDUjfoulrUQJjk3nTRmmug1cXHQbxEPb7EIa3gnBoeAZF-qTckVYX-3F3O1RdzLvPu3h3W9nHGk_8Cl7Wa54mfFmU_DcW1csYiJPU3Mh4tQK_h4ClJe-YTj6QbmJTFW2AOUkPpR3Qi0dDJQxXyVLobWxL2VCoh40BwFXknSwkb6V81T5jXU2bohnu0EAadTiN2rlP3Ng1TCvUZ739jFFyZZLNCzWKtUZKXFxiUTqEBkhnhnh7RFbHoN-qQ-RMF-KQdmsMXFxI8jwZorUv3AzcxRnruzgr0NO1vjh78DKOqy7jODmvBy8j4SUcSVXQ-DOv3siJRzte4FwntN03QRPqvE4Ty8G-PxRdjeKuYuXNXDA0lP1cMIp7Aw3RHYLn3wg8aJDorNT7x8_cjcPVOaPlucOHUJxrEJUFPoDhTGBY0Jyldw1ieCMQQYAfOVhg5TF-JQwzWjiI4TWaGGoQI5qyPKZD2iiTrJ1UdcYp5Oni3SGqnI_OsmA7dWZtmLXIrvUQ0VE-QP913cTAbQmS5JuU4bU6cRmwWQJgqfl3WLH0wqYTFQ_WlEu3WIWeagtTgCGv9xY-y02XBP2LXcPAWuDmJtOd0WwJbntJW3pcXCnPy17p5gepm-7Cgvdn-kGfjx5cIr-7SWKunuJBML7R7L6v4NZJxu5v-bsJxIjQmw8Fw9eQRYx8Paxva5AeJNoqto9o9c0pnekYNiQHZpXFZG9eTeWzjOG2XQ-H2CDbTuBbVlY8pyn5Sy73BToQIaKT0pQtbSHn4pqitfWedwhbu3jdlS63PWk9Q7AfUUDj8SPsB3ITU0B-rCx5GbrhcpVs7lDB5lrBRG515fBrL9Xrw4_7XuX2Om1FXFygiLzBZ3pcXA1hBmvFLjO0UxiUs21SkQLGj2T0imzpBSMrxnKS8QvY_PCSxAyUkMXH5E-MVLuSkZqTaMuic3LFdyWpCpYCXDCbYy2taaydMo6m3TzC9r7-NVRo2cGWH1OMLtRp8zloe6VvpOEMwazcn3i9BezJGlGUSbnF6XtelldHZAXb51xcPYepDEMWqxET_Aj4Ell1TN6mDLZkpC6vCN3QJFwn4IdsCc5cMBJcJ-s1w8guOWdXl7yMq2PMhNXdrpKY6Ztge-8YsZ-rAW09nzfPxTohLVPrNhuGCXpolqgzRWfHL2yKkUc5Mm1ukx4KND9mA2Kzs5pWlqgbYgj3KA4ya5HqSEZzac-C4pJzEcEpo33ELC7sQgeaWhSIgfQ-0VpUJoRl4gNcInAl2lNOqhI8p5neTTSeaS9l2xdUnsJ1bG3v9mZcXP0bcMXFP02i8xszDW6GQONSD7KVx6Fqil5Gjp2cb4XFrRF1msVQB3T8DkVR8ngX1Q74Uo6eNmZV9EU70jl3cM10ukGt0KZQD_taDfrpdnndijbhy85QkeoSZAJ7ZznVnlo48DiHwO9f8JpcJ3ltEWuHq81hW2epnNud6yi73MHMXmmfzc2Db550aPoeq4Ml8GYwY_xXeeugXbNihQiWnZqHW8--7YDZiae__PT9m3fk9c8_vT9798vrs7_8_BNYVE8Qh4aRuZg-AjubMWlelctAaoTkEpZRGFBYocj7Gj7Xu5zF_wSsQmSl22-uRoRdjK5bF2d3vS62mr_TxfFeE279LnBRBf4kl69cMJ-HwPiPSYamnuzK9FuDGfp41bFMLKVFXCIBg6r_XCIzaV_-XFyw_DtMtIX9tHsEP8lRCB9C_DCBDxP8MIUP8JOMnj3_5smKx1cfv3lS0BgVY0FcXCiD3cgmyeXnT-SbXCfHSm2OyHGjQx_hgcislU0vyGiErcs03yMylMzbYftRMUIMF2TiFh-AwErNhbIxlEGNdk7ugniC1BZXfnakP7P45gkyI-1C4s1ENdHmpW7Bxdpd_r4gFIO4IE_9WRCPZ1BAhPQWFK0O-MF-BwK3xWnmz6L55PlNOtSSMseNTarh6zM7OCpaixeEriowoDUTLa2Bwdj9Z_gM-rwg4Rg_Oudo1ZrM6QURH9Gq_ue3DpA_awr-SxZgrYz_43Z1CFaqbt0Ov22NW5KTT4CjtsBV5KARRgg7GhPK4YuTqkgpqHqSi9FdwV7oHEdDn04U6yXeHW_Fid-2PDq_QyTiVfp6RZfas6irdLdRNEUPDW5F29thTUTa52wqXCJr6FsC4Jq3V9HsPVU1LYlnhxod23_EXCfa5WjjAWbwfeOS-tM-upZE7Qpet4KWpSnvkrWAQcEUuy4sk54qbWwme3WvmsvBTU0DT1PeBmesokttZHAcz6CY_FVsFKpWRPFcMDg4KFYdO9TShkekVEGp0-xUxIu-kFDsSNrxMMHzByyv9F6mS9qWw7XrtDopqxg5XFwlh9kG4Q2qJBcRBuV3Brhwb-S7rfAs1uQEjMWbT-tt55KbuGBpvV5j5uq3EESlXFy3ofBK5VwwoAK0uDtyo9PTRIDvy-9tYTzYwrTbgvAe-huYTP2-BkL5QoAbdMEyBf0tTPtBCqfTwy2IC6-6hZba9Lcxlm-A34NpOh7oBd4exvdwmPiW4G0OGZqwVHPIoENR8pABFbUVb1JZQTr71vKndFxcKzRPf9t_aKrigiguisppib4-7ptUYthNPTF1FW9h3C_QGvzp8cP-oNaVl9UlLUYE9jQvZfi02jIGOwVt0i3x0GuralrWnf8LSYeE5bb3i6ZfppcNYDTfQ3Cp3N_Gh5aeaQfZAuTm8iUIXCIkuhJD6ckEKBk0q0SannwwV29vtIlFekbzliHcTqi4lGIWdlO3zZNm4FWcoRXQDDretmkQrz_jO4lilvGlfgc1LxqaT_8HpZKzSA';
					$theme_options['overlay']		= 'eNrtXXtz3DaS_99V_g64Se1WXFwRJb7maVm3Xseb3atN7LWVe9SVawpDYmYYcQguyZGsdfyB9mvsXCe7brwIcjjUw5IjVV1sWTNgA2j80Gh0NxoMnfnD6exTOZvOBuVZkkU85cXgeTkbzwbfLKMR9V38NpoNUnrJtxV-CWeDiyRm-NGbzAbLbZrOsWDOUrZhWVUOntOZN_uUzFxcWXXNaMyg1c9QAdpdpXxB0_mCRmergm-zGOnHyMRwNkg2dCWadmcDxYcoSmKrENosWM5oZZUBXCc5L5Mq4ZlV6sFvWlU0WiNn1gMYRJn8w-4JOm-Ofoh_JNfQYZJlrHhMTMOMphyBTzYru_FJXQ4szqNtWfGNTeDDFDEYLMzRkmP_FDn6JEawpJskvVS9veV5nmSlqBTMBojNNndqEh8qnNI139AD8gO0eA6_S5qVTgmdL1Uj57RIqBzlGBFabVMqhuPBaCv2sXKqAuoseWEzCYND3hwNB_DshaKWB8NLMuasWbJaV-qZP9QtpqyqWOGUOY2STOACFdwuKMfxZDz1NFwiNE0dZFXKt2hUzlkoOVEzvOJ8lTIpNK7g5MyxW43Zkm7TykyEee5YI4cmv3FdwRRKnkW05uesZpAtqBsIKuB97c1xncGgzKxNbzVpwNZLmJL0gPyZpeesSqIrpg1aGSlubzhlobt_ysJbTJnr-tFw0T8rCJX_-KAKhj3SPbk_qIJHCFWPVAX3KFXh44PK934bqRo-Qqj6pMq9P6hGjw8qb9QjVd79QOVLM_MB4oR2QETzpKKpgqhLZ_VAFo7uTbrK7eKBogYYbfOcFREt2W0MvmA_ZtC1ezjsN_l6BS2CXCdgB35tyL7QPB7el3m8HytPeIorVv3_jngFTIttVfHMwDT6ajANb6a6-ge_f4jQk4oOzKukwtKvOcjb7mPjKwe1XFzQwrFdeJj_QouMJpgvVnMjFO1AC6phSdQfWhhjIKWq8tnRUcojmq55WR3F2zxlH_nRRe4opXRUrQHm0jwR9cujJbj8FcwWsrtYHf6Sr64Xp1wwbjPu1N9vH7AQC0N5rzu6RHmyny04cKJq1KD0Yp1Ucmb8BomIX8wb7cVxXDD_Cc7GinZNszhlxTyJkHMKDX4StGmyKGihpQ_BS5bimzc1D8WypBes5BumnfIlJUvq0KLgF07ML7LaWZdVUHtAV6X29M8jKFwi4l9nsV0sUqZcJ1_XaPWtvlwiv6RKHFwwdttmK9pUczXPRpJSmGao4iyLbYKRCoDUDzowmEcpL9kXIxE2kdjmd4qD7-7goNi-FRBGtiRcMF2yZeRlUWW9y9YPW4QdYuixcbCQXCKre1bbIZBtN9m8jqmikpqPjHTbq7Vg9CznSaZjr54vtZk_3Ufo1DE9ix63mXLNL-YVzxdoQyxmngJLljTGC1MV0wIUErvUXFxZVK3BoqIrgIlv3QPx55mGUlXpWcthi6jVsu-Zlgn89YdD-H3oD59pOVOVU7asRAuSHeD2eJuSKKVl-QJphHqkUTU4OU6Tk-NEP5LCC0IVnTkcHh4lXCdvcpaRP_NtUc7IjyB0DnlPKzI9dF346E3g9_ERtnG0TU_-FyTPKXkE-5GDYbqSVJynVZK_XDC1OfjQgkFsDIZL3_VuxiXLzlnKc6YZPaZkXbDli8GGJmnFZ0m25H9gH-kGFsJhxDf4Mzhplx4f0RMxgKdPujrJ1zxjrfa_GZyQ72Dorus6IEyO5weh3QxcItEcao_Uhh00ewQWm0NjoS2bMO11BaErDVX_HjoN5B5awiaq9MVhdLmBGRObJsKjy52YVvTqfVX3fJebKq6mCLpkBVnwSg_zC7ZYhEgsXCJvfOCHBwGs0EPXeyZ1og1fzzr1LLLH7Gj3hZyH_s3te9_1p_6y104UXCKvsftNPe7hl9jBe3yir4AZKoo4KrabxUN0ua8ldn3e922ih6PJCIyLK90TA-F5wi46jqCGjVWteQpwmRgVLNHfbvarYDzns-aoy0AYNQ2Ew6G0ERrTvMYz5LodhU5mTDoan88rJIxANReR1myvaMVWvLgkL4tonZwz2LZ3alR0pWuEeCa5ahGjiWyIQRdXYk9MlgmLNZtvobQkdTmBTYYVqq-JVZ1uqzUvdHdcMOBLUdBmL9Dn4vOGMEx8c6BcJ59eYZRZVG3Mtdb3RwcBaP0pwD4OnukJg30C5T-d6xYeysn2lbtYezwg6wEaoKzMwdFcMIjn-0ERZjn1fX-sFYKitWrv9w7E0fmKV5e55tTgox8p4w76-b52SKbyYY_2GgrNtOEPJlxc6PfF8Me30vmu3x8kGkuURLoCBSX0SXTWkDThF4NucLZFKr77d23QIQeOmPDDXFyOSKW4fL0ulacqJGZDPzb1QzjWK7_1fL7hiyQ1Zk6gJakESTm7nOscHOn0oWPd0D5zSaZqj13dSaN2ry6adhHvVUnegfzrHk5Hz4w0ydk3vFxcUwhqjWPPkyj93A1VY7DBuKWPSwbKe238Y0RBlMyTLJfeOrZ5CkqA_BcvYnK6BofxNdrrh4d6s5M1cJnpeGetA6etnlwwKZqmX6Z1r-9SyF_dyhijFMlHuefdRCMHwwP5V02nCmrLUZbVpRw_2iMXXFyrFQWBVphT4Fh60wv-cVFhrAdgezF4x_6-ZWVF_rYF3TogorEXA76tUC3B9zXN4Xv59y0t4Ktg7YVS2AQ98hcDkIfZ7_zg119_lQ65JfsYVJvvi95cIh06zyUgdKYjNugci20dpuQ4Ts618ywbdER08YTYT2RR7WZbsSpiglTC63ZcIhQD6XofQQv6391ulD4B2nVwcspSJuofH8G34_Xw5Dtw0Ml4OiTTSehB6VC1tHdUelom_p2OSgcsbj6m1xjSIC_jGLbl0oxrN5TRHJrfNbR1wVS8MLzbKUtpxNY8Ra164_G9WS6TiO0MkMC8_ZGlSwoCT8_ZAfkTiHMS0945FHNfR5VAhO3AzQ-vT8nffn5z-hoDNlo7KfFvBM2GUH6cn_zAKvKSvAYNuQG7-vgoB8Z8PZR8PQdz_GTqusQLh2Q8mbrAmm-CP9qWasS5goloWC9kmmGjBFo9eZmL6A9qH9MMmtqqGRUr7T8IsFYyaFww2twsR27Xgrd3sUZz4126q_yYwHumqzZ3v96egnAveTv-6erQjT-F_XJ4MBqh2fusNS6xwfXszsq0KhnXin_trfmG8Uxal2hvSBb2xe1wejdsRZHKwc2gECnAypzwd6rvCekhIU0yJH5g4Y_rufGjuz1EX4r_-iMhxoazgdvTCjp2mmxOowrdGdwFa8EI5TmGQCTYR9zhNNV94BqIC57jqddvMI9fmAUR7J9Ab3IvWRC-wuvac9JN3D9cJ1Or2l158lfZlK6xKSue38UxsB6PknotZFI5liynBa0MYsbx8GrFZLYMnWKwK5Oogf4DFOEyych7-lASDfpyc24RHfQp_umXSq9TYubew7vXYDy5PSz7j4_l4PGxHD4-loePj-XR42N5_PhYnjw-lqcPmGV_z1biPlxcnj0T21xccl5ZgVGxYWLJPKrolXk6NeWCf1TUntX1Xlwi_zpEQStqaBP1pSaNdkhbxmPLfLKIe5xtV131VNQ2B2i5CFMHTDQ1G-ZmaE2-L8g59e46oi77vKecjL5cMOr17V2zeHCykqKsNFBdXCIX4PJXc2XT9ibFtCm_Yoz5btJWZPp04I6COo3RHlOPrGI4BtMO472ojhFV8cccdTQqXFwh3rgadio8kCj-TS4LT5bU5Fs0x9MfdpMzfKUcXCJMO6QP-7BjD1a2IIbtQfXnTRkRzC9lZBTjrvrM45UuJf_6XCcRByDRtkApcy4ZLT4QE8uVhyPQLB5wfRic1N-Ft_sB47vkZZoS0VpJCgZu6jmLD9tbjGGjzlM3Zy9WJuMHk8nLV0l2ZWadew-nokl2pyrcV4c7d6iexAqamiPbBTAthSFNNkllu-iBXCcfywSSaC4ycQEVcSVcIttuFrUNgtMhWsJUmA0v6uA-jPAdlJEfoVB9F4RWdo9qX8cM8HFtUKjtRB9i-fVz3YK4tA7i6ZiZ1dwgVXNoUH060dkzmDQzl_IDY6PItD73BGDeY4m2TXZJUVKTiJUqHV2-OAINCBqxBedng-eJQAYTQi-SSizpZObLtld5ui3xeyARyRNcXPOsrLAsVKkZINEsxhCbMrHtqdgwMHzSpBRRTF9lw7OMLlIWm0No4Fsm9iixe2m-IOhyHpXQvZLfSoV2JKURkVWpSgmT-egYpE9K04_oOsTAvdQd8PF79RGPTulKFZ7SFdb_LPe5nZFgdQw5NYxoP-yghCYRGNv23aEB7hs0XT1KYGwyb1xcC81V8Oqi_SDuw34XwvBGEPZNTy9Ln5U50hhiN-5ui6qNeft5G-92L7tY44lfzotqydOEz_OC_8Kiah4DcZKaaxcvF2D3ENC05B3T-Q3STKyrog4wh_Wh1AN686iphOIqWAqjjW0uawr1sFZcMLiLvJOF5K3kr9xtWFfTqmiCHhpwow6nUTp3iWu9hqmM-qy3u2HkXFypZPPWjHypkRI3VZQMoQLSyVwn3g6RNTAYtxoQOdWFOKXtGj23jjxPhmjtWzU9F26G-sLNAuR0qW_H7r1x46obN07Gq94bR3jTRlLlNL7l_Rq58GjLCvyMuvs6aEKdV2liGdj3h6KrUdyWrLgegIayG0BxV6EmukPw_GuBBx0SnQl7__iZC3C4O29ogZdnelCcahCVBt6D4URgmNOMpXcNYngtEIGBv3LQwMpi_EoYbmjuIIZXSGKoQYxoyrKY9kmjTOx2UjUYXCeXp4t3h6gyPlrbgm3Umb1h0iC70kJEQ3kP_dc1EwO3wUiSrVKGd-fEjb96C4Ct5j9hx9Ibm86F3FtTbt1iF_pGa5gcFHm1s_FZZrok6N7s6gasDW5qsusZ3czBbC9oQ45LZXnZO910L3U9XFzY8P5EP-rz0X3kd7dIzP1SPAjG15bd9z3bKtmw-9v-rgMxXCL0-mPO8F1jESNfD-ubKqQHibaK7SNaXWtKZzqGNcmeVWU1srOuxvLZhqHbrqdDOMi2EfiWFSXPaEr-kkm_QAdcIkR0Uqqyuc3kVFxcjbRcXO9pi7DhxeuhtFvb4dYzBLsRBVQefwV_IDMxBWyPFQUvQjecL5LVHQrYVAuYSN8uHX7lzXl9-HHfu9zOoK2ICxSR1_hMz6sh3MBesd0Y2jFMyuk6KUkO80c29JKs6TkjC8YysuHn4PzwgsQMhJDFh-SPjJTbgpGKk2jNojNyybcFKXOWAlwwq0PNremsmZWOqt08wv6-_tVX6NnBnh9TjC7UmfkZSHupb8HhCsGs3J94tQbsyRJRlEm5-cl7XhSXB2QB7nOmnsNShimL1YyJ9gjYEpvykLxNGbhkpCouCV3RJCNgh6wJrlwwElwnyyXDyC45Y5cXvIjLQ8yE1cMuk5jp22c7LxKxn6sJbTyf1s_FPiE1U-MGHYYJOmjmKDN5y-MXOsXwowyZZmujDgpUP8YBsZuzulaaqB1iCHco9jbWINWRjPqioAXFBedcIoJTRLuIWa2wcx1oalAgBtL6RG1RmhCWiQ-IwJXoTxmpivGMbrQ3UVumnZRNW1BZClc1a1u312vVv0aruPmnSXR27UaD6yFQm9S9zcrjULVEL1wix07Ot8Li1ow69WaoAzp-i1wiL3i8jSoHbClHLxuzK_qiH2mcO7hnOu2gVmhTqIddvQbddNusakSb8I1mKEhVATyBvrOMak9tHHicQ-D3z3i1lLyyiLXB1WxhXW1SubZb11G2mYOZvVI_m5sHT5-0aLoen5hbOJgx_kHeOmjWLFkugmVcJ-bh2rNvO2B24snPP33_-h159ean96fvfn51-pc3P4FG9QRxaBoyl-EHoGc3TKpXZTKQCiG5gG0UJhR2KPK-gs_VNmPxv0FToXjzhOq_vhoRtjG6al-c3PW-2Oj-TjfHe0249dvARSXYk1xcvud7GkLDf0g2qOrJtki_NZihjVceysRSmlwnEjCo-u8yk_YFvk3lO0y0BX_aPYCf5CCEDyF-GMGHEX4Ywwf4SQbPnj99suDx5aenT3Iao2DMiAtl4I2skkx-_kyePjlUYnNADmsZ-gQPRGat7HpGBgPxLheR5ntA-pJ5W81-Ug0hhjMycvOPQGCl5kLZEMqgRjNcJ3dGPEFqsys_O9KemT19go2RZiHxJqKa6PNC9-Bi7Xb7viAUkzgj3_iTIB5OoIAI7i0oGgPwg90BBG6jpYk_iaaj59cZUIPLDB2bVMPXpXZwVrQUzwhdlKBAKyZ6WkIDQ_d38BnkeUbCIX50zlCr1ZnTM1wiPqJW_e9vHSB_Vhf8jyzAWhv-j5vVIVipvHE__KY1bkhOPgOOWgOXkYNKGCFsSUwopy9OyjylIOpJJmZ3gS8ywtnQpxP5co631Rtx4rcNi85vEYl4lb5e0ab2LOoy3a4UTd5Bg65o0x3WRKR5zqZcIrKGvsFcMO55OxWN76mqaU48O9To2PYjPtEmRxMPUIPva5PUH3fRNThqVvDaFTQvdXmbrAEMMqaaa8My6qjSxGa0U_eyvn9cXNc08NTlTXCGKrrURAbn8RSKyY_CUSgbEcU94OCkWHXsUEsTHpFSBaVO7amIt3khofBImvEw0eYPWF5qX6ZN2uTDtes0BimrGD5cXMWHcYPwBlWSiQiDsjsD3LhXQpfiAqvfTjAUrzet1q1LbuKCpfUulYmr33sQFXLfhsJLlQOAAtBo3ZGOTkcX-FqWYWcPw94exu0ehPXQ3cFo7Hd1EIaTaw7BUgXdPYy7QQrH4_09iAuvuoeG2HT3MZSved-BaTzsGQXeHsY3f5j4lmjbHDLUYan6kEGHouQhAwpqI96ksoJ09q1lT-m4Vmie_rL70FTFDVFcXBSVyxJtffSbVGLYdS0xdRVvZswvkBr86bDDfq_2lRflBc0HBHyaFzJ8Wq4ZA09Bq3SLPbTayooWVet_NdJcImGZbf2i6pfpZT0YTXcQnCvzt7ahpWXaQjYHvrl8z4IIiS7EVHoyAUoGzUqRplwnH0zVKxptYpGeUb_ZCN0JFZdSjYXt1G3zpJ54FWdoBDSDlrVtOsTrz_gepJht-Fxcv2ia5zXN5_8DR4Wn-w';
					$theme_options['infostack']		= 'eNrtXf1y2ziS_3-q8g5YTd3VpNa0SYr6jOPdbCYzO1szmVxc4tzd1lZKBZGQxDFF8EjKjjeVB9rXuFwnu258EaQoSnbsjF11kziWwAbQ-KHR6G40OHTqDybTT8V0Mu0VF3Ea8oTnvWfFdDTtfbsIh9R38dtw2kvoNd-U-CWY9q7iiOFHbzztLTZJMsOCGUvYmqVl0XtGp970Uzx1ZdUVoxGDVj9DBWh3mfA5TWZzGl4sc75JI6QfIRODaS9e06Vo2p32FB-iKI6sQmgzZxmjpVUGnGS8iMuYp1apB79pWdJwhZxZD2AQRfxPu1wn6Lw--gH-kVxcQ4dxmrL8MTENM5pwBD5eL-3Gx1U5sDgLN0XJ1zaBD1PEYLAwRwuO_VPk6JMYwYKu4-Ra9faGZ1mcFqJSf9pDbDaZU5H4UOGcrviaHpEfocVL-F3QtHAK6HyhGrmkeUzlKEeI0HKTUDEcD0Zbso-lU-ZQZ8Fzm0kYHPLmaDiAZy8QtTwYXpwyZ8Xi5apUz_yBbjFhZclyp8hoGKcCF6jgtkE5isajiacRoUniIKtSvkWjcs4CyYma4SXny4RJoXEFXCcXjt1qxBZ0k5RmXCLMc8caOTT5resKplDyLKIVv2QVg2xO3b6gAt5X3gzXGQzKzNrkVpMGbL2AKUmOyF9ZcsnKONwzbdDKUHF7wykL3N1TFtxiylxc1w8H8-5ZQaj8xwdVf9Ah3eP7g6r_CKHqkKr-PUpV8Pig8r3fR6oGjxCqLqly7w-q4eODyht2SJV3P1D50sx8gDihHRDSLC5poiBq01kdkAXDe5OuYjN_oKgBRpssY3lIC3Ybg6-_GzPo2j0edJt8nYIWwhOwA782ZF9oHg_uyzzejZVcJzzFJSv_f0fcA9N8U5Y8NTANvxpMg5upru7B7x5cIvSkogOzMi6x9GsO8rb72GjvoBZzmju2Cw_zn2uR0QSz-XJmhKIZaEE1LIm6QwsjDKSUZTY9OUl4SJMVL8qTaJMl7CM_ucocpZROyhXAXFyYXCeifnGyXDCXv4TZQnbny-PfsuVhcQrgNuVO9f32AQuxMJT3uqVLlFwn-9mCA1wnqkINSq9WcSlnxq-RiPjFrNZeFPXhP8HZSNGuaBolLJ_FIXJOocFPgjaJ5znNtfQhePFCfPMm5qFYlvSKFXzNtFO-oGRBHZrn_MqJ-FVaOeuyCmoP6KrQnv5lCEVE_OvMN_N5wvTk6xqNvtVX5JeUsQPAbppshetypubZSFIC0wxVnEW-iTFSAZD6_RYMZmHCC_bFSAR1JDbZneLgu1s4KLZvBYSRLQlAm2wZeZmXaeey9YMGYYsYemzUn0uR1T2r7RDINut0VsVUUUnNhka67dWaM3qR8TjVsVfPl9rMn-xcInSqmJ5Fj9tMseJXs5Jnc7Qh5lNPgSVLauOFisucXWuOLIrGQFHJ5cDAd-6R-PNUw6iq1NcxNBvR_EIjWKNpNOx7pmECf_3BXDB-H_uDp1rEVOWELUrRggw5woPTTULChBbFc6QRmpGGJQEpcVagmxPUzw5W652dJvHZ3_kmXCfnOXTPXCLiB-Sv8L0g71h-GYeMvMn5ZRyx_A-nXCdAe3qySc5Oo_hSd4CiB53MXCJW0jgpRFwn2CkG7aD5Vk5kt6eUrHK2eN77tmc15iziNBK1sZne2Q_wlbwvyK8p-YVmp7FpLsbVIFed3HCAN-SPKh5PgMmzxlxcCEKDlTcCCeoYyx72izLn6fKsYkkqgmzFUyaZOafJBTnn5NVHMORLMj09UXWISzy_7wSDoTMaT1xcC1nB9T8Qh4KHsMsLJApScp6UcfYcNqPeh_qgOhZI0EKzY21gc2iXNJcBSFNVQahlQ9W9XU_6crsuYL9Wquk4vF7DMMT-fBzytS53XCJa0v1buO75LvdvXFy8IXTJcjLnpR7mF-zmCJFYtN7oyA-O-qAQjl3vqVS_Nnwd27tnkT1mn74ruj3wb-5K-K4_8RedJqkQeY3d7-rcD77E5N7hfn0FzFBRRGG-Wc8fond_kNh1Ofq3CVQOx0OwY_Z6QgbCy5hdtZx2DWqrWvPUR56MCpbob9a7VTAeKVpz1GaPDOv2yPFAmiS1aV7hcXXVjkJcJzXWI40uZyUShqCa81Brtpe0ZEueX5MXebiKL1kxJVs1SrrUNQI8_lxcNojRGjfEoItLsXvGi5hFms03UFqQqpzAJsNy1dfYqk435YrnujtcMPCFKGiy19dH8HXgPaWgBuaxDXvT47JIWkzdKlVcMGcINgYU-GSmKz2UU_O925Y_POrDtjUBuRn15bbVRwOXFRk4MYDpbA8O4j-tARStVbvueVjWsDiVX_LyOtOMGnj0I2W2QTffV77ORD7s0FYDoYnW_MFEXCL9ruOB0a10vOt3x59GEiWRCUFB9j-JzmqCJlxcbtAFziZPBOrDuzbgkIPjTI5F5c18jc6U4yukZE0_zup2iKvXd-P5bM3ncaKnbDDQ0lOAdFxcXFzPdEqP9CHRT69pmJkkU7VHppNa7Zq6GculYHzOSRtxU9WbVesdyb_u8WT41EiQnHHDy4ETXykZe4ZE6ed2qGqDVXkLOFgGmnk1i9NM-vhY9RzWN_kvnkfkfMVS8gpN7-NjvW_JGriCdJS00m4TA7Fqd76kSfJl-vRw70D-alezGNuIP8rt61wwXYswyFkDj17_qIlT0XA50KK8lhCIZb3JtdZQMGh92IeiAzxGS0YxljbbFbRFujhdwBYMelIHatClFVvsoO4xywYdEVQ8I_YTWVQ5x1aIipjYlPCVnRDnUXnv6P6qf7e7USseaFf9s5dQi7wvTk_g8-lqcPZH8KjJaDIgk3HgQenACgG0jqm84q1RgC8cE1vT-BbDecdknOMVVjeDQqb_zD7SNXSCSrA5Lr9tXFyrnKkIYXC3s5XQkK14gorvxuP7mYMpychPqRmbH5Af4kW5XCJFeUR-5gV5kS5Zwooj8v7di84JFGJThXGC4VYYx8lLpzkmGTFagFIvauw3akolK8-jgC47e83AAn0FOm4NA_jT6UlmR67O3rL_2bCiJC_If2zARJHxXCcTejLJn_Uo3VwwOc7OfmRYTzctWl75mpdsNYOlezZxXeIFA1wi40Qr34S0tG1VC2n1x6JhzRRNsVECrZ69yET4B3WWaQZtbdWMist2HzpY6oOC71DfSYeDNi3TtcWNtkn3-TJ976muWt8d93XWD3bWaIZdXR3B8VwnsKUOjoZDNIafNkZcJ_bAjg6VxVUwrjeNlbfia8ZTaXSiSVwiWdgVvsNJXrMlRSoHN5JcXCQdK4vD36q-I7KHhDROkfiBRUEO8-aHd3tsXzkouwNcIsbMs4Hb5eYMK3xnNCzRycEduObk4MmJQKS_i7jTlcJlEOU8w3O232EevzDvor97Ar3xveRd-Aqvg-eknbh7TiZWtbvy7_fZo66xR_Fs5A4OnvV4lNRrIZPKsWAZzWm5fR7mVYrJbBw6qWFbJlED_Q0U4VwiTsk7-lBSG7qygW4RJPQp_umWSq9VYmbew7tJYZy9HSz7j4_l_uNjOXh8LA8eH8vDx8fy6PGxPH58LE8eMMv-jq3Efbg8eyb8ueC8tGKnYsPEkllY0r2ZQRXlnH9U1J7V9U5cIv8Qon4j4mgTdSVDDbdIG8Zjw3yyiDtcXG5XXS5V1DYHaLkIUwdMNDUb5i5qRb4rQDrx7jrcLvu8p9SMruDr4fauWTw4WXFelBqoNpHr4_JXc2XTdubGNCm_Ynz6brJXZMJ23x32q8RJe0wdsooRGUx0jHaiOkJUxR9zGlKrsEe8cTVsVXggXCdcMDe5njxeUJN2UR9Pd_BNzvBeOUSYtkgf9kHJDqxsQQyag-pOnzJcIphdy_ioSHbEcVww4y91Kfnff5F_yJBvjlLmXFwzmn8gJrorD1WgWTwD-9A7q74Lb_cDxnrJiyQhorWC5Azc1EsWHTe3GMNGlRk_bjmz-WByh_kyTvcm2Ln3cGQap3eqwn11rnSH6kmsoIk51Z0D01IYkngdl7aLjudi-FjmkYQzkfsLqIhLGOlmPa9sEJwO0RJmxKx5Xh0uwAjfQhn5BQrVd0FoJfmo9nXMXDAfVwaF2k70-ZlfPdctiGvyIJ6OmVnNDVLVhwbVXCdjnUSDuTMzKT8wNopM6zNTXDDmHZZo22SbtJDZvYVKgJevqkADgoZszvlF71kskMG80Ku4FEs6nvqy7WWWbAr83peIZDGueVaUWBaojA2QaBZhiE2Z2PZUrBkYPklcXIgopq_y71lK5wmLzDk18C3ze5TYvTBfEHQ5j0roXspvhUI7lNKIyKqMpZjJDHgM0seF6Ud0LZJQSn3Q-r36iBlddKkKz-kS63-W-9zWSLA6hpxqRrQftFBCk1wiMdqyfbdogPsaTVuPEhibzBtVQrMPXl20G8Rd2G9DGNwIwq7p6WTpszJHakNsx91tUDUxbz5v4t3sZRtrvM2Q8bxcXPAk5rMs57-xsDRZ42oFv5iD3UNA05K3TGYsaDOxqoo6wD7l19sUbh4VlVBcXDlLYLSRzWVFoR5WClwwd5G3shAT-JG_YrthXU2rojF6aMCNOhlH6dwmrvQaZjTqs-b2hpFzpZLNezqyhUZK3I1RMoQKSOeneFtE1sBg3GpA5FxcF-KUNmt03HPyPBmite_xdFxc8RnoKz5zkNOFvo-7846Pq-74OCkvO-844d0eSZXR6JY3euTCow0r8DPq7kPQhDovk9gysO8PRVejuClYfhiAhrIdQHFloVwiukPw_IPAgw6JToi9f_zMlTvcndc0v3B4F4oTDaLSwDswHAsMM5qy5K5BDA4CERgQmSHKYvxKGK5p5iCGeyQx0CCGNGFpRLukUeZ3O4kajJPJ08W7Q1QZH41twTbqzN4wrpHttRDRUN5B_3XNxL5bYyROlwkTF7LwjmG1BcBW85-wY-mNTadL7qwpt26xC32rNUwGirzc2vgsM10StG92VQPWBjcxSfaMrmdgtue0JseFsrzsnW6yk7oaLmx4P9CP-nx0F_ndLRJzoxUPgvFFafd9s7eM1-z-tr9DIEaExB092ApDRr4e1jdVSA8SbRXbR7Ta1pROswwqkh2rympka12N5LM1Q7ddT4dwkG0j8A3LC57ShPyUSr9AB1wiRHRSqrKZzeRE3JC0XFzvSYOw5sWbjNEG0Ra3niHYjiig8vgZ_IHUxBSwPZbnPA_cYDaPl3coYBMtYFwiw7tw-N67-vrw4753ua1BWxEXKFwir_CZnldDuIa9YrM2tCOYlPNVXFyQDOaPrOk1WdFLRuaMpWTNL8H54TmJGAghi47JXxgpNjkjJVwn4YqFF-QaLz4XGUtcMIDlsebWdKa9tspXN4-wv69_AxZ6drDnxxSjC3RWfwrSXujLcLhCMCv4NS9XgD1ZIIoyMzg7e8fz_PqIzMF9TtVzWMowZZGaMdEeAVtiXRyTNwkDl4yU-TWhSxqnBOyQFcEVQKJ4sWAY2SUX7PqK51FxjPmw5n5CHDF9CW3r1SX2czWhteeT6rnYXCekZqpdpMMwQQvNDGUma3j8QqcYfpQhU29t2EKB6sc4IHZzVtdKEzVDDMEWxc7GaqQ6klHdF7SguOJcXERw8nAbMasVdqkDTTUKxEBan6gtChPCMvEBEbgS_SkjVTGe0rX2JirLtJWybgsqS2Ffs7Z1e1ir_gGt4uafxOHFwY32D0OgMqk7m5XHoWqJXoWOfTnACotbM-pUm6EO6PgNiizn0SYsHbClHL1szK7oi36kce7gnuk0g1qBTaEetvXab6fbpGUt2oTvUENBKnPgCfSdZVR7auPA4xwCv9_jDVPy0lwi1gZXvYVVuU7k2h7VLx1sUgcze6V-NjcfnnzToGl7rA6WwJrBjPEP8vpAvWbBMhEsOzMPV5592wKzE8_ev_7-1Vvy8tfX787fvn95_tOvr0GjeoI4MA2ZO_E90LNrJtWrMhlIiZBcXME2ChMKOxR5V8LncpOy6A_QVIBN6f6rqxlBE6N9--L4rvfFWvd3ujnea8Kt3wQuLMCe5PLN4pNcMBr-c7xGVU82efKdwQxtvOJYJpbSLJaAQdU_yUza579mLP0jJtqCP-0ewU98FMCHXDA_DOHDED-M4AP8xL2nz558M-fR9adcJ99kNELBmBIXysAbWcap_PyZPPnmWInNETmuZOgTPBCZtbLrKen1sHeZ5ntEupJ5G81-Ug0hhlMydLOPQGCl5kLZXDDKoEY9XCd3SjxBarMrPzvSnpk--QYbI_VC4o1FNdHnle7BxdrN9n1BKCZxSr71x_1oMIYCXCK4t6CoDcDvbw-g79ZaGvvjcDJ8dsiAalxcpujYJBq-NrWDs6KleErovFwwBVoy0dMCGhi4_wafQZ6nJBjgR-cCtVqVOT0l4iNq1f_-zgHyp1XB32UB1lrzf96sDsFKxY374TetcUNy8hlw1Bq4CB1UwghhQ2ICOX1RXFxkCQVRj1Mxu3PwhS5wNvTpRLaY4SX2Wpz4Tc2i8xtEXCJepa9XNKk9i7pINktFk7XQoCtad4c1Eamfs6mIrKGvMYB73lZF43uqapoTzw41Orb9iE-0yVHHA9Tgu8ok9UdtdDWO6hW8ZgXNS1XeJKsBg4zpd1s1YBm2VKljM9yqe13dXa5qGniq8jo4AxVdqiOD83gOxeQX4SgUtYjiDnBwUqw6dqilDo9IqYJSp_JUxEvEkFB4JPV4mGjzRywvtC_TJK3z4dp1aoOUVQwfruLDuEF4gypORYRB2Z193LiXQpfiAqteWjAQL1QtV41LbuKapfVmj7GrX4cQ5nLfhsJrlQOAAlBrXb4Kra2LPl5nb-1h0NnDqNmDsB7aOxiO_LYOgmB84BAsVdDew6gdpGA02t2DuHCre6iJTXsfA_li-S2YRoOOUeDtZXwfiIlvibbNIUMVlqoOGXQoSh4yoKDW4k0qK0hn31r2lI5rBebpb9sPTVXcEMVFUbks0dZHv0klhh1qiamreFNjfoHU4E-LHfbval95Xlxc0axHwKd5LsOnxYox8BS0SrfYQ6utKGleNv7nJg0SltrWL6p-mV7WgdFkC8GZMn8rG1papg1kM-Cby3c0iJDoXFxMpVwnE6Bk0KwQaXrywUS9FNImFukZ1QuO0J1Qcamqsdp7IMyDoJnTbZ5UEqECELVIZ79hhhtO8HY0vlwnKWJrPtPvvOZZRfP5_1wwbPje7A';
					$theme_options['classicinfo']	= 'eNrtXXtz2ziS_z9V-Q5YTd3VpMa0SYp6JvFtNpOd3a3dSS7x3N3WVUoFkZDEMUnwSMqPTeUD7de4T3bdeBGkKPoR22NX3SSOJbABNH5oNLobDQ6d-6PZ_Es5n80H5WmchTzhxeBlOZ_MB9-twjH1Xfw2ng8Sesm3FX4J5oPzOGL40ZvOB6ttkiywYMESlrKsKgcv6dybf4nnrqy6YTRi0OpXqFww7a4TvqTJYknD03XBt1mE9BNkYjQfxCldi6bd-UDxIYriyCqENguWM1pZZcBJzsu4inlmlXrwm1YVDTfImfVcMAZRxv-we4LOm6Mf4R_JNXQYZxkrnhLTMKMJR-DjdG03Pq3LgcVFuC0rntoEPkwRg8HCHK049k-Roy9iBCuaxsml6u0Dz_M4K0Wl4XyA2GxzpybxocIJ3fCUHpCfoMUz-F3SrHRK6HylGjmjRUzlKFwniNB6m1AxHA9GW7GLyqkKqLPihc0kDA55czQcwLMXiFoeDC_OmLNh8XpTqWf-SLeYsKpihVPmNIwzgQtUcLugnETTyczTiNAkcZBVKd-iUTlngeREzfCa83XCpNC4gpNTx241Yiu6TSozEea5Y40cmvzOdQVTKHkW0YafsZpBtqTuUFAB7xtvgesMBmVmbXarSQO23sCUJAfkTyw5Y1UcXjFt0MpYcXvDKQvc_VMW3GLKXFzXD0fL_llBqPynB9Vw1CPd0_uDavgEoeqRquE9SlXw9KDyvd9GqkZPEKo-qXLvD6rx04PKG_dIlXc_UPnSzHyEOKEdENI8rmiiIOrSWT2QBeN7k65yu3ykqAFG2zxnRUhLdhuDb7gfM-jaPRz1m3y9ghbCE7ADHxqybzSPR_dlHu_HyhOe4ppV_78jXgHTcltVPDMwjR8MptHNVFf_4PcPEXpS0YFFFVdY-pCDvO0-NrlyUKslLRzbhYf5L7TIaILFcr0wQtEOtKAalkT9oYUJBlKqKp8fHSU8pMmGl9VRtM0TdsGPznNHKaWjagMwl-aJqF8ercDlr2C2kN3l-vDXfH29OAVwm3Gn_n77gIVYGMp73dElypP9asGBE1WjBqXnm7iSM-M3SET8YtFoL4qG8J_gbKJoNzSLElYs4hA5p9DgF0GbxMuCFlr6ELx4Jb55M_NQLEt6zkqeMu2UryhZUYcWBT93XCJ-ntXOuqyC2gO6KrWnfxZCERH_OsvtcpkwPfm6Rqtv9RX5JVXsXDCw2zZbYVot1DwbSUpgmqGKsyq2MUYqXDBSf9iBwVwiTHjJvhmJoInENr9THHx3BwfF9q2AMLIlAeiSLSMvyyrrXbZ-0Fwi7BBDj02GSymyume1HQLZNs0WdUwVldRibKTbXq0Fo6c5jzMde_V8qc382T5Cp47pWfS4zZQbfr6oeL5EG2I59xRYsqQxXpiqiBagkNil5sqiag0WFV0BTHzvHog_LzSUqkrPWg5aRK2Wfc-0TOCvPxrB70N_9ELLmaqcsFUlWrC1Us2AUMnmuT-CVl9tExImtCxfI5FQnzSsBsevkvj473xbkJMCeGER8QPyXCf4XpJPrDiLQ0Y-FPwsjljxu1dHQPv8GdZ4FevG5HJg2RlLeM4cDi0ewXNKNgVbvR6kNE4qPo-zFf89u6ApCO1hyFP8GRy3S18d0eOeTvINz1ir_e8Gx-QH4k1d13Vg4h3PHwZ2M0fb5LgJTo-EBR00e4QLm8ONvS1HMEV1BaHXDFX_fjcbyv2uhA1Pre3D8DLlidzgEB5d7kS0olfvgbrnu9xcMFHyQ-iSFWTJKz3Mb9gOEVwiIfDe5MAPDoawmg5d74XUXzZ8PWvKs8ieslPcFx4e-Te3xX3Xn_mrXptOiLzG7jf1jkffYrPu8V8eXDAzVBRRWGzT5WN0j68ldn2e8m1cIn3j6RgMgStdCQPhWczOO46LRo1VrXkaoltqTF2J_jbdr4LxTM6ao67NfNzczA9Hcj9vTPMGz3vrdhQ6mTG_aHS2qJAwBNVcXIRas72lFVvz4pK8KcJNfMbKOdmpUdG1rhHg-eG6RYzmrCEGXVxciT0xXsUs0mx-gNKS1OUENhlWqL6mVnW6rTa80N0BgG9EQZu9oT7DXjSEYTw2h2_y6X7U_QZNh61Yn7XjDMHGgAKfLHSlx3LsfOW25Y8PhrBtzUBuJkO5bQ3ROmRlDl5cMGC6uAIH8Z_WXDCK1qrdNN0DaaWqMSV8zavLXFwzauDRj5T5B938WDsLM_mwR1uNhCZK-aMJ5fl98fXJrXS86_cHcCYSJZFKQEHpfBGdNQRN-KygC5xtkQjUXCd3bcAhB_5hLgejMk8epDflOwo5SelFUwtMZ3qFt54vUr6MEz1po5GWnxLk4_RyobNipBuGrm5Dxywkmao9cXVcJ43a_S7qrIu6re3NwvUO5F_3cDZ-YYRITrph5ppzX-sZe45E6ddurBqjDUYttVsy0NEb47JcIgyiZBFnuXSgsc0TWPvkP3kRkZMNy8g7NMsPD_WeJmvg6tIhyFrzzVo9AVI0Sb5N117fc5C_ulUwBg7iC7m1XUMPIwxyOsFT1j9qRlWoWQ60rC4lBCiQ8YVWKAoFrSqHUPTfYQrah4eg3xxMRSlJxWFZxflr3O8_D5rCi3Gqxb6AKNKhj1vCCE91EAR9WLH7AqSvovhM-7iyQUcE7I6J_UQW1d6wFf4hJu4jnGNcJ8RplB7yEbSg_93tRukCoN0Mj09YwkT9V0fw7dVmdPwD-NFkMhuR2TTwoHSkWto7qupcXO4XU_9OR6XjCjcf0zuMPJA3UQSbaWnGtRtxaA7N7xrapmAqBBfc7ZQlNGQbnqBavPH43q9WGJxpD5DAvP2BJStaVoSesQPyR1gpcUR751DMvRUuglFa8ZWf3p2Qf__l_ck7jKto7aLEvxGHGkH5q_z4XCdWkTfkHWi4FMzfV0c5MObroeSbBayi45nrEi8Ykcl05gJrvonRaAuoEcAaTkXDH9n_bBmOK8NGCbR6_CYXQRrUHqYZtIhVMyr82B9bt1YyBQu_ZfO6XQve3oYazU126a5yN4beC121uXv19jQM9pK3Q4qujrD4M9jvRgfjMRqrL1rjEhtUT0RUWUQl41pxb7wNTxnPpFGIBoNkYV94Dac3ZWuKVA4q80Jk1Sp7wN-pvlwn8oaENM6Q-JFFKa7nbY_v9lxcunYg9gcsjBFmA7fPDRnX-C5oWKETgtvgHk8PnZ1u8l5nB1dBVPAcj5J-g5n8xtSC4f4p9Kb3klrgK7z2z0ogrWE9XCfdxP1zMrOq3ZUHfpVV6BqrsOL5XZyt6vEouddCJtVjyXJa0MogZo57vFo1mU1Dn9vvyiTqoL-AKlxcxRn5RB_L6X1fwsstwng-xT_9Uul1SszCe3yXBYwvtodl_-mxPHx6LAdPj-XR02N5_PRYnjw9lqdPj-XZI2bZ37OVuI-XZ8-EXCdXnFdWbFNsmFiyCCt6ZfJLTbnkF4ras7reS-Rfh2jYivvZRH3B1PEOact4bJlPFnGPu-2q-5OK2uZcMC0XYeqAiaZmw1xct6zJ94UpZ95dx8Nln_eUPNEXAr2-vWsWD05WXFyUlQaqS-SGi5mZK5u2N3ulTfmAUeK7yS-ROclDdzyscwPtMfXIKgZkMJcv2ovqBFEVf8xpRaPCFeKNq2GnwiOJw9_kBu50RU1iRHM8_YE3OcNXyiHCtEP6uI8r9mBlC2LQHlR_gpMRwfxSxkYx8irGAYy_1aXkf_9JxPlFuC1QypxLRovPxERz5dkGNItHVJ8Hx_V34e1-xggveZMkRLRWkoKBm3rGosP2FmPYqJO_px1HXCefTXosX8fZlSlw7j2cacbZnapwXx3v3KF6EitoZk5dl8C0FIYkTuPKdtHxeAofy0yPcCHSWwEVcc8g26bL2gbB6RAtYc5Kyos6vA8j_Ahl5G9QqL4LQisNR7WvYwb4uDYo1Haij7H8-rluQdwEB_F0zMxqbpCqOTSoPpvqNBfMbllI-YGxUWRan1xcAjCfsETbJrukpUxXLVWOt3wbAxoQNGRLzk8HL2OBDGZunseVWNLx3Jdtr_NkW-L3oUQkj3HNs7LCskDlVIBEswhDbMrEtqdcImVg-CRxKaKYvkoxZxldJiwyx8jAt8zAUWL3xnxB0OU8KqF7K7-VCu1QSiNcIqtyimImk7wxTB-Xph_RtUgTkboDPv6oPmLOFV2rwhO6xvpf5T63MxKsjiGnhhHtBx2U0CQCY9u-OzTAfYOmq0cJjE3mTWqhuQpeXbQfxH3Y70IY3AjCvunpZemrMkcaQ-zG3W1RtTFvP2_j3e5lF2s888t5Ua14EvNFXvBfWVgtXCIgjhNzl-HNEuweApqWfGQ6Q0GaiXVV1AHmrD2QekBvHjWVUFxcBUtgtJHNZU2hHtYKXDB3kY-yEDPSkb9yt2FdTauiKXpowI06nkbp3CWu9RrmHOrT3u6GkXOlks2rKPKVRkpcXP9QMoQKSKePeDtE1sBg3GpA5EQX4pS2a_RcXOXxPBmita-q9NxiGelbLEuQ05W-crr3GourrrE4Ga96r_Hg9RVJldPolpdW5MKjLSvwK-ru66AJdd4msWVg3x-KrkZxW7LielwwGspuXDDFpYKa6A7B868FHnRIdMrq_eNnbpXh7pzS4tThfSjONIhKA-_BcCowzGnGkrsGMbgWiMDAXzloYGUxPhCGKc0dxPAKSQw0iCFNWBbRPmmUGdhOogbj5PJ08e4QVcZHa1uwjTqzN0wbZFdaiGgo76F_WDNx6DYYibN1wvBCmrhGV28BsNX8B-xYemPT2Yx7a8qtW-xC32kNk4NcIq92Nj7LTJcE3Ztd3YC1wc1MGjyj6QLM9oI25LhUlpe90832UtfDhQ3vj_RCn4_uI7-7RWIubeJBML4L7L4vr1Zxyu5v-7sOxIjQu4uc4Qu8QkYeDuubKqRHibaK7SNaXWtK5zoGNcmeVWU1srOuJvJZytBt19MhHGTbCPzAipJnNCF_zqRfoAMRXCI6KVXZwmZyJu4wWq73rEXY8OL1UNqt7XDrGYLdiAIqj7-CP5CZmAK2x4qCF4EbLJbx-g4FbKYFTCRglw6_8jq6Pvy4711uZ9BWxAWKyDt8pufVEKawV2xTQzuBSTnZxCXJYf5ISi_Jhp4xsmQsIyk_A-eHFyRiIIQsOiR_YKTcFoxUnIQbFp6SS7zJW-YsAVww1oeaW9NZM68cVbt5hP09_B1V6NnBnp9SjC7QufUZSHupr6vhCsG83J95tQHsyQpRlGm5-fFcJ14UlwdkCe5zpp7DUoYpi9SMifYI2BJpeUg-JAxcXDJSFZeErmmcEbBDNgRXXDCJ4tWKYWSXnLLLc15E5SHmwuphl3HE9DWxnbdz2M_VhDaez-rnYp-Qmqlx1Q3DBB00C5SZvOXxC51i-FGGTLO1cQcFqh_jgNjNWV0rTdQOMQQ7FHsba5DqSEZ9o8-C4pxzEcEpwl3ErFbYmQ40NSgQA2l9orYoTQjLxAdE4Er0p4xUxXhGU-1N1JZpXCdl0xZUlsJVzdrW7fVa9a_RKm7-SRyeXrvR4fUQqE3q3mblcahaouehY6fnW2Fxa0adejPUAR2_RZEXPNqGlQO2lKOXjdkVfdGPNM4d3DOddlArsCnUw65eh91026xqRJvwNWEoSFUBPIG-s4xqT20ceJxD4PcveAeUvLWItcHVbGFTpYlcXNutCynbzMHMXqmfzd2D589aNF2P1cESWDOYM_5Z3jto1ixZLoJlx-bhxrPvO2B24vEvP__47iN5-_7nT1wnH395e_Ln9z-DRvUEcWAaMrfWB6BnUybVqzIZSIWQnMM2ChMKOxT5VMHnapux6HfQVCBeEaH6ry9HBG2MrtoXp3e9Lza6v9PN8V4Tbv02cGEJ9iSXL8-eBdDw7-MUVT3ZFsn3BjO08cpDmVhK81gCBlX_TWbSvn6fs-wHTLQFf9o9gJ_4IIAPAX4Yw4cxfpjAB_iJBy9ePn-25NHll-fPchqhYMyJC2XgjazjTH7-Sp4_O1Ric0AOaxn6Ag9EZq3sek4GA-xdpvkekL5k3lazX1RDiOGcjN38Agis1FxcKBtBGdRo5uTOiVwnSG125WdH2jPz58-wMdIsJN5UVBN9nuseXFys3W7fF4RiEufkO386jEZTKCCCewuKxlww_OHuXDCGbqOlqT8NZ-OX1xlQg8sMHZtEw9eldnBWtBTPCV2WoEArJnpaQQMj91_gM8jznAQj_OicolarM6fnRHxErfpf3ztA_qIu-LsswFop_8fN6hCsVN64H37TGjckXCdfAUetgcvQQSWMELYkJpDTF8VlnlAQ9TgTs7sEX-gUZ0OfTuSrBV4zb8SJPzQsOr9FJOJV-npFm9qzqMtku1Y0eQcNuqJNd1gTkeY5m4rIGvoGA7jn7VQ0vqeqpjnx7FCjY9uP-ESbHE08QA1-qk1Sf9JF1-CoWcFrV9C81OVtsgYwyJh-WVMLlnFHlSY24526l_UN4rqmgacub4IzUtGlJjI4j1wnUEz-JhyFshFR3AMOTopVxw61NOERKVVQ6tSeinhFFhIKj6QZDxNt_oTlpfZl2qRNPlxcu05jkLKK4cNVfBg3CO9QxZmIMCi7c4gb91roUlxcYPVrBUbinaHVpnXNTVxcsbReejJ19QsLwkLu21B4qXJcMFBcMBqtO9LR6ehiiLfNO3sY9fYwafcgrIfuDsYTv6uDIJhecwiWKujuYdINUjCZ7O9BXFx51T00xKa7j5F8d_oOTJNRzyjw_jC-scPEt0Tb5pChDkvVhww6FCUPGVBQG_EmlRWks28te0rHtQLz9Nfdh6YqbojiqqhcXJZo66PfpBLDrmuJqat4c2N-gdTgT4cd9q9qX3ldntN8QMCneS3Dp-WGMfAUtEq32EOrraxoUbX-_x0tEpbZ1i-qfple1oPRbAfBhTJ_axtaWqYtZHPgm8s3JYiQ6FJMpVwnE6Bk0KwUaXrywUy999AmFukZ9SuI0J1QcSnVWNBO3TZP6olXcYZGQHPYsrZNh3gBGl9YFLGUL_Tbm3le03z9P797cTs';
					$theme_options['rtl']		= 'eNrtPWtv3MZ23wPkP_Bu0FwiRkSJr33aVm-apLkt0KRNHKBFESxmubO7jLgkL8mVrGv4gx_JdYP-icJtnDhPIclN_bW_Yvff9Jx5ccjlUitHUiSgcWTtDs-cOXPmzHnNGZoMnHZ_cC8b9Aet7CCI_DiM09bNbNAdtF6b-B3iWPitM2iF5Dhe5PjFG7SOgjHFj3Zv0JoswnCIDUMa0jmN8qx1kwzswb1gYPGuM0rGFLDehw6AdxrGIxIOR8Q_mKbxXCIaI3wXiWgPWsGcTBlqa9ASdLCmYKw1As6UJpTkWhtQksRZkAdxpLXa8JvkOfFnSJn2XDAmkQV_0keCwcuzb-MfTjUMGEQRTa8T0bCiYYyMD-ZTHXmvaAcSh_5cIsvjuQ7gwBJRmCys0STG8QlSdI_NYELmQXgsRvunOEmCKGOd3EELebNIzALEgQ53yCyekx3jXcB4CL8zEmVmBoNPBJJDkgaEz7KLHJouQsKmY8Nsc3o3N_MU-kziVFwnEiaHtJmSHUCz7bFeNkwviKg5o8F0lotnTltiDGme09TMEuIHEeMLdLDqWNkd97p9W3KEhKGJpHL5Zkj5mnmcErHC0ziehpQLjcUoOTB1rGM6IYswVwuhnpvazAHla5bFiELJ04Bm8SEtCKQjYrkMCmif2UPcZzAptWr9l1o0IOtNWJJwx_gDDQ9pHvinLBtg6Qhqz7hknrV5ybyXWDLLcvz2qHlVkFXO9WOV226Q7t7Fscq9hqxqkCr3AqXKu36scuzfRqra15BVTVJlXRyrOtePVXanQarsi2GVw93MK8hcJ_QDfJIEOQkFi-p0VgPLvM6FSVe2GF1RrgGPFklCU59k9GUcPnczz2Boa7fd7PI1CpoPT8APvGyW_Ur3uH1R7vFmXtksUpzS_P8t4ilsGi3yPI4UmzqXxqb22VRX8-Q3TxFGEtmBYR7k2HqZk3xZO9Y9dVKTEUlNPYSH9U-lyEiA4Wg6VEJRTbSgGuZAzamFLiZS8jwZ7O2FsU_CWZzle-NFEtK78d5RYgqltJfPgM2ZesL6Z3sTCPlzWC0kdzTd_SSZbpenXDBqo9gsvr98woJtDBG9rukSEcne19iBC1VwDVqPZkHOV8YpgbD8xbCEbzx24T9GWVfAzkg0Dmk6DHyknFwwwnsMNgxGKUml9CHzggn7ZvfVQ7YtyRHN4jmVQfmEGBNikjSNj8xxfBQVwTrvgtoDhspkpH_oQ5PB_jZHi9EopHLxZY_K2OIr0mvkgQmMXVTJ8uf5UKyzkqQQlhm6mJN0EWCmAljquDU8GPphnNFfzQmvzIlFcq58cKw1PgiyX4oRSrY4A-pkS8nLKI8at63jVVwwa8TQpl13xEVWjizMIYAt5tGwyKmikhp2lHTruzWl5CCJg0jmXm2HazOnvwnQLHJ6GjyamWwWHw3zOBmhDzEa2IJZvKU0X1iqMUlBIdFjSZUGVZksKroUiHjd2mF_bkhWii4Ne9mrXDBVMDu2wmzA_067Db93nfYNKWeic0hcJznDwOUMet1ahIYfkiy7jTBMPRI_b-3fCoP9W4F8xIWXRoc0jBNqxvB8D54TY5bSye3WnARhHg-CaBL_nt4lcxCxXT-e409r36g239oj0B3x14yRzOKIcvRv2Kbjem2z0-31TduyeZ-9Rbhf4RuzJGparudsmpaRzzGBiJnCTExRTuG11v7y-fLH5Terz1ePyxTWghjLZ6vHy--X362e6PBI3b_BPjOz2Afra7KhjDyOwzxIboORaH1sXDBCQRoCwh4XaWRDfIWt4uqfma015-Ny24zAQmR_XFyQlJYf5MchNXFfl5p5YrTYm9qcni2_Xf6MM3qxerz6d_i1PFk9Wf6Fz_ApTPgFgJzgHMt8b9hzXg3Mhu2G6NDVOWVnMV2v4M7peOEUs4371QdLTVNjFOeC9l9jxHESbJva3R3H23FBB-xa9g2udfUJNmgCWwO7zqF8U1K77Zw9gnAsp-9MGj1RJpaSd79pTN_-NZ72hqjrEniGm3nsp4v56CoG9VuJXVN8_zL5yU6vA-7LqQGQYuFhQI-EqiFhWMRA7dK2ls0uJh2UnuTsX8xLehLGKhQrHiVqi1Tng3TKPshum7shpXWe4TF1gUewXCdSXiMZHw5zBPRJTlJfjrx6sPxi-RWzG6tPl9-uHoAZ-R-wHc8Hax1zMhUdXcAMVuZk-ROY1QcIzQ3Pfy9_QrOjuqN7rrqDls6ZDQ0mAWXq3QX-sIH5kF-sHkg6fl59BniBrOdg5wQpPQ0XWeSzOJXT8HRqJIr_gr8fDKQ483P68irZYkO31WN9japhmQZSXR5pIZzOjgsWog8r1HVvSA6DTcG9Eg4lhqtyzn6qxavOB_aFi-4wzRIIe4JDOtzMFBYkEMdxulJ5CFit9-ZYhR3kT-P8OJGUKv7IR8JzhHHeLsKjPn_YoOnaTIvN4yuTvHSaThS6L2UfLKc5ZdXlXFxixRMEdsI9NlhJ0liUDmrEXFykIeO6SNFkgz2Zf9n1j-fgXCKznAyGCLLdHIOCOT1tgxTsJnwuotTmMgYTsTKTkjm5OywfR_Tkbq88H87jURAqN8iV0pOBdBwcD2UVEA87MbQv6ZshBxO9u5YcpNR7s_Lp10Fu1EH2Dv_f2u13bijx4cutCNly1QsVoy8Pa71fz6fSTN1uRf1mFFT2TIXnyALWMgyiRCQLPGYSHoHi_9JYPWKaHMzA16tPDVDxGLo9NnZ3pVHkvXGPydRroVww-5VRgWtgvC8r9uC_6jUxJkyCu9wEbqGOkc18advtHfkjVlek2PlEWRQpbBsG5Df1hyrUFvPShBTzb8NNiV6Ew2RABjM4kMkdib0LLLs1Dg5lbMwRmiwRuW_oT3hTkTjQ0lqGymexPILp4zLxXFzFHmCQf68PI7Y8wM7c_Ts0pKz_rT34dmvW3n_Ddlxco9tvG_2eZ0NrW2DaOKv8iFuFnnOus5IZmLPP6R3M0RhvjsdgMzM1r_XUTHlqTt3UZikVqUXvfJcsJD6dxSGqvzPP7_3JJPDp2gQNWLe_peGEZLlBDumO8XewE4IxaVxcQ7b2SsgxKanngN59547xzx-9f-cdlRFRtZvl_Fob2m8l--_S3HjTeAe02ZzkIFIJEObIqSSzIbjV-33LMmyvbXR7fQtIc1SmRTo65QxXjyH-gP5xQXFeEVwiNVww6_6bCUu1oHZQaNClFWhEWrX5zEDbyQRCgLJV61h1G36juemuw50Wj7j2Ddm1bKkaR0JdvwG8miq1ZA7G6YNta-90OuiT3qjMixmjhnyU8HsyGkvFPLNn8ZzGEXf90DHgJGxKkuHyzumUIJSJyjpl1cLC7jtr3TfkzxCQBBECX7E8xnbxeOd8z9u3OEh2lLOlM24DFoy6JNiQ-DnGGpjULQTD40cejCPuJuCaiGbC_pN7YJzGCR6Q_Qbr-CsLJtzNC2j3LqRgwhH82npN6oGb16SvdbusfLOlfL48Ts7jxFjOR0i9FDKuHDOakJTkimPqEMsuFJMyGbIaYV0mUQP9AyjCSRAZH5KrUpPQVMbzEmk-h-CfZqm0ayVmaF-9KxAq6tpAsnP9SHavH8ne9SO5ff1I7lxcP5K714_k3vUjuX-FSXY2mBLrCtPMDGMM9nTo5-TU0p0CchTfFdC2nlPaBORsA-RWsnc6UFO1UmcNtOIkVtwkDbghqLbE7U8BrVOAHgpzacAVE1xcV5dFC_BNyca-fd7JbT7medY-bpnI3N6vVQKHixWkWS4ZVVwnci5uc7FWOuzGE1QmLRXIS8z1nk-dCQ9hXavjFpWN-pwaZBXTLliJON7I1S5ylf1RZw-lDqeIN-6GtQ5XJJt-lvvDvQlReq88n-b0Gl_hU-UQ2bQGerUPHTbwShdErzqp5kJcJyWCyTHPgGJ-lcecMNjy29XD1ZPVQ35K_9nyp-WJ8b9fGaz8zl-kKHDmMSUpq7jj6Vtemgcj4PnTx6394jsLcD_GlC47KuI1CHJcMK2a4Stjt2p5FHVFNQfwda0K8GNV8xtPg-i0nELfuoBzyyA6V83uiLOdc9RabGP11dHqCIjmMhIG8yDXI3TX5o95GYg_ZDW7wBV2eVwiWsxHxSEqLgfDhBUt8zgtcvs2rxp5uDxZPjWWT1ePll8vT8TUWQ9ZrgNwYiCZO8DHhcNROSpziucSA7vnDuJrqiWWZCFUeY7Qvd-TRS9Y6zLkggSTJEi9PJ8EBLxKZvVIui_r0BlNDwOfZqKInb9uAn0M4tNRHB-0bgaMS1iIeRTkbNcHA4cvzjQJFxl-dzlTklww1QLNcmzzRAkFSDcdY7ZNeNv6sswp-EZhkLGEpiNq6GlERiEdq7NjoJtX4QgRfFN9Qb7zNRXzfYt_ywTDfS6ZyNy3SE6ncRpQXsWO-fogU-OwoT3M4XP1Ah_fFh-xPItMReMdMsX-97kpXFybCXbH7FPJn3a8GkhAiYxRCf06GKC-BFM3XCJnjA5mdwu5OY29smkzEzfxfp2F3plY2LQ8jSTdFx5LaYr1fLcqUFWeV59X-V0dZZ3XePiXxGk-icMgHiZp_An18-EYgIMwk-c8yxerz7jB-HL57fJr6UYW_VAHqBN1j-sBaUUKKKbBUhrCVMc6iQWEeFgoXDBWdfep0AGfL18Yyx94Bd3PQMxX60NIBFoVXCKjSxxXo5CuAxcaDosU5elvPWKcg9DS6pUbyUQyjF1zEaKEekiWjthrQNoUBYPB-j4TbGYzxhr1F1IKqr0bri_ZNk_g6tdzGm7utOXNnRGI7kRes914dccSV3fMKM4bry7hlR0OlZDxS17U4XuRVHzH-6jOt-FsjzH2U7zNcPF8tCQfFxlNt2OhgqxnIbs4UFwwnSP7nK3Yh4QyaWRVrxfPQXWbDo32nKQHZtzEx75ko1DMG7jYY1xcTEhEw_Nmo7fd_nZ1Nor9jV73ZexuxdM5SUzk6Smy6Umm-iSk0Zg0yVwnL-k28RYqesxmws8jz4_DwkepGBDd91NWpFcC28aXRPd6Q5fLdShdq0RIEE1Dinfz2I3CYjOiI_8C3Pi_GBXr0G_ozi09s1avyS2dgJLP1wyk5thzgHqjWCDQDGFf1ddTMh-Co5-SkjxnwlHTLWJ_I3RpxbBgHoKWH-Xx6qY-57dj1E1WPEfGF6Rd9I3ePJjTi7OP2_CZKfrny29Aur4Uiv5SWH1W5XQlmS3eBYLcqttXsk7SK0A27CwNydre6vJnc4pRv1xcDhZW614kKAa84fgEfjMf-afld-BcJ3_Ol9RmiU-u2IY6pX12lVGL2vsVwFICQM6nim2NZFsBbMhKPGX3MB-UshL4gKZpnHqWNxwF03MUtr4UNla0nZnxqdf15fHKRVu_tUkrNll4i9AzYBl_WT6VzoICnYMJWcw1aAwkYAvj8hvL56tPDQgqHq4eG6s_L39Y_ZkHcD-DRv0W3ZCnq1wnBnz6YfVcMB4_28XbQ7gQ34N5kcHec5YffKi3XDDsN-jG7MoJKWrK5epoDdSjBN8veVo60D3vdCCMbOLI1ykj6Mky_Qi2SyZeEOmggGAJMJj8b5bfs50Nu_qL5TNeBZzsw076AW-SGcv_MPC69uoRLBgs1zMO-Z8G_PUL6IQvMZfMfYdftHief_wOXDB-Rsn4cvVoF3ucLL_B29Lishv8foIxN7ofXCdMgKDHCVwwoNaBTkADc02-AyFBX_er5Qnvy-8lqGtvXCfLL1ww94-olnaxrFeyNQvGVN58W3uBiv5cXAhM6Xm_eM7MFleUpWt9qCBrYIYok0klbcG0m6JH-FZlbJ0aCFSEmAI6rqLThhY6sZpcJ_HWIDZcIiuB8j2n317UWHEUxywHlfrrHNOw0EOZKitBIA-4V4wKK1NJOJXaYKk3Np5wngXhEZlL963wmGshy-6p8FtOQ6t73dthdbbAir5IGPgHWyN1t-NA4eo3ouVnvkIFHPmmftNAS_JrK2oWZlnmopwKRJLG44WfmwlgkttG2WeHjcPjBROtt1nNzHk6hHhYN6pbD7eI8lKiDN_khoKUp0AT6NPCd8FQ7M4syAw8qDLg90cRTN54SwOW_l8Zwyyfh3xvV-7WLFwiE8uUuf5X1yhefaUCU_dYHJmBc4Xl7x_zKxTlnhlNWJ5vXz2c2frVDSy13P_ovbff-cB46_33PrzzwUdv3fn7998DbW0zYE8hUlf0W_sfgqOSz-CjIbwWI0eWHJFjAxYULKDxYQ6f80VEx78DVB6ikuMX9zy8Ko9Os7u987a7peHP1fheaPWwU2Wcn4FnG_P3m_c9QPz7YI6q3lik4euKZ-hmZru8SpYkAWcYdP0bXhZ8-_2ERm9g1TDE-dYO_AQ7Hnzw8EMHPnTwQxc-wE_QunHz1VdG8fj43quvJGSMgjEwLGiD4GgaRPzzfePVV3aF2OwYu4UM3YMHrEyYDz0wWi0cndcs7xhNlckVtPcEXCLk4cDoWMldXDDQ6oyhrQ1t0KNcXGA8MGwGqpPLP5vcXxq8-gpcIjPKjYbdY93YmEdyBAt7V_E7DJAt4sB4zem543YPGgxGvcaK0gQcd30CrlXC1HN6fr9zc5sJlaiM8MgmlOyrUzu4KlKKBwYZZaBAc8pGmlwwgrb1V_AZ5HlgeG38aB6gVivKwAcG-4ha9V9eNwH8RtHwr7wBe83jP52tj4GdsjOPE5-1xxnBjfvAR6mBM99EJYwsrEiMx5dvHGRJSEDUg4it7gjCsQNcXA1Z7JFMhngvvrA1fbxgont0TgWIpdDkXZEqtK1BZ-FiKmCSGhgMiovo3NIQGeWTQpE8VvAlAtDmrXVU4a_oJimx9SyoqfuP-ES6HGV-gBr8sHBJnW4dXFyJonIHu9pB0lK0V8FKjEHCBLoqWzo1Xcq86az1PS4uOxc9FXuK9jJz2lwi2VXmDK7jHWg2_pEFClkpybmBObgoWh8981NmD6sbg1aziFTYW8wQkEUkGh0S57vYnslYpgpapsPS-5QmybsoOixBhwqD8DpYELEkh_A7XTTcU_6SLjxNVlUNbfZa13xWubHHbotqrw7pWfINC37K7TY0HosqBhSAEnaTBzo1Q7j4jwHUjtBuHKFbHYF5D_UDdLpO3VwwHn_ZwRZT0FRB_QjdeiZ53e7mEdjtXTlCSWzqx2jz19uvsanbbpgFXoXGd4yoFBvDrQ4_isxYcfghs2H88AMFtZTyEjVOssRY86dkas1TTz9Zf6i6okFkt175tkRfH-MmUfK2rVwnJu4VDpT7BVKDPzV-2F8Lu3I7O1wiScuAmOY2z-ZmM0ohUpAqXSMPvbYsXCdpXvlcJ1YqIDTSvV9U_bxYroFH_TUODoX7W_jQ3DOtcDYBumP-UgeWnB2xpbR5FRdPymWsFpE_6ItXU-rArMCkeN0ShhNcIu8lkKkXc_BaQdXuVevW1ZNCIET-oZRrdSteuFwiBO9440ubxnQeD-WLt-OkgLn_f9hRBEg';
				
					
					if ( !function_exists( 'tm_cs_decode_string' ) ) {
						function tm_cs_decode_string( $string ) {
							
							// decode the encrypted theme opitons
							$options = unserialize( gzuncompress( stripslashes( call_user_func( 'base'. '64' .'_decode', rtrim( strtr( $string, '-_', '+/' ), '=' ) ) ) ) );
							
							
							// Getting layout type
							$layout_type = 'default';
							if( isset($_POST['layout_type']) && !empty($_POST['layout_type']) ){
								$layout_type = strtolower($_POST['layout_type']);
								$layout_type = str_replace(' ','-',$layout_type);
								$layout_type = str_replace(' ','-',$layout_type);
								$layout_type = str_replace(' ','-',$layout_type);
								$layout_type = str_replace(' ','-',$layout_type);
							}
							
							foreach( $options as $key=>$val ){
								
								// changing image path with client website url so image will be fetched from client server directly
								$demo_domains = array(
									'http://duplexo.cymolthemes.net/duplexo-data/',
									'http://duplexo.cymolthemes.net',
									'https://duplexo.cymolthemes.com/header-style-02/',
									'https://duplexo.cymolthemes.com/header-style-03/',
									'https://duplexo.cymolthemes.com/header-style-04/',
								);
								
								// getting current site URL
								$current_url = get_site_url() . '/';
								
								if( substr($val,0,7) == 'http://' ){
									$val = str_replace( $demo_domains, $current_url, $val );
									$options[$key] = $val;
								}
							
								
							}  // foreach
						
							return $options;
						}
					}
					
					
					
					// Update theme options according to selected layout
					if( !empty($theme_options[$layout_type]) ){
						$new_options = tm_cs_decode_string( $theme_options[$layout_type] );
						
						// Image path URL change is pending
						// we need to replace image path with correct path 
						
						update_option('duplexo_theme_options', $new_options);
					}
					
					/**** END CodeStart theme options import ****/
					
					
					
					
					
					/**** START - Edit "Hello World" post and change *****/
					$hello_world_post = get_post(1);
					if( !empty($hello_world_post) ){
						$newDate = array(
							'ID'		=> '1',
							'post_date'	=> "2014-12-10 0:0:0" // [ Y-m-d H:i:s ]
						);
						
						wp_update_post($newDate);
					}
					/**** END - Edit "Hello World" post and change *****/
					
					
					
					
				
			        // Import custom configuration
					$content = file_get_contents( DUPLEXO_TMDC_DIR .'one-click-demo/'.$filename );
					
					if ( false !== strpos( $content, '<wp:theme_custom>' ) ) {
						preg_match('|<wp:theme_custom>(.*?)</wp:theme_custom>|is', $content, $config);
						if ($config && is_array($config) && count($config) > 1){
							$config = unserialize(base64_decode($config[1]));
							if (is_array($config)){
								$configs = array(
										'page_for_posts',
										'show_on_front',
										'page_on_front',
										'posts_per_page',
										'sidebars_widgets',
									);
								foreach ($configs as $item){
									if (isset($config[$item])){
										if( $item=='page_for_posts' || $item=='page_on_front' ){
											$page = get_page_by_title( $config[$item] );
											if( isset($page->ID) ){
												$config[$item] = $page->ID;
											}
										}
										update_option($item, $config[$item]);
									}
								}
								if (isset($config['sidebars_widgets'])){
									$sidebars = $config['sidebars_widgets'];
									update_option('sidebars_widgets', $sidebars);
									// read config
									$sidebars_config = array();
									if (isset($config['sidebars_config'])){
										$sidebars_config = $config['sidebars_config'];
										if (is_array($sidebars_config)){
											foreach ($sidebars_config as $name => $widget){
												update_option('widget_'.$name, $widget);
											}
										}
									}
								}
								
								if ( isset($config['menu_list']) && is_array($config['menu_list']) && count($config['menu_list'])>0 ){
									foreach( $config['menu_list'] as $location=>$menu_name ){
										$locations = get_theme_mod('nav_menu_locations'); // Get all menu Locations of current theme
										
										// Get menu name by id
										$term = get_term_by('name', $menu_name, 'nav_menu');
										$menu_id = $term->term_id;
										
										$locations[$location] = $menu_id;  //$foo is term_id of menu
										set_theme_mod('nav_menu_locations', $locations); // Set menu locations
									}
								}
								
							}
						}
					}
					
					
					// Overlay - change homepage slider
					if( !empty($layout_type) && $layout_type=='overlay' ){
						$show_on_front  = get_option( 'show_on_front' );
						$page_on_front  = get_option( 'page_on_front' );
						$page           = get_page( $page_on_front );
						$theme_options = get_option('duplexo_theme_options');
						update_option('duplexo_theme_options', $theme_options);
						if( $show_on_front == 'page' && !empty($page) ){
							$post_meta = get_post_meta( $page_on_front, '_cymolthemes_metabox_group', true );
							$post_meta['revslider'] = 'mainlayout-overlaymainslider1';
							update_post_meta( $page_on_front, '_cymolthemes_metabox_group', $post_meta );
						}
					}
					
					
					
					
					// Infostack - Change Topbar right content and remove phone number area
					if( !empty($layout_type) && ($layout_type=='infostack' || $layout_type=='classic-infostack') ){
						$theme_options = get_option('duplexo_theme_options');
						update_option('duplexo_theme_options', $theme_options);
					}
					

					
					// Update term count in admin section
					tm_update_term_count();
					flush_rewrite_rules(); // flush rewrite rule
					
					$answer['answer'] = 'finished';
					$answer['reload'] = 'yes';
					die( json_encode( $answer ) );
					
				break;
				
			}
			die;
		}
		
		
		
		/**
		 * Fetch and save image
		 **/
		function grab_image($url,$saveto){
			$ch = curl_init ($url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
			$raw=curl_exec($ch);
			curl_close ($ch);
			if(file_exists($saveto)){
				unlink($saveto);
			}
			$fp = fopen($saveto,'x');
			fwrite($fp, $raw);
			fclose($fp);
		}



	} // END class

} // END if



if( !function_exists('tm_update_term_count') ){
function tm_update_term_count(){
	$get_taxonomies = get_taxonomies();
	foreach( $get_taxonomies as $taxonomy=>$taxonomy2 ){
		$terms = get_terms( $taxonomy, 'hide_empty=0' );
		$terms_array = array();
		foreach( $terms as $term ){
			$terms_array[] = $term->term_id;
		}
		if( !empty($terms_array) && count($terms_array)>0 ){
			$output = wp_update_term_count_now( $terms_array, $taxonomy );
		}
	}
}
}




// For AJAX callback
$cymolthemes_duplexo_one_click_demo_setup = new cymolthemes_duplexo_one_click_demo_setup;



