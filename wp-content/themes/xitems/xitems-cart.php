<?php
if(WC()->cart->is_empty()) {
    ?>
    <p>Ваша корзина пуста.</p>
    <?php
} else {
    ?>
    <form class="cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
        <button style="display: none"></button>
        <div class="checkout-cart__container">

            <?php

            foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
                /** @var WC_Product $_product */
                $_product = $cart_item['data'];
                $product_id = $cart_item['product_id'];
                if ($_product->exists()) {
                    $product_permalink = $_product->get_permalink();
                    ?>
                    <div class="checkout-cart__item">
                        <a class="img-wrapper"
                           href="<?php echo $product_permalink ?>"><?php echo $_product->get_image('medium') ?></a>
                        <div class="text">
                            <div class="head">
                                <a class="title"
                                   href="<?php echo $product_permalink ?>"><?php echo $_product->get_name() ?></a>
                                <?php

                                // Meta data.
                                echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                                ?>
                                <h6 class="sub-title"><?php echo get_the_excerpt($_product->get_parent_id()) ?></h6>
                            </div>
                            <div class="functional">
                                <div class="price">
                                    <?php
                                    echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
                                    ?>
                                </div>

                                <?php if (!isset($cart_item['free_gift'])) { ?>
                                    <div class="add-product">
                                        <button class="add-product-button add-product-minus">
                                            <span></span>
                                        </button>
                                        <?php
                                        if ($_product->is_sold_individually()) {
                                            $product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
                                        } else {
                                            $product_quantity = woocommerce_quantity_input(array(
                                                'input_name' => "cart[{$cart_item_key}][qty]",
                                                'input_value' => $cart_item['quantity'],
                                                'max_value' => $_product->get_max_purchase_quantity(),
                                                'min_value' => '0',
                                                'product_name' => $_product->get_name(),
                                            ), $_product, false);
                                        }

                                        echo $product_quantity;
                                        ?>
                                        <button class="add-product-button add-product-plus">
                                            <span></span>
                                            <span></span>
                                        </button>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                        <span style="margin-right: 0 !important;" class="product-remove">
                        <a href="<?php echo wc_get_cart_remove_url($cart_item_key) ?>"
                           class="remove-item"
                           aria-label="<?php echo __('Remove this item', 'woocommerce') ?>"
                           data-product_id="<?php echo esc_attr($product_id) ?>"
                           data-product_sku="<?php echo esc_attr($_product->get_sku()) ?>"
                        >
                            <span></span>
                            <span></span>
                        </a>
                    </span>
                    </div>
                    <?php
                }
            }
            ?>

            <button style="display: none" type="submit" class="button" name="update_cart"
                    value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
        </div>

        <div class="checkout-bottom woocommerce-cart-form__contents">
            <form>
                <div class="box-field">
                    <label class="box-field__label hidden">Промо код</label>
                    <?php if (wc_coupons_enabled()) { ?>
                        <div class="coupon">
                            <input type="text" name="coupon_code" class="form-control" id="coupon_code" value=""
                                   placeholder="<?php esc_attr_e('Промо код', 'woocommerce'); ?>"/>

                            <?php do_action('woocommerce_cart_coupon'); ?>
                        </div>
                    <?php } ?>

                    <?php do_action('woocommerce_cart_actions'); ?>

                    <?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
                </div>

                <div style="margin-bottom: 10px"
                     class=" <?php echo (WC()->customer->has_calculated_shipping()) ? 'calculated_shipping' : ''; ?>">

                    <?php foreach (WC()->cart->get_coupons() as $code => $coupon) : ?>
                        <div class="checkout-totalPrice cart-discount coupon-<?php echo esc_attr(sanitize_title($code)); ?>">
                            <span class="title"><?php wc_cart_totals_coupon_label($coupon); ?></span>
                            <span class="value"
                                  data-title="<?php echo esc_attr(wc_cart_totals_coupon_label($coupon, false)); ?>"><?php wc_cart_totals_coupon_html($coupon); ?></span>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="checkout-totalPrice">
                    <span class="title">Общая сумма:</span>
                    <span class="value">
          <?php wc_cart_totals_order_total_html(); ?>
        </span>
                </div>
                <div class="box-field submit">
                    <div class="box-field__input">
                        <button type="button" class="main-button submit-control">Оформить заказ</button>
                    </div>
                </div>
            </form>
        </div>

    </form>


    <?php
}