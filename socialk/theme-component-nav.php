<?php $args =array(
	'theme_location'  => '',
	'menu'            => 'main',
	'container'       => 'div',
	'container_class' => 'headMenu',
	'container_id'    => '',
	'menu_class'      => '',
	'menu_id'         => '',
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
); ?>

<div class="stickyNav" style="width:370px;">
	<nav class="stickyNavContents">
		<a href="<?php bloginfo('url');?>/login" class="button buttonRounded buttonGreen">Sign in to your plan</a>
		<a href="<?php bloginfo('url');?>/proposal" class="button buttonRounded buttonOrange">Open an account</a>
	</nav>
</div>

<nav class="nav">
	<a href="<?php bloginfo('url');?>" id="logo" class="logo"></a>
	<?php wp_nav_menu($args);?>
</nav> 

<div class="SkypeButtonContainer">
	<a id="SkypeButton" onclick="window.location='skype:rsnlll?chat';return false;" href="">Live Chat</a>
</div>
