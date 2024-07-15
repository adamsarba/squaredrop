<?php
/**
 * 
 * Template Name: Homepage
 * 
 * @package Really Simple
 */

if ( function_exists('get_field') ):
  $featured  = get_field( 'featured-01', get_the_ID() );
  $featured2 = get_field( 'featured-02', get_the_ID() );
  $featured3 = get_field( 'featured-03', get_the_ID() );
endif;

get_header(); ?>

<div id="page-loader">
  <div id="progstat">
    <?php _e( 'Loading', 'really-simple' ); ?><span>0%</span>
  </div>
  <div id="progress"></div>
</div>

<section id="intro" class="section-bg bg-parallax">
  <div class="content-width-medium">
    <h1 class="intro-title">
      <span class="animate-1" data-animate="fade-down" data-animate-once>We are an</span>
      <span class="overflow-hidden">
        <em class="animate-2" data-animate="fade-up" data-animate-once>art</em>
      </span>
      <span class="overflow-hidden">
        <em class="animate-3" data-animate="fade-up" data-animate-once>laboratory</em>
      </span>
    </h1>
    <span class="overflow-hidden">
      <span class="animate-4" data-animate="fade-up" data-animate-once>we restore&nbsp;</span>
    </span>
    <span class="overflow-hidden">
      <span class="animate-5" data-animate="fade-up" data-animate-once>and create&nbsp;</span>
    </span>
    <br />
    <span class="overflow-hidden">
      <span class="animate-6" data-animate="fade-up" data-animate-once>unique furniture</span>
    </span>
  </div>
  <div class="bg-mask"></div>
</section>

<section id="idea" class="section-frame">
  <div class="heading text-center leave-right">
    <h2 data-animate="fade-up">
      <?php _e( 'A one-of-a-kind studio', 'really-simple' ); ?>
    </h2>
    <p class="content-width-medium" data-animate="fade-up">
      <?php _e( 'We are an art laboratory specializing in the design of unique furniture and conservation of works of art, led by Agnieszka Śniadewicz-Świca. Great professionals, experienced craftsmen, designers and art historians constitute the core of <strong>Square Drop</strong>. Thanks to our cooperation with antique dealers from all over the world, we offer original furniture, thoroughly selected by experts. Each item we offer tells a story because we believe that the emotional element, high quality, durability and individual character of the designs are an expression of care for our planet.', 'really-simple' ); ?>
    </p>
  </div>

  <div class="frame-image" data-animate="fade-in">
    <a href="<?php _e( '/en/restoration/', 'really-simple' ); ?>" tabindex="0" aria-label="<?php _e( 'Learn more', 'really-simple' ); ?>" class="link-white pulsating-circle-link" target="_blank">
      <div class="pulsating-circle">
        <h3 class="on-hover-content"><?php _e( 'Restoration', 'really-simple' ); ?></h3>
      </div>
    </a>
    <a href="<?php echo home_url('/kategoria/antyki/'); ?>" tabindex="0" aria-label="<?php _e( 'Learn more', 'really-simple' ); ?>" class="link-white pulsating-circle-link" target="_blank">
      <div class="pulsating-circle">
        <h3 class="on-hover-content"><?php _e( 'Antiques', 'really-simple' ); ?></h3>
      </div>
    </a>
    <a href="<?php echo home_url('/kategoria/oddity/'); ?>" tabindex="0" aria-label="<?php _e( 'Learn more', 'really-simple' ); ?>" class="link-white pulsating-circle-link" target="_blank">
      <div class="pulsating-circle">
        <h3 class="on-hover-content"><?php _e( 'Design', 'really-simple' ); ?></h3>
      </div>
    </a>

    <img src="<?php echo get_template_directory_uri() . '/front-page/idea-bg.webp'; ?>" alt="<?php _e( 'Antiques and furniture from various collections', 'really-simple' ); ?>" class="full-width" width="100%" height="auto" loading="lazy" />
  </div>
  
  <div id="tabs" class="tabs-container content-width-medium leave-right">
    <ul class="tabs-menu" role="tablist" data-animate="fade-down">
      <li id="tab-1" role="tab" aria-selected="true" aria-controls="panel-1" tabindex="0" aria-label="<?php _e( 'Design', 'really-simple' ); ?>">
        <?php _e( 'Design', 'really-simple' ); ?>
      </li>
      <li id="tab-2" role="tab" aria-selected="false" aria-controls="panel-2" tabindex="0" aria-label="<?php _e( 'Antiques', 'really-simple' ); ?>">
        <?php _e( 'Antiques', 'really-simple' ); ?>
      </li>
      <li id="tab-3" role="tab" aria-selected="false" aria-controls="panel-3" tabindex="0" aria-label="<?php _e( 'Restoration', 'really-simple' ); ?>">
        <?php _e( 'Restoration', 'really-simple' ); ?>
      </li>
      <div class="tab-marker"></div>
    </ul>
    <div class="panels-wrapper">
      <div id="panel-1" role="tabpanel" aria-hidden="false" aria-labelledby="tab-1" class="panel-content active">
        <div class="panel-text text-block" data-animate="fade-right">
          <h3><?php _e( 'Original collections & collaborations', 'really-simple' ); ?></h3>
          <p>
            <?php _e( 'We use our knowledge about art gained at antiques markets to create new furniture forms that possess the characteristics of collectors items. <i>Future antiques</i>, high-quality, exclusive, signed pieces, handmade to individual order from top quality materials that develop a natural patina over time. The idea behind <strong>Square Drop</strong> is to express personality through objects.', 'really-simple' ); ?>
          </p>
        </div>
        <div class="panel-image" data-animate="fade-left">
          <img src="<?php echo get_template_directory_uri() . '/front-page/idea-design.webp'; ?>"
            alt="<?php _e( 'Dark furniture from the Oddity collection', 'really-simple' ); ?>"
            width="414" height="414" loading="lazy" />
        </div>
      </div>
      <div id="panel-2" role="tabpanel" tabindex="-1" aria-hidden="true" aria-labelledby="tab-1" class="panel-content">
        <div class="panel-text text-block">
          <h3><?php _e( 'Unique items', 'really-simple' ); ?></h3>
          <p>
            <?php _e( '<strong>Square Drop</strong>, a fine art conservation lab, is a company with family traditions. We use the experience, we have gained over the years, to carry out conservation works. Using our history of art knowledge, as well as, many international contacts we conduct profound market explorations in search for unique furnitures from around the world.', 'really-simple' ); ?>
          </p>
        </div>
        <div class="panel-image">
          <img src="<?php echo get_template_directory_uri() . '/front-page/idea-antiques.webp'; ?>"
            alt="<?php _e( '19th century Japanese pharmacy chest of drawers', 'really-simple' ); ?>"
            width="414" height="414" loading="lazy" />
        </div>
      </div>
      <div id="panel-3" role="tabpanel" tabindex="-1" aria-hidden="true" aria-labelledby="tab-1" class="panel-content">
        <div class="panel-text text-block">
          <h3><?php _e( 'Furniture & works of art', 'really-simple' ); ?></h3>
          <p>
            <?php _e( 'Renovating furniture and works of art, restoring the spirit of historic objects and family heirlooms, is at the core of <strong>Square Drop</strong>\'s business. With great care, we restore valuable, historic items, as well as furniture that are simply important to their owners. We know that with both the market and emotional value of objects, it is important to preserve the natural patina and traces of their history.', 'really-simple' ); ?>
          </p>
        </div>
        <div class="panel-image">
          <img src="<?php echo get_template_directory_uri() . '/front-page/idea-restoration.webp'; ?>"
            alt="<?php _e( 'Restored piece of furniture', 'really-simple' ); ?>"
            width="414" height="414" loading="lazy" />
        </div>
      </div>
    </div>
  </div>
</section>

<section id="video">
  <video
    width="1920" height="auto"
    loop
    playsinline
    muted
    preload="none"
    <?php /* poster="<?php echo get_template_directory_uri() . '/front-page/video-bg.webp'; ?>" */ ?>
  >
    <source src="<?php echo wp_upload_dir()['baseurl'] . '/homepage-video.mp4'; ?>" type="video/mp4">
    <?php _e( 'Your browser doesn\'t support video', 'really-simple' ); ?>
  </video>
  
  <button class="enable-sound button-white button-clean" aria-label="<?php _e( 'Sound on', 'really-simple' ); ?>">
    <img src="<?php echo get_template_directory_uri() . '/icns/music-note.svg'; ?>" alt="🎵" width="13" height="21" loading="lazy" />
    <span class="i18n-1 button-text"><?php _e( 'Sound on', 'really-simple' ); ?></span>
    <span class="i18n-2" style="display: none"><?php _e( 'Sound off', 'really-simple' ); ?></span>
  </button>
</section> 
<div id="video-mask"></div>

<section id="oddity" class="section-frame">
  <div class="heading text-center">
    <h2 data-animate="fade-up"><?php _e( 'Original design', 'really-simple' ); ?></h2>
    <p class="content-width-medium" data-animate="fade-up">
      <?php _e( 'We create unique furniture to show beauty in difference. Our collections, unlike factory production, are reflections of creative personalities. They function as a "square drop" in the interior, being a jewellery addition to the décor, to which they give a unique elegance and atmosphere. A prime example is the "Oddity" collection designed by Kosmos Project, which is a reference to both history and the present.', 'really-simple' ); ?>
    </p>
  </div>

  <div class="interactive-frame" data-animate="fade-in" data-animate-once>
    <div class="grid-wrapper">
      <a href="<?php _e( '/en/product/light-cabinet/', 'really-simple' ); ?>"
        class="grid-area area-1"
        aria-label="<?php _e( 'Oddity Cabinet', 'really-simple' ); ?>"></a>
      <a href="<?php _e( '/en/product/curule-chair-light/', 'really-simple' ); ?>"
        class="grid-area area-2"
        aria-label="<?php _e( 'Oddity Curule Chair', 'really-simple' ); ?>"></a>
      <a href="<?php _e( '/en/product/column/', 'really-simple' ); ?>"
        class="grid-area area-3"
        aria-label="<?php _e( 'Oddity Column', 'really-simple' ); ?>"></a>
      <a href="<?php echo home_url('/kategoria/oddity/'); ?>"
        class="grid-area area-coll"
        tabindex="-1"
        aria-label="<?php _e( 'See the Oddity collection', 'really-simple' ); ?>"></a>
      
      <img src="<?php echo get_template_directory_uri() . '/front-page/oddity-bg.webp'; ?>" class="full-width" alt="<?php _e( 'Furniture from the Oddity collection', 'really-simple' ); ?>" width="100%" height="auto" loading="lazy" />
    </div>
  </div>

  <style>
    section#oddity .grid-area:not(.area-coll):focus-visible:before {
      content: "<?php _e( 'See', 'really-simple' ); ?>";
    }
  </style>

  <div id="cursor">
    <div class="secondary"></div>
    <div class="primary"></div>
    <span class="title">
      <?php _e( 'See the Oddity collection', 'really-simple' ); ?>
    </span>
  </div><!-- Custom cursor for interactive frame -->

  <a href="<?php echo home_url('/kategoria/oddity/'); ?>" data-animate="fade-in" data-animate-once>
    <img src="<?php echo get_template_directory_uri() . '/front-page/oddity-logo.svg'; ?>" class="oddity-logo" alt="Oddity" width="1024" height="321" loading="lazy" />
  </a>

  <div class="awards-wrapper">
    <!-- <div class="award" data-animate="fade-up">
      Design Alive Must Have Awards<br />
      2021 Winner
    </div> -->
    <div class="award" data-animate="fade-up">
      <?php _e( 'Łódź Design Festival Must Have Awards<br />2021 Winner', 'really-simple' ); ?>
    </div>
    <div class="award" data-animate="fade-up">
      <?php _e( 'Elle Decoration<br />2023 Winner', 'really-simple' ); ?>
    </div>
  </div>
    
  <div class="featured-items content-width-medium">
    <!-- Big Item -->
    <div class="featured-item featured-item-big" data-animate="fade-right" data-animate-once>
      <a href="<?php _e( '/en/product/console-table-bright/', 'really-simple' ); ?>">
        <div class="image-wrapper">
          <div class="hover-content">
            <img src="<?php echo get_template_directory_uri() . '/front-page/oddity.svg'; ?>" class="featured-logo" alt="Oddity" width="76" height="24" loading="lazy" />
            <?php _e( 'See', 'really-simple' ); ?>
          </div>
          <img src="<?php echo get_template_directory_uri() . '/front-page/oddity-1.webp'; ?>" alt="<?php _e( 'Oddity Console', 'really-simple' ); ?>" width="564" height="648.59" loading="lazy" />
        </div>
        <h3><?php _e( 'Console', 'really-simple' ); ?></h3>
      </a>
    </div><!-- .featured-item-big -->
    <!-- Small Items -->
    <div class="featured-items-small" data-animate="fade-left" data-animate-once>
      <div class="featured-item">
        <a href="<?php _e( '/en/product/little-cabinet/', 'really-simple' ); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <img src="<?php echo get_template_directory_uri() . '/front-page/oddity.svg'; ?>" class="featured-logo" alt="Oddity" width="76" height="24" loading="lazy" />
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <img src="<?php echo get_template_directory_uri() . '/front-page/oddity-2.webp'; ?>" alt="<?php _e( 'Oddity Little Cabinet', 'really-simple' ); ?>" width="376" height="376" loading="lazy" />
          </div>
          <h3><?php _e( 'Little Cabinet', 'really-simple' ); ?></h3>
        </a>
      </div>
      <div class="featured-item">
        <a href="<?php _e( '/en/product/curule-chair-dark/', 'really-simple' ); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <img src="<?php echo get_template_directory_uri() . '/front-page/oddity.svg'; ?>" class="featured-logo" alt="Oddity" width="76" height="24" loading="lazy" />
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <img src="<?php echo get_template_directory_uri() . '/front-page/oddity-3.webp'; ?>" alt="<?php _e( 'Oddity Curule Chair', 'really-simple' ); ?>" width="376" height="376" loading="lazy" />
          </div>
          <h3><?php _e( 'Curule Chair', 'really-simple' ); ?></h3>
        </a>
      </div>
      <div class="featured-item">
        <a href="<?php _e( '/en/product/etagere-bright/', 'really-simple' ); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <img src="<?php echo get_template_directory_uri() . '/front-page/oddity.svg'; ?>" class="featured-logo" alt="Oddity" width="76" height="24" loading="lazy" />
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <img src="<?php echo get_template_directory_uri() . '/front-page/oddity-4.webp'; ?>" alt="<?php _e( 'Oddity Étagere', 'really-simple' ); ?>" width="376" height="376" loading="lazy" />
          </div>
          <h3><?php _e( 'Étagere', 'really-simple' ); ?></h3>
        </a>
      </div>
    </div><!-- .featured-items-small -->
  </div>

  <p id="oddity-download" class="text-center" data-animate="fade-in">
    <a href="<?php echo wp_upload_dir()['baseurl']; _e( '/oddity-catalogue-en.pdf', 'really-simple' ); ?>" target="_blank" aria-label="<?php _e( 'Download the catalog', 'really-simple' ); ?>" class="button">
      <img src="<?php echo get_template_directory_uri() . '/icns/book.svg'; ?>" alt="📖" width="19.12" height="16.07" loading="lazy" />
      <?php _e( 'Download the Oddity catalog', 'really-simple' ); ?>
    </a>
  </p>
</section>

<?php
  if ( function_exists('get_field') && !empty($featured) ):
?>
<section id="antiques" class="section-items">
  <div class="heading text-center" data-animate="fade-down">
    <h2><?php _e( 'Antiques', 'really-simple' ); ?></h2>
  </div>

  <div class="featured-items content-width-medium">
    <?php $counter = 0; // Counter to check for first item in the array
    foreach ($featured as $product_id):
      // Get the correct post ID for the current language
      $translated_id = apply_filters('wpml_object_id', $product_id, 'post', true);
      $post = get_post($translated_id); // $post = get_post($product_id);
      setup_postdata($post);
      // Check if it is the first product
      if ($counter == 0): ?>

      <!-- Big Item -->
      <div class="featured-item featured-item-big" data-animate="fade-left" data-animate-once>
        <a href="<?php the_permalink(); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <?php the_post_thumbnail('large'); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <p>
          <?php if ( !empty(get_field('origin')) ) :
            echo get_field('origin');
          endif; ?>
        </p>
        <p class="featured-show-all on-desktop">
          <a href="<?php echo home_url('/kategoria/antyki/'); ?>" aria-label="<?php _e( 'Show all items', 'really-simple' ); ?>">
            <?php _e( 'Show all items', 'really-simple' ); ?>
          </a>
        </p><!-- .featured-show-all @ desktop (absolute position) -->
      </div>
      <!-- Small Items -->
      <div class="featured-items-small" data-animate="fade-right" data-animate-once>

      <?php else: ?>

      <div class="featured-item">
        <a href="<?php the_permalink(); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <?php the_post_thumbnail( array(752,752) ); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <p>
          <?php if ( !empty(get_field('origin')) ) :
            echo get_field('origin');
          endif; ?>
        </p>
      </div>

      <?php
      endif;
      $counter++; // Increase the counter after each item
    endforeach;
    wp_reset_postdata(); ?>
    </div><!-- .featured-items-small -->
  </div>

  <p class="featured-show-all on-mobile text-center">
    <a href="<?php echo home_url('/kategoria/antyki/'); ?>" aria-label="<?php _e( 'Show all items', 'really-simple' ); ?>">
      <?php _e( 'Show all items', 'really-simple' ); ?>
    </a>
  </p><!-- .featured-show-all @ mobile -->
</section>
<?php endif; ?>

<?php
  if ( function_exists('get_field') && !empty($featured2) ):
?>
<section id="candelabra" class="section-separator" data-animate="fade-in">
  <img src="<?php echo get_template_directory_uri() . '/front-page/candelabra-bg.webp'; ?>" alt="<?php _e( 'Candelabra', 'really-simple' ); ?>" width="100%" height="auto" loading="lazy" />
</section>
<section id="restoration" class="section-items">
  <div class="heading text-center">
    <h2 data-animate="fade-up"><?php _e( 'Restoration', 'really-simple' ); ?></h2>
    <p class="content-width-medium" data-animate="fade-up">
      <?php _e( 'At <strong>Square Drop</strong>, we renovate vintage items to give them another life. We approach renovation work with the utmost care. Conservation is always preceded by a substantive analysis and often also by conservation documentation. We restore the shine to objects with history. Thanks to our experience in the conservation of furniture, fabrics, metals and paintings, we receive antique trunks from brands such as Louis Vuitton, Goyard and Moynat. We reconstruct them with care to preserve their historical and sentimental value.', 'really-simple' ); ?>
    </p>
  </div>
  
  <div class="featured-items content-width-medium">
    <?php $counter2 = 0; // Counter to check for first item in the array
    foreach ($featured2 as $product_id):
      // Get the correct post ID for the current language
      $translated_id = apply_filters('wpml_object_id', $product_id, 'post', true);
      $post = get_post($translated_id); // $post = get_post($product_id);
      setup_postdata($post);
      // Check if it is the first product
      if ($counter2 == 0): ?>

      <!-- Big Item -->
      <div class="featured-item featured-item-big" data-animate="fade-right" data-animate-once>
        <a href="<?php the_permalink(); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <?php the_post_thumbnail('large'); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <p>
          <?php if ( !empty(get_field('origin')) ) :
            echo get_field('origin');
          endif; ?>
        </p>
      </div>

      <!-- Small Items -->
      <div class="featured-items-small" data-animate="fade-left" data-animate-once>

      <?php else: ?>

        <div class="featured-item">
          <a href="<?php the_permalink(); ?>">
            <div class="image-wrapper">
              <div class="hover-content">
                <?php _e( 'See', 'really-simple' ); ?>
              </div>
              <?php the_post_thumbnail( array(752,752) ); ?>
            </div>
            <h3><?php the_title(); ?></h3>
          </a>
          <p>
            <?php if ( !empty(get_field('origin')) ) :
              echo get_field('origin');
            endif; ?>
          </p>
        </div>

      <?php
      endif;
      $counter2++; // Increase the counter after each item
    endforeach;
    wp_reset_postdata(); ?>

      <p class="featured-show-all on-desktop">
        <a href="<?php _e( '/en/restoration/', 'really-simple' ); ?>" aria-label="<?php _e( 'Show more', 'really-simple' ); ?>">
          <?php _e( 'Show more', 'really-simple' ); ?>
        </a>
      </p><!-- .featured-show-all @ desktop (absolute position) -->

    </div><!-- .featured-items-small -->
  </div>
  
  <p class="featured-show-all on-mobile text-center">
    <a href="<?php _e( '/en/restoration/', 'really-simple' ); ?>" aria-label="<?php _e( 'Show more', 'really-simple' ); ?>">
      <?php _e( 'Show more', 'really-simple' ); ?>
    </a>
  </p><!-- .featured-show-all @ mobile -->
</section>
<?php endif; ?>

<section id="workshop" class="section-frame" data-animate="fade-in">
  <div class="wrapper">
    <div class="workshop-grid content-width">
      <div class="heading grid-tile-text text-block">
        <h2><?php _e( 'Idea', 'really-simple' ); ?></h2>
        <p>
          <?php _e( 'My name is Agnieszka Śniadewicz-Świca, I am the owner of the <strong>Square Drop</strong>, fine art Conservation Lab. The idea behind Square Drop is to express personality through objects. Each project is a challenge with a high emotional value for us. We think outside the box so that the works created in Square Drop can go down in history.', 'really-simple' ); ?>
        </p>
        <a href="<?php _e( '/en/about-us/', 'really-simple' ); ?>" 
          style="text-decoration: underline"
          aria-label="<?php _e( 'Get to know us', 'really-simple' ); ?>" >
          <?php _e( 'Get to know us', 'really-simple' ); ?>
        </a>
      </div>
      <img src="<?php echo get_template_directory_uri() . '/front-page/workshop-agnieszka.webp'; ?>" class="grid-tile-big" alt="Agnieszka Śniadewicz-Świca" width="500" height="500" loading="lazy" />
      <?php 
        for ($i = 1; $i <= 3; $i++) {
          echo '<img src="' . get_template_directory_uri() . '/front-page/workshop-' . $i . '.webp" alt="" width="240" height="240" loading="lazy" />';
        }
      ?>
    </div>
  </div>
</section>

<section id="collab" class="section-bg" data-animate="fade-in">
  <div class="heading text-block content-width">
    <div>
      <h2 data-animate="fade-up"><?php _e( 'Bring your ideas to life', 'really-simple' ); ?></h2>
      <p data-animate="fade-up">
        <?php _e( 'We cooperate with well-known Polish designers (Pani Jurek, Kosmos Project, UAU Project). Also, we work and implement the creative ideas of our clients, helping them to make their projects come true.', 'really-simple' ); ?>
      </p>
      <p data-animate="fade-up">
        <a href="<?php _e( '/en/contact/', 'really-simple' ); ?>" aria-label="<?php _e( 'Contact', 'really-simple' ); ?>" class="button button-white" target="_blank">
          <?php _e( 'Write to us', 'really-simple' ); ?>
        </a>
      </p>
    </div>
  </div>
</section>

<section id="instagram">
  <div class="instagram-grid content-width" data-animate="fade-in">
    <img src="<?php echo get_template_directory_uri() . '/front-page/ig-grid/1.webp'; ?>" alt="" width="500" height="500" class="grid-tile-big" loading="lazy" />
    <div class="grid-tile-text">
      <h3 data-animate="fade-down" data-animate-once>
        <?php _e( 'Join us on <span>Instagram</span> and see our latest design ideas, news and much more.', 'really-simple' ); ?>
      </h3>
      <a href="https://instagram.com/squaredrop" target="_blank" aria-label="Instagram" data-animate="fade-up" data-animate-once>@squaredrop</a>
    </div>
    <?php
      for ($i = 2; $i <= 11; $i++) {
        echo '<img src="' . get_template_directory_uri() . '/front-page/ig-grid/' . $i . '.webp" alt="" width="240" height="240" loading="lazy" />';
      }
    ?>
  </div>
</section>

<?php
  if ( function_exists('get_field') && !empty($featured3) ):
?>
<section id="collabs" class="section-items">
  <div class="heading text-center" data-animate="fade-down">
    <h2><?php _e( 'Collaborations', 'really-simple' ); ?></h2>
  </div>
  
  <div class="featured-items content-width-medium">
    <?php $counter3 = 0; // Counter to check for first item in the array
    foreach ($featured3 as $product_id):
      // Get the correct post ID for the current language
      $translated_id = apply_filters('wpml_object_id', $product_id, 'post', true);
      $post = get_post($translated_id); // $post = get_post($product_id);
      setup_postdata($post);
      // Check if it is the first product
      if ($counter3 == 0): ?>

      <!-- Big Item -->
      <div class="featured-item featured-item-big" data-animate="fade-left" data-animate-once>
        <a href="<?php the_permalink(); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <?php the_post_thumbnail('large'); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <?php if ( !empty(get_field('origin')) ) : ?>
        <p>
          <?php echo get_field('origin'); ?>
        </p>
        <?php endif; ?>
        <p class="featured-show-all on-desktop">
          <a href="<?php echo home_url('/wspolpraca/'); ?>" aria-label="<?php _e( 'Show more', 'really-simple' ); ?>">
            <?php _e( 'Show more', 'really-simple' ); ?>
          </a>
        </p><!-- .featured-show-all @ desktop (absolute position) -->
      </div>
      <!-- Small Items -->
      <div class="featured-items-small" data-animate="fade-right" data-animate-once>

      <?php else: ?>

      <div class="featured-item">
        <a href="<?php the_permalink(); ?>">
          <div class="image-wrapper">
            <div class="hover-content">
              <?php _e( 'See', 'really-simple' ); ?>
            </div>
            <?php the_post_thumbnail( array(752,752) ); ?>
          </div>
          <h3><?php the_title(); ?></h3>
        </a>
        <p>
          <?php if ( !empty(get_field('origin')) ) :
            echo get_field('origin');
          endif; ?>
        </p>
      </div>

      <?php
      endif;
      $counter3++; // Increase the counter after each item
    endforeach;
    wp_reset_postdata(); ?>
    </div><!-- .featured-items-small -->
  </div>
  
  <p class="featured-show-all on-mobile text-center">
    <a href="<?php echo home_url('/wspolpraca/'); ?>" aria-label="<?php _e( 'Show more', 'really-simple' ); ?>">
      <?php _e( 'Show more', 'really-simple' ); ?>
    </a>
  </p><!-- .featured-show-all @ mobile -->
</section>
<?php endif; ?>

<section id="homepage-footer">
  <div class="content-width">
    <div class="logos" data-animate="fade-in" data-animate-once>
      <div class="wrapper">
        <a href="https://www.projektpracownie.pl/nowe-starego-porzadki-o-konserwacji-i-stolarstwie-w-milanowku/"
          target="_blank"
          aria-label="<?php _e( 'Find out more', 'really-simple' ); ?>">
          <img src="<?php echo wp_upload_dir()['baseurl'] . '/membership-1.webp'; ?>" alt="Projekt Pracownie" width="145" height="42" loading="lazy" />
        </a>
        <a href="https://nownowerzemioslo.pl/rzemioslo/square-drop/"
          target="_blank"
          aria-label="<?php _e( 'Find out more', 'really-simple' ); ?>">
          <img src="<?php echo wp_upload_dir()['baseurl'] . '/membership-2.webp'; ?>" alt="Nów. Nowe Rzemiosło" width="103" height="42" loading="lazy" />
        </a>
        <a href="https://www.homofaber.com/es/discover/square-drop-furniture-restoration-poland"
          target="_blank"
          aria-label="<?php _e( 'Find out more', 'really-simple' ); ?>">
          <img src="<?php echo wp_upload_dir()['baseurl'] . '/membership-3.webp'; ?>" alt="Homo Fiber Guide" width="263" height="42" loading="lazy" />
        </a>
      </div>

      <a href="<?php _e( '/en/european-union-funds/', 'really-simple' ); ?>" aria-label="<?php _e( 'Learn more', 'really-simple' ); ?>">
        <img src="<?php echo get_template_directory_uri() . '/front-page/eu-funds.webp'; ?>" alt="<?php _e( 'Co-financing from EU funds', 'really-simple' ); ?>" width="437" height="42" loading="lazy" />
      </a>
    </div>

    <div class="with-love text-center">
      <img src="<?php echo get_template_directory_uri() . '/icns/sd-drop.svg'; ?>" width="64" height="64" alt="Square Drop" loading="lazy" data-animate="fade-down" data-animate-once />

      <span data-animate="fade-up" data-animate-delay="false" data-animate-once>
        <?php _e( 'For the love of detail', 'really-simple' ); ?>
      </span>
    </div>
  </div>
</section>

<?php
get_footer();