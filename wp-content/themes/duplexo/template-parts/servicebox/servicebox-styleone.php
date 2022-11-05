<article class="cymolthemes-box cymolthemes-box-service cymolthemes-servicebox-styleone <?php echo cymolthemes_servicebox_class(); ?>">
	<div class="cymolthemes-post-item">	
		<div class="cymolthemes-post-item-inner">
			<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-size-two' ); // Featured content ?>
					<div class="cymolthemes-service-icon-plus">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><i class="cmt-duplexo-icon-plus-1"></i></a>
		</div>
		</div>
		<div class="cymolthemes-box-bottom-content">	
			<?php echo cymolthemes_servicebox_icon(); ?>
			
			<div class="cymolthemes-box-desc">
			    <?php echo cymolthemes_box_title(); ?>
				<div class="cmt-sboxshort-desc">
					<?php the_excerpt(); ?>
				</div>
			</div> 
		</div>
	</div>
</article>