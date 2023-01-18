<?php

define("CCC_PODCAST_CATEGORY_SLUG_OPTION_NAME","ccc_podcast_category_slug");
define("CCC_PODCAST_PREFIX","ccc-podcast");

$the_podcast_category = get_option(CCC_PODCAST_CATEGORY_SLUG_OPTION_NAME);


define("CCC_PODCAST_CATEGORY_SLUG",$the_podcast_category);



// Taxonomy
// --- None

// CPTs
include('cpt/sponsor.php');

// Core
include('core.php');

// ACF
include('acf/podcast.php');
include('acf/sponsors.php');
include('acf/theme-options.php');

// Includes
include('inc/update-podcast-category.php');
include('inc/sponsors.php');

// Classes
//include('classes/class.Testimonial.php');

// Blocks
//include('blocks/blocks.php');