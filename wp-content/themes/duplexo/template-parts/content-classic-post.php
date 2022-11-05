<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Duplexo
 * @since Duplexo 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( cymolthemes_sanitize_html_classes(cymolthemes_postlayout_class()) ); ?> >
	
	<div class="cmt-featured-outer-wrapper cmt-post-featured-outer-wrapper">
		<?php echo cymolthemes_get_featured_media(); // Featured content ?>
	</div>
	
	<div class="cmt-blog-classic-box-content">
		<?php
		if( 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
			<div class="cmt-classic-post-meta">
				<?php echo duplexo_entry_meta('blogclassic');  // blog post meta details ?>
			</div>
		<?php endif; ?>
	
		<?php if( !is_single() ) : ?>
		<header class="entry-header">
				<?php if( 'aside' != get_post_format() && 'quote' != get_post_format() && 'link' != get_post_format() ) : ?>
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php endif; ?>
		</header><!-- .entry-header -->
		<?php endif; ?>	
	<?php if( 'quote' != get_post_format() ) : ?>
		<div class="entry-content">
			
			<?php if( !is_single() ) : ?>
				<div class="cymolthemes-box-desc-text"><?php echo cymolthemes_blogbox_description(); ?></div>
			<?php endif; ?>
		
			<?php

			the_content( sprintf(
				esc_attr__( 'Read More %s', 'duplexo' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) );

			?>

			<div class="cymolthemes-blogbox-footer-readmore">
				<?php echo cymolthemes_blogbox_readmore(); ?>
			</div>	
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
	
	<?php endif; ?>
	
	<?php
		if( is_single() ){ ?>
		<div class="cymolthemes-blogbox-sharebox">	
				<?php echo cymolthemes_social_share_box('post'); ?>	
				<?php
					$tags_list = get_the_tag_list( '', esc_attr_x( ' ', 'Used between list items, there is a space after the comma.', 'duplexo' ) );
					if( !empty($tags_list) ) : ?>	
						<div class="cmt_tag_lists"><span class="cymolthemes-tags-links"><?php echo cymolthemes_wp_kses($tags_list); ?></span></div>
					<?php endif; ?>		
		</div>	
	<?php }	?>

	
	<?php
	// Author bio.
	if ( is_single() && get_the_author_meta( 'description' ) ) :
		get_template_part( 'template-parts/author-bio', 'customized' );
	endif;
	?>
	
	
	<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if ( is_single() && ( comments_open() || get_comments_number() ) ) : ?>
		<div class="cmt-blog-classic-box-comment">
			<?php comments_template(); ?>
		</div><!-- .cmt-blog-classic-box-comment -->
	<?php endif; ?>
	
	
	</div>
</article><!-- #post-## -->