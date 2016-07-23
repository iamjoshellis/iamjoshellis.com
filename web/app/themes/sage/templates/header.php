<div class="header" id="header">
  <button class="menu-button"><span>Menu</span></button>
</div>
<header class="menu-container" id="menu-container">
  <nav class="nav nav-primary">
    <?php
    if (has_nav_menu('primary_navigation')) :
      wp_nav_menu([
        'theme_location' => 'primary_navigation'
      ]);
    endif;
    ?>
  </nav>
  <?php get_template_part('templates/social-nav'); ?>
</header>
