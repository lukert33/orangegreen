<?php
/*
This file handles the admin area and functions.
You can use this file to make changes to the
dashboard.
*/

/************* DASHBOARD WIDGETS *****************/

// disable default dashboard widgets
function disable_default_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'core');
	remove_meta_box('dashboard_incoming_links', 'dashboard', 'core');
	remove_meta_box('dashboard_plugins', 'dashboard', 'core');
	remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
	remove_meta_box('dashboard_recent_drafts', 'dashboard', 'core');
	remove_meta_box('dashboard_primary', 'dashboard', 'core');
	remove_meta_box('dashboard_secondary', 'dashboard', 'core');
    remove_meta_box('dashboard_activity', 'dashboard', 'core');

	// removing plugin dashboard boxes
	remove_meta_box( 'yoast_db_widget', 'dashboard', 'normal' );         // Yoast's SEO Plugin Widget
}

// add a custom dashboard widget
function admin_dashboard_custom($dashboard) {
	if( 'index.php' != $dashboard )
        return;
    wp_enqueue_script( 'admin_dashboard_custom', get_template_directory_uri() . '/js/wp-admin.js' );
}

add_action('admin_menu', 'disable_default_dashboard_widgets');
add_action( 'admin_enqueue_scripts', 'admin_dashboard_custom' );

/************* CUSTOM LOGIN PAGE *****************/

// calling your own login css so you can style it
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/css/wp-login.css', false );
}

// changing the logo link from wordpress.org to your site
function bones_login_url() {  return home_url(); }

// changing the alt text on the logo to show your site name
function bones_login_title() { return get_option('blogname'); }

// calling it only on the login page
add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter('login_headerurl', 'bones_login_url');
add_filter('login_headertitle', 'bones_login_title');


/************* CUSTOM ADMIN AREA ********************/

function admin_css() {
    wp_enqueue_style('admin_css', get_template_directory_uri() . '/css/wp-admin.css', false);
}

add_action('admin_enqueue_scripts', 'admin_css');


/************* CUSTOM MCE ********************/

function mcekit_editor_style($url) {

    if ( !empty($url) )  
        $url .= ',';  
  
    $url .= trailingslashit( get_bloginfo('template_url') ) . '/css/wp-wysiwyg.css';  
    
    return $url;
}

add_filter( 'mce_css', 'mcekit_editor_style');

/************* CUSTOMIZE ADMIN *******************/

// Custom Backend Footer
function bones_custom_admin_footer() {
	_e('<span id="footer-thankyou">Developed by <a href="http://benrosati.com" target="_blank">Benjamin Rosati</a></span>.', 'bonestheme');
}

// Custom Backend Header
function remove_admin_bar_menu() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu( 'wp-logo' );
    $wp_admin_bar->remove_node( 'edit-profile' );
    $wp_admin_bar->remove_node( 'appearance' );
    $wp_admin_bar->remove_node( 'dashboard' );
    $wp_admin_bar->remove_node( 'updates' );
    $wp_admin_bar->remove_node( 'comments' );
    $wp_admin_bar->remove_node( 'new-content' );
    $wp_admin_bar->remove_node( 'view-site' );
    $wp_admin_bar->remove_node( 'search' );
    $wp_admin_bar->remove_node( 'new_draft' );
    $wp_admin_bar->remove_node( 'frm-forms' );
}

// Add log out to top bar
function modify_admin_bar() {
    global $wp_admin_bar;

    $my_account=$wp_admin_bar->get_node('my-account');

    $newtitle = str_replace( 'Howdy,', '', $my_account->title );

    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ));
}

// Hide the WP help tab
function hide_help() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}

add_filter('admin_footer_text', 'bones_custom_admin_footer');

add_action('wp_before_admin_bar_render', 'remove_admin_bar_menu');

add_filter('admin_bar_menu', 'modify_admin_bar');

add_action('admin_head', 'hide_help');

/************* HIDE ADMIN ********************/

function hide_admin_bar() {
    show_admin_bar(false);
}




/************* HIDE UPDATES ********************/

function hide_update_notice() {
    remove_action( 'admin_notices', 'update_nag');
}

add_action( 'admin_head', 'hide_update_notice');

?>