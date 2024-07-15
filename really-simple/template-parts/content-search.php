<?php
/**
 * Template part for displaying search content in search.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Really Simple
 * @subpackage template-parts
 */

?>

<header class="page-header">
  <h1 class="page-title text-left">
    <?php _e( 'No results were found.<br />Try a new search.', 'really-simple' ); ?>
  </h1>
</header>

<?php 
  get_search_form();

  // the_widget( 'WP_Widget_Recent_Posts', [
  //   'title'   => esc_html__( 'Latest Posts', 'really-simple' ), 
  //   'number'  => 10
  // ]); 
?>
  