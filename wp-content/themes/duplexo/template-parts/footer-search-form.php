<?php
global $duplexo_theme_options;

$search_input = ( !empty($duplexo_theme_options['search_input']) ) ? esc_attr($duplexo_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'duplexo');

$searchform_title = ( isset($duplexo_theme_options['searchform_title']) ) ? esc_attr($duplexo_theme_options['searchform_title']) :  esc_attr_x("Hi, How Can We Help You?", 'Search form title word', 'duplexo');

if( !empty($searchform_title) ){
	$searchform_title = '<div class="cmt-sboxform-title">' . $searchform_title . '</div>';
}

if( !empty( $duplexo_theme_options['header_search'] ) && $duplexo_theme_options['header_search'] == true ){

?>
<div class="cmt-search-overlay">
	<div class="cmt-search-outer">
		<?php echo cymolthemes_wp_kses($searchform_title); ?>
		<form method="get" class="cmt-site-searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="search" class="field searchform-s" name="s" placeholder="<?php echo esc_attr($search_input); ?>" />
			<button type="submit"><span class="cmt-duplexo-icon-search"></span></button>
		</form>
	</div>
</div>
<?php } ?>