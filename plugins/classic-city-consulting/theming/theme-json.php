<?php

add_action('acf/save_post', 'ccc_save_theme_options_on_save', 20);
function ccc_save_theme_options_on_save() {

    // Check our current screen that is being saved
    $screen = get_current_screen();

    // If this is our Settings page
    if ($screen->id == "theme_page_ccc-theme-style-settings") {

        // Get the updated JSON data points
        $new_json = new CCCThemeJSON();

        // Compile it into a JSON string
        $json_string = $new_json->compile();

        $filepath = CCC_THEME_PATH.'/theme.json';

        // Write it to theme.json
        $fp = fopen($filepath, 'w');
        $did_write = fwrite($fp, $json_string);
        fclose($fp);

        //  Update reusable blocks
        ccc_update_reusable_blocks();

    }
}

function ccc_update_reusable_blocks() {
    // Block directory
    $block_directory = CCC_PLUGIN_PATH.'reusable-blocks';

    // Array of file contents
    $file_contents = array();

    // Get list of JSON files in directory
    $files = scandir($block_directory);

    // Do we have any files at all?
    if(is_array($files) && !empty($files)) {

        foreach($files as $filename) {

            // Make sure it's a JSON file
            if(strstr($filename,".json") !== false) {

                // Get an array of block data
                $block_data = json_decode(file_get_contents($block_directory."/".$filename));

                // Block slug
                $block_slug = ccc_reusable_block_id_creation($block_data->title);

                // Have we imported this block?
                $have_imported = (int) get_option($block_slug);

                // Make sure we have the data
                if($have_imported < 2 && isset($block_data->title) && strlen($block_data->title) > 1 && isset($block_data->content) && strlen($block_data->content) > 1) {
                    $id = wp_insert_post(array(
                        'post_title'=>$block_data->title,
                        'post_type'=>'wp_block',
                        'post_content'=>$block_data->content,
                        'post_status'=>'publish'
                    ));

                    // Mark this block as updated
                    update_option($block_slug,time());
                }

            }

        }

    }
}

function ccc_reusable_block_id_creation($block_title) {
    return sanitize_title("ccc-block-".$block_title);
}


Class CCCThemeJSON {
    public $colors;
    public $color_prefix = "--wp--preset--color--";

    // Fields for the JSON object
    public $version;
    public $customTemplates;
    public $settings;
    public $styles;
    public $templateParts;

    public function __construct() {

        // Get all default values for use in the array
        $this->get_colors();

        $this->version = 2;

        $this->settings = new stdClass();
        $this->settings->appearanceTools = 1;
        $this->settings->color = new stdClass();
        $this->set_duotone();
        $this->set_gradients();
        $this->set_palettes();
        $this->settings->custom = new stdClass();
        $this->create_custom();
        $this->create_spacing();
        $this->settings->typography = new stdClass();
        $this->settings->typography->dropCap = false;
        $this->set_fonts();
        $this->settings->layout = new stdClass();
        $this->create_layout();

        $this->styles = new stdClass();
        $this->create_styles();

    }

    public function get_colors() {

        $this->colors = array();
        $this->colors['primary'] = get_field('primary','option');
        //$this->colors['primary-opposite'] = get_field('primary-opposite','option');
        $this->colors['secondary'] = get_field('secondary','option');
        //$this->colors['secondary-opposite'] = get_field('secondary-opposite','option');
        $this->colors['light'] = get_field('light','option');
        $this->colors['dark'] = get_field('dark','option');
        $this->colors['foreground'] = get_field('foreground','option');
        $this->colors['background'] = get_field('background','option');


    }








    // --- SET ARRAYS --- //
    public function set_duotone() {

        // Selecting the colors I want to make in duotone
        $duotones = array(
            array('primary','secondary'),
            array('primary','dark'),
            array('primary','light'),
            array('secondary','dark'),
            array('secondary','light'),
            array('dark','light')
        );


        // Loop through each pairing
        foreach($duotones as $duotone) {
            $hex_one = $this->colors[$duotone[0]];
            $hex_two = $this->colors[$duotone[1]];
            $label_one = $duotone[0];
            $label_two = $duotone[1];

            $this->settings->color->duotone[] = $this->create_duotone($hex_one,$hex_two,$label_one,$label_two);
        }

    }

    public function set_gradients() {

        // Selecting the colors I want to make in gradients
        $gradients = array(
            array('primary','secondary'),
            array('primary','dark'),
            array('primary','light'),
            array('secondary','dark'),
            array('secondary','light'),
            array('dark','light')
        );

        // Loop through each pairing
        foreach($gradients as $gradient) {
            $hex_one = $this->colors[$gradient[0]];
            $hex_two = $this->colors[$gradient[1]];
            $label_one = $gradient[0];
            $label_two = $gradient[1];

            $this->settings->color->gradients[] = $this->create_gradient("vertical",$hex_one,$hex_two,$label_one,$label_two);
            $this->settings->color->gradients[] = $this->create_gradient("vertical",$hex_two,$hex_one,$label_two,$label_one);

            $this->settings->color->gradients[] = $this->create_gradient("angle",$hex_one,$hex_two,$label_one,$label_two);
            $this->settings->color->gradients[] = $this->create_gradient("angle",$hex_two,$hex_one,$label_two,$label_one);
        }

    }

    public function set_palettes() {
        foreach($this->colors as $slug => $hex) {
            $this->settings->color->palette[] = $this->create_palette($slug,$hex);
        }
    }

    public function set_fonts() {
        $header_font = get_field('header','option');
        $header_fallback_font = get_field('header_fallback','option');
        $body_font = get_field('body','option');
        $body_fallback_font = get_field('body_fallback','option');

        $this->create_font_family($header_font,$header_fallback_font,'header');
        $this->create_font_family($body_font,$body_fallback_font,'body');

        $this->create_font_sizes();
    }














    // --- CREATE OBJECTS --- //
    public function create_duotone($one_hex, $two_hex, $one_label, $two_label) {
        $duotone = new stdClass();

        $duotone->colors = array($one_hex,$two_hex);
        $duotone->slug = strtolower($one_label.'-and-'.$two_label);
        $duotone->name = $one_label.' and '.$two_label;

        return $duotone;

    }

    public function create_gradient($angle,$one_hex,$two_hex,$one_slug,$two_slug) {
        $gradient = new stdClass();

        // Set the relative angle
        if($angle === "vertical") {
            $relative_angle = "to bottom";
        } else {
            $relative_angle = "to bottom left";
        }

        $gradient->slug = strtolower($angle.'-'.$one_slug.'-to-'.$two_slug);
        $gradient->name = $angle.' '.$one_slug.' to '.$two_slug;
        $gradient->gradient = "linear-gradient(".$relative_angle.",var(".$this->color_prefix.$one_slug.") 0%,var(".$this->color_prefix.$two_slug.") 100%)";

        return $gradient;
    }

    public function create_palette($slug,$value) {
        $color = new stdClass();
        $color->slug = $slug;
        $color->color = $value;
        $color->name = ucfirst($slug);

        return $color;
    }

    public function create_custom() {

        $custom = new stdClass();
        $custom->spacing = new stdClass();
        $custom->spacing->hero = new stdClass();

        $custom->spacing->gap = get_field('block_gap','option');
        $custom->spacing->small = get_field('small_spacing','option');
        $custom->spacing->medium = get_field('medium_spacing','option');
        $custom->spacing->large = get_field('large_spacing','option');
        $custom->spacing->outer = get_field('outer_spacing','option');
        $custom->spacing->hero->verticalPadding = "var(--wp--custom--spacing--".get_field('hero_vertical_padding','option').")";
        $custom->spacing->hero->horizontalPadding = "var(--wp--custom--spacing--".get_field('hero_horizontal_padding','option').")";
        $custom->spacing->hero->marginBottom = "var(--wp--custom--spacing--".get_field('hero_margin_bottom','option').")";

        $font_size = "font-size";
        $custom->$font_size = new stdClass();
        $custom->$font_size->huge = get_field('huge','option');
        $custom->$font_size->gigantic = get_field('gigantic','option');
        $custom->$font_size->colossal = get_field('colossal','option');

        $line_height = "line-height";
        $custom->typography = new stdClass();
        $custom->typography->$line_height = new stdClass();
        $custom->typography->$line_height->tiny = get_field('tiny_line_height','option');
        $custom->typography->$line_height->small = get_field('small_line_height','option');
        $custom->typography->$line_height->medium = get_field('medium_line_height','option');
        $custom->typography->$line_height->normal = get_field('normal_line_height','option');

        $custom->radius = new stdClass();
        $custom->radius->sharp = "0px";
        $custom->radius->small = get_field('small_radius','option');
        $custom->radius->medium = get_field('medium_radius','option');
        $custom->radius->large = get_field('large_radius','option');
        $custom->radius->rounded = "999999999px";

        $custom->breakpoint = new stdClass();
        $custom->breakpoint->xs = get_field('breakpoint_x_small','option');
        $custom->breakpoint->sm = get_field('breakpoint_small','option');
        $custom->breakpoint->md = get_field('breakpoint_medium','option');
        $custom->breakpoint->lg = get_field('breakpoint_large','option');
        $custom->breakpoint->xl = get_field('breakpoint_x_large','option');
        $custom->breakpoint->xxl = get_field('breakpoint_xx_large','option');

        $custom->button = new stdClass();
        $custom->button->padding = new stdClass();
        $custom->button->radius = "var(--wp--custom--radius--".get_field('button_radius','option').")";
        $custom->button->case = get_field('button_case','option');
        $custom->button->weight = get_field('button_weight','option');
        $custom->button->padding->top = get_field('button_padding_top','option');
        $custom->button->padding->right = get_field('button_padding_right','option');
        $custom->button->padding->bottom = get_field('button_padding_bottom','option');
        $custom->button->padding->left = get_field('button_padding_left','option');

        $custom->width = new stdClass();
        $custom->width->thin = get_field('thin_size','option');
        $custom->width->content = get_field('content_size','option');
        $custom->width->wide = get_field('wide_size','option');
        $custom->width->full = get_field('full_size','option');

        $custom->style = new stdClass();
        $custom->style->shadow = get_field('shadow','option');
        $custom->style->opacity = get_field('opacity','option');
        $custom->style->color = new stdClass();
        $custom->style->color->opposite = new stdClass();
        $custom->style->color->opposite->primary = "var(--wp--preset--color--".get_field('primary_opposite','option').")";
        $custom->style->color->opposite->secondary = "var(--wp--preset--color--".get_field('secondary_opposite','option').")";
        $custom->style->color->opposite->dark = "var(--wp--preset--color--".get_field('dark_opposite','option').")";
        $custom->style->color->opposite->light = "var(--wp--preset--color--".get_field('light_opposite','option').")";
        $custom->style->color->opposite->foreground = "var(--wp--preset--color--".get_field('foreground_opposite','option').")";
        $custom->style->color->opposite->background = "var(--wp--preset--color--".get_field('background_opposite','option').")";


        // Other custom variables
        $custom_options = get_field('custom_variables','option');

        // Make sure we have data
        if(is_array($custom_options) && !empty($custom_options)) {

            // Loop through each group of variables
            foreach($custom_options as $parent_option) {

                // Do we have a group?
                if(strlen($parent_option['group']) >= 1) {

                    // Name the group
                    $group = $parent_option['group'];

                    // Loop through each variable
                    if(isset($parent_option['variables']) && is_array($parent_option['variables']) && !empty($parent_option['variables'])) {

                        foreach($parent_option['variables'] as $variable) {

                            // If we don't have this key initialized, make it a Class
                            if(!isset($custom->$group)) {
                                $custom->$group = new stdClass();
                            }

                            // Save away the key into a variable
                            $key_name = $variable['name'];

                            // Add items to the array
                            $custom->$group->$key_name = $variable['value'];

                        }

                    }

                }

            }

        }

        $this->settings->custom = $custom;

    }

    public function create_spacing() {
        $this->settings->spacing = new stdClass();
        $this->settings->spacing->units = array("%","px","em","rem","vh","vw");
    }

    public function create_font_family($name,$fallback,$slug) {
        $font_family = new stdClass();
        $font_family->fontFamily = $name['font'].",".$fallback;
        $font_family->name = $name['font'];
        $font_family->slug = $slug;

        $this->settings->typography->fontFamilies[] = $font_family;

    }

    public function create_font_sizes() {

        $sizes = array('small','medium','large','x-large');

        foreach($sizes as $size) {
            $font_size = new stdClass();
            $font_size->size = get_field($size,'option');
            $font_size->slug = $size;

            $this->settings->typography->fontSizes[] = $font_size;

        }

    }

    public function create_layout() {
        $this->settings->layout->contentSize = get_field('content_size','option');
        $this->settings->layout->wideSize = get_field('wide_size','option');
    }

    public function create_styles() {

        $this->styles->color = new stdClass();
        $this->styles->color->background = "var(".$this->color_prefix."background)";
        $this->styles->color->text = "var(".$this->color_prefix."foreground)";

        $this->styles->spacing = new stdClass();
        $this->styles->spacing->blockGap = get_field('block_gap','option');

        $this->styles->typography = new stdClass();
        $this->styles->typography->fontFamily = "var(--wp--preset--font-family--body)";
        $this->styles->typography->lineHeight = "var(--wp--custom--typography--line-height--normal)";
        $this->styles->typography->fontSize = "var(--wp--preset--font-size--medium)";

        $core_button = "core/button";
        $this->styles->blocks = new stdClass();
        $this->styles->blocks->$core_button = new stdClass();
        $this->styles->blocks->$core_button->border = new stdClass();
        $this->styles->blocks->$core_button->border->radius = "var(--wp--custom--button--radius)";
        $this->styles->blocks->$core_button->spacing = new stdClass();
        $this->styles->blocks->$core_button->spacing->padding = new stdClass();
        $this->styles->blocks->$core_button->spacing->padding->top = get_field('button_padding_top','option');
        $this->styles->blocks->$core_button->spacing->padding->right = get_field('button_padding_right','option');
        $this->styles->blocks->$core_button->spacing->padding->bottom = get_field('button_padding_bottom','option');
        $this->styles->blocks->$core_button->spacing->padding->left = get_field('button_padding_left','option');

    }








    // --- COMPILE --- //
    public function compile($output_php = 0) {
        $json = new stdClass();

        $json->version = $this->version;
        $json->customTemplates = array();
        $json->settings = $this->settings;
        $json->styles = $this->styles;
        $json->templateParts = array();

        if($output_php == 1) {
            return $json;
        } else {
            return json_encode($json);
        }

    }






    // --- DEBUG --- //
    public static function debug($data, $die = 1) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';

        if($die == 1) die();
    }
}

$new_json = new CCCThemeJSON();
if($_GET['show'] === "json") {
    CCCThemeJSON::debug($new_json->compile(1),1);
}