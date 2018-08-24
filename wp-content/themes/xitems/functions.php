<?php

require_once('vendor/autoload.php');
require __DIR__ . '/inc/enqueue-script-style.php';
require __DIR__ . '/inc/theme-setup.php';
require __DIR__ . '/inc/woocommerce.php';
require __DIR__ . '/inc/options.php';
require __DIR__ . '/inc/ajax.php';
require __DIR__ . '/inc/theme-actions.php';
require __DIR__ . '/inc/core.php';
require __DIR__ . '/inc/authorization.php';
require __DIR__ . '/inc/xitems-shortcodes.php';
require __DIR__ . '/inc/comment_add_check.php';


remove_action('woocommerce_check_cart_items', array(WC_Free_Gift_Coupons::class, 'check_cart_items'));
add_action('woocommerce_check_cart_items', 'my_check_cart_items');

function my_check_cart_items()
{

    $cart_coupons = (array)WC()->cart->applied_coupons;
    $cart_coupons[] = 'not_coupon';
    foreach (WC()->cart->get_cart() as $cart_item_key => $values) {

        if (false && isset($values['free_gift']) && !in_array($values['free_gift'], $cart_coupons)) {

            WC()->cart->set_quantity($cart_item_key, 0);

            wc_add_notice(__('A gift item which is no longer available was removed from your cart.', 'wc_free_gift_coupons'), 'error');

        }
    }

}