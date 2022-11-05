/**
 *  Admin custom JS file
 */
"use strict";
 
 
// Header Style - Change options based on selected header style on click 
function cymolthemes_header_style_change_triggers(){
	
	"use strict";
	
	// Default value
	var header_bg_color               = 'white';
	var header_bg_custom_color        = 'darkgrey';
	var titlebar_background_color	  = 'custom';
	var titlebar_text_color			  = 'white';
	var topbar_right_text			  = '[cmt-social-links tooltip="no"] <a class="cmt-vc_general cmt-vc_btn3 cmt-vc_btn3-size-md cmt-vc_btn3-shape-square cmt-vc_btn3-style-flat cmt-vc_btn3-color-skincolor" href="#">Get A Quotes</a>';
	var topbar_left_text			  = '<ul class="top-contact"><li><i class="fa fa-envelope-o"></i><a href="mailto:info@example.com.com"> info@example.com</a></li><li><i class="fa fa-phone"></i>+1-2345-6789-101</li></ul>';
	var titlebar_height				  = '250';
	var mainmenufont_color            = '#002c5b';
	var topbar_bg_color				  = 'darkgrey';
	var header_height                 = '100';
	var logoimg						  = 'logo.png';
	var logo_max_height				  = '47';
	var mainmenu_active_link_color    = 'skin';
	var stickymainmenufontcolor_color = '#002c5b';
	var sticky_header_bg_color        = 'white';
	var dropmenu_background_color     = '#ffffff';
	var dropdownmenufont_color        = '#7d8791';
	var infostack_column_one		  = '<div class="header-icon"> <div class="icon"><i class="cmt_duplexo flaticon-phone-call"></i></div></div><div class="header-content"><h3>Call Us</h3><h5>+123 795 9841</h5></div>';
	var infostack_column_two		  = '<div class="header-icon"> <div class="icon"><i class="cmt_duplexo flaticon-email"></i></div></div><div class="header-content"><h3>Send Us Email</h3><h5>info@example.com</h5></div>';
	var infostack_column_three		  = '<div class="header-icon"> <div class="icon"><i class="cmt_duplexo flaticon-placeholder"></i></div></div><div class="header-content"><h3>Locate In</h3><h5>24 Fifth st, Los Angeles, USA</h5></div>';
	var infostack_phone_text		  = '<div class="cmt-rt-icon"><i class="ti ti-files"></i></div><div class="cmt-custombutton"><p>Need Estimate?</p><a href="#">Request A Quote</a></div>';
	
	jQuery('input[name="duplexo_theme_options[headerstyle]"]').change(function() {
		
		var imgurl = jQuery(this).next().attr('src').split('inc');
		imgurl = imgurl[0]+ 'images/';
		
		console.log(this.value);
		
		if (this.value == 'one') { // one
			jQuery('select[name="duplexo_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="duplexo_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="duplexo_theme_options[titlebar_text_color]"]').val(titlebar_text_color);
			jQuery('input[name="duplexo_theme_options[titlebar_height]"').val(titlebar_height);  // Titlebar height
			jQuery('input[name="duplexo_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('input[name="duplexo_theme_options[header_search]"]').prop('checked', true);  // Show header search
			jQuery('input[name="duplexo_theme_options[mainmenufont][color]"').iris('color', mainmenufont_color);  // 
			jQuery('input[name="duplexo_theme_options[header_height]"]').val(header_height);  // Header Height
			jQuery('input[name="duplexo_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="duplexo_theme_options[logoimg][thumb-url]"]').val( imgurl+logoimg );
			jQuery('input[name="duplexo_theme_options[logoimg][full-url]').val( imgurl+logoimg );
			jQuery('input[name="duplexo_theme_options[logo_max_height]"]').val(logo_max_height);  //
			jQuery('select[name="duplexo_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change(); // Select
			jQuery('input[name="duplexo_theme_options[stickymainmenufontcolor]"]').iris('color', stickymainmenufontcolor_color);  // 
			jQuery('select[name="duplexo_theme_options[sticky_header_bg_color]"]').val(sticky_header_bg_color).change();		
			jQuery('input[name="duplexo_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color);  // Dropdown Menu color
			jQuery('input[name="duplexo_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  // Dropdown Menu color
			jQuery('textarea[name="duplexo_theme_options[header_text]"]').val('');  //
				
		} else if ( this.value == 'two' || this.value == 'overlay' ) {  // Overlay
			jQuery('select[name="duplexo_theme_options[header_bg_color]"]').val('darkgrey').change();
			jQuery('input[name="duplexo_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="duplexo_theme_options[titlebar_text_color]"]').val(titlebar_text_color);
			jQuery('input[name="duplexo_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('input[name="duplexo_theme_options[titlebar_height]"').val('400');  // Titlebar height
			jQuery('input[name="duplexo_theme_options[header_search]"]').prop('checked', true);  // Show header search
			jQuery('input[name="duplexo_theme_options[mainmenufont][color]"').iris('color', '#ffffff');   // 
			jQuery('input[name="duplexo_theme_options[header_height]"]').val('82');  // Header Height
			jQuery('input[name="duplexo_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="duplexo_theme_options[logoimg][thumb-url]"]').val( imgurl+'logo-white.png' );
			jQuery('input[name="duplexo_theme_options[logoimg][full-url]').val( imgurl+'logo-white.png' );
			jQuery('input[name="duplexo_theme_options[logo_max_height]"]').val(logo_max_height);  //
			jQuery('select[name="duplexo_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change(); // Select
			jQuery('input[name="duplexo_theme_options[stickymainmenufontcolor]"]').iris('color', '#ffffff');// 
			jQuery('select[name="duplexo_theme_options[sticky_header_bg_color]"]').val('darkgrey').change();
			jQuery('input[name="duplexo_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color); // Dropdown Menu color
			jQuery('input[name="duplexo_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  
			jQuery('textarea[name="duplexo_theme_options[header_text]"]').val('');  //

		} else if (this.value == 'four') {
			jQuery('select[name="duplexo_theme_options[header_bg_color]"]').val(header_bg_color).change();
			jQuery('input[name="duplexo_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="duplexo_theme_options[titlebar_text_color]"]').val(titlebar_text_color);
			jQuery('input[name="duplexo_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('input[name="duplexo_theme_options[titlebar_height]"').val('300');  // Titlebar height
			jQuery('input[name="duplexo_theme_options[header_search]"]').prop('checked', false);  // Show header search
			jQuery('input[name="duplexo_theme_options[mainmenufont][color]"').iris('color', '#ffffff');// 
			jQuery('input[name="duplexo_theme_options[header_height]"]').val('140');  // Header Height
			jQuery('input[name="duplexo_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="duplexo_theme_options[logoimg][thumb-url]"]').val( imgurl+'logo.png' );
			jQuery('input[name="duplexo_theme_options[logoimg][full-url]').val( imgurl+'logo.png' );
			jQuery('input[name="duplexo_theme_options[logo_max_height]"]').val('50');   //  //
			jQuery('select[name="duplexo_theme_options[mainmenu_active_link_color]"]').val(mainmenu_active_link_color).change(); // Select
			jQuery('input[name="duplexo_theme_options[stickymainmenufontcolor]"]').iris('color', '#ffffff');// 
			jQuery('select[name="duplexo_theme_options[sticky_header_bg_color]"]').val('darkgrey').change();
			jQuery('select[name="duplexo_theme_options[infostack_phone_text]"]').val(infostack_phone_text).change();
			jQuery('textarea[name="duplexo_theme_options[infostack_column_one]"]').val(infostack_column_one);
			jQuery('textarea[name="duplexo_theme_options[infostack_column_two]"]').val(infostack_column_two);
			jQuery('textarea[name="duplexo_theme_options[infostack_column_three]"]').val(infostack_column_three);
			jQuery('select[name="duplexo_theme_options[header_menu_bg_color]"]').val('darkgrey').change();
			jQuery('select[name="duplexo_theme_options[sticky_header_menu_bg_color]"]').val('darkgrey').change();
			
			jQuery('input[name="duplexo_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color);  // Dropdown Menu color
			jQuery('input[name="duplexo_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  // Dropdown Menu color
			
		} else if (this.value == 'six') {
			jQuery('select[name="duplexo_theme_options[header_bg_color]"]').val('skincolor').change();			
			jQuery('input[name="duplexo_theme_options[titlebar_background][color]"]').iris('color', titlebar_background_color);  // 
			jQuery('select[name="duplexo_theme_options[titlebar_text_color]"]').val(titlebar_text_color);
			jQuery('input[name="duplexo_theme_options[show_topbar]"]').prop('checked', true);  // Show topbar
			jQuery('input[name="duplexo_theme_options[titlebar_height]"').val('283');  // Titlebar height
			jQuery('input[name="duplexo_theme_options[header_search]"]').prop('checked', true);  // Show header 
			jQuery('input[name="duplexo_theme_options[header_height]"]').val('66');  // Header Height
			jQuery('input[name="duplexo_theme_options[logoimg][id]"]').val('');
			jQuery('input[name="duplexo_theme_options[logoimg][thumb-url]"]').val( imgurl+'logo2.png' );
			jQuery('input[name="duplexo_theme_options[logoimg][full-url]').val( imgurl+'logo2.png' );
			jQuery('input[name="duplexo_theme_options[mainmenufont][color]"').iris('color', '#ffffff');   // 
			jQuery('input[name="duplexo_theme_options[stickymainmenufontcolor]"]').iris('color', '#ffffff');// 
			jQuery('input[name="duplexo_theme_options[logo_max_height]"]').val('89');   //  //
			jQuery('select[name="duplexo_theme_options[mainmenu_active_link_color]"]').val('custom').change(); // Select
			jQuery('select[name="duplexo_theme_options[sticky_header_bg_color]"]').val('skincolor').change();	
			jQuery('input[name="duplexo_theme_options[dropmenu_background][color]"]').iris('color', dropmenu_background_color);  // Dropdown Menu color
			jQuery('input[name="duplexo_theme_options[dropdownmenufont][color]"]').iris('color', dropdownmenufont_color);  // Dropdown Menu color
			
		}
		
	});
}
 

/**
 *  Codestar Framework : cymolthemes_background JS
 */
jQuery.fn.CYMOLTHEMES_CSFRAMEWORK_BG_IMAGE_UPLOADER = function($) {
    return this.each(function() {

	var $this      = jQuery(this),
		$add       = $this.find('.cs-add'),
		$preview   = $this.find('.cs-image-preview'),
		$noimgtext = $this.find('.cmt-sboxcs-background-heading-noimg'),
		$closeicon = $this.find('.cmt-sboxcs-remove'),
		$remove    = $this.find('.cs-remove'),
		$input     = $this.find('input.cmt-sboxbackground-image'),
		$inputid   = $this.find('input.cmt-sboxbackground-imageid'),
		$img       = $this.find('img'),
		$btntitleadd    = $this.find('.cmt-sboxcs-background-text-add-image').text(),
		$btntitlechange = $this.find('.cmt-sboxcs-background-text-change-image').text(),
		wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;

          $img.removeClass('hidden');
		  $closeicon.removeClass('hidden');
		  $noimgtext.addClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.url ).trigger('change');
		  $inputid.val( attachment.id ).trigger('change');
			$add.text($btntitlechange);
        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
        $img.addClass('hidden');
		$closeicon.addClass('hidden');
		$noimgtext.removeClass('hidden');
		$add.text($btntitleadd);
      });

    });

  };


/**
 *  Codestar Framework : cymolthemes_typography JS
 */
  jQuery.fn.CYMOLTHEMES_CSFRAMEWORK_TYPOGRAPHY = function() {
    return this.each( function() {

      var typography      = jQuery(this),
          family_select   = typography.find('.cs-typo-family'),
          variants_select = typography.find('.cs-typo-variant'),
          typography_type = typography.find('.cs-typo-font');

      family_select.on('change', function() {

        var _this     = jQuery(this),
            _type     = _this.find(':selected').data('type') || 'custom',
            _variants = _this.find(':selected').data('variants');

        if( variants_select.length ) {

          variants_select.find('option').remove();

          jQuery.each( _variants.split('|'), function( key, text ) {
            variants_select.append('<option value="'+ text +'">'+ text +'</option>');
          });

          variants_select.find('option[value="regular"]').attr('selected', 'selected').trigger('chosen:updated');

        }

        typography_type.val(_type);

      });

    });
  };
  

/**
 *  cymolthemes_image 
 */
  jQuery.fn.CYMOLTHEMES_CSFRAMEWORK_IMAGE_UPLOADER = function() {
    return this.each(function() {

      var $this     = jQuery(this),
          $add      = $this.find('.cs-add'),
          $preview  = $this.find('.cs-image-preview'),
          $remove   = $this.find('.cs-remove'),
          $input    = $this.find('input.cmt-sboxcs-imgid'),
		  $thumbimg = $this.find('input.cmt-sboxcs-thumburl'),
		  $fullimg  = $this.find('input.cmt-sboxcs-fullurl'),
          $img      = $this.find('img'),
          wp_media_frame;

      $add.on('click', function( e ) {

        e.preventDefault();

        // Check if the `wp.media.gallery` API exists.
        if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
          return;
        }

        // If the media frame already exists, reopen it.
        if ( wp_media_frame ) {
          wp_media_frame.open();
          return;
        }

        // Create the media frame.
        wp_media_frame = wp.media({
          library: {
            type: 'image'
          }
        });

        // When an image is selected, run a callback.
        wp_media_frame.on( 'select', function() {

          var attachment = wp_media_frame.state().get('selection').first().attributes;
          var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
		  var fullimg    = ( typeof attachment.sizes.full.url !== 'undefined' ) ? attachment.sizes.full.url : '';

          $preview.removeClass('hidden');
          $img.attr('src', thumbnail);
          $input.val( attachment.id ).trigger('change');
		  $fullimg.val( fullimg ).trigger('change');
		  $thumbimg.val( thumbnail ).trigger('change');

        });

        // Finally, open the modal.
        wp_media_frame.open();

      });

      // Remove image
      $remove.on('click', function( e ) {
        e.preventDefault();
        $input.val('').trigger('change');
		$fullimg.val('').trigger('change');
		$thumbimg.val('').trigger('change');
        $preview.addClass('hidden');
      });

    });

  };
  

/**
 *  Titlebar text custom color show/hide
 */ 
function cymolthemes_show_hide_titlebar_textcolor(){
	
	var $this      = jQuery( 'select[name="duplexo_theme_options[titlebar_text_color]"]' );
	var $page_this = jQuery( 'select[name="_cymolthemes_metabox_group[titlebar_text_color]"]' );
	
	if( $this.length > 0 ){
		if( jQuery($this).val()=='custom' ){
			jQuery( 'input[name="duplexo_theme_options[titlebar_heading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').show();
			jQuery( 'input[name="duplexo_theme_options[titlebar_subheading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').show();
			jQuery( 'input[name="duplexo_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').show();
		} else {
			jQuery( 'input[name="duplexo_theme_options[titlebar_heading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').hide();
			jQuery( 'input[name="duplexo_theme_options[titlebar_subheading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').hide();
			jQuery( 'input[name="duplexo_theme_options[titlebar_breadcrumb_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').hide();
		}
	}
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_heading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').show();
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_subheading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').show();
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').show();
			
		} else {
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_heading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').hide();
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_subheading_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').hide();
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_breadcrumb_font][color]"]' ).closest('.cmt-sboxtypography-font-color-w').hide();
		}
	}		
}
  
 
/**
 *  Titlebar bg custom color show/hide
 */ 
function cymolthemes_show_hide_titlebar_bgcolor(){
	
	var $page_this = jQuery( 'select[name="_cymolthemes_metabox_group[titlebar_bg_color]"]' );
	
	if( $page_this.length > 0 ){
		if( jQuery($page_this).val()=='custom' ){
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_background][color]"]' ).closest('.cmt-sboxbackground-color-w').show();
		} else {
			jQuery( 'input[name="_cymolthemes_metabox_group[titlebar_background][color]"]' ).closest('.cmt-sboxbackground-color-w').hide();
		}
	}
		
}


/**
 *  CymolThemes icon picker
 */
function cymolthemes_icon_picker(){
	
	if( jQuery('.cymolthemes-iconpicker-wrapper').length > 0 ){
		
		jQuery('.cymolthemes-iconpicker-wrapper').each(function(){
			
			var mainwrapper = jQuery(this);
			
			// checking if iconpicker already applied
			if( jQuery('.cymolthemes-iconpicker-list', mainwrapper ).hasClass('iconpicker') == false ){
				
				// check if click applied
				if( !jQuery( '.cmt-sboxipicker-selector-button', mainwrapper ).hasClass('cmt_click_applied') ){
					
					jQuery( '.cmt-sboxipicker-selector-button', mainwrapper ).on('click', function(){
						
						var $btn = jQuery(this);
						if( jQuery( '.cymolthemes-iconpicker-list-w', mainwrapper ).css('display')=='none' ){
							
							
							// Apply iconpicker() on click so it will not load the page
							if( !jQuery('.cymolthemes-iconpicker-list', mainwrapper ).hasClass('iconpicker') ){
								
								jQuery('.cymolthemes-iconpicker-list', mainwrapper ).iconpicker({
									align: 'left', // Only in div tag
									arrowPrevIconClass: 'fa fa-chevron-left',
									arrowNextIconClass: 'fa fa-chevron-right',
									cols: 8,
									icon: jQuery('.cymolthemes-iconpicker-list', mainwrapper ).data('icon'),
									iconset: jQuery('.cymolthemes-iconpicker-list', mainwrapper ).data('iconset'),
									rows: 5
								});
								jQuery('.cymolthemes-iconpicker-list', mainwrapper ).on('change', function(e) {
									jQuery('.cmt-sboxipicker-selected-icon i',mainwrapper).removeClass().addClass( e.icon );
									jQuery('.cymolthemes-iconpicker-input',mainwrapper).val(e.icon);
								});
								
							}
							
							jQuery( '.cymolthemes-iconpicker-list-w', mainwrapper ).slideDown();
							jQuery( '.cmt-sboxipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-down').addClass('fa-arrow-up');
						} else {
							jQuery( '.cymolthemes-iconpicker-list-w', mainwrapper ).slideUp();
							jQuery( '.cmt-sboxipicker-selector-button i', mainwrapper ).removeClass('fa-arrow-up').addClass('fa-arrow-down');
						}
						return false;
					});
					
					
					// adding class so no other click applied
					jQuery( '.cmt-sboxipicker-selector-button', mainwrapper ).addClass('cmt_click_applied');
					
				}
			
			
				
				// close when click outside
				jQuery(document).on('click', function(event) { 
					if(!jQuery(event.target).closest('.cymolthemes-iconpicker-list-w', mainwrapper ).length) {
						if(jQuery('.cymolthemes-iconpicker-list-w', mainwrapper).is(":visible")) {
							jQuery( '.cmt-sboxipicker-selector-button', mainwrapper ).trigger('click');
						}
					}
				});
				
			}
			
		});
		
		jQuery('.cmt-sboxipicker-selector-w' ).each(function(){
			
			// specially for CodeStar element only
			if( jQuery('.cymolthemes-iconpicker-element').length > 0 ){
				jQuery('.cymolthemes-iconpicker-element').each(function(){
					var wrapper2 = jQuery(this);
					jQuery('.cmt-sboxiconpicker-library-selector', wrapper2 ).on('change', function(e){
						
						var curr_library = jQuery('.cmt-sboxiconpicker-library-selector', wrapper2).val();
						
						jQuery('.cymolthemes-iconpicker-wrapper', wrapper2).each(function(){
							jQuery(this).hide();
							jQuery('.cymolthemes-iconpicker-wrapper.cmt-sboxiconpicker-'+curr_library, wrapper2).show();
						});
						
					});
					
				});
			};
			
			
			
		});

	}
}
 
 
/**
 *  This is for background with custom color dropdown.. This will will show/hide color picker from the background options.
 */
function cymolthemes_show_hide_color_picker_background(){
	
	
	var items = [
		['fbar_bg_color',          'fbar_background'],
		['titlebar_bg_color',      'titlebar_background'],
		['full_footer_bg_color',   'full_footer_bg_all'],
		['first_footer_bg_color',  'first_footer_bg_all'],
		['second_footer_bg_color', 'second_footer_bg_all'],
		['bottom_footer_bg_color', 'bottom_footer_bg_all']
	];
	
	jQuery(items).each(function(n,val){
		
		var dropdown_name   = val[0];
		var background_name = val[1];
		
		var $dropdown_element   = jQuery( 'select[name="duplexo_theme_options['+dropdown_name+']"]' );
		
		// show/hide the color picker on load
		if( $dropdown_element.val()=='custom' ){
			jQuery( 'input[name="duplexo_theme_options['+background_name+'][color]"]' ).closest('.cmt-sboxbackground-color-w').show();
		} else {
			jQuery( 'input[name="duplexo_theme_options['+background_name+'][color]"]' ).closest('.cmt-sboxbackground-color-w').hide();
		}
		
		// on change of the dropdown
		$dropdown_element.change(function() {  // Theme Options
			
			if( jQuery(this).val()=='custom' ){
				jQuery( 'input[name="duplexo_theme_options['+background_name+'][color]"]' ).closest('.cmt-sboxbackground-color-w').show();
			} else {
				jQuery( 'input[name="duplexo_theme_options['+background_name+'][color]"]' ).closest('.cmt-sboxbackground-color-w').hide();
			}
		});
		
	});
	
}


/**
 *  Blog Post Format - Move the Gallery Meta Box to the Gallery Tab content so user can select images directly from Gallery tab.
 */
function cymolthemes_gallery_post_format(){
	// moving the gallery meta box after the gallery box
	jQuery("#cfpf-format-gallery-preview").after( jQuery("#_cymolthemes_metabox_gallery") );
	
	// hide all box by defualt
	jQuery("#_cymolthemes_metabox_gallery").hide();
	
	jQuery("#cfpf-format-gallery-preview").hide();
	jQuery( '#cfpf-format-gallery-preview > label' ).hide();
	jQuery( '#cfpf-format-gallery-preview > .cfpf-gallery-options' ).hide();
	
	
	// show/hide if gallery post format
	if( jQuery('input[name="post_format"]:checked').val() == 'gallery' ){
		jQuery("#_cymolthemes_metabox_gallery").show();
	}
	
	jQuery('input[name="post_format"]').change(function() {
		console.log( 'Changed: ' + this.value );
		
		if( this.value == 'gallery' ){
			jQuery("#_cymolthemes_metabox_gallery").show();
		} else {
			jQuery("#_cymolthemes_metabox_gallery").hide();
		}
		
	});

}


/**
 *  Document Ready Init
 */
jQuery(document).ready( function() {
	
	// stickey header in theme options
	jQuery(".cs-header").stick_in_parent();
	
	// Icon picker in CodeStar framework
	cymolthemes_icon_picker();
	
	// When clicking on add group button and the group contains icon picker in it. Specially created for Portfolio List
	jQuery('.cs-field-group').each(function(){
		var groups = jQuery(this);
		jQuery( '.cs-add-group', groups ).on('click', function(){
			setTimeout(function(){
				jQuery('.cs-group:last-child .cymolthemes-iconpicker-list', groups ).removeClass('iconpicker');
				cymolthemes_icon_picker();
			}, 10);
		});
	});
	
	jQuery('.cs-field-cymolthemes_background', this).CYMOLTHEMES_CSFRAMEWORK_BG_IMAGE_UPLOADER();
	jQuery('.cs-field-cymolthemes_typography', this).CYMOLTHEMES_CSFRAMEWORK_TYPOGRAPHY();
	jQuery('.cs-field-cymolthemes_image', this).CYMOLTHEMES_CSFRAMEWORK_IMAGE_UPLOADER();
	
	
	
	// Titlebar Text Color - Show / Hide color for Text color option
	cymolthemes_show_hide_titlebar_textcolor();
	jQuery( 'select[name="duplexo_theme_options[titlebar_text_color]"]' ).change(function() {  // Theme Options
		cymolthemes_show_hide_titlebar_textcolor();
	});
	jQuery( 'select[name="_cymolthemes_metabox_group[titlebar_text_color]"]' ).change(function() {  // Page Meta Box Option
		cymolthemes_show_hide_titlebar_textcolor();
	});
	
	
	// Titlebar BG Color - Show / Hide color for bg color option
	cymolthemes_show_hide_titlebar_bgcolor()
	jQuery( 'select[name="_cymolthemes_metabox_group[titlebar_bg_color]"]' ).change(function() {  // Page Meta Box Option
		cymolthemes_show_hide_titlebar_bgcolor();
	});
	


	/**
	 *  Codestar Framework : cymolthemes_skin_color JS
	 */
	jQuery('.cs-field-cymolthemes_skin_color').each(function(){
		var $this = jQuery(this);
		jQuery( '.cymolthemes-skin-color-list a', $this ).on('click', function() {
			var color = jQuery(this).css('background-color');
			jQuery('.wp-color-picker', $this ).iris('color', color);
			return false;
		});
	});
	
	
	/**
	 *  Add class in page loading option
	 */
	jQuery('*[data-depend-id="loaderimg_1"]').closest('.cs-field-image-select').addClass('cmt-sboxpre-loader-option-wrapper');
	jQuery('input[type=radio][name="duplexo_theme_options[loaderimg]"]:checked').closest('label').addClass('cmt-sboxpre-loader-option-selected');
	jQuery('input[type=radio][name="duplexo_theme_options[loaderimg]"]').change(function() {
		jQuery('input[type=radio][name="duplexo_theme_options[loaderimg]"]').closest('label').removeClass('cmt-sboxpre-loader-option-selected');
		jQuery(this).closest('label').addClass('cmt-sboxpre-loader-option-selected');
		return true;
	});
	
	
	// Post formats - Move Gallery meta box in Gallery tab 
	cymolthemes_gallery_post_format();
	
	
	/**
	 *  Icon picker init on adding new group in TM Progress Bar
	 */
	if (typeof vc != 'undefined' && typeof vc.atts != 'undefined' ) {
		vc.atts.cymolthemes_iconpicker = {
			init: function ( param, $wrapper ) {
				cymolthemes_icon_picker();
			}
		};
	}
	
	// on ajax complete
	jQuery( document ).ajaxComplete(function( event, xhr, settings ) {
		cymolthemes_icon_picker();
	});
	
	
	/* For all background options - linking dropdown with all color picker for CUSTOM option.. so the color picker will be visiable only when custom color is selected */
	cymolthemes_show_hide_color_picker_background();
		
});  // document.ready


/**
 *  Window Load init
 */
jQuery( window ).load(function() {
	
	// Header Styles - change values of some options on change of the header style
	cymolthemes_header_style_change_triggers();
	
	
	// Post formats - Open Gallery meta box if closed
	if( jQuery(".js #_cymolthemes_metabox_gallery").hasClass('closed') ){
		jQuery(".js #_cymolthemes_metabox_gallery button.handlediv").trigger('click');
	}
	
	// Codestar - Remove DISABLED and adding READONLY to the export textarea
	jQuery('textarea[name="_nonce"]').prop("readonly", true);
	jQuery('textarea[name="_nonce"]').removeAttr('disabled');

});  // window.load