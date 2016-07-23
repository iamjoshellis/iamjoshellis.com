<?php

use Roots\Sage\Extras;

?>

<ul class="content-meta">
  <li><span class="tooltip" aria-label="Date Published"><i class="icon-date"></i></span><time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date(); ?></time></li>
  <?php if(get_the_terms(get_the_ID(), 'category')): ?>
    <li><span class="tooltip" aria-label="Categories"><i class="icon-bookmark"></i></span><?php the_terms(get_the_ID(), 'category'); ?></li>
  <?php endif; ?>
  <li><span class="tooltip" aria-label="Reading Time"><i class="icon-timer"></i></span><?= Extras\get_reading_time(); ?></li>
</ul>
