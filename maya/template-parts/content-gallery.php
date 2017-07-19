<?php
/*
	@package mayatheme
	Gallery post format
*/
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('gallery-post'); ?>>
	<div class="entry-header">
		<?php the_title('<h2><a href="'.get_the_permalink().'">', '</a></h2>'); ?>
	</div>
	<?php
	if(has_post_thumbnail()) { ?>
		<div class="standard-feature">
			<?php if (maya_theme_get_attachment(4)) {
				$attachments = maya_theme_get_attachment(4);
				$i = 1;
			?>
			<div id="gallery-<?php the_ID(); ?>" class="carousel slde gallery-<?php the_ID(); ?>" data-ride="carousel">
				<div class="carousel-inner" role="listbox">
					<?php foreach($attachments as $attach) {
						$class = ($i == 1 ) ? 'active': '';
					?>
						<div class="bg-img item <?php echo $class; ?>" style="background-image: url(<?php echo $attach->guid; ?>)"></div>
					<?php $i++; } ?>
				</div>
				<a class="left carousel-control" href="#gallery-<?php the_ID(); ?>" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
			  	<a class="right carousel-control" href="#gallery-<?php the_ID(); ?>" data-slide="next"><i class="fa fa-chevron-right"></i></a>
			</div>
		<?php } ?>
		</div>
	<?php } ?>
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
