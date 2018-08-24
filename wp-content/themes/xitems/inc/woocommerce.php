<?php

add_action( 'woocommerce_checkout_process', 'privacy_checkbox_error_message' );
function privacy_checkbox_error_message() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( 'Нужно принять условия' ), 'error' );
    }
}


add_action( 'woocommerce_checkout_order_processed', function ($order_id, $posted_data, $order){
    if ( isset( $_POST['subscribe'] ) ) {
        \MailPoet\Models\Subscriber::subscribe([
            'email' => $posted_data['billing_email'],
            'first_name' => $posted_data['billing_first_name'],
            'cf_1' => $posted_data['billing_phone'],
        ]);
    }
},10,3 );


function register_awaiting_shipment_order_status() {
    register_post_status( 'wc-awaiting-shipment', array(
        'label'                     => 'Awaiting shipment',
        'public'                    => true,
        'exclude_from_search'       => false,
        'show_in_admin_all_list'    => true,
        'show_in_admin_status_list' => true,
        'label_count'               => _n_noop( 'Awaiting shipment <span class="count">(%s)</span>', 'Awaiting shipment <span class="count">(%s)</span>' )
    ) );
}
add_action( 'init', 'register_awaiting_shipment_order_status' );
// Add to list of WC Order statuses
function add_awaiting_shipment_to_order_statuses( $order_statuses ) {
    $new_order_statuses = array();
    // add new order status after processing
    foreach ( $order_statuses as $key => $status ) {
        $new_order_statuses[ $key ] = $status;
        if ( 'wc-processing' === $key ) {
            $new_order_statuses['wc-awaiting-shipment'] = 'Awaiting shipment';
        }
    }
    return $new_order_statuses;
}
add_filter( 'wc_order_statuses', 'add_awaiting_shipment_to_order_statuses' );


add_filter('woocommerce_cart_contents_count', 'my_count_all_products');

function my_count_all_products() {
    $items = WC()->cart->get_cart();

    $count = 0;

    foreach ($items as $item) {
        if (!isset($item['free_gift'])) {
            $count += $item['quantity'];
        }
    }

    return $count;
}


add_action('woocommerce_add_to_cart',function($cart_item_key, $product_id, $quantity, $variation_id, $variation, $cart_item_data){
    $product = wc_get_product($product_id);
    $gift = get_product_gift($product);
    if($gift){
        WC()->cart->add_to_cart($gift->get_id(),1,0,[],['free_gift'=>'not_coupon']);
    }
},10,6);


add_action('woocommerce_remove_cart_item',function ($cart_item_key,WC_Cart $cart){
    $cart_item = $cart->get_cart_item($cart_item_key);
    /** @var WC_Product $product */
    $product = $cart_item['data'];
    if($product instanceof WC_Product_Variation){
        $gift = get_product_gift($product->get_parent_id());
    } else {
        $gift = get_product_gift($product);
    }
    if($gift){
        $cart_items = WC()->cart->get_cart();
        foreach ($cart_items as $key => $item) {
            /** @var WC_Product $item_data */
            $item_data = $item['data'];
            if($item_data->get_id() == $gift->get_id()){
                WC()->cart->remove_cart_item($key);
            }
        }
    }

},10,2);

function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
add_action( 'template_redirect', 'woo_custom_redirect_after_purchase' );
function woo_custom_redirect_after_purchase() {
    global $wp;
    $redirect = xi_option('checkout_redirect');
    if ( is_checkout() && !empty( $wp->query_vars['order-received'] ) && $redirect ) {
        wp_redirect( $redirect );
        exit;
    }
}
add_filter( 'woocommerce_cart_item_price', function($price){
    if($price == 'Free!'){
        return 'Бесплатно!';
    }
    return $price;
},300 );

add_filter( 'nonce_user_logged_out', function($id,$action){
    if($action == 'apply-coupon' || $action == 'remove-coupon'){
        return 0;
    }
    return $id;
},500 ,2);