<?php
/*
Plugin Name:  Tags
Plugin URI:   https://iamjoshellis.com
Description:  Adds tags to wp footer in production enviroments
Version:      1.0.0
Author:       Josh Ellis
Author URI:   https://iamjoshellis.com
License:      MIT License
*/

namespace JoshEllis\Tags;

function load_tags() {
  if (WP_ENV === 'production') {
    foreach (glob(__DIR__ . '/tags/*.php') as $file) {
      echo file_get_contents($file);
    }
  }
}

add_action( 'wp_footer', __NAMESPACE__ . '\load_tags', 200 );
