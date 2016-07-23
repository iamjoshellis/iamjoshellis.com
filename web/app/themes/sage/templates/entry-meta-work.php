<?php if(get_the_terms(get_the_ID(), 'type') || get_the_terms(get_the_ID(), 'role') || get_the_terms(get_the_ID(), 'tech')): ?>
  <ul class="content-meta">
    <?php if(get_the_terms(get_the_ID(), 'type')): ?>
      <li><span class="tooltip" aria-label="Types"><i class="icon-bookmark"></i></span><?php the_terms(get_the_ID(), 'type'); ?></li>
    <?php endif; ?>
    <?php if(get_the_terms(get_the_ID(), 'role')): ?>
      <li><span class="tooltip" aria-label="Roles"><i class="icon-role"></i></span><?php the_terms(get_the_ID(), 'role'); ?></li>
    <?php endif; ?>
    <?php if(get_the_terms(get_the_ID(), 'tech')): ?>
      <li><span class="tooltip" aria-label="Tech"><i class="icon-rocket"></i></span><?php the_terms(get_the_ID(), 'tech'); ?></li>
    <?php endif; ?>
  </ul>
<?php endif; ?>
