<?php
//Reviews custom post type
add_action( 'init', 'review_register' );
function review_register() {
$labels = array(
	'name' => _x('Reviews', 'post type general name'),
	'singular_name' => _x('Review', 'post type singular name'),
	'add_new' => _x('Add New', 'Review'),
	'add_new_item' => __('Add New Review'),
	'edit_item' => __('Edit Review'),
	'new_item' => __('New Review'),
	'all_items' => __('All Reviews'),
	'view_item' => __('View Reviews'),
	'search_items' => __('Search Reviews'),
	'not_found' =>  __('No Reviews found'),
	'not_found_in_trash' => __('No Reviews found in Trash'),
	'parent_item_colon' => '',
	'menu_name' => 'Reviews'
 );

$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields' ),
	);
register_post_type('review',$args);
}
//Review Texonomy
add_action( 'init', 'review_taxonomy', 0 );
function review_taxonomy() {
// Add new taxonomy, make it hierarchical like categories
	$labels = array(
		'name' => _x( 'Reviews Type', 'taxonomy general name' ),
		'singular_name' => _x( 'Review Type', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Reviews Type' ),
		'all_items' => __( 'All Reviews Type' ),
		'parent_item' => __( 'Parent Review Type' ),
		'parent_item_colon' => __( 'Parent Review Type:' ),
		'edit_item' => __( 'Edit Review Type' ), 
		'update_item' => __( 'Update Review Type' ),
		'add_new_item' => __( 'Add New Review Type' ),
		'new_item_name' => __( 'New Review Type Name' ),
		'menu_name' => __( 'Reviews Type' ),
	);
// Now register the taxonomy
	register_taxonomy('review-type',array('review'), array(
		'hierarchical' => true,
		'labels' => $labels,
		'show_ui' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'review-type' ),
	));
}
//CPT For User Reviews
add_action( 'init', 'user_review_register' );
function user_review_register() {
$labels = array(
	'name' => _x('User Reviews', 'post type general name'),
	'singular_name' => _x('User Review', 'post type singular name'),
	'add_new' => _x('Add New', 'User Review'),
	'add_new_item' => __('Add New User Review'),
	'edit_item' => __('Edit User Review'),
	'new_item' => __('New User Review'),
	'all_items' => __('All User Reviews'),
	'view_item' => __('View User Reviews'),
	'search_items' => __('Search User Reviews'),
	'not_found' =>  __('No User Reviews found'),
	'not_found_in_trash' => __('No User Reviews found in Trash'),
	'parent_item_colon' => '',
	'menu_name' => 'User Reviews'
 );

$args = array(
	'labels' => $labels,
	'public' => true,
	'publicly_queryable' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'query_var' => true,
	'rewrite' => true,
	'capability_type' => 'post',
	'hierarchical' => true,
	'supports' => array( 'title','page-attributes'),
);
register_post_type('user-review',$args);
}
/**
 * Remove the slug from published post permalinks. Only affect our CPT though.
 */
function vipx_remove_cpt_slug( $post_link, $post, $leavename ) {
	if ( ! in_array( $post->post_type, array( 'review' ) ) || 'publish' != $post->post_status )
		return $post_link;
	$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'vipx_remove_cpt_slug', 10, 3 );

function vipx_parse_request_tricksy( $query ) {
	// Only noop the main query
	if ( ! $query->is_main_query() )
		return;
	// Only noop our very specific rewrite rule match
	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) )
		return;
	// 'name' will be set if post permalinks are just post_name, otherwise the page rule will match
	if ( ! empty( $query->query['name'] ) )
		$query->set( 'post_type', array( 'post', 'review', 'page' ) );
}
add_action( 'pre_get_posts', 'vipx_parse_request_tricksy' );
?>
