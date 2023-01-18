<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$quote_content = get_field("quote_content",$post_id);
$quote_source = get_field("quote_source",$post_id);


if(strlen($quote_content) > 1) { ?>

<section class="<?=CCC_PODCAST_PREFIX?>__quote">
    <blockquote>
        <p><?=$quote_content?></p>

        <?php if(strlen($quote_source) > 1) { ?>
            <cite><?=$quote_source?></cite>
        <?php } ?>
    </blockquote>
</section>

<?php } ?>