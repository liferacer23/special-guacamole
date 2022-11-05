<?php if( cymolthemes_topbar_show() ) : ?>

<div class="cmt-topbar-wrapper <?php echo cymolthemes_sanitize_html_classes(cymolthemes_topbar_classes()); ?>">
	<div class="cymolthemes-topbar-inner">
		<div class="<?php echo cymolthemes_sanitize_html_classes(cymolthemes_topbar_container_class()); ?>">
			<?php echo cymolthemes_wp_kses( cymolthemes_topbar_content(), 'topbar' ); ?>
		</div>
	</div>
</div>

<?php endif;  // cymolthemes_topbar_show() ?>
