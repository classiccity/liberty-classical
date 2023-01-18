<?php

    add_action( 'wp_enqueue_scripts', 'ccc_enqueue' );
    function ccc_enqueue() {
	    wp_enqueue_style( prefix().'-web', get_template_directory_uri().'/css/web.css', false, filemtime( get_template_directory() . '/css/web.css' ) );
	    //wp_enqueue_script( 'ccc-common', get_template_directory_uri().'/src/js/common.js', array('jquery'),false,false );

	    wp_enqueue_script( prefix().'-fontawesome', 'https://kit.fontawesome.com/a01141edf2.js', array() );
	    wp_enqueue_script( prefix().'-main', get_template_directory_uri().'/js/main.js', array('jquery'), filemtime( get_template_directory() . '/js/main.js' ), true );
    }

    // Remove Atomic Blocks Font Awesome
    add_action( 'wp_enqueue_scripts', 'remove_atomic_block_fontawesome', 100 );

    function remove_atomic_block_fontawesome(){
        wp_dequeue_style( 'atomic-blocks-fontawesome' );
    }

    // Add in our styles to Gutenberg
    add_action( 'after_setup_theme', 'add_custom_theme_styles_to_gutenberg' );

    function add_custom_theme_styles_to_gutenberg(){

        add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added
        add_editor_style( get_template_directory_uri().'/css/web.css' ); // tries to include style-editor.css directly from your theme folder

    }
?>