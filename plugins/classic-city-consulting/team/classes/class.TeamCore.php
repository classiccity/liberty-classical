<?php

Class TeamCore {

    public static function person_pod($person) {


        // CSS class prefix
        $css_prefix = prefix().'-people';

        ?>

        <div class="<?=$css_prefix?>__single is-<?=sanitize_title($person->department->name)?>">

            <div class="<?=$css_prefix?>__photo">
                <img src="<?=$person->photos['primary']?>" alt="Photo of <?=$person->name?>">
            </div>

            <div class="<?=$css_prefix?>__title">
                <p class="<?=$css_prefix?>__name"><?=$person->name?></p>
                <p class="<?=$css_prefix?>__job">
                    <!--<span class="<?=$css_prefix?>__department"><?=$person->department->name?></span>
                    <i class="fal fa-angle-right"></i>-->
                    <span class="<?=$css_prefix?>__title"><?=$person->job_title?></span>
                </p>
            </div>

            <div class="<?=$css_prefix?>__bio"><?=$person->tiny_bio?></div>

        </div>

    <?php }

}