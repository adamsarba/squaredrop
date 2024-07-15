<?php
/**
 * The template header
 * 
 * This is the template that displays all of the <head> section and everything up until <main id="main" class="entry-site-main">
 * 
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * 
 * @package Really Simple
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">    
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3ZLHLNQ62E"></script>
    <script>
      // Google
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-3ZLHLNQ62E');
      
      gtag('event', 'conversion', {'send_to': 'AW-16631625996/Mar2COngsL8ZEIzyyfo9'});
      
      // Facebook
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '3606965969567220');
      fbq('track', 'PageView');
    </script>
    <noscript>
      <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=3606965969567220&ev=PageView&noscript=1" />
    </noscript>

    <style>
      @font-face {
        font-family: "Montserrat";
        src: url('<?php echo get_template_directory_uri() . '/fonts/Montserrat.ttf' ?>') format('truetype');
      }
      @font-face {
        font-family: "Questrial";
        src: url('<?php echo get_template_directory_uri() . '/fonts/Questrial-Regular.ttf' ?>') format('truetype');
      }
    </style>
  
    <?php
      wp_head();

      if ( is_front_page() ) {
        echo "<meta name='theme-color' content='#010101'>"; // for iOS Safari
      } 
    ?>
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="icon" href="/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
  </head>

  <body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

    <header id="masthead" class="site-header">

      <?php if ( !function_exists( 'the_custom_logo' ) || !has_custom_logo() ) : ?>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
          <?php bloginfo( 'name' ); ?>
        </a>
      <?php endif; ?><!-- .site-title -->

      <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
        <div class="site-branding">
          <?php the_custom_logo(); ?>
        </div>
      <?php endif; ?><!-- .site-branding -->

      <?php if ( has_nav_menu( 'really-simple-primary-menu' ) ) : ?>
        <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_html_e( 'Navigation', 'really-simple' ); ?>">
          <?php
            wp_nav_menu([
              'theme_location'  => 'really-simple-primary-menu', 
              'container'       => '',
              'menu_class'      => 'really-first-menu',
            ]);
            wp_nav_menu([
              'theme_location'  => 'really-simple-secondary-menu', 
              'container'       => '',
              'menu_class'      => 'really-first-menu menu-icons',
            ]);
          ?>
          <a href="#" class="close-nav-mobile" role="button" aria-label="<?php esc_html_e( 'Close Menu', 'really-simple' ); ?>">
            &times; <span class="screen-reader-text"><?php esc_html_e( 'Close Menu', 'really-simple' ); ?></span>
          </a><!-- .close-nav-mobile -->
        </nav>
      <?php endif; ?><!-- #site-navigation -->

      <a href="#site-navigation" class="open-nav-mobile" role="button" aria-label="<?php esc_html_e( 'Open Menu', 'really-simple' ); ?>">
        <span class="screen-reader-text">
          <?php esc_html_e( 'Open Menu', 'really-simple' ); ?>
        </span>
      </a><!-- .open-nav-mobile -->
   
    </header><!-- #masthead -->

    <div class="menu-search-form">
      <a href="#" class="close-search" role="button" aria-label="<?php esc_html_e( 'Close Search', 'really-simple' ); ?>">
        <img src="<?php echo get_template_directory_uri() . '/icns/close.svg'; ?>" alt="<?php esc_html_e( 'Close', 'really-simple' ); ?>" width="24" height="24" loading="lazy" /> 
      </a>
      <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <span class="screen-reader-text"><?php esc_html_e( 'Search for:', 'really-simple' ); ?></span>
        <input id="search-form" type="search" placeholder="<?php echo esc_html_e( 'Search on squaredrop.pl', 'really-simple' ); ?>" name="s" />
      </form>
    </div>

    <div id="primary" class="content-area">
      <main id="main" class="entry-site-main">
    