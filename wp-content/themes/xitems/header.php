<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
    <meta name='description' content=""/>
    <meta name="keywords" content=""/>
    <?php
    $product = wc_get_product();
    if($product){
        $metas = xi_post_meta($product->get_id(),'meta_tags');
        foreach ($metas as $meta) {
            ?>
            <meta name="<?php echo $meta['name'] ?>" content="<?php echo $meta['content'] ?>"/>
            <?php
        }
    }
    ?>
    <?php wp_head();?>
</head>
<body <?php body_class('loaded'); ?>>

<!-- BEGIN BODY -->
<div class="main-wrapper">
    <!-- BEGIN HEADER -->
    <header class="header <?php echo is_product() ? 'isOnePageScroll' : '' ?>">
        <div class="header-container">
            <div class="header-left">
                <a href="<?php echo site_url('/') ?>" class="header-logo">
                    <?php echo wp_get_attachment_image(xi_option('xitems_logo'),'200x200') ?>
                </a>
            </div>
            <div class="header-right">
                <?php
                $phone_number = xi_option('phone_number');
                ?>
                <a href="tel:<?php echo $phone_number ?>" class="header-phone"><?php echo $phone_number ?></a>
                <button class="header-cartBtn">
          <span class="header-cartBtn-icon">
            <img src='<?php echo get_template_directory_uri() . "/img/icon-cart.png" ?>' alt="">
          </span>
                    <span class="header-cartBtn-amount"><?php echo WC()->cart->get_cart_contents_count() ?></span>
                </button>
                <div class="header-logo-mobile">
                    <a href="#" class="header-logo">
                        <img src='<?php echo get_template_directory_uri() . "/img/logo.svg" ?>' alt="">
                    </a>
                </div>
                <div class="header-nav__container">
                    <nav class="header-nav">
                        <button class="header-nav__btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                        <?php
                        wp_nav_menu([
                            'theme-location' => 'menu-1',
                            'container' => '',
                            'menu_class' => 'header-nav-list',
                        ])
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <!-- HEADER EOF   -->