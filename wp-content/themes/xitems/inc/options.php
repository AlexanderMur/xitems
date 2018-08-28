<?php

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Field\Complex_Field;
use Carbon_Fields\Field\Text_Field;

add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action('carbon_fields_register_fields', 'crb_attach_theme_options');
function crb_attach_theme_options()
{

    $page = Container::make('theme_options', __('Настройки xItems иконки', 'crb'))
        ->add_tab('Icons', array(
            Field::make('complex', 'xitems_icons', 'Иконки')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Иконку',
                    'plural_name' => 'Иконок',
                ))
                ->add_fields(array(
                    Field::make('image', 'light', 'Белая иконка')->set_width(25),
                    Field::make('image', 'dark', 'Черная иконка')->set_width(75)
                )),
        ));
    Container::make('theme_options', __('О нас', 'crb'))
        ->set_page_parent($page)
        ->add_tab('О нас', array(
            Text_Field::make('text', 'about_us_title', 'Заголовок'),
            Text_Field::make('text', 'about_us_lead', 'Подзаголовок'),
            Complex_Field::make('complex', 'about_us_blocks', 'О нас блоки')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Блок',
                    'plural_name' => 'Блоков',
                ))
                ->add_fields(array(
                    Field::make('rich_text', 'text', 'Текст')->set_width(75),
                    Field::make('image', 'image', 'Картинка')->set_width(25),
                )),
        ))
        ->set_page_file('theme-options1');
    Container::make('theme_options', 'Гарантии')
        ->add_tab('Гарантии', array(
            new Text_Field('text', 'guarantee_title', 'Заголовок'),
            Field::make('complex', 'guarantee_blocks', 'Гарантии блоки')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Блок',
                    'plural_name' => 'Блоков',
                ))
                ->add_fields(array(
                    Field::make('rich_text', 'text', 'Текст')->set_width(75),
                    Field::make('image', 'image', 'Картинка')->set_width(25),
                )),
        ))
        ->set_page_file('theme-options2');
    Container::make('theme_options', 'Доставка')
        ->add_tab('Доставка', array(
            new Text_Field('text', 'delivery_title', 'Заголовок'),
            Field::make('complex', 'delivery_blocks', 'Доставка блоки')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Блок',
                    'plural_name' => 'Блоков',
                ))
                ->add_fields(array(
                    Field::make('rich_text', 'text', 'Текст')->set_width(75),
                    Field::make('image', 'image', 'Картинка')->set_width(25),
                )),
        ))
        ->set_page_file('theme-options3');
    Container::make('theme_options', 'Настройки xItems')
        ->add_tab('Настройки xItems', array(
            Field::make('text', 'checkout_redirect', 'Редирект после покупки'),
            Field::make('text', 'phone_number', 'Телефон'),
            Field::make('text', 'mail_to', 'Почта'),
            Field::make('image', 'xitems_logo', 'Лого'),
            Field::make('complex', 'social_blocks', 'Социальные сети')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Социальную сеть',
                    'plural_name' => 'Социальных сетей',
                ))
                ->add_fields(array(
                    Field::make('text', 'social_link', 'Ссылка')->set_width(65),
                    Field::make('image', 'social_image', 'Иконка')->set_width(35),
                )),
        ))
        ->set_page_file('theme-options4');
    $icons = xi_option('xitems_icons');
    $imgs = [];
    foreach ($icons as $icon) {
        $imgs[] = wp_get_attachment_image_src($icon['dark'], 'medium')[0];
    }
    Container::make('post_meta', __('Иконка', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('radio_image', 'product_icon', 'Иконка')
                ->add_options($imgs),
        ));

    Container::make('post_meta', __('Главная секция', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('rich_text', 'main_section', 'Главная секция'),
        ));

    Container::make('post_meta', __('Главная секция(добавление через поля)', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('checkbox', 'description_show', 'Показывать эту секцию'),
            Field::make('text', 'description_before_title', 'Текст до заголовка'),
            Field::make('text', 'description_title', 'Заголовок'),
            Field::make('text', 'description_under_title', 'Текст под Заголовком'),
            Field::make('text', 'description_after_title', 'Текст после Заголовка'),
            Field::make('text', 'description_under_image_right_text', 'Текст под картинкой'),
            Field::make('text', 'description_after_image_right_text', 'Текст после картинки'),
            Field::make('image', 'description_background', 'Фон'),
            Field::make('image', 'description_image_left', 'Картинка слева'),
            Field::make('image', 'description_image_right', 'Картинка справа'),

        ));

    Container::make('post_meta', __('Характеристики', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('rich_text', 'product_attrs', 'Характеристики'),
        ));

    Container::make('post_meta', __('Секция Зачем мы его выбрали?', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('image', 'product_benefit_img', 'Зачем мы его выбрали? Картинка'),
            Field::make('complex', 'product_benefits', 'Зачем мы его выбрали? Блоки')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Блок',
                    'plural_name' => 'Блоков',
                ))
                ->add_fields(array(
                    Field::make('rich_text', 'text', 'Текст')->set_width(30),
                )),
        ));

    Container::make('post_meta', __('Мета теги', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('complex', 'meta_tags', 'Мета теги')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Мета тег',
                    'plural_name' => 'Мета теги',
                ))
                ->add_fields(array(
                    Field::make('text', 'name', 'Name')->set_width(30),
                    Field::make('text', 'content', 'Content')->set_width(30),
                )),
        ));

    Container::make('post_meta', __('Подарок', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('association', 'gift', 'Подарок')
                ->set_types([['type' => 'post', 'post_type' => 'product',], ['type' => 'post', 'post_type' => 'product_variation',]])
        ));
    Container::make('post_meta', __('Видео', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('media_gallery', 'product_video', 'Видео продукта')
                ->set_width(15)
                ->set_type(array('video')),
            Field::make('image', 'product_video_poster', 'Привью видео')
                ->set_width(85),

        ));
    Container::make('post_meta', __('Кастомные секции', 'crb'))
        ->where('post_type', '=', 'product')
        ->add_fields(array(
            Field::make('complex', 'custom_sections', 'Секции')
                ->set_layout('tabbed-horizontal')
                ->setup_labels(array(
                    'singular_name' => 'Секцию',
                    'plural_name' => 'Секций',
                ))
                ->add_fields(array(
                    Field::make('rich_text', 'custom_section_text', 'Секция'),
                )),

        ));

}

function xi_option($name, $container_id = '')
{
    return carbon_get_theme_option($name, $container_id);
}

function xi_post_meta($id, $name)
{
    return carbon_get_post_meta($id, $name);
}


function my_get_pages()
{
    $results = get_pages();
    $results_dictionary = wp_list_pluck($results, 'post_title', 'ID');
    return $results_dictionary;
}