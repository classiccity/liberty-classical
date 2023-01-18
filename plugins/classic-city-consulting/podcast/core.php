<?php


/**
 * Change the post template if it's a Podcast post
 */

//add_filter( 'template_include', 'ccc_podcast_single_template', 99 );
//function ccc_podcast_single_template( $template ) {
//
//    // Should we use the new template?
//    $show_single_post_view = get_field('show_single_post_view','options');
//
//    if ( is_singular('post') && in_category( CCC_PODCAST_CATEGORY_SLUG ) && $show_single_post_view === true ) {
//        return CCC_PLUGIN_PATH.'/podcast/templates/single-post-podcast.php';
//    }
//    return $template;
//}


add_action( 'wp_enqueue_scripts', 'ccc_podcast_enqueue' );
function ccc_podcast_enqueue()
{
  	if(file_exists(get_stylesheet_directory() . '/inc/podcast/css/podcast.css')) {
    wp_enqueue_style('ypm-podcast', get_stylesheet_directory_uri() . '/inc/podcast/css/podcast.css', false, filemtime(get_stylesheet_directory() . '/inc/podcast/css/podcast.css'));
	}
}

// Add the Options page under Theme Options
if( function_exists('acf_add_options_page') ) {


    acf_add_options_sub_page(array(
        'page_title' => 'Theme / Podcast',
        'menu_title' => 'Podcast',
        'parent_slug' => 'ccc-theme-general-settings',
        'menu_slug' => 'ccc-theme-podcast-settings',
    ));

}