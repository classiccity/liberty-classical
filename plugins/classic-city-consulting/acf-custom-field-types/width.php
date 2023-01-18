<?php

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


class ccc_acf_width_dropdown extends acf_field
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
        $this->name = 'ccc_acf_width';
        $this->label = __('Width', 'acf');
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

        // Get options
        $options = $this->get_options();

        ?>

        <select name="<?=$field['name']?>" id="<?=$field['id']?>" class="<?=$field['class']?>">
            <option value="0">- Select One -</option>
            <?php
            // Loop through each master palette
            foreach ($options as $slug => $label) { ?>
                <option value="<?=$slug?>" <?=($slug == $field['value'] ? 'selected' : '')?>><?=$label?></option>
            <?php } ?>

        </select>

        <?php
    }


    /**
     * Get a list of options
     * @return array - options
     */
    public function get_options() {
        $choices = array(
            'thin'                        => "Thin",
                'content'                        => "Content",
            'wide'                      => "Wide",
            'full'                           => "Full",
        );

        return $choices;
    }



    function format_value( $value, $post_id, $field ) {
        return $value;
    }
}
// create field
new ccc_acf_width_dropdown( array() );