<?php
/**
 * The template functions
 * 
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * 
 * @package Really Simple
 */

/**
 * Execution of Skip link
**/
function really_simple_skip_link() {
  $href = is_front_page() ? '#idea' : '#main';
  echo '<a class="screen-reader-text skip-link" href="' . $href . '">' . esc_html__( 'Skip to content', 'really-simple' ) . '</a>';
} add_action( 'wp_body_open', 'really_simple_skip_link', 5 );

/**
 * Register the initial theme setup
**/
function really_simple_support() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Really Simple, use a find and replace
   * to change 'really-simple' to the name of your theme in all the template files.
   */
  load_theme_textdomain( 'really-simple', get_template_directory() . '/languages' );
  
  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /**
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );
  // add_image_size( 'really-simple-thumb', 370, 247, [ 'center', 'top' ] );

  if ( !isset( $content_width ) ) {
    $content_width = 600;
  }

  // Add default posts and comments RSS feed links to head.
  // add_theme_support( 'automatic-feed-links' );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 
    'html5', 
      [
        'comment-list', 
        'comment-form', 
        'search-form', 
        'gallery', 
        'caption', 
        'style', 
        'script'
      ]
  );

  /**
   * Add support for core custom logo.
   *
   * @link https://codex.wordpress.org/Theme_Logo
   */
  add_theme_support( 
    'custom-logo', [
    'width'       => 180,
    'height'      => 50,
    'flex-width'  => true,
    'flex-height' => true,
  ]);

} add_action( 'after_setup_theme', 'really_simple_support' );

/**
 * Register the navigation menus
**/
function really_simple_nav_menus() {
  register_nav_menus([
    'really-simple-primary-menu' => esc_html__( 'Primary Menu', 'really-simple' ),
    'really-simple-secondary-menu' => esc_html__( 'Secondary Menu', 'really-simple' ),
  ]);
} add_action( 'init', 'really_simple_nav_menus' );

/**
 * Register the theme assets
**/
function really_simple_style() {
  // Theme's main stylesheet
  wp_enqueue_style( 'really-simple-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ), 'all' );
  
  if ( is_shop() || is_product_category() || is_product_tag() || is_product() ) {
    wp_enqueue_style( 'really-simple-woocommerce', get_template_directory_uri() . "/woocommerce.css", array(), wp_get_theme()->get( 'Version' ), 'all' );
  }
  
  if ( is_front_page() ) {
    wp_enqueue_style( 'really-simple-front-page', get_template_directory_uri() . "/front-page.css", array(), wp_get_theme()->get( 'Version' ), 'all' );
  } elseif ( is_shop() || is_product_category() || is_product_tag() ) {
    wp_enqueue_style( 'really-simple-category', get_template_directory_uri() . "/category.css", array(), wp_get_theme()->get( 'Version' ), 'all' );
  } elseif ( is_product() ) {
    wp_enqueue_style( 'really-simple-product', get_template_directory_uri() . "/product.css", array(), wp_get_theme()->get( 'Version' ), 'all' );
  }

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { 
    wp_enqueue_script( 'comment-reply' ); 
  }
} add_action( 'wp_enqueue_scripts', 'really_simple_style', 20 );

function really_simple_home() {
  // Global scripts
  wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array(), false, array( 'in_footer' => true, 'strategy'  => 'defer', ) );

  // Homepage scripts
  if ( is_front_page() && !is_home() ) {
    wp_enqueue_script( 'front-page-script', get_template_directory_uri() . '/js/front-page.js', array(), false, array( 'in_footer' => true, 'strategy'  => 'defer', ) );
  }

  // a11y scripts
  wp_enqueue_script( 'a11y-script', get_template_directory_uri() . '/js/a11y.js', array(), false, array( 'in_footer' => true, 'strategy'  => 'defer', ) );

  // a11y localization strings
  $a11y_local = array(
    'TITLE' => __('Accessibility tools', 'really-simple'),
    'GRAYSCALE' => __('Grayscale', 'really-simple'),
    'NEGATIVE_CONTRAST' => __('Negative contrast', 'really-simple'),
    'LINKS_UNDERLINE' => __('Links underline', 'really-simple'),
    'READABLE_FONT' => __('Readable font', 'really-simple'),
    'RESET' => __('Reset', 'really-simple'),
    'TOGGLE' => __('Toggle', 'really-simple'),
  );
  wp_localize_script('a11y-script', 'a11yLocal', $a11y_local);

} add_action( 'wp_enqueue_scripts', 'really_simple_home' );

/**
 * Register the theme widgets
**/
function register_widget_areas() {
  register_sidebar([
    'name'          => esc_html__( 'Sidebar', 'really-simple' ),
    'id'            => 'really-simple-sidebar',
    'description'   => esc_html__( 'Add widgets to the posts sidebar.', 'really-simple' ),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>'
  ]);

  register_sidebar([
    'name'          => esc_html__( 'Footer', 'really-simple' ),
    'id'            => 'really-simple-footer',
    'description'   => esc_html__( 'Add widgets to the theme footer.', 'really-simple' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ]);
} add_action( 'widgets_init', 'register_widget_areas' );

/**
 * Filter archive title
**/
function really_simple_category_title( $title ) {
  // Returns only the category name on the category page
  if ( is_category() ) { 
    $title = single_cat_title( '', false ); 
  } return $title;
} add_filter( 'get_the_archive_title', 'really_simple_category_title' );

/**
 * Filter excerpt length
**/
function really_simple_excerpt_length( $length ) {
  // Return up to X words for any abstract
  return 25;
} add_filter( 'excerpt_length', 'really_simple_excerpt_length' );

/**
 * Filter excerpt more
**/
function really_simple_excerpt_more( $more ) {
  // Any abstract will have a sequence ...
  return '...';
} add_filter( 'excerpt_more', 'really_simple_excerpt_more' );

/**
 * Search results
**/
function modify_search_queries($query) {
  if ( !is_admin() && $query->is_search() && $query->is_main_query() ) {
    $query->set('post_type', array('post', 'page', 'product'));
    
    // Include product tags and categories in search
    add_filter('posts_join', 'custom_search_join');
    add_filter('posts_where', 'custom_search_where');
    add_filter('posts_distinct', 'custom_search_distinct');
  }
  return $query;
} add_action('pre_get_posts', 'modify_search_queries');

function custom_search_join($join) {
  global $wpdb;
  if (is_search()) {
    $join .= " LEFT JOIN {$wpdb->term_relationships} tr ON {$wpdb->posts}.ID = tr.object_id";
    $join .= " LEFT JOIN {$wpdb->term_taxonomy} tt ON tr.term_taxonomy_id = tt.term_taxonomy_id";
    $join .= " LEFT JOIN {$wpdb->terms} t ON tt.term_id = t.term_id";
  }
  return $join;
}

function custom_search_where($where) {
  global $wpdb;
  if (is_search()) {
    $where = preg_replace(
      "/\(\s*{$wpdb->posts}.post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
      "({$wpdb->posts}.post_title LIKE $1) OR (t.name LIKE $1)",
      $where
    );
  }
  return $where;
}

function custom_search_distinct($where) {
  if (is_search()) {
    return "DISTINCT";
  }
  return $where;
}

/**
 * WooCommerce customization
**/
function really_simple_woocommerce_support() {
  // Add support for WooCommerce
  // add_theme_support( 'woocommerce', array(
  //   // 'thumbnail_image_width' => 300,
  //   // 'single_image_width'    => 800,

  //   'product_grid'          => array(
  //     'default_rows'    => 6,
  //     'min_rows'        => 2,
  //     'max_rows'        => 8,
  //     'default_columns' => 3,
  //     'min_columns'     => 3,
  //     'max_columns'     => 6,
  //   ),
  // ));

  // Override WooCommerce gallery thumbnail image size
  add_filter( 'woocommerce_get_image_size_gallery_thumbnail', function() {
    return array(
      'width'  => 180,
      'height' => 180,
      'crop'   => 1,
    );
  });
} add_action( 'after_setup_theme', 'really_simple_woocommerce_support' );

// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
// add_action( 'woocommerce_before_main_content', function() { 
//   echo '';
// }, 10 );

// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
// add_action( 'woocommerce_after_main_content', function() {
//   echo '</div><!-- #primary -->';
// }, 10 );

// Add category name to product page body class
function woocommerce_cat_names( $classes ) {
  if ( is_product() ) {
  global $post;
  $terms = get_the_terms( $post -> ID, 'product_cat' );
    foreach ($terms as $term) {
      $classes[] = $term -> slug;
    }
  }
  return $classes;
} add_filter( 'body_class', 'woocommerce_cat_names' );

// Shop Page
remove_action('woocommerce_before_shop_loop', 'woocommerce_sidebar', 10);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

function shop_footer() {
  echo '<div class="shop-footer">';
  woocommerce_result_count();
  woocommerce_pagination();
  echo '</div>';
} add_action('woocommerce_after_shop_loop', 'shop_footer');

function product_reservation_indicator() {
  global $product; $product_id = $product -> get_id();

  if ( function_exists('get_field') && !empty( get_field('reservation', $product_id) ) ) {
    printf( '<span class="reservation"><span class="screen-reader-text">%s</span>', esc_html__( 'Product reserved', 'really-simple' ) );
  }
} add_action( 'woocommerce_after_shop_loop_item_title', 'product_reservation_indicator', 15);

// Product Page 
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 1);

function custom_product_subtitle() {
  if ( function_exists('get_field') ) { 
    // Product Subtitle
    if ( !empty(get_field('subtitle')) ) :
      printf( '<div class="subtitle">%s</div>', get_field('subtitle') );
    endif;
  }

} add_action('woocommerce_single_product_summary', 'custom_product_subtitle', 2);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20);

function custom_product_details() {
  if ( function_exists('get_field') ) { 
    // Product Details
    if ( !empty(get_field('origin')) || !empty(get_field('material')) || !empty(get_field('dimensions')) ) : echo '<div class="details">'; endif;

    if ( !empty(get_field('origin')) ) :
      printf('<span class="origin"><span>%s:</span> %s</span>', esc_html__( 'Origin', 'really-simple' ), get_field('origin') );
    endif;

    if ( !empty(get_field('material')) ) :
      printf('<span class="material"><span>%s:</span> %s</span>', esc_html__( 'Material', 'really-simple' ), get_field('material') );
    endif;

    if ( !empty(get_field('dimensions')) ) :
      $dimensions_lang = esc_html__( 'Dimensions', 'really-simple' );
      $dimensions = get_field('dimensions');
      $dimensions_modified = str_replace(array(' x ', 'X'), '×', $dimensions);
      printf('<span class="dimensions"><span>%s:</span> %s</span>', $dimensions_lang, $dimensions_modified );
    endif;

    if ( !empty(get_field('origin')) || !empty(get_field('material')) || !empty(get_field('dimensions')) ) : echo '</div>'; endif;
  } // end if ACF
  
  // Linked Variations
  echo do_shortcode('[dsalv]');
  
  if ( function_exists('get_field') ) { 
    // Product Availability
    $availability_lang_1 = esc_html__( 'Availability', 'really-simple' );
    $availability_lang_2 = esc_html__( 'On demand', 'really-simple' );

    if ( get_field('on-demand') == 1 ) {
      printf('<div class="availability">%s: %s</div>', $availability_lang_1, $availability_lang_2);
    } elseif ( !empty(get_field('availability')) ) {
      printf('<div class="availability">%s: %s</div>', $availability_lang_1, get_field('availability'));
    }

    if ( get_field('reservation') == 1 ) {
      printf('<p class="stock reserved">%s</p>', esc_html__( 'Product reserved', 'really-simple' ));
    }

  } // end if ACF
} add_action('woocommerce_single_product_summary', 'custom_product_details', 30);

add_filter('woocommerce_reset_variations_link', function() {
	return '<a class="reset_variations" href="#">&times;</a>';
});

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 200 );

add_action( 'woocommerce_single_product_summary', function() {
  if ( function_exists('get_field') && empty(get_field('hide_button')) ) {  // !empty(get_field('reservation'))
    $string = esc_html__( 'Enquire', 'really-simple' );
    printf( '<a href="#entry-enquire-form" class="enquire" role="button" aria-label="%s"><button tabindex="-1">%s</button></a>', $string, $string );
  }
}, 220 );

// Display partner logo on product page
function partner_logo() {
  if ( is_product_in_category('oddity') ) {
    printf( '<img src="%s" alt="oddity" class="partner-logo oddity-logo" width="96" height="30.31" />', esc_url( get_template_directory_uri() . '/front-page/oddity.svg' ) );
  } elseif ( is_product_in_category('trn-by-pani-jurek') ) {
    printf( '<img src="%s" alt="Pani Jurek" class="partner-logo pani_jurek-logo" width="96" height="20.13" />', esc_url( wp_upload_dir()['baseurl'] . '/pani_jurek-logo.svg' ) );
  }
} add_action('woocommerce_single_product_summary', 'partner_logo', 0);

function is_product_in_category($category_slug) {
  if ( function_exists('is_product') && is_product() ) {
    $product_cats = wp_get_post_terms(get_the_ID(), 'product_cat', array('fields' => 'slugs'));
    foreach ($product_cats as $cat_slug) {
      if (stripos($cat_slug, $category_slug) !== false) {
        return true;
      }
    }
    return false;
  }
}

// Display category movie on the product category page
function category_movie() {
  if ( category_slug_contains('oddity') || category_slug_contains('trn-by-pani-jurek') ) {
    echo '<div class="video">';
    if ( category_slug_contains('oddity') ) {
      printf( '<video playsinline preload="none" poster="%s"><source src="%s" type="video/webm"></video>', wp_upload_dir()['baseurl'] . '/oddity-movie-poster.webp', wp_upload_dir()['baseurl'] . '/oddity-movie.webm' );
    } elseif ( category_slug_contains('trn-by-pani-jurek') ) {
      printf( '<video playsinline preload="none" poster="%s"><source src="%s" type="video/webm"></video>', wp_upload_dir()['baseurl'] . '/trn_pani_jurek-movie-poster.webp', wp_upload_dir()['baseurl'] . '/trn_pani_jurek-movie.webm' );
    }
    get_template_part( 'template-parts/button', 'play' ) . '</div>';
  }
} add_action('woocommerce_after_shop_loop', 'category_movie', 10);

function category_slug_contains($category_slug) {
  if ( function_exists('is_product_category') && is_product_category() ) {
    $current_category = get_queried_object();
    if ($current_category && strpos($current_category->slug, $category_slug) !== false) {
      return true;
    }
    return false;
  }
}

// Disable WooCommerce default styling
// add_filter( 'woocommerce_enqueue_styles', '__return_false' ); 

/**
 * Disable WYSWYG for WooCommerce products description
**/
add_filter('user_can_richedit', function( $default ){
  if ( get_post_type() === 'product') return false;
  return $default;
});

/**
 * Keep ACF fields visible as Wordpress Custom Fields
 *
 * Special thanks to Krasen Slavov (https://krasenslavov.com/cleaning-unused-acf-custom-fields-and-resetting-taxonomies/)
**/
add_filter( 'acf/settings/remove_wp_meta_box', '__return_false' );

/**
 * Custom Product Videos
**/
function custom_mime_types($mimes) {
    $mimes['mp4'] = 'video/mp4';
    $mimes['mov'] = 'video/quicktime';
    $mimes['webm'] = 'video/webm';
    return $mimes;
}
add_filter('upload_mimes', 'custom_mime_types');

// Add meta box for product videos
function add_product_video_meta_box() {
  add_meta_box(
    'product_video_meta_box',
    __('Product video', 'woocommerce'),
    'product_video_meta_box_callback',
    'product',
    'side',
    'low'
  );
} add_action('add_meta_boxes', 'add_product_video_meta_box');

// Callback function to display the meta box
function product_video_meta_box_callback($post) {
  wp_nonce_field('save_product_video', 'product_video_nonce');
  $product_video = get_post_meta($post->ID, '_product_video', true);
  $video_thumbnail = get_post_meta($post->ID, '_video_thumbnail', true);
  $video_aspect_ratio = get_post_meta($post->ID, '_video_aspect_ratio', true);
  ?>
  <div id="product-video">
    <input type="hidden" id="product_video" name="product_video" value="<?php echo esc_attr($product_video); ?>" />
    <input type="hidden" id="video_thumbnail" name="video_thumbnail" value="<?php echo esc_attr($video_thumbnail); ?>" />
    <div id="product_video_preview" style="margin-bottom: 10px;">
      <?php if ($product_video) : ?>
        <video controls poster="<?php echo esc_url($video_thumbnail); ?>" style="width: 100%; aspect-ratio: <?php echo esc_attr($video_aspect_ratio); ?>; object-fit: cover;">
          <source src="<?php echo esc_url($product_video); ?>" type="video/mp4">
          <source src="<?php echo esc_url($product_video); ?>" type="video/webm">
        </video>
      <?php endif; ?>
    </div>
    <p class="choose_video hide-if-no-js">
      <a href="#" type="button" id="upload_product_video"><?php _e('Choose video', 'really-simple'); ?></a>
    </p>
    <p class="choose_thumbnail hide-if-no-js">
      <a href="#" type="button" id="upload_video_thumbnail"><?php _e('Choose thumbnail', 'really-simple'); ?></a>
    </p>
    <div class="set_aspect_ratio">
      <p>
        <label for="video_aspect_ratio">
          <strong><?php _e('Set aspect ratio', 'really-simple'); ?></strong>
        </label>
      </p>
      <select id="video_aspect_ratio" name="video_aspect_ratio">
        <option value="1/1" <?php selected($video_aspect_ratio, '1/1'); ?>>1:1</option>
        <option value="16/9" <?php selected($video_aspect_ratio, '16/9'); ?>>16:9</option>
      </select>
    </div>
    <?php if ($product_video) : ?>
    <p class="remove_video hide-if-no-js">
      <a href="#" type="button" id="remove_product_video" style="color: #b32d2e"><?php _e('Remove video', 'really-simple'); ?></a>
    </p>
    <?php endif; ?>
  </div>
  <script>
  jQuery(document).ready(function($){
    var mediaUploader;

    $('#upload_product_video').click(function(e) {
      e.preventDefault();
      if (mediaUploader) {
        mediaUploader.open();
        return;
      }
      mediaUploader = wp.media.frames.file_frame = wp.media({
        multiple: false
      });
      mediaUploader.on('select', function() {
        var attachment = mediaUploader.state().get('selection').first().toJSON();
        $('#product_video').val(attachment.url);
        $('#product_video_preview').html(
          '<video controls poster="' + $('#video_thumbnail').val() + '" style="object-fit: cover"><source src="' + attachment.url + '" type="video/mp4"></video>'
        );

        $('#remove_product_video').html('<?php _e('Remove video', 'really-simple'); ?>');
      });
      mediaUploader.open();
    });

    $('#upload_video_thumbnail').click(function(e) {
      e.preventDefault();
      if (mediaUploader) {
        mediaUploader.open();
        return;
      }
      mediaUploader = wp.media.frames.file_frame = wp.media({
        multiple: false
      });
      mediaUploader.on('select', function() {
        var attachment = mediaUploader.state().get('selection').first().toJSON();
        $('#video_thumbnail').val(attachment.url);
        var videoElement = $('#product_video_preview').find('video');
        if (videoElement.length) {
          videoElement.attr('poster', attachment.url);
        }
      });
      mediaUploader.open();
    });

    $('#video_aspect_ratio').change(function() {
      var aspectRatio = $(this).val();
      $('#product_video_preview video').css('aspect-ratio', aspectRatio);
    });

    $('#remove_product_video').click(function(e) {
      e.preventDefault();
      $('#product_video').val('');
      $('#video_thumbnail').val('');
      $('#product_video_preview').html('');
      $('#remove_product_video').html('');
    });
  });
  </script>
  <style>
    #product-video p:last-child { margin-bottom: 0; }
    #product-video p:last-child a:empty { display: none; }
    #product-video p:last-child:has(a:empty) { margin-bottom: -12px; }
  </style>
  <?php
}

// Save the changes
function save_product_video_meta_box($post_id) {
  if (!isset($_POST['product_video_nonce']) || !wp_verify_nonce($_POST['product_video_nonce'], 'save_product_video')) {
    return;
  }
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }
  if (isset($_POST['product_video'])) {
    update_post_meta($post_id, '_product_video', esc_url_raw($_POST['product_video']));
  } else {
    delete_post_meta($post_id, '_product_video');
  }
  if (isset($_POST['video_thumbnail'])) {
    update_post_meta($post_id, '_video_thumbnail', esc_url_raw($_POST['video_thumbnail']));
  } else {
    delete_post_meta($post_id, '_video_thumbnail');
  }
  if (isset($_POST['video_aspect_ratio'])) {
    update_post_meta($post_id, '_video_aspect_ratio', sanitize_text_field($_POST['video_aspect_ratio']));
  } else {
    delete_post_meta($post_id, '_video_aspect_ratio');
  }
} add_action('save_post', 'save_product_video_meta_box');

/**
 * Table of Contents Shortcut
**/
function filter_content($content) {
  return add_ids_to_headings($content);
} add_filter('the_content', 'filter_content');

function toc_shortcode() {
  return get_toc(get_the_content());
} add_shortcode('toc', 'toc_shortcode');

function get_toc($content) {
  $headings = get_headings($content);

  // Parse TOC
  ob_start();
  printf('<button class="table-of-contents-header button-clean" role="button" aria-label="%s">%s <img src="/wp-content/themes/really-simple/icns/close.svg" class="toc-icon" width="16" height="16" /></button>', esc_html__('Expand', 'really-simple'), esc_html__('Table of Contents', 'really-simple'));
  echo '<div class="table-of-contents" aria-expanded="true">';
  parse_toc($headings);
  echo '</div>';
  return ob_get_clean();
}

function get_headings($content) {
  $headings = array();
  preg_match_all("/<h([1-6])(.*?)>(.*?)<\/h[1-6]>/", $content, $matches);

  for ($i = 0; $i < count($matches[1]); $i++) {
    $headings[$i]["tag"] = $matches[1][$i];

    // Get heading ID
    $att_string = $matches[2][$i];
    preg_match("/id=\"([^\"]*)\"/", $att_string, $id_matches);
    $headings[$i]["id"] = isset($id_matches[1]) ? $id_matches[1] : sanitize_title($matches[3][$i]);

    // Get heading classes
    preg_match_all("/class=\"([^\"]*)\"/", $att_string, $class_matches);
    for ($j = 0; $j < count($class_matches[1]); $j++) {
        $headings[$i]["classes"][] = $class_matches[1][$j];
    }

    $headings[$i]["name"] = $matches[3][$i];
  };

  return $headings;
}

function add_ids_to_headings($content) {
  $pattern = '/<h([1-6])(.*?)(id=".*?")?(.*?)>(.*?)<\/h\1>/';

  $replacement = function ($matches) {
    $tag = $matches[1];
    $attrs = $matches[2] . $matches[4];
    $text = $matches[5];
    if (empty($matches[3])) {
      $id = sanitize_title($text);
      return "<h{$tag} id=\"{$id}\"{$attrs}>{$text}</h{$tag}>";
    } else {
      return $matches[0];
    }
  };

  return preg_replace_callback($pattern, $replacement, $content);
}

function parse_toc($headings) {
  $current_level = 0;
  $output = "";

  foreach ($headings as $heading) {
    $level = intval($heading["tag"]);

    // Close open list items and lists as needed
    while ($level < $current_level) {
      $output .= "</li></ol>";
      $current_level--;
    }

    // Open a new list if necessary
    if ($level > $current_level) {
      $output .= "<ol>";
    } elseif ($current_level > 0) {
      $output .= "</li>";
    }

    // Output the current list item
    $output .= "<li><a href='#" . $heading["id"] . "'>" . $heading["name"] . "</a>";

    // Update the current level
    $current_level = $level;
  }

  // Close all remaining open list items and lists
  while ($current_level > 0) {
    $output .= "</li></ol>";
    $current_level--;
  }

  $output .= "";
  echo $output;
}
