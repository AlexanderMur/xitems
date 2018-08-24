<?php
/**
 * Template name: Verification
 */
?>


<?php get_header() ?>
  <!-- BEGIN CONTENT -->

  <main class="content">
    <div class="verification">
      <div class="wrapper-small">

          <?php if (!is_user_logged_in()) { ?>

            <div class="wrap-reviews">
              <div style="display: block" class="reviews-form">
                <div class="form-title">
                  <h3>Авторизуйтесь чтобы посмотреть свои заказы</h3>
                </div>
                <form class="logon" name="logon" method="post">
                    <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                  <div class="box-field">
                    <label class="box-field__label"></label>
                    <div class="box-field__input">
                      <input name="username" type="text" class="form-control" placeholder="Логин">
                    </div>
                  </div>
                  <div class="box-field">
                    <label class="box-field__label"></label>
                    <div class="box-field__input">
                      <input name="password" type="password" class="form-control" placeholder="Пароль">
                    </div>
                  </div>
                  <li class="checkbox-list__item">
                    <label class="checkbox-list__label" for="remember">
                      <span>
                        <input type="checkbox" id="remember" value="true" name="remember" checked class="js-styled">
                      </span>
                      <span class="label-text">запомнить меня</span>
                    </label>
                  </li>
                  <div class="box-field submit">
                    <div class="box-field__input">
                      <button type="submit" class="main-button submit-control">Подтвердить</button>
                    </div>
                  </div>
                </form>
              </div>

            </div>

          <?php } else { ?>
            <h1>Посмотрите что вы уже заказали</h1>
            <div class="verification-name">
                <?php
                /** @var WP_User $user */
                $current_user = wp_get_current_user();
                echo $current_user->user_firstname;
                ?>
            </div>
            <div class="verification-container">
                <?php
                $customer_orders = wc_get_orders(array(
                    'customer' => get_current_user_id(),
                    'paginate' => true,
                ));

                foreach ($customer_orders->orders as $order) {
                    /** @var WC_Order $order */
                    ?>

                  <div class="verification-item">
                      <?php
                      foreach ($order->get_items() as $item) {
                          /** @var WC_Order_Item_Product $item */

                          $product = $item->get_product();

                          ?>
                        <div class="verification-item__left">
                          <div class="verification-item__img">
                            <img src="<?php echo wp_get_attachment_image_src($product->get_image_id(), 'medium')[0] ?>"
                                 alt="">
                          </div>
                          <div class="text">
                            <div class="head">
                              <a href="#" class="title"><?php echo $item->get_name() ?></a>
                                <?php $item->get_name() ?>
                              <h6 class="sub-title"><?php echo get_the_excerpt($product->get_parent_id() ?: $product->get_id()) ?></h6>
                              <div class="code">Код товара : 533295</div>
                              <div class="price">
                                <span><?php echo $item->get_total() ?></span>
                                <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-cartCur.png' ?>"
                                     alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                          <?php
                      }
                      ?>
                    <div class="verification-item__right">
                        <?php
                        $status_history = get_order_status_history($order);

                        ?>
                      <ul class="verification-status">
                        <li class="verification-status__one verification-status__active">
                          <div class="verification_info">
                            <div class="info">Принимаем заказ</div>
                            <div class="date"><?php echo $order->get_date_created()->date('d.m.y') ?></div>
                          </div>

                        </li>
                          <?php
                          if (isset($status_history['awaiting-shipment'])) {
                              ?>
                            <li class="verification-status__two verification-status__active">
                              <div class="verification_info">
                                <div class="info">Отправили</div>
                                <div
                                    class="date"><?php echo date('d.m.y', $status_history['awaiting-shipment']) ?></div>
                              </div>
                            </li>
                              <?php
                          } else {
                              ?>
                            <li class="verification-status__two">
                              <div class="verification_info">
                                <div class="info"></div>
                                <div class="date"></div>
                              </div>
                            </li>
                              <?php
                          }
                          ?>
                          <?php
                          if (isset($status_history['completed'])) {
                              ?>
                            <li class="verification-status__three verification-status__active">
                              <div class="verification_info">
                                <div class="info">Доставили посылку</div>
                                <div class="date"><?php echo date('d.m.y', $status_history['completed']) ?></div>
                              </div>
                            </li>
                              <?php
                          } else {
                              ?>

                            <li class="verification-status__three">
                              <div class="verification_info">
                                <div class="info"></div>
                                <div class="date"></div>
                              </div>
                            </li>
                              <?php
                          }
                          ?>

                      </ul>
                    </div>
                  </div>
                    <?php
                }
                ?>
            </div>

          <?php } ?>

      </div>
    </div>
  </main>
  <!-- CONTENT EOF   -->
  <!-- BEGIN FOOTER -->
<?php get_footer() ?>