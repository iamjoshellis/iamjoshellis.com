<?php

use JoshEllis\Mailgun\Mail;

$state = '';
$message = "Sending...";
$icon = file_get_contents(get_template_directory() . '/dist/images/contact-loading.svg');
$error = FALSE;

if(isset($_POST['action']) && $_POST['action'] == 'contact_form') {

  // TODO Better state handling for post requests

  $mailgun = Mail\send_mail($_POST);

  if(isset($mailgun -> id)) {

    $state = 'state-success';
    $message = "Thanks! I'll be in touch soon.";
    $icon = file_get_contents(get_template_directory() . '/dist/images/contact-success.svg');
    $error = FALSE;

  } else {

    $state = 'state-error';
    $message = "Sorry, something went wrong...";
    $icon = file_get_contents(get_template_directory() . '/dist/images/contact-error.svg');
    $error = TRUE;

  }

}
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>
<div class="container">
  <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" class="form <?= $state ?>" id="contact-form" role="form" method="POST">
    <span class="input-wrapper">
      <input id="contact-name" name="contact-name" type="text" value="" aria-required="true" aria-invalid="false" required>
      <label for="contact-name">
        <span>name</span>
      </label>
    </span>
    <span class="input-wrapper">
      <input id="contact-email" name="contact-email" type="email" value="" aria-required="true" aria-invalid="false" required>
      <label for="contact-email">
        <span>email</span>
      </label>
    </span>
    <span class="textarea-wrapper">
      <textarea id="contact-message" name="contact-message" aria-invalid="false" required></textarea>
      <label for="contact-message">
        <span>message</span>
      </label>
    </span>
    <button id="contact-submit" type="submit" class="btn-contact-submit">
      <span class="btn-content">Submit</span>
    </button>
    <div id="form-overlay" class="form-overlay">
      <div id="overlay-icon" class="overlay-icon">
        <?= $icon ?>
      </div>
      <span id="overlay-message" class="overlay-message"><?= $message ?></span>
    </div>
    <input type="hidden" name="action" value="contact_form">
  </form>
</div>
