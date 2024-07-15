<?php
/**
 * The blog template for displaying all posts
 *
 * @package Really Simple
 */

get_header(); ?>

      <header class="page-header">
        <h1 class="page-title">
          <?php echo get_the_title( get_option('page_for_posts', true) ); ?>
        </h1>
      </header><!-- .page-header -->

      <?php if ( have_posts() ) : ?>
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
        // Pagination// Pagination
        the_posts_pagination(array(
          'prev_text'          => '&larr;',
          'next_text'          => '&rarr;',
          'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'really-simple' ) . ' </span>',
        ));

      else:

        // No content
        get_template_part( 'template-parts/content', 'none' );
      
      endif;
      ?>
    
      <aside class="widget-area">
        <?php get_sidebar(); ?>
      </aside><!-- .widget-area -->
    
    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer(); 