<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
/**
 *
 * Field: CymolThemes IconPicker
 *
 * @since 1.0.0
 * @version 1.0.0
 *
 */
class CSFramework_Option_cymolthemes_iconpicker extends CSFramework_Options {

  public function __construct( $field, $value = '', $unique = '' ) {
    parent::__construct( $field, $value, $unique );
  }

  public function output(){
	
	
	
    echo wp_kses( $this->element_before(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

	// current value
    $value                     = $this->element_value();
	$value_library             = ( isset( $value['library'] ) ) ? $value['library'] : 'fontawesome';
	$value_library_fontawesome = ( isset( $value['library_fontawesome'] ) ) ? $value['library_fontawesome'] : 'fa fa-ok';

	
	// current value for icon picker only (without common class)
	$i_value_library_fontawesome = explode( ' ', $value_library_fontawesome );
	$i_value_library_fontawesome = ( !empty($i_value_library_fontawesome[1]) ) ? $i_value_library_fontawesome[1] : '' ;

	
	// Icon picker values
	// Temporary new list of icon libraries
	$icon_library_array = array( // all icon library list array
		'themify'        => array( esc_attr__( 'Themify icons', 'duplexo' ), 'ti-location-pin'),
		'linecons'       => array( esc_attr__( 'Linecons', 'duplexo' ), 'li_star'),
		'cmt_duplexo'     => array( esc_attr__( 'Duplexo Icons', 'duplexo' ), 'flaticon-fruits'),
	);


	$icon_library = array();
	if( is_array(cymolthemes_get_option('icon_library')) && count(cymolthemes_get_option('icon_library'))>0 ){
		// if selected icon library
		foreach( cymolthemes_get_option('icon_library') as $i_library ){
			$icon_library[$i_library] = $icon_library_array[$i_library];
		}
	}
	
	$icon_picker_html    = '';
	$icon_dropdown_array = array( esc_attr__( 'Font Awesome', 'duplexo' )    => 'fontawesome' );

	if( is_array($icon_library) && count($icon_library)>0 ){
	foreach( $icon_library as $library_id=>$library ){
		
		// show or hide the icon picker
		$display_this = ($value_library==$library_id) ? 'cmt-sboxshow' : 'cmt-hide' ;
		
		$icon_dropdown_array[$library[0]] = $library_id;
		
		// current value
		$curr_value = ( isset( $value['library_'.$library_id] ) ) ? $value['library_'.$library_id] : $library[1];
		
		// Icon active in picker
		$i_value = explode( ' ', $curr_value );
		if( !empty($i_value[1]) ){
			$i_value = $i_value[1];
		} else {
			$i_value = 'fa';
		}
		
		
		
		$icon_picker_html .= '<div class="cymolthemes-iconpicker-wrapper cmt-sboxiconpicker-' . esc_attr($library_id) . ' ' . esc_attr( $display_this ) . '">
				<input type="hidden" name="'. esc_attr($this->element_name( '[library_'.$library_id.']' )) .'" value="'. esc_attr($curr_value) .'"'. $this->element_class('cymolthemes-iconpicker-input i_icon_'.esc_attr($library_id).' cymolthemes_iconpicker_field') .'/>
				<div class="cmt-sboxipicker-selector-w">
					<div class="cmt-sboxipicker-selector">
						<span class="cmt-sboxipicker-selected-icon">
							<i class="' . esc_attr($curr_value) . '"></i>
						</span>
						<span class="cmt-sboxipicker-selector-button">
							<i class="fip-fa fa fa-arrow-down"></i>
						</span>
					</div>
					<div class="cymolthemes-iconpicker-list-w cmt-hide">
						<div id="cmt-sboxipicker-library-' . esc_attr($library_id) . '" class="cymolthemes-iconpicker-list" data-iconset="' . esc_attr($library_id) . '" data-icon="' . esc_attr($i_value) . '" role="iconpicker"></div>
					</div>
				</div><!-- .cmt-sboxipicker-selector-w -->
			</div>';
		
		
	}
	}
	
	
	echo '<div class="cymolthemes-iconpicker-element">';
		
		/* Library selector dropdown */
		echo '<div class="cmt-sboxiconpicker-left">';
		echo '<select name="'. esc_attr($this->element_name( '[library]' )) .'" class="cmt-sboxiconpicker-library-selector" '. $this->element_class() . $this->element_attributes() .'>';
				
				if( is_array($icon_dropdown_array) && count($icon_dropdown_array)>0 ){
					foreach( $icon_dropdown_array as $key=>$val ){
						$selected = ($value_library==$val) ? ' selected="selected"' : '' ;
						echo '<option value="' . esc_attr($val) . '"' . $selected . '>' . esc_attr($key) . '</option>';
					}
				}
				
			echo '</select>';
		echo '</div>';
	
	
		echo '<div class="cmt-sboxiconpicker-right">';
		
		$display_fontawesome = ($value_library=='fontawesome') ? 'cmt-sboxshow' : 'cmt-hide' ;
		
		/* Font Awesome icon picker */
		echo '<div class="cymolthemes-iconpicker-wrapper cmt-sboxiconpicker-fontawesome ' . esc_attr($display_fontawesome) . '">
				<input type="hidden" name="'. esc_attr($this->element_name( '[library_fontawesome]' )) .'" value="'. esc_attr($value_library_fontawesome) .'"'. $this->element_class('cymolthemes-iconpicker-input i_icon_linecons cymolthemes_iconpicker_field') . '/>
				<div class="cmt-sboxipicker-selector-w">
					<div class="cmt-sboxipicker-selector">
						<span class="cmt-sboxipicker-selected-icon">
							<i class="' . esc_attr($value_library_fontawesome) . '"></i>
						</span>
						<span class="cmt-sboxipicker-selector-button">
							<i class="fip-fa fa fa-arrow-down"></i>
						</span>
					</div>
					<div class="cymolthemes-iconpicker-list-w cmt-hide">
						<div id="cmt-sboxipicker-library-fontawesome" class="cymolthemes-iconpicker-list" data-iconset="fontawesome" data-icon="' . esc_attr($i_value_library_fontawesome) . '" role="iconpicker"></div>
					</div>
				</div><!-- .cmt-sboxipicker-selector-w -->
			</div>';
			
		/* Other library icon picker */
		echo cymolthemes_wp_kses( $icon_picker_html );
			
		
		echo '</div><!-- .cmt-sboxiconpicker-right -->';
		
		
	
	echo '<div class="clear clr"></div> </div><!-- .cymolthemes-iconpicker-element -->';
	
	
	
	
	
	
	
	
    echo wp_kses( $this->element_after(),
		array(
			'div' => array(
				'class' => array(),
				'id'    => array(),
			),
			'a' => array(
				'href'  => array(),
				'title' => array(),
				'class' => array()
			),
			'br'     => array(),
			'em'     => array(),
			'strong' => array(),
			'span'   => array(
				'class'  => array(),
			),
			'ol'     => array(),
			'ul'     => array(
				'class'  => array(),
			),
			'li'     => array(
				'class'  => array(),
			),
		)
	);

  }

}