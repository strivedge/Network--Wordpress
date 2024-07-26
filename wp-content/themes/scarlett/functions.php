<?php
/**
 * Scarlett functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Scarlett
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function scarlett_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Scarlett, use a find and replace
		* to change 'scarlett' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'scarlett', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'scarlett' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'scarlett_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'scarlett_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function scarlett_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'scarlett_content_width', 640 );
}
add_action( 'after_setup_theme', 'scarlett_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function scarlett_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'scarlett' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'scarlett' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'scarlett_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scarlett_scripts() {
	wp_enqueue_style( 'boxicons-scarlett-style', get_template_directory_uri().'/css/boxicons.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'all-scarlett-style', get_template_directory_uri().'/css/all.css', array(), _S_VERSION );
	wp_enqueue_style( 'fontawesome-scarlett-style', get_template_directory_uri().'/css/fontawesome.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'bootstrap-scarlett-style', get_template_directory_uri().'/css/bootstrap.min.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-scarlett-style', get_template_directory_uri().'/css/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-theme-scarlett-style', get_template_directory_uri().'/css/slick-theme.css', array(), _S_VERSION );
	wp_enqueue_style( 'aos-scarlett-style', get_template_directory_uri().'/css/aos.css', array(), _S_VERSION );
	
	wp_enqueue_style( 'scarlett-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'scarlett-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'scarlett-bootstrap-js', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scarlett-slick-js', get_template_directory_uri() . '/js/slick.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scarlett-aos-js', get_template_directory_uri() . '/js/aos.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scarlett-gsap-js', get_template_directory_uri() . '/js/all-gsap.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scarlett-isotope-js', get_template_directory_uri() . '/js/isotope.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scarlett-custom-js', get_template_directory_uri() . '/js/custom.js', array('jquery'), _S_VERSION, true );
	

	wp_enqueue_script( 'scarlett-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scarlett_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



//Theme Setting
add_action('acf/init', 'my_acf_op_init');
function my_acf_op_init() {
    // Check function exists.
    if( function_exists('acf_add_options_page') ) {
        // Add parent.
        $parent = acf_add_options_page(array(
            'page_title'  => __('Theme General Settings'),
            'menu_title'  => __('Theme Settings'),
            'redirect'    => false,
        ));

    }
}
// Svg Image Uploads Funtion 
function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


/*removing default submit tag*/
remove_action('wpcf7_init', 'wpcf7_add_form_tag_submit');
/*adding action with function which handles our button markup*/
add_action('wpcf7_init', 'twentysixteen_child_cf7_button');
/*adding out submit button tag*/
if (!function_exists('twentysixteen_child_cf7_button')) {
function twentysixteen_child_cf7_button() {
wpcf7_add_form_tag('submit', 'twentysixteen_child_cf7_button_handler');
}
}
/*out button markup inside handler*/
if (!function_exists('twentysixteen_child_cf7_button_handler')) {
	function twentysixteen_child_cf7_button_handler($tag) {
		$tag = new WPCF7_FormTag($tag);
		$class = wpcf7_form_controls_class($tag->type);
		$atts = array();
		$atts['class'] = $tag->get_class_option($class);
		$atts['class'] .= ' twentysixteen-child-custom-btn';
		$atts['id'] = $tag->get_id_option();
		$atts['tabindex'] = $tag->get_option('tabindex', 'int', true);
		$value = isset($tag->values[0]) ? $tag->values[0] : '';
		
		if (empty($value)) {
			$value = esc_html__('Send', 'twentysixteen');
		}

		$atts['type'] = 'submit';
		$atts = wpcf7_format_atts($atts);
		$html = sprintf('<button class="btn btn-blue">%2$s</button>', $atts, $value);
		return $html;
	}
}

add_action('wpcf7_mail_sent', 'custom_function_after_cf7_submission');

function custom_function_after_cf7_submission($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    $form_id = $contact_form->id();
	
    if ($submission) {
		$posted_data = $submission->get_posted_data();

		$post_title = '';
		
		if ($form_id == 33) {
			$post_id = isset($_POST['_wpcf7_container_post']) ? (int) $_POST['_wpcf7_container_post'] : 0;
			$post_title = get_the_title($post_id);
		} else if ($form_id == 1065 || $form_id == 1067) {
			$post_title = 'Scarlett Website (Home Page)';
		}
		error_log(print_r($posted_data, true));
		$api_data = json_encode(array(
			"LeadSource" => $post_title,
			"Status" => 2,
			"PrimaryApplicant" => array(
				"FirstName" => $posted_data['your-firstname'],
				"LastName" => $posted_data['your-lastname'], 
				"MobileNumber" => $posted_data['phone-number'],
				"Email" => $posted_data['your-email'],
			),
			"Note" => $posted_data['your-message'],
		));


		callApi($api_data);
    }
}

function callApi($api_data) {
	$api_url = 'https://api.scarlettnetwork.net/leads/create';
	$api_key = 'a8d7bfbb4ada45a3b7b9a2ca21b8263c';

	$headers = array(
		'ApiKey' => $api_key,
		'Content-Type' => 'application/json'
	);

	$response = wp_remote_post($api_url, array(
		'headers' => $headers,
		'body' => $api_data,
		'timeout' => 60
	));

	error_log(print_r($response, true));
	if (is_wp_error($response)) {
		$error_message = $response->get_error_message();
		error_log('Something went wrong: ' . $error_message);
	} else {
		$response_body = wp_remote_retrieve_body($response);
		error_log(print_r($response_body, true));
	}
}