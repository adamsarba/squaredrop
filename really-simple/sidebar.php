<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Really Simple
 */

  if ( is_active_sidebar( 'really-simple-sidebar' ) ) {
    dynamic_sidebar( 'really-simple-sidebar' );
  }
