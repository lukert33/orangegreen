<?php /* Template Name: Login */ ?>
<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<div class="ajaxLoader" style="display:none;"><div><span>Loading...</span></div></div>

<section class="contentPage">
    <div class="row">

        <aside class="small-7 small-centered columns">  

            <h2 class="alignCenter" style="margin: 0 0 30px 0"><strong>Login to your plan</strong></h2>
            <h5 style="font-size: 22px; width: 500px;text-align:center; margin: 20px auto 40px;">Entering your email will open the record keeper site you use to log into your plan.</h5>
            
            <div class="alert"></div>

            <form name="loginform" id="loginform" style="padding:40px 40px 30px 40px; overflow:hidden;">

                <div style="position:relative;">
                    <label style="margin: 0 0 15px 0;">Email Address</label>
                    <a href="<?php echo site_url(); ?>/contact" style="position: absolute; right: 0; top: 0;">forgot?</a>
                    <input type="text" name="user_email" id="user_email" value="">
                </div>

                <div class="frm_submit" style="margin:30px 0 15px;">
                    <input type="button" id="submit" class="button buttonRounded" value="Login">
                </div>
            </form>

            <p class="alignCenter" style="margin:60px 0 0 0;"><a href="<?php echo site_url(); ?>/contact">Trouble logging in?</a></p>
            
        </aside>

    </div>
</section>

<?php endwhile; ?>
<?php endif; ?>

<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

$('#loginform').submit(function(e){
    e.preventDefault();
    loginform();
});

$('#submit').click(function(e){
    e.preventDefault();
    loginform();
});

function loginform(){
    $('.ajaxLoader').fadeIn();

    var email = $('#user_email').val().toLowerCase();

    console.log(email);

    if( email in emails ){

        var src = emails[$('#user_email').val().toLowerCase()];
        var url = "https://" + src;
        
        var win = window.open(url, '_blank');
        win.focus();

        $('.contentPage').html("<div class='success'><h3>We've found your record keeper!</h3><h5>If a window didn't open, please allow pop-ups (for this url) and refresh.</h5><p><strong>Please note: Social(k) can not troubleshoot record keeper errors. If you are experiencing problems logging into your record keeper's site, please contact them.</strong></p></div>");
        $('.ajaxLoader').fadeOut();
        
    } else {
        $('.alert').html( "<p style='text-align:center; color: red'>Sorry, We weren't able to find that email in our database.</p>");
        $('.ajaxLoader').fadeOut();
    }
}

var emails = [];
<?php $a = 0; ?>
<?php if( have_rows('redirects', 'option') ): ?>
    <?php while ( have_rows('redirects', 'option') ) : the_row(); ?>

        <?php $a++; ?>
        var key<?php echo $a; ?> = [<?php echo strtolower( get_sub_field('emails') ) ?>];
        var keyLength<?php echo $a; ?> = key<?php echo $a; ?>.length;

        for( var i = 0; i < keyLength<?php echo $a; ?>; i++ ){
            emails[key<?php echo $a; ?>[i]] = "<?php echo get_sub_field('link') ?>";
        }

    <?php endwhile; ?>
<?php endif; ?>

});
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 