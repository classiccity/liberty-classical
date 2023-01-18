<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$podcast_embed = get_field("podcast_embed",$post_id);


if(strlen($podcast_embed) > 1) { ?>
    <section class="<?=CCC_PODCAST_PREFIX?>__embed">
        <h2>Listen</h2>
        <?=$podcast_embed?>
    </section>
<?php } ?>
