<article class="cymolthemes-box cymolthemes-box-events cymolthemes-box-view-top-image cymolthemes-events-box-view-top-image">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-post-item-inner">
			<?php echo cymolthemes_get_featured_media( get_the_ID(), 'cymolthemes-img-blog-top', true ); ?>
		</div>
		<div class="event-box-content">
			<div class="cymolthemes-box-title"><?php echo cymolthemes_box_title(); ?></div>
			<div class="cymolthemes-box-meta cymolthemes-events-meta"><?php echo cymolthemes_wp_kses( cymolthemes_event_meta() ); ?></div>
			<?php echo cymolthemes_wp_kses( cymolthemes_event_venue() ); ?>
		</div>
	</div>
</article>