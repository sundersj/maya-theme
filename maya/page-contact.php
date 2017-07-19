<?php
/*
	Template Name: Contact
	@package mayatheme
*/
get_header();
?>
<div id="primary">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<main>
					<div class="page-content">
						<?php the_content(); ?>
					</div>
					<div class="contact-box">
						<form action="#" method="post" id="maya-contact-form" url="<?php echo admin_url('admin-ajax.php'); ?>">
							<div class="form-group">
								<input type="text" class="form-control" id="fullname" placeholder="Your Name" required>
								<p class="fullname">Name field is required</p>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" placeholder="Your Email" required>
								<p class="email">Email field is required</p>
							</div>
							<div class="form-group">
								<textarea class="form-control" id="message" placeholder="Your Message" required></textarea>
								<p class="message"> Message field is required</p>
							</div>
							<div class="form-submit-box">
								<button type="button" id="btn-contact" class="btn btn-block btn-default">Submit</button>
								<span class="gear"><i class="fa fa-cog"></i><span>
							</div>
							<div class="alert-message">
								<p class="c-failure">Something went wrong. please .referesh the page and try again. Thank you!</p>
								<p class="c-success"> Message Send successfully. Thank you!</p>
							</div>
						</form>
					</div>
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
