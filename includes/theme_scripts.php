<?php

/*
 * last updated: 16/03/2014
 *
 */

function fx_enqueue() {

	// styles
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri().'/css/normalize.css' );
	wp_enqueue_style( 'foundation', get_stylesheet_directory_uri().'/css/foundation.css' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri().'/css/theme.css','', date('c') );

 if( get_option( 'bb_gf1' ) ) wp_enqueue_style( 'bb_gf1', get_option('bb_gf1') );
 if( get_option( 'bb_gf2' ) ) wp_enqueue_style( 'bb_gf2', get_option('bb_gf2') );
	if( get_option( 'bb_gf3' ) ) wp_enqueue_style( 'bb_gf3', get_option('bb_gf3') );

	wp_enqueue_style( 'icon', get_stylesheet_directory_uri().'/icons/foundation-icons.css' );
	wp_enqueue_style( 'icon-eot', get_stylesheet_directory_uri().'/icons/foundation-icons.eot' );

	// header scripts

	wp_enqueue_script( 'modernizr	', get_template_directory_uri() . '/js/modernizr.js', array('jquery'), '1.0.0' );

	// footer sripts

	wp_enqueue_script( 'fastclick	', get_template_directory_uri() . '/js/vendor/fastclick.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'zurb', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'equalizer	', get_template_directory_uri() . '/js/foundation/foundation.equalizer.js', array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'fx_enqueue' );

?>