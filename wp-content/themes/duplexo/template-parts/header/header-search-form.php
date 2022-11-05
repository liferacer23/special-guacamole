<?php
global $duplexo_theme_options;

$search_input = ( !empty($duplexo_theme_options['search_input']) ) ? esc_attr($duplexo_theme_options['search_input']) :  esc_attr_x("WRITE SEARCH WORD...", 'Search placeholder word', 'duplexo');
?>

<div class="cymolthemes-header-searchform-wrapper k_flying_searchform_wrapper">
	<div class="container">
		<div class="row">
			<form method="get" id="flying_searchform" action="<?php echo esc_url( home_url() ); ?>" >
				<div class="w-search-form-h">
					<div class="w-search-form-row">
						<div class="w-search-input">
							<input type="text" class="field searchform-s" name="s" id="searchval" placeholder="<?php echo esc_attr($search_input); ?>" value="<?php echo get_search_query() ?>">
							<button class="header-search" type="submit"><i class="cmt-duplexo-icon-search"></i></button>
						</div>
					</div>
				</div>
			</form>
			<div class="cmt-sboxicon-close">
				<i class="fa fa-close"></i>
			</div>
		</div>
	</div>
</div>
