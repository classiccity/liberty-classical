<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
/**
 * Accordion Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


$prefix = prefix().'-accordion';
 
// create id attribute for specific styling
$id = 'accordion-' . $block['id'];
 
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}
 
// Create class attribute allowing for custom "className" and "align" values.
$className = $prefix;
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}
 
//get repeater field name
if( have_rows('accordion') ): ?>
 
         <div class="<?php echo esc_attr($className); ?> <?php echo $align_class; ?>" id="<?php echo $id; ?>">
                <?php
                //whilst we have repeating fields
                while ( have_rows('accordion') ) : the_row(); 
                    //vars
                    $acc_title = get_sub_field('accordion_title');
                    $acc_content = get_sub_field('accordion_content');
                    ?>
                 <div class="<?=$prefix?>-item">
                    <h3 class="acc_title">
                        <?php echo $acc_title; ?>
                    </h3>
     
                    <div class="panel" style="display: none;">
                        <?php echo $acc_content; ?>
                    </div>
                </div>
                 
               <?php endwhile; ?>
        </div>
<?php endif; // end accordion ?>


<script>
    // jQuery accordion
    (function( $ ) {
        'use strict';

        $(document).ready(function(){

            $( ".<?=$prefix?>" ).accordion({
              collapsible: true,
              active : 'none',
              header: ".acc_title",
              heightStyle: "content",
              activate: function( event, ui ) {
                if(!$.isEmptyObject(ui.newHeader.offset())) {
                  if ($(window).width() > 767) {
                    $('html:not(:animated), body:not(:animated)').animate({ scrollTop: ui.newHeader.offset().top -180 }, 'slow');
                  }
                  else {
                    $('html:not(:animated), body:not(:animated)').animate({ scrollTop: ui.newHeader.offset().top -50 }, 'slow');
                  }
                }
              }
            });

        });
    })( jQuery );
</script>