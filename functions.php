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


// get the theme's custom options
require_once('theme-options.php');

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


//enqueue scripts, loading them in the footer
function mh_load_my_script() {

	if ( !is_admin() ) { // do not load scripts on admin page
		//de register the built in jquery
		wp_deregister_script('jquery');

		// build the jQuery CDN link 
		$googleCDN = "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js";
		
		//register all scripts
		// wp_register_script($handle, $src, $deps, $ver, $in_footer);
	    wp_register_script('jquery', $googleCDN, false, null, true);
	    wp_register_script('myScript', get_template_directory_uri().'/script/script.js', array('jquery'), null, true);
	    wp_register_script('mixitup', get_template_directory_uri().'/script/jquery.mixitup.min.js', array('jquery'), null, true);

	    // enqueue scripts for every page
	    wp_enqueue_script('jquery');
	    wp_enqueue_script('myScript');

	    // handle page specific scripts
	    if (is_post_type_archive( 'portfolio' )){
		    wp_enqueue_script('mixitup');
	    } 
	}
} 
add_action( 'wp_enqueue_scripts', 'mh_load_my_script' );

// function wptuts_scripts_load_cdn()
// {
//     // Deregister the included library
//     wp_deregister_script( 'jquery' );
     
//     // Register the library again from Google's CDN
//     wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', array(), null, false );
     
//     // Register the script like this for a plugin:
//     wp_register_script( 'custom-script', plugins_url( '/js/custom-script.js', __FILE__ ), array( 'jquery' ) );
//     // or
//     // Register the script like this for a theme:
//     wp_register_script( 'custom-script', get_template_directory_uri() . '/js/custom-script.js', array( 'jquery' ) );
 
//     // For either a plugin or a theme, you can then enqueue the script:
//     wp_enqueue_script( 'custom-script' );
// }
// add_action( 'wp_enqueue_scripts', 'wptuts_scripts_load_cdn' );


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


// show the portfolio post type on the front page. MOVE TO PLUGIN????
add_filter( 'pre_get_posts', 'my_get_posts' );

function my_get_posts( $query ) {
	if ( ( is_home() && $query->is_main_query() ) || is_feed() )
		$query->set( 'post_type', array( 'post', 'portfolio' ) );

	return $query;
}


// Get all attached images for a post, wrapping them in <li>'s
// Used with the slider on single portfolio pages
function getAttachedImages(){
	$attachments = get_attached_media( 'image', $post->ID );

	foreach ($attachments as $attachment_id => $attachment) {
		echo "<li>".wp_get_attachment_image( $attachment_id, 'large' )."</li>";
	}
}

?>