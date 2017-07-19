<?php
/*
@package mayatheme

========================
	ADMIN ENQUEUE FUNCTIONS
========================
*/

function maya_load_admin_scripts($hook) {
	if($hook == 'toplevel_page_maya_theme') {
		wp_enqueue_media();
		wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Raleway:300' );
	}
	wp_enqueue_style( 'maya', get_template_directory_uri() . '/css/maya_admin.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css', array(), '4.7.0', 'all' );

	//register js admin section
//	if ($hook == 'maya_theme_custom_css') {
		wp_enqueue_script( 'ace', get_template_directory_uri() . '/js/ace/ace.js', array('jquery'), '1.2.1', true );
	//}

	wp_enqueue_script( 'maya', get_template_directory_uri() . '/js/maya_admin.js', array('jquery'), '1.0.0', true );

}

add_action( 'admin_enqueue_scripts', 'maya_load_admin_scripts' );

/*
========================
	FRONT-END ENQUEUE FUNCTIONS
========================
*/

function maya_load_scripts(){
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/font-awesome.min.css', array(), '4.7.0', 'all' );

	wp_enqueue_style( 'maya', get_template_directory_uri() . '/css/maya.css', array(), '1.0.0', 'all' );
	wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:300,400|Roboto:300,400' );

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery' , get_template_directory_uri() . '/js/jquery.min.js', false, '3.2.1', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.3.7', true );
	wp_enqueue_script( 'maya', get_template_directory_uri() . '/js/maya.js', array('jquery'), '1.0.0', true );

}

add_action( 'wp_enqueue_scripts', 'maya_load_scripts' );
