<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Really Simple
 * @subpackage template-parts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="entry-body">
    <?php if ( !is_product() && function_exists('get_field') && empty(get_field('hide_title')) ) : ?>
    <header class="entry-header">
      <?php echo the_title( '<h1 class="entry-title">', '</h1>' ); ?>
      
      <?php 
        if ( is_product_category() && function_exists('get_field') && !empty(get_field('rich_description')) ) :
          global $wp_query;
          $cat = $wp_query->get_queried_object();
          $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
          $cat_thumbnail = wp_get_attachment_url( $thumbnail_id );
      ?>
        <div class="entry-description">
          <?php if ( $cat_thumbnail ) : ?>
          <div class="cat-thumbnail">
            <?php echo '<img src="' . $cat_thumbnail . '" alt="' . $cat->name . '" loading="lazy" />'; ?>
          </div>
          <?php endif; ?>
          <div class="cat-taxonomy" aria-expanded="false">
            <div class="cat-taxonomy-content">
              <?php echo get_field('rich_description') ?>
            </div>
          </div>
        </div>
        <script>
          const catTaxonomy   = document.querySelector('.cat-taxonomy')
          const showMore      = catTaxonomy.querySelector('.show-more'),
                hiddenContent = catTaxonomy.querySelector('.more-wrapper');

          if (showMore) showMore.addEventListener('click', function() {
            hiddenContent.classList.toggle('expanded');
            if (hiddenContent.classList.contains('expanded')) {
              showMore.textContent = "↑"
              catTaxonomy.setAttribute('aria-expanded', 'true')
            } else {
              showMore.textContent = "+"
              catTaxonomy.setAttribute('aria-expanded', 'false')
            }
          });
        </script>
      <?php 
        endif;
      
        /* if ( has_post_thumbnail() ): ?>
          <div class="entry-media" aria-hidden="true" tabindex="-1">
          <?php the_post_thumbnail( 'full', [ 'class' => 'really-page-thumb' ] ); ?>
          </div><!-- .entry-media -->
          <?php endif; ?> 
        */
      ?>
    </header><!-- .entry-header -->
    <?php endif; ?>

    <div class="entry-content">
      <?php 
        the_content();

        wp_link_pages(
          array(
            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'really-simple' ),
            'after'  => '</div>',
          )
        );
      ?>
    </div><!-- .entry-content -->

  </div><!-- .entry-body -->

</article><!-- #post-<?php the_ID(); ?> -->
