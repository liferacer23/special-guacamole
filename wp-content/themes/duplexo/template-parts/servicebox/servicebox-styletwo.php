<article class="cymolthemes-box cymolthemes-box-service cymolthemes-servicebox-styletwo <?php echo cymolthemes_servicebox_class(); ?>">
	<div class="cymolthemes-post-item">
	<div class="cymolthemes-post-item-inner">
			<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-size-two' ); // Featured content ?>
		</div>
		<div class="cymolthemes-box-bottom-content">		
			<?php echo cymolthemes_box_title(); ?>
			<div class="cymolthemes-box-desc">
				<div class="cmt-sboxshort-desc">
					<?php the_excerpt(); ?>
				</div>
			</div> 
		</div>
		<div class="cymolthemes-serviceboxbox-readmore">
				<?php echo cymolthemes_servicebox_readmore_text(); ?>
				<span class="cymolthemes-service-icon-button"></span>
	    </div>
						
	</div>
</article>