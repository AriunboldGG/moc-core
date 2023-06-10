<?php 
$params=array(
    array(
        'type' => 'attach_image',
        'heading' => esc_html__( 'Choose Image', 'waves'),
        'param_name' => 'image',
        'value' => ''
    ),
);
vc_map(array(
    "name" => esc_html__( "Sanal Iconbox Item", 'waves'),
    "base" => "tw_partner_iconbox_item",
    "content_element" => true,
    "as_child" => array('only' => 'tw_partner_iconbox'),
    "icon" => "",
    "params" => $params,
));
class WPBakeryShortCode_tw_partner_iconbox_item extends WPBakeryShortCode{}