<?php
global $waves_element_options;
$params=array(
    array(
        'type' => 'textfield',
        'heading' => esc_html__( 'Active section', 'waves'),
        'param_name' => 'active_tab',
        'description' => esc_html__( 'Enter section number to be active on load or enter "false" to collapse all sections.', 'waves'),
        'std' => '1'
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Allow collapse all sections?', 'waves'),
        'param_name' => 'collapsible',
        'description' => esc_html__( 'If checked, it is allowed to collapse all sections.', 'waves'),
        'value' => array( esc_html__( 'Yes', 'waves') => 'yes' )
    ),
    array(
        'type' => 'checkbox',
        'heading' => esc_html__( 'Allow multiple sections?', 'waves'),
        'param_name' => 'multiple',
        'description' => esc_html__( 'If checked, it is allowed to multiple sections.', 'waves'),
        'value' => array( esc_html__( 'Yes', 'waves') => 'yes' )
    ),
);
$params=array_merge(
    $params,
    $waves_element_options['general']
);
vc_map(array(
    'name' => esc_html__( 'Accordion Job', 'waves'),
    "description" => esc_html__( "Display your FAQ.", 'waves' ),
    'base' => 'vc_accordion_job',
    'show_settings_on_create' => false,
    'is_container' => true,
    'icon' => 'waves-element-icon',
    "category" => 'ThemeWaves',
    'description' => esc_html__( 'Collapsible content panels', 'waves'),
    "params" => $params,
    'custom_markup' => '<div class="wpb_accordion_holder wpb_holder clearfix vc_container_for_children">%content%</div><div class="tab_controls"><a class="add_tab" title="' . esc_html__( 'Add section', 'waves') . '"><span class="vc_icon"></span> <span class="tab-label">' . esc_html__( 'Add section', 'waves') . '</span></a></div>',
    'default_content' => '[vc_accordion_job_tab title="' . esc_html__( 'Section 1', 'waves') . '"][/vc_accordion_job_tab][vc_accordion_job_tab title="' . esc_html__( 'Section 2', 'waves') . '"][/vc_accordion_job_tab]',
    'js_view' => 'VcAccordionView',
));