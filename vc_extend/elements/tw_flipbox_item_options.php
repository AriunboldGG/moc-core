<?php 
global $waves_element_options;
$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves'),
        "value" =>esc_html__('# УрлагийнБайгууллага', 'waves'),
        'param_name' => 'title',
        "admin_label" => true,
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Choose Layout Icon', 'waves'),
        'param_name' => 'layout',
        'value' => array(
            esc_html__('Top Left Icon',   'waves') => '',
            esc_html__('Top Center Icon', 'waves') => 'top_center',
            esc_html__('Top Right Icon',  'waves') => 'top_right',
            esc_html__('Left Icon',  'waves')      => 'left',
            esc_html__('Right Icon',  'waves')     => 'right',
            esc_html__('Small Layout 3',  'waves')     => 'small_layout',
        ),
        'std' => 'top_center',
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Icon Size and Title Size', 'waves'),
        'param_name' => 'size',
        'value' => array(
            esc_html__('Normal',   'waves') => '',
            esc_html__('Small icon', 'waves') => 'icon-small',
            esc_html__('Small title', 'waves') => 'small-title',
            esc_html__('Small icon and title', 'waves') => 'small-typography',
            esc_html__('Custom Typography', 'waves') => 'custom-typography',
        ),
        'std' => '',
    ),
);
$params=array_merge(
    $waves_element_options['other']['icon'],
    $waves_element_options['general'],
    $waves_element_options['other']['icon_style'],
    $params
);
vc_map(array(
    "name" => esc_html__( "FlipBox Item", 'waves'),
    "base" => "tw_flipbox_item",
    "content_element" => true,
    "as_child" => array('only' => 'tw_flipbox'),
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_flipbox_item extends WPBakeryShortCode{}