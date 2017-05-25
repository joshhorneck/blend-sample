<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Elohim' );
define( 'CHILD_THEME_URL', 'http://horneck.me' );
define( 'CHILD_THEME_VERSION', '2.3' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'mbu_scripts' );
function mbu_scripts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700|Source+Serif+Pro:400', array(), CHILD_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Remove SearchWP index of media
add_filter( 'searchwp_index_attachments', '__return_false' );

//* Unregister sidebar/content layout setting
genesis_unregister_layout( 'sidebar-content' );
//* Unregister content/sidebar/sidebar layout setting
genesis_unregister_layout( 'content-sidebar-sidebar' );
//* Unregister sidebar/sidebar/content layout setting
genesis_unregister_layout( 'sidebar-sidebar-content' );
//* Unregister sidebar/content/sidebar layout setting
genesis_unregister_layout( 'sidebar-content-sidebar' );

//* unregister genesis widgets
add_action( 'widgets_init', 'unregister_genesis_widgets', 20 );
function unregister_genesis_widgets() {
	unregister_widget( 'Genesis_eNews_Updates' );
	unregister_widget( 'Genesis_Latest_Tweets_Widget' );
	unregister_widget( 'Genesis_Menu_Pages_Widget' );
	unregister_widget( 'Genesis_User_Profile_Widget' );
	unregister_widget( 'Genesis_Widget_Menu_Categories' );
}

// add option to hide gravity form labels
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

// remove frontend post edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );

//* reposition secondary nav
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_before', 'genesis_do_subnav', 10);

//* reposition primary nav
remove_action( 'genesis_after_header', 'genesis_do_nav' );
add_action( 'genesis_header_right', 'genesis_do_nav', 11 );

//* remove default footer
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

//* add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* custom footer
add_action( 'genesis_footer', 'mbu_custom_footer' );
function mbu_custom_footer() { ?>

	<div class="site-footer">
		<div class="wrap">
			<div class="one-third first footer-left">
				<a href="https://mbu.edu"><img src="https://mbu.edu/wp-content/themes/elohim/images/footer-logo.png"></a>
			</div>
			<div class="one-third footer-mid">
				<p>&copy;1968-<?php echo date("Y") ?> Maranatha Baptist University</p>
				<p><a href="/privacy-policy">Privacy</a> &middot;	<a href="/terms-and-conditions">Terms</a> &middot; <a href="/wp-admin">Login</a> &middot; <a href="/thankyou">Thank You</a> &middot; <a href="/contact">Contact</a>
			</div>
			<div class="one-third footer-right">
				<address>745 West Main St. |	Watertown, WI 53094</address></p>
				<p>Switchboard: <a href="tel:1-920-261-9300">920-261-9300</a><br />Admissions: <a href="tel:1-800-622-2947">800-622-2947</a>
			</div>
		</div>
	</div>

<?php
}

//* Remove Genesis in-post SEO Settings
remove_action( 'admin_menu', 'genesis_add_inpost_seo_box' );
function mbu_remove_metabox() {
    if ( ! current_user_can( 'publish_pages' ) )
        remove_meta_box( 'wpseo_meta', 'page', 'normal' );
}
add_action( 'add_meta_boxes', 'mbu_remove_metabox', 11 );

/* Display Featured Image on top of the selected posts */
add_action( 'genesis_entry_header', 'featured_post_image', 8 );
function featured_post_image()  {
  if ( ! is_singular( 'post' ) )  return;
		if( get_field('show_image_single') ):
			the_post_thumbnail('post-image');
		endif;
}

// Make majors, schools, associate degrees and corse lists full-width
function mbu_cpt_layout() {
	if( 'major' == get_post_type() ) {
	return 'full-width-content';
	}
	if( 'school' == get_post_type() ) {
	return 'full-width-content';
	}
	if( 'associate' == get_post_type() ) {
	return 'full-width-content';
	}
	if( 'course_list' == get_post_type() ) {
	return 'full-width-content';
	}
}
add_filter( 'genesis_site_layout', 'mbu_cpt_layout' );

// Nav extras
add_filter( 'wp_nav_menu_items', 'theme_menu_extras', 10, 2 );
function theme_menu_extras( $menu, $args ) {
	if ( 'secondary' !== $args->theme_location )
		return $menu;

	ob_start();
	get_search_form();
	$search = ob_get_clean();
	$menu  .= '<li class="right search">' . $search . '</li>';

	return $menu;
}

/* DEPRECATED as of v2.3

//* Send uploaded files on Task List Form as attachments in Gravity Form notifications
add_filter( 'gform_notification', 'mbu_notification_attachments', 10, 3 );
function mbu_notification_attachments( $notification, $form, $entry ) {
    $log = 'mbu_notification_attachments() - ';
    GFCommon::log_debug( $log . 'starting.' );

    if ( $notification['name'] == 'Asana Task List' ) {

        $fileupload_fields = GFCommon::get_fields_by_type( $form, array( 'fileupload' ) );

        if ( ! is_array( $fileupload_fields ) ) {
            return $notification;
        }

        $attachments = array();
        $upload_root = RGFormsModel::get_upload_root();

        foreach( $fileupload_fields as $field ) {

            $url = $entry[ $field['id'] ];

            if ( empty( $url ) ) {
                continue;
            } elseif ( $field['multipleFiles'] ) {
                $uploaded_files = json_decode( stripslashes( $url ), true );
                foreach ( $uploaded_files as $uploaded_file ) {
                    $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $uploaded_file );
                    GFCommon::log_debug( $log . 'attaching the file: ' . print_r( $attachment, true  ) );
                    $attachments[] = $attachment;
                }
            } else {
                $attachment = preg_replace( '|^(.*?)/gravity_forms/|', $upload_root, $url );
                GFCommon::log_debug( $log . 'attaching the file: ' . print_r( $attachment, true  ) );
                $attachments[] = $attachment;
            }
        }
        $notification['attachments'] = $attachments;
    }

    GFCommon::log_debug( $log . 'stopping.' );
    return $notification;
}
*/

// Add Unique ID to Communications Tasks
add_filter("gform_field_value_uuid", "get_unique");
function get_unique(){

    $prefix = "CTR" . date('y') . "-"; // update the prefix here

    do {
		$form_count = RGFormsModel::get_form_counts(13); //Form ID
        $unique = $form_count['total'] + 1; // count of the lead form entries incremented by one
		$unique = str_pad($unique, 3, '0', STR_PAD_LEFT); // padding for number format 001,002...015 so 3 digit number format
        $unique = $prefix . $unique; // prefix and the unique number
    } while (!check_unique($unique, 13, 10)); // Form ID, Field ID

    return $unique;
}

function check_unique($unique, $form_id, $field_id) {
    global $wpdb;

    $table = $wpdb->prefix . 'rg_lead_detail';
    $form_id = 13; // update to the form ID your unique id field belongs to
    $field_id = 10; // update to the field ID your unique id is being prepopulated in
    $result = $wpdb->get_var("SELECT value FROM $table WHERE form_id = '$form_id' AND field_number = '$field_id' AND value = '$unique'");

    if(empty($result))
        return true;

    return false;
}
