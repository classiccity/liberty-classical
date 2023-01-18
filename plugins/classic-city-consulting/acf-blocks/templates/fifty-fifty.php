<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$prefix = 'ccc-fifty-fifty';
$fields = get_fields();
$all_classes = array($prefix,$all_classes);

if(strlen($fields['arrangement']) > 1) {
    $all_classes[] = "has-image-".$fields['arrangement'];
}

// Get the image
$image_src = wp_get_attachment_image_src($fields['image']);
$image_srcset = wp_get_attachment_image_srcset($fields['image']);
$image_alt = get_post_meta( $fields['image'], '_wp_attachment_image_alt', true);
?>

<div class="<?=implode(' ',$all_classes)?>">
    <div class="<?=$prefix?>__image">
        <img src="<?=$image_src[0]?>" srcset="<?=$image_srcset?>" alt="<?=$image_alt?>">
    </div>
    <div class="<?=$prefix?>__content">
        <InnerBlocks />
    </div>
</div>
