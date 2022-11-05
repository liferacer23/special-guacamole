function cymolthemes_style_selector_click(){
	jQuery('.cmt-sboxstyleselector-thumb').each(function(){
		var $this = jQuery(this);
		
		jQuery($this).on( 'click', function(){
			var currval = jQuery(this).data('value');
			var wrapper = jQuery(this).closest('.cmt-sboxstyleselector-main-wrapper');
			
			jQuery( '.cmt-sboxstyleselector-thumb', wrapper).removeClass('cmt-sboxstyleselector-thumb-selected');
			jQuery( '.cmt-sboxstyleselector-thumb-'+currval, wrapper).addClass('cmt-sboxstyleselector-thumb-selected');
			
			jQuery( 'select', wrapper).val(currval).trigger('change');
			
			
		});
		
	});

};
cymolthemes_style_selector_click();