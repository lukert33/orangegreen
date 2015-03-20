<?php /* Template Name: Value */ ?>
<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<section class="page">
	<div class="row">

		<aside class="small-8 columns">
        	<div class="content contentPage">  
				<?php the_content(); ?>
			</div>
		</aside>

		<aside class="small-4 columns">
			<div class="content contentPage alignCenter">  
				<h2><strong>Member of:</strong></h2>
				<?php if( have_rows('groups') ): ?>
					<ul class="small-block-grid-1" style="margin:0; padding: 0 75px;">
						<?php while ( have_rows('groups') ) : the_row(); ?>
							<li>
								<a href="<?php the_sub_field('link'); ?>">
									<img src="<?php the_sub_field('image'); ?>">
								</a>
							</li>
						<?php endwhile; ?>
					</ul>
				<?php endif;?>
			</div>
		</aside>

	</div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('.contentPage').css({"padding" : "60px 30px 30px"})

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 