<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>
<?php

$prefix = prefix().'-hero';

// Get the block-level details
$parent_fields = get_fields();

// Page/Post fields
$page_fields = get_fields($post_id);

// Should we hide the hero?
$hide_hero = $page_fields['hide_hero'];

if($hide_hero !== true) {

    // Post title
    $title = get_the_title($post_id);

    // Merged Fields
    $fields = array();

    // Merging together the two sets of fields
    if(isset($parent_fields['width']) && strlen($parent_fields['width']) > 1) {
        $fields['width'] = $parent_fields['width'];
    } else {
        $fields['width'] = $page_fields['width'];
    }
    if(isset($parent_fields['image_use']) && strlen($parent_fields['image_use']) > 1) {
        $fields['image_use'] = $parent_fields['image_use'];
    } else {
        $fields['image_use'] = $page_fields['image_use'];
    }
    if(isset($parent_fields['alignment']) && strlen($parent_fields['alignment']) > 1) {
        $fields['alignment'] = $parent_fields['alignment'];
    } else {
        $fields['alignment'] = $page_fields['alignment'];
    }
    if(isset($parent_fields['color']) && strlen($parent_fields['color']) > 1) {
        $fields['color'] = $parent_fields['color'];
    } else {
        $fields['color'] = $page_fields['color'];
    }
    if(isset($parent_fields['title_override']) && strlen($parent_fields['title_override']) > 1) {
        $title = $parent_fields['title_override'];
    } elseif(strlen($page_fields['title_override']) > 1) {
        $title = $page_fields['title_override'];
    }

    $fields['buttons'] = $page_fields['buttons'];
    $fields['description'] = $page_fields['description'];

    // If this is an Archive page
    if(is_archive()) {

        // Set the title
        $term = get_queried_object();
        $title = $term->name;

        // Set the description
        $description = $term->description;

        if(strlen($description) > 1) {
            $fields['description'] = $description;
        }

    }

    // Array for the parent CSS classes
    $all_classes = array($prefix,$all_classes);

    // Array for the inner CSS classes
    $inner_classes = array();

    // Add in the width CSS class
    $inner_classes[] = "has-{$fields['width']}-width";

    // Adding classes
    $all_classes[] = "is-".$fields['image_use'];
    $all_classes[] = "is-".$fields['alignment'];

    // If it's full-width, ensure no left/right padding
    if($fields['width'] === "full") {
        $all_classes[] = "is-full";
    }

    // Do we have a description?
    if(strlen($fields['description']) > 1) {
        $all_classes[] = "has-description";
    }

    // Get the Featured Image Size
    if($fields['image_use'] === "background") {
        $featured_image_size = "full-header";
        $inner_classes[] = "has-{$fields['color']}-background-color";
        $inner_classes[] = "has-text-align-{$fields['alignment']}";
    } elseif($fields['image_use'] === "standalone") {
        $featured_image_size = "standalone-header";
    } else {
        $featured_image_size = "standalone-header";
    }

?>

    <div class="<?=implode(' ', $all_classes)?>">
        <div class="<?=$prefix?>__inner <?=implode(' ',$inner_classes)?>">
            <div class="<?=$prefix?>__image">
                <?=get_the_post_thumbnail($post_id,$featured_image_size)?>
            </div>
            <div class="<?=$prefix?>__content">
                <h1><?=$title?></h1>

                <?php if(strlen($fields['description']) > 1) { ?>
                    <p><?=$fields['description']?></p>
                <?php } ?>

                <?php if(is_array($fields['buttons']) && !empty($fields['buttons']))  { ?>
                    <div class="wp-block-buttons">
                        <?php foreach($fields['buttons'] as $button) {

                            // Make sure it's not an empty link
                            if(isset($button['link']['url']) && strlen($button['link']['url']) > 1) {

                                $button_classes = array();

                                // If it's OUTLINE
                                if($button['outline'] == 1) {
                                    $button_classes[] = "is-style-outline";
                                    $button_classes[] = "has-{$button['color']}-color has-text-color";
                                } else {
                                    $button_classes[] = "is-style-fill";
                                    $button_classes[] = "has-{$button['color']}-background-color has-background";
                                }

                                // Always medium size
                                $button_classes[] = "has-medium-font-size";

                                ?>
                                <a href="<?=$button['link']['url']?>" class="wp-block-button__link <?=implode(' ',$button_classes)?>" target="<?=$button['link']['target']?>"><?=$button['link']['title']?></a>
                            <?php }
                            } ?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

<?php } ?>