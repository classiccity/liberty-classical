<?php

// Displays the current date in the given format
// Example: [current_date format="Y"] displays the current year
function current_date_init( $atts ){
  $a = shortcode_atts( [ 'format' => 'F j, Y'], $atts );
  ob_start();
  echo date($a['format']);
  return ob_get_clean();
}
add_shortcode( 'current_date', 'current_date_init' );



// Does the ACF shortcode to display an acf field, but can use either a post ID or the words post_id.
function ccc_get_any_acf_field( $atts ) {
  $a = shortcode_atts( array(
    'field' => 'job_title',
    'id'    => '263'
  ), $atts );

  if( $a['id'] == 'post_id' ) {
    $id = get_the_ID();
  } else {
    $id = $a['id'];
  }

  ob_start();
  echo do_shortcode('[acf field="job_title" post_id="' . $id . '"]');
  echo ' ' . get_the_ID($post->ID);
  return ob_get_clean();
}
add_shortcode( 'acf_any_field', 'ccc_get_any_acf_field' );