<?php 
global $waves_element_options;
$params=array_merge(
    $waves_element_options['general']
);
vc_map(array(
    "name" => esc_html__( "Title", 'waves'),
    "base" => "tw_title",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_title extends WPBakeryShortCode{}