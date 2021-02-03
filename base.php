<?php

  $phone_main = '+36 20 666 8888';

  function curl_get_contents($url) {

  $ch = curl_init($url);

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  curl_setopt($ch, CURLOPT_POST, 1);

  $params = array(
    'pass' => '123',
  );
  curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

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