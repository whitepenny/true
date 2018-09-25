<?php
/**
 * true Search functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package true_Search
 */

if ( ! function_exists( 'true_search_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function true_search_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on true Search, use a find and replace
	 * to change 'true-search' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'true-search', get_template_directory() . '/languages' );

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

        add_image_size('blog-size', 1132, 646, array( 'center', 'center' ));

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'true-search' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'true_search_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

}
endif;

add_action( 'after_setup_theme', 'true_search_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function true_search_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'true_search_content_width', 640 );
}
add_action( 'after_setup_theme', 'true_search_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function true_search_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'true-search' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'true-search' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'true_search_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function true_search_scripts() {
	wp_enqueue_style( 'true-search-style', get_stylesheet_uri() );

	wp_enqueue_style( 'true-search-header-style', get_template_directory_uri() . '/css/header.css', array(), '20160905' );

	wp_enqueue_style( 'true-search-footer-style', get_template_directory_uri() . '/css/footer.css', array(), '20160905' );

	wp_enqueue_style( 'true-search-add-styles', get_template_directory_uri() . '/styles/min/style.css', array(), '' );

	wp_enqueue_script( 'true-search-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'true-search-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'true-search-flexibility', get_template_directory_uri() . '/js/flexibility.js', array(), '20160821', true );

	wp_enqueue_script( 'true-search-classie', get_template_directory_uri() . '/js/classie.min.js', array(), '20160822', true );

	wp_enqueue_script( 'true-search-smoothscroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', array('jquery'), '20160822', true );

	//wp_enqueue_script( 'true-search-webkit-svg-fixer', get_template_directory_uri() . '/js/webkit-svg-fxer.min.js', array('jquery'), '20160901', true );

	wp_enqueue_script( 'true-search-jquery-lazy', get_template_directory_uri() . '/js/jquery.lazy.min.js', array('jquery'), '20161005', true );


	wp_enqueue_script( 'true-search-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '20160822', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'true_search_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * ACF Options Page
 */

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

/**
 * Search WP Keep some common words [add to array as needed]
 */

function my_searchwp_common_words( $terms ) {

  // we DO NOT want to ignore 'first' so remove it from the list of common words
  $words_to_keep = array( 'first', 'true', 'last', 'nothing', 'hundred', 'users', 'inc', 'inc.', 'next', 'new', 'news', 'fire', 'together', 'front', 'further'  );

  $terms = array_diff( $terms, $words_to_keep );

  return $terms;
}
add_filter( 'searchwp_common_words', 'my_searchwp_common_words' );

// function wpb_password_post_filter( $where = '' ) {
//    if (!is_single() && !current_user_can('edit_private_posts') && !is_admin()) {
//         $where .= " AND post_password = ''";
//     }
//     return $where;
// }
// add_filter( 'posts_where', 'wpb_password_post_filter' );


function sr_get_oembed_data( $url ) {
  $cache_key = 'pc_oembed-' . md5( $url );
  $oembed_data = get_transient( $cache_key );

  if ( empty( $oembed_data ) ) {
    $oembed_obj = _wp_oembed_get_object();
    $oembed_data = $oembed_obj->get_data( $url );

    set_transient( $cache_key, $oembed_data, (60 * 60 * 24 * 30) );
  }

  return $oembed_data;
}


add_filter( 'the_password_form', 'custom_password_form' );
function custom_password_form() {
    global $post;
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $o = '<form action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" class="post-password-form" method="post">
    ' . __( "This content is password protected. To view it please enter your password below" ) . '
    <div class="protected-post-form-content">
    <input name="post_password" id="' . $label . '" type="password" style="background: #ffffff; border:1px solid #999; color:#333333; padding:10px;" size="20" /><input type="submit" name="Submit" class="button" value="' . esc_attr__( "Submit" ) . '" />
    </form></div>
    ';
    return $o;
}


function sr_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}

add_filter( 'embed_oembed_html', 'sr_embed_html', 10, 3 );
add_filter( 'video_embed_html', 'sr_embed_html' ); // Jetpack

function sr_placement_taxonomy_queries( $query ) {
    if ( !is_admin() && $query->is_tax( 'placement_collection' ) && $query->is_main_query() ) {
        $query->set( 'orderby', 'title' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'sr_placement_taxonomy_queries' );



// Search edits - BP 09/2018

function custom_post_type_search( $query ) {
  if (!is_admin() && $query->is_search) {
    $post_types = get_field( 'search_include_post_types', 'option' );
    $categories = get_field( 'search_exclude_categories', 'option' );

    $query->set('post_type', $post_types);
    $query->set('category__not_in', $categories);
  }
  return $query;
}
add_filter( 'pre_get_posts', 'custom_post_type_search' );

function acf_load_post_types($field) {
  $post_types = get_post_types();

  $field['choices'] = array();

  foreach ($post_types as $post_type) {
    $field['choices'][ $post_type ] = $post_type;
  }

  return $field;
}
add_filter('acf/load_field/name=search_include_post_types', 'acf_load_post_types');



