<section class="py-16">
        <div class="container grid md:grid-cols-2 gap-8">
            <div class="_section-title _io col-span-full relative mb-8 md:mb-12">
    			<h2 class="text-gray-500 text-3xl md:text-5xl pl-4 sm:pl-8  md:pl-16 ">Hírek</h2>
    		<div class="absolute left-0 top-0 bottom-0 border-l-2 border-emerald-500">
    		</div>
		</div>

	<?php

  include_once('./base.php');
  $data = curl_get_contents('https://mahev.hu/articles-api-four');
  $articles = json_decode($data, true);
  
  foreach ($articles['nodes'] as $article) {
          
                print '<div class="card-news">';
				    print '<a href="/gen_article.php?q=' . $article['node']['nid'] . '">';
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