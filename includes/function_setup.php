<?php
function reviewsite_setup() {
	add_theme_support( 'post-formats', array(
		'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video'
	) );
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 'auto', 'auto', true );
	add_filter( 'use_default_gallery_style', '__return_false' );
}
add_action( 'after_setup_theme', 'reviewsite_setup' );
function watchthereview_theme_setup() {
	register_nav_menus( array( 
		'primary' => 'Primary menu', 
		'footer' => 'Footer menu' 
		) );
 }
add_action( 'after_setup_theme', 'watchthereview_theme_setup' );
function get_excerpt_by_id($post_id){
	global $post;
	$the_post = get_post($post_id); //Gets post ID
	$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
	if (get_post_type( $post_id ) == 'review' ) :
	$excerpt_length=14;
	else :
	$excerpt_length=32;
	endif;
	$the_excerpt = strip_tags( strip_shortcodes( $the_excerpt ) ); //Strips tags and images
	$words = explode( ' ', $the_excerpt, $excerpt_length + 1 );

	if( count($words) > $excerpt_length ) :
		array_pop( $words );
		$the_excerpt = implode( ' ', $words );
		endif;
		$the_excerpt = '<p>' . $the_excerpt . '</p>';
		return $the_excerpt;
}
function searchfilter($query) {
	if ($query->is_search && !is_admin() ) {
		if( isset($_GET['post_type']) && $_GET['post_type']=='review') {
				$query->set('post_type',array('review'));
		}
		else{
			$query->set('post_type',array('post','review'));
		}
	}
return $query;
}
add_filter('pre_get_posts','searchfilter');
//Add custom image size for Blog Page.
add_image_size( 'no-crop', 375, 225, false ); // Hard crop left top

?>
