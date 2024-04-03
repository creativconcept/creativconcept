<?php
/**
 * creativconcept functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package creativconcept
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'creativconcept_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function creativconcept_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on creativconcept, use a find and replace
		 * to change 'creativconcept' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'creativconcept', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', 'creativconcept' ),
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
				'creativconcept_custom_background_args',
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
add_action( 'after_setup_theme', 'creativconcept_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function creativconcept_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'creativconcept_content_width', 640 );
}
add_action( 'after_setup_theme', 'creativconcept_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function creativconcept_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'creativconcept' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'creativconcept' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'creativconcept_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function creativconcept_scripts() {

	wp_enqueue_style( 'creativconcept-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_enqueue_style( 'slickstyle', get_template_directory_uri().'/libs/slick.css', array() );
	wp_enqueue_script( 'slickscript', get_template_directory_uri().'/libs/slick.min.js', array('jquery'), null, true );

}
add_action( 'wp_enqueue_scripts', 'creativconcept_scripts' );

function creativconcept_admin_scripts() {
	
	wp_enqueue_style( 'slickstyle', get_template_directory_uri().'/libs/slick.css', array() );
	wp_enqueue_script( 'slickscript', get_template_directory_uri().'/libs/slick.min.js', array('jquery'), null, true );
	
}
add_action( 'admin_enqueue_scripts', 'creativconcept_admin_scripts' );

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


function custom_admin_css() {
	echo '<style type="text/css">
	.wp-block { max-width: 1460px; }
	</style>';
}
add_action('admin_head', 'custom_admin_css');


// Redirect 404 to homepage

if( !function_exists('redirect_404_to_homepage') ){

    add_action( 'template_redirect', 'redirect_404_to_homepage' );

    function redirect_404_to_homepage(){
       if(is_404()):
            wp_safe_redirect( home_url('/') );
            exit;
        endif;
    }
}

/************************************************************
 * Add featured image for social media
 */

add_action('wp_head', 'cc_add_og_tags');
function cc_add_og_tags(){
    if( is_single() || is_page() ) {
      // og:image
      if( has_post_thumbnail( get_the_ID() ) ) {
		    echo '<meta property="og:image" content="'.get_the_post_thumbnail_url(get_the_ID(),'full').'" />';
      }
      // og:url
      if( !empty( get_the_permalink( get_the_ID() ) ) ) {
		    echo '<meta property="og:url" content="'.get_the_permalink(get_the_ID()).'" />';
      }
    }
}

/************************************************************
 * Disable the emoji's
 */
function disable_emojis() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
	remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
	remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
	add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
	add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'disable_emojis' );
   
   /**
	* Filter function used to remove the tinymce emoji plugin.
	* 
	* @param array $plugins 
	* @return array Difference betwen the two arrays
	*/
   function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
	return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
	return array();
	}
   }
   
   /**
	* Remove emoji CDN hostname from DNS prefetching hints.
	*
	* @param array $urls URLs to print for resource hints.
	* @param string $relation_type The relation type the URLs are printed for.
	* @return array Difference betwen the two arrays.
	*/
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
	if ( 'dns-prefetch' == $relation_type ) {
	/** This filter is documented in wp-includes/formatting.php */
	$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
   
   $urls = array_diff( $urls, array( $emoji_svg_url ) );
	}
   
   return $urls;
   }
   
   /* Remove DNS-fetch "//s.w.org" in head */
   add_filter( 'emoji_svg_url', '__return_false' );

/***************************************************************** */
/** Disable default Rest-API endpoints **/

add_filter( 'rest_endpoints', 'disable_default_endpoints' );

function disable_default_endpoints( $endpoints ) {

	$routes = array( '/wp/v2/users', '/wp/v2/users/(?P<id>[\d]+)' );

	foreach( $routes as $route ):
		if( empty( $endpoints[ $route ] ) ):
			continue;
		endif;

		foreach( $endpoints[ $route ] as $i => $handlers ):
			if ( is_array( $handlers ) && isset( $handlers['methods'] ) && 'GET' === $handlers['methods'] ):
				unset( $endpoints[ $route ][ $i ] );
			endif;
		endforeach;
	endforeach;

	return $endpoints;

}
