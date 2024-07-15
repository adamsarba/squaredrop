<?php
 /**
 * The template for displaying the search form
 *
 * @package Really Simple
 */

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
    <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'really-simple' ); ?></span>
		<input type="search" <?php /* echo esc_attr_x( 'Search for:', 'placeholder', 'really-simple' ); */?> value="<?php echo esc_attr( get_search_query() ); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit">
    <?php echo esc_html_x( 'Search', 'submit button', 'really-simple' ); 
		/*
			<span class="screen-reader-text"><?php esc_html_e( 'Search', 'really-simple' ); ?></span>
			<img src="<?php echo get_template_directory_uri() . '/icns/search.svg'; ?>" /> 
		*/ ?>
  </button>
</form>