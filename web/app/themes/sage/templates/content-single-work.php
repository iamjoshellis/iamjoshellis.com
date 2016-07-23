<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part('templates/page-header'); ?>
    <div class="container">
      <?php if(get_field('project_logo') || get_field('project_link')): ?>
        <div class="project-info">
          <?php if(get_field('project_logo')): ?>
            <?php echo wp_get_attachment_image(get_field('project_logo')['ID'], 'full', false, array( 'class' => 'project-logo' )); ?>
          <?php endif; ?>
          <?php if(get_field('link')): ?>
            <a target="blank" class="project-link" href="<?php the_field('link'); ?>"><?php the_field('link'); ?></a>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <?php get_template_part('templates/entry-meta', 'work'); ?>
      <div class="the-content">
        <?php the_content(); ?>
      </div>
    </div>
  </article>
<?php endwhile; ?>
