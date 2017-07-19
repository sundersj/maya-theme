<?php
/*
	Standard format for mayatheme
	@package mayatheme

*/
get_header();
?>
<div id="primary">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<main>
					<?php if(have_posts()) {
							while(have_posts() ) {
								the_post();
								get_template_part('template-parts/content', get_post_format() );
							 }
						}
						//pagination
						maya_theme_numeric_posts_nav();
					?>
				</main>
			</div>
			<div class="col-sm-4">
				<aside>
					<?php  get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
