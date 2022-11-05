<article class="cymolthemes-box cymolthemes-box-blog cymolthemes-blogbox-styletwo cymolthemes-blogbox-format-<?php echo get_post_format() ?> <?php echo cymolthemes_sanitize_html_classes(cymolthemes_post_class()); ?>">

	<div class="post-item">
		<div class="cymolthemes-box-content">
			<div class="col-md-5 cymolthemes-box-img-left">
				<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
					<div class="cmt-post-date"><span><?php echo get_the_date( 'd' ); ?></span><?php echo get_the_date( 'M' ); ?></div>
					<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog-left' ); // Featured content ?>	
				</div>
			</div>
			<div class="cymolthemes-box-content col-md-7">
				<div class="cymolthemes-box-content-inner">
					<div class="entry-header">
						<?php echo cymolthemes_box_title(); ?>		
						<?php echo duplexo_entry_meta(); ?>								
					</div>
					<div class="cymolthemes-box-desc">					
						<div class="cymolthemes-box-desc-text"><?php echo cymolthemes_blogbox_description(); ?></div>	
					</div>
				</div>					
			</div>
		</div>
	</div>
</article>
