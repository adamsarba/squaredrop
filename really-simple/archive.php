<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Really Simple
 */

get_header(); ?>

      <?php if ( have_posts() ) : ?>

        <header class="page-header">
          <?php
            the_archive_title( '<h1 class="page-title">', '</h1>' );
            the_archive_description( '<div class="archive-description">', '</div>' );
          ?>
        </header><!-- .page-header -->

        <div class="posts-wrapper">
        <?php
          // Start the Loop
          while ( have_posts() ) : the_post();
          
            // Content
            get_template_part( 'template-parts/content' );

          endwhile; 
        ?>
        </div><!-- .posts-wrapper -->

      <?php
        // Pagination
        the_posts_pagination(array(
          'prev_text' => '&larr;',
          'next_text' => '&rarr;',
          'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'really-simple' ) . ' </span>'
        ));

      else:

        // No content
        get_template_part( 'template-parts/content', 'none' );

      endif;  
      ?>

      <aside class="widget-area">
        <?php get_sidebar(); ?>
        
        <?php if ( is_archive() ) : ?>
          <a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ) ?>" class="back-to-blog" rel="nofollow">
            &larr; <?php esc_html_e('Back to blog', 'really-simple'); ?>
          </a>
        <?php endif; ?>
      </aside><!-- .widget-area -->
    
    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer();
