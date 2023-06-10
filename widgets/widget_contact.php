<?php
class waves_contactinfo_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
                'tw-contact-widget', esc_html__('Lvly: Contact info', 'waves'), array('classname' => 'tw-contact-widget', 'description' => esc_html__('Displays your contact us info', 'waves'))
        );
    }

    function widget($args, $instance) {
        extract($args);
        $contact_title      = apply_filters( 'widget_contact_title',      empty($instance['contact_title']      ) ? '' : $instance['contact_title'],      $instance );
        $contact_address    = apply_filters( 'widget_contact_address',    empty($instance['contact_address']    ) ? '' : $instance['contact_address'],    $instance );
        $contact_email      = apply_filters( 'widget_contact_email',      empty($instance['contact_email']      ) ? '' : $instance['contact_email'],      $instance );
        $contact_email_text = apply_filters( 'widget_contact_email_text', empty($instance['contact_email_text'] ) ? '' : $instance['contact_email_text'], $instance );
        $contact_phone      = apply_filters( 'widget_contact_phone',      empty($instance['contact_phone']      ) ? '' : $instance['contact_phone'],      $instance );
        $contact_phone_text = apply_filters( 'widget_contact_phone_text', empty($instance['contact_phone_text'] ) ? '' : $instance['contact_phone_text'], $instance );
        $contact_fax        = apply_filters( 'widget_contact_fax',        empty($instance['contact_fax']        ) ? '' : $instance['contact_fax'],        $instance );
        $contact_fax_text   = apply_filters( 'widget_contact_fax_text',   empty($instance['contact_fax_text']   ) ? '' : $instance['contact_fax_text'],   $instance );

        $class = apply_filters('widget_class', empty($instance['class']) ? '' : $instance['class'], $instance);

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

        if (!empty($contact_title)) {
            echo wp_kses( $before_title, $allowed_tags ) . esc_html( $contact_title ) . wp_kses( $after_title, $allowed_tags );
        }
        echo '<ul>';
            if ( !empty( $contact_address ) ) {
                echo '<li>' . esc_html( $contact_address ) . '</li>';
            }
            if ( ! empty( $contact_email ) && ! empty( $contact_email_text ) ) {
                echo '<li>';
                    echo '<span>' . esc_html( $contact_email_text ) . '</span>';
                    $contact_email_items = explode( ',' , $contact_email );
                    foreach ( $contact_email_items as $i => $contact_email_item ) {
                        if ( $i ) { echo ', '; }
                        echo '<a target="_blank" href="mailto:' . esc_attr( trim( $contact_email_item ) ) . '">' . esc_html( trim( $contact_email_item ) ) . '</a>';
                    }   
                echo '</li>';
            }
            if ( ! empty( $contact_phone ) && ! empty( $contact_phone_text ) ) {
                echo '<li>';
                    echo '<span>' . esc_html( $contact_phone_text ) . '</span>';
                    $contact_phone_items = explode( ',' , $contact_phone );
                    foreach ( $contact_phone_items as $i => $contact_phone_item ) {
                        if ( $i ) { echo ', '; }
                        echo '<a target="_blank" href="tel:' . esc_attr( trim( $contact_phone_item ) ) . '">' . esc_html( trim( $contact_phone_item ) ) . '</a>';
                    }   
                echo '</li>';
            }
            if ( ! empty( $contact_fax ) && ! empty( $contact_fax_text ) ) {
                echo '<li>';
                    echo '<span>' . esc_html( $contact_fax_text ) . '</span>';
                    $contact_fax_items = explode( ',' , $contact_fax );
                    foreach ( $contact_fax_items as $i => $contact_fax_item ) {
                        if ( $i ) { echo ', '; }
                        echo '<a target="_blank" href="tel:' . esc_attr( trim( $contact_fax_item ) ) . '">' . esc_html( trim( $contact_fax_item ) ) . '</a>';
                    }
                echo '</li>';
            }
        echo '</ul>';
        echo wp_kses($after_widget, $allowed_tags);
    }

    function form($instance) {
        $instance = wp_parse_args((array) $instance, array(
            'contact_title' => '',
            'contact_address' => '',
            'contact_email' => '',
            'contact_email_text' => '',
            'contact_phone' => '',
            'contact_phone_text' => '',
            'contact_fax' => '',
            'contact_fax_text' => '',
        ));

        $contact_title      = isset($instance['contact_title'])      ? strip_tags($instance['contact_title'])      : '';
        $contact_address    = isset($instance['contact_address'])    ? strip_tags($instance['contact_address'])    : '';
        $contact_email      = isset($instance['contact_email'])      ? strip_tags($instance['contact_email'])      : '';
        $contact_email_text = isset($instance['contact_email_text']) ? strip_tags($instance['contact_email_text']) : '';
        $contact_phone      = isset($instance['contact_phone'])      ? strip_tags($instance['contact_phone'])      : '';
        $contact_phone_text = isset($instance['contact_phone_text']) ? strip_tags($instance['contact_phone_text']) : '';
        $contact_fax        = isset($instance['contact_fax'])        ? strip_tags($instance['contact_fax'])        : '';
        $contact_fax_text   = isset($instance['contact_fax_text'])   ? strip_tags($instance['contact_fax_text'])   : ''; ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_title')); ?>"><?php esc_html_e('Title:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_title')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_title')); ?>" type="text" value="<?php echo esc_attr($contact_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_address')); ?>"><?php esc_html_e('Address:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_address')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_address')); ?>" type="text" value="<?php echo esc_attr($contact_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_email')); ?>"><?php esc_html_e('Email:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_email')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_email')); ?>" type="text" value="<?php echo esc_attr($contact_email); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_email_text')); ?>"><?php esc_html_e('Email Text:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_email_text')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_email_text')); ?>" type="text" value="<?php echo esc_attr($contact_email_text); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_phone')); ?>"><?php esc_html_e('Phone:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_phone')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_phone')); ?>" type="text" value="<?php echo esc_attr($contact_phone); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_phone_text')); ?>"><?php esc_html_e('Phone Text:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_phone_text')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_phone_text')); ?>" type="text" value="<?php echo esc_attr($contact_phone_text); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_fax')); ?>"><?php esc_html_e('Fax URL:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_fax')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_fax')); ?>" type="text" value="<?php echo esc_attr($contact_fax); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('contact_fax_text')); ?>"><?php esc_html_e('Fax Text:', 'waves'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('contact_fax_text')); ?>" name="<?php echo esc_attr($this->get_field_name('contact_fax_text')); ?>" type="text" value="<?php echo esc_attr($contact_fax_text); ?>" />
        </p><?php
    }

    function update($new_instance, $instance) {
        /* Strip tags (if needed) and update the widget settings. */
        $instance['contact_title']      = sanitize_text_field($new_instance['contact_title']);
        $instance['contact_address']    = strip_tags($new_instance['contact_address']);
        $instance['contact_email']      = strip_tags($new_instance['contact_email']);
        $instance['contact_email_text'] = strip_tags($new_instance['contact_email_text']);
        $instance['contact_phone']      = strip_tags($new_instance['contact_phone']);
        $instance['contact_phone_text'] = strip_tags($new_instance['contact_phone_text']);
        $instance['contact_fax']        = strip_tags($new_instance['contact_fax']);
        $instance['contact_fax_text']   = strip_tags($new_instance['contact_fax_text']);
        return $instance;
    }
}

// Init Widget
function lvly_contactinfo_widget_register() {
    register_widget("waves_contactinfo_widget");
}
add_action( 'widgets_init', 'lvly_contactinfo_widget_register' );