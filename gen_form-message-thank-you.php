<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('./gen_header.php'); ?>
    <script src="resources/js/offer.js"></script>
  </head>
  
  <body class="bg-white form-offer"> 
    
    <div id="sitewrapper">
      <?php include('./gen_svg.php'); ?>
      <?php include('./gen_header_menu.php'); ?>
      <?php include('./db.php'); ?>

      <div class="container max-w-3/4"></div>


<div class="container py-16">
  <div class="lg:max-w-4/6 mx-auto" id="offer" method="POST">
      <div class="grid sm:grid-cols-6 mb-8 gap-y-6 gap-x-8"></div>
      
      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-6">
        <div class=" _section-title2 _io col-span-full sm:col-span-6 md:col-span-3 xl:col-span-2 text-gray-500 leading-loose text-center mx-auto md:text-left md:mx-0 max-w-md">
    
          <h2 class="text-2xl md:text-3xl leading-snug">Üzenet elküldve</h2>
            <div class="w-16 border-t-2 border-emerald-500 mx-auto md:ml-0 my-4 md:my-8"></div>
        </div>
            
            
        </div>

          <div class="text-gray-500 lead my-16 md:my-12">
                        <h2 class="text-2xl md:text-3xl leading-snug">Köszönjük érdeklődését!</h2><br />

                        <p>Köszönjük, hogy érdeklődésével megtisztelte cégünket a Magyar Autókereskedőház Zrt-t. Kollégánk hamarosan felveszi Önnel a kapcsolatot, hogy minden felmerülő kérdésére választ tudjunk adni.</p>

                        <div class="cta col-span-full text-center mt-8"><a href="/" class=" bg-emerald-500  hover:bg-emerald-600  font-semibold inline-block leading-5 px-6 py-3 rounded-sm text-sm text-center text-white tracking-wider uppercase duration-150 ease-in-out" data-ajax="false">Vissza a címlapra</a></div>

                    </div>
    </div>
</div>

<?php include('./gen_footer.php'); ?>


    </div>
      
  </body>
</html>

