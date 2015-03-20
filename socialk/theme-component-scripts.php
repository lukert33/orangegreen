<?php wp_footer(); ?>

<!--- Let's go ahead and get this party started -->
<script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/libs/fancybox.js"></script>

<!--- Fashionable late as always is Greensock -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.13.2/TweenMax.min.js"></script>

<!-- Scripts that have on off depending on template -->

<?php global $slider; ?>
<?php if($slider == "on") { ?>
	<script src="<?php echo get_template_directory_uri(); ?>/js/libs/royalslider.js"></script>
<?php } ?>

<script>
jQuery(document).ready(function($) {

	TweenMax.to('body', 1, {opacity: 1 });

	//Add Caret to 1st level menu
	$('.headMenu').children('ul').children('li').children('ul').parent('li').children('a').append('<i class="headMenuCaret">&rsaquo;</i>');

	//Menu Hover Delegations
	$(".headMenu").children('ul').children('li').children('ul').parent('li').hoverIntent({
        over: function(){
	    	$(this).css("textDecoration", "underline");
	        TweenMax.to($(this).children('ul'), 0.25, {alpha:1, display:"block", "paddingTop":"25px"});
        },
        out: function(){
			$(this).css("textDecoration", "none");
			TweenMax.to($(this).children('ul'), 0.25, {alpha:0, display:"none", "paddingTop":"0"});;
        }
    });
		
});
</script>