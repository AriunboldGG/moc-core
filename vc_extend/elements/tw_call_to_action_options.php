<?php 
global $waves_element_options;
$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Insert Your Title', 'waves' ),
        'param_name' => 'callout_title',
        'value' => esc_html__( 'Эвтэй бүтээлч Монголчууд', 'waves' ),
        "admin_label" => true,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__('Insert Your Description', 'waves' ),
        'param_name' => 'callout_desc',
        'value' => 'We have a large scale group to support each other in this game, Join us to get the news as soon as possible and follow our latest announcements.',
    ),
    array(
        'type' => 'vc_link',
        'heading' => esc_html__('Button Link & Text', 'waves'),
        'param_name' => 'link',
        'value' => esc_html__('url:#|title:Дэлгэрэнгүй', 'waves'),
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general']
    // $waves_element_options['custom_font']
);
vc_map(array(
    "name" => esc_html__( "Call to Action", 'waves' ),
    "description" => esc_html__( "Note: Insert any shortcodes on WYSIWYG editor.", 'waves' ),
    "base" => "tw_call_to_action",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_call_to_action extends WPBakeryShortCode{
     /**
    * Used to get field name in vc_map function for google_fonts, font_container and etc..
    *
    * @param $key
    *
    * @since 4.4
    * @return bool
    */
    protected function getField( $key ) {
        return isset( $this->fields[ $key ] ) ? $this->fields[ $key ] : false;
    }

    /**
    * Get param value by providing key
    *
    * @param $key
    *
    * @since 4.4
    * @return array|bool
    */
    protected function getParamData( $key ) {
            return WPBMap::getParam( $this->shortcode, $this->getField( $key ) );
    }
}