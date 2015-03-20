<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<?php //Dynamic Title Tag
	if (function_exists('is_tag') && is_tag()) {
		$title = 'Tag Archive for &quot;' . $tag . '&quot; - ';
	} elseif (is_archive()) {
		$title = wp_title('', false) . ' Archive - ';
	} elseif (is_search()) {
		$title = 'Search for &quot;' . wp_specialchars($s) . '&quot; - ';
	} elseif (!(is_404()) && (is_single()) || (is_page())) {
		$title = wp_title('', false) . ' - ';
	} elseif (is_404()) {
		$title = 'Not Found - ';
	}

	if (is_front_page()) {
		$title = get_bloginfo('name') . ' - ' . get_bloginfo('description');
	} else {
		$title .= get_bloginfo('name');
	}
	?>

	<?php //Dynamic Description 
	if(get_field( "metaDescription" )){
		$metaDescription = get_field( "metaDescription" );
	} else {
		$metaDescription = get_bloginfo('description'); 
	}
	?>

	<title><?php echo $title ?></title>

	<meta name="description" content="<?php echo $metaDescription ?>" />

	<meta name="viewport" content="width=1200, maximum-scale=1">

	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/_favicon/favicon-192x192.png" sizes="192x192">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/_favicon/favicon-160x160.png" sizes="160x160">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/_favicon/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/_favicon/favicon-16x16.png" sizes="16x16">
	<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/img/_favicon/favicon-32x32.png" sizes="32x32">

	<!-- for Facebook -->
	<meta property="og:type" content="website" />
	<meta property="og:title" content="<?php echo $title ?>" />
	<meta property="og:url" content="<?php echo get_permalink(); ?>" />
	<meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/facebook.png" />
	<meta property="og:image:width" content="200" />
	<meta property="og:image:height" content="200" />
	<meta property="og:description" content="<?php echo $metaDescription ?>" />

	<!--Stylesheets-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?version=3.9"> 

	<?php global $slider; ?>
	<?php if( $slider == 'on' ){ ?> 
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slider.css" type="text/css">
	<?php } ?> 

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/lightbox.css" type="text/css">

	<!-- wordpress head functions -->
	<?php wp_head(); ?>
	<!-- end of wordpress head -->

	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr.js"></script>

	<?php get_template_part('theme-component', 'analytics'); ?>	

</head>

<body>