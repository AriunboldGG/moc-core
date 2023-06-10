<?php 
$params=array(
    array(
        'type' => 'attach_image',
        'heading' => esc_html__( 'Choose Image', 'waves'),
        'param_name' => 'image',
        'value' => ''
    ),
    array(
        'type' => 'textarea_html',
        'heading' => esc_html__('Content', 'waves' ),
        'param_name' => 'content',
        "admin_label" => true,
        'value' => esc_html__( 'Duis sed odio sit amet nibh vulputate cursus sit amet mauris morbi accumsan ipsum velit auctor ornare odio.', 'waves' ),
    ),
);
vc_map(array(
    "name" => esc_html__( "Contact - Холбоо барих", 'waves'),
    "base" => "tw_contact",
    "content_element" => true,
    "icon" => "",
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_contact extends WPBakeryShortCode{}