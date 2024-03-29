<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('./gen_header.php'); ?>

    <title>Tesla autókkal kapcsolatos bármilyen kérdés esetén vegye fel velünk a kapcsolatot!</title>

    <meta name="description" content="Érdeklődik a Tesla modellek árával, Tesla megrendelési folyamattal kapcsolatban? Szívesen segítünk!" />
    <meta property="fb:app_id" content="1192951680871368" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Tesla hírek az autógyártásról, a Tesla cég egyéb termékeiről, szolgáltatásairól és kutatásairól. | mah-ev.hu" />
    <meta property="og:url" content="<?php print (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>" />
    <meta property="og:title" content="Tesla autókkal kapcsolatos bármilyen kérdés esetén vegye fel velünk a kapcsolatot!" />
    <meta property="og:determiner" content="auto" />
    <meta property="og:description" content="Érdeklődik a Tesla modellek árával, Tesla megrendelési folyamattal kapcsolatban? Szívesen segítünk!" />
    <meta property="og:image" content="https://mah-ev.hu/resources/img/model3-city.jpg" />
    <meta property="og:image:url" content="https://mah-ev.hu/resources/img/model3-city.jpg" />
    <meta property="og:image:secure_url" content="https://mah-ev.hu/resources/img/model3-city.jpg" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:url" content="https://www.mah-ev.hu/" />
    <meta name="twitter:title" content="Tesla autókkal kapcsolatos bármilyen kérdés esetén vegye fel velünk a kapcsolatot!" />
    <meta name="dcterms.title" content="Tesla autókkal kapcsolatos bármilyen kérdés esetén vegye fel velünk a kapcsolatot!" />
    <meta name="dcterms.type" content="Text" />
    <meta name="dcterms.identifier" content="https://www.mah-ev.hu/" />
    <meta name="dcterms.format" content="text/html" />
  </head>
  <body class="bg-white form-message"> 

    <?php include('./gen_form-message-send.php'); ?>
    
    <div id="sitewrapper">
      <?php include('./gen_svg.php'); ?>
      <?php include('./gen_header_menu.php'); ?>
      <?php include('./db.php'); ?>
      
      <div class="container max-w-3/4">
</div>


<div class="container py-16">
  <form class="lg:max-w-4/6 mx-auto" id="message" method="POST">
      <div class="grid sm:grid-cols-6 mb-8 gap-y-6 gap-x-8">

      </div>
      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-6">
            <div class=" _section-title2 _io col-span-full sm:col-span-6 text-gray-500 leading-loose text-center mx-auto md:text-left md:mx-0 max-w-md">
    
    <h2 class="text-2xl md:text-3xl leading-snug">Üzenet küldés</h2>
    <div class="w-16 border-t-2 border-emerald-500 mx-auto md:ml-0 my-4 md:my-8"></div>
</div>
            <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-500">
                    Név / Cégnév*
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="name" name="firstname" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" REQUIRED>
                </div>
              </div><!--text input-->
            <div class="sm:col-span-3  lastname">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-500">
                    Név:
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="lastname" name="lastname" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
              </div><!--text input-->  
            <div class="sm:col-span-3">
                <label for="address" class="block text-sm font-medium leading-5 text-gray-500">
                    Cím / Székhely
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="address" name="address" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div><!--text input-->
            <div class="sm:col-span-3">
                <label for="phone" class="block text-sm font-medium leading-5 text-gray-500">
                    Telefonszám
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="phone" name="phone" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div><!--text input-->
            <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium leading-5 text-gray-500">
                  Email*
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="email" name="email" type="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5" REQUIRED>
                </div>
            </div><!--email input-->
            <div class="sm:col-span-6">
                <label for="message" class="block text-sm font-medium leading-5 text-gray-500">
                  Üzenet
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <textarea id="message" name="message" rows="7" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"></textarea>
                </div>
                <!-- <p class="mt-2 text-sm text-gray-500">Write a few sentences about yourself.</p> -->
            </div><!--textarea-->
            <div class="relative flex items-start sm:col-span-6">
                <div class="flex items-center h-5">
                  <input id="termsandconditions" type="checkbox" class="form-checkbox h-4 w-4 text-emerald-500 transition duration-150 ease-in-out" REQUIRED>
                </div>
                <div class="ml-3 text-sm leading-5">
                  <label for="termsandconditions" class="font-medium text-gray-500">Elfogadom az adatvédelmi feltételeket </label>
                    <p class="text-gray-500">
                        <a class="text-emerald-600 underline uppercase text-xs font-semibold tracking-wide" href="/adatkezelesi-tajekoztato" target="_blank">
                            Adatkezelési tájékoztató
                        </a>
                    </p>
                </div>
            </div><!--checkbox-->

            <div class="flex justify-end sm:col-span-6 mt-8">
                <!-- <span class="inline-flex rounded-md shadow-sm">
                  <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Vissza a konfigurátorhoz
                  </button>
                </span> -->
                <span class="_offer-sendbutton ml-3 inline-flex shadow-sm hover:shadow-xl transition duration-300">
                  <button type="submit" name="submit" class="active:bg-emerald-700 bg-emerald-500 border border-transparent duration-150 ease-in-out focus:border-emerald-700 focus:outline-none focus:shadow-outline-emerald font-medium hover:bg-emerald-600 inline-flex justify-center leading-5 pl-4 pr-6 py-4 rounded-sm text-sm uppercase font-semibold text-white transition tracking-wider">
                    Üzenet küldése <div class="_icon w-16 h-6 ml-2 -my-1">
    <svg class="svg-icon ">
        <use xlink:href="#i-send"></use>
    </svg></div>
                  </button>
                </span>
              </div>

        </div>
    </form>
</div>
       <?php include('./gen_footer.php'); ?>
    </div>
      
  </body>
</html>

