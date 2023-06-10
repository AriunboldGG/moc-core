<?php 
global $waves_element_options;

$params=array(

    /* Carousel */
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Title', 'waves'),
        'param_name' => 'title',
        'value' => esc_html__( 'Онцлох Мэдээ', 'waves'),
        "admin_label" => true,
    ),
    // array(
    //     'type' => 'tw_category',
    //     'size' => 10,
    //     'heading' => esc_html__( 'Post category', 'waves'),
    //     'value' => 'category',
    //     'std' => '',
    //     'param_name' => 'cats',
    //     'description' => esc_html__( 'Select category.', 'waves'),
    // ),
    array(
        'type' => 'tw_number',
        'min' => -1,
        'heading' => esc_html__( 'Count', 'waves'),
        'param_name' => 'posts_per_page',
        'value' => '9',
        "admin_label" => true,
        'description' => esc_html__( 'Only integer value.', 'waves'),
    ),

    /* Left Tab */
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Left Tab Title', 'waves'),
        'param_name' => 'left_tab_title',
        'value' => esc_html__( 'Шинэ', 'waves'),
        "admin_label" => true,
    ),
    array(
        'type' => 'tw_category',
        'size' => 10,
        'heading' => esc_html__( 'Left Tab Category', 'waves'),
        'value' => 'category',
        'std' => '',
        // 'param_name' => 'left_tab_cats',
        'param_name' => 'left_tab_org_cats',
        'description' => esc_html__( 'Select category.', 'waves'),
    ),
    array(
        'type' => 'tw_number',
        'min' => -1,
        'heading' => esc_html__( 'Left Tab Count', 'waves'),
        'param_name' => 'left_tab_posts_per_page',
        'value' => '9',
        "admin_label" => true,
        'description' => esc_html__( 'Only integer value.', 'waves'),
    ),

    /* Right Tab */
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Right Tab Title', 'waves'),
        'param_name' => 'right_tab_title',
        'value' => esc_html__( 'Байгууллагууд', 'waves'),
        "admin_label" => true,
    ),
    array(
        'type' => 'tw_category',
        'size' => 10,
        'heading' => esc_html__( 'Right Tab Category', 'waves'),
        'value' => 'organization_cat',
        'std' => '',
        'param_name' => 'right_tab_cats',
        'description' => esc_html__( 'Select category.', 'waves'),
    ),
    array(
        'type' => 'tw_number',
        'min' => -1,
        'heading' => esc_html__( 'Right Tab Count', 'waves'),
        'param_name' => 'right_tab_posts_per_page',
        'value' => '9',
        "admin_label" => true,
        'description' => esc_html__( 'Only integer value.', 'waves'),
    ),
);

$params=array_merge(
    $params,
    $waves_element_options['general']
);

vc_map(array(
    "name" => esc_html__( "News Organization", 'waves'),
    "description" => esc_html__( "Main Blog Posts with Styles and Customizable options.", 'waves' ),
    "base" => "tw_news_organization",
    "class" => "",
    "icon" => "", // Simply pass url to your icon here
    "category" => 'ThemeWaves',
    "params" => $params,
));
class WPBakeryShortCode_tw_news_organization extends WPBakeryShortCode{}