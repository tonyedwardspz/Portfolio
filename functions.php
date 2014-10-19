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
add_image_size('portfolio-item-thumb', 275, 210, ture);

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


// Add a summary metabox to all posts to use in theme
function smry_custom_meta(){
	// post types to apply extra metabox too. 
	$postTypes = array('post', 'portfolio');

	// loop the array of post types
	foreach ($postTypes as $postType) {
		add_meta_box(
			'summary-meta-box', // id
			__('Post Summary'), // title
			'smry_show_meta_box', // callback
			$postType, // post type
			'normal' // position
			);
	}
}
add_action('add_meta_boxes', 'smry_custom_meta');

function smry_show_meta_box(){
	// get the stored meta values	
	global $post;
	$meta = get_post_meta($post->ID, 'smry_text', true);

	//Use nonce for verification
	// echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';

	//build the input area ?>
	<p>
		<label>Summary Text</label>
		<textarea name="smry_text" id="smry_text" cols="60" rows="5"><?php echo $meta; ?></textarea>
	</p>
	<?php
}

function save_summary_meta($post_id){
	//verify the nonce
	// if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))){
	// 	return $post_id;
	// }

	//check for saving
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
		return $post_id;
	}

	//retrieve the values
	$old = get_post_meta($post_id, 'smry_text', true);
	$new = $_POST["smry_text"];

	//save new values if changes are made
	if ($new && $new != $old){
		update_post_meta($post_id, 'smry_text', $new);
	} elseif ('' == $new && $old){
		delete_post_meta($post_id, 'smry_text', $old);
	}
}
add_action('save_post', 'save_summary_meta');


// get the custom meta summary
function get_smry_text($post){

	// retriev the summary from the database
	$smry = get_post_meta($post->ID, 'smry_text', true);

	if ($smry != ""){
		echo $smry;
	}else {
		echo 'There is no summary';
	}
}

// change the default more link
function new_excerpt_more($more) {
	global $post;
	return '… <a href="'. get_permalink($post->ID) . '">' . 'Read More &raquo;' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>