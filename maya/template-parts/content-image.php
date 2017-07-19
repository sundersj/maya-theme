<?php
/*
	@package mayatheme
	image post format
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('image-post'); ?>>
	<?php if(has_post_thumbnail()) { ?>
		<div class="standard-feature bg-img" style="background-image: url(<?php echo get_the_post_thumbnail_url() ?>)">
			<div class="entry-header">
				<a  href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
		</div>
	<?php } ?>
</article>
