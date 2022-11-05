<article class="cymolthemes-box cymolthemes-box-portfolio cymolthemes-portfoliobox-styletwo cymolthemes-portfoliobox-stylethree <?php echo cymolthemes_portfoliobox_class(); ?>">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-box-content cymolthemes-overlay">
			<?php echo cymolthemes_featured_image('cymolthemes-img-portfolio'); ?>
				<div class="portfolio-overlay-iconbox">	
					<a href="<?php echo esc_url( get_permalink() ); ?>"><i class="cmt-duplexo-icon-plus-1"></i></a>		
				</div>
		</div>			
            <div class="cymolthemes-box-content-inner">	
				<?php echo cymolthemes_box_title(); ?>
				<div class="cymolthemes-box-category">
				<?php echo cymolthemes_portfolio_category(true); ?></div>
			 </div>	
	</div>
</article>
