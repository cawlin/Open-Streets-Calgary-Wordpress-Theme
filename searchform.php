<?php
/**
 * The template for displaying search forms in Open Streets Calgary
 *
 * @package Open Streets Calgary
 */
?>
	<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
		<label for="s" class="screen-reader-text"><?php _ex( 'Search', 'assistive text', 'open_streets_calgary' ); ?></label>
		<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'open_streets_calgary' ); ?>" />
		<input type="submit" class="submit" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'open_streets_calgary' ); ?>" />
	</form>
