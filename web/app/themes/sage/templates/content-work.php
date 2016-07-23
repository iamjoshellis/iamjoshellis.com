<?php

use Roots\Sage\Extras;

?>

<div <?php post_class(); ?>>
  <?php if (get_field('iframe_url')): ?>
    <div style="background-image: url('<?= wp_get_attachment_image_src( get_post_thumbnail_id(), 'full', false )[0] ?>');" class="featured-iframe-wrap">
      <iframe class="featured-iframe" src="<?= Extras\remove_protocol(get_field('iframe_url')) ?>"></iframe>
    </div>
  <?php elseif (has_post_thumbnail()): ?>
    <a href="<?php the_permalink(); ?>" class="wp-post-image-link">
      <?php the_post_thumbnail(); ?>
    </a>
  <?php endif; ?>
  <div class="entry-info">
    <header>
      <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>
    <?php get_template_part('templates/entry-meta', 'work'); ?>
    <div class="entry-summary">
      <?php the_excerpt(); ?>
    </div>
    <a class="btn-post-more" href="<?php the_permalink(); ?>"><span class="btn-content">Read More</span></a>
    <?php if(get_field('link')): ?>
      <a target="blank" class="btn-post-link" href="<?php the_field('link') ?>"><span class="btn-content">Link</span></a>
    <?php endif; ?>
  </div>
</div>
