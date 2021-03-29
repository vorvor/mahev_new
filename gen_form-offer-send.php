<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './resources/PHPMailer/src/Exception.php';
require './resources/PHPMailer/src/PHPMailer.php';
//require './resources/PHPMailer/src/SMTP.php';

if (isset($_POST['submit']) && $_POST['lastname'] == '') {

    file_put_contents($_SERVER['DOCUMENT_ROOT'] . '/offers/xcaf12/offer-' . date('YmdHis') . '.off', print_r($_POST, 1));

    // Populate mail template with actual data.
    $body = file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/mail-tpl-offer.php');
      
    $fields = ['firstname', 'address', 'phone', 'email', 'message', 'model', 'facility', 'exterior', 'interior', 'rim', 'wtire', 'extra', 'selfdrive', 'seats', 'price'];
    
    foreach ($fields as $field) {
      if (isset($_POST[$field])) {
        if ($field == 'firstname') {
          $body = str_replace('###name###', $_POST[$field], $body);
        } elseif ($field == 'price') {
          $body = str_replace('###price###', $_POST[$field] . ' EUR', $body);
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

    // Financial contruction
    if (!empty($_POST['financial_construction'])) {

      $financial_construction = array(
        'open-end' => 'nyíltvégű pénzügyi lízing',
        'close-end' => 'zártvégű pénzügyi lízing',
        'rental' => 'tartós bérlet',
      );

      $body = str_replace('###financial-construction###', $financial_construction[$_POST['financial_construction']], $body);

      if (!empty($_POST['initial_deposit_open_end'])) {
        $body = str_replace('###initial-deposit###', $_POST['initial_deposit_open_end'] . '%', $body);
      }
      elseif (!empty($_POST['initial_deposit_close_end'])) {
        $body = str_replace('###initial-deposit###', $_POST['initial_deposit_close_end'] . '%', $body);
      }
      elseif (!empty($_POST['initial_deposit_rental'])) {
        $body = str_replace('###initial-deposit###', $_POST['initial_deposit_rental'] . '%', $body);
      }
      else {
        $pattern = '/<!-- initial-deposit block start -->.*?<!-- initial-deposit block end -->/msi';
        $body = preg_replace($pattern, '', $body);
      }

      if (!empty($_POST['duration'])) {
        $body = str_replace('###duration###', $_POST['duration'] . ' hónap', $body);
      } else {
        $pattern = '/<!-- duration block start -->.*?<!-- duration block end -->/msi';
        $body = preg_replace($pattern, '', $body);
      }

      if (!empty($_POST['remain_24'])) {
        $body = str_replace('###remain###', $_POST['remain_24'] . '%', $body);
      }
      elseif (!empty($_POST['remain_24_36'])) {
        $body = str_replace('###remain###', $_POST['remain_24_36'] . '%', $body);
      }
      elseif (!empty($_POST['remain_36_48'])) {
        $body = str_replace('###remain###', $_POST['remain_36_48'] . '%', $body);
      }
      elseif (!empty($_POST['remain_48'])) {
        $body = str_replace('###remain###', $_POST['remain_48'] . '%', $body);
      } else {
        $pattern = '/<!-- remain block start -->.*?<!-- remain block end -->/msi';
        $body = preg_replace($pattern, '', $body);
      }
    } else {
      $pattern = '/<!-- financial-construction block start -->.*?<!-- financial-construction block end -->/msi';
      $body = preg_replace($pattern, '', $body);
    }

    //print $body;
    //return 'hey!';

    $mail = new PHPMailer(true);

    try {
      
      $mail->isMail();
      $mail->CharSet = 'UTF-8';
      //Recipients
      $mail->setFrom('noreply@mah-ev.hu', 'MAH Zrt.');
      $mail->addBcc('vorosborisz@gmail.com', 'Vörös Borisz');
      $mail->addAddress('info@mahzrt.hu', 'MAH Zrt.');
      $mail->addAddress($_POST['email']); // Client address.
      $mail->addReplyTo('info@mahzrt.hu', 'MAH Zrt.');

      $mail->isHTML(true);
      $mail->Subject = 'Köszönjük érdeklődését! - mah-ev.hu';
      
      $mail->Body = $body;
      $mail->AltBody = $body;

      $mail->send();

      header('Location: gen_form-offer-thank-you.php');
    

  } catch (Exception $e) {
      //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }


  
   
  


}

?>