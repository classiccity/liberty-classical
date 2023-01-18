<?php

add_action( 'after_setup_theme', 'cp_color_palette_gutenberg' );

function cp_color_palette_gutenberg() {
    // Get all color palettes
    $colors = new ColorPalettes('', 'gutenberg');

    // Gutenberg palette array
    $gutenberg_palettes = array();

    // All palettes in Gutenberg'd style
    foreach ($colors->palettes as $palette_name => $values) {

        foreach ($values as $value) {
            $gutenberg_palettes[] = $value;
        }

    }

    // Add swatches to Gutenberg
    add_theme_support('editor-color-palette', $gutenberg_palettes);
}