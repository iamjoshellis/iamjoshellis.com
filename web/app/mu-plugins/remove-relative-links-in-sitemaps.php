<?php
/**
 * Plugin Name:  Remove relative links in sitemaps
 * Plugin URI:   https://github.com/roots/soil/issues/156
 * Description:  Fixes issue #16 with soil
 * Version:      1.0.0
 * Author:       Josh Ellis
 * Author URI:   https://iamjoshellis.com/
 * License:      GPL2
 */

function remove_relative_links_in_sitemaps() {
  if ( ! isset( $_SERVER['REQUEST_URI'] ) ) {
    return;
  }

  $request_uri = $_SERVER['REQUEST_URI'];
  $extension   = substr( $request_uri, -4 );

  if ( false !== stripos( $request_uri, 'sitemap' ) && in_array( $extension, array( '.xml', '.xsl' ) ) ) {

    remove_filter( 'bloginfo_url', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'the_permalink', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'wp_list_pages', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'wp_list_categories', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'the_tags', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'get_pagenum_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'get_comment_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'month_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'day_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'year_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'term_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'the_author_posts_link', 'Roots\\Soil\\Utils\\root_relative_url', 10 );
    remove_filter( 'wp_get_attachment_url', 'Roots\\Soil\\Utils\\root_relative_url', 10 );

  }
}

add_action( 'init', 'remove_relative_links_in_sitemaps' );
