<?php
/*
@package mayatheme

========================
	Theme support
========================
*/

/* THEME POST FORMATS */

$options = get_option('post_formats');
if( !empty( $options ) ) {
	$output = array();
	foreach($options as $key => $val) {
		$output[] = $key;
	}

	add_theme_support('post-formats', $output);
}

/* THEME CUSTOM BACKGROUND */

//$header = esc_attr( get_option( 'maya_custom_header' ) );

$args = array(
		'width'         => 100,
		'height'        => 500,
		'default-image' => get_template_directory_uri() . '/images/header.jpg',
		'uploads'       => true
	);
	add_theme_support( 'custom-header', $args );
/* THEME CUSTOM BACKGROUND */

$background = esc_attr( get_option( 'maya_custom_background' ) );
if($background == 1) {
	add_theme_support( 'custom-background' );
}

/* THEME CUSTOM POST TYPES */

$contact = get_option( 'maya_custom_contact_form' );
if( $contact == 1 ){
	add_action( 'init', 'maya_contact_custom_post_type' );

	add_filter( 'manage_maya-contact_posts_columns', 'maya_set_contact_columns' );
	add_action( 'manage_maya-contact_posts_custom_column', 'maya_contact_custom_column', 10, 2 );

	add_action( 'add_meta_boxes', 'maya_contact_add_meta_box' );
	add_action( 'save_post', 'maya_save_contact_email_data' );

}

/* THEME NAV MENU */
register_nav_menus( array(
	'primary_menu' => __( 'Primary Menu', 'mayatheme' ),
	'social'  => __( 'Social Links Menu', 'mayatheme' ),
) );

/* THEME POST THUMBNAIL */
add_theme_support('post-thumbnails');

add_theme_support('html5', array('searchform', 'input') );

//remove wordpress version
function maya_remove_wordpress_version() {
	return '';
}
add_filter('the_generator', 'maya_remove_wordpress_version');


/* CONTACT CPT */
function maya_contact_custom_post_type() {
	$labels = array(
		'name' 				=> 'Messages',
		'singular_name' 	=> 'Message',
		'menu_name'			=> 'Messages',
		'name_admin_bar'	=> 'Message'
	);

	$args = array(
		'labels'			=> $labels,
		'show_ui'			=> true,
		'show_in_menu'		=> true,
		'capability_type'	=> 'post',
		'hierarchical'		=> false,
		'menu_position'		=> 26,
		'menu_icon'			=> 'dashicons-email-alt',
		'supports'			=> array( 'title', 'editor', 'author' )
	);

	register_post_type( 'maya-contact', $args );

}

function maya_set_contact_columns( $columns ) {
	$newColumns = array();
	$newColumns['cb'] 		=  '<input type="checkbox" />';
	$newColumns['title'] 	= 'Full Name';
	$newColumns['message'] 	= 'Message';
	$newColumns['email'] 	= 'Email';
	$newColumns['date'] 	= 'Date';
	return $newColumns;
}

function maya_contact_custom_column( $column, $post_id ){
	switch( $column ){
		case 'message' :
			echo get_the_excerpt();
			break;

		case 'email' :
			//email column
			$email = get_post_meta( $post_id, '_contact_email_value_key', true );
			echo '<a href="mailto:'.$email.'">'.$email.'</a>';
			break;
	}

}

/* CONTACT META BOXES */

function maya_contact_add_meta_box() {
	add_meta_box( 'contact_email', 'User Email', 'maya_contact_email_callback', 'maya-contact', 'side', 'high' );
}


function maya_contact_email_callback( $post ) {
	wp_nonce_field( 'maya_save_contact_email_data', 'maya_contact_email_meta_box_nonce' );

	$value = get_post_meta( $post->ID, '_contact_email_value_key', true );

	echo '<label for="maya_contact_email_field">User Email Address: </label>';
	echo '<input type="email" id="maya_contact_email_field" name="maya_contact_email_field" value="' . esc_attr( $value ) . '" size="25" />';
}

function maya_save_contact_email_data( $post_id ) {

	if( ! isset( $_POST['maya_contact_email_meta_box_nonce'] ) ){ return; }
	if( ! wp_verify_nonce( $_POST['maya_contact_email_meta_box_nonce'], 'maya_save_contact_email_data') ) { return; }
	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){ return; }
	if( ! current_user_can( 'edit_post', $post_id ) ) { return; }
	if( ! isset( $_POST['maya_contact_email_field'] ) ) { return; }

	$my_data = sanitize_text_field( $_POST['maya_contact_email_field'] );
	update_post_meta( $post_id, '_contact_email_value_key', $my_data );

}


/* THEME CUSTON PAGINATION */
function maya_theme_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link('<i class="fa fa-chevron-left"></i>') );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link('<i class="fa fa-chevron-right"></i>') );

	echo '</ul></div>' . "\n";

}



/* THEME SIDEBAR FUNCTIONS */
function maya_theme_widgets_init() {
	register_sidebar(
		array(
			'name'			=> 'Standard Sidebar 1',
			'id'			=> 'sidebar-1',
			'class'			=> 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	 register_sidebar(
		array(
			'name'			=> 'Standard Sidebar 2 ',
			'id'			=> 'sidebar-2',
			'class'			=> 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);


	register_sidebar(
		array(
			'name'			=> 'Footer Widget 1',
			'id'			=> 'footer-1',
			'class'			=> 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'			=> 'Footer Widget 2',
			'id'			=> 'footer-2',
			'class'			=> 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'			=> 'Footer Widget 3',
			'id'			=> 'footer-3',
			'class'			=> 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

	register_sidebar(
		array(
			'name'			=> 'Footer Widget 4',
			'id'			=> 'footer-4',
			'class'			=> 'custom',
			'description' 	=> 'Standard Sidebar',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		)
	);

}

add_action('widgets_init', 'maya_theme_widgets_init');


/* THEME CUSTOM FUNCTIONS */
function maya_theme_get_categories() {
	$cats = get_the_category();
	$output = '';
	if(!empty($cats)) {
		$i = 1;
		foreach($cats as $cat) {
			$output .= ($i == 1) ? ' ' : ', ';
			$output .= '<a href="'.get_category_link($cat->term_id).'">'.$cat->name.'</a>';
			$i++;
		}
	}
	return $output;
}

function maya_theme_get_tags() {
	$tags = get_the_tags();
	$output = '';
	if(!empty($tags)) {
		$i = 1;
		foreach($tags as $tag) {
			$output .= ($i == 1) ? ' ' : ', ';
			$output .= '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
			$i++;
		}
	}
	return $output;
}

function maya_theme_get_media($post, $format= array()) {
	$content = do_shortcode(apply_filters('the_content', $post->post_content) );
	$embded = get_media_embedded_in_content($content, $format );
	return $embded[0];
}

function maya_theme_get_attachment( $num = 1 ) {
	$output = '';
	if( has_post_thumbnail() && $num == 1 ) {
		$output = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
	} else {
		$attachments = get_posts( array(
			'post_type' => 'attachment',
			'posts_per_page' => $num,
			'post_parent' => get_the_ID()
		) );
		if( $attachments && $num == 1 ) {
			foreach ( $attachments as $attachment ) {
				$output = wp_get_attachment_url( $attachment->ID );
			}
		} elseif ( $attachments && $num > 1 ){
			$output = $attachments;
		}
		wp_reset_postdata();
	}

	return $output;
}

function maya_theme_grab_url() {
	if( ! preg_match( '/<a\s[^>]*?href=[\'"](.+?)[\'"]/i', get_the_content(), $links ) ){
		return false;
	}
	return esc_url_raw( $links[1] );
}

function maya_theme_get_copyright()  {
	echo '&copy; 2017 All Rights Reserved | <a href="#" target="_blank">Maya Theme</a>';
}
