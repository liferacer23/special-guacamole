<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// [cmt-sboxpricing-table]
if( !function_exists('cymolthemes_sc_pricing_table') ){
function cymolthemes_sc_pricing_table( $atts, $content=NULL ) {

	$return = '';
	
	if( function_exists('vc_map') ){

		
		global $cmt_sc_params_pricingtable;
		$list_values   = cymolthemes_create_options_list($cmt_sc_params_pricingtable);
		
		global $cmt_global_ptbox_element_values;
		$cmt_global_ptbox_element_values = array();
		
		extract( shortcode_atts( 
			$list_values
		, $atts ) );
		
		$return = '';
		
		$css_class = 'cymolthemes-ptables-w wpb_content_element';
		
		// CSS Options class
		if( function_exists('cmt_vc_shortcode_custom_css_class') ){
			$custom_css_class = cmt_vc_shortcode_custom_css_class($css);
			if( !empty($custom_css_class) ){
				$css_class .= ' ' . $custom_css_class;
			}
		}
		
		// extra Class
		if( !empty($el_class) ){
			$css_class .= ' ' . $el_class;
		}
		
		
		/* *********************************************************************** */
		/* ************************** Generating Output ************************** */
		
		$return .= '<div class="' . esc_attr( $css_class ) . '">';
		
		$columns_data = array();
		foreach( $list_values as $option_key=>$option_val ){
			
			// First Column
			if( substr($option_key, 0,5)=='col1_' ){
				$columns_data['1_col'][$option_key] = ${$option_key};
			}
			
			// Second Column
			if( substr($option_key, 0,5)=='col2_' ){
				$columns_data['2_col'][$option_key] = ${$option_key};
			}
			
			// Third Column
			if( substr($option_key, 0,5)=='col3_' ){
				$columns_data['3_col'][$option_key] = ${$option_key};
			}
			
			// Fourth Column
			if( substr($option_key, 0,5)=='col4_' ){
				$columns_data['4_col'][$option_key] = ${$option_key};
			}
			
			// Fifth Column
			if( substr($option_key, 0,5)=='col5_' ){
				$columns_data['5_col'][$option_key] = ${$option_key};
			}
			
		}
		
		// Removing column if title is blank
		if( empty($columns_data['1_col']['col1_heading']) ){  unset($columns_data['1_col']); }
		if( empty($columns_data['2_col']['col2_heading']) ){  unset($columns_data['2_col']); }
		if( empty($columns_data['3_col']['col3_heading']) ){  unset($columns_data['3_col']); }
		if( empty($columns_data['4_col']['col4_heading']) ){  unset($columns_data['4_col']); }
		if( empty($columns_data['5_col']['col5_heading']) ){  unset($columns_data['5_col']); }
		
		
		
		// Pricing table column class
		$table_col_class = '';
		if( $boxstyle!='horizontal' ){
			switch( count($columns_data) ){
				case '1':
					$table_col_class = 'col-md-12';
					break;
					
				case '2':
				default:
					$table_col_class = 'col-md-6';
					break;
					
				case '3':
					$table_col_class = 'col-md-4';
					break;
					
				case '4':
					$table_col_class = 'col-md-3';
					break;
					
				case '5':
					$table_col_class = 'col-md-2';
					break;
			}
		}
		
		$col = 1;
		foreach( $columns_data as $column_data ){
			
			// Featured column
			$featured_class     = '';
			if( !empty($featured_col) && $col==$featured_col ){
				$featured_class = 'cmt-ptablebox-featured-col';
			}
			
			
			// Featured column
			$currency_class     = '';
			if( isset($column_data['col' . $col . '_cur_symbol_position']) && $column_data['col' . $col . '_cur_symbol_position']=='before' ){
				$currency_class = 'cmt-sboxcurrency-before';
			}
			else {
				$currency_class = 'cmt-sboxcurrency-after';
			}
			
			/** Icon **/
			$icon = '';
			
			
			// This is real icon code
			$icon_type = ${'col'.$col.'_i_type'};
			$icon_class = ( !empty( ${'col'.$col.'_i_icon_'.$icon_type } ) ) ? ${'col'.$col.'_i_icon_'.$icon_type} : '' ;
			$icon_html  = '<div class="cmt-sbox-icon-wrapper"><i class="' . $icon_class . '"></i></div>';
			
			// each line
			$lines_html = '';
			$values     = ${'col'.$col.'_values' };
			$values     = (array) vc_param_group_parse_atts( $values );
			
			
			
			if( is_array($values) && count($values)>0 ){
				
				foreach ( $values as $data ) {
					
					$new_line = $data;

					$lines_html .= isset( $data['label'] ) ? '<li>'.$data['label'].'</li>' : '';
				}
				
			}
			
			if( !empty($lines_html) ){
				$lines_html = '<ul class="cmt-sboxfeature-lines">'.$lines_html.'</ul>';
			}
			
			
			$return .= '<div class="tcmt-sboxpricetable-column-w ' . esc_attr($featured_class) . ' ">';
			$return .= '<div class="tcmt-sboxpricetable-column-inner ' . esc_attr($currency_class) . '">';	
			
			if( !empty($featured_col) && $col==$featured_col && !empty($feature_column_title) ){
				$return .= '<div class="tcmt-sboxfeatured-title">' . rawurldecode(base64_decode(trim($feature_column_title))) . '</div>';
			}
			
					$cmt_global_ptbox_element_values = array();
					// storing in global varibales to be used in template file
					$cmt_global_ptbox_element_values['boxstyle']			= $boxstyle;
					$cmt_global_ptbox_element_values['icon_html']		= $icon_html;
					$cmt_global_ptbox_element_values['lines_html']		= $lines_html;
					$cmt_global_ptbox_element_values['heading']			= $column_data['col' . $col . '_heading'];
					$cmt_global_ptbox_element_values['description']			= $column_data['col' . $col . '_description'];
					$cmt_global_ptbox_element_values['price']			= $column_data['col' . $col . '_price'];
					$cmt_global_ptbox_element_values['cur_symbol']		=  $column_data['col' . $col . '_cur_symbol'];
					$cmt_global_ptbox_element_values['cur_symbol_before']	=  '';
					$cmt_global_ptbox_element_values['cur_symbol_after']		=  '';
					if( isset($column_data['col' . $col . '_cur_symbol_position']) && $column_data['col' . $col . '_cur_symbol_position']=='before' ){
						$cmt_global_ptbox_element_values['cur_symbol_before']	=  '<div class="cmt-ptablebox-cur-symbol-before">'.$column_data['col' . $col . '_cur_symbol'].'</div>';
					} else {
						$cmt_global_ptbox_element_values['cur_symbol_after']		=  '<div class="cmt-ptablebox-cur-symbol-after">'.$column_data['col' . $col . '_cur_symbol'].'</div>';
					}
					$cmt_global_ptbox_element_values['price_frequency']	= $column_data['col' . $col . '_price_frequency'];
					$cmt_global_ptbox_element_values['btn_title']		= $column_data['col' . $col . '_btn_title'];
					$cmt_global_ptbox_element_values['btn_link']			= $column_data['col' . $col . '_btn_link'];
					$cmt_global_ptbox_element_values['main-class']		= ''; // Extra field
					
					
					
					ob_start();
					
	
					get_template_part('template-parts/pricetable/pricetable', $boxstyle);
					$return .= ob_get_contents();
					ob_end_clean();
					
					
				$return .= '</div>';
			$return .= '</div>';
			
			$col++;
		}
		
		$return .= '</div>';
		
	} else {
		$return .= '<!-- Visual Composer plugin not installed. Please install it to make this shortcode work. -->';
	}
	
	return $return;
	
}
}
add_shortcode( 'cmt-sboxpricing-table', 'cymolthemes_sc_pricing_table' );