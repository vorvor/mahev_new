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
    $body = file_get_contents('./mail-tpl-mahev.php');
      
    $fields = ['firstname', 'address', 'phone', 'email', 'message', 'model', 'facility', 'exterior', 'interior', 'rim', 'wtire', 'extra', 'selfdrive', 'seats'];
    
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

    $mail = new PHPMailer(true);

    try {
      
      $mail->isMail();
      //Recipients
      $mail->setFrom('from@wabisabee.com', 'Mailer');
      $mail->addAddress('vorosborisz@gmail.com', 'Vörös Borisz');     // Add a recipient
      $mail->addReplyTo('info@wabisabee.com', 'Wabisabee team');

      // Content
      $mail->isHTML(true);                                  // Set email format to HTML
      $mail->Subject = 'Here is the subject';
      
      $mail->Body = $body;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
      
    

  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


  
   
  


}

?>