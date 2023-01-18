<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>
<?php

$prefix = prefix().'-font-awesome-icon';

$fields = get_fields();


// Make sure we have an icon
if(strlen($fields['icon']) > 1) {

    $all_classes = array($prefix,$all_classes);

    // Font size
    $font_size = $fields['font_size'];

    // Color
    $text_color = $fields['color'];


    if(strlen($font_size) > 1) $all_classes[] = $font_size;
    if(strlen($text_color) > 1) $all_classes[] = "has-".$text_color."-color has-color";

?>

    <span class="<?=implode(" ",$all_classes)?>"><?=$fields['icon']?></span>

<?php } ?>