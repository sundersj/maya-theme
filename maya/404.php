<?php
/*
	404 page template
	@package mayatheme
*/
get_header();
?>
<div id="primary">
	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<main>
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title">Oops! That page can&rsquo;t be found.</h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p>It looks like nothing was found at this location. Maybe try a search.</p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>
