<article class="cymolthemes-box cymolthemes-box-team cymolthemes-teambox-styleone">
	<div class="cymolthemes-post-item">
		<div class="cymolthemes-content-inner">
				<div class="cymolthemes-team-image-box">
					<?php echo cymolthemes_wp_kses(cymolthemes_featured_image('cymolthemes-img-team-member')); ?>
					<div class="cymolthemes-box-social-links"><?php echo cymolthemes_box_team_social_links(); ?></div>
				</div>	
				
			<div class="cymolthemes-box-content">
				<div class="cymolthemes-box-content-inner">
					<?php echo cymolthemes_box_title(); ?>
					<div class="cymolthemes-team-position"><?php echo cymolthemes_get_meta( 'cymolthemes_team_member_details', 'cmt_team_info' , 'team_details_line_position' ); ?></div>
					
				</div>
			</div>
		</div>
	</div>
</article>
 