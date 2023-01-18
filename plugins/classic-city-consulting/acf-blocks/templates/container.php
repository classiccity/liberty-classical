<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>
<?php

$prefix = prefix().'-container';

$fields = get_fields();

$all_classes = array($prefix,$all_classes);

// Always alignfull
$all_classes[] = "alignfull";

// Content width
$width_class = $fields['width'];

// Holder for background image style
$add_background_image = "";

// Do we have a background image? If so, apply it
if(isset($fields['background_image']['sizes']['large'])) {
    $all_classes[] = "has-background-image";
    $add_background_image = '<img src="'.$fields['background_image']['sizes']['large'].'">';
}

// Do we have a background color?
if(isset($fields['background_color']) && strlen($fields['background_color']) > 1) {
    $all_classes[] = "has-{$fields['background_color']}-background-color";
}

// Do we have a text color?
if(isset($fields['text_color']) && strlen($fields['text_color']) > 1) {
    $all_classes[] = "has-{$fields['text_color']}-color";
}

// Do we have padding?
if(isset($fields['padding']) && strlen($fields['padding']) > 1) {
    $all_classes[] = "has-{$fields['padding']}-padding";
}

?>

<div class="<?=implode(' ',$all_classes)?>">
    <?=$add_background_image?>
    <div class="<?=$prefix?>__inner has-<?=$width_class?>-width">
        <InnerBlocks />
    </div>
</div>
