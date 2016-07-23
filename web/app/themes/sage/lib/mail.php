<?php

namespace JoshEllis\Mailgun\Mail;

function send_mail($data) {

  $name = $data['contact-name'];
  $email = $data['contact-email'];
  $content = $data['contact-message'];

  $messageBody = "Contact: $name ($email)\n\nMessage: $content";

  $config = array();
  $config['api_key'] = MAILGUN_APIKEY;
  $config['api_url'] = 'https://api.mailgun.net/v2/' . MAILGUN_DOMAIN . '/messages';
  $config['mail_to'] = MAILGUN_EMAIL;

  $message = array();
  $message['from'] = $email;
  $message['to'] = $config['mail_to'];
  $message['h:Reply-To'] = $email;
  $message['subject'] = 'Contact from ' . $name . ' via ' . WP_HOME;
  $message['text'] = $messageBody;

  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, $config['api_url']);
  curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($curl, CURLOPT_USERPWD, "api:{$config['api_key']}");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_POSTFIELDS,$message);

  $result = json_decode(curl_exec($curl));
  curl_close($curl);

  return $result;

}

function ajax_response($status, $message, $icon = NULL, $data = NULL, $mg = NULL) {

  $response = array (
    'status' => $status,
    'message' => $message,
    'icon' => $icon,
    'data' => $data,
    'mailgun' => $mg
    );
  $output = json_encode($response);
  exit($output);

}


function contact_form() {

  if(isset($_POST['action']) && $_POST['action'] == 'contact_form') {

    $mailgun = send_mail($_POST);

    if(isset($mailgun -> id)) {

      ajax_response(
        'success',
        "Thanks! I'll be in touch soon.",
        file_get_contents(get_template_directory() . '/dist/images/contact-success.svg'),
        $_POST,
        $mailgun
      );

    } else {

      ajax_response(
        'error',
        "Sorry, something went wrong...",
        file_get_contents(get_template_directory() . '/dist/images/contact-error.svg'),
        $_POST,
        $mailgun
      );

    }

  }

}
add_action( 'admin_post_nopriv_contact_form', __NAMESPACE__ . '\\contact_form' );
add_action( 'admin_post_contact_form', __NAMESPACE__ . '\\contact_form' );
