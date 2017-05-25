<?php
/*
   Plugin Name: MBU Custom
   Plugin URI: http://horneck.me
   Author: Josh Horneck
   Description: CPT and Taxonomy generator. Core build GPL via WebDev Studios.
   Text Domain: mbu-custom
   License: GPLv3
  */

//Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
  exit;
}

// Load CPT Helper
require_once( plugin_dir_path( __FILE__ ) . '/includes/core-classes/CPT_Core/CPT_Core.php' );
// Load Taxonomy Helper
require_once( plugin_dir_path( __FILE__ ) . '/includes/core-classes/Taxonomy_Core/Taxonomy_Core.php' );
// Load Tax
require_once ( plugin_dir_path(__FILE__) . '/includes/custom-tax.php');
// Load CPT
require_once ( plugin_dir_path(__FILE__) . '/includes/custom-posts.php');
