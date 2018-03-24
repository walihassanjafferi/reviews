<?php
get_header();
?>
<div class="main-container single_blog">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="single_blog_page">
					<h1 class="blog_title"><?php the_title();?></h1>
						<div class="single_blog_post_deatils">
							<?php echo get_the_date( 'F j, Y' );?>
							<span class="slash-divider">/</span>
							<span class="clr_bl"><?php echo get_the_author();?></span>
							<span class="slash-divider">/</span>
							<span class="clr_bl">
							<?php $terms = get_the_terms( get_the_ID(), 'category' );
								if ( $terms && ! is_wp_error( $terms ) ) : 
										$draught_links = array();
										foreach ( $terms as $term ) {
												$draught_links[] = $term->name;
										}
										$on_draught = join( ", ", $draught_links );
										print_r($on_draught);
										?>
							<?php endif; ?>
							</span>
						</div>
						<div class="single_post_content">
							<?php if (have_posts()):?>
								<?php
								while (have_posts()) : the_post(); ?>
									<?php the_content();?>
								<?php
								endwhile; ?>
							<?php endif; ?>
						</div>
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