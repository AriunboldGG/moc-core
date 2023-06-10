<?php 
global $waves_element_options;

$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves'),
        'param_name' => 'title',
        'value' => esc_html__( 'Соёлын Байгууллагууд', 'waves'),
        "admin_label" => true,
    ),
    array(
        'type' => 'tw_number',
        'min' => -1,
        'heading' => esc_html__( 'Count', 'waves'),
        'param_name' => 'posts_per_page',
        'value' => '9',
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
    "name" => esc_html__( "Organization Carousel", 'waves'),
    "description" => esc_html__( "Main Blog Posts with Styles and Customizable options.", 'waves' ),
    "base" => "tw_organization_carousel",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_organization_carousel extends WPBakeryShortCode{}