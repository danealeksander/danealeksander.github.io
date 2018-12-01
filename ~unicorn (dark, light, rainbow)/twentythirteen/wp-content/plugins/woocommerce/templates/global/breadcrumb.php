<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) { exit; }

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before;

	foreach ( $breadcrumb as $key => $crumb ) {

	if ( $crumb[0] == 'Home' ) {
		echo '<li class="crumb zero logo"><a href="//animathabitat.org" title="Animat Habitat&trade;"><img alt="OAFA Mark (Light) &copy; Animat Habitat&trade;, 2015" class="logo" src="//animathabitat.com/inc/ico/oafa.light.svg" />' . $after; }

	elseif ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
		echo '<li class="crumb zero"><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . $after; }

	else { echo '<li class="crumb zero"><a><em>' . esc_html( $crumb[0] ) . '</em>' . $after; } }

	echo '<li class="right thin"><a class="item-count" href="' . wc_get_cart_url() . '" title="My cart at Animat Habitat&trade;"><font class="underscore">Items: ' . WC()->cart->get_cart_contents_count() . '</font> / Checkout' . $after;

	echo $wrap_after;

}
