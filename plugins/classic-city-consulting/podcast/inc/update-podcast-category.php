<?php
add_action('acf/save_post', 'ccc_save_podcast_settings', 20);
function ccc_save_podcast_settings()
{

    // Check our current screen that is being saved
    $screen = get_current_screen();

    // If this is our Settings page
    if ($screen->id == "theme_page_ccc-theme-podcast-settings") {

        // Get the category to use for Podcast posts
        $the_podcast_category = get_field('the_podcast_category','options');

        // If it's empty
        if(isset($the_podcast_category->slug)) {
            $the_podcast_category = $the_podcast_category->slug;
        }
        elseif(is_numeric($the_podcast_category)) {
            $podcast_category = get_term($the_podcast_category,'category');
            $the_podcast_category = $podcast_category->slug;
        }

        else {
            $the_podcast_category = "podcast";
        }

        update_option(CCC_PODCAST_CATEGORY_SLUG_OPTION_NAME,$the_podcast_category);

    }
}