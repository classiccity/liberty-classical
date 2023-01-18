<?php
Class UI {



    /**
     * Get a list of available colors
     * @return array - colors
     */
    public static function colors() {
        return array(
            'primary'                        => "Blue",
            'secondary'                      => "Green",
            'dark'                           => "Gray",

            'primary-opposite'               => "White (with Blue accent)",
            'secondary-opposite'             => "White (with Green accent)",
            'dark-opposite'                  => "White (with Gray accent)",
        );
    }


    /**
     * Returns the HTML of a button
     * @param string $label - button label
     * @param string $url - link for button
     * @param array $features - array of extra data
     *
     * @return string - STRING of button or "" if nothing
     */
    public static function button($label,$url,$features = array()) {

        // Make sure we have a URL and Label
        if(strlen($label) > 1 && strlen($url) > 1) {

            // Button CSS clas prefix
            $prefix = prefix().'-button';

            // CSS classes for the button container
            $css_button_container = array();


            // CSS classes
            $css_classes[] = $prefix;

            // Do we have a color?
            if(isset($features['color'])) {

                // If it's an OUTLINE button
                if($features['style'] === "is-style-outline") {
                    $css_classes[] = "has-".$features['color']."-color has-text-color";
                }

                // Otherwise, it's a fill
                else {
                    $css_classes[] = "has-".$features['color']."-background-color has-background-color";
                    $css_classes[] = "has-".$features['color']."-opposite-color has-text-color";
                }

            }

            // Do we have a size?
            if(isset($features['size'])) {
                $css_classes[] = $prefix.'--'.$features['size'];
            }

            // Do we have a block?
            if(isset($features['display_block'])) {
                $css_classes[] = $prefix.'--block';
            }

            // Set the target
            if(isset($features['new_window']) && $features['new_window'] === true) {
                $target = 'target="_blank"';
            } else {
                $target = "";
            }

            // Do we have a style set?
            if(isset($features['style'])) {

                // Add in the style as a CSS class
                $css_button_container[] = $features['style'];

            }

            ob_start();

            ?>

            <div class="wp-block-button <?=implode(' ',$css_button_container)?>">
                <a class="wp-block-button__link <?=implode(' ',$css_classes)?>"
                   href="<?= $url ?>"
                    <?=$target?>><?= $label ?></a>
            </div>


            <?php
            $button_html = ob_get_contents();
            ob_end_clean();

            return $button_html;

        } else {
            return "";
        }

    }






} // End of Class
