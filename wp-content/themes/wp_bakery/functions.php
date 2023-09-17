<?php
/**
 * wp_bakery functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wp_bakery
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
function wp_bakery_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on wp_bakery, use a find and replace
		* to change 'wp_bakery' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'wp_bakery', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'wp_bakery' ),
      'header-menu' => esc_html__( 'Header Menu', 'wp_bakery' ),
      'footer-center-menu' => esc_html__( 'Footer Center Menu', 'wp_bakery' ),
      'footer-last-menu' => esc_html__( 'Footer Last Menu', 'wp_bakery' ),
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
			'wp_bakery_custom_background_args',
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
add_action( 'after_setup_theme', 'wp_bakery_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wp_bakery_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'wp_bakery_content_width', 640 );
}
add_action( 'after_setup_theme', 'wp_bakery_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/**
 * Enqueue scripts and styles.
 */
function wp_bakery_scripts() {
	wp_enqueue_style( 'wp_bakery-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'wp_bakery-style', 'rtl', 'replace' );

  wp_enqueue_script('jquery');

	wp_enqueue_script( 'wp_bakery-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

  wp_enqueue_style('wp_bakery-fonts-Poppins', "https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900|Display+Playfair:200,300,400,700", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-icomoon', get_template_directory_uri() . "/assets/fonts/icomoon/style.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-bootstrap.min', get_template_directory_uri() . "/assets/css/bootstrap.min.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-magnific-popup', get_template_directory_uri() . "/assets/css/magnific-popup.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-jquery-ui', get_template_directory_uri() . "/assets/css/jquery-ui.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-owl.carousel.min', get_template_directory_uri() . "/assets/css/owl.carousel.min.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-owl.theme.default.min', get_template_directory_uri() . "/assets/css/owl.theme.default.min.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-bootstrap-datepicker.css', get_template_directory_uri() . "/assets/css/bootstrap-datepicker.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-font-flaticon', get_template_directory_uri() . "/assets/fonts/flaticon/font/flaticon.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-mediaelementplayer', "https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-aos.', get_template_directory_uri() . "/assets/css/aos.css", array(), _S_VERSION);

  wp_enqueue_style('wp_bakery-css-general-style', get_template_directory_uri() . "/assets/css/style.css", array(), _S_VERSION);

  wp_enqueue_script('jquery-ui');
  wp_enqueue_script( 'wp_bakery-popper.min', get_template_directory_uri() . '/assets/js/popper.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-bootstrap.min', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-owl.carousel.min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-jquery.stellar.min', get_template_directory_uri() . '/assets/js/jquery.stellar.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-jquery.countdown', get_template_directory_uri() . '/assets/js/jquery.countdown.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-jquery.magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-bootstrap-datepicker', get_template_directory_uri() . '/assets/js/bootstrap-datepicker.min.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-js-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), _S_VERSION, true );
  wp_enqueue_script( 'wp_bakery-js-main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'wp_bakery_scripts' );

// get options panel 
require get_template_directory() . '/inc/options-panel.php';

// add custom element and category wpbakery
if (class_exists('WPBakeryShortCode')){
  class WPBakeryShortCode_My_Widget1 extends WPBakeryShortCode {}
}

if (function_exists('vc_map')){
  vc_map( array(
    "name" => __( "My Widget1", "my_slug" ),
    "base" => "my_widget1", // !!!
    "class" => "",
    "category" => __( "My Category", "my_slug"),
    "description" => __("My description", "my_slug"),
    'show_settings_on_create' => true,
    'icon' => 'my_custom_class_for_icon',
    // 'admin_enqueue_js' => array(get_template_directory_uri().'/vc_extend/bartag.js'),
    // 'admin_enqueue_css' => array(get_template_directory_uri().'/vc_extend/bartag.css'),
    "params" => array(
      array(
        "type" => "textfield",
        "holder" => "div",
        "class" => "",
        "heading" => __( "Text", "my_slug" ),
        "param_name" => "foo",
        "value" => __( "", "my_slug" ),
        "description" => __( "Description for foo param.", "my_slug" )
      ),
    )
   ) );
}



