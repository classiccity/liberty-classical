<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>
<?php

$prefix = prefix().'-icon-list';

$all_classes = array($prefix,$all_classes);

// Get the icon list
$icon_list = get_field('icon_list','option');


// Do we have icons?
if(is_array($icon_list) && !empty($icon_list)) { ?>

    <div class="<?=implode(' ',$all_classes)?>">

        <ul>
            <?php foreach($icon_list as $icon) { ?>
                <li><a href="<?=$icon['link']?>" target="_blank"><?=$icon['icon']?></a></li>
            <?php } ?>
        </ul>

    </div>

<?php } ?>