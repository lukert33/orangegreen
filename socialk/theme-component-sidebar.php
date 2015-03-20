<?php global $toc; ?>

<?php if (get_field('sidebar_menu') == "On"): ?>
	<div class="sidebar">

		<?php $args =array(
			'theme_location'  => '',
			'menu'            => 'Bucket',
			'container'       => 'div',
			'container_class' => 'sidebarMenu',
			'container_id'    => 'sidebarMenu',
			'menu_class'      => 'sidebarMenuContent',
			'menu_id'         => 'sidebarMenuContent',
			'echo'            => true,
			'fallback_cb'     => 'wp_page_menu',
			'before'          => '',
			'after'           => '',
			'link_before'     => '',
			'link_after'      => '',
			'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
			'depth'           => 0,
		); ?>

		<?php wp_nav_menu($args);?>

	</div>
<?php endif; ?>


<?php if ($toc == "On"): ?>
	<section class="sticky">
		<div class="sidebar sidebarScrollto">

			<h5>Table of Contents:</h5>
			<article></article>

		</div>
	</section>
<?php endif; ?>