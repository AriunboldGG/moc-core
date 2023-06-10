<?php 
global $waves_element_options;
$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Гарчиг', 'waves'),
        "value" =>esc_html__('Тайлбарт үзмэрийн цуврал', 'waves'),
        'param_name' => 'title',
        "admin_label" => true,
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "Entertaiment - Тайлбарт үзмэрийн цуврал", 'waves'),
    "description" => esc_html__( "Display your Partners Images with Tooltip.", 'waves' ),
    "base" => "tw_entertainment",
    "as_parent" => array('only' => 'tw_entertainment_item'),
    "content_element" => true,
    'show_settings_on_create' => false,
    "icon" => "",
    "category" => 'ThemeWaves',
    "params" => $params,
    'default_content' => '[tw_entertainment_item title="Hover title"][tw_entertainment_item title="Hover title"][tw_entertainment_item title="Hover title"][tw_entertainment_item title="Hover title"]',
    "js_view" => 'VcColumnView'
));
class WPBakeryShortCode_tw_entertainment extends WPBakeryShortCodesContainer{}