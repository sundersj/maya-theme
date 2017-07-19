<?php
/*
	single  template
	@package mayatheme

*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
	<div class="entry-header">
		<?php the_title('<h2>', '</h2>'); ?>
	</div>
	<?php
	if(has_post_thumbnail()) { ?>
		<div class="standard-feature">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>
	<div class="entry-footer">
		<div class="pull-left">
			<span class="post-cats"><?php echo maya_theme_get_categories(); ?></span>
			<?php
				$tags = maya_theme_get_tags();
				if($tags) { ?>
				<span> | <i class="fa fa-tags"></i> <?php echo $tags; ?></span>
			<?php } ?>
		</div>
		<div class="pull-right">
			<span class="post-comnt-count">
				<i class=" fa fa-comments-o"></i>
				<?php echo get_comments_number(); ?>
			</span>
		</div>
	</div>
	<div class="share-box">
		<h4><?php echo __('Share This Story, Choose Your Platform!', 'mayatheme'); ?></h4>
		<ul class="social-networks">
			<li class="facebook">
				<a href="http://www.facebook.com/sharer.php?s=100&p&#91;url&#93;=<?php the_permalink(); ?>&p&#91;title&#93;=<?php the_title(); ?>" data-toggle="tooltip" title="facebook"	target="_blank">
					<i class="fa fa-facebook aria-hidden="true""></i>
				</a>
			</li>
			<li class="twitter">
				<a href="http://twitter.com/home?status=<?php the_title(); ?> <?php the_permalink(); ?>" title="twitter" data-toggle="tooltip" target="_blank">
					<i class="fa fa-twitter aria-hidden="true""></i>
				</a>
			</li>
			<li class="linkedin">
				<a href="http://linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="linkedin" data-toggle="tooltip" target="_blank">
					<i class="fa fa-linkedin  aria-hidden="true""></i>
				</a>
			</li>
			<li class="reddit">
				<a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" title="reddit" data-toggle="tooltip" target="_blank">
					<i class="fa fa-reddit aria-hidden="true""></i>
				</a>
			</li>
			<li class="google-plus">
				<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" title="google-plus" onclick="javascript:window.open(this.href,
'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" data-toggle="tooltip" target="_blank">
					<i class="fa fa-google-plus aria-hidden="true""></i>
				</a>
			</li>
			<li class="pinterest">
				<?php $full_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full'); ?>
				<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;description=<?php echo urlencode($post->post_title); ?>&amp;media=<?php echo urlencode($full_image[0]); ?>" title="pinterest" data-toggle="tooltip" target="_blank">
					<i class="fa fa-pinterest aria-hidden="true""></i>
				</a>
			</li>
		</ul>
	</div>
</article>
