<?php
/*
Template Name:Reviews
*/
get_header();
?>
<div class="main-container home_template">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="home_cat_filter">
					<div class="recommended">
						<h2 class="top_rev_title">Reviews</h2>
					</div>
				</div>
				<div class="review_pg_content row">
					<?php
						$categories = get_terms( array(
							'taxonomy' => 'review-type',
							'hide_empty' => false,
						) );
						foreach ( $categories as $reviewtype ) { ?>
						<div class="col-md-4">
							<div class="review_pg_grid">
								<div class="review_grid_img">
									<a href="<?php echo get_term_link( $reviewtype ); ?>">
										<?php $term_img = z_taxonomy_image_url(  $reviewtype->term_id ); ?>
										<img src="<?php echo $term_img; ?>">
										<h2><?php echo $reviewtype->name; ?></h2>
									</a>
								</div>
							</div>
						</div>
						<?php }
						?>
				</div>
			</div>
			<div class="col-md-3">
				<?php
				get_sidebar();
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
get_footer();
?>