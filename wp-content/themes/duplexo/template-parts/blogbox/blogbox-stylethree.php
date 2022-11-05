<article class="cymolthemes-box cymolthemes-box-blog cymolthemes-blogbox-styleone cymolthemes-blogbox-stylethree cymolthemes-blogbox-format-<?php echo get_post_format() ?> <?php echo cymolthemes_sanitize_html_classes(cymolthemes_post_class()); ?>">
	<div class="post-item">
		<div class="cymolthemes-box-content">		
			<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
					<div class="cmt-post-date"><span><?php echo get_the_date( 'd' ); ?></span><?php echo get_the_date( 'M' ); ?></div>	
				<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog-stylethree' ); // Featured content ?>
			</div>		
			<div class="cymolthemes-box-desc">
				<div class="entry-header">
				    <?php echo cymolthemes_box_title(); ?>	
				</div>	
				<div class="cymolthemes-box-desc-text"><?php echo cymolthemes_blogbox_description(); ?></div>	
				<?php echo duplexo_entry_meta(); ?>				
			</div>
        </div>
	</div>
</article>
