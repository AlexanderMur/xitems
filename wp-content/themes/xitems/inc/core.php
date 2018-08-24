<?php


/**
 * @param WC_Order $order
 * @return array
 */
function get_order_status_history($order){
    $history = get_post_meta($order->get_id(),'status_history');
    return wp_list_pluck($history,'date','status');
}
function get_product_gift($product){
    if($product instanceof WC_Product){
        $product = $product->get_id();
    }
    $arr = xi_post_meta($product,'gift');
    if(!empty($arr)){
        $gift_id = $arr[0]['id'];
        return wc_get_product($gift_id);
    }
    return 0;
}

function array_to_cols($arr,$num){
    $cols = [];
    for ($i = 0,$len = $num; $i < $len; $i++) {
        $cols[$i] = array();
    }
    foreach ($arr as $key => $item) {
        $cols[$key % $num][] = $item;
    }
    return $cols;
}



