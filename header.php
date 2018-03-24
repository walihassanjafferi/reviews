<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="fo-verify" content="1798d4d1-c58d-45d8-8a9a-1c16b255d14f">
		<meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1,minimum-scale=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png">
	<?php wp_head();?>
	</head>
<body <?php body_class(); ?>>
	<header>
		<div class="header_main">
			<div class="container">
				<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light bg-faded">
					<a class="navbar-brand logo_box" href="<?php echo esc_url( home_url( '/' ) ); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="watch the review logo" class="img-responsive" />
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse top_menu" id="navbarSupportedContent">
						<?php
						wp_nav_menu( array(
						'menu'				=> 'primary',
						'theme_location'	=> 'primary',
						'container'			=> 'div',
						'container_class'	=> 'main-menu',
						'menu_class'		=> 'navbar-nav mr-auto')
							);
						?>
					<form class="form-inline my-2 my-lg-0 search_header" method="get" action="<?php echo home_url( '/' ); ?>">
						<input class="form-control mr-sm-2" type="search" placeholder="Search" name="s" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
					</form>
				</div>
			</nav>
				</div>
			</div>
		</div>
	</header>