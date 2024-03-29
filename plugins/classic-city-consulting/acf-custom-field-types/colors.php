<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


class ccc_acf_color_dropdown extends acf_field
{
    // vars
    var $settings, // will hold info such as dir / path
        $defaults; // will hold default field options

    /**
     *  __construct
     *
     *  Set name / label needed for actions / filters
     *
     *  @since	3.6
     *  @date	23/01/13
     */

    function __construct( $settings )
    {
        // vars
        $this->name = 'ccc_acf_color';
        $this->label = __('Color', 'acf');
        $this->category = __("Content",'acf'); // Basic, Content, Choice, etc
        $this->defaults = array();
        $this->settings = $settings;

        // do not delete!
        parent::__construct();
    }

    /**
     * create_options()
     *
     *  Create extra options for your field. This is rendered when editing a field.
     *  The value of $field['name'] can be used (like bellow) to save extra data to the $field
     *
     *  @type	action
     *  @since	3.6
     *  @date	23/01/13
     *
     *  @param	$field	- an array holding all the field's data
     */

    function render_field_settings( $field ) {
        // We have no field settings
    }

    /*
    *  create_field()
    *
    *  Create the HTML interface for your field
    *
    *  @param	$field - an array holding all the field's data
    *
    *  @type	action
    *  @since	3.6
    *  @date	23/01/13
    */
    function render_field( $field ) {

        // Get colors
        $colors = $this->get_colors();

        ?>

        <select name="<?=$field['name']?>" id="<?=$field['id']?>" class="<?=$field['class']?>">
            <option value="0">- Select One -</option>
            <?php
            // Loop through each master palette
            foreach ($colors as $slug => $label) { ?>
                <option value="<?=$slug?>" <?=($slug == $field['value'] ? 'selected' : '')?>><?=$label?></option>
            <?php } ?>

        </select>

        <?php
    }


    /**
     * Get a list of colors
     * @return array - colors
     */
    public function get_colors() {
        $choices = array(
            'primary'                        => "Primary",
            'secondary'                      => "Secondary",
            'light'                           => "Light",
            'dark'                           => "Dark",
            'foreground'                           => "Foreground",
            'background'                           => "Background",
        );

        return $choices;
    }



    function format_value( $value, $post_id, $field ) {
        return $value;
    }
}
// create field
new ccc_acf_color_dropdown( array() );