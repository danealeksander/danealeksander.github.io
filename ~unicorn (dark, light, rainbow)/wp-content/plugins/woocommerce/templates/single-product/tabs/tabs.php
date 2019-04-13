<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */

global $post, $product;

$tabs = apply_filters( 'woocommerce_product_tabs', array() ); ?>

					<div>
						<?php the_title( '<h2 class="title">', '</h2>' );
						if ( ! empty( $tabs ) ) :
							foreach ( $tabs as $key => $tab ) :
								call_user_func( $tab['callback'], $key, $tab );

							endforeach; endif; ?>

						<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<p class="linebreak tagged_as">' . _n( 'Art: <em>', 'Art: <em>', count( $product->get_tag_ids() ), 'woocommerce' ) . '</em>', '</p>' ); ?>

						<?php echo wc_get_product_category_list( $product->get_id(), ', ', '<p class="linebreak posted_in">' . _n( '', '', count( $product->get_category_ids() ), 'woocommerce' ) . '', '</p>' ); ?>

						<p>Publication Date: <?php echo get_the_date('F Y'); ?></p>
						<p>Price: <font class="price"><?php echo $product->get_price_html(); ?></font></p>

						<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?><p class="sku_wrapper"><?php esc_html_e( 'WPC:', 'woocommerce' ); ?> <font class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'None.', 'woocommerce' ); ?></font></p><?php endif; ?></div>
