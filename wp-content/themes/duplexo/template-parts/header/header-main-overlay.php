<div id="cmt-stickable-wrapper" class="cmt-stickable-wrapper cmt-bgcolor-<?php echo cymolthemes_get_option('header_bg_color'); ?>" style="height:<?php echo cymolthemes_get_option('header_height'); ?>px">
<?php get_template_part('template-parts/header/header','topbar'); ?>
	<div id="site-header" class="site-header <?php echo cymolthemes_sanitize_html_classes(cymolthemes_header_class()); ?> <?php echo cymolthemes_sanitize_html_classes(cymolthemes_sticky_header_class()); ?>">
		
		<div class="site-header-main cmt-section-wrapper <?php echo cymolthemes_sanitize_html_classes(cymolthemes_header_container_class()); ?>">
		
			<div class="site-branding cmt-section-wrapper-cell">
				<?php echo cymolthemes_wp_kses( cymolthemes_site_logo() ); ?>
			</div><!-- .site-branding -->

			<div id="site-header-menu" class="site-header-menu cmt-section-wrapper-cell">
				<nav id="site-navigation" class="main-navigation" aria-label="Primary Menu" data-sticky-height="<?php echo esc_attr(cymolthemes_get_option('header_height_sticky')); ?>">
					<?php cymolthemes_header_text(); ?>
					
					<?php echo cymolthemes_wp_kses( cymolthemes_header_links(), 'header_links' ); ?>
					<?php get_template_part('template-parts/header/header','menu'); ?>
				</nav><!-- .main-navigation -->
			</div><!-- .site-header-menu -->
			
			<?php cymolthemes_one_page_site_js(); ?>
			
		</div><!-- .site-header-main -->
	</div>
</div>


