<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Duplexo
 * @since Duplexo 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area <?php echo cymolthemes_sanitize_html_classes(cymolthemes_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">
								
			<?php if ( have_posts() ) : ?>
		
				

				<?php if( !empty($_GET['post_type']) ) : ?>
					<header class="page-header">
						<?php echo cymolthemes_search_results_box_title( $_GET['post_type'] ); ?>
					</header><!-- .page-header -->
				<?php endif; ?>

				
				<?php echo cymolthemes_search_results_content(); ?>

				
				
			<?php
			// If no content, include the "No posts found" template.
			else :
				?>
				
				<div class="cmt-sboxsresults-no-content-w">
				
				<?php
				$no_result_text = cymolthemes_get_option( 'searchnoresult' );
				echo cymolthemes_wp_kses( $no_result_text );
				?>
				
				</div>
				
			<?php endif; ?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->
	
	
	<?php
	// Left Sidebar
	cymolthemes_get_left_sidebar();

	// Right Sidebar
	cymolthemes_get_right_sidebar();
	?>

<?php get_footer(); ?>
