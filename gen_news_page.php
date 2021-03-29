<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('./gen_header.php'); ?>
    <script src="/resources/js/article.js?v=2"></script>
    <title>Tesla hírek | mah-ev.hu</title>
  </head>
  <body class="bg-white brand-page">


    
    <div id="sitewrapper">
      <?php include('./gen_svg.php'); ?>
      <?php include('./gen_header_menu.php'); ?>
      <?php include('./db.php'); ?>


<div class="">
    <div class="_services">

        <main>
            <section id="transparency" class="_services-content">

<section class="py-16">
        <div class="container grid md:grid-cols-2 gap-8" id="articles-container">
            <div class="_section-title _io col-span-full relative mb-8 md:mb-12">
    			<h2 class="text-gray-500 text-3xl md:text-5xl pl-4 sm:pl-8  md:pl-16 ">Hírek</h2>
    		<div class="absolute left-0 top-0 bottom-0 border-l-2 border-emerald-500">
    		</div>
		</div>

	<?php

  include_once('./get_articles.php');
  $data = @curl_get_contents('https://mah-ev.hu/backend/articles-api-twenty');
  $data = @curl_get_contents('https://mah-ev.hu/backend/mahev_article/tesla/cikkek/1/10');

  if ($data === FALSE || $data == 'error' || empty($data)) {
    print '<div class="card-news"><a href="/gen_article.php?q=474"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/tesla-bitcoin-900.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=474"></a><a href="/backend/tesla/cikk/hamarosan-mar-bitcoinert-lehet-teslat-venni">Hamarosan már Bitcoinért is lehet Teslát venni?</a></h2><p class="text-gray-500">Az elektromosautó-gyártó 1,5 milliárd dollárért vásárolt a kriptovalutából.</p></div><div class="card-news"><a href="/gen_article.php?q=473"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/elon-musk-900.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=473"></a><a href="/backend/tesla/cikk/elon-musk-konyvet-ir-tesla-and-spacex-torteneterol">Elon Musk könyvet ír a Tesla and SpaceX történetéről</a></h2><p class="text-gray-500">A vállalkozó első kézből mesél majd a két sikercég viszontagságos napjairól.</p></div><div class="card-news"><a href="/gen_article.php?q=472"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/cybertruck-900_0.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=472"></a><a href="/backend/tesla/cikk/elon-musk-veglegesitettuk-tesla-cybertruck-formatervet">Elon Musk: Véglegesítettük a Tesla Cybertruck formatervét</a></h2><p class="text-gray-500">Az első vásárlók már az idei év végén átvehetik az elektromos pickupot.</p></div><div class="card-news"><a href="/gen_article.php?q=471"><div class="img relative w-full h-64 overflow-hidden flex gradient-overlay"><img class="object-cover object-center block h-full w-full" src="http://new.mah-ev.hu/backend/sites/default/files/giga-press-900.jpg" alt=""></div><div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div></a><h2 class="text-xl py-4 text-gray-500"><a href="/gen_article.php?q=471"></a><a href="/backend/tesla/cikk/mar-all-magasnyomasu-ontogep-felkesz-giga-texasban">Már áll a magasnyomású öntőgép a félkész Giga Texasban</a></h2><p class="text-gray-500">Legkorábban az idei év végén indulhatnak el a gyártósorok Austinban.</p></div>';
  } else {

    $articles = json_decode($data, true);
    
    foreach ($articles as $article) {
                  print '<div class="card-news">';
  				        print '<a href="/' . str_replace('backend/', '', $article['path']) . '">';
  				        print '<div class="img relative w-full h-64 overflow-hidden flex gradient-overlay">';
  				        print '<img class="object-cover object-center block h-full w-full" src="https://mah-ev.hu' . $article['field_main_image'] . '" alt="">';
  				        print '</div>';
  				        print '<div class="border-b-2 border-emerald-500 w-6 Xh-1 mt-6 leading-none"></div>';
  				        print '<h2 class="text-xl py-4 text-gray-500">' . $article['title'] . '</h2>';
  				        print '<p class="text-gray-500">' . strip_tags($article['field_lead']) . '</p>';
  				        print '</a></div>';
  	}  
  }

?>
            

            
        </div>
        <div class="col-span-full text-center mt-8 Xborder-t-2 Xborder-gray-100 pt-8 text-white">
              <a href="#" class="button bg-emerald-500  hover:bg-emerald-600  font-semibold inline-block leading-5 px-6 py-3 rounded-sm text-sm text-center text-white tracking-wider uppercase duration-150 ease-in-out" id="more-news">Több hír</a>
          </div>
          <input type="hidden" value="11" id="article-bookmark">
    </section>







        </main>
        <!--article-content-->
    </div>
    <!--container-->
</div>
<!--article-->
      
      <?php include('./gen_contact_block_1.php'); ?>
      <?php include('./gen_footer.php'); ?>
    </div>
      
  </body>
</html>

