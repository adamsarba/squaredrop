<?php
/**
 * Single Product Image
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.0.0
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns					 = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes	 = apply_filters(
	'woocommerce_single_product_image_gallery_classes',
	array(
		'woocommerce-product-gallery',
		'woocommerce-product-gallery--' . ( $post_thumbnail_id ? 'with-images' : 'without-images' ),
		'woocommerce-product-gallery--columns-' . absint( $columns ),
		'images',
	)
);
$product_video			= get_post_meta($product->get_id(), '_product_video', true);
?>
<div class="<?php echo esc_attr( implode( ' ', array_map( 'sanitize_html_class', $wrapper_classes ) ) ); ?>" data-columns="<?php echo esc_attr( $columns ); ?>" style="opacity: 0; transition: opacity .25s ease-in-out;">
	<div class="woocommerce-product-gallery__wrapper">
		<?php
		if ( $post_thumbnail_id ) {
			$html = wc_get_gallery_image_html( $post_thumbnail_id, true );
		} else {
			$wrapper_classname = $product->is_type( 'variable' ) && ! empty( $product->get_available_variations( 'image' ) ) ?
				'woocommerce-product-gallery__image woocommerce-product-gallery__image--placeholder' :
				'woocommerce-product-gallery__image--placeholder';
			$html              = sprintf( '<div class="%s">', esc_attr( $wrapper_classname ) );
			$html             .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src( 'woocommerce_single' ) ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
			$html             .= '</div>';
		}

		echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id ); // phpcs:disable WordPress.XSS.EscapeOutput.OutputNotEscaped

		do_action( 'woocommerce_product_thumbnails' );
		?>
	</div>
</div>

<?php if ( $post_thumbnail_id ) : ?>
<link rel="stylesheet" href="https://unpkg.com/kursor/dist/kursor.css">
<script src="https://unpkg.com/kursor"></script>
<script>
	if (!window.matchMedia("(max-width: 768px)").matches) {
		new kursor({
			el: '.woocommerce-product-gallery',
			type: 1,
		})
	}
</script>
<?php endif; ?>

<?php 
	if ( $product_video ) :
		$video_thumbnail		= get_post_meta($product->get_id(), '_video_thumbnail', true);
		$video_aspect_ratio	= get_post_meta($product->get_id(), '_video_aspect_ratio', true);
?>
<div class="video" style="opacity: 0">
	<video 
		playsinline
		<?php if ( $video_thumbnail ) : ?>
		poster="<?php echo esc_url( $video_thumbnail ); ?>"
		<?php endif; ?>
		preload="none"
		class="lazy"
		style="aspect-ratio: <?php echo $video_aspect_ratio ?>"
	>
		<source data-src="<?php echo esc_url( $product_video ); ?>" type="video/mp4">
		<?php _e( 'Your browser doesn\'t support video', 'really-simple' ); ?>
	</video>
	<?php get_template_part( 'template-parts/button', 'play' ); ?>
</div>
<script>
	const videoContainer = document.querySelector(".single-product .video");
  var lazyVideos = [].slice.call(document.querySelectorAll("video.lazy"));

  if ("IntersectionObserver" in window) {
    var lazyVideoObserver = new IntersectionObserver(function(entries, observer) {
      entries.forEach(function(video) {
        if (video.isIntersecting) {
          for (var source in video.target.children) {
            var videoSource = video.target.children[source];
            if (typeof videoSource.tagName === "string" && videoSource.tagName === "SOURCE") {
              videoSource.src = videoSource.dataset.src;
            }
          }
          video.target.load();
          video.target.classList.remove("lazy");
					videoContainer.style.opacity = 1
          lazyVideoObserver.unobserve(video.target);
        }
      });
    });

    lazyVideos.forEach(function(lazyVideo) {
      lazyVideoObserver.observe(lazyVideo);
    });
  }

	const video 	= videoContainer.querySelector("video"),
				playBtn = videoContainer.querySelector(".play-video");

	videoContainer.addEventListener("click", (event) => {
		if ( video.paused && playBtn.contains(event.target) ) {
			video.play();
			video.setAttribute('controls', '');
			playBtn.style.display = 'none';
		}
	});
</script>
<?php endif; ?>