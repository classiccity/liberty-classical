<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$callout_description = get_field("callout_description",$post_id);
$callout_image = get_field("callout_image",$post_id);
$callout_image_url = $callout_image['url'];
$callout_image_alt = $callout_image['alt'];
$callout_title = get_field("callout_title",$post_id);
$callout_description = get_field("ccallout_description",$post_id);
$callout_button_label = get_field("callout_button_label",$post_id);
$callout_button_link = get_field("callout_button_link",$post_id);


if(strlen($callout_title) > 1 && strlen($callout_description) > 1) { ?>

    <section class="<?=CCC_PODCAST_PREFIX?>__callout">

        <div class="<?=CCC_PODCAST_PREFIX?>__image">
            <img src="<?=$callout_image_url?>" alt="<?=$callout_image_alt?>"
        </div>
        <div class="<?=CCC_PODCAST_PREFIX?>__content">
            <h2 class="h4"><?=$callout_title?></h2>
            <?=$callout_description?>
            <a href="<?=$callout_button_link?>" class="<?=CCC_PODCAST_PREFIX?>__button"><?=$callout_button_label?></a>
        </div>

    </section>

<?php } ?>