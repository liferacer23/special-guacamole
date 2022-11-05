<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_ptbox_element_values;
	
	if( is_array($cmt_global_ptbox_element_values) ) :	
?>


<div class="cmt-ptablebox cmt-ptablebox-<?php echo cymolthemes_sanitize_html_classes($cmt_global_ptbox_element_values['boxstyle']); ?> <?php echo cymolthemes_sanitize_html_classes($cmt_global_ptbox_element_values['main-class']); ?>">
	
	<div class="cymolthemes-ptable-main">
		<div class="cmt-ptablebox-title"><h3><?php echo esc_attr($cmt_global_ptbox_element_values['heading']); ?></h3></div>
		<div class="cmt-ptablebox-desc"><?php echo esc_attr($cmt_global_ptbox_element_values['description']); ?></div>	
		<div class="cmt-ptablebox-price-w">
			<?php echo cymolthemes_wp_kses($cmt_global_ptbox_element_values['cur_symbol_before']); ?>
			<div class="cmt-ptablebox-price"><?php echo esc_attr($cmt_global_ptbox_element_values['price']); ?></div>
			<?php echo cymolthemes_wp_kses($cmt_global_ptbox_element_values['cur_symbol_after']); ?>	
			<div class="cmt-ptablebox-frequency"><?php echo esc_attr($cmt_global_ptbox_element_values['price_frequency']); ?></div>
		</div>
	</div>
	
	
	<div class="cmt-ptablebox-content">
		<div class="cmt-ptablebox-features">
			<?php echo cymolthemes_wp_kses($cmt_global_ptbox_element_values['lines_html']); ?>
		</div>
		
		<?php if( !empty($cmt_global_ptbox_element_values['btn_title']) ){ ?>
			<?php echo do_shortcode('[cmt-sboxbtn color="grey" style="flat" shape="square" size="md" title="'. esc_attr($cmt_global_ptbox_element_values['btn_title']).'" link="'.esc_attr($cmt_global_ptbox_element_values['btn_link']).'"]'); ?>
		<?php } ?>
	</div>
</div>


<?php
	endif;
	$cmt_global_ptbox_element_values = '';
?>