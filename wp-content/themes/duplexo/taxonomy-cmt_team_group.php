<?php
/**
 * Portfolio Category
 *
 */


// Fetching Taxonomy data so we can use it
$tax = $wp_query->get_queried_object();


get_header(); ?>

	<section id="primary" class="content-area <?php echo cymolthemes_sanitize_html_classes(cymolthemes_sidebar_class('content-area')); ?>">
		<main id="main" class="site-main">

		<?php if ( have_posts() ) : ?>
			
			<?php
			// Taxonomy featured image set by CymolThemes
			$term_data         = get_term_meta( $tax->term_id, 'cmt_taxonomy_options', true );
			$featured_img_code = '';
			if( !empty($term_data['tax_featured_image']) ){
				$featured_img_code = '<div class="cmt-term-featured-img"><img src="' . esc_url($term_data['tax_featured_image']) . '" alt="' . esc_attr($tax->name) . '" /></div>';
			}
			echo cymolthemes_wp_kses($featured_img_code);
			?>
			
			<?php
			// category description
			$tax_desc = '';
			if( !empty($tax->description) ){
				$tax_desc .= '<div class="cmt-sboxterm-desc">';
					$tax_desc .= do_shortcode(nl2br($tax->description));
				$tax_desc .= '</div>';
			}
			echo cymolthemes_wp_kses($tax_desc);
			?>
						
			<?php
			global $duplexo_theme_options;
			$view   = ( !empty($duplexo_theme_options['teamcat_view']) ) ? $duplexo_theme_options['teamcat_view'] : 'top-image' ;
			$column = ( !empty($duplexo_theme_options['teamcat_column']) ) ? $duplexo_theme_options['teamcat_column'] : 'three' ;
			
			?>	
			
			<div class="row multi-columns-row cymolthemes-boxes-row-wrapper">
				
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();
				?>
				
				<?php echo cymolthemes_column_div('start', $column ); ?>
					<?php echo get_template_part( 'template-parts/teambox/teambox', $view ); ?>
				<?php echo cymolthemes_column_div('end', $column ); ?>

				<?php
				
			// End the loop.
			endwhile;
			
			?>
			
			</div><!-- .cymolthemes-boxes-row-wrapper -->

			<?php
			// Previous/next page navigation.
			echo cymolthemes_pagination();
			?>			
				
			<?php
		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- .site-main -->
	</section><!-- .content-area -->
	
<?php
// Left Sidebar
cymolthemes_get_left_sidebar();

// Right Sidebar
cymolthemes_get_right_sidebar();
?>
	
	
<?php get_footer(); ?>
