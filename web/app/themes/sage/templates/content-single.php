<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part('templates/page-header'); ?>
    <div class="container">
      <?php get_template_part('templates/entry-meta'); ?>
      <div class="the-content">
        <?php the_content(); ?>
      </div>
      <?php if (get_the_tags()): ?>
        <div class="content-tags">
          <?php the_tags('',''); ?>
        </div>
      <?php endif; ?>
      <div class="button-row">
        <?php get_template_part('templates/social-share'); ?>
        <?php if(get_field('link')): ?>
          <a target="blank" class="btn-post-link" href="<?php the_field('link') ?>"><span class="btn-content">Link</span></a>
        <?php endif; ?>
      </div>
      <?php comments_template(); ?>
    </div>
  </article>
<?php endwhile; ?>
