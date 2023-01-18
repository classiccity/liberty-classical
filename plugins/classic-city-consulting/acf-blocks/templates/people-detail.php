<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$prefix = prefix() . '-people-detail';
$fields = get_fields();
$all_classes = array($prefix,$all_classes);


// Generate a random string for the ID so we have something to connect to (this is incase the block is used multiple times on the same page)
$length = 15;
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$charactersLength = strlen($characters);
$randomString = '';
for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
}


if(isset($fields['people']) && is_array($fields['people']) && !empty($fields['people'])) { ?>
    
    <div class="<?=implode(' ',$all_classes)?> has-3-columns" data-people-container="<?=$randomString?>">

        <?php foreach($fields['people'] as $id => $person) {

            $person_id = sanitize_title($person['name']);
            $fields['people'][$id]['id'] = $person_id;
            ?>

            <div class="<?=$prefix?>__person" data-toggle-person-modal="<?=$person_id?>">
                <img src="<?=$person['image']['url']?>" alt="">
                <div class="<?=$prefix?>__meta">
                    <h3 class="<?=$prefix?>__name"><?=$person['name'];?></h3>
                    <p class="<?=$prefix?>__title"><?=$person['title']?></p>
                    <div class="wp-block-button ccc-button--alt">
                        <a class="wp-block-button__link has-foreground-color has-white-background-color has-text-color has-background" href="javascript:void(0)">Read More</a>
                    </div>
                </div>
            </div>

        <?php } ?>

    </div>


    <div class="<?=$prefix?>__modal" data-modal-container="<?=$randomString?>">

        <?php foreach($fields['people'] as $id => $person) { 

            if($person['image']) {
                $modal_container_class = "has-2-columns";
            } else {
                $modal_container_class = "";
            }
        ?>

            <div class="<?=$prefix?>__content" data-person-modal="<?=$person['id']?>">
                <span data-close-person-modal><i class="fal fa-times-circle"></i></span>

                <div class="<?=$modal_container_class?>">
                    <?php if($person['image']) { ?>
                    <div class="<?=$prefix?>__photo">
                        <img src="<?=$person['image']['url']?>" alt="">
                    </div>
                    <?php } ?>
                    <div class="<?=$prefix?>__details">
                        <h3><?=$person['name'];?></h3>
                        <p class="is-topper is-small h2"><?=$person['title']?></p>
                        <p><?=$person['bio']?></p>
                        <?php if(strlen($person['email']) > 1) { ?>
                            <p><strong>Email:</strong> <a href="mailto:<?=$person['email']?>"><?=$person['email']?></a></p>
                        <?php } ?>
                        <?php if(strlen($person['website']) > 1) { ?>
                            <p><strong>Website:</strong> <a href="<?=$person['website']?>" target="_blank"><?=$person['website']?></a></p>
                        <?php } ?>
                    </div>
                </div>

            </div>

        <?php } ?>

    </div>

    <script>

        (function( $ ) {
            'use strict';


            $(document).ready(function(){

                var activeCSS = "is-active";

                // On click of a person
                $('[data-toggle-person-modal]').on('click',function(){

                    var personID = $(this).attr('data-toggle-person-modal');

                    var idOfSection = $(this).parent().attr('data-people-container');

                    console.log(idOfSection+"...");

                    // Show the modal container
                    $('[data-modal-container="'+idOfSection+'"]').addClass(activeCSS);

                    // Make sure all people's content is hidden
                    $('[data-person-modal]').each(function(){
                        $(this).removeClass(activeCSS);
                    });

                    // Make the person's content visible
                    $('[data-person-modal="'+personID+'"]').addClass(activeCSS);

                });

                $('[data-close-person-modal]').on('click',function(){
                    $('[data-modal-container]').removeClass(activeCSS);
                });

            });

        })( jQuery );
    </script>

<?php }