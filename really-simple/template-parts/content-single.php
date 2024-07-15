<?php
/**
 * Template part for displaying single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Really Simple
 * @subpackage template-parts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

  <div class="entry-body">
    <?php if ( !is_product() ): ?>
      <header class="entry-header">  
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?><!-- .entry-title -->
        
        <?php /*
        echo '<time>' . esc_html( get_the_date() ) . '</time>';
        <span>
        <?php esc_html_e( 'Author: ', 'really-simple' ); ?> <?php the_author_posts_link(); ?>
        </span> */ ?>
      </header><!-- .entry-header -->
    <?php endif; ?>

    <?php if ( has_post_thumbnail() && ( function_exists('get_field') && empty(get_field('hide_thumbnail')) ) ) : ?>
      <div class="entry-media" aria-hidden="true" tabindex="-1">
        <?php the_post_thumbnail( 'full', [ 'class' => 'really-single-thumb' ] ); ?>
      </div><!-- .entry-media -->
    <?php endif; ?>

    <div class="entry-content">
      <?php
        the_content();

        wp_link_pages([
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'really-simple' ),
          'after'  => '</div>',
        ]);
      ?>
    </div><!-- .entry-content -->

    <?php /* <div class="entry-meta">

      <div class="entry-category-content">
        <span><?php esc_html_e( 'Categories:', 'really-simple' ); ?></span>
        <?php the_category( ', ' ); ?>
      </div><!-- .category-title -->
      
      <?php if( has_tag() ): ?>
        <div class="entry-tags-content">
          <?php the_tags( 'Tags: ', ', ' ); ?>
        </div>
      <?php endif; ?><!-- .tags-title -->

    </div><!-- .entry-meta --> */ ?>

  </div><!-- .entry-body -->

  <?php
    /* Enquire Form @ Product Page */ 
    if ( is_product() ) : 
      global $product;
    ?>
    <div id="entry-enquire-form" class="entry-enquire-form">
      <div class="form-wrapper">
        <img src="<?php echo wp_get_attachment_url( $product -> get_image_id() ); ?>" alt="" width="96" height="96" class="form-image" />
        <div class="form-header">
          <span class="form-title"><?php echo get_the_title(); ?></span>
          <a href="#" class="close-form" role="button" aria-label="<?php esc_html_e( 'Close Form', 'really-simple' ); ?>">
            &times;<span class="screen-reader-text"><?php esc_html_e( 'Close Form', 'really-simple' ); ?></span>
          </a>
        </div>
        <?php echo do_shortcode( '[contact-form-7 id="' . CONTACT_FORM_ENQUIRE_ID . '" html_id="enquire-form"]'  ); ?>
      </div>
    </div>
  <?php endif?>
  
</article><!-- #post-<?php the_ID(); ?> -->
