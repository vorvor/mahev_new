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
    $body = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail-tpl-message.php');
      
    $fields = ['firstname', 'address', 'phone', 'email', 'message'];
    
    foreach ($fields as $field) {
      if (isset($_POST[$field])) {
        if ($field == 'firstname') {
          $body = str_replace('###name###', $_POST[$field], $body);
        } else {
          $body = str_replace('###' . $field . '###', $_POST[$field], $body);
        }
      } else {
        $pattern = '/<!-- ' . $field . ' block start -->.*?<!-- ' . $field . ' block end -->/msi';
        $body = preg_replace($pattern, '', $body);
      }
    }

    //print $body;
    //return 'hey';

    $mail = new PHPMailer(true);

    try {
      
      $mail->isMail();
      $mail->CharSet = 'UTF-8';
      //Recipients
      $mail->setFrom('noreply@mah-ev.hu', 'MAH Zrt.');
      $mail->addBcc('vorosborisz@gmail.com', 'Vörös Borisz');
      $mail->addAddress('info@mahzrt.hu', 'MAH Zrt.');
      $mail->addReplyTo('info@mahzrt.hu', 'MAH Zrt.');

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Köszönjük érdeklődését! - mah-ev.hu';
      
      $mail->Body = $body;
      $mail->AltBody = $body;

      $mail->send();

      header('Location: gen_form-message-thank-you.php');
    

  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


  
   
  


}

?>