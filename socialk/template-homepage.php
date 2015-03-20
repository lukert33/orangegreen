<?php /* Template Name: Homepage */ ?>

<?php
global $slider;
$slider = "on";
?>

<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>

<section class="hero" style="background-image:url(<?php the_field('hero_image'); ?>);">
	<div class="heroContent">
		<?php the_field('hero_content'); ?>
	</div>
</section>

<section class="home">
    <div class="row">

        <aside class="small-5 columns">
            <div class="content contentHome">  
                <?php the_field('content_1'); ?>
            </div>
        </aside>

        <aside class="small-7 columns">  
            <?php if( have_rows('slider') ): ?>

                <div class="slideCount">
                    <span class="slideCountCurrent">1</span> /
                    <span class="slideCountTotal"></span>
                </div>

                <div class="royalSlider default">
                    <?php while ( have_rows('slider') ) : the_row(); ?>

                        <a href="<?php the_sub_field('link'); ?>" target="_blank"><img class="rsImg" src="<?php the_sub_field('image'); ?>"></a>

                    <?php endwhile; ?>
                </div>

            <?php endif; ?>
        </aside>

    </div>
</section>

<section class="content">
    <div class="row">

        <aside class="small-7 columns content contentImage">  
            <div style="background-image:url(<?php the_field('image_2'); ?>)"></div>
        </aside>

        <aside class="small-5 columns content contentHome">  
            <?php the_field('content_2'); ?>
        </aside>

    </div>
</section>


<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

    $(".royalSlider").height( $(".royalSlider").parent().parent().find('.content').outerHeight(true) + 30 );

    $(".royalSlider").royalSlider({
        imageScalePadding:0,
        slideSpacing: 0,
        controlNavigation: 'none',
        arrowsNav: true,
        arrowsNavAutoHide: false,
        usePreloader: false,
        controlsInside: true,
    });

    var slider = $(".royalSlider").data('royalSlider');

    $('.slideCountTotal').text( slider.numSlides );

    slider.ev.on('rsAfterSlideChange', function(event) {
        $('.slideCountCurrent').text( slider.currSlideId + 1 );
    });

    $('.contentImage div').height( $('.contentImage').parent().children('.contentHome').outerHeight() );

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 