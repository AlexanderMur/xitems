<?php

add_shortcode('xitems_guarantees', function () {
    $blocks = xi_option('guarantee_blocks');
    ob_start();
    ?>
    <div>
        <h1><?php echo xi_option('guarantee_title') ?></h1>
        <?php
        foreach ($blocks as $block) {
            ?>
            <div class="guarantees-wrap">
                <div class="guarantees-item">
                    <div class="guarantees-item__img">
                        <?php echo wp_get_attachment_image($block['image'], 'medium') ?>
                    </div>
                    <div class="guarantees-item__text"><?php echo apply_filters('the_content', $block['text']) ?></div>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="guarantees-text"><?php echo xi_option('about_us_lead') ?></div>
    </div>
    <?php
    return ob_get_clean();
});
add_shortcode('xitems_about_us', function () {
    $blocks = xi_option('about_us_blocks');
    ob_start();

    ?>
    <div>
        <h1><?php echo xi_option('about_us_title') ?></h1>
        <?php
        foreach ($blocks as $block) {
            ?>
            <div class="aboutUs-item">
                <div class="aboutUs-item__text">
                    <?php echo apply_filters('the_content', $block['text']) ?>
                </div>
                <div class="aboutUs-item__img"><?php echo wp_get_attachment_image($block['image'], 'medium') ?></div>
            </div>
            <?php
        }
        ?>
    </div>
    <?php
    return ob_get_clean();
});
add_shortcode('xitems_delivery', function () {
    $blocks = xi_option('delivery_blocks');
    ob_start();

    ?>
    <div>

        <h1><?php echo xi_option('delivery_title') ?></h1>
        <?php
        foreach ($blocks as $block) {
            ?>
            <div class="delivery-item">
                <div class="delivery-item__text">
                    <?php echo apply_filters('the_content', $block['text']) ?>
                </div>
                <div class="delivery-item__img"><?php echo wp_get_attachment_image($block['image'], 'medium') ?></div>
            </div>
            <?php
        }
        ?>
        <a href="#popup_note" class="open-popup-link hidden">open pls</a>
        <div id="popup_note" class="popup_note mfp-hide">
            <div class="popup_title">
                Оформление заказа
            </div>
            <div class="popup_success">
                <p>Спасибо за заказ!</p>
                <p>С вами свяжется наш менеджер</p>
            </div>
            <button class="main-button close-popup">ok</button>
            <button class="close mfp-close">
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
    <?php
    return ob_get_clean();
});

add_shortcode('post_content', function ($atts) {

    $post = get_post($atts['id']);
    if($post){
        return apply_filters('the_content', $post->post_content);
    }
    return 'post not found';
});