<?php
/*
	sidebar page template
	@package mayatheme

*/
?>

<div class="search-form-container">
	<?php  get_search_form(); ?>
</div>
<div class="stnd-1">
	<?php if(is_active_sidebar('sidebar-1') ) { ?>
		<?php dynamic_sidebar('sidebar-1'); ?>
	<?php } ?>
</div>
<div class="stnd-2">
	<?php if(is_active_sidebar('sidebar-2') ) { ?>
		<?php dynamic_sidebar('sidebar-2'); ?>
	<?php } ?>

</div>
