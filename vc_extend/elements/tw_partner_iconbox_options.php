<?php 
global $waves_element_options;
$params=array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Choose Column', 'waves'),
        'value' => array(
            esc_html__('Column 2', 'waves') => 'uk-child-width-1-2@m',
            esc_html__('Column 3', 'waves') => 'uk-child-width-1-2@s uk-child-width-1-3@m',
            esc_html__('Column 4', 'waves') => 'uk-child-width-1-2@s uk-child-width-1-4@m',
            esc_html__('Column 5', 'waves') => 'uk-child-width-1-2@s uk-child-width-1-5@m',
            esc_html__('Column 6', 'waves') => 'uk-child-width-1-2@s uk-child-width-1-4@m uk-child-width-1-6@l',
        ),
        'param_name' => 'column',
        'std' => 'uk-child-width-1-2@s uk-child-width-1-4@m',
        'description' => esc_html__( 'Select Column ?', 'waves'),
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "Partners - Хамтрагч байгууллага", 'waves'),
    "description" => esc_html__( "Display your Partners Images with Tooltip.", 'waves' ),
    "base" => "tw_partner_iconbox",
    "as_parent" => array('only' => 'tw_partner_iconbox_item'),
    "content_element" => true,
    'show_settings_on_create' => false,
    "icon" => "",
    "category" => 'ThemeWaves',
    "params" => $params,
    'default_content' => '[tw_partner_iconbox_item title="Hover title"][tw_partner_iconbox_item title="Hover title"][tw_partner_iconbox_item title="Hover title"][tw_partner_iconbox_item title="Hover title"]',
    "js_view" => 'VcColumnView'
));
class WPBakeryShortCode_tw_partner_iconbox extends WPBakeryShortCodesContainer{}