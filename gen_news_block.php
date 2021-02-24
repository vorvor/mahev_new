<section class="py-16">
        <div class="container grid md:grid-cols-2 gap-8">
            <div class="_section-title _io col-span-full relative mb-8 md:mb-12">
    			<h2 class="text-gray-500 text-3xl md:text-5xl pl-4 sm:pl-8  md:pl-16 ">Hírek</h2>
    		<div class="absolute left-0 top-0 bottom-0 border-l-2 border-emerald-500">
    		</div>
		</div>

	<?php

  include_once('./get_articles.php');
  $data = @curl_get_contents('http://new.mah-ev.hu/backend/articles-api-four');
  if ($data === FALSE || $data == 'error' || empty($data)) {
    print '<div class="card-news"><a href="/gen_article.php?q=474"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/tesla-bitcoin-900.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=474"></a><a href="/backend/tesla/cikk/hamarosan-mar-bitcoinert-lehet-teslat-venni">Hamarosan már Bitcoinért is lehet Teslát venni?</a></h2><p class="text-gray-500">Az elektromosautó-gyártó 1,5 milliárd dollárért vásárolt a kriptovalutából.</p></div><div class="card-news"><a href="/gen_article.php?q=473"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/elon-musk-900.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=473"></a><a href="/backend/tesla/cikk/elon-musk-konyvet-ir-tesla-and-spacex-torteneterol">Elon Musk könyvet ír a Tesla and SpaceX történetéről</a></h2><p class="text-gray-500">A vállalkozó első kézből mesél majd a két sikercég viszontagságos napjairól.</p></div><div class="card-news"><a href="/gen_article.php?q=472"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/cybertruck-900_0.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=472"></a><a href="/backend/tesla/cikk/elon-musk-veglegesitettuk-tesla-cybertruck-formatervet">Elon Musk: Véglegesítettük a Tesla Cybertruck formatervét</a></h2><p class="text-gray-500">Az első vásárlók már az idei év végén átvehetik az elektromos pickupot.</p></div><div class="card-news"><a href="/gen_article.php?q=471"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/giga-press-900.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=471"></a><a href="/backend/tesla/cikk/mar-all-magasnyomasu-ontogep-felkesz-giga-texasban">Már áll a magasnyomású öntőgép a félkész Giga Texasban</a></h2><p class="text-gray-500">Legkorábban az idei év végén indulhatnak el a gyártósorok Austinban.</p></div>';
  } else {

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
  }

?>
            
            <div class="col-span-full text-center mt-8">
                <!-- <a href= "" class= " bg-emerald-500  hover:bg-emerald-600  font-semibold inline-block leading-5 px-6 py-3 rounded-sm text-sm text-center text-white tracking-wider uppercase duration-150 ease-in-out">Összes hír</a> -->
            </div>
        </div>
    </section>