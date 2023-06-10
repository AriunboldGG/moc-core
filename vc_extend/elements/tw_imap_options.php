<?php
global $waves_element_options;
$params = $waves_element_options['general'];
vc_map(array(
    "name" => 'Орон зайн мэдээлэл',
    "base" => "tw_imap",
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_imap extends WPBakeryShortCode{}