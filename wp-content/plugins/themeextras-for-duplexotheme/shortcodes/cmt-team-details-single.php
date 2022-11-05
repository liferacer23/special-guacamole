<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

// [cmt-team-details-single]
// cmt-team-details-single
if( !function_exists('cymolthemes_sc_team_details_single') ){
function cymolthemes_sc_team_details_single( $atts, $content=NULL ){
	
	// Contact heading
	$contact_text = esc_attr__('Contact', 'duplexo');
	$contact_text_to = cymolthemes_get_option('team_member_single_contact_text');
	if( $contact_text_to ){
		$contact_text = $contact_text_to;
	}
	
	
	$return = '';
	
	$return .= '
	
		<div class="row">

			<div class="cymolthemes-team-member-single-featured-area col-xs-12 col-sm-6 col-md-46 col-lg-6">
			
				<div class="cymolthemes-team-img">
					' . cymolthemes_get_featured_media() . '
					' . cymolthemes_box_team_social_links() . '
				</div>
			

			

				
			</div><!-- .cymolthemes-team-member-single-featured-area -->
			
			
			
			<div class="cymolthemes-team-member-single-content-area col-xs-12 col-sm-6 col-md-6 col-lg-6">
				
				<div class="cmt-team-member-single-list row">
					<div class="cmt-team-member-single-title-wrapper col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h2 class="cmt-team-member-single-title">'. get_the_title() . '</h2>
						' . cymolthemes_team_member_single_meta( 'position' ) . '						

						' . cymolthemes_team_member_extra_details() . '

						<h2 class="cmt-team-member-single-title">'. esc_attr( $contact_text ) .'</h2>
						' . cymolthemes_team_member_meta_details() . '
						
					</div>			
				</div><!-- .cmt-team-member-single-list.row -->
				
			</div><!-- .cymolthemes-team-member-single-content-area -->
			
		</div>';
		
	
	return $return;
	
}
}
add_shortcode( 'cmt-team-details-single', 'cymolthemes_sc_team_details_single' );