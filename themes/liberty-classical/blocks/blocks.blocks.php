<?php

// THE BLOCKS
add_action('acf/init', 'ccc_acf_blocks');
function ccc_acf_blocks() {
	if( function_exists('acf_register_block') ) {
       acf_register_block_type(array(
           'name'              => 'video-with-image',
           'title'             => 'Video with Image',
           'description'       => 'Shows a an image which changes to video when you click the play button',
           'render_template'   => 'blocks/templates/callouts/video-with-image.php',
           'category'          => prefix().'-callouts',
           'icon'              => '',
           'keywords'          => array( 'video', 'image', 'play' ),
       ));

	}
}