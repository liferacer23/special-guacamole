<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/* Getting skin color */
$skincolor = cymolthemes_get_option('skincolor');

/*
 *  Set skin color set for this page only.
 */
if( isset($_GET['color']) && trim($_GET['color'])!='' ){
	$skincolor = '#'.trim($_GET['color']);
}


/*
 *  Setting variables for different Theme Options
 */
$header_height        = cymolthemes_get_option('header_height');
$first_menu_margin    = cymolthemes_get_option('first_menu_margin');
$titlebar_height      = cymolthemes_get_option('titlebar_height');
$header_height_sticky = cymolthemes_get_option('header_height_sticky');
$center_logo_width    = cymolthemes_get_option('center_logo_width');

$header_bg_color                   = cymolthemes_get_option('header_bg_color');
$responsive_header_bg_custom_color = cymolthemes_get_option('responsive_header_bg_custom_color');
$header_bg_custom_color            = cymolthemes_get_option('header_bg_custom_color');
$sticky_header_bg_color            = cymolthemes_get_option('sticky_header_bg_color');
$sticky_header_bg_custom_color     = cymolthemes_get_option('sticky_header_bg_custom_color');
$sticky_header_bg_color            = ( empty($sticky_header_bg_color) ) ? $header_bg_color : $sticky_header_bg_color ;
$sticky_header_bg_custom_color     = ( empty($sticky_header_bg_custom_color) ) ? $header_bg_custom_color : $sticky_header_bg_custom_color ;

$sticky_header_menu_bg_color        = cymolthemes_get_option('sticky_header_menu_bg_color');
$sticky_header_menu_bg_custom_color = cymolthemes_get_option('sticky_header_menu_bg_custom_color');

$general_font = cymolthemes_get_option('general_font');


$titlebar_bg_color          = cymolthemes_get_option('titlebar_bg_color');
$titlebar_bg_custom_color   = cymolthemes_get_option('titlebar_bg_custom_color');
$titlebar_text_color        = cymolthemes_get_option('titlebar_text_color');
$titlebar_text_custom_color = cymolthemes_get_option('titlebar_heading_font', 'color');
$titlebar_subheading_text_custom_color = cymolthemes_get_option('titlebar_subheading_font', 'color');
$titlebar_breadcrumb_text_custom_color = cymolthemes_get_option('titlebar_breadcrumb_font', 'color');
$breadcum_bg_color    = cymolthemes_get_option('breadcum_bg_color');
$breadcum_bg_custom_color    = cymolthemes_get_option('breadcrumb_bg_custom_color');

$topbar_text_color        = cymolthemes_get_option('topbar_text_color');
$topbar_text_custom_color = cymolthemes_get_option('topbar_text_custom_color');
$topbar_bg_color          = cymolthemes_get_option('topbar_bg_color');
$topbar_bg_custom_color   = cymolthemes_get_option('topbar_bg_custom_color');

$topbar_breakpoint        = cymolthemes_get_option('topbar-breakpoint');
$topbar_breakpoint_custom = cymolthemes_get_option('topbar-breakpoint-custom');


$mainmenufont            = cymolthemes_get_option('mainmenufont');
$mainMenuFontColor       = $mainmenufont['color'];
$stickymainmenufontcolor = cymolthemes_get_option('stickymainmenufontcolor');
$stickymainmenufontcolor = ( empty($stickymainmenufontcolor) ) ? $mainmenufont['color'] : $stickymainmenufontcolor ;

$dropdownmenufont = cymolthemes_get_option('dropdownmenufont');

$mainmenu_active_link_color        = cymolthemes_get_option('mainmenu_active_link_color');
$mainmenu_active_link_custom_color = cymolthemes_get_option('mainmenu_active_link_custom_color');
$dropmenu_active_link_color        = cymolthemes_get_option('dropmenu_active_link_color');
$dropmenu_active_link_custom_color = cymolthemes_get_option('dropmenu_active_link_custom_color');

$dropmenu_background = cymolthemes_get_option('dropmenu_background');

$logoMaxHeight       = cymolthemes_get_option('logo_max_height');
$logoMaxHeightSticky = cymolthemes_get_option('logo_max_height_sticky');
$logoMaxHeightMobile = cymolthemes_get_option('logo_max_height_mobile');

$inner_background = cymolthemes_get_option('inner_background');

$headerbg_color       = cymolthemes_get_option('header_bg_color');
$headerbg_customcolor = cymolthemes_get_option('header_bg_custom_color');

$header_menu_bg_color        = cymolthemes_get_option('header_menu_bg_color');
$header_menu_bg_custom_color = cymolthemes_get_option('header_menu_bg_custom_color');


$menu_breakpoint        = cymolthemes_get_option('menu_breakpoint');
$menu_breakpoint_custom = cymolthemes_get_option('menu_breakpoint-custom');

$breakpoint = $menu_breakpoint;
$breakpoint = ( $menu_breakpoint=='custom' && !empty($menu_breakpoint_custom) ) ? $menu_breakpoint_custom : $breakpoint ;

$logo_font = cymolthemes_get_option('logo_font');

$loaderimg          = cymolthemes_get_option('loaderimg');
$loaderimage_custom = cymolthemes_get_option('loaderimage_custom');

$fbar_breakpoint        = cymolthemes_get_option('floatingbar-breakpoint');
$fbar_breakpoint_custom = cymolthemes_get_option('floatingbar-breakpoint-custom');

$logo_box_bgcolor          = cymolthemes_get_option('logo_box_bgcolor');

$floating_text_height       = cymolthemes_get_option('header_floating_area_height');
$footer_cta_bg_color    = cymolthemes_get_option('footer_cta_bg_color');
$footer_cta_bg_custom_color   = cymolthemes_get_option('footer_cta_bg_custom_color');

/* Output start
------------------------------------------------------------------------------*/ ?>

<?php
/* Custom CSS Code at top */
$custom_css_code_top = cymolthemes_get_option('custom_css_code_top');
if( !empty($custom_css_code_top) ){
	// We are not escaping / sanitizing as we are expecting css code. 
	echo trim($custom_css_code_top);
}
?>

/*------------------------------------------------------------------
* dynamic-style.php index *
[Table of contents]

1.  Background color
2.  Topbar Background color
3.  Element Border color
4.  Textcolor
5.  Boxshadow
6.  Header / Footer background color
7.  Footer background color
8.  Logo Color
9.  Genral Elements
10. "Center Logo Between Menu" options
11. Floating Bar
-------------------------------------------------------------------*/



/**
 * 0. Background properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(cymolthemes_get_all_background_css());
?>





/**
 * 0. Font properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(cymolthemes_get_all_font_css());
?>



/**
 * 0. Text link and hover color properties
 * ----------------------------------------------------------------------------
 */
<?php
// We are not escaping / sanitizing as we are expecting css code. 
echo trim(cymolthemes_a_color());
?>



/**
 * 0. Header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_bg_color=='custom' && !empty($header_bg_custom_color) ){
	?>
	.site-header.cmt-bgcolor-custom:not(.is_stuck),
	.header-style-classic-box.cmt-sboxheader-two .site-header.cmt-bgcolor-custom:not(.is_stuck) .cmt-container-for-header{
		background-color:<?php echo esc_attr($header_bg_custom_color); ?> !important;
	}
	<?php
}
?>

/**
 * 0. Sticky header bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_bg_color=='custom' && !empty($sticky_header_bg_custom_color) ){
	?>
	.is_stuck.site-header.cmt-sticky-bgcolor-custom{
		background-color:<?php echo esc_attr($sticky_header_bg_custom_color); ?> !important;
	}
	<?php
}
?>




/**
 * 0. header menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $header_menu_bg_color=='custom' && !empty($header_menu_bg_custom_color) ){
	?>
	.cmt-sboxheader-menu-bg-color-custom {
		background-color:<?php echo esc_attr($header_menu_bg_custom_color); ?>;
	}
	<?php
}
?>


/**
 * 0. Sticky menu bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $sticky_header_menu_bg_color=='custom' && !empty($sticky_header_menu_bg_custom_color) ){
	?>
	.is_stuck.cmt-sticky-bgcolor-custom,
	.is_stuck .cmt-sticky-bgcolor-custom {
		background-color:<?php echo esc_attr($sticky_header_menu_bg_custom_color); ?> !important;
	}
	<?php
}
?>


/**
 * 0. breadcum bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $breadcum_bg_color=='custom' && !empty($breadcum_bg_custom_color) ){
	?>
	
	.cmt-title-wrapper.cmt-breadcrumb-on-bottom .cmt-titlebar .breadcrumb-wrapper .container,
	.cmt-title-wrapper.cmt-breadcrumb-on-bottom .breadcrumb-wrapper .container:before, 
	.cmt-title-wrapper.cmt-breadcrumb-on-bottom .breadcrumb-wrapper .container:after {
		background-color:<?php echo esc_attr($breadcum_bg_custom_color); ?> !important;
	}
	<?php
}
?>


/**
 * 0. Footer CTA bg color
 * ----------------------------------------------------------------------------
 */
<?php
if( $footer_cta_bg_color=='custom' && !empty($footer_cta_bg_custom_color) ){
	?>
	.site-footer .cmt-footer-cta-wrapper.cmt-bgcolor-custom{
		background-color:<?php echo esc_attr($footer_cta_bg_custom_color); ?>;
	}
	<?php
}
?>

/**
 * 0. List style special style
 * ----------------------------------------------------------------------------
 */
.wpb_row .vc_tta.vc_general.vc_tta-color-white:not(.vc_tta-o-no-fill) .vc_tta-panel-body .wpb_text_column, 
.cmt-list.cmt-list-icon-color- li,
.cmt-list-li-content{
	color:<?php echo esc_attr($general_font['color']); ?>;
}


/**
 * 0. Page loader css
 * ----------------------------------------------------------------------------
 */
<?php echo cymolthemes_get_page_loader_css(); ?>



/**
 * 0. Floating bar
 * ----------------------------------------------------------------------------
 */
<?php echo cymolthemes_floatingbar_inline_css(); ?>



/**
 * 1. Background color
 * ----------------------------------------------------------------------------
 */ 

.cmt-widget-skinbgcolor:before,
.cmt-contactbox-border.cmt-row.wpb_row:before,
.sidebar .widget.duplexo_all_post_list_widget ul > li:hover,
.cmt-fidbox-highlight,
.cmt-sboximage-border:before,
.cymolthemes-boxes-testimonial.cymolthemes-boxes-view-slickview .testimonials-info .cymolthemes-testimonials-info,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-title>a,

/**Blog section**/
.cymolthemes-box-blog .cmt-post-date,
article.cymolthemes-box-blog-classic .cmt-post-date,

/*Servicebox style-2*/
.cymolthemes-box-service.cymolthemes-servicebox-styletwo:hover .cymolthemes-serviceboxbox-readmore a,
.cymolthemes-box-service.cymolthemes-servicebox-styletwo .cymolthemes-serviceboxbox-readmore a:before,

.cmt-iconbox-hover1 .cmt-sbox:before,
.cmt-sboxheading-highlight,
.cmt-sboxquote-form input[type="submit"]:hover,
.cmt-processbox-wrapper .cmt-processbox .process-num:before,
.cmt-processbox-wrapper .cmt-processbox .process-num span:before,
 .cmt-sboxiconbox-style2 .cmt-sbox .cmt-sboxvc_cta3-container:before,
.cmt-sboxiconbox-style2 .cmt-sbox:before,
.cmt-sboxiconbox-style2 .cmt-sbox:hover:after,
.cmt-sboxiconbox-hoverstyle .cmt-sbox:hover,
.vc_progress_bar .vc_single_bar .vc_bar:after,
.cmt-seperator-solid.cmt-element-heading-wrapper.cmt-sboxheading-style-horizontal .cmt-vc_general .cmt-vc_cta3_content-container .cmt-vc_cta3-content .cmt-vc_cta3-content-header .heading-seperator span:before,
.cmt-seperator-solid.cmt-element-heading-wrapper.cmt-sboxheading-style-horizontal .cmt-vc_general .cmt-vc_cta3_content-container .cmt-vc_cta3-content .cmt-vc_cta3-content-header .heading-seperator:after,
.cmt-seperator-solid.cmt-element-heading-wrapper.cmt-sboxheading-style-horizontal .cmt-vc_general .cmt-vc_cta3_content-container .cmt-vc_cta3-content .cmt-vc_cta3-content-header .heading-seperator:before,
.cmt-seperator-solid.cmt-element-heading-wrapper.cmt-sboxheading-style-vertical .cmt-vc_general .cmt-vc_cta3_content-container .cmt-vc_cta3-content .cmt-vc_cta3-content-header .heading-seperator:before,

.widget.duplexo_category_list_widget li.current-cat a:after,
.widget.duplexo_category_list_widget li a:hover:after, 
.widget.duplexo_all_post_list_widget li.cmt-sboxpost-active a:after,
.widget.duplexo_all_post_list_widget li a:hover:after, 
.widget.cmt_widget_nav_menu li.current_page_item a:after,
.widget.cmt_widget_nav_menu li a:hover:after,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a:after,
.woocommerce-account .woocommerce-MyAccount-navigation li a:hover:after,
#scroll_up,
.cmt-site-searchform button,

.main-holder .rpt_style_basic .rpt_recommended_plan.rpt_plan .rpt_head,
.main-holder .rpt_style_basic .rpt_recommended_plan.rpt_plan .rpt_title,

.mailchimp-inputbox input[type="submit"],
.mc_form_inside .mc_merge_var:after,
.widget_newsletterwidget .newsletter-widget:after,

.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon, 
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:before, 
.vc_toggle_round.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_round.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_round.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_simple.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_rounded.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_rounded.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:before,
.vc_toggle_square.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_skincolor:not(.vc_toggle_color_inverted) .vc_toggle_title:hover .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:after, 
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_icon:before,
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle_square.vc_toggle_color_skincolor.vc_toggle_color_inverted .vc_toggle_title:hover .vc_toggle_icon:before,

/*Woocommerce Section*/
.woocommerce .main-holder #content .woocommerce-error .button:hover, 
.woocommerce .main-holder #content .woocommerce-info .button:hover, 
.woocommerce .main-holder #content .woocommerce-message .button:hover,

.sidebar .widget .tagcloud a:hover,
.woocommerce .widget_shopping_cart a.button:hover,
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
.main-holder .site table.cart .coupon button:hover,
.main-holder .site .woocommerce-cart-form__contents button:hover,
.woocommerce .woocommerce-form-login .woocommerce-form-login__submit:hover,
.main-holder .site .return-to-shop a.button:hover,
.main-holder .site .woocommerce-MyAccount-content a.woocommerce-Button:hover,
.main-holder .site-content #review_form #respond .form-submit input:hover,
.woocommerce div.product form.cart .button:hover,
table.compare-list .add-to-cart td a:hover,
.woocommerce-cart #content table.cart td.actions input[type="submit"]:hover,
.main-holder .site .woocommerce-form-coupon button:hover,
.main-holder .site .woocommerce-form-login button.woocommerce-Button:hover,
.main-holder .site .woocommerce-ResetPassword button.woocommerce-Button:hover,
.main-holder .site .woocommerce-EditAccountForm button.woocommerce-Button:hover,

.single .main-holder div.product .woocommerce-tabs ul.tabs li.active,
.main-holder .site table.cart .coupon input:hover,
.woocommerce #payment #place_order:hover,
.wishlist_table td.product-price ins,
.widget .product_list_widget ins,
.woocommerce .widget_shopping_cart a.button.checkout,
.woocommerce .wishlist_table td.product-add-to-cart a,
.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
.woocommerce .widget_price_filter .price_slider_amount .button:hover,
.main-holder .site-content nav.woocommerce-pagination ul li .page-numbers.current, 
.main-holder .site-content nav.woocommerce-pagination ul li a:hover, 
 
.sidebar .widget .tagcloud a:hover,

.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:hover:after,
.main-holder .site-content ul.products li.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:hover:after,
.main-holder .site-content ul.products li.product .cmt-sboxshop-icon>div:hover,

.top-contact.cmt-highlight-left:after,
.top-contact.cmt-highlight-right:after,
.cmt-social-share-links ul li a:hover,

article.post .more-link-wrapper a.more-link,
.cymolthemes-blogbox-styletwo .cymolthemes-box-content .cmt-sboxpost-categories>.cmt-meta-line.cat-links a:hover,

.cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-skincolor.cmt-sboxvc_cta3-style-flat,
.cmt-sboxsortable-list .cmt-sboxsortable-link a.selected,
.cmt-sboxsortable-list .cmt-sboxsortable-link a:hover,

.cmt-col-bgcolor-skincolor .cmt-bg-layer-inner,
.cmt-bg .cmt-bgcolor-skincolor > .cmt-bg-layer,
.cmt-bgcolor-skincolor > .cmt-bg-layer,
footer#colophon.cmt-bgcolor-skincolor > .cmt-bg-layer,
.cmt-title-wrapper.cmt-bgcolor-skincolor .cmt-title-wrapper-bg-layer,


/* Events Calendar */
.cymolthemes-post-item-inner .tribe-events-event-cost,
.tribe-events-day .tribe-events-day-time-slot h5,
.tribe-events-button, 
#tribe-events .tribe-events-button, 
.tribe-events-button.tribe-inactive, 
#tribe-events .tribe-events-button:hover, 
.tribe-events-button:hover, 
.tribe-events-button.tribe-active:hover,
.single-tribe_events .tribe-events-schedule .tribe-events-cost,
.tribe-events-list .tribe-events-event-cost span,
#tribe-bar-form .tribe-bar-submit input[type=submit]:hover,
#tribe-events .tribe-events-button, #tribe-events .tribe-events-button:hover, 
#tribe_events_filters_wrapper input[type=submit], 
.tribe-events-button, .tribe-events-button.tribe-active:hover, 
.tribe-events-button.tribe-inactive, .tribe-events-button:hover, 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-], 
.tribe-events-calendar td.tribe-events-present div[id*=tribe-events-daynum-]>a,
.cymolthemes-box-blog .cymolthemes-box-content .cymolthemes-box-post-date:after,

body .datepicker table tr td span.active.active, 
body .datepicker table tr td.active.active,
.datepicker table tr td.active.active:hover, 
.datepicker table tr td span.active.active:hover,

.datepicker table tr td.day:hover, 
.datepicker table tr td.day.focused,

.cmt-bgcolor-skincolor.cmt-rowborder-topcross:before,
.cmt-bgcolor-skincolor.cmt-rowborder-bottomcross:after,
.cmt-bgcolor-skincolor.cmt-rowborder-topbottomcross:before,
.cmt-bgcolor-skincolor.cmt-rowborder-topbottomcross:after,


/* Tourtab with icon */
.wpb-js-composer .cmt-sboxtourtab-round.vc_tta-tabs.vc_tta-tabs-position-left.vc_tta-style-outline .vc_tta-tab>a:hover,
.wpb-js-composer .cmt-sboxtourtab-round.vc_tta-tabs.vc_tta-tabs-position-left.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.wpb-js-composer .cmt-sboxtourtab-round.vc_tta-tabs.vc_tta-tabs-position-right.vc_tta-style-outline .vc_tta-tab>a:hover,
.wpb-js-composer .cmt-sboxtourtab-round.vc_tta-tabs.vc_tta-tabs-position-right.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.wpb-js-composer .cmt-sboxtourtab-round.vc_tta.vc_general .vc_active .vc_tta-panel-title a, 

/* Portfolio */
.cymolthemes-box-view-top-image .cymolthemes-portfolio-likes-wrapper a.cymolthemes-portfolio-likes,
.cymolthemes-box-portfolio.cymolthemes-portfoliobox-styletwo .portfolio-overlay-iconbox,
.cymolthemes-box-portfolio.cymolthemes-portfoliobox-styletwo .cymolthemes-box-bottom-content,

/*Team-Member*/
.cymolthemes-box-team.cymolthemes-teambox-styletwo .cymolthemes-box-social-links,
.cymolthemes-box-team .cymolthemes-box-social-links ul li a:hover,

/* pricetable */
.cmt-ptablebox-featured-col .cmt-ptablebox .cmt-vc_btn3.cmt-vc_btn3-color-white,
.cmt-seperator-solid.cmt-sboxheading-style-horizontal  .cmt-vc_general.cmt-sboxvc_cta3 .cmt-vc_cta3-content-header:before,
.cmt-seperator-solid.cmt-sboxheading-style-vertical  .cmt-vc_general.cmt-sboxvc_cta3 .cmt-vc_cta3-content-header:after
{
	background-color: <?php echo esc_attr($skincolor); ?>;
}

/* Drop cap */
.cmt-sboxdcap-color-skincolor,

/* Slick Slider */
.cymolthemes-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover,
.cmt-sboxauthor-social-links li a:hover,

/* Progress Bar */
.vc_progress_bar.vc_progress-bar-color-skincolor .vc_single_bar .vc_bar,
.vc_progress_bar .vc_general.vc_single_bar.vc_progress-bar-color-skincolor .vc_bar,

/* Sidebar */
.widget .widget-title:after,
.footer .widget .widget-title:after,
.sidebar .widget .social-icons li > a:hover,

.woocommerce-account .woocommerce-MyAccount-navigation li a:before,
.widget.cmt_widget_nav_menu li a:before,
.widget.duplexo_all_post_list_widget li a:before,
.widget.duplexo_category_list_widget li a:before,

/* Global Input Button */
input[type="submit"]:hover, 
input[type="button"]:hover, 
input[type="reset"]:hover,

.cmt-col-bgcolor-darkgrey .wpcf7 .cmt-sboxbookappointmentform input[type="submit"]:hover, 
.cmt-row-bgcolor-darkgrey .wpcf7 .cmt-sboxbookappointmentform input[type="submit"]:hover, 	

/* Testimonials Section */
.slick-dots li.slick-active button,
.cymolthemes-boxes-testimonial.cymolthemes-boxes-view-carousel .slick-current.slick-active + .slick-active .cymolthemes-testimonialbox-styletwo .cymolthemes-box-content,
.cymolthemes-box-view-default .cymolthemes-box-author .cymolthemes-box-img .cymolthemes-icon-box,

.cmt-sboxcta3-only.cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-skincolor.cmt-sboxvc_cta3-style-3d,

/* Servicebox section */
.cymolthemes-box-service.cymolthemes-servicebox-styleone:hover .cmt-service-icon,
.cymolthemes-box-service.cymolthemes-servicebox-styleone .cymolthemes-service-icon-plus,
.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-3d:focus, 
.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-3d:hover,
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-outline:hover,
.cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner.cmt-vc_icon_element-background-color-skincolor.cmt-vc_icon_element-background,
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-color-skincolor,
.single-cmt_portfolio .nav-next a:hover, .single-cmt_portfolio .nav-previous a:hover,
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-3d.cmt-vc_btn3-color-inverse:hover,
.cmt-bgcolor-skincolor,

.header-two .site-header.cmt-sticky-bgcolor-skincolor.is_stuck,
.site-header-menu.cmt-sticky-bgcolor-skincolor.is_stuck,
.header-style-four .site-header .cmt-sboxstickable-header.is_stuck.cmt-sticky-bgcolor-skincolor,
.is_stuck.cmt-sticky-bgcolor-skincolor,
.header-style-four .site-header-menu .cmt-sboxstickable-header.is_stuck .cmt-sticky-bgcolor-skincolor,

/* Blog section */
.cymolthemes-box-blog.cymolthemes-blogbox-styleone:hover .entry-header:before,
.cymolthemes-post-box-icon-wrapper,
.cymolthemes-pagination .page-numbers.current, 
.cymolthemes-pagination .page-numbers:hover,
.single article.post blockquote:after,

/*Search Result Page*/
.cmt-sboxsresults-title small a,
.cmt-sboxsresult-form-wrapper,

/*Pricing Table*/
.main-holder .rpt_style_basic .rpt_recommended_plan .rpt_title,
.main-holder .rpt_4_plans.rpt_style_basic .rpt_plan.rpt_recommended_plan,

/* square social icon */
.cmt-sboxsquare-social-icon .cymolthemes-social-links-wrapper .social-icons li a:hover,

.inside.cmt-fid-view-topicon h3:after,

.woocommerce-account .woocommerce-MyAccount-navigation li a:hover,
.widget.cmt_widget_nav_menu li a:hover,
.widget.duplexo_category_list_widget li a:hover,
.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a,
.widget.cmt_widget_nav_menu li.current_page_item a:before,
.widget.duplexo_category_list_widget li.current-cat a,

/*blog top-bottom content */
.cymolthemes-box-blog.cymolthemes-box-blog-classic .cymolthemes-post-date-wrapper,
.entry-content .page-links>span:not(.page-links-title),
.entry-content .page-links a:hover,
mark, 
ins{
	background-color: <?php echo esc_attr($skincolor); ?> ;
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta-color-white.vc_tta-style-modern .vc_tta-panel.vc_active .vc_tta-panel-heading,
.widget.duplexo_all_post_list_widget li.cmt-sboxpost-active{
	background-color: <?php echo esc_attr($skincolor); ?> !important ;
}


/* Revolution button */
.Sports-Button-skin{
	background-color: <?php echo esc_attr($skincolor); ?> !important ;
    border-color: <?php echo esc_attr($skincolor); ?> !important ;
}
.Sports-Button-skin:hover{
	background-color: #202020 !important;
    border-color: #202020 !important;
}
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-heading{
    background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.89);
}
.cmt-sboxcta3-only.cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-skincolor.cmt-sboxvc_cta3-style-3d,
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-3d.cmt-vc_btn3-color-skincolor{
	box-shadow: 0 5px 0 <?php echo cymolthemes_adjustBrightness($skincolor, -30); ?>;
}
.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-3d:focus, 
.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-3d:hover{   
    box-shadow: 0 2px 0 <?php echo cymolthemes_adjustBrightness($skincolor, -30); ?>;
}


/* This is Titlebar Background color */
<?php if( $titlebar_bg_color=='custom' && !empty($titlebar_bg_custom_color['rgba']) ) : ?>
.cmt-title-wrapper .cmt-titlebar-inner-wrapper{
	background-color: <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
.cmt-title-wrapper{
	background-color:  <?php echo esc_attr( $titlebar_bg_custom_color['rgba'] ); ?>;
}
<?php endif; ?>
.header-two .cmt-title-wrapper .cmt-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr( $header_height); ?>px;
}
.header-style-classic-box.header-two .cmt-title-wrapper .cmt-titlebar-inner-wrapper{
	padding-top:0px;
}

/* This is Titlebar Text color */
<?php if( $titlebar_text_color=='custom' && !empty($titlebar_text_custom_color) ): ?>
.cmt-title-wrapper .cmt-titlebar-main h1.entry-title{
	color: <?php echo esc_attr($titlebar_text_custom_color); ?> !important;
}
.cmt-title-wrapper .cmt-titlebar-main h3.entry-subtitle{
	color: <?php echo esc_attr($titlebar_subheading_text_custom_color); ?> !important;
}
.cmt-title-wrapper.cmt-breadcrumb-on-bottom .cmt-titlebar .breadcrumb-wrapper .container,
.cmt-titlebar-main .breadcrumb-wrapper, .cmt-titlebar-main .breadcrumb-wrapper a:hover{ /* Breadcrumb */
	color: rgba( <?php echo cymolthemes_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
.cmt-titlebar-main .breadcrumb-wrapper a{ /* Breadcrumb */
	color: rgba( <?php echo cymolthemes_hex2rgb($titlebar_breadcrumb_text_custom_color); ?> , 1) !important;
}
<?php endif; ?>

.cmt-title-wrapper .cmt-titlebar-inner-wrapper{
	height: <?php echo esc_attr($titlebar_height); ?>px;	
}
.header-two .cymolthemes-titlebar-wrapper .cmt-titlebar-inner-wrapper{	
	padding-top: <?php echo esc_attr(($header_height+30)); ?>px;
}
.cymolthemes-header-style-3.cmt-sboxheader-two .cmt-title-wrapper .cmt-titlebar-inner-wrapper{
	padding-top: <?php echo esc_attr(($header_height+55)) ?>px;
}

/* Logo Max-Height */
.headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeight); ?>px;
}
.is_stuck .headerlogo img{
    max-height: <?php echo esc_attr($logoMaxHeightSticky); ?>px;
}

/* Extra Code */
span.cmt-sboxsc-logo.cmt-sboxsc-logo-type-image {
    position: relative;
	display: block;
}
img.cymolthemes-logo-img.stickylogo {
    position: absolute;
    top: 0;
    left: 0;
}
.cmt-sboxstickylogo-yes .standardlogo{
	opacity: 1;
}
.cmt-sboxstickylogo-yes .stickylogo{
	opacity: 0;
}
.is_stuck .cmt-sboxstickylogo-yes .standardlogo{
	opacity: 0;
}
.is_stuck .cmt-sboxstickylogo-yes .stickylogo{
	opacity: 1;
}

<?php $headerbgcolor = cymolthemes_get_option('headerbgcolor');
if( !empty($headerbgcolor) ){ ?>
#stickable-header,
.cymolthemes-header-style-4 #stickable-header .headercontent{
	background-color: <?php echo esc_attr( cymolthemes_get_option('headerbgcolor') ); ?>;
}
<?php } ?>

<?php if( !empty($sticky_header_bg_color) && $sticky_header_bg_color=='custom' ){ ?>
.header-two.cymolthemes-header-style-4 .is-sticky #stickable-header,
.is-sticky #stickable-header{
	background-color: <?php echo esc_attr($sticky_header_bg_custom_color); ?>;
}
<?php } ?>


/**
 * 2. Topbar Background color
 * ----------------------------------------------------------------------------
 */
<?php if( $topbar_text_color=='custom' && !empty($topbar_text_custom_color) ): ?>
	.site-header .cymolthemes-topbar{
		color: rgba( <?php echo cymolthemes_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.cymolthemes-topbar-textcolor-custom .social-icons li a{
		  border: 1px solid rgba( <?php echo cymolthemes_hex2rgb($topbar_text_custom_color); ?> , 0.7);
	}
	.site-header .cymolthemes-topbar a{
		color: rgba( <?php echo cymolthemes_hex2rgb($topbar_text_custom_color); ?> , 1);
	}
<?php endif; ?>

<?php if( $topbar_bg_color=='custom' && !empty($topbar_bg_custom_color) ) : ?>
	.site-header .cymolthemes-topbar{
		background-color: <?php echo esc_attr($topbar_bg_custom_color); ?>;
	}
<?php endif; ?>

<?php

if( !empty($topbar_breakpoint) && trim($topbar_breakpoint)!='all' ){
	if( esc_attr($topbar_breakpoint)=='custom' ) {
		$topbar_breakpoint = ( !empty($topbar_breakpoint_custom) ) ?  trim($topbar_breakpoint_custom) : '1200' ;
	}

?>
	
/* Show/hide topbar in some devices */
	@media (max-width: <?php echo esc_attr($topbar_breakpoint); ?>px){
		.cmt-topbar-wrapper{
			display: none !important;
		}
	}

	<?php
}
?>


/**
 * 4. Border color
 * ----------------------------------------------------------------------------
 */
 
.cmt-border-skincolor .vc_column-inner,
.cmt-link-underline a,

.sidebar .widget .social-icons li > a,


.slick-dots li.slick-active button:before,
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle_default.vc_toggle_color_skincolor .vc_toggle_icon,

.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,
.vc_toggle_round.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,

.vc_toggle_rounded.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,
.vc_toggle_rounded.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,

.vc_toggle_square.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_icon,
.vc_toggle_square.vc_toggle_color_inverted.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon,

.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_icon:after, 
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_icon:before,
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:after, 
.vc_toggle.vc_toggle_arrow.vc_toggle_color_skincolor .vc_toggle_title:hover .vc_toggle_icon:before,

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-flat .vc_tta-panel.vc_active .vc_tta-panel-title>a,

.cmt-sboxcta3-only.cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-skincolor.cmt-sboxvc_cta3-style-outline,

.main-holder .site #content table.cart td.actions .input-text:focus, 
textarea:focus, input[type="text"]:focus, input[type="password"]:focus, 
input[type="datetime"]:focus, input[type="datetime-local"]:focus, 
input[type="date"]:focus, input[type="month"]:focus, input[type="time"]:focus, 
input[type="week"]:focus, input[type="number"]:focus, input[type="email"]:focus, 
input[type="url"]:focus, input[type="search"]:focus, input[type="tel"]:focus, 
input[type="color"]:focus, input.input-text:focus, select:focus, 
blockquote,
.cmt-sboxprocess-content img,
.single-cmt_portfolio .nav-next a:hover,
.single-cmt_portfolio .nav-previous a:hover,
.single-cmt_portfolio .cmt-pf-single-category-w a:hover,
 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-heading, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-controls-icon::before, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body:after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-body:before,

.vc_tta-color-skincolor.vc_tta-style-outline .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:after, 
.vc_tta-color-skincolor.vc_tta-style-outline .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:before,

/* testimonial */
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-heading,  
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-outline,
.cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner.cmt-vc_icon_element-background-color-skincolor.cmt-vc_icon_element-outline,
.cymolthemes-box-view-overlay .cymolthemes-boxes .cymolthemes-box-content.cymolthemes-overlay .cymolthemes-icon-box a:hover {
	border-color: <?php echo esc_attr($skincolor); ?>;
}
.cmt-contact-form2 .select2-container--default.select2-container--open .select2-selection--single .select2-selection__arrow b,
.cymolthemes-box-team.cymolthemes-teambox-styleone .cymolthemes-box-content,
.cymolthemes-fbar-position-default div.cymolthemes-fbar-box-w{
	border-bottom-color: <?php echo esc_attr($skincolor); ?>;
}
.cmt-contact-form2 .select2-container--default .select2-selection--single .select2-selection__arrow b,
.cmt-square-heading-style.cmt-custom-heading:after,
.cmt-border-top-skincolor,
.cmt-border-top-skincolor.vc_column_container>.vc_column-inner,
.cymolthemes-box-blog-classic .cmt-sboxpost-format-icon-wrapper{
	border-top-color: <?php echo esc_attr($skincolor); ?>;
}

.cmt-sbox-circle-chat-style1 .cmt-sbox .cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner.cmt-vc_icon_element-size-md.cmt-vc_icon_element-have-style-inner:before{
	border-right-color: <?php echo esc_attr($skincolor); ?>;
}

/**
 * 5. Textcolor
 * ----------------------------------------------------------------------------
 */


/* Servicebox*/
.cymolthemes-box-service.cymolthemes-servicebox-styleone .cmt-service-icon,
.cymolthemes-box-service.cymolthemes-servicebox-styletwo .cymolthemes-box-services-icon .cmt-service-icon i,

.cmt-ptablebox .cmt-ptablebox-price,
.cmt-ptablebox .cmt-ptablebox-cur-symbol-before,
.cmt-link-underline a,
.cmt-fid-without-icon.inside.cmt-fidbox-style2 h4 span,
.cmt-fid-view-lefticon.cmt-highlight-fid .cmt-fld-contents .cmt-fid-inner,

.sidebar .widget .social-icons li > a,

.sidebar .widget a:hover,
.cmt-textcolor-dark.cmt-bgcolor-grey .cmt-sboxfbar-open-icon:hover,
.cmt-textcolor-dark.cmt-bgcolor-white .cmt-sboxfbar-open-icon:hover,

/* Icon basic color */
.cmt-sboxicolor-skincolor,
.widget_calendar table td#today,
.vc_toggle_text_only.vc_toggle_color_skincolor .vc_toggle_title h4,

.cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-skincolor.cmt-sboxvc_cta3-style-outline .cmt-vc_cta3-content-header,

section.error-404 .cmt-sboxbig-icon,

.cmt-bgcolor-darkgrey ul.duplexo_contact_widget_wrapper li a:hover,
.cmt-vc_general.cmt-sboxvc_cta3.cmt-sboxvc_cta3-color-skincolor.cmt-sboxvc_cta3-style-classic .cmt-vc_cta3-content-header, 
.cmt-vc_icon_element-color-skincolor, 
 
.cmt-bgcolor-skincolor .cymolthemes-pagination .page-numbers.current, 
.cmt-bgcolor-skincolor .cymolthemes-pagination .page-numbers:hover,

.cmt-bgcolor-darkgrey .cymolthemes-twitterbox-inner .tweet-text a:hover,
.cmt-bgcolor-darkgrey .cymolthemes-twitterbox-inner .tweet-details a:hover,

.cmt-sboxdcap-txt-color-skincolor,

/* Accordion section */
.vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,

/* Global Button */ 
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-text.cmt-vc_btn3-color-white:hover,

 /* Blog */
.comment-reply-link,
.single article.post blockquote:before,
.single .cmt-pf-single-content-area blockquote:before,
.single .cmt-pf-single-content-wrapper blockquote:before,
article.cymolthemes-blogbox-format-link .cmt-sboxformat-link-title a:hover, 
article.post.format-link .cmt-sboxformat-link-title a:hover,
.cymolthemes-box-blog .cymolthemes-blogbox-desc-footer a,
article.post .entry-title a:hover,
.cymolthemes-meta-details a:hover,
.cmt-sboxentry-meta a:hover,

 /* Team Member meta details */ 
 .cmt-team-member-single-position,
.cmt-sboxextra-details-list .cmt-team-extra-list-title,
.cmt-team-member-single-meta-value a:hover,
.cmt-team-member-single-category a:hover,
.cmt-team-details-list .cmt-team-list-value a:hover,
cymolthemes-teambox-styleone .cmt-team-social-links-wrapper ul li a :hover,
.cymolthemes-teambox-styleone .cymolthemes-box-social-links ul li>a,

 /* list style */ 
.cmt-list-style-disc.cmt-list-icon-color-skincolor li,
.cmt-list-style-circle.cmt-list-icon-color-skincolor li,
.cmt-list-style-square.cmt-list-icon-color-skincolor li,
.cmt-list-style-decimal.cmt-list-icon-color-skincolor li,
.cmt-list-style-upper-alpha.cmt-list-icon-color-skincolor li,
.cmt-list-style-roman.cmt-list-icon-color-skincolor li,
.cmt-list.cmt-skincolor li .cmt-list-li-content,
 
/* Testimonials Section */
.cmt-bgcolor-skincolor .cymolthemes-box-view-default .cymolthemes-box-author .cymolthemes-box-img .cymolthemes-icon-box, 
.testimonial_item .cymolthemes-author-name,
.testimonial_item .cymolthemes-author-name a,
.cymolthemes-boxes-testimonial .cymolthemes-boxes-row-wrapper .slick-arrow:not(.slick-disabled):hover:before,
.cymolthemes-box-testimonial.cmt-testimonial-box-view-style3 .cymolthemes-author-name,
.cymolthemes-box-testimonial.cmt-testimonial-box-view-style3 .cymolthemes-author-name a,
.cmt-duplexo-icon-star-1.cmt-sboxactive,
.cymolthemes-boxes-testimonial .cymolthemes-box-footer,

.cmt-textcolor-white a:hover, 

/* Tab content section */
.cmt-sboxtourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-tab>a:focus, 
.cmt-sboxtourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-tab>a:hover,
.cmt-sboxtourtab-style1.vc_general.vc_tta-tabs.vc_tta-style-outline .vc_tta-tab.vc_active>a,
.cmt-sboxtourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.cmt-sboxtourtab-style1.vc_general.vc_tta-color-grey.vc_tta-style-outline .vc_tta-panel .vc_tta-panel-title>a:hover, 

/* VCbutton section */
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-color-skincolor.cmt-vc_btn3-style-outline, 
.cmt-sboxvc_btn_skincolor.cmt-sboxvc_btn_outlined, .cmt-sboxvc_btn_skincolor.vc_btn_square_outlined, 

.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-text.cmt-vc_btn3-color-skincolor,
.cmt-fid-icon-wrapper i,


.cmt-textcolor-skincolor,
.cmt-textcolor-skincolor a,
.cymolthemes-box-title h4 a:hover,
.cmt-textcolor-skincolor.cmt-custom-heading,

.cymolthemes-box-blog-classic .entry-header .cmt-meta-line a:hover,
.cymolthemes-blog-box-view-right-image .cymolthemes-box-content .cmt-sboxpost-categories>.cmt-meta-line.cat-links a,
.cymolthemes-blogbox-styletwo .cymolthemes-box-content .cmt-sboxpost-categories>.cmt-meta-line.cat-links a,

/* Text color skin in row secion*/
.cmt-sboxbackground-image.cmt-row-textcolor-skin h1, 
.cmt-sboxbackground-image.cmt-row-textcolor-skin h2, 
.cmt-sboxbackground-image.cmt-row-textcolor-skin h3, 
.cmt-sboxbackground-image.cmt-row-textcolor-skin h4, 
.cmt-sboxbackground-image.cmt-row-textcolor-skin h5, 
.cmt-sboxbackground-image.cmt-row-textcolor-skin h6,
.cmt-sboxbackground-image.cmt-row-textcolor-skin .cmt-element-heading-wrapper h2,
.cmt-sboxbackground-image.cmt-row-textcolor-skin .cymolthemes-testimonial-title,
.cmt-sboxbackground-image.cmt-row-textcolor-skin a,
.cmt-sboxbackground-image.cmt-row-textcolor-skin .item-content a:hover,

.cmt-row-textcolor-skin h1, 
.cmt-row-textcolor-skin h2, 
.cmt-row-textcolor-skin h3, 
.cmt-row-textcolor-skin h4, 
.cmt-row-textcolor-skin h5, 
.cmt-row-textcolor-skin h6,
.cmt-row-textcolor-skin .cmt-element-heading-wrapper h2,
.cmt-row-textcolor-skin .cymolthemes-testimonial-title,
.cmt-row-textcolor-skin a,
.cmt-row-textcolor-skin .item-content a:hover,

ul.duplexo_contact_widget_wrapper.call-email-footer li:before,

/*Tweets*/
.widget_latest_tweets_widget p.tweet-text:before,

/*Events Calendar*/
.cymolthemes-events-box-view-top-image-details .cymolthemes-events-meta .tribe-events-event-cost,

/*Price table*/
.main-holder .rpt_style_basic .rpt_plan .rpt_head .rpt_recurrence,
.main-holder .rpt_style_basic .rpt_plan .rpt_features .rpt_feature:before,
.main-holder .rpt_style_basic .rpt_plan .rpt_head .rpt_price,

/*search result page*/
.cmt-sboxsresults-first-row .cmt-list-li-content a:hover,
.cmt-sboxresults-post ul.cmt-recent-post-list > li > a:hover,
.cmt-sboxresults-page .cmt-list-li-content a:hover,
.cmt-sboxsresults-first-row ul.cmt-recent-post-list > li > a:hover,

.cmt-team-list-title i,
.cmt-bgcolor-darkgrey .cymolthemes-box-view-left-image .cymolthemes-box-title a:hover,
.cmt-team-member-view-wide-image .cmt-team-details-list .cmt-team-list-title,
.cmt-bgcolor-skincolor .cymolthemes-box-team .cymolthemes-box-content h4 a:hover,
.cmt-col-bgcolor-skincolor .cymolthemes-box-team .cymolthemes-box-content h4 a:hover,

/*woocommerce*/
.woocommerce-info:before,
.woocommerce-message:before,
.main-holder .site-content ul.products li.product .price,
.main-holder .site-content ul.products li.product .price ins,
.single .main-holder #content div.product .price ins,
.woocommerce .price .woocommerce-Price-amount,
.main-holder .site-content ul.products li.product h3:hover,
.main-holder .site-content ul.products li.product .woocommerce-loop-category__title:hover,
.main-holder .site-content ul.products li.product .woocommerce-loop-product__title:hover,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:hover:after,
.main-holder .site-content ul.products li.product .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse:after,
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"],
.main-holder .site-content ul.products li.product .yith-wcwl-wishlistexistsbrowse a[rel="nofollow"]:after,

/*widget before */
.widget_recent_comments li.recentcomments:before,
.widget_recent_entries a:before,
.widget_meta a:before,
.widget_categories a:before,
.widget_archive li a:before,
.widget_pages li a:before, 
.widget_nav_menu li a:before,
.widget_product_categories a:before,

/* Special Section */
.cmt-topbar-wrapper.cmt-textcolor-grey a:hover,
.cmt-topbar-wrapper.cmt-textcolor-grey a:hover i,
.cmt-topbar-wrapper.cmt-bgcolor-darkgrey.cmt-textcolor-white .social-icons li > a:hover,
.cymolthemes-pf-detailbox-list .cmt-sboxpf-details-date i,
.content-area .social-icons li > a,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a, 
.cmt-processbox-wrapper .cmt-processbox:hover .cmt-sboxbox-title h5,
.cmt-textcolor-white:not(.cmt-bgcolor-skincolor) .cmt-titlebar-main .breadcrumb-wrapper a:hover,
.cmt-col-bgcolor-darkgrey .cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-text.cmt-vc_btn3-color-skincolor:hover,
.cmt-bgcolor-darkgrey .cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-text.cmt-vc_btn3-color-skincolor:hover,
.cmt-col-bgimage-yes .cmt-sbox .cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-text.cmt-vc_btn3-color-skincolor:hover,
ul.cmt-pricelist-block li .service-price strong,
.cmt-vc_general.cmt-vc_btn3.cmt-vc_btn3-style-text.cmt-vc_btn3-color-black:hover{
	color: <?php echo esc_attr($skincolor); ?>;
}





/*** Defaultmenu ***/     
/*Wordpress Main Menu*/      

/* Menu hover and select section */ 
.cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li:hover > a,    
.cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
.cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a,     
.cmt-mmenu-active-color-skin #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a,             

/*Wordpress Dropdown Menu*/
.cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,    
.cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-item > a,    
.cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a,    
.cmt-submenu-active-skin #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_ancestor > a,    
    
 
 /*Mega Main Menu*/      
 .cmt-mmenu-active-color-skin .site-header.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item:hover > a,  
.cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,      
.cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
.cmt-mmenu-active-color-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a,           


/*Mega Dropdown Menu*/  
.cmt-submenu-active-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a,    
.cmt-submenu-active-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-ancestor > a,      
.cmt-submenu-active-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,  
.cmt-submenu-active-skin .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current_page_item > a{
    color: <?php echo esc_attr($skincolor); ?> ;
}
    

	<?php if( $mainmenu_active_link_color=='custom' && !empty($mainmenu_active_link_custom_color) ){ ?>
        /* Main Menu Active Link Color --------------------------------*/                
        .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a, 
        .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_ancestor > a, 
        .cmt-mmenu-active-color-custom #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_parent > a,          
        .cmt-mmenu-active-color-custom  #site-header-menu #site-navigation div.nav-menu > ul > li.current-menu-ancestor > a,       
        
        .cmt-mmenu-active-color-custom  .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.nav-menu > ul > li.current_page_item > a, 
        .cmt-mmenu-active-color-custom  .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-item > a,    
        .cmt-mmenu-active-color-custom  .cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item.mega-current-menu-ancestor > a {
            color: <?php echo esc_attr($mainmenu_active_link_custom_color); ?>;
        }
    <?php } ?>

	<?php if( $dropmenu_active_link_color=='custom' && !empty($dropmenu_active_link_custom_color) ){ ?>
    
    /* Dropdown Menu Active Link Color -------------------------------- */   
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_item > a, 
            
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.current-menu-item > a,    
    .cmt-submenu-active-custom #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu li.mega-current-menu-item > a {
        color: <?php echo esc_attr($dropmenu_active_link_custom_color); ?>;
    }
    <?php } ?>



/* Dynamic main menu color applying to responsive menu link text */
.header-controls .search_box i.tmicon-fa-search,
.righticon i,
.menu-toggle i,
.header-controls a{
    color: rgba( <?php echo esc_attr( cymolthemes_hex2rgb($mainMenuFontColor) ); ?> , 1) ;
}
.menu-toggle i:hover,
.header-controls a:hover {
    color: <?php echo esc_attr($skincolor); ?> !important;
}

<?php if( !empty($dropdownmenufont['color']) ) : ?>
	.cmt-mmmenu-override-yes  #site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div{
		color: rgba( <?php echo cymolthemes_hex2rgb($dropdownmenufont['color']); ?> , 0.8);
		font-weight: normal;
	}
<?php endif; ?>
#site-header-menu #site-navigation .mega-menu-wrap .mega-menu.mega-menu-horizontal .mega-sub-menu > li.mega-menu-item-type-widget div.textwidget{
	padding-top: 10px;
}

/*Logo Color --------------------------------*/ 
h1.site-title{
	color: <?php echo esc_attr($logo_font['color']); ?>;
}


/**
 * 9. Genral Elements
 * ----------------------------------------------------------------------------
 */

/* Site Pre-loader image */
<?php if( isset($loaderimage_custom['url']) && $loaderimage_custom['url']!='' ): ?>
.pageoverlay{
	background-image:url('<?php echo esc_attr($loaderimage_custom['url']); ?>');
}
<?php elseif( $loaderimg!='' ) : ?>
.pageoverlay{
	background-image:url('../images/loader<?php echo esc_attr($loaderimg); ?>.gif');
}
<?php endif; ?>


/**
 * 10. Heading Elements
 * ----------------------------------------------------------------------------
 */
.cmt-textcolor-skincolor h1,
.cmt-textcolor-skincolor h2,
.cmt-textcolor-skincolor h3,
.cmt-textcolor-skincolor h4,
.cmt-textcolor-skincolor h5,
.cmt-textcolor-skincolor h6,

.cmt-textcolor-skincolor .cmt-vc_cta3-content-header h2{
	color: <?php echo esc_attr($skincolor); ?> !important;
}
.cmt-textcolor-skincolor .cmt-vc_cta3-content-header h4{
	color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.90) !important;
}
.cmt-textcolor-skincolor .cmt-vc_cta3-content .cmt-sboxcta3-description{
	color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.60) !important;
}
.cmt-custom-heading.cmt-textcolor-skincolor{
	color:<?php echo esc_attr($skincolor); ?>!important;
}
.cmt-textcolor-skincolor a{
	color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.80);
}



/**
 * 10. Floating Bar
 * ----------------------------------------------------------------------------
 */
<?php

if( !empty($fbar_breakpoint) && trim($fbar_breakpoint)!='all' ){

	if( esc_attr($fbar_breakpoint)=='custom' ) {
		$fbar_breakpoint = ( !empty($fbar_breakpoint_custom) ) ?  trim($fbar_breakpoint_custom) : '1200' ;
	}

	?>
	
/* Show/hide topbar in some devices */
@media (max-width: <?php echo esc_attr($fbar_breakpoint); ?>px){
	.cymolthemes-fbar-btn,
    .cymolthemes-fbar-box-w{
		display: none !important;
	}
}

	<?php
}
?>




/********************** Tab ****************************/

.wpb-js-composer .vc_tta-color-black.vc_tta-style-classic .vc_tta-tab.vc_active>a,
.wpb-js-composer .cmt-sboxtab-top-icon .vc_tta-tab.vc_active>a .vc_tta-icon:before,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-tab>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab.vc_active>a,
.vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:focus, 
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic .vc_tta-tab>a:hover{
    background-color: <?php echo esc_attr($skincolor); ?> !important;     
    border-color: <?php echo esc_attr($skincolor); ?> !important;     
    color: #fff !important;
}
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-panel .vc_tta-panel-heading,
.vc_tta-color-skincolor.vc_tta-style-flat .vc_tta-tab>a{
    background-color: <?php echo esc_attr($skincolor); ?> ;   
}

/* Modern skincolor */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-modern .vc_tta-panel .vc_tta-panel-heading {
    border-color: <?php echo esc_attr($skincolor); ?> ; 
    background-color: <?php echo esc_attr($skincolor); ?> ; 
}

/* Outline skincolor */
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a:hover,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a {
    border-color: <?php echo esc_attr($skincolor); ?> ; 
    background-color: transparent;
    color: <?php echo esc_attr($skincolor); ?> ; 
}

.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab>a:hover {
    background-color: <?php echo esc_attr($skincolor); ?> ; 
    color: #fff;
}
.wpb-js-composer .vc_tta-style-classic.vc_tta-accordion.tcmt-sboxaccordion-styleone .vc_tta-icon,
.wpb-js-composer .vc_tta-style-classic.vc_tta-accordion.tcmt-sboxaccordion-styleone .vc_tta-controls-icon,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-outline .vc_tta-tab.vc_active>a{
	color: <?php echo esc_attr($skincolor); ?> ; 
}


/**
 * Extra section
 * ----------------------------------------------------------------------------
 */
 
 
 .cymolthemes-testimonialbox-styleone.stylethree .cymolthemes-box-content:before,
#yith-quick-view-content .onsale,
.single .main-holder .site-content span.onsale,
.main-holder .site-content ul.products li.product .onsale,
.post.cymolthemes-box-blog-classic .cmt-social-share-wrapper .cmt-social-share-links ul li a:hover,
 .cmt-founded-box ,
.cmt-bordered-style-sbox .cmt-sbox:before,
.vc_row.wpb_row.cmt-skincolor-bordered-box .wpb_column:after,
.single-cmt_portfolio .cmt-pf-single-category-w a:hover,
.single-post .cymolthemes-blogbox-sharebox .cymolthemes-tags-links a:hover,
.widget.woocommerce.widget_product_search input[type="submit"],
.widget.woocommerce.widget_product_search button,
.widget .search-form .search-submit,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:before,
.post.cymolthemes-box-blog-classic .cmt-sboxbox-post-date,
.tooltip:after, [data-tooltip]:after,
.single-cmt_team_member .cmt-team-social-links-wrapper ul li a:hover, 
.cmt-custom-heading.cmt-sboxdiet-heading,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a,
.wpb-js-composer .vc_tta.vc_general.vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a:after,
.cmt-sboxfeature-plans .cmt-sboxstatic-box-content,
.cmt-sbox.cmt-sbox-iconalign-left-spacing.cmt-sbox-istyle-rounded:hover .cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner.cmt-vc_icon_element-background,
.cmt-processbox-wrapper .cmt-processbox .process-num,
.cmt-seperator-solid .cmt-vc_general.cmt-sboxvc_cta3 .cmt-vc_cta3-content-header h4.cmt-custom-heading:after,
.cmt-seperator-solid.cmt-sboxelement-align-center .cmt-vc_general.cmt-sboxvc_cta3 .cmt-vc_cta3-content-header h4.cmt-custom-heading:before,
.cmt-sbox .cmt-vc_general.cmt-sboxvc_cta3 a.cmt-vc_general.cmt-vc_btn3:hover:after,
.cmt-sboxheader-social-box div.cmt-sboxicon-wrapper ul li a:hover,
.post.cymolthemes-box-blog-classic .cymolthemes-blogbox-footer-readmore a:hover:after,
.cmt-sbox.tcmt-service-box-separator .cmt-sboxvc_cta3-container>.cmt-vc_general:after,
.wpb_row.cmt-sboxprocess-style2 .vc_column_container>.vc_column-inner:after,
.cmt-ptablebox-featured-col .cmt-ptablebox .cmt-vc_btn3.cmt-vc_btn3-color-grey,
.cmt_prettyphoto.cmt-vc_icon_element .cmt-vc_icon_element-inner.cmt-vc_icon_element-background-color-skincolor:before,
.cmt_prettyphoto.cmt-vc_icon_element .cmt-vc_icon_element-inner.cmt-vc_icon_element-background-color-skincolor:after,
.cmt-processbox-wrapper .cmt-processbox:hover .process-num,
.entry-title-wrapper .entry-title:before,
.post.cymolthemes-box-blog-classic .cmt-sboxbox-post-icon,
.cymolthemes-box-blog .cmt-sboxbox-post-date,
.cymolthemes-teambox-view-overlay .cymolthemes-overlay a,
cymolthemes-teambox-styleone .cymolthemes-overlay a,
.cymolthemes-fbar-position-right .cymolthemes-fbar-btn a.skincolor,
.cymolthemes-fbar-position-default .cymolthemes-fbar-btn a.skincolor,
.widget .cmt_info_widget,
.widget_subscribe_form input[type="submit"],
.tcmt-sboxpricetable-column-w.cmt-ptablebox-featured-col .cmt-ptablebox .cmt-sbox-icon-wrapper,
.comment-list a.comment-reply-link:hover,
.cymolthemes-box-blog .cmt-sboxbox-post-date,
.tribe-events-list-separator-month span,
#tribe-events-content .tribe-events-read-more:hover,
.tribe-events-list .tribe-events-loop .tribe-event-featured .tribe-events-event-cost .ticket-cost,
#tribe-events-content.tribe-events-single .tribe-events-back a:hover,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-next a:hover,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-previous a:hover,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-left a:hover,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-right a:hover,
.cmt-vc_btn3.cmt-vc_btn3-color-black.cmt-vc_btn3-style-flat:focus,
.cmt-vc_btn3.cmt-vc_btn3-color-black.cmt-vc_btn3-style-flat:hover,
.cmt-vc_btn3.cmt-vc_btn3-color-black:focus, .cmt-vc_btn3.cmt-vc_btn3-color-black:hover,
.cmt-header-icons .cmt-header-wc-cart-link span.number-cart,
.cymolthemes-events-box-view-top-image-details .cymolthemes-post-readmore a:hover,
.cymolthemes-box-events .cymolthemes-meta-date,
.cmt-col-bgcolor-darkgrey .social-icons li > a:hover,
.cmt-topbar-wrapper .cymolthemes-fbar-btn,
.cmt-skincolor-bg,
.footer .widget .widget-title:before,
.cmt-bg-highlight,
.cmt-bgcolor-darkgrey .cymolthemes-boxes-testimonial.cymolthemes-boxes-col-one .cymolthemes-box-view-default .cymolthemes-box-desc:after,
.cmt-row .cmt-col-bgcolor-darkgrey .cymolthemes-boxes-testimonial.cymolthemes-boxes-col-one .cymolthemes-box-view-default .cymolthemes-box-desc:after,
.cymolthemes-boxes-testimonial.cymolthemes-boxes-col-one .cymolthemes-box-view-default .cymolthemes-box-desc:after,
.wpcf7 .cmt-sboxcontactform input[type="radio"]:checked:before,
.cmt-sboxdropcap.cmt-bgcolor-skincolor,
.newsletter-form input[type="submit"],
.cymolthemes-twitterbox-inner i,
.cmt-title-wrapper.cmt-breadcrumb-on-bottom.cmt-breadcrumb-bgcolor-skincolor .cmt-titlebar .breadcrumb-wrapper .container,
.cmt-title-wrapper.cmt-breadcrumb-on-bottom.cmt-breadcrumb-bgcolor-skincolor  .breadcrumb-wrapper .container:before,
.cmt-title-wrapper.cmt-breadcrumb-on-bottom.cmt-breadcrumb-bgcolor-skincolor .breadcrumb-wrapper .container:after {
	background-color: <?php echo esc_attr($skincolor); ?>; 
}

.cmt-sbox.sbox-hover-style2:hover,
.cymolthemes-fbar-box-w .submit_field button,
.cymolthemes-events-box-view-top-image-details .cymolthemes-post-readmore a,
.cymolthemes-box-events .event-box-content .cymolthemes-eventbox-footer a,
#tribe-events-content .tribe-events-read-more, 
#tribe-events-content.tribe-events-single .tribe-events-back a,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-next a,
#tribe-events-content #tribe-events-footer .tribe-events-sub-nav .tribe-events-nav-previous a,
#tribe-events .tribe-events-button, 
.tribe-events-button,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-left a,
#tribe-events-content #tribe-events-header .tribe-events-sub-nav .tribe-events-nav-right a {
	background-color: rgba( <?php echo cymolthemes_hex2rgb($skincolor); ?> , 0.93);
}


.cmt-sboxsingle-image-wrapper.imagestyle-three .cmt-sboxsingle-image-inner:after, 
.cmt-sboxsingle-image-wrapper.imagestyle-three .cmt-sboxsingle-image-inner:before,
.cmt-sboxsingle-image-wrapper.imagestyle-two .cmt-sboxsingle-image-inner:after, 
.cmt-sboxsingle-image-wrapper.imagestyle-two .cmt-sboxsingle-image-inner:before,
.cmt-sboxsingle-image-wrapper.imagestyle-one .cmt-sboxsingle-image-inner:after,
.cmt-sboxsingle-image-wrapper.imagestyle-one .cmt-sboxsingle-image-inner:before,

.comment-list a.comment-reply-link:hover,
.cmt-social-share-links ul li a:hover,
.cmt-sboxheader-social-box div.cmt-sboxicon-wrapper ul li a:hover,
.cymolthemes-teambox-styletwo:hover .cymolthemes-team-image-box,
.cymolthemes-blogbox-styletwo .cymolthemes-box-content .cmt-sboxpost-categories>.cmt-meta-line.cat-links a,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:after,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_active .vc_tta-panel-heading .vc_tta-controls-icon:before,
.cymolthemes-boxes-row-wrapper .slick-arrow:hover,
.sbox-hover-borderbox .cmt-sbox .cmt-sboxvc_cta3-container>.cmt-vc_general:after,
.widget .search-form .search-field:focus,
.cymolthemes-box-events.cymolthemes-box-view-top-image:hover .event-box-content,
.tcmt-sboxskin-outline-border .cmt-vc_icon_element-style-rounded:before,
.cmt-sbox.cmt-sboxiconbox-bottom-border .cmt-sboxvc_cta3-icons:after,
.cmt-bgcolor-darkgrey .wpcf7 .cmt-sboxcontactform .wpcf7-textarea:focus,
.wpcf7 .cmt-sboxcommonform .wpcf7-text:focus,
.wpcf7 .cmt-sboxcommonform textarea:focus {
	border-color:<?php echo esc_attr($skincolor); ?>;
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-outline.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-controls-icon:after, 
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-outline.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-controls-icon:before,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-outline.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-body,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-outline.vc_tta-accordion .vc_tta-panel.vc_active .vc_tta-panel-heading,
.cymolthemes-boxes-testimonial .cymolthemes-box.cymolthemes-box-view-default .cymolthemes-post-item .cymolthemes-box-desc:after,
.cymolthemes-box-team .cymolthemes-box-social-links ul li a:hover,
.header-style-four .header-widget .header-icon .icon,
.cmt-pf-single-content-wrapper.cmt-sboxpf-view-top-image .cymolthemes-pf-single-detail-box,
.cmt-sboxrounded-shadow-box > .vc_column-inner > .wpb_wrapper,
.widget .woocommerce-product-search .search-field:focus,
.widget .search-form .search-field:focus,
body table.booked-calendar td.today .date span,
.servicebox-number .cmt-sbox.cmt-sbox-istyle-rounded-outline .cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner:before,
.cmt-sbox.cmt-sboxiconbox-bottom-border .cmt-sboxvc_cta3-icons:after,
.cmt-sboxsevicebox-skinborder .cmt-sbox .cmt-vc_icon_element.cmt-vc_icon_element-outer .cmt-vc_icon_element-inner.cmt-vc_icon_element-color-skincolor,
.cmt-skincolor-border,
.cmt-skincolor-bottom-boder {
	border-color: <?php echo esc_attr($skincolor); ?>;	
}
.widget .widget-title{
	border-left-color: <?php echo esc_attr($skincolor); ?>;	
}
.cymolthemes-fbar-position-right .cymolthemes-fbar-btn a:after {
	border-right-color: <?php echo esc_attr($skincolor); ?>;	
}
.tooltip-top:before, .tooltip:before, [data-tooltip]:before,
.cymolthemes-fbar-position-default .cymolthemes-fbar-btn a:after {
	border-top-color: <?php echo esc_attr($skincolor); ?>;	
}
.cmt-founded-box:before,
.cmt-footer-cta-wrapper .cta-widget-area .cmt-sboxphone-block:before,
.cmt-search-overlay .w-search-form-row:before {
	border-bottom-color: <?php echo esc_attr($skincolor); ?>;	
}

.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a, 
.cmt-search-outer .cmt-sboxicon-close:before,
.cmt-sbox-bordered-style .cmt-sbox:hover,
.serviceboxes-with-banner.cmt-servicebox-hover .cmt-sbox.cmt-bg.cmt-bgimage-yes:hover .cmt-bg-layer {
  background-color: <?php echo esc_attr($skincolor); ?> !important;
}

/*** Textcolor ***/

.cmt-stepbox-section .cmt-stepsbox:hover .cmt-vc_icon_element .cmt-vc_icon_element-inner,

/**Blogbox**/
.cymolthemes-box-blog.cymolthemes-blogbox-styleone .cymolthemes-blogbox-desc-footer a:hover,

/**Testimonial**/
.cymolthemes-boxes-testimonial .cymolthemes-box.cymolthemes-box-view-default .cymolthemes-post-item .cymolthemes-box-desc:after,
 .footer .social-icons li > a:hover,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-modern .vc_tta-tab.vc_active>a,

.cmt-topbar-wrapper:not(.cmt-bgcolor-skincolor) .top-contact i,
.cmt-element-heading-wrapper .cmt-sboxvc_cta3-headers h4 strong,
h2.cmt-custom-heading strong,
.cmt-element-heading-wrapper .cmt-sboxvc_cta3-headers h2 strong,
ul.duplexo_contact_widget_wrapper li:before,
.cmt-link-underline a,
a.cmt-link-underline,
.cmt-bgcolor-darkgrey .wpb_text_column a,
.header-style-three .info-widget-content h2,
.cmt-header-icon.cmt-sboxheader-social-box a.cmt-social-btn-link i:focus,
.cmt-header-icon.cmt-sboxheader-social-box a.cmt-social-btn-link i:hover,
.wpb-js-composer .vc_tta-color-skincolor.vc_tta-style-classic.cmt-sboxtourtab-style1 .vc_tta-icon,
.woocommerce .summary .compare.button:hover,
.cmt-sboxnewsletter-box h3 strong,
.cmt-sboxtab-top-icon .vc_tta-tab >a:not(:hover) .vc_tta-icon:before,
.cmt-fid-with-icon.cmt-fid-view-topicon .cmt-fid-icon-wrapper i,
.header-style-three .info-widget-inner h2,
.vc_row.cmt-bgcolor-darkgrey .social-icons li > a,
.cmt-titlebar-main .breadcrumb-wrapper span.current-item,
.cmt-sbox-separator .cmt-sbox .cmt-vc_cta3-content-header h4,
.cymolthemes-portfoliobox-styleone .cymolthemes-box-category a:hover,
.cmt-col-bgcolor-darkgrey .cymolthemes-boxes-testimonial .cymolthemes-box-view-default .cymolthemes-author-name,
.cymolthemes-fbar-box .search_field i, 
.cymolthemes-content-team-search-box .search_field i,
.cymolthemes-events-box-view-top-image-details .cymolthemes-eventbox-footer a:not(:hover),
body .booked-calendar-wrap .booked-appt-list .timeslot .timeslot-title,
.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-menu-parent > a,
.cmt-mmmenu-override-yes #site-header-menu #site-navigation div.mega-menu-wrap ul.mega-menu.mega-menu-horizontal > li.mega-menu-item ul.mega-sub-menu > li.mega-current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current_page_parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-page-parent > a,
#site-header-menu #site-navigation div.nav-menu > ul > li li.current-menu-ancestor > a,
.cmt-top-bar-content .social-icons li > a:hover,
.header-style-four .header-widget .header-icon i,
#tribe-events-content a:hover,
.tribe-event-schedule-details,
.comment-meta a:hover,
.cmt-sboximage-with-box-hover:hover .cmt_photo_link .vc_single_image-wrapper:after,
.cmt-sboxcomment-owner a:hover,
.header-style-four .cmt-top-info-con .cmt-sbox .cmt-vc_cta3-content-header h4 a:hover,
.wpb-js-composer .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta-accordion.vc_tta-color-white.vc_tta-style-classic .vc_tta-panel.vc_active .vc_tta-controls-icon-position-right .vc_tta-controls-icon,
.make-appoint-form .wpcf7 label i,
h4.cmt-custom-heading.cmt-skincolor,
h3.cmt-custom-heading.cmt-skincolor,
.cmt-col-bgimage-yes .cmt-sboxskincolor,
.cmt-bgcolor-darkgrey .cmt-custom-heading.cmt-skincolor,
.second-footer .container.cmt-container-for-footer .row > .widget-area:first-child ul.duplexo_contact_widget_wrapper li:before{
	color: <?php echo esc_attr($skincolor); ?>;	
}
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel .vc_tta-panel-title>a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel .vc_tta-panel-heading:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-tab >a:hover,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel.vc_active .vc_tta-panel-title>a,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-panel.vc_active .vc_tta-panel-heading,
.wpb-js-composer .vc_tta.vc_tta-style-outline.vc_tta-color-grey:not(.vc_tta-accordion) .vc_tta-tab.vc_active>a {
    border-color: <?php echo esc_attr($skincolor); ?>;	
	background-color: <?php echo esc_attr($skincolor); ?>;	
}

.cmt-bgimage-yes.cmt-textcolor-white .cmt-vc_cta3-content-header h4,
.cmt-textcolor-white .cmt-fid-with-icon.cmt-fid-view-topicon .cmt-fid-icon-wrapper i,
.site-footer .cmt-skincolor,
.cmt-sboxskincolo-strong .cmt-element-heading-wrapper .cmt-custom-heading strong ,
.cmt-custom-heading.cmt-sboxskincolo-strong strong,
.vc_row .cmt-skincolor,
.cmt-row .cmt-skincolor,
.cmt-skincolor,
span.cmt-skincolor a {
	color: <?php echo esc_attr($skincolor); ?> !important;	 
}

/*woocommerce*/
.skincolor-border,
.skincolor-border .vc_column-inner,
.cmt-sbox.cmt-sboxborder-skincolor .cmt-sboxvc_cta3-container {
	border-color: <?php echo esc_attr($skincolor); ?> !important;	 
}

.cmt-sboxtriangle-corner .vc_single_image-wrapper:before,
.wpb-js-composer .vc_tta-color-grey.vc_tta-style-classic .vc_tta-tab.vc_active>a,
.woocommerce-message,
.woocommerce-info,
.single .main-holder div.product .woocommerce-tabs ul.tabs li.active:before,
.cmt-search-overlay {
    border-top-color: <?php echo esc_attr($skincolor); ?>;
}

/* ********************* Responsive Menu Code Start *************************** */
<?php
/*
 *  Generate dynamic style for responsive menu. The code with breakpoint.
 */
require_once( get_template_directory() .'/css/dynamic-menu-css.php' ); // Functions
?>
/* ********************** Responsive Menu Code END **************************** */




/******************************************************/
/******************* Custom Code **********************/

<?php
// We are not escaping / sanitizing as we are expecting css code. 
$custom_css_code = cymolthemes_get_option('custom_css_code');
if( !empty($custom_css_code) ){
	$custom_css_code = html_entity_decode($custom_css_code);
	echo trim($custom_css_code);
}
?>

/******************************************************/