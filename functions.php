<?php
/**
 * bootscores functions and definitions
 *
 * @package bootscores
 */

if ( ! function_exists( 'bootscores_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bootscores_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on bootscores, use a find and replace
	 * to change 'bootscores' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'bootscores', get_template_directory() . '/languages' );

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
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'bootscores' ),
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

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'bootscores_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // bootscores_setup
add_action( 'after_setup_theme', 'bootscores_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
 
function bootscores_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bootscores_content_width', 640 );
}
add_action( 'after_setup_theme', 'bootscores_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function bootscores_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bootscores' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'bootscores_widgets_init' );

function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );

/**
 * Enqueue scripts and styles.
 */
function bootscores_enqueue_scripts() {
	
	/************** styles ************/	
	/* bootstrap framework */
	wp_enqueue_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css' );

	/*nav style*/
	wp_enqueue_style( 'flexnavstyle', get_template_directory_uri().'/library/css/flexnav.css' );

	/*_'s css*/
	wp_enqueue_style( 'style', get_stylesheet_uri() );


	/*This theme's customizations (uncomment next line) */
//	wp_enqueue_style( 'project-style', get_template_directory_uri() . '/library/css/projectname.css' );
	


	/************** scripts ************/
	
	/*bootstrap scripts*/
	wp_enqueue_script( 'bootscores-bootstrap-js','//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js', array('jquery'), '', true );
	
	/* flexnav js */
	wp_enqueue_script( 'flexnavscript', get_template_directory_uri().'/library/js/jquery.flexnav.min.js', array('jquery'), '', true );

/*custome script for this theme
flexnav instantiates in here
Update the name of the file to your project name and add your cutstom javascript to it	*/
	wp_enqueue_script( 'project-js', get_template_directory_uri() . '/library/js/project.js', array('jquery'), '', true );

	/* _'s skip-link */
	wp_enqueue_script( 'bootscores-skip-link-focus-fix', get_template_directory_uri() . '/library/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

}
add_action( 'wp_enqueue_scripts', 'bootscores_enqueue_scripts' );


// allow mod_pagespeed to combine WP-generated CSS
function bootscores_remove_style_id($link) {
        return preg_replace("/id='.*-css'/", "", $link);
}
add_filter('style_loader_tag', 'bootscores_remove_style_id');


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

