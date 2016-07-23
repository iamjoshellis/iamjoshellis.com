<?php

use Roots\Sage\Titles;
use Roots\Sage\Extras;

?>

<header id="page-header" class="page-header <?= (get_field('cover') ? 'cover' : null) ?>">
  <div class="container text-container">
    <?= (Titles\title()) ? '<h1>' . Titles\title() . '</h1>' : null ?>
    <?= (Titles\subtitle()) ? '<p>' . Titles\subtitle() . '</p>' : null ?>
    <?php (is_page('about')) ? get_template_part('templates/social-nav') : null ?>
  </div>
  <?php if (is_single() && !get_field('no_images')): ?>
    <div class="container img-container">
      <?php if(get_field('banner_image_center')): ?>
        <?php echo wp_get_attachment_image(get_field('banner_image_center')['ID'], 'full', false, array( 'class' => 'banner-img banner-img-center' )); ?>
      <?php else: ?>
        <?php the_post_thumbnail(); ?>
      <?php endif; ?>
      <?php if(get_field('banner_image_left')): ?>
        <?php echo wp_get_attachment_image(get_field('banner_image_left')['ID'], 'full', false, array( 'class' => 'banner-img banner-img-left' )); ?>
      <?php endif; ?>
      <?php if(get_field('banner_image_right')): ?>
        <?php echo wp_get_attachment_image(get_field('banner_image_right')['ID'], 'full', false, array( 'class' => 'banner-img banner-img-right' )); ?>
      <?php endif; ?>
    </div>
  <?php endif;?>
  <?php if(get_field('background_iframe')): ?>
    <iframe class="featured-iframe" src="<?= Extras\remove_protocol(get_field('background_iframe')) ?>"></iframe>
  <?php endif; ?>
</header>
