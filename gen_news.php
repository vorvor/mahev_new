<section class="py-16">
        <div class="container grid md:grid-cols-2 gap-8">
            <div class="_section-title _io col-span-full relative mb-8 md:mb-12">
    			<h2 class="text-gray-500 text-3xl md:text-5xl pl-4 sm:pl-8  md:pl-16 ">Hírek</h2>
    		<div class="absolute left-0 top-0 bottom-0 border-l-2 border-emerald-500">
    		</div>
		</div>

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

  $data = curl_get_contents('https://mahev.hu/articles-api-four');
  $articles = json_decode($data, true);
  
  foreach ($articles['nodes'] as $article) {
          
                print '<div class="card-news">';
				    print '<a href="/article.html">';
				        print '<div class="img relative w-full h-64 overflow-hidden flex gradient-overlay">';
				            print '<img class="object-cover object-center block h-full w-full" src="' . $article['node']['field_main_image']['src'] . '" alt="">';
				        print '</div>';
				        print '<div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div>';
				        print '<h2 class="text-xl py-4 text-gray-500">' . $article['node']['title'] . '</h2>';
				        print '<p class="text-gray-500">' . $article['node']['field_lead'] . '</p>';
				    print '</a></div>';
	}  


?>
            
            <div class="col-span-full text-center mt-8">
                <a href= "" class= " bg-emerald-500  hover:bg-emerald-600  font-semibold inline-block leading-5 px-6 py-3 rounded-sm text-sm text-center text-white tracking-wider uppercase duration-150 ease-in-out">Összes hír</a>
            </div>
        </div>
    </section>