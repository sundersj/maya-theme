<div class='wrap'>
	<h1> General</h1>
	<?php
		settings_errors();

		$picture = esc_attr( get_option( 'profile_picture' ) );
		$firstName = esc_attr( get_option( 'first_name' ) );
		$lastName = esc_attr( get_option( 'last_name' ) );
		$fullName = $firstName . ' ' . $lastName;
		$description = esc_attr( get_option( 'user_description' ) );

		$twitter_icon = esc_attr( get_option( 'twitter_handler' ) );
		$facebook_icon = esc_attr( get_option( 'facebook_handler' ) );
		$gplus_icon = esc_attr( get_option( 'gplus_handler' ) );

	?>
	<div class="maya-theme-profile">
		<div class="maya_container">
			<div class="image_container">
				<div class="profile-image" style="background-image: url(<?php echo $picture; ?>);"></div>
			</div>
			<h2><?php echo $fullName; ?></h2>
			<h3><?php echo $description; ?></h3>
			<div class="social-icon">
				<?php if($twitter_icon) { ?>
					<i class="fa fa-twitter"></i>
				<?php }
				if($facebook_icon) { ?>
					<i class="fa fa-facebook"></i>
				<?php }
				if($gplus_icon) { ?>
					<i class="fa fa-google-plus"></i>
				<?php } ?>
			</div>
		</div>
	</div>

	<form id="submitForm" method="post" action="options.php" class="maya-general-form">
		<?php settings_fields( 'maya-settings-group' ); ?>
		<?php do_settings_sections( 'maya_theme' ); ?>
		<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
	</form>

</div>
