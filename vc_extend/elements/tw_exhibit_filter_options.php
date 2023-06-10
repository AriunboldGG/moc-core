<?php 
global $waves_element_options;
$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves'),
        'param_name' => 'title',
        'value' => esc_html__( 'Үзүүлэн', 'waves'),
        "admin_label" => true,
    ),
    array(
        'type' => 'tw_category',
        'size' => 10,
        'heading' => esc_html__( 'Ангилал', 'waves'),
        'value' => 'exhibits_cat',
        'std' => '',
        'param_name' => 'cats',
        'description' => esc_html__( 'Select category.', 'waves'),
    ),
    array(
        'type' => 'tw_number',
        'min' => -1,
        'heading' => esc_html__( 'Тоо', 'waves'),
        'param_name' => 'posts_per_page',
        'value' => '8',
        "admin_label" => true,
        'description' => esc_html__( 'Only integer value.', 'waves'),
    ),
);

$params=array_merge(
    $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "Exhibit With Filter", 'waves'),
    "description" => esc_html__( "Үзүүлэн - шүүлтүүртэй", 'waves' ),
    "base" => "tw_exhibit_filter",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_exhibit_filter extends WPBakeryShortCode{}