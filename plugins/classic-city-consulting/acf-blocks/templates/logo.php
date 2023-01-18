<?php include(get_theme_file_path().'/blocks/blocks.settings.php'); ?>

<?php

$prefix = prefix().'-logo';

$fields = get_fields();

$all_classes = array($prefix,$all_classes);

// Placeholder for $logo
$logo = "";

// Let's get the logo type
if($fields['logo_type'] === "svg") {
    $logo = get_field('svg_logo','options');
    $all_classes[] = "is-svg";
} elseif($fields['logo_type'] === "light_logo") {
    $logo = get_field('light_logo','options');
    $logo = '<img src="'.$logo['url'].'" alt="'.$logo['alt'].'">';
    $all_classes[] = "is-light";
} elseif($fields['logo_type'] === "dark_logo") {
    $logo = get_field('dark_logo','options');
    $logo = '<img src="'.$logo['url'].'" alt="'.$logo['alt'].'">';
    $all_classes[] = "is-dark";
}


// Do we have a logo?
if(strlen($logo) > 1) { ?>

<div class="<?=implode(' ',$all_classes)?>">
    <a href="/"><?=$logo?></a>
</div>

<?php } ?>