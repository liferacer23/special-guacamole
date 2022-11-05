<article class="cymolthemes-box cymolthemes-box-testimonial cymolthemes-testimonialbox-styleone stylethree">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-box-content">
			<div class="cymolthemes-box-author">				
				<div class="cymolthemes-box-img"><?php echo cymolthemes_testimonial_featured_image('thumbnail') ?></div>
				<div class="cymolthemes-box-desc">
					<blockquote class="cymolthemes-testimonial-text"><?php echo cymolthemes_wp_kses( strip_tags( get_the_content('') ) ); ?></blockquote>
					<div class="cymolthemes-box-title"><?php echo cymolthemes_testimonial_title(); ?>
						 <div class="cymolthemes-ratting-star"><?php echo cymolthemes_star_ratting(); ?></div>
					</div>
				</div>		
			</div>
		</div>
	</div>
</article>