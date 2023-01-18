<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>
<?php

$prefix = prefix().'-alert';

$is_active = get_field('turn_on','option');
$color = get_field('color','option');
$link_and_words = get_field('link_and_words','option');
$button_text = get_field('button_text','option');

$all_classes = array($prefix);

// Set default color
if(strlen($color) < 1) {
    $color = "primary";
}

$all_classes[] = "has-background has-{$color}-background-color";
$all_classes[] = "alignfull";

// If it's active
if($is_active === true) { ?>

<a href="<?=$link_and_words['url']?>" class="<?=implode(' ',$all_classes)?>" target="<?=$link_and_words['target']?>">
    <?=$link_and_words['title']?> - <strong><?=$button_text?></strong>
</a>



<?php } ?>
