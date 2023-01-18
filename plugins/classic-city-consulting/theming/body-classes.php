<?php
add_filter( 'body_class','my_body_classes' );
function my_body_classes( $classes ) {

    // Do we have Wireframe mode turned on?
    $is_wireframe = get_field('is_wireframe','option');

    if($is_wireframe === true) {
        $classes[] = 'is-wireframe';
    }
    return $classes;

}