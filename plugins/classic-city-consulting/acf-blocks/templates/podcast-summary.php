<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$excerpt = get_the_excerpt($post_id);
$length = (int) get_field('length',$post_id);


if(strlen($excerpt) > 1) { ?>
    <section class="<?=CCC_PODCAST_PREFIX?>__summary">
        <h2>Episode Summary</h2>
        <p><?=$excerpt?></p>

        <?php if($length > 1) { ?>
            <p><strong>Length:</strong> <?=$length?></p>
        <?php } ?>
    </section>
<?php } ?>
