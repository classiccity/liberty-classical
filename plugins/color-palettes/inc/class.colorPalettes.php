<?php


class ColorPalettes
{

    /**
     * @var array - array of palettes
     */
    public $palettes;

    /**
     * @var string - style of palettes to return
     */
    public $style = "";

    /**
     * @var string - name of the current master palette
     */
    public $current_palette = "";


    public function __construct($specific_palette = "", $style = "regular") {

        // Do we have V2 colors?

        // Set the style
        $this->style = $style;

        // If we're only after a specific palette...
        if (strlen($specific_palette) > 1) {
            // Something...
        } // We want ALL the colors
        else {

            $this->create_all();
        }

    }

    /**
     * Create all the palettes
     */
    public function create_all() {

        // Get dynamic palette
        $this->create_dynamic();

        // Finish with the grays palette
        $this->create_grays();

//		echo '<pre>';
//		print_r($this->palettes);
//		echo '</pre>';
//		die();
    }

    public function create_dynamic()
    {

        // Get the palette name
        $this->current_palette = get_field('the_site_id', 'option');

        // All colors
        $color_list = get_field('color_palettes_cool','options');

        //self::dump($color_list,1);

        // Main colors array
        $main_colors = array();

        // Loop through each color
        if(is_array($color_list) && !empty($color_list)) {
            foreach ($color_list as $color) {

                // Setup Color object
                $new_color = new CPColor($color['color'], $color['color_name']);

                // Loop through each shade
                foreach ($new_color->shades as $weight => $shade) {

                    // Array of color data
                    $new_palette = $this->create_palette($new_color->name, $weight, $shade['color'], $shade['opposite']);

                    // If this is the "400" weight...
                    if(strstr($new_palette['slug'],'-400')) {

                        // Create a palette without a "weight" to it
                        $another_palette = $this->create_palette($new_color->name,'',$shade['color'],$shade['opposite']);

                        // Add the color to the palette-array
                        $main_colors[] = $another_palette;

                    }

                    else {

                        // Add the color to the palette array
                        $this->palettes[$this->current_palette][] = $new_palette;

                    }


                }

            }

            // Merge the "main" colors at the TOP of the array of the shades
            $this->palettes[$this->current_palette] = array_merge($main_colors,$this->palettes[$this->current_palette]);
        }

    }

    /**
     * Create the gray palette
     */
    public function create_grays()
    {

        // Set the master palette
        $this->current_palette = "gray";

        // Initialize current master palette
        $this->palettes[$this->current_palette] = array();

        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 900, '#333333', '#FFF');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 800, '#3D3D3D', '#FFF');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 700, '#474747', '#FFF');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 600, '#606060', '#FFF');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 500, '#707070', '#FFF');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 400, '#7E7E7E', '#FFF');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 300, '#CFCFCF', '#333');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 200, '#DBDBDB', '#333');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 100, '#F3F3F3', '#333');
        $this->palettes[$this->current_palette][] = $this->create_palette('gray', 1, '#FFFFFF', '#333');







    }


    /**
     * Create an object with colors
     * @param string $name - label for the color
     * @param int $weight - weight of the color
     * @param string $color - hex code for color
     * @param string $opposite - hex code for color
     *
     * @return array
     */
    public function create_palette($name, $weight, $color, $opposite)
    {

        // Get the name
        $name_of_color = $this->current_palette . ' ' . $name . ' ' . $weight;
        $slug_of_color = sanitize_title($name_of_color);

        // If the style is REGULAR
        if ($this->style === 'regular') {

            // Create the object
            $colors['name'] = $name_of_color;
            $colors['slug'] = $slug_of_color;
            $colors['weight'] = $weight;
            $colors['color'] = $color;
            $colors['opposite'] = $opposite;

            return $colors;

        } else {



            return array(
                'name' => $name_of_color,
                'slug' => $slug_of_color,
                'color' => $color
            );

        }

    }




    // -- CSS CLASSES -- //

    public static function get_background_css($color, $has_text = false) {

        // Create the BG classes
        $classes = "has-background has-".$color."-background-color";

        // If we are requesting the TEXT color too
        if($has_text === true) {
            $classes .= ' has-text-color has-'.$color.'-opposite-color';
        }

        return $classes;

    }

    public static function get_text_css($color, $has_background = false) {

        // Create the BG classes
        $classes = "has-text-color has-".$color."-color";

        // If we are requesting the BG color too
        if($has_background === true) {
            $classes .= ' has-background has-'.$color.'-opposite-background-color';
        }

        return $classes;

    }








    public static function dump($var,$die=0) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if($die == 1) die();
    }

}

