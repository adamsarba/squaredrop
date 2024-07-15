<?php
/**
 * Single Product Price
 *
 * @see     https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">
	<span class="screen-reader-text"><?php esc_html_e( 'Price', 'really-simple' ) ?>:</span> <?php echo $product->get_price_html(); ?>
</p>
