<?php 
global $waves_element_options;

$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves'),
        'param_name' => 'title',
        'value' => esc_html__( 'Мэдээ Мэдээлэл', 'waves'),
        "admin_label" => true,
    ),
    array(
        'type' => 'tw_category',
        'size' => 10,
        'heading' => esc_html__( 'Post category', 'waves'),
        'value' => 'category',
        'std' => '',
        'param_name' => 'cats',
        'description' => esc_html__( 'Select category.', 'waves'),
    ),
    array(
        'type' => 'tw_number',
        'min' => -1,
        'heading' => esc_html__( 'Count', 'waves'),
        'param_name' => 'posts_per_page',
        'value' => '8',
        "admin_label" => true,
        'description' => esc_html__( 'Only integer value.', 'waves'),
    ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('More Link', 'waves'),
        'param_name' => 'link',
        'value' => esc_html__('url:#|title:Бүгдийг үзэх', 'waves'),
    ),
);

$params=array_merge(
    $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "News Carousel", 'waves'),
    "base" => "tw_news_carousel",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_news_carousel extends WPBakeryShortCode{}