<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Duplexo
 * @since Duplexo 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo cymolthemes_sanitize_html_classes(cymolthemes_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">

			<section class="error-404 not-found">
				
				<?php echo cymolthemes_404_icon(); ?>
				<?php echo cymolthemes_404_heading(); ?>
				<?php echo cymolthemes_404_description(); ?>
				
				<?php if( cymolthemes_get_option('error404_search')==true ): ?>
				<div class="cmt-404-search-form">
					<?php get_search_form(); ?>
				</div><!-- .cmt-404-search-form -->
				<?php endif; ?>
				
			</section><!-- .error-404 -->

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
