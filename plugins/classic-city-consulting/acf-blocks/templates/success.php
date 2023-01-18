<?php include(get_theme_file_path().'/blocks/blocks.settings.php'); ?>

<?php

$prefix = prefix().'-successes';

$fields = get_fields();

$all_classes = array($prefix,$all_classes);

// Let's choose how many columns
if(isset($fields['successes']) && is_array($fields['successes']) && !empty($fields['successes'])) {

    $success_count = count($fields['successes']);

    if($success_count === 2) $all_classes[] = "has-2-columns";
    elseif($success_count === 3) $all_classes[] = "has-3-columns";
    elseif($success_count === 4) $all_classes[] = "has-2-columns";
    elseif($success_count >= 5) $all_classes[] = "has-3-columns";

}

if(isset($fields['successes']) && is_array($fields['successes']) && !empty($fields['successes'])) { ?>
    <div class="<?=implode(" ",$all_classes)?>">
        <?php foreach($fields['successes'] as $success) {

            $single_classes = array();

            // Adding classes based on content
            if(isset($success['button']) && is_array($success['button']) && !empty($success['button'])) {
                $single_classes[] = "has-button";

                // Adding color into the button array
                $success['button']['color'] = $success['color'];
                
            } else {
                $single_classes[] = "no-button";
            }

            if(isset($success['description']) && strlen($success['description']) > 1) {
                $single_classes[] = "has-description";
            } else {
                $single_classes[] = "no-description";
            }


            ?>
            <div class="<?=$prefix?>__single <?=implode(' ',$single_classes)?>">

                <div class="<?=$prefix?>__header">
                    <img src="<?=$success['icon']['sizes']['thumbnail']?>" alt="<?=$success['icon']['alt']?>">
                    <p class="<?=$prefix?>__title"><?=$success['title']?></p>
                </div>

                <?php if(strlen($success['description']) > 1) { ?>
                    <div class="<?=$prefix?>__description">
                        <p><?=$success['description']?></p>
                    </div>

                    <?php if(is_array($success['button']) && !empty($success['button'])) ccc_buttons(array($success['button'])); ?>
                <?php } ?>

            </div>
        <?php } ?>
    </div>
<?php } ?>