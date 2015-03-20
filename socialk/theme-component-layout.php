<?php if( have_rows('layout_builder') ): ?>

    <?php while ( have_rows('layout_builder') ) : the_row(); ?>

        <?php if( get_row_layout() == 'paragraph' ): ?>

        	<?php the_sub_field('paragraph'); ?>

	    <?php elseif( get_row_layout() == 'divider' ): ?>

        	<div class="divider"></div>

	    <?php elseif( get_row_layout() == 'featured_image' ): ?>

        	<div class="image-container">
				<img src="<?php the_sub_field('image'); ?>">
			</div>

			<div class="caption-container">
				<?php the_sub_field('caption'); ?>
			</div>

		<?php elseif( get_row_layout() == 'quote' ): ?>

        	<div class="quoteInline">
				<?php the_sub_field('quote'); ?>
				<?php if ( get_sub_field('author') ) { ?><span>&mdash; <?php the_sub_field('author'); ?></span><?php } ?>
			</div>

    	<?php elseif( get_row_layout() == 'video_content' ): ?>

        	<div class="embed-container">
				<?php the_sub_field('video_code'); ?>
			</div>

			<script type="text/javascript">
				jQuery(document).ready(function($) {

					$(".embed-container").fitVids();

				});
			</script>

		<?php elseif( get_row_layout() == 'grid' ): ?>

			<?php if( have_rows('gallery') ): ?>

	        	<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3 gallery">

		        	<?php while( have_rows('gallery') ): the_row();  ?>

				        	<li>
				        		<a class="gridLink" target="_blank" href="<?php the_sub_field('link'); ?>">
				        			<img src="<?php the_sub_field('image'); ?>" />
				        		</a>
				        		<span class="gridSpan">
				        			<?php the_sub_field('caption'); ?>
				        		</span>
				        	</li>

					<?php endwhile; ?>

					</ul>

	        <?php endif; ?>

		<?php elseif( get_row_layout() == 'slider' ): ?>

			<?php if( have_rows('gallery') ): ?>

		        	<div class="royalSlider default">

			        	<?php while( have_rows('gallery') ): the_row();  ?>

				        	<?php if( get_sub_field('medium') == "image") { ?>

					        	<img class="rsImg" src="<?php the_sub_field('image'); ?>" alt="image desc" />
								
							<?php } else { ?>

								<img class="rsImg" src="<?php the_sub_field('thumb'); ?>" data-rsVideo="<?php the_sub_field('video'); ?>" />

							<?php } ?>

						<?php endwhile; ?>

					</div>

					<script type="text/javascript">
						jQuery(document).ready(function($) {

						    $(".royalSlider").royalSlider({
								autoScaleSlider: true,
								autoScaleSliderWidth: 850,
								autoScaleSliderHeight: 478,
								imageScalePadding: 0,
								imageScaleMode: 'fit',
								controlNavigation: 'bullets',
								slidesSpacing: 0,
								loop: true,
								controlsInside: false,
								arrowsNavAutoHide: false,
								video: {
									autoHideArrows: false
								},
							});

						});
					</script>

	        <?php endif; ?>

		<?php elseif( get_row_layout() == 'gallery' ): ?>

	    	<?php $images = get_sub_field('gallery'); ?>
	    	<?php if( $images ): ?>

	        	<ul class="small-block-grid-2 medium-block-grid-2 large-block-grid-3 gallery">

	        		<?php $a; ?>
	        		<?php $b; ?>

	        		<?php foreach( $images as $image ): ?>

		        		<?php $a++; ?>

			            <li>
			                <a href="#pageLightbox<?php echo $a; ?>" class="pageLightbox" rel="lightbox" style="background-image: url(<?php echo $image['sizes']['large']; ?>);"></a>
			            </li>

			        <?php endforeach; ?>

			        <?php foreach( $images as $image ): ?>

			            <?php $b++; ?>

				        <div id="pageLightbox<?php echo $b; ?>" class="pageLightboxContent alignCenter" style="display:none">

				            <img src="<?php echo $image['url']; ?>" />

				            <div class="pageLightboxContentText alignLeft">
				            	<h3><?php echo $image['title']; ?></h3>
				            	<p><?php echo $image['description']; ?><?php echo $image['caption']; ?></p>
				            </div>

				        </div>

			        <?php endforeach; ?>

			    </ul>

			    <script type="text/javascript">
					jQuery(document).ready(function($) {

						$(".pageLightbox").fancybox({
					        padding: 0,
					        margin: 20,
					        width: 'auto',
					        height: 'auto',
					        wrapCSS: 'pageLightboxSkin'
					    });

					    $('.pageLightbox ').height( $('.pageLightbox ').width() );

					});
				</script>

	    	<?php endif; ?>

	    <?php elseif( get_row_layout() == 'feed' ): ?>

		    <?php $post_objects = get_sub_field('filter', false, false); ?>

	    	<?php 

	    	$args = array( 
	    		'post_parent__in' => $post_objects, 
	    		'post_type' => 'page',
	    		'post_status' => 'publish',
	    		'order' => 'DESC',
	    		'orderby' => 'date',
	    		'posts_per_page'=> -1
    		);

			$feed_query = new WP_Query( $args );

			?>

			

			<?php if ( $feed_query->have_posts() ) : ?>
				<?php while ( $feed_query->have_posts() ) : $feed_query->the_post(); ?>
					<a class="feed" href="<?php the_permalink(); ?>">
						<div id="<?php the_id(); ?>">

							<h3><?php the_title(); ?></h3>

							<?php if ( get_field('excerpt') ): ?>
								<?php the_field('excerpt'); ?>
							<?php else: ?>
								<p>Learn more about <?php the_title(); ?>...</p>
							<?php endif; ?>
							<p><span class="green">Read Full Article &nbsp; &rsaquo;</span></p>

						</div>
					</a>

				<?php endwhile; ?>
			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

        <?php endif; ?>

    <?php endwhile; ?>

<?php endif; ?>