<?php
/*
	Template Name: Google Custom Search
	Description: Google Custom Search
 	Created by John Levandowski
 	Modified by: Rowell Dionicio and Sridhar Katakam
	Site: https://rowell.dionicio.net/adding-google-custom-search-to-genesis-framework/, https://sridharkatakam.com/add-google-custom-search-genesis/
*/

# Force full width content
// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

# Remove the breadcrumb
// remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

# Remove the post content
remove_action( 'genesis_entry_content', 'genesis_do_post_content' );

# Add custom post content
add_action( 'genesis_entry_content', 'custom_do_post_content' );

/**
 * Outputs custom post content
 *
 * @return void
 */
function custom_do_post_content() {
	get_search_form(); ?>

	<script>
	  (function() {
	    var cx = '003248345401715132113:mqqlantcm4g';
	    var gcse = document.createElement('script');
	    gcse.type = 'text/javascript';
	    gcse.async = true;
	    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
	    var s = document.getElementsByTagName('script')[0];
	    s.parentNode.insertBefore(gcse, s);
	  })();
	</script>
	<gcse:searchresults-only></gcse:searchresults-only>

<?php }

genesis();
