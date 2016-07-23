<?php
$tags = get_terms(array(
  'taxonomy' => 'post_tag',
  'hide_empty' => true,
));
$cats = get_terms(array(
  'taxonomy' => 'category',
  'hide_empty' => true,
));
?>
<nav class="nav nav-meta">
  <div class="container">
    <button id="btn-categories" class="btn">Categories</button>
    <button id="btn-tags" class="btn">Tags</button>
    <nav id="nav-categories" class="nav nav-category">
      <ul class="container category-list">
        <?php foreach ($cats as $term): ?>
          <?php echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>'; ?>
        <?php endforeach; ?>
      </ul>
    </nav>
    <nav id="nav-tags" class="nav nav-tag">
      <ul class="container tag-list">
        <?php foreach ($tags as $term): ?>
          <?php echo '<li><a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . '</a></li>'; ?>
        <?php endforeach; ?>
      </ul>
    </nav>
    <?php get_search_form(); ?>
  </div>
</nav>
