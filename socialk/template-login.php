<?php /* Template Name: Login */ ?>
<?php
//
// Dear future dev, sorry that this page is a mess. This is the result of countless band-aids and burning out.
//
?>
<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="ajaxLoader" style="display:none;"><div><span>Loading...</span></div></div>

<section class="contentPage">
    <div class="row">

        <aside class="small-12 small-centered columns">  

            <h2 class="alignCenter" style="margin: 0 0 30px 0"><strong>Login to your plan</strong></h2>
            <h5 style="font-size: 22px; width: 670px;text-align:center; margin: 20px auto 80px;">Select your record keeper from the below list. A new window will open allowing you to log into your plan securely.</h5>
            

            <ul class="small-block-grid-1 loginLinks">
                <li><a href="https://www.expertplan.com/login1a.jsp" target="_blank"><img src="https://socialk.com/wp-content/uploads/epmktgtoplogo.png"></a></li>
            </ul>

            <p class="loginNote">For Social(k) plans prior to 2015 & plans that have not moved yet</p>

            <ul class= "small-block-grid-3 loginLinks">
                <li><a href="https://www.yourplanaccess.net/retirementplanconsultants/" target="_blank"><img src="https://socialk.com/wp-content/uploads/RPC_Logo.jpg"></a></li>
                <li><a href="https://www.retirementaccountlogin.net/turningpoint/default.aspx" target="_blank" style="padding: 0 20px;"><img src="https://socialk.com/wp-content/uploads/TPA_LOGO_2.jpg" style="width: 133px;"></a></li>
                <li><a href="https://www.yourplanaccess.net/rpg/" target="_blank"><img src="https://socialk.com/wp-content/uploads/logo.gif" style="width:145px;"></a></li>
            </ul>

            <p class="loginNote">For New Social(k) plans & plans that have moved</p>

            <ul class= "small-block-grid-2 loginLinks">
               <li><a href="https://www.sponsorinsight.com" target="_blank" style="float: right; padding: 20px 70px;"><img src="https://socialk.com/wp-content/uploads/logo.png" style="width: 200px; "></a></li>
               <li><a href="https://myaccount.ascensus.com/rplink" target="_blank" style="float: left; padding: 20px 70px;"><img src="https://socialk.com/wp-content/uploads/part.png" style="width: 200px; "></a></li>
            </ul>

            <p class="loginNote">Solo(k) plans and Social(k) plans staying with ExpertPlan / Ascensus</p>

            <ul class="small-block-grid-1 loginLinks">
                <li><a href="https://folioidentity.com/identity/login?" target="_blank"><img src="https://socialk.com/wp-content/uploads/DC46929LOGO.jpg"></a></li>
            </ul>

            <p class="loginNote">Individual IRAs</p>
            
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