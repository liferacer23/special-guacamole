<article <?php cymolthemes_sanitize_html_classes( post_class( cymolthemes_blog_classic_extra_class() )); ?>>
	<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
		<?php echo cymolthemes_get_featured_media( '', 'cymolthemes-img-blog' ); // Featured content?>
	<div class="cmt-post-date"><span><?php echo get_the_date( 'd' ); ?></span><?php echo get_the_date( 'M' ); ?></div>	
	</div>
	<div class="cmt-blog-classic-box-content">
		<header class="entry-header">
		<?php if( !is_single() ) : ?>
		<?php if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>	
				
		
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<?php endif; ?>
		<div class="cmt-entrymeta-wrapper">
			<?php echo duplexo_entry_meta('blogclassic');  // blog post meta details ?>		
		</div>			
		</header><!-- .entry-header -->
		<div class="entry-content">
			<div class="cymolthemes-box-desc-text">
				<?php the_content( '' ); ?>
			</div>
			<div class="cymolthemes-blogbox-desc-footer">
				<div class="cymolthemes-blogbox-footer-readmore">
					<?php echo cymolthemes_blogbox_readmore(); ?>
				</div>
			</div>
			<div class="clear clr"></div>		
			<?php
			// pagination if any
			wp_link_pages( array(
				'before'      => '<div class="page-links">' . esc_attr__( 'Pages:', 'duplexo' ),
				'after'       => '</div>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	</div>
	<?php endif; ?>
</article>