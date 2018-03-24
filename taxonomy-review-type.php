<?php
get_header();
$queried_object = get_queried_object();
$rev_cat_name = $queried_object->name;
?>
<div class="main-container home_template">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="home_cat_filter">
					<div class="recommended">
						<h2 class="top_rev_title"><?php echo $rev_cat_name;?></h2>
						<ul>
							<li>Sort By:</li>
							<li><a class="activein sortby" onclick="event.preventDefault();rsortPosts(this)" data-sortby="recommended">Most Recommended</a> | </li>
							<li><a class="sortby" onclick="event.preventDefault();rsortPosts(this)" data-sortby="user_reviews">Best User Ratings</a> | </li>
							<li><a class="sortby" onclick="event.preventDefault();rsortPosts(this)" data-sortby="price">Best Price</a> </li>
						</ul>
				</div>
				</div>
				<div class="home_review_list">
					<input type="hidden" id="sortby" value="recommended" class="hidden">
					<input type="hidden" id="post-category" value="<?php echo $rev_cat_name;?>" class="hidden">
					<input type="hidden" id="front-category" name="category"  data-sortby="category" value="<?php echo $rev_cat_name;?>" class="hidden">
					<div id='featured_reviews' class="row">
					<?php load_review_sites( 'recommended' , $rev_cat_name ); ?>
					</div>
					<div class="ld_btn"><button type="submit" onclick='event.preventDefault();rloadMorePosts()' id="loadmoresites" class="btn loadmore loadmoreposts">Load More</button></div>
					<div class="clearfix"></div>

					<div class="des_cat single_post_content">
						<?php echo term_description( $queried_object->term_id, 'review-type' ) ?>
					</div>

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