<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$fields = get_fields();

// Button Text
$button_text = $fields['button_text'];
$button_text = (strlen($button_text) > 1) ? $button_text : "Read More";

$button_color = $fields['color'];
$button_color = (strlen($button_color) > 1) ? $button_color : "secondary";

$button = array(
    'url'                   => get_permalink($post_id),
    'title'                 => $button_text,
    'color'                 => $button_color
);

$buttons = array($button);

ccc_buttons($buttons);
?>
