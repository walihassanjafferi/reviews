<?php
get_header();
?>
<div class="main-container">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="full-content">
				<h1><?php the_title(); ?></h1>
				<?php if ( have_posts() ) : ?>
					<?php
							//start the loop.
							while ( have_posts() ) : the_post(); ?>
								<?php the_content();?>
							<?php
							// End the loop.
								endwhile; ?>
				<?php else : ?>
					<h2>Not Found</h2><br />
					<p>Sorry, but you are looking for something that isn't here.</p>
				<?php endif; ?>
			</div>
		</div>
		<div class="clearfix"></div>
		</div>
</div>
</div>
<?php
get_footer();
?>