<?php
global $waves_element_options;

$ops = array(
    'Сонгох'             => '',
    'Уран бүтээл'        => 'count_art',
    'Үзвэр үйлчилгээ'    => 'count_event',
    'Соёлын биет өв'     => 'count_physical_cultural_heritage',
    'Соёлын биет бус өв' => 'count_intangible_cultural_heritage',
    'Баримтат өв'        => 'count_documentary_heritage',
    'Жүжигчид'           => 'count_actors',
    'Тоглосон жүжиг'     => 'count_play_performed',
);
if ( defined( 'ICT_PORTAL_MAIN' ) ) {
    $ops['Харъяа байгууллага'] = 'count_organization';
}

$params=array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__('Select Count', 'waves'),
        'param_name' => 'counter_data',
        "admin_label" => true,
        'value' => $ops,
        'std' => '',
    ),

    array(
        'type' => 'tw_number',
        'heading' => esc_html__( 'Number', 'waves' ),
        'min' => 0,
        "value" =>'421',
        'param_name' => 'counter_number',
        'dependency' => array(
            'element' => 'counter_data',
            'value' => array( '' ),
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Unit or Px or Em', 'waves' ),
        "value" => esc_html__('', 'waves'),
        'param_name' => 'counter_data_title',
        'description' => esc_html__( 'Appended after the Number', 'waves'),
        'dependency' => array(
            'element' => 'counter_data',
            'value' => array( '' ),
        ),
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves' ),
        "value" => esc_html__('Happy customers', 'waves'),
        'param_name' => 'counter_title',
        "admin_label" => true,
        'dependency' => array(
            'element' => 'counter_data',
            'value' => array( '' ),
        ),
    ),
);

$params=array_merge(
    $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "Counter Up", 'waves' ),
    "description" => esc_html__( "Display your Milestones.", 'waves' ),
    "base" => "tw_counterup",
    "content_element" => true,
    "icon" => "", // Simply pass url to your icon here
    "params" => $params,
));
class WPBakeryShortCode_tw_counterup extends WPBakeryShortCode{}