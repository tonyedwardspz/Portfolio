<?php

// remove admin bar (comment / uncomment as necesary)
add_filter('show_admin_bar', '__return_false');


// set up file paths
define( 'TEMPPATH', get_bloginfo('stylesheet_directory'));
define( 'IMAGES', TEMPPATH. "/images");
define( 'STYLE', TEMPPATH. "/style");
define( 'SCRIPT', TEMPPATH. "/script");


// add support for customise post thumbnails
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'blog-post-thumb', 340, 9999, true ); //300 pixels x unlimited height


// add support for custom nav menus
add_theme_support( 'nav-menus' );
if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
		  'main' => 'Main Nav'
		)
	);
}


// create a custom sidebar for widgets
if ( function_exists( 'register_sidebar' ) ) {
	register_sidebar( array (
		'name' => __( 'Primary Sidebar', 'primary-sidebar' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'dir' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}


// load the inbuilt jQuery library
// refrence it at $j in the script
function mh_load_my_script() {
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'mh_load_my_script' );


// modify the more link to introduce styling
// (WPSE 63748)
function wpse63748_add_morelink_class( $link, $text )
{
    return str_replace(
        'more-link',
        'more-link button gamma',
        $link
    );
}
add_action( 'the_content_more_link', 'wpse63748_add_morelink_class', 10, 2 );

function wrap_readmore($more_link) {
    return '<div class="post-readmore force-white">'.$more_link.'</div>';
}
add_filter('the_content_more_link', 'wrap_readmore', 10, 1);


?>