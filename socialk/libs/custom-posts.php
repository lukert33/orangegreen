<?php

// Register Custom Post Type
function clinic() {

    $labels = array(
      'name' => 'Clinics',
      'singular_name' => 'Clinic',
      'add_new' => 'Add New Clinic',
      'add_new_item' => 'Add New Clinic',
      'edit_item' => 'Edit Clinic',
      'new_item' => 'Add New Clinic',
      'view_item' => 'View Clinic',
      'search_items' => 'Search Clinics',
      'not_found' => 'No Clinics found',
      'not_found_in_trash' => 'No clinics found in trash'
    );

    $args = array(
      'labels' => $labels,   
      'public' => true,
      'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'revisions' ),
      'capability_type' => 'post',
      'rewrite' => array(
          'slug'=>'artist',
          'with_front'=> false,
          'feed'=> false,
          'pages'=> false
      ),
      'menu_position' => 5,
      'has_archive' => true,
      'hierarchical' => false,
      'taxonomies' => array('post_tag')
    );

    register_post_type('clinic', $args);

}

// Hook into the 'init' action
add_action( 'init', 'clinic');

?>
