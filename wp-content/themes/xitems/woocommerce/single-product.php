<?php get_header() ?>
<!-- BEGIN CONTENT -->
<?php the_post() ?>
<?php global /** @var WC_Product $product */
$product;
?>

<main class="content onePage-scroll">
    <?php
    if ($product->get_meta('_description_show')) {
        ?>
        <section class="page description" id="page_1">
            <div class="wrapper">
                <?php
                $bg = wp_get_attachment_image_src($product->get_meta('_description_background'), 'medium_large');
                if ($bg) {
                    $bg = $bg[0];
                }
                ?>
                <div class="description-container" style="background-image: url(<?php echo $bg ?>);">
                    <div class="description-col">
                        <div class="title">
                            <h1>
                                <span class="before-text"><?php echo $product->get_meta('_description_before_title') ?></span>
                                <span class="text"><?php echo $product->get_meta('_description_title') ?></span>
                                <span class="after-text"><?php echo $product->get_meta('_description_under_title') ?></span>
                            </h1>
                            <h3><?php echo $product->get_meta('_description_after_title') ?></h3>
                        </div>
                        <div class="img-wrapper">
                            <?php echo wp_get_attachment_image($product->get_meta('_description_image_left'), 'medium_large') ?>
                        </div>
                    </div>
                    <div class="description-col">
                        <div class="img-container">
                            <div class="img-wrapper">
                                <?php echo wp_get_attachment_image($product->get_meta('_description_image_right'), 'medium_large') ?>
                            </div>
                            <span class="textImg"><?php echo $product->get_meta('_description_under_image_right_text') ?></span>
                        </div>
                        <span class="text-bottom"><?php echo $product->get_meta('_description_after_image_right_text') ?></span>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <?php
    $section = $product->get_meta('_main_section');
    if(!empty($section)){
        ?>
        <section class="page description" id="page_1">
            <div class="wrapper">
                <?php echo apply_filters('the_content',$section) ?>
            </div>
        </section>
        <?php
    }
    ?>
    <section class="page productCard" id="page_2">
        <div class="wrapper-small">
            <div class="productCard-container">
                <div class="productCard-col">
                    <h2>Что такое <?php echo $product->get_name() ?>?</h2>
                    <div class="productCard-slider">
                        <?php
                        foreach ($product->get_gallery_image_ids() as $gallery_image_id) {
                            ?>

                            <div class="img-wrapper">
                                <?php echo wp_get_attachment_image($gallery_image_id, 'medium_large') ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="productCard-slider__nav">
                        <div class="sliderCounter">
                            <span class="current"></span>
                            /
                            <span class="total"></span>
                        </div>
                    </div>
                </div>
                <div class="productCard-col">
                    <div class="productCard-text">
                        <div class="text-top">
                            <h1>Это</h1>
                            <p><?php echo $product->get_description() ?></p>
                        </div>
                        <div class="text-bottom">
                            <?php
                            $attrs = $product->get_meta('_product_attrs', true);
                            ?>
                            <?php echo apply_filters('the_content', $attrs) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page benefits">
        <div class="wrapper-small">
            <?php
            $blocks = xi_post_meta($product->get_id(), 'product_benefits');
            $cols = array_to_cols($blocks, 2);
            ?>
            <div class="page-title">
                <h2>Зачем мы его выбрали?</h2>
            </div>
            <div class="benefits-container">
                <div class="benefits-col">
                    <?php
                    foreach ($cols[0] as $col) {
                        ?>
                        <div class="benefits-item">
                            <?php echo apply_filters('the_content', $col['text']) ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="benefits-col">
                    <div class="img-wrapper">
                        <?php echo wp_get_attachment_image(xi_post_meta($product->get_id(), 'product_benefit_img'), 'medium_large') ?>
                    </div>
                </div>
                <div class="benefits-col">
                    <?php
                    foreach ($cols[1] as $col) {
                        ?>

                        <div class="benefits-item">
                            <?php echo apply_filters('the_content', $col['text']) ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    if ($video = xi_post_meta($product->get_id(), 'product_video')) {
        ?>
        <section class="page videoSection">
            <div class="videoSection-wrapper">
                <div class="video-wrapper" id=vidWrapper>
                    <video poster="<?php echo wp_get_attachment_image_src(xi_post_meta($product->get_id(), 'product_video_poster'), 'full')[0] ?>"
                           id="bgvid" playsinline
                           loop>
                        <source src="<?php echo wp_get_attachment_url($video[0]) ?>" type="video/mp4">
                    </video>
                </div>
                <div class="video-controls" id="videoControls">
                    <button class="pauseButton" id="pauseButton"></button>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <?php
    $sections = xi_post_meta($product->get_id(), 'custom_sections');
    foreach ($sections as $section) {
        ?>

        <section class="page reviews">
            <div class="wrapper-small">
                <?php echo apply_filters('the_content',$section['custom_section_text']) ?>
            </div>
        </section>
        <?php
    }
    ?>
    <section class="page reviews">
        <div class="wrapper-small">
            <div class="page-title">
                <h2>Отзывы наших клиентов</h2>
            </div>
            <div class="reviews-container">

                <div class="reviews-col reviews">
                    <?php

                    /** @var WP_Comment[] $comments */
                    $comments = get_comments(['post_id' => $product->get_id()]);

                    foreach ($comments as $comment) {

                        ?>


                        <div class="reviews-item">
                            <div class="head">
                                <span class="name"><?php echo get_user_meta($comment->user_id, 'first_name', true); ?></span>
                                <span class="date"><?php echo comment_date('d.m.y g:i', $comment) ?></span>
                            </div>
                            <?php
                            $rating = intval(get_comment_meta($comment->comment_ID, 'rating', true));
                            $rating *= 20;

                            ?>
                            <ul class="mark js-mark" rating="<?php echo $rating ?>">
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-star.png' ?>"
                                         alt=""></li>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-star.png' ?>"
                                         alt=""></li>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-star.png' ?>"
                                         alt=""></li>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-star.png' ?>"
                                         alt=""></li>
                                <li>
                                    <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-star.png' ?>"
                                         alt=""></li>
                                <li class="rating-bar"></li>
                            </ul>
                            <div class="text-box">
                                <p><?php echo $comment->comment_content ?></p>
                            </div>
                        </div>


                        <?php
                    }
                    ?>
                </div>

                <div class="reviews-col">
                    <?php if (!is_user_logged_in()) { ?>
                        <div class="reviews-form check-reviews-form active-form">
                            <div class="form-title">
                                <h3>Авторизуйтесь чтобы оставить комментарий</h3>
                            </div>
                            <form method="post" class="logon">
                                <?php wp_nonce_field('ajax-login-nonce', 'security'); ?>
                                <input type="hidden" name="product-id" value="<?php echo $product->get_id() ?>">
                                <div class="box-field">
                                    <label class="box-field__label"></label>
                                    <div class="box-field__input">
                                        <input name="username" type="tel" class="form-control" placeholder="Логин">
                                    </div>
                                </div>
                                <div class="box-field">
                                    <label class="box-field__label"></label>
                                    <div class="box-field__input">
                                        <input name="password" type="password" class="form-control"
                                               placeholder="Пароль">
                                    </div>
                                </div>
                                <div class="box-field submit">
                                    <div class="box-field__input">
                                        <button type="submit" class="main-button submit-control">Подтвердить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } else { ?>
                        <div class="reviews-form send-reviews-form">
                            <div class="form-title">
                                <h3>Оставьте отзыв</h3>
                            </div>
                            <form method="post" class="review-submit-check" id="respond"
                                  action="<?php echo site_url('/wp-comments-post.php') ?>">

                                <input type="hidden" name="comment_post_ID"
                                       value="<?php echo $product->get_id() ?>">
                                <?php wp_nonce_field() ?>
                                <div class="box-field" id="review_form">
                                    <div class="comment-form-rating">
                                        <label for="rating"></label>
                                        <select name="rating" id="rating" aria-required="true" required>
                                            <option value=""></option>
                                            <option value="5"></option>
                                            <option value="4"></option>
                                            <option value="3"></option>
                                            <option value="2"></option>
                                            <option value="1"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="box-field">
                                    <label class="box-field__label"></label>
                                    <div class="box-field__input">
                                            <textarea name="comment" class="form-control"
                                                      placeholder="Ваш отзыв"></textarea>
                                    </div>
                                </div>
                                <div class="box-field submit">
                                    <div class="box-field__input">
                                        <button type="submit" class="main-button submit-control">Подтвердить
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </section>

</main>

<div class="pageControls">
    <button class="pageDown-button"></button>
    <div class="wrapper">
        <div class="addToCart addToCartSingle" price="">
            <?php woocommerce_template_single_add_to_cart(); ?>
            <button class="main-button add-to-cart">
                <span>В корзину</span>
                <i class="icon icon-add"></i>

            </button>
            <div class="price">
                <span><?php echo $product->get_price() ?></span>
                <img src="<?php echo get_template_directory_uri() . '/' . 'img/icon-cartCur.png' ?>" alt="">
            </div>
        </div>
    </div>
</div>

<!-- CONTENT EOF   -->
<!-- BEGIN FOOTER -->

<?php get_footer() ?>


<div class="title">
    <h1>
        <span class="before-text">Это</span>
        <span class="text">In-ear</span>
        <span class="after-text">T02</span>
    </h1>
    <h3>Отличная эргономика</h3>
</div>
