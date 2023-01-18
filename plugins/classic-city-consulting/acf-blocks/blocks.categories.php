<?php

add_filter( 'block_categories', function( $categories, $post ) {

	$prefix = "Classic City Consulting";

	return array_merge(
		$categories,
		array(
			array(
				'title' => __($prefix),
				'slug'  => prefix()
			),
		)
	);
}, 10, 2 );

