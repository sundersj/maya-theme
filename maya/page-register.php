<?php
/*
	Template Name: Register
	@package mayatheme
*/
get_header();
?>
<div class="tml tml-register" id="theme-my-login<?php $template->the_instance(); ?>">
	<?php $template->the_action_template_message( 'register' ); ?>
	<?php $template->the_errors(); ?>
	<form name="registerform" id="registerform<?php $template->the_instance(); ?>" action="<?php $template->the_action_url( 'register', 'login_post' ); ?>" method="post">
		<?php if ( 'email' != $theme_my_login->get_option( 'login_type' ) ) : ?>
		<p class="tml-user-login-wrap">
			<label for="user_login<?php $template->the_instance(); ?>"><?php _e( 'Username', 'theme-my-login' ); ?></label>
			<input type="text" name="user_login" id="user_login<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_login' ); ?>" size="20" />
		</p>
		<?php endif; ?>

		<p class="tml-user-email-wrap">
			<label for="user_email<?php $template->the_instance(); ?>"><?php _e( 'E-mail', 'theme-my-login' ); ?></label>
			<input type="text" name="user_email" id="user_email<?php $template->the_instance(); ?>" class="input" value="<?php $template->the_posted_value( 'user_email' ); ?>" size="20" />
		</p>

		<?php do_action( 'register_form' ); ?>

		<p class="tml-registration-confirmation" id="reg_passmail<?php $template->the_instance(); ?>"><?php echo apply_filters( 'tml_register_passmail_template_message', __( 'Registration confirmation will be e-mailed to you.', 'theme-my-login' ) ); ?></p>

		<p class="tml-submit-wrap">
			<input type="submit" name="wp-submit" id="wp-submit<?php $template->the_instance(); ?>" value="<?php esc_attr_e( 'Register', 'theme-my-login' ); ?>" />
			<input type="hidden" name="redirect_to" value="<?php $template->the_redirect_url( 'register' ); ?>" />
			<input type="hidden" name="instance" value="<?php $template->the_instance(); ?>" />
			<input type="hidden" name="action" value="register" />
		</p>
	</form>
	<?php $template->the_action_links( array( 'register' => false ) ); ?>
</div>


<!--
<div id="primary">
	<div class="container">
		<main>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<?php while(have_posts()){ the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="post-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="form-outer-box">
						<form action="#" method="post" id="maya-register-form" class="maya-form" url="<?php echo admin_url('admin-ajax.php'); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="firstname" placeholder="First Name*" required>
								<p class="firstname">First Name field is required</p>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="lastname" placeholder="Last Name*" required>
								<p class="lastname">Last Name field is required</p>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="username" placeholder="User Name*" required>
								<p class="username">Username field is required</p>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Email*" required>
								<p class="email">Email field is required</p>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="pass1"  maxlength="9" placeholder="Password*(5-9)" required>
								<p class="pass1">Password field is required</p>
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="pass2" maxlength="9" placeholder="Confirm Password*(5-9)" required>
								<p class="pass2">Confirm Password field is required</p>
							</div>
							<div class="form-submit-box">
								<button type="button" id="btn-register" class="btn btn-block maya-btn-submit btn-default">Submit</button>
								<span class="gear"><i class="fa fa-cog"></i><span>
							</div>
							<div class="alert-message">
								<p class="c-failure"></p>
								<p class="c-success"> Registration process successfully. Thank you!</p>
								<input type="hidden" id="homeUrl" homeUrl="<?php echo site_url(); ?>"/>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
-->
<?php get_footer(); ?>
