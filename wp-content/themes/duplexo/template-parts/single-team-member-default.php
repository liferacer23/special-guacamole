<?php
/*
 *
 *  Single Team member - Default
 *
 */

?>

<div class="cmt-team-member-single-content-wrapper cmt-team-member-view-default">
	<div class="cmt-team-member-single-content row">
			<div class="cymolthemes-team-member-single-featured-area col-xs-12 col-sm-5 col-md-5 col-lg-5">
				<div class="cymolthemes-team-img">
					<?php echo cymolthemes_get_featured_media(); ?>					
				</div>
			</div><!-- .cymolthemes-team-member-single-featured-area -->
			<div class="cymolthemes-team-member-single-content-area col-xs-12 col-sm-7 col-md-7 col-lg-7">
				<div class="cmt-team-member-content">
					<div class="cmt-team-member-single-list row">				
						<div class="cmt-team-member-single-title-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="cmt-team-member-single row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
										<h2 class="cmt-team-member-single-title"><?php the_title(); ?></h2>
										<?php echo cymolthemes_wp_kses( cymolthemes_team_member_single_meta( 'position' ) ); ?>
										<?php if( has_excerpt() ){ ?>
											<div class="cmt-short-desc">
												<?php $return  = nl2br( get_the_excerpt() );
												echo do_shortcode($return); ?>
											</div>
										<?php } ?>
									<?php echo cymolthemes_wp_kses( cymolthemes_team_member_meta_details() ); ?>				
									<?php echo cymolthemes_team_member_extra_details(); ?>
									<div class="clear clr"></div>
									<?php echo cymolthemes_wp_kses( cymolthemes_box_team_social_links(), 'box_team_social_links' ); ?>
								</div>
							</div>					
						</div>			
					</div><!-- .cmt-team-member-single-list.row -->	
				</div>
			</div><!-- .cymolthemes-team-member-single-content-area -->		
	</div>
	<div class="cmt-team-member-single-content-wrapper">
		<?php echo cymolthemes_team_member_content(); ?>
	</div>
</div>

<?php edit_post_link( esc_attr__( 'Edit', 'duplexo' ), '<footer class="entry-footer"><span class="edit-link">', '</span></footer><!-- .entry-footer -->' ); ?>