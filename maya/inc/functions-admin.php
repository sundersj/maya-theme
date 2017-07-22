<?php
/* @package mayatheme

	ADMIN PAGE
========================
*/


function maya_add_admin_menu() {
	add_menu_page( 'Maya Theme Options', 'Maya Theme', 'manage_options', 'maya_theme', 'maya_theme_create_page', '', 110 );
	add_submenu_page('maya_theme', 'General', 'General', 'manage_options', 'maya_theme', 'maya_theme_create_page');
	add_submenu_page('maya_theme', 'Theme Options', 'Theme Options', 'manage_options', 'maya_theme_options', 'maya_theme_support_page');
	add_submenu_page('maya_theme', 'CSS Options', 'Custom CSS', 'manage_options', 'maya_theme_custom_css', 'maya_theme_custom_css');
}

add_action('admin_menu', 'maya_add_admin_menu');

function maya_theme_create_page() {
	require_once(get_template_directory().'/inc/admin_templates/admin.php');
}

function maya_theme_support_page() {
	require_once(get_template_directory().'/inc/admin_templates/support.php');
}

function maya_theme_custom_css() {
	require_once(get_template_directory().'/inc/admin_templates/custom_css.php');
}

//Activate custom settings
add_action( 'admin_init', 'maya_custom_settings' );

function maya_custom_settings() {
	register_setting( 'maya-settings-group', 'profile_picture' );
	register_setting( 'maya-settings-group', 'first_name' );
	register_setting( 'maya-settings-group', 'last_name' );
	register_setting( 'maya-settings-group', 'user_description' );
	register_setting( 'maya-settings-group', 'twitter_handler', 'maya_sanitize_twitter_handler' );
	register_setting( 'maya-settings-group', 'facebook_handler' );
	register_setting( 'maya-settings-group', 'gplus_handler' );

	add_settings_section( 'maya-profile-options', 'Profile Option', 'maya_profile_options', 'maya_theme');

	add_settings_field( 'profile-picture', 'Profile Picture', 'maya_theme_profile', 'maya_theme', 'maya-profile-options');
	add_settings_field( 'profile-name', 'Full Name', 'maya_theme_name', 'maya_theme', 'maya-profile-options');
	add_settings_field( 'profile-description', 'Description', 'maya_theme_description', 'maya_theme', 'maya-profile-options');
	add_settings_field( 'profile-twitter', 'Twitter handler', 'maya_theme_twitter', 'maya_theme', 'maya-profile-options');
	add_settings_field( 'profile-facebook', 'Facebook handler', 'maya_theme_facebook', 'maya_theme', 'maya-profile-options');
	add_settings_field( 'profile-gplus', 'Google+ handler', 'maya_theme_gplus', 'maya_theme', 'maya-profile-options');


	//Theme Support Options
	register_setting( 'theme-options-group', 'post_formats' );
	register_setting( 'theme-options-group', 'maya_custom_header' );
	register_setting( 'theme-options-group', 'maya_custom_background' );
	register_setting( 'theme-options-group', 'maya_custom_contact_form' );

	add_settings_section( 'theme-post-formart-options', 'Theme Support Options', 'maya_theme_support_options', 'maya_theme_options');

	add_settings_field( 'theme-post-formats', 'Post formats', 'maya_theme_post_formats', 'maya_theme_options', 'theme-post-formart-options');
	add_settings_field( 'theme-custom-header', 'Custom Header', 'maya_theme_custom_header', 'maya_theme_options', 'theme-post-formart-options');
	add_settings_field( 'theme-custom-background', 'Custom Background', 'maya_theme_custom_background', 'maya_theme_options', 'theme-post-formart-options');
	add_settings_field( 'theme-custom-contact-form', 'Contact Form', 'maya_theme_custom_contact_form', 'maya_theme_options', 'theme-post-formart-options');


	//Theme Custom Css Options
	register_setting( 'theme-custom-css-group', 'maya_custom_css', 'maya_custom_css_sanitize' );
	add_settings_section( 'theme-custom-css-options', 'Theme Custom Css Options', 'maya_theme_custom_css_option', 'maya_theme_custom_css');
	add_settings_field( 'theme-custom-contact-form', 'Custom Css', 'maya_theme_custom_css_add', 'maya_theme_custom_css', 'theme-custom-css-options');


}

// General Options Functions
function maya_profile_options() {
	echo 'Customize your Sidebar Information';
}

function maya_theme_profile() {
	$picture = esc_attr( get_option( 'profile_picture' ) );
	if(empty($picture) ){
		echo '<button type="button" class="button button-secondary" value="Upload Profile Picture" id="upload-button"><i class="fa fa-upload"></i> Upload Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="" />';
	} else {
		echo '<button type="button" class="button button-secondary" value="Replace Profile Picture" id="upload-button"><i class="fa fa-upload"></i> Replace Profile Picture</button><input type="hidden" id="profile-picture" name="profile_picture" value="'.$picture.'" /> <button type="button" class="button button-secondary" value="Remove" id="remove-picture"><i class="fa fa-times"></i> Remove</button>';
	}
}

function maya_theme_name() {
	$firstName = esc_attr( get_option( 'first_name' ) );
	$lastName = esc_attr( get_option( 'last_name' ) );
	echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" /> <input type="text" name="last_name" value="'.$lastName.'" placeholder="Last Name" />';
}

function maya_theme_description() {
	$description = esc_attr( get_option( 'user_description' ) );
	echo '<input type="text" name="user_description" value="'.$description.'" placeholder="Description" /><p class="description">Write something smart.</p>';
}

function maya_theme_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" placeholder="Twitter handler" /><p class="description">Input your Twitter username without the @ character.</p>';
}

function maya_theme_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'" placeholder="Facebook handler" />';
}

function maya_theme_gplus() {
	$gplus = esc_attr( get_option( 'gplus_handler' ) );
	echo '<input type="text" name="gplus_handler" value="'.$gplus.'" placeholder="Google+ handler" />';
}

//Sanitization settings
function maya_sanitize_twitter_handler( $input ){
	$output = sanitize_text_field( $input );
	$output = str_replace('@', '', $output);
	return $output;
}

// Theme Support Options Functions
function maya_theme_support_options() {
	echo 'Activate and Deactivate specific Theme Support Options';
}

function maya_theme_post_formats() {
	$posts_formats  = array( 'aside', 'gallery', 'link', 'image', 'quote', 'status','video', 'audio', 'chat' );
	$options = get_option( 'post_formats' );

	 foreach($posts_formats as $format) {
		 		$checked = (@$options[$format] == 1) ? 'checked' : '';
	 	echo '<label><input type="checkbox" id="'.$format.'" name="post_formats['.$format.']" value="1" '.$checked.'>'.$format.'</label><br>';
	 }
}

function maya_theme_custom_header() {
	$header = esc_attr( get_option( 'maya_custom_header' ) );
	$checked = ($header == 1) ? 'checked' : '';
	echo '<label><input type="checkbox" id="maya_custom_header" name="maya_custom_header" value="1" '.$checked.'>Activate Custom Header</label><br>';
}

function maya_theme_custom_background() {
	$background = esc_attr( get_option( 'maya_custom_background' ) );
	$checked = ($background == 1) ? 'checked' : '';
	echo '<label><input type="checkbox" id="maya_custom_background" name="maya_custom_background" value="1" '.$checked.'>Activate Custom Background</label><br>';
}

function maya_theme_custom_contact_form() {
	$form = esc_attr( get_option( 'maya_custom_contact_form' ) );
	$checked = ($form == 1) ? 'checked' : '';
	echo '<label><input type="checkbox" id="maya_custom_contact_form" name="maya_custom_contact_form" value="1" '.$checked.'>Activate Contact Form</label><br>';
}

// Theme Custom Css Options Functions
function maya_theme_custom_css_option() {
	echo 'Add your custom css here';
}

function maya_custom_css_sanitize( $input ){
 	return esc_textarea( $input );
}


function maya_theme_custom_css_add() {
	$css = esc_attr( get_option( 'maya_custom_css' ) );
	$css = (empty($css)) ? '/*Add your custom css here*/' : $css;
	echo '<label><div id="maya-custom-css">'.$css.'</div><textarea id="mayacustomcss" name="maya_custom_css">'.$css.'</textarea></label>';
}



?>
