<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Duplexo
 * @since Duplexo 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo cymolthemes_sanitize_html_classes(cymolthemes_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
		
		
		<?php if( cymolthemes_get_option('blog_view') == 'box' ) : ?>
			<div class="row multi-column-row cymolthemes-boxes-row-wrapper">
		<?php endif; ?>
		
		
		<?php if ( have_posts() ) : ?>

			<?php
			// Start the loop.
			while ( have_posts() ) : the_post();

				if( cymolthemes_get_option('blog_view') == 'box' ){
					echo cymolthemes_column_div('start', cymolthemes_get_option('blogbox_column') );
					echo get_template_part('template-parts/blogbox/blogbox', cymolthemes_get_option('blogbox_view') );
					echo cymolthemes_column_div('end', cymolthemes_get_option('blogbox_column') );
				} 
				else if(cymolthemes_get_option('blog_view') == 'classic') {
					echo get_template_part('template-parts/blogbox/blogbox','classic');
				}
				else {
					get_template_part( 'template-parts/content', 'post' );
				}

			// End the loop.
			endwhile;

			
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
		
		
		<?php if( cymolthemes_get_option('blog_view') == 'box' ) : ?>
			</div><!-- .row -->
		<?php endif; ?>
		
		
		<?php
		// Previous/next page navigation.
		echo cymolthemes_pagination();
		?>
		
		
		</main><!-- .site-main -->
	</div><!-- .content-area -->
	

<?php
// Left Sidebar
cymolthemes_get_left_sidebar();

// Right Sidebar
cymolthemes_get_right_sidebar();
?>



<?php get_footer(); ?>
