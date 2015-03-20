<?php get_header();?>
<?php 
global $toc;
$toc = get_field('sidebar_table');

if ( get_field('sidebar') == "On"):
	$column = "small-10";
else:
	$column = "small-10 small-centered";
endif;
?>
<?php get_template_part('theme-component', 'nav'); ?>

<section class="page">
	<div class="row">

		<?php if ( get_field('sidebar') == "On"): ?>
			<aside class="small-2 columns" style="padding:60px 0 0 30px;">
				<?php get_template_part('theme-component', 'sidebar'); ?>
			</aside>
		<?php endif; ?>

        <aside class="<?php echo $column; ?> columns">
        	<div class="content contentPage">  
				<?php get_template_part('theme-component', 'layout'); ?>
				<?php get_template_part('theme-component', 'cta'); ?>
			</div>
		</aside>

	</div>
</section>

<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script src="//cdnjs.cloudflare.com/ajax/libs/fitvids/1.1.0/jquery.fitvids.min.js"></script>

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