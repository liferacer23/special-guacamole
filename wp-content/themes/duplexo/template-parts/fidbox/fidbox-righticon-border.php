<?php
	// Getting data of the  Facts in Digits box
	global $cmt_global_fid_element_values;
	
	if( is_array($cmt_global_fid_element_values) ) :
	
?>
<div class="cmt-fid-main-border">
	<?php get_template_part('template-parts/fidbox/fidbox', 'righticon'); ?>
</div>
<?php

	endif;
	
	// Resetting data of the Facts in Digits box
	$cmt_global_fid_element_values = '';
?>