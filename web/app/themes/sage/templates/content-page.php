<div class="container">
  <div class="the-content">
    <?php the_content(); ?>
  </div>
  <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
</div>
