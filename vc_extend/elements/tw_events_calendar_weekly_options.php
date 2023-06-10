<?php 
global $waves_element_options;

$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves'),
        'param_name' => 'title',
        'value' => esc_html__( 'Үзвэр Үйлчилгээний хуваарь', 'waves'),
        "admin_label" => true,
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
    "name" => esc_html__( "Events Calendar Weekly", 'waves'),
    "base" => "tw_events_calendar_weekly",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_events_calendar_weekly extends WPBakeryShortCode{}