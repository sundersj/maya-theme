<?php
/*
	@package mayatheme
	AJAX FUNCTIONS
*/

add_action( 'wp_ajax_nopriv_maya_theme_contact_form', 'maya_theme_contact_form' );
add_action( 'wp_ajax_maya_theme_contact_form', 'maya_theme_contact_form' );

function maya_theme_contact_form() {
	$emails 	= array();
	$title 		= wp_strip_all_tags($_POST['name']);
	$email 		= wp_strip_all_tags($_POST['email']);
	$message 	= wp_strip_all_tags($_POST['message']);

	$args = array (
		'post_title'	=> $title,
		'post_content'	=> $message,
		'post_author'	=> 1,
		'post_status'	=> 'publish',
		'post_type'		=> 'maya-contact',
		'meta_input'	=> array( '_contact_email_value_key' => $email )
	);

	$id = wp_insert_post($args);
	echo  ($id) ? $id : 0;
}
?>
