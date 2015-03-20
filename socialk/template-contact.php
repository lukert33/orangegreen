<?php /* Template Name: Contact */ ?>

<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<section class="contentPage">
    <div class="row">

        <aside class="small-7 small-centered columns">  
            <?php the_content(); ?>
        </aside>

    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 