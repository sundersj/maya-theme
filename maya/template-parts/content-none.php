<?php
/*
	Content None Template
	@package mayatheme
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('standard-post'); ?>>
	<div class="entry-header">
		<h1 class="page-title">Nothing Found</h1>
	</div>
	<div class="entry-content">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>
			<p>Ready to publish your first post <a href="<?php echo admin_url( 'post-new.php' ); ?>">Get started here</a></p>
		<?php } elseif ( is_search() )  { ?>
			<p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
		<?php } else { ?>
			<p>It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.</p>
			<?php get_search_form(); ?>
		<?php } ?>
	</div>
</article>
