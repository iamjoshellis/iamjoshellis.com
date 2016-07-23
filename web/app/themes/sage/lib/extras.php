<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip;';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Automatically add IDs and links to headings
 */
function auto_id_headings($content) {
  if (get_post_type() == 'post') {
  	$content = preg_replace_callback( '/(\<h[1-6](.*?))\>(.*)(<\/h[1-6]>)/i', function( $matches ) {
  		if ( ! stripos( $matches[0], 'id=' ) ) {
  			$heading_link = '<a href="#' . sanitize_title( $matches[3] ) . '"></a>';
  			$matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title( $matches[3] ) . '">' . $heading_link . $matches[3] . $matches[4];
  		}
  		return $matches[0];
  	}, $content );
      return $content;
    }
  return $content;
}
add_filter( 'the_content', __NAMESPACE__ . '\\auto_id_headings' );

/**
 * Get Reading time in minutes
 */
function get_reading_time() {
  $word_count = str_word_count(strip_tags(get_the_content()));
  $words_per_minute = 250;
  $time_in_minutes = $word_count/$words_per_minute;
  $time_in_minutes = round($time_in_minutes);
  $str_time = strval($time_in_minutes);
  if ($time_in_minutes < 1) {
    return '<span class="reading-time">1 Min</span>';
  } else {
    return '<span class="reading-time">' . $str_time . ' Mins</span>';
  }
}

/**
 * Stop rougue <p> tags
 */

function remove_ptags_on_images($content) {
  return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', __NAMESPACE__ . '\\remove_ptags_on_images');

/**
 * Make ACF WYSIWYG Images responsive
 */
add_filter( 'acf_the_content', 'wp_make_content_images_responsive' );

/**
 * Remove protocol from url
 */
function remove_protocol($url) {
  return preg_replace("(^https?:)", "", $url );
}

function tidy_string($string) {
  //Lower case everything
  $string = strtolower($string);
  //Make alphanumeric (removes all other characters)
  $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
  //Clean up multiple dashes or whitespaces
  $string = preg_replace("/[\s-]+/", " ", $string);
  //Convert whitespaces and underscore to dash
  $string = preg_replace("/[\s_]/", "-", $string);
  return $string;
}
