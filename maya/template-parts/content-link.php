<?php
/*
	@package mayatheme
	link post format
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('link-post'); ?>>
	<div class="entry-header text-center">
		<?php $link = maya_theme_grab_url(); ?>
		<h2>
			<a href="<?php echo $link; ?>" target="_blank">
				<span><?php the_title(); ?></span>
				<i class="fa fa-chain"></i>
			</a>
		</h2>
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
</article>
