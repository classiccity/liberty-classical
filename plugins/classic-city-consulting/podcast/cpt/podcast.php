<?php
/*
* Creating a function to create our CPT
*/

function ccc_podcast_cpt_podcast() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Podcasts', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Podcast', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Podcasts', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Podcast', 'twentytwenty' ),
        'all_items'           => __( 'All Podcasts', 'twentytwenty' ),
        'view_item'           => __( 'View Podcast', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Podcast', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Podcast', 'twentytwenty' ),
        'update_item'         => __( 'Update Podcast', 'twentytwenty' ),
        'search_items'        => __( 'Search Podcast', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'podcasts', 'twentytwenty' ),
        'description'         => __( 'Podcast news and reviews', 'twentytwenty' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy.
        'taxonomies'          => array( 'genres' ),
        /* A hierarchical CPT is like Pages and can have
        * Parent and child items. A non-hierarchical CPT
        * is like Posts.
        */
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-microphone',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'          => true,
        'template' => array(
            array( 'core/columns', array(), array(
                array( 'core/column', array(), array(
                    array( 'core/image', array() ),
                ) ),
                array( 'core/column', array(), array(
                    array( 'core/paragraph', array(
                        'placeholder' => 'Add a inner paragraph'
                    ) ),
                ) ),
            ) )
        ),

    );

    // Registering your Custom Post Type
    register_post_type( 'podcasts', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'ccc_podcast_cpt_podcast', 0 );