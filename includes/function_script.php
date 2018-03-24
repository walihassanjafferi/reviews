<?php function bootstrapstarter_enqueue_styles()  {
	wp_register_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css' );
	$dependencies = array('bootstrap');
	wp_enqueue_style( 'bootstrapstarter-style', get_stylesheet_uri(), $dependencies );
	wp_register_style('main', get_template_directory_uri() . '/style.css' );
	$dependencies1 = array('main');
	wp_enqueue_style( 'main-style', get_stylesheet_uri(), $dependencies1 );
}
function bootstrapstarter_enqueue_scripts() {
	$dependencies = array('jquery');
	wp_enqueue_script('bootstrap', get_template_directory_uri().'/bootstrap/js/bootstrap.min.js', $dependencies, '', true );
}
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'bootstrapstarter_enqueue_scripts' );
?>