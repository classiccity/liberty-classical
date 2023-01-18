<?php

Class Testimonial {

    public $id = 0;
    public $name = "";
    public $first_name = "";
    public $last_name = "";
    public $company = "";
    public $job_title = "";
    public $image = "";
    public $content = "";
    public $excerpt = "";

    /**
     * Testimonial constructor.
     * @param WP_Post $post
     */
    public function __construct($post) {

        // Get all custom fields
        $fields = get_fields($post);

        // Set variables from ACF fields
        foreach($fields as $key => $value) {

            // Make sure we have a field for this key
            if(isset($this->{$key})) {

                // Set the object's value
                $this->{$key} = $value;

            }

        }

        // Set the ID
        $this->id = $post->ID;

        // Set the featured image
        $this->image = get_the_post_thumbnail_url($post,array('thumbnail','medium','full'));

        // Set the content
        $this->content = $post->post_content;

        // Set the excerpt
        $this->excerpt = get_the_excerpt($post);

        // Set the name
        $this->name = $post->post_title;




    }




    public function html_pod($style) {

        // Prefix for the testimonial pod
        $prefix = prefix().'-testimonials';

        $parent_classes = array($prefix."__single","is-{$style}");


        // Create the job string
        $job = "";
        if(strlen($this->job_title) > 1 && strlen($this->company) > 1) {
            $job = $this->job_title . " at " . $this->company;
        } elseif(strlen($this->job_title) > 1) {
            $job = $this->job_title;
        } elseif(strlen($this->company) > 1) {
            $job = $this->company;
        }

        ?>

        <div class="<?=implode(' ',$parent_classes)?>">
            <div class="<?=$prefix?>__image">
                <img src="<?=$this->image?>" alt="Photo of <?=$this->name?>">
            </div>

            <div class="<?=$prefix?>__header">
                <p class="<?=$prefix?>__name"><?=$this->name?></p>

                <?php if(strlen($job) > 1) { ?>
                    <p class="<?=$prefix?>__title"><?=$job?></p>
                <?php } ?>
            </div>

            <div class="<?=$prefix?>__description">
                <?=$this->content?>
            </div>
        </div>


    <?php }


    public static function dd($var,$die=0) {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        if($die===1) die();
    }

}