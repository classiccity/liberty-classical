<?php

//Add jquery UI to theme functions.php file
function ccc_acfblocks_scripts() {
    if (!is_admin()) {
        wp_register_script('jqueryui', '//code.jquery.com/ui/1.12.1/jquery-ui.js', array('jquery'), '1.12.1', true);
        wp_enqueue_script('jqueryui');
    }

    // Blocks JS
        wp_enqueue_script( prefix().'-blocks-js', CCC_ACF_BLOCK_PATH.'blocks.js', array('jquery'), filemtime(CCC_ACF_BLOCK_PATH.'blocks.js'), true  );
}
add_action('init', 'ccc_acfblocks_scripts');