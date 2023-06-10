<?php 
global $waves_element_options;

$params=array(
    array(
        'type' => 'tw_category',
        'size' => 10,
        'heading' => esc_html__( 'Report Types', 'waves'),
        'value' => 'reports_type',
        'std' => '',
        'param_name' => 'reports_types',
        'description' => esc_html__( 'Select Law Type.', 'waves'),
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Pagination ?', 'waves' ),
        'param_name' => 'pagination',
        'value' => array(
            esc_html__( 'None', 'waves' ) => 'none',
            esc_html__( 'Simple', 'waves' ) => 'simple',
            ),
        'std' => 'simple',
        'admin_label' => true,
        'group' => 'Content Options',
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general']
);
vc_map(array(
    "name" => esc_html__( "Report - Тайлан, мэдээлэл", 'waves'),
    // "description" => esc_html__( "Main Blog Posts with Styles and Customizable options.", 'waves' ),
    "base" => "tw_report",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ICTGroup',
    "params" => $params,
));
class WPBakeryShortCode_tw_report extends WPBakeryShortCode{}