<?php 
/**
 * Commet 2024 functions and definitions
 *
 * Anyone can use the theme but he/she will have to maintain the rules of GPL 2 licence
 *
 * Here you will get all the functions of Comet 2024
 */


// theme setup functions

add_action('after_theme_setup', 'comet_functions');

function comet_functions(){

	// text domain

	load_theme_textdomain('comet', get_template_directory().'/lang');

	// theme supports

	add_theme_support('post_thumbnails');

	add_theme_support('title_tag');

	add_theme_support('post-formats', array(
		'video',
		'audio',
		'quote',
		'gallery'
	));


}

// adding fonts

function get_comet_fonts(){


	$fonts = array();

	$fonts[] = 'Montserrat:400,700';

	$fonts[] = 'Raleway:300,400,500';

	$fonts[] = 'Halant:300,400';

	$comet_fonts = add_query_arg(array(
		'family' => urlencode(implode('|', $fonts)),
		'subset' => 'latin'
	), 'https://fonts.googleapis.com/css');


	return $comet_fonts;

}



// including the styles

add_action('wp_enqueue_scripts', 'comet_styles');

function comet_styles(){

	wp_enqueue_style('bundle', get_template_directory_uri().'/css/bundle.css');

	wp_enqueue_style('style', get_template_directory_uri().'/css/style.css');

	wp_enqueue_style('fonts', get_comet_fonts());




}

add_action('wp_enqueue_scripts', 'conditional_scripts');

function conditional_scripts(){

	wp_enqueue_script('html5shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array(), '', false);
	wp_script_add_data('html5shim', 'conditional', 'lt IE 9');


	wp_enqueue_script('respond', 'https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js', array(), '', false);
	wp_script_add_data('respond', 'conditional', 'lt IE 9');
}


add_action('wp_enqueue_scripts', 'comet_scripts');

function comet_scripts(){

	

	wp_enqueue_script('bundle', get_template_directory_uri().'/js/bundle.js', array('jquery'), '', true);

	wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?v=3.exp', array('jquery'), '', true);

	wp_enqueue_script('main', get_template_directory_uri().'/js/main.js', array('jquery', 'bundle'), '', true);
}