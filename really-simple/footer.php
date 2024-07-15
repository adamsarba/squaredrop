<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Really Simple
 */
?>

  <footer class="footer" id="contact">

    <div class="container widgets">
      <div class="widgets-left">
        <?php dynamic_sidebar( 'really-simple-footer' ); ?>
      </div>
      <div class="widgets-right">
        <p class="widgets-title">
          <span><?php esc_html_e( 'Sign up', 'really-simple' ); ?></span> <?php esc_html_e( 'for the latest news and offers', 'really-simple' ); ?>
        </p>
        
        <?php echo do_shortcode( '[contact-form-7 id="' . CONTACT_FORM_NEWSLETTER_ID . '" html_id="newsletter-form"]'  ); ?>

        <div class="footer-social-media">
          <a href="https://www.facebook.com/squaredrop/?locale=pl_PL" target="_blank" aria-label="Facebook">
            <img src="<?php echo get_template_directory_uri() . '/icns/fb.svg'; ?>" width="16" height="16" alt="Facebook" />
          </a>
          <a href="https://www.instagram.com/squaredrop/" target="_blank" aria-label="Instagram">
            <img src="<?php echo get_template_directory_uri() . '/icns/ig.svg'; ?>" width="17" height="16" alt="Instagram" />
          </a>
          <a href="https://vimeo.com/squaredrop" target="_blank" aria-label="Vimeo">
            <img src="<?php echo get_template_directory_uri() . '/icns/vimeo.svg'; ?>" width="17.88" height="16" alt="Vimeo" />
          </a>
        </div>

      </div>
    </div><!-- .widgets -->

    <div class="container footer-bottom">
      <div class="copyrights">
        <small class="footer-copy">
          &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved', 'really-simple' ); ?>.
        </small>
        <small>
          <a href="<?php esc_html_e( '/en/privacy-policy/', 'really-simple' ); ?>" class="nowrap">
            <?php esc_html_e( 'Privacy Policy', 'really-simple' ); ?>
          </a>
        </small>
      </div>

      <div class="footer-tools">
        <div id="accessibility" class="a11y-tools">
          <div class="a11y-button" role="button" tabindex="0" aria-label="<?php esc_html_e( 'Accessibility tools', 'really-simple' ); ?>" aria-expanded="false">
            <img src="<?php echo get_template_directory_uri() . '/icns/accessibility.svg'; ?>" alt width="17" height="18" />
            <small>
              <?php esc_html_e( 'Accessibility', 'really-simple' ); ?>
            </small>
          </div>
        </div>
        <div id="language-switcher" class="language-switcher">
          <?php 
            do_action('wpml_add_language_selector'); // <a href="/" title="Polski" class="lang active" aria-label="Zmień język">PL</a> <a href="/en" title="English" class="lang" aria-label="Change language">EN</a>
          ?>
        </div>
      </div>
    </div><!-- .footer-bottom -->
  </footer>
  
  <?php wp_footer(); ?>

  <div id="cookies-notice" class="cookies-notice" style="display: none;">
    <div class="wrapper">
      <div>
        <p class="notice-title"><?php esc_html_e( 'We respect your privacy', 'really-simple' ); ?></p>
        <p>
          <?php _e( 'This website uses cookies or similar technologies to enhance your browsing experience. By continuing to use our website you agree to our <a href="/en/privacy-policy/">Privacy&nbsp;Policy</a>.', 'really-simple' ); ?>
        </p>
      </div>
      <button class="button-white" onclick="acceptCookieConsent();"><?php esc_html_e( 'Accept', 'really-simple' ); ?></button>
    </div>
    <div id="closeIcon"></div>
  </div>

  <button onclick="topFunction()" class="back-to-top" aria-label="<?php esc_html_e( 'Go to top', 'really-simple' ); ?>">
    &uarr; <span class="screen-reader-text"><?php esc_html_e( 'Go to top', 'really-simple' ); ?></span>
  </button>

  <?php if ( is_product() ) : ?>
  <script id="product-script" type="text/javascript">
    // Replace attribute name on English site
    if (window.location.href.indexOf("/en") > -1) {
      if ( document.querySelector('.dsalv-attributes') ) {
        var label = document.querySelector('.dsalv-attribute-label');
        if (label.textContent.trim() === 'Kolor') { label.textContent = 'Color ' };
      }
    }
  </script>
  <?php endif; ?>

  <?php if ( category_slug_contains('oddity') ) : ?>
  <script id="category-video-script" type="text/javascript">
    // Play video
    const videoContainer = document.querySelector("#main .video"),
          video          = videoContainer.querySelector("video"),
          playBtn        = videoContainer.querySelector(".play-video");

    videoContainer.addEventListener("click", (event) => {
      if ( video.paused && playBtn.contains(event.target) ) {
        video.play();
        video.setAttribute('controls', '');
        playBtn.style.display = 'none';
      }
    });
  </script>
  <?php endif; ?>

  <?php if ( has_shortcode( get_post_field('post_content', get_the_ID()), 'toc' ) ) : ?>
  <script id="toc-script" type="text/javascript">
    // Toggle Table of Contents
    const tocWrapper = document.querySelector(".table-of-contents")
    const tocIcn     = document.querySelector(".toc-icon")
    const tocIcnFile = tocIcn.src
    document.querySelector(".table-of-contents-header").addEventListener("click", () => {
      tocWrapper.classList.toggle('hidden')

      if (tocWrapper.classList.contains('hidden')) {
        tocWrapper.setAttribute('aria-expanded', 'false')
        tocIcn.src = tocIcn.src.replace(/\/icns\/[^\/]+$/, '/icns/ellipsis.svg');
      } else {
        tocWrapper.setAttribute('aria-expanded', 'true')
        tocIcn.src = tocIcnFile
      }
    })
  </script>
  <?php endif; ?>

  <?php if ( is_home() || is_archive() ) : ?>
  <script id="blog-hot-fix-script" type="text/javascript">
    // Blog hot fix
    document.querySelectorAll('.widget-area .wp-block-categories a').forEach(link => {
      const url = new URL(link.href);
      if (url.pathname.startsWith('/category') || url.pathname.startsWith('/en/category')) {
        url.pathname = url.pathname.replace('/category', '');
        link.href = url.toString();
      }
    });
  </script>
  <?php endif; ?>

  test

</body>
</html>