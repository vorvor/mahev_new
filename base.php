<?php

  function curl_get_contents($url, $post = NULL) {



  if (isset($_POST['api_url'])) {
    $ch = curl_init($_POST['api_url']);
  }
  else {
    $ch = curl_init($url);
  }

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);


  if (isset($_POST['params'])) {
    $params = str_replace('|', '&', $_POST['params']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
  }

  $params = '';
  if (isset($post)) {
    
    curl_setopt($ch, CURLOPT_POST, count($post) + 1);
      
    $params = 'api=1';
    foreach ($post as $key => $value) {       
      $params .= '&' . $key . '=' . $value;
    }
    
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
  }

  $data = curl_exec($ch);
  $status = curl_getinfo($ch);
  curl_close($ch);

  if (isset($_POST['api_url']) && $status['http_code']==200) {
    print $data;
    return;
  }
  if (isset($_POST['api_url']) && $status['http_code']!==200) {
    print 'error';
    //print json_encode($status);
    return;
  }

  if ($status['http_code']!==200) {
    print 'error';
    //print json_encode($status);
    return;
  }

  if($status['http_code'] == 200) {
    return $data;
  }
  elseif($status['http_code']==301 || $status['http_code']==302) {
      if (!$follow_allowed) {
          if (!empty($status['redirect_url'])) {
              $redirURL=$status['redirect_url'];
          } else {
              preg_match('/href\=\"(.*?)\"/si',$data,$m);
              if (!empty($m[1])) {
                	$redirURL=$m[1];
              }
          }
          if(!empty($redirURL)) {
              return  call_user_func( __FUNCTION__, $redirURL, $post_paramtrs);
          }
      }
  }

  return $status;
  
  
}
?>