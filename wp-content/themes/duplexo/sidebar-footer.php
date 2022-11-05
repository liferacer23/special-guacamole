<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Duplexo
 * @since Duplexo 1.0
 */
global $duplexo_theme_options;


?>

<div id="bottom-footer-text" class="bottom-footer-text cmt-sboxbottom-footer-text site-info <?php echo cymolthemes_sanitize_html_classes(cymolthemes_footer_row_class( 'bottom' )); ?>">
	<div class="bottom-footer-bg-layer cmt-bg-layer"></div>
	<div class="<?php echo cymolthemes_sanitize_html_classes(cymolthemes_footer_container_class()); ?>">
		<div class="bottom-footer-inner">
			<div class="row multi-columns-row">
<?php
$left_content=cymolthemes_footer_copyright_right();
$right_content=$duplexo_theme_options['footer_copyright_left'];
if(!empty($left_content)) { $left_col_class='col-sm-7'; } else { $left_col_class='col-sm-12'; }
if(!empty($right_content)) { $right_col_class='col-sm-5'; } else { $right_col_class='col-sm-12'; }
?>
				<div class="col-xs-12 <?php echo esc_attr($left_col_class); ?> <?php if(!empty($right_content)) { ?>cmt-footer2-left <?php } ?>">
					<?php
					if( !empty($duplexo_theme_options['footer_copyright_left']) ){
					echo do_shortcode( $duplexo_theme_options['footer_copyright_left'] );
					}
					?>
				</div><!--.footer menu -->

				<div class="col-xs-12 <?php echo esc_attr($right_col_class); ?> <?php if(!empty($left_content)) { ?>cmt-footer2-right <?php } ?>">
					<?php echo cymolthemes_wp_kses( cymolthemes_footer_copyright_right() ); ?>
				</div><!--.copyright --> 

			</div><!-- .row.multi-columns-row --> 
		</div><!-- .bottom-footer-inner --> 
	</div><!--  --> 
</div><!-- .footer-text -->