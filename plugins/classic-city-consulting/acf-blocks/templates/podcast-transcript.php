<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$transcript = get_field("transcript",$post_id);
?>

<section class="<?=CCC_PODCAST_PREFIX?>__transcript">
    <h2>Transcript</h2>
    <div class="<?=CCC_PODCAST_PREFIX?>__transcript-content">
        <?=$transcript?>
    </div>
</section>