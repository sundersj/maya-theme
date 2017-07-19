<?php
/*
	page content
	@package mayatheme
*/
?>
<article <?php post_class('maya-page-single'); ?> id="post-<?php the_ID(); ?>">
	<div class="row">
		<div class="col-xs-12 col-sm-10 col-md-8 col-lg-8 col-sm-offset-1 col-md-offset-2 col-lg-offset-2 ">
			<header class="entry-header text-center">
				<?php the_title('<h1 class="entry-title">', '</h1>' ); ?>
			</header>
			<div class="entry-content clearfix">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</article>
