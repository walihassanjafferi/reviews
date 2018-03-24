<?php
get_header();
?>
<div class="main-container">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-8">
			<div class="allreviews whiteback">
				<h2><?php the_title(); ?>
					<span class="ratingstar">
						<input type="number" disabled="true" class="rating" data-size="s" value="<?php $details = get_aggregate_user_rating(get_the_ID()) ; echo $details['user_rating']*10; ?>" step="0.5" data-stars="5">
					</span>
					<span>(<?php echo $details['no_of_reviews']; if($details['no_of_reviews']==1){ echo " Review";}else{echo " Reviews"; }?>)</span>
				</h2>
			<div class="reviews-left">
			<?php
				if( get_the_post_thumbnail() ):
				$url =  get_the_post_thumbnail_url();
				else:
				$url = get_field( 'default_site_logo','option' );
				endif;
			?>
			<?php
					if(get_field('review_youtube')):
			?>
				<a class="bla-1 video-play" href="<?php echo get_field('review_youtube'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/play-btn.png" alt="" class="play">
				</a>
				<?php
					endif;
				?>
			<a class="bla-1" href="<?php echo get_field('review_youtube'); ?>">
				<img src="<?php echo $url; ?>" class="img-responsive" alt=""/>
			</a>
			</div>
				<div class="reviews-middle">
						<h2><?php the_title(); ?>
						<span class="ratingstar">
							<input type="number" disabled="true" class="rating" data-size="s" value="<?php $details = get_aggregate_user_rating(get_the_ID()) ; echo $details['user_rating']*10; ?>" step="0.5" data-stars="5">
						</span>
						<span>(<?php echo $details['no_of_reviews']; if($details['no_of_reviews']==1){ echo " Review";}else{echo " Reviews"; }?>)</span></h2>
						<?php
							if(get_field('product_pros')):
						?>
						<p><span class="greenin">Pros</span> <?php the_field('product_pros'); ?></p>
					<?php
						endif;
						?>
					<?php
							if(get_field('product_cons')):
					?>
						<p><span class="redin">Cons</span> <?php the_field('product_cons'); ?></p>
					<?php
					endif;
						?>
						<!--  <a href="#" class="fullreviews">See Full Review</a>-->
						<?php if(get_field('promo_code_text') || get_field('promo_code_link')) :?>
						<a href="<?php the_field('promo_code_link'); ?>" target="_blank" class="pormooffers">
						<?php if(get_field('promo_code_text')){echo get_field('promo_code_text');}else{?>See Promo Offer<?php } ?></a>
						<?php endif; ?>
					</div>
					<div class="reviews-right">
					<div class="reviews-rightin">
						<div class="circle" data-value="<?php echo get_inhouse_aggregate_rating(get_the_ID()); ?>">
							<strong></strong>
							<span>Our Rating</span>
						</div>
					</div>
					<div class="reviews-rightinn">
						<div class="circle" data-value="<?php echo $details['user_rating']; ?>">
							<strong></strong>
							<span>User Rating</span>
						</div>
					</div>
				</div>
		<div class="clearfix"></div>
					<!-- mobile mobile -->
					<div class="reviews-middle-mobile">
						<div class="reviews-middle-mobilelt">
								<span class="greenin">Pros</span>
									<p><?php the_field('product_pros'); ?></p>
						</div>
							<div class="reviews-middle-mobilert">
								<span class="redin">Cons</span>
								<p><?php the_field('product_cons'); ?></p>
								<?php if(get_field('promo_code_text') || get_field('promo_code_link')) :?>
							<a href="<?php the_field('promo_code_link'); ?>" target="_blank" class="pormooffers">
							<?php if(get_field('promo_code_text')){echo get_field('promo_code_text');}else{?>See Promo Offer<?php } ?></a>
							<?php endif; ?>
							</div>
					<div class="clearfix"></div>
					</div>
				</div>
	<?php if( get_field('tab_details')): ?>
			<div class="company-reviews">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
				<?php $i=1; while( have_rows('tab_details') ): the_row();
				// vars
				$tab_name = get_sub_field('tab_name');
				$tab_content = get_sub_field('tab_content');
				?>
				<li role="presentation" <?php if( $i==1 ) { ?>class="active"<?php } ?>>
					<a href="#<?php echo $i; ?>" aria-controls="<?php echo $i; ?>" role="tab" data-toggle="tab">
						<?php echo $tab_name; ?>
					</a>
				</li>
				<?php $i++; endwhile; ?>
			</ul>
			<!-- Tab panes -->
			<div class="tab-content">
			<?php $i=1; while( have_rows('tab_details') ): the_row();
			// vars
			$tab_name = get_sub_field('tab_name');
			$tab_content = get_sub_field('tab_content');
			?>
			<div role="tabpanel" class="<?php if( $i==1) { ?>tab-pane active<?php } else { ?>tab-pane<?php } ?>" id="<?php echo $i; ?>">
				<div class="pannelin">
				<?php echo $tab_content; ?>
				</div>
			</div>
			<?php $i++; endwhile; ?>
			</div>
		</div>
	<?php endif; ?>
	<div class="review-testimonials" >
		<form name="review_frm" id="frmReview" onsubmit="event.preventDefault();">
			<h2>Reviews & Testimonials <span>Choose Your Score</span> </h2>
			<div class="clearfix"></div>
			<div class="layout-slider">
				<input id="SliderSingle" type="hidden" name="rating" value="1"/>
			</div>
		<div class="row">
				<div class="form-group col-md-6 paddno">
					<input type="text" class="form-control txtname" name="Fname" placeholder="Your Name" required>
				</div>
				<div class="form-group col-md-6 paddnoo">
					<input type="email" class="form-control txtname" name="Email" id="exampleInputEmail1" placeholder="Your Email" required>
				</div>
					<textarea class="form-control textareain" rows="8" name="Review_Details" placeholder="Your Review" required></textarea>
			<div class="clearfix"></div>
		</div>
			<button type="submit" class="btn btn-default sbmtreview" id="submitReview">Submit Review</button>
			<input type="hidden" name="post_id" value="<?php echo get_the_ID(); ?>" id='post_id'>
			<p>I accept the terms & conditions (Required) </p>
		</form>
		<div class="row hidden" id="review_notification">
			<div class="col-md-12 text-center">
			<p id="review_content">
				<img src="<?php echo get_template_directory_uri(); ?>/images/ring.svg" width="25"><span>Submitting Your Review</span>
			</p>
		</div>
	</div>
	</div>
		<?php
			$total_posts = get_field('total_no_of_posts_to_load','option');
			$post_id = get_the_ID();
			$args =array(
				'numberposts'	=> -1,
				'post_type'		=> 'user-review',
				'meta_key'		=> 'select_post_to_add_review_to',
				'meta_value'	=> $post_id
				);
			$the_query = new WP_Query( $args );
	?>
		<?php if( $the_query->have_posts() ): ?>
	<div class="latest-reviews">
			<input type="hidden" name="total_reviews" id="total_reviews" value="<?php echo $the_query->post_count;  ?>" />
			<h2>Latest Reviews</h2>
			<?php $counter = 0; ?>
			<div id='reviews'>
			<?php while( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php
			if($counter++ >= $total_posts){
				break;
			}
			?>
			<div class="latest-reviewsin">
				<div class="latest-reviewsleft">
						<div class="reviews-rightinn">
							<div class="circle" data-value="<?php echo (get_field('rating')/10); ?>">
								<strong></strong>
								<span>User Rating</span>
							</div>
						</div>
				</div>
				<div class="latest-reviewsright">
						<h3><?php the_field('name'); ?>’s Review</h3>
						<span><?php the_time('l, F j, Y \a\t g:s A'); //Monday, October 10, 2016 at 10:14 PM ?></span>
						<p><?php the_field('review_content'); ?></p>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php endwhile; ?>
	</div>
			<button type="submit" onclick='event.preventDefault();load_more_reviews()' class="btn loadmore" id='load-more' data-page_no="2">Load More</button>
		<div class="clearfix"></div>
	</div>
	<?php endif; ?>
	<?php wp_reset_query();	?>
		</div>
			<div class="col-xs-12 col-sm-4 col-md-4">
				<div class="side-bar">
					<div class="product-scores">
						<h2>How The Product Scores</h2>
						<?php
					if(get_field('product_minimum_pricing') || get_field('product_maximum_pricing') || get_field('product_price_rating')):
						?>
						<div class="product-scoresin">
							<div class="product-scoresleft">
								<div class="circle" data-value="<?php echo (get_field('product_price_rating')/10) ; ?>">
								<strong></strong>
								</div>
							</div>
							<div class="product-scoresright">
								<h3>Price <span> ($<?php echo get_field('product_minimum_pricing'); ?> <?php if(get_field('product_maximum_pricing')); ?> - $<?php echo get_field('product_maximum_pricing');?>)</span></h3>
								<p>How Well are they Priced</p>
							</div>
							<div class="clearfix"></div>
						</div>
					<?php
					endif;
					?>
					<?php
					while ( have_rows('product_review_details') ) : the_row();
					?>
					<div class="product-scoresin">
						<div class="product-scoresleft">
							<div class="circle" data-value="<?php echo round((get_sub_field('review_criteria_rating')/10),2); ?>">
								<strong></strong>
							</div>
						</div>
					<div class="product-scoresright">
							<h3><?php echo get_sub_field('review_criteria'); ?></h3>
							<p><?php echo get_sub_field('review_criteria_sub_title'); ?></p>
					</div>
					<div class="clearfix"></div>
					</div>
					<?php
					endwhile;
					?>
					<?php
						if(get_field('accreditation_class_logo')):
					?>
					<div class="accredited-business">
						<img src="<?php the_field('accreditation_class_logo'); ?>" alt="" class="img-responsive" />
					</div>
					<?php
						endif;
					?>
					<div class="product-scoresnew">
						<div class="number-reviewsleft">
							<h2><?php echo $details['no_of_reviews']; ?></h2>
						</div>

						<div class="number-reviewsright">
							<h3>Number of Reviews </h3>
							<p>WatchtheReview reviews posted by users</p>
						</div>
						<div class="clearfix"></div>
					</div>
						<?php
						if(get_field('accreditation_content')):
						?>
						<div class="product-scoresin">
						<?php
							the_field('accreditation_content');
						?>
						</div>
					<?php
					endif;
					?>
					</div>
					<?php
					if(have_rows('award_details') ):
					?>
					<div class="achievements-awards">
						<h2><?php the_field('award_section_title'); ?></h2>
						<ul>
						<?php
						while ( have_rows('award_details') ) : the_row();
						?>
							<li><?php if(get_sub_field('award_link')){?><a href="#"><?php } ?><strong><?php the_sub_field('award_year');  ?></strong>  - <?php the_sub_field('award_name'); ?><?php if(get_sub_field('award_link')){?></a><?php }   ?></li>
						<?php
						endwhile;
						?>
						</ul>
					</div>
					<?php
					endif;
					?>
					<?php
					if(have_rows('stock_info_details')):
					?>
					<div class="stock-info">
						<h2>Stock Information</h2>
						<ul>
							<?php
							while(have_rows('stock_info_details')): the_row();
							?>
							<li><?php the_sub_field('stock_detail_title'); ?><strong> <?php the_sub_field('stock_detail_answer')?></strong></li>
							<?php
							endwhile;
							?>
						</ul>
					</div>
					<?php
					endif;
						?>
				</div>
			</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<?php
get_footer();
?>