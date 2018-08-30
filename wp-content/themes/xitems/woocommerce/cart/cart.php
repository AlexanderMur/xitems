<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;
//wc_print_notices();

do_action('woocommerce_before_cart'); ?>
<form class="woocommerce-cart-form cart" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
  <button style="display: none"></button>
  <div class="checkout-cart__container">

      <?php

      foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
          /** @var WC_Product $_product */
          $_product = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
          $product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
          if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
              $product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
              ?>
            <div
                class="checkout-cart__item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
                <?php
                $thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image('medium'), $cart_item, $cart_item_key);

                if (!$product_permalink) {
                    echo wp_kses_post($thumbnail);
                } else {
                    printf('<a class="img-wrapper" href="%s">%s</a>', esc_url($product_permalink), wp_kses_post($thumbnail));
                }
                ?>
              <div class="text">
                <div class="head">
                    <?php
                    if (!$product_permalink) {
                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
                    } else {
                        echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a class="title" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
                    }

                    do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

                    // Meta data.
                    echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

                    // Backorder notification.
                    if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
                        echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>'));
                    }
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

                    echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
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
                <?php
                // @codingStandardsIgnoreLine
                echo apply_filters('woocommerce_cart_item_remove_link', sprintf(
                    '<a href="%s" class="remove-item" aria-label="%s" data-product_id="%s" data-product_sku="%s"><span></span><span></span></a>',
                    esc_url(wc_get_cart_remove_url($cart_item_key)),
                    __('Remove this item', 'woocommerce'),
                    esc_attr($product_id),
                    esc_attr($_product->get_sku())
                ), $cart_item_key);
                ?>
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
              <input type="text" name="coupon_code" class="form-control" id="coupon_code" value="" placeholder="<?php esc_attr_e('Промо код', 'woocommerce'); ?>"/>

              <?php do_action('woocommerce_cart_coupon'); ?>
            </div>
          <?php } ?>

          <?php do_action('woocommerce_cart_actions'); ?>
          <input type="hidden"
                 id="woocommerce-cart-nonce"
                 name="woocommerce-cart-nonce"
                 value="<?php echo wp_create_nonce( 'woocommerce-cart') ?>" />
      </div>

      <div style="margin-bottom: 10px" class=" <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?>">

            <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
              <div class="checkout-totalPrice cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                <span class="title"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
                <span class="value" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
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


<?php do_action('woocommerce_after_cart'); ?>
