<?php
/*
	Search content template
	@package mayatheme
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('standard-post'); ?>>
	<?php
	if(has_post_thumbnail()) { ?>
		<div class="standard-feature">
			<?php the_post_thumbnail(); ?>
		</div>
	<?php } ?>
	<div class="entry-header">
		<?php the_title('<h2><a href="'.get_the_permalink().'">', '</a></h2>'); ?>
	</div>
	<div class="entry-content">
		<?php the_excerpt(); ?>
		<a href="<?php echo the_permalink(); ?>" class=" btn btn-xl read-more-button"><i class="fa fa-book"></i> Read More</a>
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
