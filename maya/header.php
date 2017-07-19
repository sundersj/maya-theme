<?php
/*
	This is a template for header
	@package mayatheme

*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php bloginfo( 'name' ); wp_title(''); ?></title>
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<?php
		wp_head();
		$css = get_option('maya_custom_css');
		if(!empty($css)) { ?>
		 <style><?php echo $css; ?></style>
	<?php } ?>
</head>
<body <?php body_class();  ?>>
	<nav id="mainNav" class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
				<h2<a class="navbar-brand maya-logo" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
               		<i class="fa fa-list"></i>
                </button>
			</div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php
					wp_nav_menu(
						array(
							'theme_location'	=> 'primary_menu',
							'container' 		=> false,
							'menu_class' 		=> 'nav navbar-nav navbar-right',
							'walker' => 		new Walker_Nav_Primary()
							)
					);  ?>
            </div>
        </div>
    </nav>
	<header style="background-image: url(<?php header_image(); ?>); width:<?php echo get_custom_header()->width; ?>%; height:<?php echo get_custom_header()->height; ?>px;">
		<div class="header-container">
			<div class="container">
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="header-content">
							<h1>Your Favorite Source of Free Themes</h1>
							<hr>
							<p>Quisque velit nisi, pretium ut lacinia in, elementum id enim. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>
						</div>
		            </div>
				</div>
			</div>
		</div>
	</header>
