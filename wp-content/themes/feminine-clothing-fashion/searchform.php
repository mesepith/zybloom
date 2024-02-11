<?php
/**
 * Template for displaying search forms in Feminine Clothing Fashion
 *
 * @subpackage Feminine Clothing Fashion
 * @since 1.0
 * @version 0.1
 */
?>

<?php $feminine_clothing_fashion_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e('Search for:','feminine-clothing-fashion'); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder','feminine-clothing-fashion' ); ?>" value="<?php echo esc_attr(get_search_query()); ?>" name="s">
	</label>
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'feminine-clothing-fashion' ); ?></button>
</form>