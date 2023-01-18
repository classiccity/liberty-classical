<?php
define( 'ACF_5_KEY', 'b3JkZXJfaWQ9ODcwODh8dHlwZT1wZXJzb25hbHxkYXRlPTIwMTYtMDgtMDcgMDE6MTg6MDQ=' );

// Set ACF 5 license key on theme activation. Stick in your functions.php or equivalent.
function auto_set_license_keys() {

    if ( ! get_option( 'acf_pro_license' ) && defined( 'ACF_5_KEY' ) ) {

        $save = array(
            'key'	=> ACF_5_KEY,
            'url'	=> home_url()
        );

        $save = maybe_serialize($save);
        $save = base64_encode($save);

        update_option( 'acf_pro_license', $save );
    }
}
add_action( 'after_switch_theme', 'auto_set_license_keys' );