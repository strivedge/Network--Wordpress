<?php

/**
 * AddToAny WordPress Widgets
 */

/**
 * AddToAny Share widget class
 *
 * @since add-to-any .9.9.8
 */
class A2A_SHARE_SAVE_Widget extends WP_Widget {
	
	/** Constructor */
	function __construct() {
		$widget_ops = array( 
			'description' => __( 'Share buttons for sharing your content.', 'add-to-any' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( '', __( 'AddToAny Share', 'add-to-any' ), $widget_ops );
		
		// Enqueue script if in Customizer preview.
		// is_customize_preview() @since 4.0.0
		if ( function_exists( 'is_customize_preview' ) && is_customize_preview() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}
	}
	
    public function enqueue_scripts() {
        wp_enqueue_script( 'addtoany-widget-init', plugins_url( 'addtoany.admin.js', __FILE__ ), array(), '0.1', true );
    }
	
	/** Backwards compatibility for A2A_SHARE_SAVE_Widget::display(); usage. */
	public function display( $args = false ) {
		self::widget( $args, NULL );
	}

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$defaults = array(
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		);
		
		$args = wp_parse_args( $args, $defaults );
		
		echo $args['before_widget'];
		
		if ( isset( $instance ) && ! empty( $instance['title'] ) ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		ADDTOANY_SHARE_SAVE_KIT( array(
			"use_current_page" => true,
		) );

		echo $args['after_widget'];
	}
	
	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		return $instance;
	}
	
	/**
	 * @param array $instance
	 */
	public function form( $instance ) {
		$title = isset( $instance ) && ! empty( $instance['title'] ) ? __( $instance['title'] ) : '';
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'add-to-any' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<a href="options-general.php?page=addtoany"><?php _e('AddToAny Settings', 'add-to-any'); ?>...</a>
		</p>
		<?php
	}
	
}

/**
 * AddToAny Follow widget class
 *
 * @since add-to-any 1.6
 */
class A2A_Follow_Widget extends WP_Widget {
	
	/** Constructor */
	function __construct() {
		$widget_ops = array( 
			'description' => __( 'Follow buttons link to your social media.', 'add-to-any' ),
			'customize_selective_refresh' => true,
		);
		parent::__construct( '', __( 'AddToAny Follow', 'add-to-any' ), $widget_ops );
		
		// Enqueue script if in Customizer preview.
		// is_customize_preview() @since 4.0.0
		if ( function_exists( 'is_customize_preview' ) && is_customize_preview() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		}
	}
	
	/**
	 * Enqueue a script with jQuery as a dependency.
	 */
    public function enqueue_scripts() {
        wp_enqueue_script( 'addtoany-widget-init', plugins_url( 'addtoany.admin.js', __FILE__ ), array('jquery'), '0.1', true );
    }

	/**
	 * @param array $args
	 * @param array $instance
	 */
	public function widget( $args, $instance ) {
		$defaults = array(
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => '',
		);
		
		$args = wp_parse_args( $args, $defaults );
		
		echo $args['before_widget'];
		
		$instance = is_array( $instance ) ? $instance : array();
		
		if ( ! empty( $instance['title'] ) ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before_title'] . $title . $args['after_title'];
		}
		
		$active_services = array();
		
		// See which services have IDs set.
		$services = $this->get_follow_services();
		foreach ( $services as $code => $service ) {
			$code_id = $code . '_id';
			if ( ! empty( $instance[ $code_id ] ) ) {
				// Set ID value.
				$active_services[ $code ] = array( 'id' => $instance[ $code_id ] );
			}
		}
		
		ADDTOANY_FOLLOW_KIT( array(
			'buttons' => $active_services,
			'icon_size' => ! empty( $instance['icon_size'] ) ? $instance['icon_size'] : '32',
		) );

		echo $args['after_widget'];
	}
	
	/**
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = (array) $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['icon_size'] = sanitize_text_field( $new_instance['icon_size'] );
		
		// Accept service IDs.
		$services = $this->get_follow_services();
		foreach ( $services as $code => $service ) {
			$code_id = $code . '_id';
			if ( isset( $new_instance[ $code_id ] ) ) {
				$instance[ $code_id ] = sanitize_text_field( $new_instance[ $code_id ] );
			}
		}
		
		return $instance;
	}
	
	/**
	 * @param array $instance
	 */
	public function form( $instance ) {
		$instance = is_array( $instance ) ? $instance : array();
		$options = get_option( 'addtoany_options', array() );
		$services = $this->get_follow_services();
		
		$title = ! empty( $instance['title'] ) ? __( $instance['title'] ) : '';
		
		if ( ! empty( $instance['icon_size'] ) ) {
			$icon_size = $instance['icon_size'];
		} elseif ( ! empty( $options['icon_size'] ) ) {
			// Fallback to standard icon size if saved.
			$icon_size = $options['icon_size'];
		} else {
			$icon_size = '32';
		}
		
		?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title:', 'add-to-any' ); ?></label> 
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>"><?php _e( 'Icon Size:', 'add-to-any' ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'icon_size' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon_size' ) ); ?>" type="number" max="300" min="10" maxlength="3" step="2" oninput="if(this.value.length > 3) this.value=this.value.slice(0, 3)" placeholder="32" value="<?php echo esc_attr( $icon_size ); ?>">
			<small><?php esc_html_e( 'Pixels', 'add-to-any' ); ?></small>
		</p>
<?php foreach ( $services as $code => $service ) : 
		$code_id = $code . '_id';
		$id_accepted = false !== strpos( $service['href'], '${id}' );
		$id_value = ! empty( $instance[ $code_id ] ) ? $instance[ $code_id ] : '';
		$label_text = $id_accepted ? sprintf( __('%s ID:', 'add-to-any'), $service['name'] ) : sprintf( __('%s URL:', 'add-to-any'), $service['name'] );
?>
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( $code_id ) ); ?>"><?php echo esc_attr( $label_text ); ?></label>
			<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $code_id ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( $code_id ) ); ?>" type="text" value="<?php echo esc_attr( $id_value ); ?>">
			<small><?php echo wp_kses_post( str_replace( '${id}', '<u>ID</u>', $service['href'] ) ); ?></small>
		</p>
<?php endforeach; ?>
		<p>
			<a href="options-general.php?page=addtoany"><?php _e('AddToAny Settings', 'add-to-any'); ?>...</a>
		</p>
<?php
	}
	
	private function get_follow_services() {
		global $A2A_FOLLOW_services;
		
		// Make available services extensible via plugins, themes (functions.php), etc.
		$services = apply_filters( 'A2A_FOLLOW_services', $A2A_FOLLOW_services );
		$services = ( is_array( $services ) ) ? $services : array();
		
		return $services;
	}
	
}
