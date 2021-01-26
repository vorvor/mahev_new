<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './resources/PHPMailer/src/Exception.php';
require './resources/PHPMailer/src/PHPMailer.php';
//require './resources/PHPMailer/src/SMTP.php';

if (isset($_POST['submit']) && !isset($_POST['lastname'])) {
    
    // Populate mail template with actual data.
    $body = file_get_contents('./mail-tpl-mahev.php');
      
    $fields = ['name', 'address', 'phone', 'email', 'message', 'model', 'facility', 'exterior', 'interior', 'rim', 'wtire', 'extra', 'selfdrive', 'seats'];
    
    foreach ($fields as $field) {
      $body = str_replace('###' . $field . '###', $_POST[$field], $body);
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
      $mail->Body    = 'This is the HTML message body <b>in bold!</b>';

      
      

      $mail->Body .= 
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $mail->send();
      echo 'Message has been sent';
    

  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


  
   
  


}

?>