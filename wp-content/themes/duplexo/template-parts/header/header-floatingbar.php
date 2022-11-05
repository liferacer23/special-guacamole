<?php
// Check if floating bar is enabled
if( cymolthemes_fbar_show()==true ): ?>
	
	<div class="cymolthemes-fbar-main-w cymolthemes-fbar-position-<?php echo sanitize_html_class( cymolthemes_get_option('fbar-position') ); ?>">
		<div class="cymolthemes-fbar-inner-w">
			<div class="cymolthemes-fbar-box-w <?php echo cymolthemes_sanitize_html_classes( cymolthemes_fbar_classes() ); ?>">
				<div class="cmt-fbar-bg-layer cmt-bg-layer"></div>
				<div class="cymolthemes-fbar-content-wrapper <?php echo cymolthemes_sanitize_html_classes( cymolthemes_floatingbar_container_class() ); ?>">
					<div class="cymolthemes-fbar-box-w-bgcolor">
						<div class="cymolthemes-fbar-box">
							<?php get_sidebar( 'floatingbar-top' ); ?>
							<?php get_sidebar( 'floatingbar' ); ?>
							<?php get_sidebar( 'floatingbar-bottom' ); ?>
						</div>
					</div>
					<span class="cmt-fbar-close"><?php echo cymolthemes_fbar_close_icon_for_content_area(); ?></span>
				</div>
			</div>
		
		</div><!-- .cymolthemes-fbar-inner-w -->	
	</div><!-- .cymolthemes-fbar-main-w -->
	
<?php endif; ?>