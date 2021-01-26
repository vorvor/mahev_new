<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include('./gen_header.php'); ?>
    <script src="resources/js/offer.js"></script>
  </head>
  
  <body class="debug-screens bg-white form-offer"> 
    
    <div id="sitewrapper">
      <?php include('./gen_svg.php'); ?>
      <?php include('./gen_header_menu.php'); ?>

      <div class="container max-w-3/4">
</div>


<div class="container py-16">
  <form class="lg:max-w-4/6 mx-auto" id="offer" method="POST">
      <div class="grid sm:grid-cols-6 mb-8 gap-y-6 gap-x-8">

      </div>
      <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-8 sm:grid-cols-6">
            <div class=" _section-title2 _io col-span-full sm:col-span-6 md:col-span-3 xl:col-span-2 text-gray-500 leading-loose text-center mx-auto md:text-left md:mx-0 max-w-md">
    
    <h2 class="text-2xl md:text-3xl leading-snug">Ajánlat kérése</h2>
    <div class="w-16 border-t-2 border-emerald-500 mx-auto md:ml-0 my-4 md:my-8"></div>
</div>
            <div class="sm:col-span-6 md:col-span-3 xl:col-span-4 mb-8"> 
              <ul class="_config-summary text-sm bg-gray-white border-emerald-500 md:border-l-2 md:pl-4">
                <li><span></span></li>
                <li><span>Kivitel</span><span>Standard Range Plus (RWD)</span></li>
                <li><span>Külső szín</span><span>Vörös metál</span></li>
                <li><span>Belső szín</span><span>Gyémánt metál</span></li>
                <li><span>Felni</span><span>18’ Aero könnyűfém</span></li>
                <li><span>Ülések</span><span>4</span></li>
                <li><span>Önvezetés</span><span>autopilot</span></li>
                <li><span>Téli gumi</span><span></span></li>
                <li><span>Extra</span><span></span></li>
              </ul>
            </div>

            <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium leading-5 text-gray-500">
                    Név / Cégnév*
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="name" name="firstname" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
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
                    Cím / Székhely*
                </label>
                <div class="mt-1 rounded-none shadow-sm">
                  <input id="address" name="address" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                </div>
            </div><!--text input-->
            <div class="sm:col-span-3">
                <label for="phone" class="block text-sm font-medium leading-5 text-gray-500">
                    Telefonszám*
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
                  <input id="email" name="email" type="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
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
            <div class="relative flex items-start sm:col-span-3">
                <div class="flex items-center h-5">
                  <input id="finance" type="checkbox" class="form-checkbox h-4 w-4 text-emerald-500 transition duration-150 ease-in-out">
                </div>
                <div class="ml-3 text-sm leading-5">
                  <label for="finance" class="font-medium text-gray-500">Kérek finanszírozási ajánlatot is </label>
                  <!-- <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p> -->
                </div>
            </div><!--checkbox-->
            <div class="relative flex items-start sm:col-span-3">
                <div class="flex items-center h-5">
                  <input id="termsandconditions" type="checkbox" class="form-checkbox h-4 w-4 text-emerald-500 transition duration-150 ease-in-out" REQUIRED>
                </div>
                <div class="ml-3 text-sm leading-5">
                  <label for="termsandconditions" class="font-medium text-gray-500">Elfogadom az adatvédelmi feltételeket </label>
                    <p class="text-gray-500">
                        <a class="text-emerald-600 underline uppercase text-xs font-semibold tracking-wide" href="/gen_priv-policy.php" target="_blank">
                            Adatkezelési tájékoztató
                        </a>
                    </p>
                </div>
            </div><!--checkbox-->

            <!-- Konstrukció -->
            <div class="sm:col-span-6 finance-form hidden">            
              <label for="edit-submitted-financial-construction" class="block text-sm font-medium leading-5 text-gray-500">Konstrukció</label>
             <select class="order-financial-construction order-funding  form-select" id="financial-construction" name="submitted[financial_construction]"><option value="" selected="selected">Kérem válassszon!</option><option value="close-end">zártvégű pénzügyi lízing</option><option value="open-end">nyíltvégű pénzügyi lízing</option><option value="rental">tartós bérlet</option></select>
            </div>

            
            <!-- Kezdő befizetés 20-80 -->
            <div class="sm:col-span-6 initial-deposit initial-deposit-close-end hidden">
              <label for="edit-submitted-inital-deposit-rental" class="block text-sm font-medium leading-5 text-gray-500">Kezdő befizetés százalékban</label>
                <select class="form-select" id="edit-submitted-inital-deposit" name="submitted[inital_deposit]"><option value="" selected="selected">Kérem válasszon!</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option><option value="35">35%</option><option value="40">40%</option><option value="45">45%</option><option value="50">50%</option><option value="55">55%</option><option value="60">60%</option><option value="65">65%</option><option value="70">70%</option><option value="75">75%</option><option value="80">80%</option></select>
            </div>

            <!-- Kezdő befizetés 20-50 -->
            <div class="sm:col-span-6 initial-deposit initial-deposit-open-end hidden">
                <label for="edit-submitted-inital-deposit-rental" class="block text-sm font-medium leading-5 text-gray-500">Kezdő befizetés százalékban</label>
                <select class="form-select" id="edit-submitted-inital-deposit-open-end" name="submitted[inital_deposit_open_end]"><option value="" selected="selected">Kérem válasszon!</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option><option value="35">35%</option><option value="40">40%</option><option value="45">45%</option><option value="50">50%</option></select>
            </div>
            
            <!-- Kezdő befizetés 20-40 -->
            <div class="sm:col-span-6 initial-deposit initial-deposit-rental hidden">
                <label for="edit-submitted-inital-deposit-rental" class="block text-sm font-medium leading-5 text-gray-500">Kezdő befizetés százalékban</label>
                <select class="form-select" id="edit-submitted-inital-deposit-rental" name="submitted[inital_deposit_rental]"><option value="" selected="selected">Kérem válasszon!</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option><option value="35">35%</option><option value="40">40%</option></select>
            </div>

            <!-- Futamidő -->
            <div class="sm:col-span-6 finance-form hidden">
              <label for="edit-submitted-duration" class="block text-sm font-medium leading-5 text-gray-500">Futamidő</label>
             <select class="order-duration order-funding  form-select" id="duration" name="submitted[duration]" ><option value="0" selected="selected">Kérem válasszon!</option><option value="12">12</option><option value="18">18</option><option value="24">24</option><option value="30">30</option><option value="36">36</option><option value="42">42</option><option value="48">48</option><option value="54">54</option><option value="60">60</option><option value="66">66</option><option value="72">72</option><option value="78">78</option><option value="84">84</option></select>
            </div>

            <!-- Maradvány 40-50 -->
             <div class="sm:col-span-6 remain remain-24 hidden">
              <label for="edit-submitted-remain-24-36" class="block text-sm font-medium leading-5 text-gray-500">Maradványérték</label>
             <select id="edit-submitted-remain-24" name="submitted[remain_24]" class="form-select"><option value="" selected="selected">Kérem válasszon!</option><option value="40">40%</option><option value="45">45%</option><option value="50">50%</option></select>
            </div>

            <!-- Maradványérték 30-40-->
            <div class="sm:col-span-6 remain remain-24-36 hidden">
              <label for="edit-submitted-remain-24-36" class="block text-sm font-medium leading-5 text-gray-500">Maradványérték</label>
                <select id="edit-submitted-remain-24-36" name="submitted[remain_24_36]" class="form-select"><option value="" selected="selected">Kérem válasszon!</option><option value="30">30%</option><option value="35">35%</option><option value="40">40%</option></select>
            </div>

             <!-- Maradvány 20-30 -->
             <div class="sm:col-span-6 remain remain-36-48 hidden">
              <label for="edit-submitted-remain-24-36" class="block text-sm font-medium leading-5 text-gray-500">Maradványérték</label>
             <select id="edit-submitted-remain-36-48" name="submitted[remain_36_48]" class="form-select"><option value="" selected="selected">Kérem válasszon!</option><option value="20">20%</option><option value="25">25%</option><option value="30">30%</option></select>
            </div>

             <!-- Maradvány 10-20 -->
             <div class="sm:col-span-6 remain remain-48 hidden">
              <label for="edit-submitted-remain-24-36" class="block text-sm font-medium leading-5 text-gray-500">Maradványérték</label>
             <select id="edit-submitted-remain-48" name="submitted[remain_48]" class="form-select"><option value="" selected="selected">Kérem válasszon!</option><option value="10">10%</option><option value="15">15%</option><option value="20">20%</option></select>

            </div>

            <div class="flex justify-end sm:col-span-6 mt-8">
                <!-- <span class="inline-flex rounded-md shadow-sm">
                  <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Vissza a konfigurátorhoz
                  </button>
                </span> -->
                <span class="_offer-sendbutton ml-3 inline-flex shadow-sm hover:shadow-xl transition duration-300">
                  <button type="submit" name="submit" class="active:bg-emerald-700 bg-emerald-500 border border-transparent duration-150 ease-in-out focus:border-emerald-700 focus:outline-none focus:shadow-outline-emerald font-medium hover:bg-emerald-600 inline-flex justify-center leading-5 pl-4 pr-6 py-4 rounded-sm text-sm uppercase font-semibold text-white transition tracking-wider">
                    Ajánlatkérés küldése <div class="_icon w-16 h-6 ml-2 -my-1">
    <svg class="svg-icon ">
        <use xlink:href="#i-send"></use>
    </svg></div>
                  </button>
                </span>
              </div>

        </div>
    </form>
</div>

<?php 
  include('./gen_send.php');
?>      

<?php include('./gen_footer.php'); ?>


    </div>
      
  </body>
</html>

