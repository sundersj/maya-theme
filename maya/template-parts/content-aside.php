<?php
/*
	@package mayatheme
	aside post format
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('aside-post'); ?>>
	<div class="row">
		<div class="col-sm-4">
			<?php
			if( maya_theme_get_attachment()) { ?>
				<div class="standard-feature bg-img" style="background-image: url(<?php echo maya_theme_get_attachment(); ?>)"></div>
			<?php } ?>
		</div>
		<div class="col-sm-8">
			<div class="entry-header">
				<?php the_title('<h2><a href="'.get_the_permalink().'">', '</a></h2>'); ?>
			</div>
			<div class="entry-content">
				<?php the_excerpt(); ?>
				<a href="<?php echo the_permalink(); ?>" class=" btn btn-xl read-more-button"><i class="fa fa-book"></i> Read More</a>
			</div>
		</div>
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
