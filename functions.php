<?php
/**
 * dex functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package dex
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'dex_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function dex_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on dex, use a find and replace
		 * to change 'dex' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'dex', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'dex' ),
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
				'dex_custom_background_args',
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
endif;
add_action( 'after_setup_theme', 'dex_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dex_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'dex_content_width', 640 );
}
add_action( 'after_setup_theme', 'dex_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dex_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'dex' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'dex' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'dex_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dex_scripts() {
	wp_enqueue_style( 'dex-style', get_template_directory_uri() . '/css/main.min.css',  array(), _S_VERSION );
	wp_enqueue_style( 'dex-main', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'dex-slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'dex-hamb', get_template_directory_uri() . '/libs/hamburgers-master/dist/hamburgers.min.css', array(), _S_VERSION );
	
	wp_style_add_data( 'dex-style', 'rtl', 'replace' );

	wp_enqueue_script( 'dex-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'dex-main', get_template_directory_uri() . '/js/scripts.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'dex_scripts' );

function create_posttype() {
 
    register_post_type( 'key_indicators',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Key indnicators' ),
                'singular_name' => __( 'key_indicators' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'key_indicators'),
			'supports' => array('title', 'custom-fields'),
            'show_in_rest' => true,
 
		)
	);

	register_post_type( 'steps',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Steps' ),
                'singular_name' => __( 'steps' )
            ),
            'public' => true,
            'has_archive' => true,
			'rewrite' => array('slug' => 'steps'),
			'supports' => array('title', 'editor'),
            'show_in_rest' => true,
 
		)
	);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );



function calculator_shortcode(  ){
	 return '<div class="header__content__right__side__calculator">
                        <div class="header__content__right__side__calculator__content">
                            <div class="header__content__right__side__calculator__title">
                                DETERMINE THE
                                COST OF WORK
                            </div>
                            <div class="header__content__right__side__calculator__undertitle">
                                Lorem Ipsum - this text often "does" <br />
                                used in printing and web design.
                            </div>
                            <div class="select__calc__wrap">
                                <select name="#" id="#" class="main_select">
                                    <option value="default">Experience</option>
                                    <option value="experience-1">experience-1</option>
                                    <option value="experience-2">experience-2</option>
                                    <option value="experience-3">experience-3</option>
                                </select>
                            </div>
                            <div class="select__calc__wrap__row">
                                <select name="#" id="#" class="main_select">
                                    <option value="default">Staff</option>
                                    <option value="experience-2">experience-2</option>
                                    <option value="experience-3">experience-3</option>
                                </select>
                                <select name="#" id="#" class="main_select">
                                    <option value="experience-1">Bonus</option>
                                    <option value="experience-2">experience-2</option>
                                    <option value="experience-3">experience-3</option>
                                </select>
                            </div>
                            <div class="header__content__right__side__calculator__summ">
                                $ 0.00
                            </div>
                            <div class="header__content__right__side__calculator__btns">
                                <div class="btn">
                                    <button>Continue</button>
                                </div>
                                <div class="btn btn-transparent">
                                    <button>5% Discount</button>
                                </div>
                            </div>
                        </div>
                    </div>';
}
add_shortcode('calculator', 'calculator_shortcode');

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