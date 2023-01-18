<?php include(get_theme_file_path().'/blocks/blocks.settings.php'); ?>

<?php

$prefix = prefix().'-icon-pods';

$fields = get_fields();

$all_classes = array($prefix,$all_classes);

$all_classes[] = "has-{$fields['columns']}-columns";

// Image size
$image_size = "icon-small";

// Do we have an image size set?
if(isset($fields['is_full_width']) && $fields['is_full_width'] === true) {
    $image_size = "medium";
    $all_classes[] = "has-full-size-image";
} else {
    $all_classes[] = "has-icon-size-image";
}

?>

<div class="<?=implode(' ',$all_classes)?>">

    <?php foreach($fields['pods'] as $pod) { ?>
        <div class="<?=$prefix?>__single">

            <?php if(isset($pod['icon']['sizes'][$image_size])) { ?>
                <img src="<?=$pod['icon']['sizes'][$image_size]?>" alt="<?=$pod['icon']['alt']?>">
            <?php } ?>
            <h3><?=$pod['title']?></h3>
            <p class="has-small-font-size"><?=$pod['description']?></p>

            <?php if(isset($pod['link']['url'])) { ?>
                <div class="wp-block-buttons">
                    <div class="wp-block-button has-custom-font-size has-small-font-size"><a href="<?=$pod['link']['url']?>" class="wp-block-button__link" target="<?=$pod['link']['target']?>"><?=$pod['link']['title']?></a></div>
                </div>
            <?php } ?>
        </div>
    <?php } ?>
</div>
