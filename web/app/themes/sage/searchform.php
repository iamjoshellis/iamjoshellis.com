<form id="search-form" class="search-form" action="/" method="get">
  <label class="sr-only" for="search">Search <?php bloginfo('name'); ?></label>
  <input type="search" name="s" id="search-input" class="search-input" value="<?php the_search_query(); ?>" />
</form>
