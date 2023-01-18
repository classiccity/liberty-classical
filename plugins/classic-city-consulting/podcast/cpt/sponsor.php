<?php
/*
* Creating a function to create our CPT
*/

function ccc_podcast_cpt_sponsor() {

// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Sponsors', 'Post Type General Name', 'twentytwenty' ),
        'singular_name'       => _x( 'Sponsor', 'Post Type Singular Name', 'twentytwenty' ),
        'menu_name'           => __( 'Sponsors', 'twentytwenty' ),
        'parent_item_colon'   => __( 'Parent Sponsor', 'twentytwenty' ),
        'all_items'           => __( 'All Sponsors', 'twentytwenty' ),
        'view_item'           => __( 'View Sponsor', 'twentytwenty' ),
        'add_new_item'        => __( 'Add New Sponsor', 'twentytwenty' ),
        'add_new'             => __( 'Add New', 'twentytwenty' ),
        'edit_item'           => __( 'Edit Sponsor', 'twentytwenty' ),
        'update_item'         => __( 'Update Sponsor', 'twentytwenty' ),
        'search_items'        => __( 'Search Sponsor', 'twentytwenty' ),
        'not_found'           => __( 'Not Found', 'twentytwenty' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwenty' ),
    );

// Set other options for Custom Post Type

    $args = array(
        'label'               => __( 'sponsors', 'twentytwenty' ),
        'description'         => __( 'Sponsor news and reviews', 'twentytwenty' ),
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
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest'          => true,

    );

    // Registering your Custom Post Type
    register_post_type( 'sponsors', $args );

}

/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/

add_action( 'init', 'ccc_podcast_cpt_sponsor', 0 );