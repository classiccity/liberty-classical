<?php
function ccc_podcast_get_sponsor_data($post_id) {
    $sponsor = new stdClass();

    $sponsor->name = get_field('name',$post_id);
    $sponsor->active = get_field('active',$post_id);
    $sponsor->featured = get_field('featured',$post_id);
    $sponsor->description = get_field('description',$post_id);
    $sponsor->url = get_field('url',$post_id);
    $sponsor->button = get_field('button_text',$post_id);
    $sponsor->image = get_the_post_thumbnail_url($post_id);

    return $sponsor;
}