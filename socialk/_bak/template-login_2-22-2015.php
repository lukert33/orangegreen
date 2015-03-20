<?php /* Template Name: Login */ ?>
<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="ajaxLoader" style="display:none;"><div><span>Loading...</span></div></div>

<section class="contentPage">
    <div class="row">

        <aside class="small-10 small-centered columns">  

            <h2 class="alignCenter" style="margin: 0 0 30px 0"><strong>Login to your plan</strong></h2>
            <h5 style="font-size: 22px; width: 500px;text-align:center; margin: 20px auto 40px;">Select your record keeper from the below list. A new window will open allowing you to log into your plan securely.</h5>
            
            <ul class="small-block-grid-2 loginLinks">
                <?php while ( have_rows('links', 'option') ) : the_row(); ?>
                    <li><a href="https://<?php the_sub_field('link'); ?>" target="_blank"><img src="<?php the_sub_field('logo'); ?>"></a></li>
                <?php endwhile; ?> 
            </ul> 

            <p class="alignCenter" style="margin:60px 0 0 0;"><a href="<?php echo site_url(); ?>/contact">Trouble logging in?</a></p>
            
        </aside>

    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

// var maxHeight = 0;

// $(".loginLinks li").each(function( index, element ){
//    if ($(element).children('a').outerHeight() > maxHeight) { 
//         maxHeight = $(element).children('a').outerHeight();
//     }
// });

// $(".loginLinks a").height(maxHeight);

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 