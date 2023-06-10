<?php 
global $waves_element_options, $wp_registered_sidebars;

$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Уран бүтээлчид', 'waves'),
        "value" =>esc_html__('Уран бүтээлчид', 'waves'),
        'param_name' => 'title',
        "admin_label" => true,
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Layout', 'waves'),
        'param_name' => 'layout',
        'value' => array(
            esc_html__('style-1', 'waves')=>'',
            esc_html__('style-2', 'waves')=>'style2',
        ),
        'std' => '',
        "admin_label" => true,
    ),
    array(
        'type' => 'tw_category',
        'size' => 10,
        'heading' => esc_html__( 'Post category', 'waves'),
        'value' => 'team_cat',
        'std' => '',
        'param_name' => 'cats',
        'description' => esc_html__( 'Select category.', 'waves'),
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general']
);
vc_map(array(
    "name" => esc_html__( "Уран бүтээлчид", 'waves'),
    "description" => esc_html__( "Main Blog Posts with Styles and Customizable options.", 'waves' ),
    "base" => "tw_team",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_team extends WPBakeryShortCode{}