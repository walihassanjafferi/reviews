<?php 
get_header();
?>
<div class="main-container blog_page">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="row blog_head">
					<div class="col-md-6">
						<div class="blog_title">
							<h2>blog</h2>
						</div>
					</div>
					<div class="col-md-6 blog_dropdwon">
						<span class="srt_by">Sort By:</span>
					<?php wp_dropdown_categories( 'show_option_none=Category' ); ?>
					<script type="text/javascript">
						var dropdown = document.getElementById("cat");
						function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
								location.href = "<?php echo esc_url( home_url( '/' ) ); ?>?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
						}
						dropdown.onchange = onCatChange;
					</script>
					</div>
				</div>
				<div class="blog_post">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="row blog_post_grid">
					<div class="col-md-6">
						<div class="post-grid-img">
							<?php 
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'no-crop'); 
							?>
						<a href="<?php echo get_the_permalink(get_the_ID()); ?>">
							<?php if($featured_img_url){ ?>
							<img src="<?php echo $featured_img_url; ?>" alt="<?php the_title();?>">
							<?php } else { ?>
							<img src="<?php echo get_template_directory_uri(); ?>/images/placeholder.jpg" alt="">
							<?php } ?>
						</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="post-grid-content">
							<div class="post_content_date">
								<p><?php echo get_the_date( 'F j, Y' );?></p>
							</div>
							<div class="post_content_head">
								<a href="<?php echo get_the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
							</div>
							<div class="post_content_author">
								<p>By: <sapn class="ath_name"><?php echo get_the_author();?></span></p>
							</div>
							<div class="post-content_post">
								<p><?php echo get_excerpt_by_id( get_the_ID() ); ?></p>
							</div>
							<a href="<?php echo get_the_permalink(); ?>" class="post_btn">READ MORE</a>
						</div>
					</div>
					</div>
					<?php endwhile;?>
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
						<div id="nav-above" class="navigation post_arrow">
							<span class="nav-next left-arrow"><?php previous_posts_link( __( '<i class="fas fa-arrow-left"></i> &nbsp; newer post', 'watchthereview' ) ); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
							<span class="nav-previous right-arrow"><?php next_posts_link( __( 'older post &nbsp; <i class="fas fa-arrow-right"></i>', 'watchthereview' ) ); ?></span>
						</div><!-- #nav-above -->
					<?php endif; ?>
					<?php wp_reset_postdata(); ?>
					<?php else : ?>
					<p class="no_post_result"><?php echo 'Sorry, no posts matched your criteria.'; ?></p>
					<?php endif; ?>
					<!-- post-end -->
				</div>
			</div>
			<div class="col-md-3">
				<?php
					get_sidebar();
				?>
			</div>
			<div class="clearfix">
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
?>