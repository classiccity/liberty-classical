<?php
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme',
        'menu_slug' => 'ccc-theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme / Style',
        'menu_title' => 'Style',
        'parent_slug' => 'ccc-theme-general-settings',
        'menu_slug' => 'ccc-theme-style-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme / Image Sizes',
        'menu_title' => 'Images',
        'parent_slug' => 'ccc-theme-general-settings',
        'menu_slug' => 'ccc-theme-image-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme / Alert Bar',
        'menu_title' => 'Alert',
        'parent_slug' => 'ccc-theme-general-settings',
        'menu_slug' => 'ccc-theme-alert-settings',
    ));

}