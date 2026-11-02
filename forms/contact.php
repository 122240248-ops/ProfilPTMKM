<?php
  /**
  * Memerlukan pustaka "PHP Email Form".
  * Pustaka "PHP Email Form" hanya tersedia pada versi profesional templat ini.
  * Pustaka harus diunggah ke: vendor/php-email-form/php-email-form.php
  * Informasi dan bantuan: https://bootstrapmade.com/php-email-form/
  */

  // Ganti contact@example.com dengan alamat surel penerima yang sebenarnya.
  $receiving_email_address = 'contact@example.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Pustaka "PHP Email Form" tidak dapat dimuat.');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Hapus komentar pada kode berikut untuk mengirim surel melalui SMTP, lalu masukkan kredensial SMTP yang benar.
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'Pengirim');
  $contact->add_message( $_POST['email'], 'Alamat surel');
  $contact->add_message( $_POST['message'], 'Pesan', 10);

  echo $contact->send();
?>
