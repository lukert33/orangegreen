<?php

require_once('libs/bones.php'); 

require_once('libs/admin.php');

//require_once('libs/custom-posts.php');

if(function_exists("acf_add_options_page")) {

	acf_add_options_page(array(
		'page_title' 	=> 'Global Content',
		'menu_title'	=> 'Global Content',
		'menu_slug' 	=> 'theme-global-menu',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_page(array(
		'page_title' 	=> 'Login Content',
		'menu_title'	=> 'Login Content',
		'menu_slug' 	=> 'login_data',
		'capability'	=> 'edit_logins',
		'redirect'		=> false
	));

}

/************* LOGIN SEARCH ********************/

function login_search() {

	$post_email = $_POST['user_email'];
	$emails = array();
	$output = "";

	if( have_rows('redirects', 'option') ):
		while ( have_rows('redirects', 'option') ) : the_row();

			$link = get_sub_field('link');
			$keys[$link][] = get_sub_field('emails');

			array_push($emails, $fill);

		endwhile;
	endif;

	$output = json_encode($keys);
	echo $output;

	wp_die();

}

add_action( 'wp_ajax_login_search', 'login_search' );
add_action( 'wp_ajax_nopriv_login_search', 'login_search' );

/************* BLOG WIDGETS ********************/

function blog_widgets() {

	register_sidebar( array(
		'name' => 'blog',
		'id' => 'blog',
		'before_widget' => '<div class="sidebar"><div class="sidebarMenu">',
		'after_widget' => '</div></div>',
		'before_title' => '<span>',
		'after_title' => '</span>',
	) );
}

add_action( 'widgets_init', 'blog_widgets' );

/************* CUSTOM WIDGET ********************/

class acf_widget extends WP_Widget
{
	function acf_widget() 
	{
		parent::WP_Widget(false, "ACF Widget");
	}
 
	function update($new_instance, $old_instance) 
	{  
		return $new_instance;  
	}  
 
	function form($instance)
	{  
		$title = esc_attr($instance["title"]);  
		echo "<br />";
	}
 
	function widget($args, $instance) 
	{
		$widget_id = "widget_" . $args["widget_id"];
 
		$output = '
		<div class="sidebar">
		<div class="sidebarMenu">
		<span>Affiliates</span>
		<div class="fadein">';

		while ( have_rows('logos', 'widget_acf_widget-2') ) : the_row();
			$output .= '<img src="'. get_sub_field('image') .'">';
		endwhile;

		$output .= '</div></div></div>';

		echo $output;
	}
}
register_widget("acf_widget");



/************* FILTERS ********************/

?>