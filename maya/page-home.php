<?php
/*
	Template Name: Home
	@package mayatheme
*/
get_header();
?>
<section id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2 class="section-heading">We've got what you need!</h2>
                <hr class="light">
                <p class="text-faded">Pellentesque in ipsum id orci porta dapibus. Donec sollicitudin molestie malesuada. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Proin eget tortor risus. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat.</p>
            </div>
        </div>
    </div>
</section>

<section id="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">At Your Service</h2>
                <hr class="primary">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-diamond  sr-icons"></i>
                    <h3>Sturdy Templates</h3>
                    <p class="text-muted">Our templates are updated regularly so they don't break.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-paper-plane  sr-icons"></i>
                    <h3>Ready to Ship</h3>
                    <p class="text-muted">You can use this theme as is, or you can make changes!</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-newspaper-o sr-icons"></i>
                    <h3>Up to Date</h3>
                    <p class="text-muted">We update dependencies to keep things fresh.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center">
                <div class="service-box">
                    <i class="fa fa-4x fa-heart sr-icons"></i>
                    <h3>Made with Love</h3>
                    <p class="text-muted">You have to make your websites with love these days!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="primary">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<main>
					<div class="blog-row">
						<?php
							 $args = array(
									'type'				=> 'post',
									'post_status'		=> 'publish',
									'posts_per_page'	=> 3,
									'orderby' 			=> 'date',
									 'order'			=> 'DESC'
									);
							$lastBlog = new WP_Query($args);
							if($lastBlog->have_posts()) {
								while($lastBlog->have_posts() ) { $lastBlog->the_post(); ?>
									<div class="col-sm-4">
										<div class="bl-post">
											<div class="entry-header">
												<?php the_title('<h2><a href="'.get_the_permalink().'">', '</a></h2>'); ?>
											</div>
											<div class="bp-meta"><i class="fa fa-clock-o"></i><?php echo get_the_date(); ?></div>
											<div class="bp-excerpt"><?php the_excerpt(); ?></div>
											<div class="view-post">
												<a href="<?php echo get_permalink(); ?>" class="btn btn-default btn-sm"><i class="fa  fa-book"></i> Read More</a>
											</div>
										</div>
									</div>
									<?php
								}
							}

							wp_reset_postdata();
						?>
					</div>
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
