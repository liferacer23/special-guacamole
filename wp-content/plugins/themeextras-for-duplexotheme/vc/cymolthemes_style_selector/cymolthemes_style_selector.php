<?php
function cymolthemes_style_selector_settings_field( $settings, $value ) {

	$return  = '';
	$imglist = '';
	
	$css_option = str_replace( '#', 'hash-', vc_get_dropdown_option( $settings, $value ) );
	
	$return .= '<div class="cmt-sboxstyleselector-main-wrapper">';
	$return .= '<div style="display:none;">';
	$return .= '<select name="'
	           . $settings['param_name']
	           . '" class="wpb_vc_param_value wpb-input wpb-select cmt-sboxmain-val-input'
	           . $settings['param_name']
	           . ' ' . $settings['type']
	           . ' ' . $css_option
	           . '" data-option="' . $css_option . '">';
	if ( is_array( $value ) ) {
		$value = isset( $value['value'] ) ? $value['value'] : array_shift( $value );
	}
	if ( ! empty( $settings['value'] ) ) {
		foreach ( $settings['value'] as $index => $data ) {
			if ( is_numeric( $index ) && ( is_string( $data ) || is_numeric( $data ) ) ) {
				$option_label = $data;
				$option_value = $data;
			} elseif ( is_numeric( $index ) && is_array( $data ) ) {
				$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
				$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
			} else {
				$option_value = $data;
				$option_label = $index;
			}
			$selected = '';
			$option_value_string = (string) $option_value;
			$value_string = (string) $value;
			
			if ( '' !== $value && $option_value_string === $value_string ) {
				$selected = ' selected="selected"';
			}
			$option_class = str_replace( '#', 'hash-', $option_value );
			$return .= '<option class="' . esc_attr( $option_class ) . '" value="' . esc_attr( $option_value ) . '"' . $selected . '>' . htmlspecialchars( $option_label ) . '</option>';
			
		}
	}
	$return .= '</select>';
	$return .= '</div>';	   

	$return .= '<div class="cmt-sboxstyleselector-thumb-w vc_row">';
	
	foreach ( $settings['value'] as $index => $data ) {
		
		$selected     = '';
		$imgselected  = '';
		$option_label = isset( $data['label'] ) ? $data['label'] : array_pop( $data );
		$option_value = isset( $data['value'] ) ? $data['value'] : array_pop( $data );
			
		// active thumb
		if ( !empty($value) && $option_value === $value ) {
			$imgselected = ' cmt-sboxstyleselector-thumb-selected';
		}
		
		// Thumb images
		if( !empty( $data['thumb'] ) ){
			$width = ( !empty($data['width']) ) ? 'width:'.$data['width'] : '' ;
			
			$return .= '
				<div style="'.$width.'" class="vc_col-sm-6 cmt-sboxstyleselector-thumb '.$imgselected.' cmt-sboxstyleselector-thumb-' . esc_attr( $option_value ) . '" data-value="' . esc_attr( $option_value ) . '" data-selector="'.$settings['param_name'].'">
					<div class="cmt-sboxstyleselector-thumb-inner">
						<img src="'.$data['thumb'].'" /><br>
					</div>
				</div>';
		}
	}
		
	$return .= '</div>';
	$return .= '</div> <!-- .cmt-sboxstyleselector-main-wrapper -->';
	return $return;
}
vc_add_shortcode_param( 'cymolthemes_style_selector', 'cymolthemes_style_selector_settings_field', CMTTE_URI . '/vc/cymolthemes_style_selector/cymolthemes_style_selector.js');