<?php

add_action('wp_ajax_my_action', 'my_action_callback');

function my_action_callback()
{
    $phone = $_REQUEST['phone'];

    $user_query = new WP_User_Query(array(
        'meta_key' => 'billing_phone',
        'meta_value' => $phone,
    ));

    if ($user_query->get_results()) {
        echo '1';
    } else {
        echo '0';
    }
    wp_die();
}


add_filter('woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1);

function iconic_cart_count_fragments($fragments)
{

    $fragments['span.header-cartBtn-amount'] = '<span class="header-cartBtn-amount">' . WC()->cart->get_cart_contents_count() . '</span>';


    if(isset($_REQUEST['wc-ajax']) && $_REQUEST['wc-ajax'] == 'add_to_cart_fix'){
        $fragments['#checkoutCart > div'] = '<div style="height: 100%">' . do_shortcode('[woocommerce_cart]') . '</div>';
    }

    $fragments['#checkout-totalPrice'] = '<span id="checkout-totalPrice"><strong>' . WC()->cart->get_total() . '</strong></span>';
    return $fragments;

}