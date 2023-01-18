<?php include(CCC_PLUGIN_PATH.'testimonials/blocks/settings.php'); ?>

<?php

// Get all fields
$fields = get_fields();

// Set the prefix
$prefix = prefix().'-testimonials';

// Append to all_classes
$all_classes = array($prefix,$all_classes);

// Adding Columns class
$columns = (int) $fields['columns'];
if($columns > 1) $all_classes[] = "has-{$columns}-columns";

// Make sure we have testimonials
if(isset($fields['testimonials']) && is_array($fields['testimonials']) && !empty($fields['testimonials'])) { ?>

    <div class="<?=implode('',$all_classes)?>">

        <?php foreach($fields['testimonials'] as $testimonial) {

                $new_testimonial = new Testimonial($testimonial);
                $new_testimonial->html_pod($fields['style']);

        } ?>

    </div>

<?php } ?>
