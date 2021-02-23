<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './resources/PHPMailer/src/Exception.php';
require './resources/PHPMailer/src/PHPMailer.php';
//require './resources/PHPMailer/src/SMTP.php';

if (isset($_POST['submit']) && $_POST['lastname'] == '') {
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Populate mail template with actual data.
    $body = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail-tpl-offer.php');
      
    $fields = ['firstname', 'address', 'phone', 'email', 'message', 'model', 'facility', 'exterior', 'interior', 'rim', 'wtire', 'extra', 'selfdrive', 'seats', 'price'];
    
    foreach ($fields as $field) {
      if (isset($_POST[$field])) {
        if ($field == 'firstname') {
          $body = str_replace('###name###', $_POST[$field], $body);
        } elseif ($field == 'price') {
          $body = str_replace('###price###', number_format($_POST[$field], 0, '', ' ') . ' EUR', $body);
        } else {
          $body = str_replace('###' . $field . '###', $_POST[$field], $body);
        }
      } else {
        // If no value set, remove entire block html wrapper.
        $pattern = '/<!-- ' . $field . ' block start -->.*?<!-- ' . $field . ' block end -->/msi';
        $body = preg_replace($pattern, '', $body);
      }
    }

    $body = str_replace('###configpic###', 'https://new.mah-ev.hu/sequences/' . $_POST['configpic'] . '/' . $_POST['configpic'] . '_00000.jpg', $body);
    $body = str_replace('###configpic-end###', 'https://new.mah-ev.hu/sequences/' . $_POST['configpic'] . '/' . $_POST['configpic'] . '_00200.jpg', $body);

    //print $body;
    //return 'hey!';

    $mail = new PHPMailer(true);

    try {
      
      $mail->isMail();
      $mail->CharSet = 'UTF-8';
      //Recipients
      $mail->setFrom('info@mahzrt.hu', 'MAH Zrt.');
      $mail->addBcc('vorosborisz@gmail.com', 'Vörös Borisz');
      $mail->addAddress('info@mahzrt.hu', 'MAH Zrt.');
      $mail->addAddress('mudri.daniel21@gmail.com', 'Mudri Daniel');
      $mail->addAddress($_POST['email']); // Client address.
      $mail->addReplyTo('info@mahzrt.hu', 'MAH Zrt.');

      $mail->isHTML(true);
      $mail->Subject = 'Köszönjük megrendelését! - mah-ev.hu';
      
      $mail->Body = $body;
      $mail->AltBody = $body;

      $mail->send();

      header('Location: gen_form-offer-thank-you.php');
    

  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


  
   
  


}

?>