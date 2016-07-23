<?php

use Roots\Sage\Extras;

$url = urlencode(get_permalink());
$thumb_id = get_post_thumbnail_id($post->ID);
$title = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));
$tags = '';
if (get_the_tags()) {
  foreach(get_the_tags() as $tag) {
     $tags .= Extras\tidy_string($tag->name) . ',';
  }
  $tags = urlencode($tags);
}

$twitter_url = 'https://twitter.com/intent/tweet?text=' . $title . '&url=' . $url . '&hashtags=' . $tags;
$fb_url = 'https://www.facebook.com/sharer.php?u=' . $url;
$google_url = 'https://plus.google.com/share?url=' . $url;
$li_url = 'https://www.linkedin.com/shareArticle?url=' . $url . '&title=' . $title;
$buffer_url = 'https://buffer.com/add?text=' . $title . '&url=' . $url;

?>

<ul class="social-share">
  <li class="social-share-twitter">
    <a target="blank" class="btn btn-social btn-twitter" href="<?= $twitter_url ?>">
      <span class="btn-content">
        <i class="icon-twitter" aria-hidden="true"></i>
        <span class="sr-only">Share on Twitter</span>
      </span>
    </a>
  </li>
  <li class="social-share-facebook">
    <a target="blank" class="btn btn-social btn-facebook" href="<?= $fb_url ?>">
      <span class="btn-content">
        <i class="icon-facebook" aria-hidden="true"></i>
        <span class="sr-only">Share on Facebook</span>
      </span>
    </a>
  </li>
  <li class="social-share-google-plus">
    <a target="blank" class="btn btn-social btn-google-plus" href="<?= $google_url ?>">
      <span class="btn-content">
        <i class="icon-google-plus" aria-hidden="true"></i>
        <span class="sr-only">Share on Google Plus</span>
      </span>
    </a>
  </li>
  <li class="social-share-linkedin">
    <a target="blank" class="btn btn-social btn-linkedin" href="<?= $li_url ?>">
      <span class="btn-content">
        <i class="icon-linkedin" aria-hidden="true"></i>
        <span class="sr-only">Share on LinkedIn</span>
      </span>
    </a>
  </li>
</ul>
