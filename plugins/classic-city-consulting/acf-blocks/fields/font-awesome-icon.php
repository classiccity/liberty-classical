<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_62d975d7a6727',
        'title' => 'Block: Font Awesome Icon',
        'fields' => array(
            array(
                'key' => 'field_62d975e5a16c0',
                'label' => 'Icon',
                'name' => 'icon',
                'type' => 'text',
                'instructions' => 'HTML code for the Font Awesome icon',
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
                'key' => 'field_62d975f1a16c1',
                'label' => 'Font Size',
                'name' => 'font_size',
                'type' => 'select',
                'instructions' => 'Standard WordPress font sizes are listed below',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'choices' => array(
                    0 => 'Default (accepts current location\'s size)',
                    'has-small-font-size' => 'Small',
                    'has-normal-font-size' => 'Normal',
                    'has-medium-font-size' => 'Medium',
                    'has-large-font-size' => 'Large',
                    'has-huge-font-size' => 'Huge',
                ),
                'default_value' => 0,
                'allow_null' => 0,
                'multiple' => 0,
                'ui' => 0,
                'return_format' => 'value',
                'ajax' => 0,
                'placeholder' => '',
            ),
            array(
                'key' => 'field_62d976cf9ec6d',
                'label' => 'Color',
                'name' => 'color',
                'type' => 'ccc_acf_color',
                'instructions' => 'Pick the color for the icon',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/font-awesome-icon',
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
        'show_in_rest' => 0,
    ));

endif;