<?php
/*
Template Name:Home
*/
get_header();
?>
<div class="main-container home_template">
	<div class="review_cat_title">
		<div class="container">
			<div class="row">
				<?php if ( have_posts() ) : ?>
						<?php
								//start the loop.
								while ( have_posts() ) : the_post(); ?>
									<?php the_content();?>
								<?php
								// End the loop.
									endwhile; ?>
					<?php endif; ?>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php if( dynamic_sidebar( 'review-type' ) ) : endif;?>
			<div class="col-md-9 home_section_left">
				<div class="home_cat_filter">
					<div class="recommended">
						<h2 class="top_rev_title">Top Reviews</h2>
						<ul>
							<li>Sort By:</li>
							<li>
							<?php
							$categories = get_terms( array(
								'taxonomy' => 'review-type',
								'hide_empty' => false,
							) );
							?>
							<select id="front-category" name="category" onchange="event.preventDefault();sortPosts(this)" data-sortby="category">
							<option value="">Category</option>
							<?php foreach($categories as $category){ ?>
								<option value="<?php echo $category->name;?>"><?php echo $category->name;?></option>
							<?php } ?>
							</select>
							</li>
						</ul>
						<div class="clearfix"></div>
				</div>
				</div>
				<div class="home_review_list">
					<input type="hidden" id="sortby" value="recommended" class="hidden">
					<input type="hidden" id="post-category" value="">
					<div id='featured_reviews' class="row">
					<?php load_sites( 'recommended' ); ?>
					<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-3 home_section_right">
				<?php
				get_sidebar( 'home' );
				?>
			</div>
			<div class="clearfix"></div>
			</div>
	</div>
	<div class="review_newsletter">
		<div class="container">
			<div class="row review_news_content">
				<?php if( dynamic_sidebar( 'newsletter-widget' ) ):endif; ?>
			</div>
		</div>
	</div>
	<?php 
	if(get_field('alphabet_reviews_hide','option')){ ?>
	<div class="all_review">
		<div class="container">
			<div class="row">
				<div class="col-md-12"><h2>All Reviews</h2></div>
				<?php 
				sort( $categories );
				$array_a = array();
				$array_b = array();
				$array_c = array();
				$array_d = array();
				$array_e = array();
				$array_f = array();
				$array_g = array();
				$array_h = array();
				$array_i = array();
				$array_j = array();
				$array_k = array();
				$array_l = array();
				$array_m = array();
				$array_n = array();
				$array_o = array();
				$array_p = array();
				$array_q = array();
				$array_r = array();
				$array_s = array();
				$array_t = array();
				$array_u = array();
				$array_v = array();
				$array_w = array();
				$array_x = array();
				$array_y = array();
				$array_z = array();
				foreach( $categories as $category ){ 
					if( strtoupper( $category->name[0])=='A' )
						{
						$array_a[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='B' )
						{
						$array_b[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='C' )
						{
						$array_c[] = $category->name;
						}
					else if (strtoupper($category->name[0])=='D' )
						{
						$array_d[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='E' )
						{
						$array_e[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='F' )
						{
						$array_f[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='G' )
						{
						$array_g[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='H' )
						{
						$array_h[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='I' )
						{
						$array_i[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='J' )
						{
						$array_j[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='K' )
						{
						$array_k[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='L' )
						{
						$array_l[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='M' )
						{
						$array_m[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='N' )
						{
						$array_n[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='O' )
						{
						$array_o[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='P' )
						{
						$array_p[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='Q' )
						{
						$array_q[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='R' )
						{
						$array_r[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='S' )
						{
						$array_s[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='T' )
						{
						$array_t[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='U' )
						{
						$array_u[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='V' )
						{
						$array_v[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='W' )
						{
						$array_w[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='X' )
						{
						$array_x[] = $category->name;
						}
					else if( strtoupper($category->name[0])=='Y' )
						{
						$array_y[] = $category->name;
						}
					else
						{
						$array_z[] = $category->name;
						}
					?>
					<?php }?>

					<?php if( count( $array_a )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">A</h4>
							<?php foreach( $array_a as $acat ) {?>
							<?php $trm_a = get_term_by( 'name', $acat, 'review-type' );?>
							<a href="<?php echo get_term_link( $trm_a ); ?>"><?php echo $acat; ?></a>
							<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_b )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">B</h4>
						<?php foreach( $array_b as $bcat ) {?>
						<?php $trm_b=get_term_by( 'name', $bcat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_b ); ?>"><?php echo $bcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_c )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">C</h4>
						<?php foreach( $array_c as $ccat ) {?>
						<?php $trm_c=get_term_by( 'name', $ccat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_c ); ?>"><?php echo $ccat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_d )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">D</h4>
						<?php foreach( $array_d as $dcat ) {?>
						<?php $trm_d=get_term_by( 'name', $dcat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_d ); ?>"><?php echo $dcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_e )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">E</h4>
						<?php foreach( $array_e as $ecat ) {?>
						<?php $trm_e=get_term_by( 'name', $ecat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_e ); ?>"><?php echo $ecat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_f )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">F</h4>
						<?php foreach( $array_f as $fcat ) {?>
						<?php $trm_f=get_term_by( 'name', $fcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $frm_a ); ?>"><?php echo $fcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_g )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">G</h4>
						<?php foreach( $array_g as $gcat ) {?>
						<?php $trm_g=get_term_by( 'name', $gcat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_g ); ?>"><?php echo $gcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_h )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">H</h4>
						<?php foreach( $array_h as $hcat ) {?>
						<?php $trm_h=get_term_by( 'name', $hcat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_h ); ?>"><?php echo $hcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_i )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">I</h4>
						<?php foreach( $array_i as $icat ) {?>
						<?php $trm_i = get_term_by( 'name', $icat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_i ); ?>"><?php echo $icat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count($array_j )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">J</h4>
						<?php foreach( $array_j as $jcat ) {?>
						<?php $trm_j = get_term_by( 'name', $jcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_j ); ?>"><?php echo $jcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_k )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">K</h4>
						<?php foreach( $array_k as $acat ) {?>
						<?php $trm_k = get_term_by( 'name', $kcat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_k ); ?>"><?php echo $kcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_l )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">L</h4>
						<?php foreach( $array_l as $lcat ) {?>
						<?php $trm_l=get_term_by( 'name', $lcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_l ); ?>"><?php echo $lcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_m )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">M</h4>
						<?php foreach( $array_m as $mcat ) {?>
						<?php $trm_m = get_term_by( 'name', $mcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_m ); ?>"><?php echo $mcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_n )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">N</h4>
						<?php foreach( $array_n as $ncat ) {?>
						<?php $trm_n = get_term_by( 'name', $ncat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_n ); ?>"><?php echo $ncat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_o )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">O</h4>
						<?php foreach( $array_o as $ocat ) {?>
						<?php $trm_o=get_term_by( 'name', $ocat, 'review-type');?>
						<a href="<?php echo get_term_link( $trm_o ); ?>"><?php echo $ocat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_p )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">P</h4>
						<?php foreach( $array_p as $pcat ) {?>
						<?php $trm_p=get_term_by( 'name', $pcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_p ); ?>"><?php echo $pcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_q )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">Q</h4>
						<?php foreach( $array_q as $qcat ) {?>
						<?php $trm_q=get_term_by( 'name', $qcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_q ); ?>"><?php echo $qcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count($array_r )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">R</h4>
						<?php foreach( $array_r as $rcat ) {?>
						<?php $trm_r=get_term_by( 'name', $rcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_r ); ?>"><?php echo $rcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_s )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">S</h4>
						<?php foreach( $array_s as $scat ) {?>
						<?php $trm_s=get_term_by( 'name', $scat, 'review-type' ); ?>
						<a href="<?php echo get_term_link( $trm_s ); ?>"><?php echo $scat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_t )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">T</h4>
						<?php foreach( $array_t as $tcat ) {?>
						<?php $trm_t=get_term_by( 'name', $tcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_t ); ?>"><?php echo $tcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_u )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">U</h4>
						<?php foreach( $array_u as $ucat ) {?>
						<?php $trm_u=get_term_by( 'name', $ucat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_u ); ?>"><?php echo $ucat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_v )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">V</h4>
						<?php foreach( $array_v as $vcat ) {?>
						<?php $trm_v=get_term_by( 'name', $vcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_v ); ?>"><?php echo $vcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_w )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">W</h4>
						<?php foreach( $array_w as $wcat ) {?>
						<?php $trm_w=get_term_by( 'name', $wcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_w ); ?>"><?php echo $wcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_x )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">X</h4>
						<?php foreach( $array_x as $xcat ) {?>
						<?php $trm_x=get_term_by( 'name', $xcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_x ); ?>"><?php echo $xcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_y )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">Y</h4>
						<?php foreach( $array_y as $ycat ) {?>
						<?php $trm_y=get_term_by( 'name', $ycat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_y ); ?>"><?php echo $ycat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
					<?php if( count( $array_z )>0 ):?>
						<div class="col-md-3">
							<h4 class="alpha_title">Z</h4>
						<?php foreach( $array_z as $zcat ) {?>
						<?php $trm_z=get_term_by( 'name', $zcat, 'review-type' );?>
						<a href="<?php echo get_term_link( $trm_z ); ?>"><?php echo $zcat; ?></a>
						<?php } ?>
						</div>
					<?php endif; ?>
			</div>
		</div>
		<div class="clearfix"></div>
	</div><?php } ?>
</div>
<?php
get_footer();
?>