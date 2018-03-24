<?php
add_action( 'wp_ajax_nopriv_register_ajax_review','register_review_from_ajax' );
add_action( 'wp_ajax_register_ajax_review','register_review_from_ajax' );
add_action( 'wp_ajax_nopriv_load_more_reviews','load_more_reviews' );
add_action( 'wp_ajax_load_more_reviews','load_more_reviews' );
add_action( 'wp_ajax_nopriv_load_sites','load_sites' );
add_action( 'wp_ajax_nopriv_load_review_sites','load_review_sites' );
add_action( 'wp_ajax_load_sites','load_sites');
add_action( 'wp_ajax_load_review_sites','load_review_sites');
add_action( 'wp_enqueue_scripts','register_review' );
function register_review()
{
	wp_enqueue_script('reviewsite',get_template_directory_uri()."/js/register_review.js",array('jquery'),'1.11',true);
	wp_localize_script('reviewsite','register_review_var',array(
				'ajax_url'=> admin_url('admin-ajax.php'),
	));
}
function register_review_from_ajax()
{
	// Field Values Retrieved from form
	$rating = $_REQUEST['rating'];
	$name = $_REQUEST['Fname'];
	$email = $_REQUEST['Email'];
	$review = $_REQUEST['Review_Details'];
	$post = $_REQUEST['post_id'];
	$post_title = "Review for ".get_the_title( $post )." by ".$name;
	$post_id = wp_insert_post( array('post_title'=>$post_title, 'post_type'=>'user-review','post_status' => 'pending' ) );
	// Field Keys For Rating Custom Fields
	$rating_field = "field_5a963133f51c0";
	$name_field = "field_5a963156f51c1";
	$email_field = "field_5a963163f51c2";
	$post_field = "field_5a96317ff51c3";
	$review_field = "field_5a96319ef51c4";
	// Update Field Values
	update_field( $rating_field,$rating, $post_id );
	update_field( $name_field,$name, $post_id );
	update_field( $email_field,$email, $post_id );
	update_field( $post_field,$post, $post_id );
	update_field( $review_field,$review, $post_id );
	wp_die();
}
// Code to Add Reviews in the WordPress Ends Here
// Code To Customize Backend Review Tables Starts Here
add_filter( 'manage_event_posts_columns', 'my_review_table_head' );
function my_review_table_head( $defaults ) {
	$defaults['reviewtitle']  = 'Review Title';
	$defaults['reviewsite']    = 'Review Site';
	$defaults['reviewby']   = 'Reviews By';
	$defaults['rating'] = 'Rating';
	return $defaults;
}
function my_review_columns($columns)
{
	$columns = array(
		'cb'	 	=> '<input type="checkbox" />',
		'title' 	=> 'Review',
		'reviewsite' 	=> 'Review Site',
		'reviewby'	=>	'Review By',
		'rating'		=>	'Rating',
	);
	return $columns;
}
function my_custom_columns( $column )
{
	global $post;
	if( $column == 'reviewtitle' ){
		get_field('name');
	}
	elseif($column == 'reviewsite'){
		 	echo "<a href='".get_edit_post_link(get_field('select_post_to_add_review_to'))."'>".get_the_title(get_field('select_post_to_add_review_to'))."</a>";
	}
	elseif($column == 'reviewby'){
			echo get_field('name')." [ ".get_field('email_address')." ]";
	}
	elseif($column == 'rating'){
			echo get_field('rating')."/10";
	}
}
add_action( "manage_user-review_posts_custom_column", "my_custom_columns" );
add_filter( "manage_edit-user-review_columns", "my_review_columns" );
function my_column_register_sortable( $columns )
{
	$columns['rating'] = 'rating';
	return $columns;
}
add_filter( "manage_edit-user-review_sortable_columns", "my_column_register_sortable" );
// Code To Customize Backend Review Tables Ends Here
/* Review Retrieval Code Starts Here */
function load_more_reviews()
{
		$post_id = $_POST['post_id'];
		$no_posts_load = get_field('total_no_of_posts_to_load','option');
		$args =array(
					 'post_type'		=> 'user-review',
					 'meta_key'		=> 'select_post_to_add_review_to',
					 'meta_value'	=> $post_id,
					 'posts_per_page' => $no_posts_load,
					 'post_status'=>'publish',
					 'paged' => $_REQUEST['page_no'],
				 );

		$the_query = new WP_Query( $args );
		if( $the_query->have_posts() ):
			while( $the_query->have_posts() ) : $the_query->the_post();
				?>
							<div class="latest-reviewsin">
								<div class="latest-reviewsleft">
									 <div class="reviews-rightinn">
											<div class="circle circle2" data-value="<?php echo (get_field('rating')/10); ?>">
													 <strong></strong>
													<span>User Rating</span>
												</div>
									 </div>
								</div>
								<div class="latest-reviewsright">
										<h3><?php the_field('name'); ?>’s Review</h3>
										<span><?php the_time('l, F j, Y \a\t g:s A'); //Monday, October 10, 2016 at 10:14 PM ?></span>
										<p><?php the_field('review_content'); ?></p>
								</div>
								<div class="clearfix"></div>
						</div>
	<?php endwhile;
		endif;
		wp_reset_query();
		wp_die();
}
/* Review Retrieval Code Ends Here */
?>
<?php
/* Initializing the options page Code Starts Here */
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}
/* Initializing the options page Code Ends  Here */
?>
<?php
function get_aggregate_user_rating( $post_id )
{
	$args = array(
				 'numberposts'	=> -1,
				 'post_type'		=> 'user-review',
				 'meta_key'		=> 'select_post_to_add_review_to',
				 'meta_value'	=> $post_id
			 );
			$user_rating = 0;
			$no_of_reviews = 0;
		  $the_query = new WP_Query( $args );
	while( $the_query->have_posts() ) : $the_query->the_post();
		$user_rating+= get_field('rating');
		$no_of_reviews++;
	endwhile;
	if($no_of_reviews <= 0){
		$details['user_rating'] = 0;
	}
	else{
		$details['user_rating']=$user_rating/$no_of_reviews/10;
	}
	$details['no_of_reviews']= $no_of_reviews;
	wp_reset_query();
	return $details;
}
function get_inhouse_aggregate_rating( $post_id )
{

	$args = array(
		'post_type' => 'review',
		'post__in' => array($post_id)
	);

		$the_query = new WP_Query( $args );

		while( $the_query->have_posts() ) : $the_query->the_post();
			$ourrating = 0;
			$counter = 0;
		while ( have_rows('product_review_details') ) : the_row();
			$ourrating+= get_sub_field( 'review_criteria_rating' );
			$counter++;
		endwhile;
		$ourrating+= get_field( 'product_price_rating' );
			$counter++;
		endwhile;
	wp_reset_query();
	return $ourrating/$counter/10;
}
function get_price_rating( $post_id )
{
	return $post_id;
}
function sortPosts( $array,$basedOn = 'recommended' ) {
	$length=count( $array );
	if( $basedOn == 'price' )
	{
	$i = 0;
		$temp = array();
		foreach ( $array as $item ){
		$temp[$i] = $item;

			$args = array(
				'post_type' => 'review',
				'post__in' => array( $item->ID )
			);
			$the_query = new WP_Query( $args );
			$rating = 0;
			while( $the_query->have_posts() ) : $the_query->the_post();
					$rating+= get_field( 'product_price_rating' );
			endwhile;
			wp_reset_query();
			$temp[$i]->rating = $rating;
		}
	}
	elseif( $basedOn == 'user_reviews' )
	{
	$i = 0;
		$temp = array();
		foreach ( $array as $item ){
			$temp[$i] = $item;
			$rating  = get_aggregate_user_rating($item->ID);
			$temp[$i]->rating = $rating['user_rating'];
		}
	}
	elseif( $basedOn == 'category' ){
		$temp = array();
	foreach($array as $i){
		$categories = get_the_terms($i->ID,'review-type');
		foreach($categories as $i2){
			if($i2->name == $_POST['category']){
			$temp[] = $i;
			}
		}
	}
	return $temp;
	}
	else{
			return $array;
	}
	for( $i=1;$i<$length;$i++ ) {
		$element = $array[$i];
		$j=$i;
		while($j>0 && $array[$j-1]->rating < $element->rating) {
			$array[$j]=$array[$j-1];
			$j=$j-1;
		}
		$array[$j]=$element;
	}
	return $array;
}
// for page review
function load_review_sites($init = '',$categoryToLoad = ''){
	if($init !== '') {
		$sortBy = $init;
		$length = 0;
	}
	else  {
		$sortBy = $_POST['sortby'];
		$length = (int)$_POST['length'];
		$categoryToLoad = $_POST['category'];
	}
	//$toFetch = $length + get_field('total_no_of_posts_to_load','option');
	$page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
	$ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : get_field('total_no_of_posts_to_load','option');
	
	$args =array(
		'post_type'		=> 'review',
		'post_status'=>'publish',
		'tax_query' => array(
		array (
			'taxonomy' => 'review-type',
			'field' => 'name',
			'terms' => $categoryToLoad,
			)
		),
		'paged'    => $page,
		'posts_per_page' => $ppp,

	);

	$myposts = get_posts( $args );
	$myposts = sortPosts($myposts,$sortBy);
	$counter = 0;
	wp_reset_query();foreach ( $myposts as $posts ) :
		$counter++;
		?>
		<div class="allreviews col-md-4">
			<div class="whiteback">
				<div class="top_rev_box">
				<?php $details = get_aggregate_user_rating( $posts->ID );  ?>
					<h2><?php echo get_the_title( $posts->ID );  ?>
						<span class="ratingstar">
							<input type="hidden" disabled="true" class="rating" data-size="s" value="<?php echo round($details['user_rating']*10,2);?>" step="0.5" data-stars="5">
						</span>
						<span>( <?php echo $details['no_of_reviews']; ?> Reviews )</span></h2>

					<div class="reviews-left">
							<?php
							if( get_the_post_thumbnail( $posts->ID ) ):
								$url =  get_the_post_thumbnail_url( $posts->ID );
							else:
								$url = get_field( 'default_site_logo','option' );
							endif;
							?>
							 <?php
			 					if( get_field( 'review_youtube',$posts->ID ) ):
			 				?>
							 <a class="bla-1 video-play" href="<?php echo get_field( 'review_youtube',$posts->ID ); ?>"><span class="btnpl">PLAY</span>
								 	<img src="<?php echo get_template_directory_uri(); ?>/images/play_icon.png" alt="" class="play">
							</a>
							<?php endif; ?>
							<a class="bla-1" href="<?php echo get_field( 'review_youtube',$posts->ID ); ?>">
									<img src="<?php echo $url; ?>" class="img-responsive" alt=""/>
							</a>

					</div>

					<div class="reviews-middle">
						<h2>
						<span class="rev_cat_name">
							<?php $terms = get_the_terms( $posts->ID, 'review-type' );
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
					<span class="review_nm"><a href="<?php echo get_the_permalink( $posts->ID );?>"><?php echo get_the_title( $posts->ID ); ?></a></span>
							<span class="ratingstar">
							<input type="hidden" disabled="true" class="rating" data-size="s" value="<?php echo round($details['user_rating']*10,2) ;?>" step="0.5" data-stars="5">
							</span>
							<span> <?php echo $details['no_of_reviews']; ?> Reviews</span></h2>
							<div class="expt_rev">
								<?php echo get_excerpt_by_id( $posts->ID );?>
								<div class="btn_rev">
									<?php if(get_field('promo_code_text',$posts->ID) || get_field('promo_code_link',$posts->ID)) :?>
										<a href="<?php the_field('promo_code_link',$posts->ID); ?>" target="_blank" class="pormooffers"><?php if(get_field('promo_code_text',$posts->ID)){echo get_field('promo_code_text',$posts->ID);}else{?>See Promo Offer<?php } ?></a>
									<?php endif; ?>
									<a href="<?php the_permalink($posts->ID); ?>" class="fullreviews">See Full Review</a>
								</div>
							</div>
					</div>
			</div>

				<div class="reviews-right">
					<div class="reviews-rightin">
						<div class="circle circle2" data-value="<?php  echo round( get_inhouse_aggregate_rating( $posts->ID ),2 ); ?>">
							<strong></strong>
							<span>Our Rating</span>
						</div>
					</div>
					<div class="reviews-rightinn">
						<div class="circle circle2" data-value="<?php echo round( $details['user_rating'],2 );?>">
							<strong></strong>
							<span>User Rating</span>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php
	endforeach;
	if( $init == '' ){
		wp_die();
	}
}
function load_sites($init = '',$categoryToLoad = ''){
	if( $init !== '' ){
		$sortBy = $init;
		$length = 0;
	}
	else{
		$sortBy = $_POST['sortby'];
		$length = (int)$_POST['length'];
		$categoryToLoad = $_POST['category'];
	}
	$sticky=get_option( 'sticky_posts' );
	$toFetch = $length + get_field( 'total_no_of_posts_to_load','option' );
	if( $categoryToLoad==''){
		if($sortBy=='category') {$sortBy='recommended';}
		$args =array(
		'post_type'		=> 'review',
		'post_status'=>'publish',
		'post__in'  => $sticky,
		'posts_per_page'=>6

	);
	}
	else{
		$args =array(
		'post_type'		=> 'review',
		'post_status'=>'publish',
		'post__in'  => $sticky,
		'tax_query' => array(
		array (
			'taxonomy' => 'review-type',
			'field' => 'name',
			'terms' => $categoryToLoad,
			)
		),
		'posts_per_page'=>6
	);
	}
	$myposts = get_posts($args);
	$myposts = sortPosts($myposts,$sortBy);
	
	$counter = 0;
	foreach ( $myposts as $posts ) :
		$counter++;
		if($counter > $toFetch)
		{
			break;
		}
		?>
		<div class="allreviews col-md-4">
			<div class="whiteback">
				<div class="top_rev_box">
				<?php $details = get_aggregate_user_rating( $posts->ID );  ?>
					<h2><?php echo get_the_title( $posts->ID );  ?>
						<span class="ratingstar">
							<input type="hidden" disabled="true" class="rating" data-size="s" value="<?php echo round($details['user_rating']*10,2);?>" step="0.5" data-stars="5">
						</span>
						<span>( <?php echo $details['no_of_reviews']; ?> Reviews )</span></h2>

					<div class="reviews-left">
							<?php
							if( get_the_post_thumbnail( $posts->ID ) ):
								$url =  get_the_post_thumbnail_url( $posts->ID );
							else:
								$url = get_field( 'default_site_logo','option' );
							endif;
							?>
							 <?php
			 					if( get_field( 'review_youtube',$posts->ID ) ):
			 				?>
							 <a class="bla-1 video-play" href="<?php echo get_field( 'review_youtube',$posts->ID ); ?>"><span class="btnpl">PLAY</span>
								 	<img src="<?php echo get_template_directory_uri(); ?>/images/play_icon.png" alt="" class="play">
							</a>
							<?php endif; ?>
							<a class="bla-1" href="<?php echo get_field( 'review_youtube',$posts->ID ); ?>">
									<img src="<?php echo $url; ?>" class="img-responsive" alt=""/>
							</a>

					</div>

					<div class="reviews-middle">
						<h2>
						<span class="rev_cat_name">
							<?php $terms = get_the_terms( $posts->ID, 'review-type' );
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
					<span class="review_nm"><a href="<?php echo get_the_permalink( $posts->ID );?>"><?php echo get_the_title( $posts->ID ); ?></a></span>
							<span class="ratingstar">
							<input type="hidden" disabled="true" class="rating" data-size="s" value="<?php echo round($details['user_rating']*10,2) ;?>" step="0.5" data-stars="5">
							</span>
							<span> <?php echo $details['no_of_reviews']; ?> Reviews</span></h2>
							<div class="expt_rev">
								<?php echo get_excerpt_by_id( $posts->ID );?>
								<div class="btn_rev">
									<?php if(get_field('promo_code_text',$posts->ID) || get_field('promo_code_link',$posts->ID)) :?>
										<a href="<?php the_field('promo_code_link',$posts->ID); ?>" target="_blank" class="pormooffers"><?php if(get_field('promo_code_text',$posts->ID)){echo get_field('promo_code_text',$posts->ID);}else{?>See Promo Offer<?php } ?></a>
									<?php endif; ?>
									<a href="<?php the_permalink($posts->ID); ?>" class="fullreviews">See Full Review</a>
								</div>
							</div>
					</div>
			</div>

				<div class="reviews-right">
					<div class="reviews-rightin">
						<div class="circle circle2" data-value="<?php  echo round( get_inhouse_aggregate_rating( $posts->ID ),2 ); ?>">
							<strong></strong>
							<span>Our Rating</span>
						</div>
					</div>
					<div class="reviews-rightinn">
						<div class="circle circle2" data-value="<?php echo round( $details['user_rating'],2 );?>">
							<strong></strong>
							<span>User Rating</span>
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<?php
	endforeach;
	if( $init == '' ){
		wp_die();
	}
}
?>
<?php
add_action( 'init', 'update_my_custom_type', 99 );

/**
 * update_my_custom_type
 *
 * @author  Joe Sexton <joe@webtipblog.com>
 */
function update_my_custom_type() {
	global $wp_post_types;

	if ( post_type_exists( 'user-review' ) ) {

		// exclude from search results
		$wp_post_types['user-review']->exclude_from_search = true;
	}
}

add_action( 'wp_enqueue_scripts', 'load_custom_functions', 10 );

function load_custom_functions() {
	wp_enqueue_script(
	'custom_functions_js',
		trailingslashit( get_template_directory_uri() ) . 'js/custom_functions.js', array( 'jquery' ), '1.0',
		true
	);
}


function make_mce_awesome( $init ) {

    $init['block_formats'] = 'Paragraph=p;Heading 1=h1;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Address=address;Pre=pre';

    return $init;
}

add_filter('tiny_mce_before_init', 'make_mce_awesome');

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {

    $style_formats = array(

        array(
            'title' => 'Entry Title',
            'block' => 'h2',
            'classes' => 'entry-title',
            'exact' => true,

        )
    );

    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;

}
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );

?>