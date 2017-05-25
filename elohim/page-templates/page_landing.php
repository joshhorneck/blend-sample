<?php
/*
Template Name: Landing
*/
// Add custom body class to the head
add_filter( 'body_class', 'add_body_class' );
function add_body_class( $classes ) {
   $classes[] = 'landing-page';
   return $classes;
}
// Remove header, navigation, breadcrumbs, footer widgets, footer
add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs');
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
genesis();