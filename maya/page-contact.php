<?php
/*
	Template Name: Contact
	@package mayatheme
*/
get_header();
?>
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
						<form action="#" method="post" id="maya-contact-form" class="maya-form" url="<?php echo admin_url('admin-ajax.php'); ?>">
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
								<p class="message">Message field is required</p>
							</div>
							<div class="form-submit-box">
								<button type="button" id="btn-contact" class="btn btn-block maya-btn-submit btn-default">Submit</button>
								<span class="gear"><i class="fa fa-cog"></i><span>
							</div>
							<div class="alert-message">
								<p class="c-failure">Something went wrong. please .referesh the page and try again. Thank you!</p>
								<p class="c-success"> Message Send successfully. Thank you!</p>
							</div>
						</form>
					</div>
				</div>
			</div>
		</main>
	</div>
</div>
<?php get_footer(); ?>
