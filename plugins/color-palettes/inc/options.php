<?php

add_action('acf/init', 'cp_options_page');
function cp_options_page() {
// Add the options page
    if (function_exists('acf_add_options_page')) {

        $page = acf_add_options_sub_page(array(
            'page_title' => __('Color Palettes', 'cp-color-palettes'),
            'menu_title' => __('Color Palettes', 'cp-color-palettes'),
            'menu_slug' => 'cp-color-palettes',
            'capability' => 'edit_posts',
            'redirect' => false,
            'parent_slug' => 'options-general.php'
        ));

    }

    // Add the field group to the Options Page
    if( function_exists('acf_add_local_field_group') ):

        acf_add_local_field_group(array(
            'key' => 'group_5f972700ba8b8',
            'title' => 'Color Palettes',
            'fields' => array(
                array(
                    'key' => 'field_5f972c475d2e1',
                    'label' => 'Palette Name',
                    'name' => 'palette_name',
                    'type' => 'text',
                    'instructions' => 'All lowercase, no spaces',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => 'short-name-here',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_5f972bcc5d2dc',
                    'label' => 'Palettes',
                    'name' => 'palettes',
                    'type' => 'textarea',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'cp-color-palettes',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

        acf_add_local_field_group(array(
            'key' => 'group_613e0f9584b73',
            'title' => 'Cool Color Palettes',
            'fields' => array(
                array(
                    'key' => 'field_613e0f9b9459b',
                    'label' => 'The Site ID',
                    'name' => 'the_site_id',
                    'type' => 'text',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => '',
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                array(
                    'key' => 'field_613e2d3b2ad9a',
                    'label' => 'Color Palettes Cool',
                    'name' => 'color_palettes_cool',
                    'type' => 'repeater',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'collapsed' => '',
                    'min' => 0,
                    'max' => 0,
                    'layout' => 'table',
                    'button_label' => '',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_613e2d412ad9b',
                            'label' => 'Color Name',
                            'name' => 'color_name',
                            'type' => 'text',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '50',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => '',
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        array(
                            'key' => 'field_613e2d4c2ad9c',
                            'label' => 'Color',
                            'name' => 'color',
                            'type' => 'color_picker',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '25',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'enable_opacity' => 0,
                            'return_format' => 'string',
                        ),
                        array(
                            'key' => 'field_613e2d542ad9d',
                            'label' => 'Levels',
                            'name' => 'levels',
                            'type' => 'select',
                            'instructions' => '',
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '25',
                                'class' => '',
                                'id' => '',
                            ),
                            'choices' => array(
                                1 => '1',
                                2 => '2',
                                3 => '3',
                                4 => '4',
                            ),
                            'default_value' => 2,
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 0,
                            'return_format' => 'value',
                            'ajax' => 0,
                            'placeholder' => '',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'options_page',
                        'operator' => '==',
                        'value' => 'cp-color-palettes',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
        ));

    endif;

}