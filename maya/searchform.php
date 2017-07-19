<?php
/*
	searchform template
	@package mayatheme

*/
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="search-input" placeholder="Search: type keywords, press enter..." value="<?php echo get_search_query(); ?>" name="s" />
	<input type="submit" class="search-button" value="Search">
</form>
