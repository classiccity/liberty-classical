<?php

/**
 * @param array $buttons - [outline,color,url,target,title]
 */
function ccc_buttons($buttons) {

    // Make sure we have an array
    if(is_array($buttons) && !empty($buttons)) {

        // If we have a single-dimensional array...
        if(isset($buttons['color'])) {

            // Move the single button into a new variable for storage
            $the_button = $buttons;

            // Empty out the $buttons
            $buttons = array();

            // Add the button as an item in the array
            $buttons[] = $the_button;
        }

        ?>

        <div class="wp-block-buttons">
            <?php foreach($buttons as $button) {

                $button_classes = array();


                // Set data attributes
                if(isset($button['data']) && is_array($button['data'])) {

                    $data_attributes = array();

                    // Loop through each potential data attribute
                    foreach($button['data'] as $key => $value) {
                        $data_attributes[] = 'data-'.$key.'="'.$value.'"';
                    }

                }

                // Set a default color
                if(!isset($button['color']) || strlen($button['color']) < 1) {
                    $button['color'] = "primary";
                }

                // If it's OUTLINE
                if($button['outline'] == 1) {
                    $button_classes[] = "is-style-outline";
                    $button_classes[] = "has-{$button['color']}-color has-text-color";
                } else {
                    $button_classes[] = "is-style-fill";
                    $button_classes[] = "has-{$button['color']}-background-color has-background";
                }

                // Always small size
                $button_classes[] = "has-small-font-size";

                ?>
                <a href="<?=$button['url']?>" class="wp-block-button__link <?=implode(' ',$button_classes)?>" target="<?=$button['target']?>" <?=(isset($data_attributes)) ? implode(' ',$data_attributes) : ''?>><?=$button['title']?></a>
            <?php } ?>
        </div>

    <?php }

}





function ccc_modal_box($id,$content) {

    $prefix = prefix().'-modal';

    ?>

    <div class="<?=$prefix?>" data-popup-id="<?=$id?>">
        <span class="<?=$prefix?>__close" data-popup-close></span>
        <div class="<?=$prefix?>__content">
            <?=$content?>
        </div>
    </div>

<?php }