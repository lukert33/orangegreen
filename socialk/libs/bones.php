<?php
/*
This is the core file where most of the
main functions & features reside. If you have
any custom functions, it's best to put them
in the functions.php file.
*/

/*********************
LAUNCH BONES
Let's fire off all the functions
and tools. I put it up here so it's
right up top and clean.
*********************/

// we're firing all out initial functions at the start

// launching operation cleanup
add_action( 'init', 'bones_head_cleanup' );

// remove WP version from RSS
add_filter( 'the_generator', 'bones_rss_version' );

// launching this stuff after theme setup
bones_theme_support();

/*********************
WP_HEAD GOODNESS
The default wordpress head is
a mess. Let's clean it up by
removing all the junk we don't
need.
*********************/

function bones_head_cleanup() {
    // category feeds
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    remove_action( 'wp_head', 'feed_links', 2 );
    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'bones_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'bones_remove_wp_ver_css_js', 9999 );

} /* end bones head cleanup */

// remove WP version from RSS
function bones_rss_version() { return ''; }

// remove WP version from scripts
function bones_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bones_theme_support() {

    // wp thumbnails (sizes handled in functions.php)
    add_theme_support( 'post-thumbnails' );

    // default thumb size
    set_post_thumbnail_size(150, 150, true);

    // wp menus
    add_theme_support( 'menus' );

} /* end bones theme support */

?>