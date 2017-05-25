<?php
//* Single minor page template
/** Remove Genesis loop and sidebar */

//* Force full-width-content layout
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
//* Remove the entry meta in the entry header (requires HTML5 theme support)
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
// Show Flexible Content field in the content area
add_action( 'genesis_after_content', 'mbu_display_scholarship' );

// Function displaying Flexible Content Field
function mbu_display_scholarship() {

	// show application form only when box is checked
	if( get_field('accepting_applications') )
	{
		echo '<h3>Apply for Scholarship</h3>';
		$form_object = get_field('scholarship_application');
		echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');
	}

}
genesis();
