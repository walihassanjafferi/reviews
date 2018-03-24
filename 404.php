<?php get_header(); ?>
<div class="main-container">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12">
			<div class="full-content">
				<h1><?php _e( 'Oops! That page can&rsquo;t be found.', 'watchthereview' ); ?></h1>
				<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'watchthereview' ); ?></p>
				<div class="innersearch">
					<?php get_search_form(); ?>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<?php get_footer(); ?>
