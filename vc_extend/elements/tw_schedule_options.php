<?php 
global $waves_element_options;
$params=array(
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Main Title HTML Tag', 'waves'),
        'param_name' => 'schedule_tag',
        'value' => $waves_element_options['other']['heading_tag'],
        'std' => 'h4',
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Main Title Animate?', 'waves'),
        'param_name' => 'title_animate',
        'value' => array(esc_html__('Yes', 'waves') => 'true'),
        'std' => 'false',
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Main Title', 'waves'),
        'param_name' => 'title',
        'value' => esc_html__( 'Your Heading', 'waves'),
        "admin_label" => true,
    ),
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Sub Title', 'waves'),
        'param_name' => 'subtitle',
        'value' => esc_html__( '', 'waves'),
        'std' => 'We Are Minimal',
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__('Sub Title behind the Main Title', 'waves'),
        'param_name' => 'subtitle_behind',
        'value' => array(esc_html__('Yes', 'waves') => 'true'),
        'std' => '',
    ),
    array(
        'type' => 'textarea_html',
        'heading' => esc_html__( 'Description', 'waves'),
        'param_name' => 'content',
        'std' => 'Your Description',
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Heading Choose Align', 'waves'),
        'param_name' => 'title_align',
        'value' => array(
            esc_html__( 'Center', 'waves') => 'uk-text-center',
            esc_html__( 'Left', 'waves') => 'uk-text-left',
            esc_html__( 'Right', 'waves') => 'uk-text-right'
        ),
        'std' => 'uk-text-center',
    ),
    array(
        'type' => 'dropdown',
        'heading' => esc_html__( 'Heading Max Width', 'waves'),
        'param_name' => 'max_width',
        'value' => array(
            esc_html__( '400px', 'waves') => 'title_400',
            esc_html__( '600px', 'waves') => 'title_600',
            esc_html__( '700px', 'waves') => 'title_700',
            esc_html__( '800px', 'waves') => 'title_large',
            esc_html__( 'Full', 'waves') => 'title_full'
        ),
        'std' => 'title_600',
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general'],
    $waves_element_options['custom_font']
);
vc_map(array(
    "name" => esc_html__( "schedule", 'waves'),
    "description" => esc_html__( "Цагийн хуваарь.", 'waves' ),
    "base" => "tw_schedule",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_schedule extends WPBakeryShortCode{
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