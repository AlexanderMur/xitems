<?php
function xitems_scripts()
{

    wp_enqueue_script('jquery');

    wp_enqueue_style('xitems-style', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('xitems-custom-style', get_template_directory_uri() . '/css/custom.css');

    wp_enqueue_script('jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-3.0.1.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('formstyler', get_template_directory_uri() . '/js/components/jquery.formstyler.js', array('jquery'), '20151215', true);

    wp_enqueue_script('slick', get_template_directory_uri() . '/js/components/slick.js', array('jquery'), '20151215', true);

    wp_enqueue_script('magnific-popup', get_template_directory_uri() . '/js/components/jquery.magnific-popup.js', array('jquery'), '20151215', true);

    wp_enqueue_script('xitems-scripts', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20151215', true);

    wp_enqueue_script('xitems-customize-scripts', get_template_directory_uri() . '/js/woo-customize.js', array('jquery'), '20151215', true);

    wp_enqueue_script('onepagescroll-scripts', get_template_directory_uri() . '/js/components/jquery.onepage-scroll.min.js', array('jquery'), '20151215', true);

    wp_enqueue_script('wc-single-product');


    wp_enqueue_script('wc-cart');
    $icons = xi_option('xitems_icons');
    $css = "";
    foreach ($icons as $key => $icon) {
        $light = wp_get_attachment_image_src($icon['light'],'medium')[0];
        $dark = wp_get_attachment_image_src($icon['dark'],'medium')[0];
        $css .= "
            body .main-wrapper .icon-$key {
                background-image: url($dark);
            }
            body .main-wrapper .icon-$key.active, .icon-$key:hover {
                background-image: url($light) !important;
            }
        ";
    }
    wp_add_inline_style('xitems-style',$css);
    wp_localize_script('xitems-scripts','site',[
        'root_url' => home_url(),
        'assets_url' => get_template_directory_uri(),
    ]);

}
add_action('wp_enqueue_scripts', 'xitems_scripts',999);
