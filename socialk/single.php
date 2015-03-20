<?php get_header();?>
<?php get_template_part('theme-component', 'nav'); ?>

<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>

<?php
$author_id = get_the_author_meta( 'ID' );
$author_nicename = get_the_author_meta( 'user_nicename' );
$author_avatar = get_field('avatar', 'user_'. $author_id );
$author_facebook = get_field('facebook', 'user_'. $author_id );
$author_twitter = get_field('twitter', 'user_'. $author_id );
$author_linkedin = get_field('linkedin', 'user_'. $author_id );
if ( get_field('hero_image') ) {
	$hero = get_field('hero_image');
} else {
	$hero = get_field('hero_image', 1428);
}
?>

<section class="hero" style="height:350px; background-image: url(<?php echo $hero; ?>); background-color: #79af3a;">
	<div class="heroContent" style="text-align:left; max-width:860px;">
		<h1><?php the_title(); ?></h1>
		<h6>Posted by <?php the_author(); ?> &nbsp;•&nbsp; <?php the_date(); ?></h6>
	</div>
</section>

<section class="page">
	<div class="row">

		

		<aside class="small-9 columns" >
			<div class="content contentPage"> 
				<?php the_content(); ?>
			</div>
		</aside>

		<aside class="small-3 columns" style="padding:60px 60px 0 30px"> 
			<?php get_template_part('theme-component', 'sidebar-blog'); ?>
		</aside>

	</div>
</section>

<div style="padding: 0 70px";>

<section class="blogShare">

	<div class="row">
        <aside class="small-10 small-centered columns blogTitle" style="margin-bottom:0;">
        	<div class="blogDivider"></div>
        		Share This Article
        </aside>
    </div>

    <div class="row">
        <aside class="small-10 small-centered columns">
        	<div class="social">
				<div class="facebook">Facebook</div>
				<div class="twitter">Twitter</div>
			</div>
        </aside>
    </div>

</section>

	<section class="blogAuthor">

		<div class="row">
	        <aside class="small-10 small-centered columns blogTitle">
	        	<div class="blogDivider"></div>
	        		Post Written By
	        </aside>
	    </div>

	    <div class="row">
	        <aside class="small-10 small-centered columns ">
	        	<div class="blogAuthorTable">
		        	<div class="blogAuthorAvatar" style="background-image:url(<?php echo $author_avatar; ?>)"></div>
		        	<div class="blogAuthorContent">
			        	<h3><?php the_author(); ?></h3>
			        	<p><?php the_author_description(); ?></p> 
			        	<div class="blogAuthorSocial">

			        		<?php if( $author_facebook ) { ?>
								<a target="_blank" class="facebook" href="<?php echo $author_facebook; ?>"></a>
							<?php } ?>

							<?php if( $author_twitter ) { ?>
								<a target="_blank" class="twitter" href="<?php echo $author_twitter; ?>"></a>
							<?php } ?>

							<?php if( $author_linkedin ) { ?>
								<a target="_blank" class="linkedin" href="<?php echo $author_linkedin; ?>"></a>
							<?php } ?>
			        		
			        	</div>
		        	</div> 
	        	</div> 
	        </aside>
	    </div>

	</section>

<?php $prevPost = get_previous_post(true); ?>
	<?php if($prevPost) { ?>

		<?php $args = array(
		    'posts_per_page' => 1,
		    'include' => $prevPost->ID
		); ?>

		<section class="blogShare">
			<div class="row">
		        <aside class="small-10 small-centered columns blogTitle">
		        	<div class="blogDivider"></div>
		        		Read Another
		        </aside>
		    </div>
		    <div class="row">
		        <aside class="small-10 small-centered columns">
		        	<div class="blogAuthorTable">

					    <?php $prevPost = get_posts($args);
					    foreach ($prevPost as $post) {
					        setup_postdata($post); ?>

					        <?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>

					        <div class="blogAuthorAvatar" <?php if ( has_post_thumbnail() ) { ?> style="background-image:url(<?php echo $url; ?>)" <?php } else { ?> style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/featured.png)" <?php } ?>></div>
					        <div class="blogAuthorContent">
					            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					            <a class="blogAuthorMore" href="<?php the_permalink(); ?>">Read the full article...</a>
					        </div>

			        </div>
		        </aside>
		    </div>
		</section>

		<?php wp_reset_postdata(); ?>

	<?php } //end foreach ?>
<?php } // end if ?>

</div>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer();?>
<?php get_template_part('theme-component', 'scripts'); ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

	$('div.facebook').click(function(){
		FB.ui({
			method: 'share',
			href: window.location.href,
		}, function(response){});
	});

	$('div.twitter').click(function(){
		window.open('http://twitter.com/share?url=' + window.location.href + '&text=<?php the_title() ?>&', 'twitterwindow', 'height=450, width=550, top='+($(window).height()/2 - 225) +', left='+$(window).width()/2 +', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
	});

});
</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1535257790085582',
      xfbml      : true,
      version    : 'v2.2'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<?php get_template_part('theme-component', 'terminate'); ?> 