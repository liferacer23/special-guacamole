<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// [cmt-sboxprogress-bar]
if( !function_exists('cymolthemes_sc_progress_bar') ){
function cymolthemes_sc_progress_bar( $atts, $content=NULL ) {

	$return = '';
	
	if( function_exists('vc_map') ){

		
		global $cmt_sc_params_progressbar;
		$options_list   = cymolthemes_create_options_list($cmt_sc_params_progressbar);
		
		extract( shortcode_atts( 
			$options_list
		, $atts ) );
		
		$return = '';
		
		// Required JS files
		wp_enqueue_script( 'waypoints', array( 'jquery' ) );
		
		wp_enqueue_script( 'vc_waypoints' );
		wp_enqueue_script( 'waypoints' );

		$css_class = 'cymolthemes-progress-bar vc_progress_bar wpb_content_element vc_progress-bar-color-' . $bgcolor;

		
		// Extra Class
		if( !empty($el_class) ){
			$css_class .= ' ' . $el_class;
		}
		
		// CSS Options class
		if( function_exists('cymolthemes_vc_shortcode_custom_css_class') ){
			$custom_css_class = cymolthemes_vc_shortcode_custom_css_class($css);
			if( !empty($custom_css_class) ){
				$css_class .= ' ' . $custom_css_class;
			}
		}
		
		
		
		$bar_options = array();
		$options = explode( ',', $options );
		if ( in_array( 'animated', $options ) ) {
			$bar_options[] = 'animated';
		}
		if ( in_array( 'striped', $options ) ) {
			$bar_options[] = 'striped';
		}

		/*if ( 'custom' === $bgcolor && '' !== $custombgcolor ) {
			$custombgcolor = ' style="' . vc_get_css_color( 'background-color', $custombgcolor ) . '"';
			if ( '' !== $customtxtcolor ) {
				$customtxtcolor = ' style="' . vc_get_css_color( 'color', $customtxtcolor ) . '"';
			}
			$bgcolor = '';
		} else {*/
			$custombgcolor  = '';
			$customtxtcolor = '';
			$bgcolor_class  = 'vc_progress-bar-color-' . esc_attr( $bgcolor );
			$css_class     .= ' ' . $bgcolor_class;
		/*}*/
		
		
		$class_to_filter = 'vc_progress_bar wpb_content_element';

							

		$values = (array) vc_param_group_parse_atts( $values );
		$max_value = 0.0;
		$graph_lines_data = array();
		foreach ( $values as $data ) {
			$new_line = $data;
			$new_line['value']    = isset( $data['value'] ) ? $data['value'] : 0;
			$new_line['label']    = isset( $data['label'] ) ? $data['label'] : '';
			$new_line['bgcolor']  = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $custombgcolor;
			$new_line['txtcolor'] = isset( $data['color'] ) && 'custom' !== $data['color'] ? '' : $customtxtcolor;
			if ( isset( $data['customcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
				$new_line['bgcolor'] = ' style="background-color: ' . esc_attr( $data['customcolor'] ) . ';"';
			}
			if ( isset( $data['customtxtcolor'] ) && ( ! isset( $data['color'] ) || 'custom' === $data['color'] ) ) {
				$new_line['txtcolor'] = ' style="color: ' . esc_attr( $data['customtxtcolor'] ) . ';"';
			}

			if ( $max_value < (float) $new_line['value'] ) {
				$max_value = $new_line['value'];
			}
			$graph_lines_data[] = $new_line;
		}

		
		/* *********************************************************************** */
		
		

		$return .= '<div class="' . esc_attr( $css_class ) . '">';

		$return .= wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_progress_bar_heading' ) );
		


		foreach ( $graph_lines_data as $line ) {
			
			// added by CymolThemes START
			$cmt_icon_exists = 'cmt-sboxpbar-icon-false';
			if( !empty($line['add_icon']) && $line['add_icon']=='true' ){
				$cmt_icon_exists = 'cmt-sboxpbar-icon-true';
			}
			// added by CymolThemes END
			
			
			
			// Applying color to icon
			$icon_color = $bgcolor;
			if( empty($icon_color) ) {
				$icon_color = 'skincolor';
			}
			if( !empty($line['color']) ) {
				$icon_color = $line['color'];
			}

			
			
			
			
			$return .= '<div class="cmt-sboxpbar-single-bar-w ' . cymolthemes_sanitize_html_classes($cmt_icon_exists) . '">';
			
			$unit = ( '' !== $units ) ? ' <span class="cmt-sboxvc_label_units vc_label_units">' . $line['value'] . esc_attr($units) . '</span>' : '';
			// Icon
			if( !empty($line['add_icon']) && $line['add_icon']=='true' ){
				$return .= '<div class="cmt-sboxpbar-icon-w">';
				$return .= do_shortcode('[cmt-sboxicon type="' . $line['i_type'] . '" color="' . $icon_color . '" icon_linecons="' . $line['i_icon_linecons'] . '" icon_themify="' . $line['i_icon_themify'] . '" icon_fontawesome="' . $line['i_icon_fontawesome'] . '" icon_cmt_duplexo="' . $line['i_icon_cmt_duplexo'] . '" ]');
				$return .= '</div>';
			}
			
			
			$return .= '<div class="vc_general vc_single_bar' . ( ( isset( $line['color'] ) && 'custom' !== $line['color'] ) ? ' ' . sanitize_html_class('vc_progress-bar-color-'.$line['color']) : '' ) . '">';
						
				$return .= '<small class="vc_label"' . esc_attr($line['txtcolor']) . '>' . esc_attr($line['label']) . '</small>';
				
				if ( $max_value > 100.00 ) {
					$percentage_value = (float) $line['value'] > 0 && $max_value > 100.00 ? round( (float) $line['value'] / $max_value * 100, 4 ) : 0;
				} else {
					$percentage_value = $line['value'];
				}
				
				$return .= cymolthemes_wp_kses($unit);
				$return .= '<span class="vc_bar ' . esc_attr( implode( ' ', $bar_options ) ) . '" data-percentage-value="' . esc_attr( $percentage_value ) . '" data-value="' . esc_attr( $line['value'] ) . '"' . esc_attr($line['bgcolor']) . '></span>';
				
			$return .= '</div>';
			
			$return .= '</div>';
			
		}
		
		
		// Display Options CSS code
		if( !empty($css) ){
			//$return .= '<style>' . $css . '</style>' ;
		}
		

		$return .= '</div>';
		
	
	
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	
	
	return $return;
	
}
}
add_shortcode( 'cmt-sboxprogress-bar', 'cymolthemes_sc_progress_bar' );