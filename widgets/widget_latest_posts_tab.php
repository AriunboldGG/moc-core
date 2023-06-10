<?php
class waves_latest_posts_tab_widget extends WP_Widget {
    
    function __construct() {
        $widget_ops = array('classname' => 'tw-latest-posts-tab-widget', 'description' => 'Display latest posts.');
        parent::__construct('tw-latest-posts-tab-widget', 'Lvly: Latest Posts Tab', $widget_ops);
    }
    
    function widget($args, $instance) {
        global $post;

        extract($args);
        $title = apply_filters('widget_title', $instance['title']);
        
        /* Doing the Validate */
        $allowed_tags = array(
            'aside' => array(
                    'id' => array(),
                    'class' => array()
            ),
            'div' => array(
                    'id' => array(),
                    'class' => array()
            ),
            'h3' => array(
                'class' => array()
            ),
            'span' => array(
                'class' => array()
            )
        );

        echo ( isset( $before_widget ) ) ? ( wp_kses( $before_widget, $allowed_tags ) ) : '';
            if ( ! empty( $title ) ) {
                echo wp_kses( $before_title, $allowed_tags ) . esc_html( $title ) . wp_kses( $after_title, $allowed_tags );
            }
                echo lvly_latest_news_tab( $instance );
            if ( isset( $after_widget ) ) {
                echo wp_kses( $after_widget, $allowed_tags );
            }
        wp_reset_postdata();
    }

    function update($new_instance, $instance) {
        /* Strip tags (if needed) and update the widget settings. */
        $instance['title']                    = sanitize_text_field($new_instance['title']);
        $instance['left_tab_title']           = sanitize_text_field($new_instance['left_tab_title']);
        $instance['left_tab_cats']            = wp_unslash($new_instance['left_tab_cats']);
        $instance['left_tab_posts_per_page']  = sanitize_text_field($new_instance['left_tab_posts_per_page']);
        $instance['right_tab_title']          = sanitize_text_field($new_instance['right_tab_title']);
        $instance['right_tab_cats']           = wp_unslash($new_instance['right_tab_cats']);
        $instance['right_tab_posts_per_page'] = sanitize_text_field($new_instance['right_tab_posts_per_page']);

        return $instance;
    }

    function form($instance) {
        //Output admin widget options form
        extract(shortcode_atts(array(
            'title'                    => '',
            'left_tab_title'           => '',
            'left_tab_cats'            => array(),
            'left_tab_posts_per_page'  => 9,
            'right_tab_title'          => '',
            'right_tab_cats'           => array(),
            'right_tab_posts_per_page' => 9,
        ), $instance));
        if ( ! is_array( $left_tab_cats ) ) {
            $left_tab_cats = array();
        }
        if ( ! is_array( $right_tab_cats ) ) {
            $right_tab_cats = array();
        }
        $post_type ='post';
        $post_categories = get_categories( array( 'hide_empty' => false ) );

        $tax = get_object_taxonomies( $post_type ); ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'waves');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('left_tab_title')); ?>"><?php esc_html_e('Left Tab Title:', 'waves');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('left_tab_title')); ?>" name="<?php echo esc_attr($this->get_field_name('left_tab_title')); ?>" value="<?php echo esc_attr($left_tab_title); ?>"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('left_tab_posts_per_page')); ?>"><?php esc_html_e('Left Tab Per Page:', 'waves');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('left_tab_posts_per_page')); ?>" name="<?php echo esc_attr($this->get_field_name('left_tab_posts_per_page')); ?>" value="<?php echo esc_attr($left_tab_posts_per_page); ?>" type="number" min="-1" max="100" step="1" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('left_tab_cats')); ?>"><?php esc_html_e('Left Tab Categories:', 'waves');?></label>
            <ul id="<?php echo esc_attr($this->get_field_id('left_tab_cats')); ?>" style="height:150px; overflow:auto; border:1px solid #dfdfdf;"><?php
                if ( ! empty( $post_categories ) ) {
                    foreach( $post_categories as $post_category ) {
                        echo '<li><label class="selectit"><input value="' . $post_category->slug . '" type="checkbox" name="' . esc_attr( $this->get_field_name('left_tab_cats') ) . '[]"' . ( in_array( $post_category->slug, $left_tab_cats ) ? ' checked="checked"' : '' ) . '>' . $post_category->name . '</label></li>';
                    }
                } ?>
            </ul>        
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('right_tab_title')); ?>"><?php esc_html_e('Right Tab Title:', 'waves');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('right_tab_title')); ?>" name="<?php echo esc_attr($this->get_field_name('right_tab_title')); ?>" value="<?php echo esc_attr($right_tab_title); ?>"  />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('right_tab_posts_per_page')); ?>"><?php esc_html_e('Right Tab Per Page:', 'waves');?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('right_tab_posts_per_page')); ?>" name="<?php echo esc_attr($this->get_field_name('right_tab_posts_per_page')); ?>" value="<?php echo esc_attr($right_tab_posts_per_page); ?>" type="number" min="-1" max="100" step="1" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('right_tab_cats')); ?>"><?php esc_html_e('Right Tab Categories:', 'waves');?></label>
            <ul id="<?php echo esc_attr($this->get_field_id('right_tab_cats')); ?>" style="height:150px; overflow:auto; border:1px solid #dfdfdf;"><?php
                if ( ! empty( $post_categories ) ) {
                    foreach( $post_categories as $post_category ) {
                        echo '<li><label class="selectit"><input value="' . $post_category->slug . '" type="checkbox" name="' . esc_attr( $this->get_field_name('right_tab_cats') ) . '[]"' . ( in_array( $post_category->slug, $right_tab_cats ) ? ' checked="checked"' : '' ) . '>' . $post_category->name . '</label></li>';
                    }
                } ?>
            </ul>        
        </p><?php
    }
}

// Init Widget
function lvly_latest_posts_tab_widget_register() {
    register_widget("waves_latest_posts_tab_widget");
}
add_action( 'widgets_init', 'lvly_latest_posts_tab_widget_register' );