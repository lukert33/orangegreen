<div class="">

	<?php if ( is_active_sidebar( 'blog' ) ) : ?>

		<?php dynamic_sidebar( 'blog' ); ?>

	<?php endif; ?>

</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#searchsubmit').val(' ');

	$('.fadein img:gt(0)').hide();

	setInterval(function(){
		$('.fadein :first-child').fadeOut().next('img').fadeIn().end().appendTo('.fadein');
	}, 3000);
});
</script>