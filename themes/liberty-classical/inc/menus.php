<?php

function ccc_all_menus() {
	register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'ccc_all_menus' );