<?php
add_action('woocommerce_order_status_changed', function ($id, $old_status, $new_status) {

    if ($new_status != $old_status) {
        add_post_meta($id, 'status_history', ['status' => $new_status, 'date' => time()]);
    }
}, 10, 3);