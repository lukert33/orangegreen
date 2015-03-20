<?php /* Template Name: Bucket */ ?>

<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>

<?php
global $toc;
while (have_posts()) : the_post();
	$postid = get_the_ID();
	$postContent = get_the_content();
	$toc = get_field('sidebar_table');
endwhile;
?>

<section class="hero" style="background-image: url(<?php the_field('image'); ?>); background-color: #79af3a;">
	<div class="heroContent" style="text-align:left; max-width:860px;">
		<?php the_field('content'); ?>
		<div class="heroLinks">
			<?php $args = array(
				'post_parent' => $postid,
				'post_type'   => 'page', 
				'posts_per_page' => -1,
				'post_status' => 'any',
				'orderby' => 'name',
				'order' => 'ASC'
			); ?>
			<?php $the_query = new WP_Query( $args ); ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?> 
				<a class="button buttonRounded buttonGhost" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</section>

<section class="page">
	<div class="row">

		<aside class="small-2 columns" style="padding:60px 0 0 30px;">
			<?php get_template_part('theme-component', 'sidebar'); ?>
		</aside>

        <aside class="small-10 columns">
        	<div class="content contentPage"> 
        		
				<?php echo $postContent; ?>

			</div>
		</aside>

	</div>
</section>

<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	//sticky scroll
	var sticky = new Waypoint.Sticky({
	  element: $('.sticky'),
	  handler: function(direction) {
	  	$('.sticky').width( $('.sticky-wrapper').outerWidth() );
	  },
	  offset: 30
	});

	var waypoint = new Waypoint({
		element: $('.footer'),
		handler: function(direction){
			$('.sticky').toggleClass('stickyBottom');
		},
		offset: function() {
			return $('.sticky-wrapper').outerHeight()
		}
	});

	$('.contentPage h3').each(function(index, element){
		var text = $(element).text();
		var id = text.toLowerCase().replace(/ /g,'-').replace(/[^\w-]+/g,'');
		$(element).attr('id',  id);
		$('.sidebarScrollto article').append("<a href='#"+id+"'>" + text + "</a>");
	});

	//Nav scroll to href #id
	$('.sidebarScrollto a').on("click", function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				$('html,body').animate({
					easing:'swing',
					scrollTop: target.offset().top-100
				}, 1000);
				return false;
			}
		}
	});

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 