<?php
add_theme_support( 'align-wide' );
add_theme_support( 'align-full' );


/**
 * Block Styles
 * 
 */
if ( function_exists( 'register_block_style' ) ) {


    // HEADINGS
    register_block_style(
        'core/heading',
        array(
            'name'         => 'font-family--heading',
            'label'        => __( 'Font: Heading', 'textdomain' ),
            'is_default'   => true,
        )
    );

    register_block_style(
        'core/heading',
        array(
            'name'         => 'font-family--body',
            'label'        => __( 'Font: Body', 'textdomain' ),
            'is_default'   => false,
        )
    );

    register_block_style(
        'core/heading',
        array(
            'name'      => 'section-heading-blue',
            'label'     => 'Blue Section Heading'
        )
    );

    register_block_style(
        'core/heading',
        array(
            'name'      => 'section-heading-gold',
            'label'     => 'Gold Section Heading'
        )
    );


    // PARAGRAPHS
    register_block_style(
        'core/paragraph',
        array(
            'name'         => 'font-family--body',
            'label'        => __( 'Font: Body', 'textdomain' ),
            'is_default'   => true,
        )
    );
    register_block_style(
        'core/paragraph',
        array(
            'name'         => 'font-family--heading',
            'label'        => __( 'Font: Heading', 'textdomain' ),
            'is_default'   => false,
        )
    );

    register_block_style(
        'core/paragraph',
        array(
            'name'      => 'pre-header',
            'label'     => 'Pre-header'
        )
    );


    // COVER
    register_block_style(
        'core/cover',
        array(
            'name'      => 'small-hero',
            'label'     => 'Small Hero'
        )
    );
    register_block_style(
        'core/cover',
        array(
            'name'      => 'large-cta-left',
            'label'     => 'Large CTA Left'
        )
    );
    register_block_style(
        'core/cover',
        array(
            'name'      => 'large-cta-right',
            'label'     => 'Large CTA Right'
        )
    );

    // BUTTONS
    register_block_style(
        'core/buttons',
        array(
            'name'         => 'lc-buttons',
            'label'        => __( 'LC Buttons', 'textdomain' ),
            'is_default'   => true,
        )
    );
    register_block_style(
        'core/button',
        array(
            'name'         => 'main-button',
            'label'        => __( 'Main', 'textdomain' ),
            'is_default'   => true,
        )
    );
    register_block_style(
        'core/button',
        array(
            'name'         => 'alt-button',
            'label'        => __( 'Alt', 'textdomain' ),
        )
    );
    register_block_style(
        'genesis-blocks/gb-button',
        array(
            'name'         => 'main-button',
            'label'        => __( 'Main', 'textdomain' ),
            'is_default'   => true,
        )
    );
    register_block_style(
        'genesis-blocks/gb-button',
        array(
            'name'         => 'alt-button',
            'label'        => __( 'Alt', 'textdomain' ),
        )
    );

    // COLUMNS
    register_block_style(
        'core/columns',
        array(
            'name'         => 'image-left',
            'label'        => __( 'Image on Left', 'textdomain' ),
        )
    );
    register_block_style(
        'core/columns',
        array(
            'name'         => 'image-right',
            'label'        => __( 'Image on Right', 'textdomain' ),
        )
    );
    register_block_style(
        'core/columns',
        array(
            'name'         => 'no-gap',
            'label'        => __( 'No Gap', 'textdomain' ),
        )
    );

    // IMAGE
    register_block_style(
        'core/image',
        array(
            'name'         => 'lc-primary-overlay',
            'label'        => __( 'Primary Overlay', 'textdomain' ),
        )
    );  
    register_block_style(
        'core/image',
        array(
            'name'         => 'resizable',
            'label'        => __( 'Resizable', 'textdomain' ),
            'is_default'   => true
        )
    );  

    // VIDEO WITH IMAGE
    register_block_style(
        'acf/video-with-image',
        array(
            'name'      => 'small',
            'label'     => 'Small'
        )
    );
    register_block_style(
        'acf/video-with-image',
        array(
            'name'          => 'medium',
            'label'         => 'Medium',
            'is_default'    => true
        )
    );
    register_block_style(
        'acf/video-with-image',
        array(
            'name'      => 'large',
            'label'     => 'Large'
        )
    );

    // QUERY LOOP
    register_block_style(
        'core/query',
        array(
            'name'      => 'testimonials',
            'label'     => 'Testimonials'
        )
    );      
    register_block_style(
        'core/query',
        array(
            'name'      => 'blog-pods',
            'label'     => 'Blog Pods'
        )
    );      

    // SEPARATOR    
    register_block_style(
        'core/separator',
        array(
            'name'      => 'vertical',
            'label'     => 'Vertical'
        )
    );  



}