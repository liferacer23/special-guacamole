<?php
$titlebar_content = cymolthemes_titlebar_content();
if( cymolthemes_titlebar_show() ) : ?>

	<?php if( !empty($titlebar_content) ){ ?>
	
		<div class="cmt-title-wrapper cmt-bg <?php echo cymolthemes_sanitize_html_classes(cymolthemes_titlebar_classes()); ?>">
			<div class="cmt-title-wrapper-bg-layer cmt-bg-layer"></div>
			<div class="cmt-titlebar entry-header">
				<div class="cmt-titlebar-inner-wrapper">
					<div class="cmt-titlebar-main">
						<div class="container">
							<div class="cmt-titlebar-main-inner">
								<?php echo cymolthemes_wp_kses( $titlebar_content, 'titlebar' ); ?>
							</div>
						</div>
					</div><!-- .cmt-titlebar-main -->
				</div><!-- .cmt-titlebar-inner-wrapper -->
			</div><!-- .cmt-titlebar -->
		</div><!-- .cmt-title-wrapper -->
		
	<?php } else { ?>
	
		<hr class="cmt-titlebar-border" />
	
	<?php } ?>

<?php endif;  // cymolthemes_titlebar_show() ?>







