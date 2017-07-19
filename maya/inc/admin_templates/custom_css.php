<div class='wrap'>
	<h1>Custom Css</h1>
	<?php
		settings_errors();
	?>
	<form  method="post" action="options.php" id="maya-custom-css-form">
		<?php settings_fields( 'theme-custom-css-group' ); ?>
		<?php do_settings_sections( 'maya_theme_custom_css' ); ?>
		<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
	</form>
</div>
