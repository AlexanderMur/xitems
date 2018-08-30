<?php get_header() ?>
    <!-- BEGIN CONTENT -->

    <main class="content">
        <div class="mainSection catalog">
            <div class="catalog-item__number">
                <span class="current"></span>
                /
                <span class="total"></span>
                <span class="progress">
					<span class="bar"></span>
				</span>
            </div>
            <div class="catalog-categories">
                <ul>
                    <?php
                    /** @var WC_Product $posts */

                    foreach ($posts as $key => $post) {
                        $product = wc_setup_product_data($post);
                        $icon = carbon_get_post_meta($product->get_id(), 'product_icon');
                        if ($key <= 7) {
                            ?>
                            <li category="<?php echo $product->get_id(); ?>">
                                <i class="icon icon-gadget <?php echo 'icon-' . $icon ?>"></i>
                            </li>
                            <?php
                        }
                    } ?>
                    <li category="price" class="price">
                        <span id="amount"></span>
                        <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>' alt="">
                    </li>
                    <?php
                    /** @var WC_Product $posts */

                    foreach ($posts as $key => $post) {
                        $product = wc_setup_product_data($post);
                        $icon = carbon_get_post_meta($product->get_id(), 'product_icon');
                        if ($key == 8 || $key == 9) {
                            ?>
                            <li category="<?php echo $product->get_id(); ?>">
                                <i class="icon icon-map <?php echo 'icon-' . $icon ?>"></i>
                            </li>
                            <?php
                        }
                    } ?>
                </ul>
            </div>
            <div class="catalog-item__sale">
                <h3>iTag</h3>
                <span class="text">В подарок.<br>
				Осталось <strong class="amount">34</strong>.</span>
            </div>
            <div class="catalog-slider js-catalog-slider">
                <?php

                foreach ($posts as $post) {
                    $product = wc_setup_product_data($post);
                    $gift = get_product_gift($product);
                    $gift_attrs = '';
                    if ($gift) {
                        $qty = $gift->get_stock_quantity();
                        $qty = $qty ?: 34;
                        $trimName = mb_strimwidth($gift->get_name(), 0, 30, '...' );
                        $gift_attrs = "sale='true' gift_title='{$trimName}' gift_qty={$qty}";
                    }
                    ?>
                    <div class="catalog-item" price="<?php echo $product->get_price() ?>" <?php echo $gift_attrs ?>
                         category="<?php echo $product->get_id() ?>"
                         data-permalink="<?php echo $product->get_permalink() ?>">
                        <div class="wrapper-xs">
                            <div class="catalog-item__preview">
                                <div class="tab-container">
                                    <div class="tab-content">
                                        <div class="tab-item">
                                            <div class="img-wrapper">
                                                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary entry-summary">
                                        <?php woocommerce_template_single_add_to_cart(); ?>

                                    </div>
                                </div>
                            </div>
                            <div class="catalog-item__text">
                                <div class="head">
                                    <a href="#" class="title">
                                        <h1><?php echo $product->get_title() ?></h1>
                                    </a>
                                    <h4 class="sub-title"><?php echo $product->get_short_description() ?></h4>
                                    <div class="price">
                                        <span id="amount_phone"></span>
                                        <img src='<?php echo get_template_directory_uri() . '/' . "img/icon-cartCur.png" ?>'
                                             alt="">
                                    </div>
                                </div>
                                <div class="text-box">
                                    <p><?php echo $product->get_description() ?></p>
                                </div>
                                <button class="text-box-expand">Больше</button>
                                <button class="main-button add-to-cart">
                                    <span>В корзину</span>
                                    <i class="icon icon-add"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#" class="more-link js-more-link">подробнее</a>
                    </div>
                    <?php
                }
                ?>
            </div>
            <a href="#" class="more-link js-more-link">подробнее</a>
        </div>

    </main>
    <!-- CONTENT EOF   -->
    <!-- BEGIN FOOTER -->

<?php get_footer() ?>