<?php

function prefix() {
	return "LC";
}


add_theme_support( 'post-thumbnails' );


// Setup for Block Theme
if ( ! function_exists( 'lc_blocktheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook.
 */
function lc_blocktheme_setup() {
    // Add support for block styles.
    add_theme_support( 'wp-block-styles' );

    // Enqueue editor styles.
    add_editor_style( 'editor-style.css' );
}
endif;
add_action( 'after_setup_theme', 'lc_blocktheme_setup' );

