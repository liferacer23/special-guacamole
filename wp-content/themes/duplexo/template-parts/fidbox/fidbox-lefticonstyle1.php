<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_fid_element_values;
	
	if( is_array($cmt_global_fid_element_values) ) :
	
?>


<div class="cmt-fid inside <?php echo cymolthemes_sanitize_html_classes($cmt_global_fid_element_values['main-class']); ?>">
	<div class="cmt-fid-left">
		<?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['lefticoncode'], 'fid_icon'); ?>
	</div>
	<div class="cmt-fld-contents">	
		<h3 class="cmt-fid-title"><span><?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['title']); ?><br></span></h3>
		<h4 class="cmt-fid-inner">
		<?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['before_text']); ?>
		<span
			data-appear-animation = "animateDigits"
			data-from             = "0"
			data-to               = "<?php echo esc_attr($cmt_global_fid_element_values['digit']); ?>"
			data-interval         = "<?php echo esc_attr($cmt_global_fid_element_values['interval']); ?>"
			data-before           = "<?php echo esc_attr($cmt_global_fid_element_values['before']); ?>"
			data-before-style     = "<?php echo esc_attr($cmt_global_fid_element_values['beforetextstyle']); ?>"
			data-after            = "<?php echo esc_attr($cmt_global_fid_element_values['after']); ?>"
			data-after-style      = "<?php echo esc_attr($cmt_global_fid_element_values['aftertextstyle']); ?>"
			>
				<?php echo esc_attr($cmt_global_fid_element_values['digit']); ?>
		</span>
		<?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['after_text']); ?>
	</h4>
	</div><!-- .cmt-fld-contents -->
	<?php echo cymolthemes_wp_kses($cmt_global_fid_element_values['righticoncode'], 'fid_icon'); ?>
</div>



<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$cmt_global_fid_element_values = '';
?>