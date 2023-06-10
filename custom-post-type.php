<?php
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( defined( 'ICT_PORTAL_MAIN' ) ) {

    /* * *********************** */
    /* Custom post type: Organization */
    /* * *********************** */
    if( ! post_type_exists( 'organization' ) ) {

        if (!function_exists('tw_organization_register')){
            add_action('init', 'tw_organization_register', 10);
            function tw_organization_register() {
                $slug = 'organization';
                
                $labels = array(
                    'name' => esc_html__('Байгууллага','lvly'),
                    'singular_name' => esc_html__('Байгууллага', 'lvly'),
                    'add_new' => esc_html__('Шинээр нэмэх', 'lvly'),
                    'add_new_item' => esc_html__('Шинээр нэмэх', 'lvly'),
                    'edit_item' => esc_html__('Байгууллага засах', 'lvly'),
                    'new_item' => esc_html__('Шинээр Байгууллага нэмэх', 'lvly'),
                    'all_items' => esc_html__('Байгууллагууд', 'lvly'),
                    'view_item' => esc_html__('Байгууллага Үзэх', 'lvly'),
                    'search_items' => esc_html__('Хайлт хийх', 'lvly'),
                    'not_found' =>  esc_html__('Илэрц олдсонгүй', 'lvly'),
                    'not_found_in_trash' => esc_html__('Хогийн савнаас илэрц олдсонгүй', 'lvly'),
                    'menu_name' => esc_html__('Байгууллага', 'lvly')
                );    
                $args = array(
                    'labels' => $labels,
                    'public' => true,
                    'has_archive' => false,
                    'publicly_queryable' => false,
                    'exclude_from_search' => true,
                    'show_ui' => true,
                    'hierarchical' => false,
                    'show_in_rest'  => true,
                    'rest_base' => 'organization',
                    'menu_icon' => 'dashicons-bank',
                    'rewrite' => array( 'slug' => $slug),
                    'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail')
                );
                register_post_type('organization', $args);
                register_taxonomy("organization_cat", array("organization"), array("hierarchical" => true, "label" => esc_html__("Ангилал", 'lvly'), "singular_label" => esc_html__("Ангилал", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_category'), 'show_in_rest' => true,'rest_base' => 'organization_cats', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
                register_taxonomy("organization_type", array("organization"), array("hierarchical" => true, "label" => esc_html__("Төрөл", 'lvly'), "singular_label" => esc_html__("Төрөл", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_type'), 'show_in_rest' => true,'rest_base' => 'organization_types', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
                flush_rewrite_rules();
            }
        }

        if (!function_exists('tw_organization_edit_columns')){
            add_filter('manage_edit-organization_columns', 'tw_organization_edit_columns');
            function tw_organization_edit_columns($columns){	
                $newcolumns = array(
                    "cb" => "<input type=\"checkbox\" />",
                    "title" => esc_html__("Хууль эрх зүйн гарчиг", 'lvly'),
                    "organization_cat" => esc_html__("Categories", 'lvly'),
                );
                $columns= array_merge($newcolumns, $columns);
                return $columns;
            }
        }
    }

    /* * *********************** */
    /* Custom post type: Heritage */
    /* * *********************** */
    if( ! post_type_exists( 'heritage' ) ) {

        if (!function_exists('tw_heritage_register')){
            add_action('init', 'tw_heritage_register', 10);
            function tw_heritage_register() {
                $slug = 'heritage';
                
                $labels = array(
                    'name' => esc_html__('Өв','lvly'),
                    'singular_name' => esc_html__('Өв', 'lvly'),
                    'add_new' => esc_html__('Шинээр нэмэх', 'lvly'),
                    'add_new_item' => esc_html__('Шинээр нэмэх', 'lvly'),
                    'edit_item' => esc_html__('Өв засах', 'lvly'),
                    'new_item' => esc_html__('Шинээр Өв нэмэх', 'lvly'),
                    'all_items' => esc_html__('Өвүүд', 'lvly'),
                    'view_item' => esc_html__('Өв Үзэх', 'lvly'),
                    'search_items' => esc_html__('Хайлт хийх', 'lvly'),
                    'not_found' =>  esc_html__('Илэрц олдсонгүй', 'lvly'),
                    'not_found_in_trash' => esc_html__('Хогийн савнаас илэрц олдсонгүй', 'lvly'),
                    'menu_name' => esc_html__('Өв', 'lvly')
                );    
                $args = array(
                    'labels' => $labels,
                    'public' => true,
                    'has_archive' => false,
                    'publicly_queryable' => true,
                    'exclude_from_search' => true,
                    'show_ui' => true,
                    'hierarchical' => false,
                    'show_in_rest'  => true,
                    'rest_base' => 'heritage',
                    'menu_icon' => 'dashicons-bank',
                    'rewrite' => array( 'slug' => $slug),
                    'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail')
                );
                register_post_type('heritage', $args);
                register_taxonomy("heritage_cat", array("heritage"), array("hierarchical" => true, "label" => esc_html__("Ангилал", 'lvly'), "singular_label" => esc_html__("Ангилал", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_category'), 'show_in_rest' => true,'rest_base' => 'heritage_cats', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
                register_taxonomy("heritage_region", array("heritage"), array("hierarchical" => true, "label" => esc_html__("Аймаг Сум", 'lvly'), "singular_label" => esc_html__("Аймаг Сум", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_region'), 'show_in_rest' => true,'rest_base' => 'heritage_regions', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
                flush_rewrite_rules();
            }
        }
    }
}

if(!post_type_exists( 'team' )) {
    if (!function_exists('tw_team_register')){
        add_action('init', 'tw_team_register', 10);
        function tw_team_register() {
            $slug = 'team';
            if(function_exists('waves_option')){
                $slug = waves_option('team_slug', 'team');
            }
             
            $labels = array(
                'name' => esc_html__('Уран бүтээлчид','waves'),
                'singular_name' => esc_html__('Team', 'waves'),
                'add_new' => esc_html__('Add New', 'waves'),
                'add_new_item' => esc_html__('Add New Artists', 'waves'),
                'edit_item' => esc_html__('Edit Artist', 'waves'),
                'new_item' => esc_html__('New Artist', 'waves'),
                'all_items' => esc_html__('All Artists', 'waves'),
                'view_item' => esc_html__('View Artist', 'waves'),
                'search_items' => esc_html__('Search Artists', 'waves'),
                'not_found' =>  esc_html__('No Team found', 'waves'),
                'not_found_in_trash' => esc_html__('No Team found in Trash', 'waves'),
                'menu_name' => esc_html__('Уран бүтээлчид', 'waves')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'hierarchical' => false,

                'menu_icon' => 'dashicons-tagcloud',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'page-attributes','thumbnail','custom-fields','revisions')
            );
            register_post_type('team', $args);
            register_taxonomy("team_cat", array("team"), array("hierarchical" => true, "label" => esc_html__("Artist Categories", 'waves'), "singular_label" => esc_html__("Team Category", 'waves'), 'rewrite' => array( 'slug' => $slug.'_category')));
            flush_rewrite_rules();
        }
    }

    if (!function_exists('tw_team_edit_columns')){
        add_filter('manage_edit-team_columns', 'tw_team_edit_columns');
        function tw_team_edit_columns($columns){	
            $newcolumns = array(
                "cb" => "<input type=\"checkbox\" />",
                "title" => esc_html__("Artist Title", 'waves'),
                "team_cat" => esc_html__("Categories", 'waves'),
            );
            $columns= array_merge($newcolumns, $columns);
            return $columns;
        }
    }
}

/* Programm - Хөтөлбөр */ 
if(!post_type_exists( 'programm' )) {
    if (!function_exists('tw_programm_register')){
        add_action('init', 'tw_programm_register', 10);
        function tw_programm_register() {
            $slug = 'programm';
            if(function_exists('waves_option')){
                $slug = waves_option('programm_slug', 'programm');
            }
             
            $labels = array(
                'name' => esc_html__('Хөтөлбөрүүд','waves'),
                'singular_name' => esc_html__('Хөтөлбөр', 'waves'),
                'add_new' => esc_html__('Add New', 'waves'),
                'add_new_item' => esc_html__('Add New Artists', 'waves'),
                'edit_item' => esc_html__('Edit Programm', 'waves'),
                'new_item' => esc_html__('New Programm', 'waves'),
                'all_items' => esc_html__('All Programms', 'waves'),
                'view_item' => esc_html__('View Programm', 'waves'),
                'search_items' => esc_html__('Search Programms', 'waves'),
                'not_found' =>  esc_html__('No Prgramm found', 'waves'),
                'not_found_in_trash' => esc_html__('No Team found in Trash', 'waves'),
                'menu_name' => esc_html__('Хөтөлбөрүүд', 'waves')
            );    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'hierarchical' => false,

                'menu_icon' => 'dashicons-tagcloud',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'page-attributes','thumbnail','custom-fields','revisions')
            );
            register_post_type('programm', $args);
            register_taxonomy("programm_cat", array("programm"), array("hierarchical" => true, "label" => esc_html__("Programm Categories", 'waves'), "singular_label" => esc_html__("Programm Category", 'waves'), 'rewrite' => array( 'slug' => $slug.'_category')));
            flush_rewrite_rules();
        }
    }

    if (!function_exists('tw_programm_edit_columns')){
        add_filter('manage_edit-programm_columns', 'tw_programm_edit_columns');
        function tw_programm_edit_columns($columns){	
            $newcolumns = array(
                "cb" => "<input type=\"checkbox\" />",
                "title" => esc_html__("Artist Title", 'waves'),
                "programm_cat" => esc_html__("Categories", 'waves'),
            );
            $columns= array_merge($newcolumns, $columns);
            return $columns;
        }
    }
}


/* * *********************** */
/* Custom Taxonomy: Event Type  */
/* * *********************** */
if ( ! function_exists( 'tw_event_type_register' ) ) {
    add_action( 'init', 'tw_event_type_register', 10 );
    function tw_event_type_register() {
        if ( post_type_exists( 'event' ) ) {
            register_taxonomy(
                "event_type",
                array("event"),
                array(
                    "hierarchical" => true,
                    "label" => esc_html__( "Event Types", 'waves' ),
                    "singular_label" => esc_html__( "Event Type", 'waves' ),
                    'rewrite' => array( 'slug' => 'event_type' )
                )
            );
        }
    }
}

/* * *********************** */
/* Custom post type: Lvly Content Block */
/* * *********************** */
if(!post_type_exists( 'lovelyblock' )){


    if (!function_exists('tw_lovelyblock_register')){
        add_action('init', 'tw_lovelyblock_register', 10);
        function tw_lovelyblock_register() {
            $slug = 'lovelyblock';
             
            $labels = array(
                'name' => esc_html__('Content Blocks','waves'),
                'singular_name' => esc_html__('Content Block', 'waves'),
                'add_new' => esc_html__('Add New', 'waves'),
                'add_new_item' => esc_html__('Add New', 'waves'),
                'edit_item' => esc_html__('Edit Block', 'waves'),
                'new_item' => esc_html__('New Content Block', 'waves'),
                'all_items' => esc_html__('Content Blocks', 'waves'),
                'view_item' => esc_html__('View Content Block', 'waves'),
                'search_items' => esc_html__('Search Content Blocks', 'waves'),
                'not_found' =>  esc_html__('No Content Block found', 'waves'),
                'not_found_in_trash' => esc_html__('No Content Block found in Trash', 'waves'),
                'menu_name' => esc_html__('Content Block', 'waves')
            );    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'show_ui' => true,
                'hierarchical' => false,

                'menu_icon' => 'dashicons-tagcloud',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'revisions')
            );
            register_post_type('lovelyblock', $args);
            register_taxonomy("lovelyblock_cat", array("lovelyblock"), array("hierarchical" => true, "label" => esc_html__("Block Categories", 'waves'), "singular_label" => esc_html__("Block Category", 'waves'), 'rewrite' => array( 'slug' => $slug.'_category')));
            flush_rewrite_rules();
        }
    }

    if (!function_exists('tw_lovelyblock_edit_columns')){
        add_filter('manage_edit-lovelyblock_columns', 'tw_lovelyblock_edit_columns');
        function tw_lovelyblock_edit_columns($columns){	
            $newcolumns = array(
                "cb" => "<input type=\"checkbox\" />",
                "title" => esc_html__("Block Title", 'waves'),
                "lovelyblock_cat" => esc_html__("Categories", 'waves'),
            );
            $columns= array_merge($newcolumns, $columns);
            return $columns;
        }
    }
}

/* * *********************** */
/* Custom post type: Reports*/
/* * *********************** */
if( ! post_type_exists( 'reports' ) ) {
    if ( ! function_exists( 'tw_reports_register' ) ) {
        add_action('init', 'tw_reports_register', 10);
        function tw_reports_register() {
            $slug = 'reports';
             
            $labels = array(
                'name' => esc_html__('Тайлан, мэдээлэл ','lvly'),
                'singular_name' => esc_html__('Тайлан, мэдээлэл ', 'lvly'),
                'add_new' => esc_html__('Шинээр тайлан, мэдээлэл ', 'lvly'),
                'add_new_item' => esc_html__('Шинээр нэмэх', 'lvly'),
                'edit_item' => esc_html__('Тайлан, мэдээлэл  засах', 'lvly'),
                'new_item' => esc_html__('Шинээр Тайлан, мэдээлэл нэмэх', 'lvly'),
                'all_items' => esc_html__('Тайлан, мэдээлэллүүд', 'lvly'),
                'view_item' => esc_html__('Тайлан, мэдээлэл  Үзэх', 'lvly'),
                'search_items' => esc_html__('Хайлт хийх', 'lvly'),
                'not_found' =>  esc_html__('Илэрц олдсонгүй', 'lvly'),
                'not_found_in_trash' => esc_html__('Хогийн савнаас илэрц олдсонгүй', 'lvly'),
                'menu_name' => esc_html__('Тайлан, мэдээлэл ', 'lvly')
            );    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'show_ui' => true,
                'hierarchical' => false,
                'show_in_rest'  => true,
                'rest_base' => 'reports',
                'menu_icon' => 'dashicons-bank',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail')
            );
            register_post_type('reports', $args);
            register_taxonomy("reports_cat", array("reports"), array("hierarchical" => true, "label" => esc_html__("Ангилал", 'lvly'), "singular_label" => esc_html__("Ангилал", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_category'), 'show_in_rest' => true,'rest_base' => 'reports_cats', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
            register_taxonomy("reports_type", array("reports"), array("hierarchical" => true, "label" => esc_html__("Төрөл", 'lvly'), "singular_label" => esc_html__("Төрөл", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_type'), 'show_in_rest' => true,'rest_base' => 'reports_types', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
            flush_rewrite_rules();
        }
    }

    if (!function_exists('tw_reports_edit_columns')){
        add_filter('manage_edit-reports_columns', 'tw_reports_edit_columns');
        function tw_reports_edit_columns($columns){	
            $newcolumns = array(
                "cb" => "<input type=\"checkbox\" />",
                "title" => esc_html__("Тайлан, мэдээллийн гарчиг", 'lvly'),
                "reports_cat" => esc_html__("Categories", 'lvly'),
            );
            $columns= array_merge($newcolumns, $columns);
            return $columns;
        }
    }
}

/* * *********************** */
/* Custom post type: Laws */
/* * *********************** */
if( ! post_type_exists( 'laws' ) ) {
    if ( ! function_exists( 'tw_laws_register' ) ) {
        add_action('init', 'tw_laws_register', 10);
        function tw_laws_register() {
            $slug = 'laws';
             
            $labels = array(
                'name' => esc_html__('Хууль эрх зүй','lvly'),
                'singular_name' => esc_html__('Хууль эрх зүй', 'lvly'),
                'add_new' => esc_html__('Шинээр нэмэх', 'lvly'),
                'add_new_item' => esc_html__('Шинээр нэмэх', 'lvly'),
                'edit_item' => esc_html__('Хууль эрх зүй засах', 'lvly'),
                'new_item' => esc_html__('Шинээр Хууль эрх зүй нэмэх', 'lvly'),
                'all_items' => esc_html__('Хууль эрх зүйнүүд', 'lvly'),
                'view_item' => esc_html__('Хууль эрх зүй Үзэх', 'lvly'),
                'search_items' => esc_html__('Хайлт хийх', 'lvly'),
                'not_found' =>  esc_html__('Илэрц олдсонгүй', 'lvly'),
                'not_found_in_trash' => esc_html__('Хогийн савнаас илэрц олдсонгүй', 'lvly'),
                'menu_name' => esc_html__('Хууль эрх зүй', 'lvly')
            );    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'show_ui' => true,
                'hierarchical' => false,
                'show_in_rest'  => true,
                'rest_base' => 'laws',
                'menu_icon' => 'dashicons-bank',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail')
            );
            register_post_type('laws', $args);
            register_taxonomy("laws_cat", array("laws"), array("hierarchical" => true, "label" => esc_html__("Ангилал", 'lvly'), "singular_label" => esc_html__("Ангилал", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_category'), 'show_in_rest' => true,'rest_base' => 'laws_cats', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
            register_taxonomy("laws_type", array("laws"), array("hierarchical" => true, "label" => esc_html__("Төрөл", 'lvly'), "singular_label" => esc_html__("Төрөл", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_type'), 'show_in_rest' => true,'rest_base' => 'laws_types', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
            flush_rewrite_rules();
        }
    }

    if (!function_exists('tw_laws_edit_columns')){
        add_filter('manage_edit-laws_columns', 'tw_laws_edit_columns');
        function tw_laws_edit_columns($columns){	
            $newcolumns = array(
                "cb" => "<input type=\"checkbox\" />",
                "title" => esc_html__("Хууль эрх зүйн гарчиг", 'lvly'),
                "laws_cat" => esc_html__("Categories", 'lvly'),
            );
            $columns= array_merge($newcolumns, $columns);
            return $columns;
        }
    }
}

/* * *********************** */
/* Custom post type: Pell */
/* * *********************** */
if( ! post_type_exists( 'pells' ) ) {
    if ( ! function_exists( 'tw_pells_register' ) ) {
        add_action('init', 'tw_pells_register', 10);
        function tw_pells_register() {
            $slug = 'pells';
             
            $labels = array(
                'name' => esc_html__('Сан хөмрөг','lvly'),
                'singular_name' => esc_html__('Сан хөмрөг', 'lvly'),
                'add_new' => esc_html__('Шинээр нэмэх', 'lvly'),
                'add_new_item' => esc_html__('Шинээр нэмэх', 'lvly'),
                'edit_item' => esc_html__('Сан хөмрөг засах', 'lvly'),
                'new_item' => esc_html__('Шинээр сан хөмрөг нэмэх', 'lvly'),
                'all_items' => esc_html__('Сан хөмрөгүүд', 'lvly'),
                'view_item' => esc_html__('Сан хөмрөг Үзэх', 'lvly'),
                'search_items' => esc_html__('Хайлт хийх', 'lvly'),
                'not_found' =>  esc_html__('Илэрц олдсонгүй', 'lvly'),
                'not_found_in_trash' => esc_html__('Хогийн савнаас илэрц олдсонгүй', 'lvly'),
                'menu_name' => esc_html__('Сан хөмрөг', 'lvly')
            );    
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'show_ui' => true,
                'hierarchical' => false,
                'show_in_rest'  => true,
                'rest_base' => 'pells',
                'menu_icon' => 'dashicons-bank',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail')
            );
            register_post_type('pells', $args);
            register_taxonomy("pells_cat", array("pells"), array("hierarchical" => true, "label" => esc_html__("Ангилал", 'lvly'), "singular_label" => esc_html__("Ангилал", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_category'), 'show_in_rest' => true,'rest_base' => 'pells_cats', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
            flush_rewrite_rules();
        }
    }
}
/* ========== */

/* * *********************** */
/* Custom post type: Exhibit */
/* * *********************** */
if( ! post_type_exists( 'exhibits' ) ) {
    if ( ! function_exists( 'tw_exhibits_register' ) ) {
        add_action('init', 'tw_exhibits_register', 10);
        function tw_exhibits_register() {
            $slug = 'exhibits';
             
            $labels = array(
                'name' => esc_html__('Үзүүлэн','lvly'),
                'singular_name' => esc_html__('Үзүүлэн', 'lvly'),
                'add_new' => esc_html__('Шинээр нэмэх', 'lvly'),
                'add_new_item' => esc_html__('Шинээр нэмэх', 'lvly'),
                'edit_item' => esc_html__('Үзүүлэн засах', 'lvly'),
                'new_item' => esc_html__('Шинээр Үзүүлэн нэмэх', 'lvly'),
                'all_items' => esc_html__('Үзүүлэнүүд', 'lvly'),
                'view_item' => esc_html__('Үзүүлэн Үзэх', 'lvly'),
                'search_items' => esc_html__('Хайлт хийх', 'lvly'),
                'not_found' =>  esc_html__('Илэрц олдсонгүй', 'lvly'),
                'not_found_in_trash' => esc_html__('Хогийн савнаас илэрц олдсонгүй', 'lvly'),
                'menu_name' => esc_html__('Үзүүлэн', 'lvly')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'has_archive' => false,
                'publicly_queryable' => true,
                'exclude_from_search' => true,
                'show_ui' => true,
                'hierarchical' => false,
                'show_in_rest'  => true,
                'rest_base' => 'exhibits',
                'menu_icon' => 'dashicons-bank',
                'rewrite' => array( 'slug' => $slug),
                'supports' => array('title', 'editor', 'author', 'revisions', 'thumbnail')
            );
            register_post_type('exhibits', $args);
            register_taxonomy("exhibits_cat", array("exhibits"), array("hierarchical" => true, "label" => esc_html__("Ангилал", 'lvly'), "singular_label" => esc_html__("Ангилал", 'lvly'), 'rewrite' => array( 'slug' => $slug.'_category'), 'show_in_rest' => true,'rest_base' => 'exhibits_cats', 'rest_controller_class' => 'WP_REST_Terms_Controller',));
            flush_rewrite_rules();
        }
    }
}
/* ========== */

add_action("manage_posts_custom_column", "lvly_custom_columns");
function lvly_custom_columns($column) {
    global $post;
    switch ($column) {
        case "lovelyblock_cat":
            echo get_the_term_list($post->ID, 'lovelyblock_cat', '', ', ', '');
            break;
    }
}

add_filter('parse_query', 'lvly_convert_id_to_term_in_query');
function lvly_convert_id_to_term_in_query($query) {
	global $pagenow;
        $post_types = array(
            'lovelyblock' => 'lovelyblock_cat'
        );
        foreach($post_types as $post_type => $taxonomy){
            $q_vars    = &$query->query_vars;
            if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
                    $term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
                    $q_vars[$taxonomy] = $term->slug;
            }
        }
}

/* Events Single remove */
add_filter( 'is_post_type_viewable', function( $is_viewable, $post_type ) {
    if ( 'event' === $post_type->name ) {
        return false;
    }
    return $is_viewable;
}, 10, 2 );

/* Events REST API */
add_filter( 'register_post_type_args', function( $args, $post_type ) {
    if ( $post_type === 'event' ) {
        $args['show_in_rest'] = true;
	}
	
	return $args;
}, 99, 2 );