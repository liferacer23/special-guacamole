<article class="cymolthemes-box cymolthemes-box-events cymolthemes-box-view-top-image-details cymolthemes-events-box-view-top-image-details">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-post-item-inner">
			<?php echo cymolthemes_get_featured_media( get_the_ID(), 'full', true ); ?>		
		</div>	
		<div class="cymolthemes-box-bottom-content">
			<div class="cymolthemes-box-meta cymolthemes-events-meta"><?php echo cymolthemes_wp_kses( cymolthemes_event_date() ); ?></div>
			<?php echo cymolthemes_box_title(); ?>
			<div class="cymolthemes-box-desc">
				<?php if( has_excerpt() ){ ?>
				<div class="cmt-sboxshort-desc">
					<?php $return  = nl2br( get_the_excerpt() );
					echo do_shortcode($return); ?>
				</div>
			<?php } ?>
			</div>
			<?php echo cymolthemes_wp_kses( cymolthemes_event_venue() ); ?>
			<div class="cymolthemes-eventbox-footer">
				<?php echo cymolthemes_event_readmore(); ?>
			</div>
		</div>
	</div>
</article>
