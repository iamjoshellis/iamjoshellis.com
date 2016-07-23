<?php
/**
 * Plugin Name:  WordPress-GitHub Sync Custom Filters
 * Plugin URI:   https://github.com/mAAdhaTTah/wordpress-github-sync
 * Description:  Adds support for custom post types and statuses
 * Version:      1.0.0
 * Author:       Josh Ellis
 * Author URI:   https://iamjoshellis.com/
 * License:      GPL2
 */

add_filter('wpghs_whitelisted_post_types', function ($supported_post_types) {
  if(($key = array_search('page', $supported_post_types)) !== false) {
    unset($supported_post_types[$key]);
  }
});

add_filter('wpghs_whitelisted_post_statuses', function ($supported_post_statuses) {
  return array_merge($supported_post_statuses, array(
    'draft'
  ));
});
