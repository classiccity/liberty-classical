<?php

Class CCCCustomImageSizes {
    public $sizes = array();

    public function __construct() {

        $default_sizes = array();
        $default_sizes['Pod Image'] = get_field('pod_image','option');
        $default_sizes['Standalone Header'] = get_field('standalone_header_image','option');
        $default_sizes['Full Header'] = get_field('full_header_image','option');
        $default_sizes['Icon Small'] = get_field('icon_small','option');
        $default_sizes['Icon Medium'] = get_field('icon_medium','option');
        $default_sizes['Icon Large'] = get_field('icon_large','option');

        // Custom image sizes
        $custom_sizes = get_field('custom_image_sizes','option');

        // Do we have any custom sizes?
        if(is_array($custom_sizes) && !empty($custom_sizes)) {

            // Loop through each custom size
            foreach($custom_sizes as $custom_size) {

                // Apply it to the array
                $default_sizes[$custom_size['label']] = $custom_size['size'];

            }

        }

        //CCCThemeJSON::debug($default_sizes,1);

        // Loop through all the sizes
        foreach($default_sizes as $label => $dimensions) {

            $new_image = new stdClass();

            // Bust out the width and height
            $dimension = explode("x",$dimensions);

            // Make sure we have dimensions
            if(isset($dimension[0]) && isset($dimension[1])) {

                $width = $dimension[0];
                $height = $dimension[1];
                $slug = sanitize_title($label);

                $new_image->slug = $slug;
                $new_image->label = $label;
                $new_image->width = $width;
                $new_image->height = $height;
                $new_image->crop = true;

                $this->sizes[] = $new_image;

            }

        }

    }

    public function add_image_sizes() {
        foreach($this->sizes as $size) {
            add_image_size($size->slug,$size->width,$size->height,$size->crop);
        }
    }

    public function get_size_names() {
        $output = array();

        foreach($this->sizes as $size) {
            $output[$size->slug] = $size->label;
        }

        return $output;
    }
}

// Adding image sizes to the core code
add_action( 'after_setup_theme', 'ccc_custom_image_sizes_values' );
function ccc_custom_image_sizes_values() {
    $sizes = new CCCCustomImageSizes();
    $sizes->add_image_sizes();
}

// Adding image sizes to the admin dropdowns
add_filter( 'image_size_names_choose', 'ccc_custom_image_sizes_admin' );
function ccc_custom_image_sizes_admin( $sizes ) {

    $custom_sizes = new CCCCustomImageSizes();
    $new_sizes = $custom_sizes->get_size_names();

    // Merge the sizes together
    $all_sizes = array_merge( $sizes, $new_sizes );

    return $all_sizes;
}