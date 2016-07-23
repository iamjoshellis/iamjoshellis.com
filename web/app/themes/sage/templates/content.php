<div <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
  <?php get_template_part('templates/entry-meta'); ?>
  <div class="entry-summary">
    <?php the_excerpt(); ?>
  </div>
  <a class="btn-post-more" href="<?php the_permalink(); ?>"><span class="btn-content">Read More</span></a>
  <?php if(get_field('link')): ?>
    <a target="blank" class="btn-post-link" href="<?php the_field('link') ?>"><span class="btn-content">Link</span></a>
  <?php endif; ?>
</div>
