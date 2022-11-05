// Tab click event
jQuery('.cmt-sboxresponsive-editor-tab-w a').on('click', function(){
	var parentmain = jQuery(this).closest('.cymolthemes-responsive-editor-w');
	var size = jQuery(this).data('cmt-sboxsize');
	
	// change tab active
	jQuery('.cmt-sboxresponsive-editor-tab-w li', parentmain ).removeClass('cmt-sboxresponsive-editor-tab-active');
	jQuery('.cmt-sboxresponsive-editor-tab-w a[data-cmt-sboxsize="'+size+'"]', parentmain ).parent().addClass('cmt-sboxresponsive-editor-tab-active');
	
	// change content active
	jQuery('.cymolthemes-responsive-editor', parentmain).slideUp();
	jQuery('.cymolthemes-responsive-editor-'+size, parentmain).slideDown();
});


jQuery( ".cymolthemes-responsive-editor-w input[type='text']:not(.cmt-sboxmain-value-input), .cymolthemes-responsive-editor-w input[type='checkbox']" ).on( 'change', function() {
	var parentmain = jQuery(this).closest('.cymolthemes-responsive-editor-w');
	var mainval    = '';
	
	jQuery( "input[type='text']:not(.cmt-sboxmain-value-input), input[type='checkbox']", parentmain ).each(function() {
		if( jQuery(this).attr('type')=='checkbox' ){
			if( jQuery(this).is(':checked') ){
				mainval += 'colbreak_yes|';
			} else {
				mainval += 'colbreak_no|';
			}
		} else {
			mainval += jQuery(this).val() + '|';
		}
	});
	
	jQuery('input.cmt-sboxmain-value-input', parentmain ).val( mainval );
	
});