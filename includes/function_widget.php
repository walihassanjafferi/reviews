<?php
add_action( 'widgets_init', 'watchthereview_widgets_init' );
function watchthereview_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Reviews Type Widget', 'watchthereview' ),
		'id' => 'review-type',
		'description' => '',
		'before_widget' => '<div class="review_cat_list">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Home Sidebar', 'watchthereview' ),
		'id' => 'home-sidebar-widget',
		'description' => 'Sidebar Widget',
		'before_widget' => '<div class="widget_sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Testimonials Widget', 'watchthereview' ),
		'id' => 'testimonials',
		'description' => '',
		'before_widget' => '<div class="testimonial_wrap">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="testimonial_title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Sidebar', 'watchthereview' ),
		'id' => 'sidebar-widget',
		'description' => 'Sidebar Widget',
		'before_widget' => '<div class="widget_sidebar inner_sidebar">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Footer Reviews Categories', 'watchthereview' ),
		'id' => 'footer-review',
		'description' => 'Footer Reviews Categories',
		'before_widget' => '<div class="footer-menu">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Newsletter', 'watchthereview' ),
		'id' => 'newsletter-widget',
		'description' => 'Newsletter Widget',
		'before_widget' => '<div class="newsletter_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
		register_sidebar( array(
		'name' => __( 'Social Media', 'watchthereview' ),
		'id' => 'social-media',
		'description' => '',
		'before_widget' => '<div class="social-lnks">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Terms & Conditions', 'watchthereview' ),
		'id' => 'term-cnd',
		'description' => 'Terms & Conditions',
		'before_widget' => '<div class="footer_trm col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name' => __( 'Privacy Policy', 'watchthereview' ),
		'id' => 'privacy-policy',
		'description' => 'Privacy Policy',
		'before_widget' => '<div class="footer_pp col-md-4">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widgettitle">',
		'after_title'   => '</h3>',
	) );
}
?>