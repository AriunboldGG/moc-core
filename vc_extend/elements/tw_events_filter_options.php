<?php 
global $waves_element_options;


$params=array_merge(
    // $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "Events With Filter", 'waves'),
    "base" => "tw_events_filter",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_events_filter extends WPBakeryShortCode{}