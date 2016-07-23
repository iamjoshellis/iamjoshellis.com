<?php
// Post id for page header
$post_id = get_option('page_for_posts');
$args = array(
  'hierarchical'       => 0,
  'title_li'           => null
);
?>

<nav class="navbar category-nav">
  <ul id="cat-filter" class="cat-filter">
    <li class=""><a href="<?= (get_option('show_on_front') == 'page') ? get_permalink(get_option('page_for_posts')) : bloginfo('url'); ?>">All</a></li>
    <?php wp_list_categories($args); ?>
  </ul>
</nav>
