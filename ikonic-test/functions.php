<?php
/**
 * Ikonic test functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Ikonic_test
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
function ikonic_test_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Ikonic test, use a find and replace
		* to change 'ikonic-test' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'ikonic-test', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'ikonic-test' ),
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
add_action( 'after_setup_theme', 'ikonic_test_setup' );

function enqueue_bootstrap_cdn() {
    // Enqueue Bootstrap CSS
    wp_enqueue_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css', array(), '4.5.2', 'all');

    // Enqueue Bootstrap JS
    wp_enqueue_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js', array('jquery'), '4.5.2', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_cdn');

function enqueue_bootstrap_icons_cdn() {
    // Enqueue Bootstrap Icons CSS
    wp_enqueue_style('bootstrap-icons', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css', array(), '1.10.5', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap_icons_cdn');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ikonic_test_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ikonic_test_content_width', 640 );
}
add_action( 'after_setup_theme', 'ikonic_test_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function ikonic_test_scripts() {
	wp_enqueue_style( 'ikonic-test-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'ikonic-test-style', 'rtl', 'replace' );

	wp_enqueue_script( 'ikonic-test-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ikonic_test_scripts' );

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/class-bootstrap-navwalker.php';

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

/**
 * Custom Metaboxes.
 */
require get_template_directory() . '/custom-metaboxes.php';

/**
 * Project CPT.
 */
require get_template_directory() . '/project-cpt.php';

// Register Header Menu
function mjb_register_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu', 'your-theme-text-domain' )
        )
    );
}
add_action( 'init', 'mjb_register_menus' );

function filter_projects_by_date($query) {
    // Check if we are in the admin area, on the main query, and the post type is 'projects'
    if (!is_admin() && $query->is_main_query() && $query->is_post_type_archive('projects')) {
        // Check if start_date and end_date are set in the query parameters
        if (isset($_GET['startDate']) && !empty($_GET['startDate']) && 
            isset($_GET['endDate']) && !empty($_GET['endDate'])) {
          
            // Sanitize input
            $start_date = sanitize_text_field($_GET['startDate']);
            $end_date = sanitize_text_field($_GET['endDate']);
     

            // Add meta query to filter by start and end date
            $meta_query = [
                'relation' => 'AND',
                [
                    'key'     => '_project_start_date',
                    'value'   => $start_date,
                    'compare' => '>=', // Start date must be greater than or equal to the selected start date
                    'type'    => 'DATE',
                ],
                [
                    'key'     => '_project_end_date',
                    'value'   => $end_date,
                    'compare' => '<=', // End date must be less than or equal to the selected end date
                    'type'    => 'DATE',
                ],
            ];

            $query->set('meta_query', $meta_query);
        }
    }
}

add_action('pre_get_posts', 'filter_projects_by_date');

function my_theme_enqueue_scripts() {
    wp_enqueue_script('jquery'); // Ensure jQuery is included
    // Enqueue your custom script
    wp_add_inline_script('jquery', '
        jQuery(document).ready(function($) {
            $(".navbar-nav .nav-item.dropdown").hover(function() {
                $(this).find(".dropdown-menu").stop(true, true).slideDown(200);
            }, function() {
                $(this).find(".dropdown-menu").stop(true, true).slideUp(200);
            });
            $(".navbar-nav .nav-item.dropdown > a").on("click", function(e) {
                var $this = $(this);
                if (!$this.next(".dropdown-menu").hasClass("show")) {
                    e.preventDefault();
                }
                $this.next(".dropdown-menu").toggleClass("show");
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');

function my_theme_enqueue_scripts2() {
    wp_enqueue_script('jquery'); // Ensure jQuery is included
    // Enqueue your custom script
    wp_add_inline_script('jquery', '
        jQuery(document).ready(function($) {
            $(".navbar-toggler").on("click", function() {
                $("#mobileMenu").toggleClass("active");
            });
        });
    ');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts2');









