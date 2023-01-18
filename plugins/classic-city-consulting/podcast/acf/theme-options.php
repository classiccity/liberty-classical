<?php
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_618946c202ece',
        'title' => 'Podcasts',
        'fields' => array(
            array(
                'key' => 'field_61894ac292deb',
                'label' => 'The Podcast Category',
                'name' => 'the_podcast_category',
                'type' => 'taxonomy',
                'instructions' => 'Choose the category that will trigger the Podcast view',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'category',
                'field_type' => 'select',
                'allow_null' => 0,
                'add_term' => 0,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'object',
                'multiple' => 0,
            ),
            array(
                'key' => 'field_618947f06a486',
                'label' => 'Show Single Post View',
                'name' => 'show_single_post_view',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 1,
                'ui_on_text' => 'Show',
                'ui_off_text' => 'Theme Default',
            ),
            array(
                'key' => 'field_618948026a487',
                'label' => 'About the Show',
                'name' => 'about_the_show',
                'type' => 'wysiwyg',
                'instructions' => 'This is the default text that should be appended to all Podcast Episode pages',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'basic',
                'media_upload' => 0,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'ccc-theme-podcast-settings',
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
		'key' => 'group_61f349c9085c4',
		'title' => 'Category Page',
		'fields' => array(
			array(
				'key' => 'field_61f34aa8f4c6d',
				'label' => 'Hero Image',
				'name' => 'hero_image',
				'type' => 'image',
				'instructions' => '1500px x 600px minimum',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array(
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'return_format' => 'array',
				'preview_size' => 'medium',
				'library' => 'all',
				'min_width' => 1500,
				'min_height' => 600,
				'min_size' => '',
				'max_width' => '',
				'max_height' => '',
				'max_size' => '',
				'mime_types' => '',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'category',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'seamless',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
		'active' => true,
		'description' => '',
		'show_in_rest' => 0,
	));

	endif;