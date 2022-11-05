<?php

/*
 *  WooCommerce Settings
 */
if( function_exists('is_woocommerce') ){  /* Check if WooCommerce plugin activated */
		
	
	/******************* Changes in product loop box ***************************/
	
	// moving closing </a> tag above the title
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15 );
	add_filter( 'woocommerce_before_shop_loop_item_title', 'cmt_wc_loop_box_inner_w', 20 , 10 );
	function cmt_wc_loop_box_inner_w(){
		echo '</div><!-- .cmt-product-box-inner -->';
	}
	
	
	// wrapping div open
	add_filter( 'woocommerce_before_shop_loop_item', 'cmt_wc_loop_start_div', 10 , 0 );
	function cmt_wc_loop_start_div(){ echo '<div class="cmt-sboxproduct-image-box">'; }

	
	// Adding buttons
	add_filter( 'woocommerce_before_shop_loop_item', 'cmt_wc_loop_buttons', 8 , 10 );
	function cmt_wc_loop_buttons(){
		echo '<div class="cmt-product-box-inner">';
		echo '<div class="cmt-sboxshop-icon">';
		// YITH Quick View
		if( class_exists( 'YITH_WCQV_Frontend' ) ) {
			//$YITH_WCQV_Frontend = new YITH_WCQV_Frontend;
			//$YITH_WCQV_Frontend->yith_add_quick_view_button();
			echo '<div class="cmt-sboxwc-quickview-btn"><a href="#" class="button yith-wcqv-button" data-product_id="' . get_the_ID() . '">' . esc_attr__('Quick View','duplexo') . '</a></div>';
		}
		echo woocommerce_template_loop_add_to_cart(); // adding add to cart button	
		
		// YITH Wishlist
		if( shortcode_exists('yith_wcwl_add_to_wishlist') ) {
			echo '<div class="cmt-sboxwc-wishlist-btn">';
				echo do_shortcode('[yith_wcwl_add_to_wishlist]');
			echo '</div>';
		}		
		echo '</div><!-- .cmt-sboxshop-icon -->';

	}
	
	
	// Remove add to cart button
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10,5 );
	
	if( class_exists( 'YITH_WCQV_Frontend' ) ) {
		$quick_view = YITH_WCQV_Frontend();
		remove_action( 'woocommerce_after_shop_loop_item', array( $quick_view, 'yith_add_quick_view_button' ), 15 );
	}
	
	// wrapping div closed
	add_filter( 'woocommerce_before_shop_loop_item_title', 'cmt_wc_loop_end_div', 10 , 0 );
	function cmt_wc_loop_end_div(){ echo '</div>'; }
	
	add_action( 'template_redirect', 'yith_wcqv_remove_from_wishlist' );
	function yith_wcqv_remove_from_wishlist(){
		if( function_exists( 'YITH_WCQV_Frontend' ) && defined('YITH_WCQV_FREE_INIT') ) {
			remove_action( 'yith_wcwl_table_after_product_name', array( YITH_WCQV_Frontend(), 'yith_add_quick_view_button' ), 15 );
		}
	}
	
	
	// Adding wrapper div to title and other contents
	// Start div
	add_filter( 'woocommerce_shop_loop_item_title', 'cmt_wc_title_wrap_start', 4 , 0 );
	function cmt_wc_title_wrap_start(){
		echo '<div class="cmt-sboxproduct-content">';
	}
	
	// End div
	add_filter( 'woocommerce_after_shop_loop_item_title', 'cmt_wc_title_wrap_end', 20 , 0 );
	function cmt_wc_title_wrap_end(){
		echo '</div><!-- .cmt-sboxproduct-content -->';
	}
	
	
	// adding link to the product title
	add_filter( 'woocommerce_shop_loop_item_title', 'cmt_wc_title_link_start', 5 , 0 );
	function cmt_wc_title_link_start(){
		echo '<a class="cmt-sboxproduct-title-link" href="'.get_permalink().'">';
	}
	add_filter( 'woocommerce_shop_loop_item_title', 'cmt_wc_title_link_end', 20 , 0 );
	function cmt_wc_title_link_end(){
		echo '</a><!-- .cmt-sboxproduct-title-link --> ';
	}
	
	/**********************************************************************/
		
	
	/******** Changes in single product view ************/
	add_filter( 'woocommerce_before_single_product_summary', 'cmt_wc_single_wrap_start', 1 , 0 );
	function cmt_wc_single_wrap_start(){
		echo '<div class="cymolthemes-common-box-shadow cymolthemes-single-product-details">';
		echo '<div class="cymolthemes-single-product-info clearfix">';
	}
	
	add_filter( 'woocommerce_after_single_product_summary', 'cmt_wc_single_info_end', 1 , 0 );
	function cmt_wc_single_info_end(){
		echo '</div><!-- .cymolthemes-single-product-info --> ';
	}
	
	add_filter( 'woocommerce_after_single_product_summary', 'cmt_wc_single_wrap_end', 14 , 0 );
	function cmt_wc_single_wrap_end(){
		echo '</div><!-- .cymolthemes-common-box-shadow --> ';
	}
	
	/****************************************************/
	

	// Remove breadcrumb from woocommerce_before_main_content
	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
	remove_action( 'woocommerce_before_main_content', 'woocommerce_page_title', 20);
	
	
	// Remove Page Title
	function cymolthemes_wc_title(){return '';}
	add_action( 'woocommerce_show_page_title', 'cymolthemes_wc_title' );
	
	
	// Change number or products per row to 3
	add_filter('loop_shop_columns', 'cymolthemes_wc_loop_columns');
	if (!function_exists('cymolthemes_wc_loop_columns')){
		function cymolthemes_wc_loop_columns() {
			$woocommerce_column = cymolthemes_get_option('woocommerce-column');
			$woocommerce_column = !empty($woocommerce_column) ? $woocommerce_column : 3 ;
			return $woocommerce_column; // 3 products per row
		}
	}
	
	// Display xx products per page. Goes in functions.php
	//$woocommerce_product_per_page = cymolthemes_get_option('woocommerce-product-per-page');
	//$wc_productPerPage = !empty($woocommerce_product_per_page) ? trim(esc_attr($woocommerce_product_per_page)) : 9 ;
	//add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$wc_productPerPage.';' ), 20 );
	add_filter( 'loop_shop_per_page', 'cymolthemes_wc_loop_shop_per_page', 20 );
	function cymolthemes_wc_loop_shop_per_page( $cols ) {
		// $cols contains the current number of products per page based on the value stored on Options -> Reading
		// Return the number of products you wanna show per page.
		$woocommerce_product_per_page = cymolthemes_get_option('woocommerce-product-per-page');
		$cols = !empty($woocommerce_product_per_page) ? trim(esc_attr($woocommerce_product_per_page)) : $cols ;
		
		return $cols;
	}
	

	// Remove "product" class from product thumb LI
	if( !function_exists('cymolthemes_wc_remove_product_class') ){
		function cymolthemes_wc_remove_product_class($classes) {
			$classes = array_diff($classes, array("product"));
			return $classes;
		}
	}
		
	// Remove "first" and "last" class
	add_filter( 'post_class', 'cymolthemes_wc_post_class', 21, 3 ); //woocommerce use priority 20, so if you want to do something after they finish be more lazy
	function cymolthemes_wc_post_class( $classes ) {
		if ( 'product' == get_post_type() ) {
			$classes = array_diff( $classes, array( 'last','first' ) );
		}
		return $classes;
	}
	
	// WooCommerce: Ensure cart contents update when products are added to the cart via AJAX
	add_filter('woocommerce_add_to_cart_fragments', 'cymolthemes_woocommerce_header_add_to_cart_fragment');
	if (!function_exists('cymolthemes_woocommerce_header_add_to_cart_fragment')) {
	function cymolthemes_woocommerce_header_add_to_cart_fragment( $fragments ) {
		global $woocommerce;
		ob_start();
		?><span class="number-cart"><?php echo esc_attr($woocommerce->cart->cart_contents_count); ?></span><?php
		$fragments['span.number-cart'] = ob_get_clean();
		return $fragments;
	}
	}

	
	/*
	 *  WooCommerce : Settings for related products on single page
	 */
	$show_related = cymolthemes_get_option('wc-single-show-related');
	if( $show_related==true ){
		
		// Single product related products : Setting Column AND also setting how many products like to show
		add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args' );
		function jk_related_products_args( $args ) {
			$related_product_column = cymolthemes_get_option('wc-single-related-column');
			$related_product_show   = cymolthemes_get_option('wc-single-related-count');
			$wc_related_column = ( !empty($related_product_column) ) ? intval($related_product_column) : 3 ;
			$wc_related_show   = ( !empty($related_product_show) ) ? intval($related_product_show) : 3 ;
			$args['columns']        = $wc_related_column; // arranged in columns
			$args['posts_per_page'] = $wc_related_show; // arranged in columns
			return $args;
		}
				
	} else {
		
		// Remove related products from single view
		remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

	}

}



/**
 * Define image sizes
 */
if( !function_exists('cymolthemes_woocommerce_image_dimensions') ){
function cymolthemes_woocommerce_image_dimensions() {
	
	$cmt_wc_sizeadded = get_option('cmt_wc_sizeadded');
	
	if( $cmt_wc_sizeadded!='yes' ){
		$catalog = array(
			'width' 	=> '520',	// px
			'height'	=> '520',	// px
			'crop'		=> 1 		// true
		);

		$single = array(
			'width' 	=> '800',	// px
			'height'	=> '800',	// px
			'crop'		=> 1 		// true
		);

		$thumbnail = array(
			'width' 	=> '120',	// px
			'height'	=> '120',	// px
			'crop'		=> 0 		// false
		);

		// Image sizes
		update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
		update_option( 'shop_single_image_size', $single ); 		// Single product image
		update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
		
		update_option('cmt_wc_sizeadded','yes');
		
	}
}
}
add_action( 'init', 'cymolthemes_woocommerce_image_dimensions', 1 );

add_filter( 'woocommerce_get_image_size_thumbnail', function( $size ) {
  return array(
    'width'  => 470,
    'height' => 520,
    'crop'   => 1,
  );
});

/**
 * Paypal Logo
 */
function cymolthemes_override_woocommerce_paypal_express_checkout_button_img_url( $variablen ) {
	$express_checkout_img_url = get_template_directory_uri() .'/images/pay-paypal-img.png';
	return $express_checkout_img_url;
}

add_filter( 'woocommerce_paypal_express_checkout_button_img_url' , 'cymolthemes_override_woocommerce_paypal_express_checkout_button_img_url' );