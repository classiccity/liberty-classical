<?php

add_action( 'after_switch_theme', 'ccc_set_google_key' );
function ccc_set_google_key() {
    update_option('acfgfs_api_key',"AIzaSyBx7gC-_OH6WO6dn7bqU5txo--bl6mQdxw");
}