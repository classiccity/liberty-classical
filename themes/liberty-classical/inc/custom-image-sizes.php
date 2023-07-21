<?php

// Add Custom Image Size
add_image_size( prefix().'-small', 150, 150, true );
add_image_size( prefix().'-medium', 345, 180, true );
add_image_size( prefix().'-large', 1200, 400, true );
add_image_size( prefix().'-thumbnail', 325, 325, true );



// All sizes
add_filter( 'image_size_names_choose', 'mg_custom_image_sizes' );
function mg_custom_image_sizes( $sizes ) {
	return array_merge( $sizes, array(
		prefix().'-small'                    	=> __( 'LC Small' ),
		prefix().'-medium'                   	=> __( 'LC Medium' ),
		prefix().'-large'                   	=> __( 'LC Large' ),
		prefix().'-thumbnail'                   => __( 'Thumbnail Large' ),
	) );
}