<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'hr-partner@wbm-group.pl';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials

  $contact->smtp = array(
    'host' => 'wbm-group.atthost24.pl',
    'username' => 'hr-partner@wbm-group.pl',
    'password' => 'Kj6E6*!EW@W$5',
    'port' => '587'
  );


  $contact->add_message( $_POST['name'], 'Od kogo');
  $contact->add_message( $_POST['tel'], 'Numer telefonu');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['company'], 'Firma');
  $contact->add_message( $_POST['subject'], 'Temat');
  $contact->add_message( $_POST['message'], 'Wiadomośc', 5);

  echo $contact->send();
?>
