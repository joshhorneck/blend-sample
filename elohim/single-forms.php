<?php

// Remove header, navigation, breadcrumbs, footer widgets, footer
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_header', 'genesis_do_header' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');
remove_action( 'genesis_entry_header', 'genesis_post_info', 12 );
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
remove_action( 'genesis_before', 'genesis_do_subnav' );

add_action('genesis_entry_content', 'mbu_form_page_gform' );

function mbu_form_page_gform() {

   $form_object = get_field('select_form');
   echo do_shortcode('[gravityform id="' . $form_object['id'] . '" title="false" description="false" ajax="true"]');

}
genesis();
