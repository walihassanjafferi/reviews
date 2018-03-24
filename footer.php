<footer>
	<div class="footer_top">
		<div class="container">
			<div class="row">
				<div class="footer_menu col-md-2">
					<?php
						wp_nav_menu( array(
						'menu'				=> 'footer',
						'theme_location'	=> 'footer',
						'container'			=> 'div',
						'container_class'	=> 'footer-menu')
							);
						?>
				</div>
				<div class="footer_menu col-md-2">
					<?php
						if( dynamic_sidebar('footer-review') ):endif;
						?>
				</div>
				<div class="footer_search col-md-8">
					<form method="get" action="<?php echo home_url( '/' ); ?>">
						<input type="text" placeholder="Search Reviews" name="s" class="seach_review"><input type="hidden" name="post_type" value="review" /><button class="review_btn" type="submit">
							SEARCH NOW
						</button></form>
					<div class="clearfix"></div>
					<?php if(dynamic_sidebar('social-media')):endif;?>
				</div>
			<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="footer_bottom">
		<div class="container">
			<div class="row">
				<div class="copyright col-md-4">
					2018 Copyright <a href="<?php echo get_site_url();?>">WatchTheReview.com</a>.
				</div>
				<?php if( dynamic_sidebar( 'term-cnd' ) ):endif;?>
				<?php if( dynamic_sidebar( 'privacy-policy' ) ):endif;?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.0.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/parsley.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/circle-progress.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/examples.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/star-rating.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/YouTubePopUp.jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.slider-bundled.min.js"></script>
<script type="text/javascript">
	jQuery(function(){
	jQuery("a.bla-1").YouTubePopUp();
	jQuery("a.bla-2").YouTubePopUp( { autoplay: 0 } ); // Disable autoplay
	});
</script>
<script type="text/javascript" charset="utf-8">
	jQuery("#SliderSingle").slider({
	from: 1,
	to: 10,
	step: 0.5,
	round: 1,
	format: { format: '##.0', },
	dimension: '',
	skin: "round",
	scale: [1,  2, 3, 4, 5,6 , 7, 8, 9, 10]
	});
</script>
<script src="//static.getclicky.com/js" type="text/javascript"></script>
<script type="text/javascript">try{ clicky.init(101069603); }catch(e){}</script>
<?php wp_footer(); ?>
</body>
</html>