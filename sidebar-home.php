<?php
	if(dynamic_sidebar( 'home-sidebar-widget' )):endif;
	if ( is_active_sidebar( 'testimonials' ) ) {
		echo "<h1 class='testimonial_heading'>Testimonials</h1>";
	if(dynamic_sidebar( 'testimonials' )):endif;
}
?>
