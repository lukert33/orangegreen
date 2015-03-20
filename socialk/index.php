<?php /* Template Name: Archives */ ?>
<?php get_header(); ?>
<?php get_template_part('theme-component', 'nav'); ?>
<?php if (have_posts()) : ?>

<?php
	$author_id = get_the_author_meta( 'ID' );
	$author_nicename = get_the_author_meta( 'user_nicename' );
?>

<section class="hero" style="margin-bottom: 60px; height:350px; background-image: url(<?php echo get_template_directory_uri(); ?>/img/hero.jpg); background-color: #79af3a;">
	<div class="heroContent" style="text-align:left; max-width:860px;">

		<?php if (is_category()) { ?>

			<h1 style="margin-bottom:0"><span>Category:</span> <?php single_cat_title(); ?></h1>

		<?php } elseif (is_tag()) { ?>

			<h1 style="margin-bottom:0"><span>Tag:</span> <?php single_tag_title(); ?></h1>

		<?php } elseif (is_author()) { ?>

			<h1 style="margin-bottom:0"><span>Author:</span> <?php the_author_meta('display_name', $author_id); ?></h1>

		<?php } elseif (is_day()) { ?>

			<h1 style="margin-bottom:0"><span>Daily Archive:</span> <?php the_time('l, F j, Y'); ?></h1>

		<?php } elseif (is_month()) { ?>

			<h1 style="margin-bottom:0"><span>Monthly Archive:</span> <?php the_time('F Y'); ?></h1>

		<?php } elseif (is_year()) { ?>

			<h1 style="margin-bottom:0"><span>Yearly Archive:</span> <?php the_time('Y'); ?></h1>

		<?php } else { ?>

			<h1 class="alignCenter" style="margin-bottom:0">Investment Blog</h1>

		<?php } ?>

	</div>
</section>

<section class="blogContent">	
	<div class="row">

		<aside class="small-3 columns" style="padding:0 60px 0 30px"> 
			<?php get_template_part('theme-component', 'sidebar-blog'); ?>
		</aside>

	    <aside class="small-9 columns" style="padding:0 60px 0 0">  
			<?php while (have_posts()) : the_post(); ?>
		    	<article class="archiveBlock">
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>

					<h6>Posted by <?php the_author_link(); ?> on <?php echo get_the_time('l, F j, Y'); ?></h6>

					<?php if ( has_excerpt() ) { ?>
						<?php the_excerpt(); ?>
					<?php } else { ?>
						<?php $content = wp_filter_nohtml_kses( get_the_content() ); ?>
						<?php $excerpt = substr($content,0,300); ?>
						<p><?php echo $excerpt; ?>...</p>
					<?php } ?>

    				<p><a href="<?php echo the_permalink(); ?>" class="">Read Full Article</a></p>

				</article>
			<?php endwhile; ?>

			<article class="pagination">
				<?php if( get_next_posts_link() ) { ?>
					<div class="button buttonRounded paginationRight alignLeft"><?php next_posts_link( 'Older posts' ); ?> <span>&rsaquo;</span></div>
				<?php } ?>
				<?php if( get_previous_posts_link() ) { ?>
					<div class="button buttonRounded paginationLeft alignRight"><span>&lsaquo;</span> <?php previous_posts_link( 'Newer posts' ); ?> </div>
				<?php } ?>
			</article> 

		</aside>
	
	</div>
</section>

<?php endif; ?>

<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 
