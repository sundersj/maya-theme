<div class='wrap'>
	<h1>Theme Options</h1>
	<?php
		settings_errors();
	?>
	<form id="submitForm" method="post" action="options.php" class="maya-postformat-form">
		<?php settings_fields( 'theme-options-group' ); ?>
		<?php do_settings_sections( 'maya_theme_options' ); ?>
		<?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
	</form>
</div>
