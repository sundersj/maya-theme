<?php
/*
	@package mayatheme
	AJAX FUNCTIONS
*/

add_action( 'wp_ajax_nopriv_maya_theme_contact_form', 'maya_theme_contact_form' );
add_action( 'wp_ajax_maya_theme_contact_form', 'maya_theme_contact_form' );
add_action( 'wp_ajax_nopriv_maya_theme_register_form', 'maya_theme_register_form' );
if(is_admin()) {
	add_action( 'wp_ajax_maya_theme_register_form', 'maya_theme_register_form' );
}

function maya_theme_contact_form() {
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

function maya_theme_register_form() {
	$json 		= 	array();
	$pass1		= 	(isset($_POST['pass1']) && !empty($_POST['pass1']) ) ? trim($_POST['pass1']) : '';
	$email		= 	(isset($_POST['email']) && !empty($_POST['email']) ) ? trim($_POST['email']) : '';
	$pass2		=	(isset($_POST['pass2']) && !empty($_POST['pass2']) ) ? trim($_POST['pass2']) : '';
	$firstname	=	(isset($_POST['firstname']) && !empty($_POST['firstname']) ) ? trim($_POST['firstname']) : '';
	$lastname	=	(isset($_POST['lastname']) && !empty($_POST['lastname']) ) ? trim($_POST['lastname']) : '';
	$username	= 	(isset($_POST['username']) && !empty($_POST['username']) ) ? trim($_POST['username']) : '';

	if( $firstname && $lasttname && $username && $email && $pass1 && $pass2 ) {
		$json['error'][] = 'Plesase fill the required fields.';
	} else {
		if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
			$json['error'][] = 'Invalid email address.';
		} else if (email_exists( $email )) {
			$json['error'][] = 'Email already exist.';
		} else if ($pass1 !== $pass2 ) {
			$json['error'][] = 'Password do not match.';
		} else {
			$user_id = wp_insert_user(
				array (
					'first_name' 	=> apply_filters('pre_user_first_name', $firstname),
					'last_name' 	=> apply_filters('pre_user_last_name', $lastname),
					'user_pass' 	=> apply_filters('pre_user_user_pass', $pass1),
					'user_login' 	=> apply_filters('pre_user_user_login', $username),
					'user_email' 	=> apply_filters('pre_user_user_email', $email),
					'role'		 	=> 'subscriber' )
				);

			if(is_wp_error($user_id)) {
				$json['error'][] = 'Error on user creation.';
			} else {
				do_action('user_register', $user_id);
				sendRegistrationEmail();
				$json['id']	= $user_id;
			}
		}
	}
	wp_send_json($json);
}

?>
