<?php include(CCC_ACF_BLOCK_PATH.'blocks.settings.php'); ?>

<?php
$sponsors = get_field("sponsors",$post_id);

if(is_array($sponsors) && !empty($sponsors)) { ?>

    <section class="<?=CCC_PODCAST_PREFIX?>__sponsors">

        <h2>Sponsors</h2>

        <div class="<?=CCC_PODCAST_PREFIX?>__sponsor-list">

            <?php foreach($sponsors as $sponsor_post) {

                $sponsor = ccc_podcast_get_sponsor_data($sponsor_post->ID);

                ?>

                <div class="<?=CCC_PODCAST_PREFIX?>__single">
                    <h3><?=$sponsor->name?></h3>
                    <p><?=$sponsor->description?></p>
                    <a href="<?=$sponsor->url?>"><?=$sponsor->button?></a>
                </div>


            <?php } ?>

        </div>

    </section>

<?php } ?>