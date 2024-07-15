<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Really Simple
 */

get_header(); ?>

      <?php 
        $s = get_search_query();
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $posts_per_page = get_option('posts_per_page');

        // Query for Products
        $product_args = array(
          'post_type' => 'product',
          's' => $s,
          'posts_per_page' => $posts_per_page,
          'paged' => $paged,
        );
        $product_query = new WP_Query($product_args);

        // Query for Pages and Posts
        $post_args = array(
          'post_type' => array('post', 'page'),
          's' => $s,
          'posts_per_page' => $posts_per_page,
          'paged' => $paged,
        );
        $post_query = new WP_Query($post_args);
      ?>

      <?php if ( $product_query->have_posts() || $post_query->have_posts() ) : ?>

      <header class="page-header">
        <h1 class="page-title text-left">
          <?php _e('Search results', 'really-simple'); ?>
        </h1>
      </header><!-- .page-header -->

      <?php get_search_form(); ?>

      <?php if ($product_query->have_posts()) : ?>
      <!-- Products -->
      <h2 class="search-results-title">
        <?php esc_html_e('Products', 'really-simple'); ?>
      </h2>
      <section id="search-products" class="search-items items-products">
        <?php 
          while ($product_query->have_posts()) : $product_query->the_post();
            get_template_part('template-parts/content', 'product');
          endwhile;
        ?>
      </section>
      <script>
        // Change product excerpt length
        document.querySelectorAll("#search-products .post-card .entry-content").forEach(product => {
          let content = product.textContent.trim().split(/\s+/).slice(0, 25).join(" ");
          let link = product.querySelector("a");
          if (product.textContent.trim().split(/\s+/).length > 25) {
            content += "...";
            product.innerHTML = "<p>" + content + "</p>" + "<a href='" + link.href + "' rel='bookmark' class='more-link'><?php esc_html_e( 'See', 'really-simple' ); ?> &rarr;</a>";
          }
        });
      </script>
      <?php 
        // Pagination
        the_posts_pagination(array(
          'prev_text' => '&larr;',
          'next_text' => '&rarr;',
          'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'really-simple' ) . ' </span>',
          'total' => $product_query->max_num_pages,
          'current' => $paged,
        ));
        
      endif; // end of Products

      wp_reset_postdata();
      ?>

      <?php if ($post_query->have_posts()) : ?>
      <!-- Pages and Posts -->
      <h2 class="search-results-title">
        <?php esc_html_e('Pages and Posts', 'really-simple'); ?>
      </h2>
      <section id="search-pages" class="search-items items-pages">
      <?php
        while ($post_query->have_posts()) : $post_query->the_post();
          get_template_part('template-parts/content', 'content');
        endwhile;
      ?>
      </section>
      <?php 
        // Pagination
        the_posts_pagination(array(
          'prev_text' => '&larr;',
          'next_text' => '&rarr;',
          'before_page_number' => '<span class="screen-reader-text">' . __( 'Page', 'really-simple' ) . ' </span>',
          'total' => $post_query->max_num_pages,
          'current' => $paged,
        ));
        
      endif; // end of Pages and Posts
      
      wp_reset_postdata();

      else :
        // No content search
        get_template_part( 'template-parts/content', 'search' );

      endif;
      ?>
    
    </main><!-- #main -->

  </div><!-- #primary -->

<?php
get_footer();
