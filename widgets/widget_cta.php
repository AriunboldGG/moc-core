<?php
class waves_cta_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'tw-cta-widget', esc_html__('Lvly: Call to action', 'waves'), array('classname' => 'tw-cta-widget', 'description' => esc_html__('Displays call to action', 'waves'))
        );
    }

    function widget( $args, $instance ) {
        extract($args);

        /* Doing the Validate */
        $allowed_tags = array(
            'aside' => array(
                'id'    => array(),
                'class' => array()
            ),
            'div' => array(
                'id'    => array(),
                'class' => array()
            ),
            'h3' => array(
                'class' => array()
            ),
            'span' => array(
                'class' => array()
            )
        );

        echo (isset($before_widget)) ? (wp_kses($before_widget, $allowed_tags) ) : '';

            // $instance['title']     = sanitize_text_field( $new_instance['title'] );
            // $instance['desc']      = sanitize_text_field( $new_instance['desc'] );
            // $instance['img_url']   = sanitize_text_field( $new_instance['img_url'] );
            // $instance['link']      = sanitize_text_field( $new_instance['link'] );
            // $instance['link_text'] = sanitize_text_field( $new_instance['link_text'] );
            echo '<div class="tw-cta-widget-inner"' . ( empty( $instance['img_url'] ) ? '' : ( ' style="background-image: url(' . esc_url( $instance['img_url'] ) . ');"' ) ) . '>';
                if ( ! empty( $instance['title'] ) ) {
                    echo '<h3 class="tw-cta-widget-title">' . esc_html( $instance['title'] ) . '</h3>';
                }
                if ( ! empty( $instance['desc'] ) ) {
                    echo '<div class="tw-cta-widget-desc">' . esc_html( $instance['desc'] ) . '</div>';
                }
                if ( ! empty( $instance['link'] ) && ! empty( $instance['link_text'] ) ) {
                    echo '<div class="uk-text-right">';
                        echo '<a class="tw-button tw-cta-widget-link" href="' . esc_url( $instance['link'] ) . '">' . esc_html( $instance['link_text'] ) . '</a>';
                    echo '</div>';
                }
            echo '</div>';
        echo wp_kses($after_widget, $allowed_tags);
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'title' => '',
            'desc' => '',
            'img_url' => '',
            'link' => '',
            'link_text' => '',
        ));

        $title     = isset( $instance['title'] )     ? strip_tags( $instance['title'] )     : '';
        $desc      = isset( $instance['desc'] )      ? strip_tags( $instance['desc'] )      : '';
        $img_url   = isset( $instance['img_url'] )   ? strip_tags( $instance['img_url'] )   : '';
        $link      = isset( $instance['link'] )      ? strip_tags( $instance['link'] )      : '';
        $link_text = isset( $instance['link_text'] ) ? strip_tags( $instance['link_text'] ) : ''; ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('desc')); ?>"><?php esc_html_e('desc:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>" type="text" value="<?php echo esc_attr($desc); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('img_url')); ?>"><?php esc_html_e('img_url:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('img_url')); ?>" name="<?php echo esc_attr($this->get_field_name('img_url')); ?>" type="text" value="<?php echo esc_attr($img_url); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link')); ?>"><?php esc_html_e('link:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link')); ?>" name="<?php echo esc_attr($this->get_field_name('link')); ?>" type="text" value="<?php echo esc_attr($link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link_text')); ?>"><?php esc_html_e('link_text:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link_text')); ?>" name="<?php echo esc_attr($this->get_field_name('link_text')); ?>" type="text" value="<?php echo esc_attr($link_text); ?>" />
        </p><?php
    }

    function update( $new_instance, $instance ) {
        $instance['title']     = sanitize_text_field( $new_instance['title'] );
        $instance['desc']      = sanitize_text_field( $new_instance['desc'] );
        $instance['img_url']   = sanitize_text_field( $new_instance['img_url'] );
        $instance['link']      = sanitize_text_field( $new_instance['link'] );
        $instance['link_text'] = sanitize_text_field( $new_instance['link_text'] );
        
        return $instance;
    }
}

// Init Widget
function lvly_cta_widget_register() {
    register_widget("waves_cta_widget");
}
add_action( 'widgets_init', 'lvly_cta_widget_register' );