<footer class="footer <?php echo is_product() || is_shop() ? 'hidden' : '' ?>">
  <div class="wrapper">
    <div class="footer-container">
      <div class="footer-left">
        <span class="copyright">&copy; 2018 xItems.com</span>
      </div>
      <div class="footer-right">
        <ul class="footer-socials">
          <?php
          $socials = xi_option('social_blocks');
          foreach ($socials as $social) {
          ?>
            <li><a href="<?php echo $social['social_link']?>"><?php echo wp_get_attachment_image($social['social_image'], 'post-thumbnail')?></a></li>
          <?php
          }
          ?>

        </ul>
        <div class="footer-mail">
            <?php
            $mail_to = xi_option('mail_to');
            ?>
          <span>Почта:</span>
          <a href="mailto:<?php echo $mail_to?>"><?php echo $mail_to?></a>
        </div>
      </div>
    </div>
  </div>
</footer>

<!-- FOOTER EOF   -->
</div>
<div class="icon-load"></div>
<div class="checkout">
  <div class="checkout-item checkout-cart" id="checkoutCart">
    <div style="height: 100%">
        <?php echo do_shortcode('[woocommerce_cart]'); ?>
    </div>
  </div>
  <div class="checkout-item checkout-order" id=checkoutOrder>
    <form name="checkout" method="post" action="<?php echo esc_url( wc_get_checkout_url() ); ?>">
        <?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
      <input type="hidden" name="payment_method" value="cod">
      <input type="hidden" name="billing_last_name" value="Customer">
      <input type="hidden" name="billing_country" value="UA">
      <input type="hidden" name="billing_state" value="Украина">
      <input type="hidden" name="billing_address_1" value="Street">
      <input class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" id="createaccount" type="hidden" name="createaccount" value="1">
      <div class="checkout-order__container">
        <h3>Оформление заказа</h3>
        <h4>Контактные данные</h4>
        <div class="box-field">
          <label class="box-field__label hidden">Имя и Фамилия</label>
          <div class="box-field__input">
            <input type="text" name="billing_first_name" id="billing_first_name" autocomplete="given-name" class="form-control" placeholder="Имя и Фамилия" required>
          </div>
        </div>
        <div class="box-field">
          <label autocomplete="tel" class="box-field__label hidden">Мобильный телефон</label>
          <div class="box-field__input">
            <input id="billing_phone" name="billing_phone" type="tel" class="form-control" placeholder="Мобильный телефон" required>
          </div>
        </div>
        <div class="box-field">
          <label class="box-field__label hidden">Эл. Почта</label>
          <div class="box-field__input">
            <input type="mail" name="billing_email" id="billing_email" class="form-control" placeholder="Эл. Почта" required>
          </div>
        </div>
        <h4>Доставка</h4>
        <div class="box-field">
          <label class="box-field__label hidden">Город</label>
          <div class="box-field__input">
            <input type="text" name="billing_city" id="billing_city" class="form-control" placeholder="Город" required>
          </div>
        </div>
        <div class="box-field">
          <label class="box-field__label hidden">Отделение Новой Почты</label>
          <div class="box-field__input">
            <input type="text" name="billing_postcode" id="billing_postcode" class="form-control" placeholder="Отделение Новой Почты" required>
          </div>
        </div>
        <ul class="checkbox-list">
          <li class="checkbox-list__item">
            <label class="checkbox-list__label">
            <span>
              <input type="checkbox" value="true" name="privacy_policy" checked class="js-styled" required>
            </span>
              <span class="label-text">Соглашаюсь с условиями сайта</span>
            </label>
          </li>
          <li class="checkbox-list__item">
            <label class="checkbox-list__label">
            <span>
              <input type="checkbox" value="true" name="subscribe" checked class="js-styled">
            </span>

              <span class="label-text">Соглашаюсь на рассылку новостей</span>
            </label>
          </li>
        </ul>
      </div>
      <div class="checkout-bottom">
        <div class="checkout-totalPrice">
          <span class="title">Общая сумма:</span>
          <span class="value">
          <span id="checkout-totalPrice"><strong> <?php echo WC()->cart->get_total() ?> </strong> </span>
        </span>
        </div>
        <div class="box-field submit">
          <div class="box-field__input">
            <button name="woocommerce_checkout_place_order" id="place_order" type="submit" class="main-button submit-control">Оформить заказ</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <button class="checkout-item__trigger">
    <img src="<?php echo get_template_directory_uri()?>/img/icon-cartBlue.png" alt="">
  </button>
</div>

<!-- BODY EOF   -->

<?php wp_footer(); ?>
</body>
</html>